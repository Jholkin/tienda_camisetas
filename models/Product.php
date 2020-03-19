<?php

require_once 'config/database.php';

class Product
{
    private $id;
    private $category_id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $offer;
    private $date;
    private $image;

    private $db;

    public function __construct()
    {
        $this->db = Database::getConnect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $id_sanitize = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $this->id = filter_var($id_sanitize, FILTER_VALIDATE_INT);
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setCategoriId($category_id)
    {
        $category_id_sanitize = filter_var($category_id, FILTER_SANITIZE_NUMBER_INT);
        $this->category_id = filter_var($category_id_sanitize, FILTER_VALIDATE_INT);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = filter_var($name, FILTER_SANITIZE_STRING);
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = filter_var($description, FILTER_SANITIZE_STRING);
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = filter_var($price, FILTER_VALIDATE_FLOAT);
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $stock_sanitize = filter_var($stock, FILTER_SANITIZE_NUMBER_INT);
        $this->stock = filter_var($stock_sanitize, FILTER_VALIDATE_INT);
    }

    public function getOffer()
    {
        return $this->offer;
    }

    public function setOffer($offer)
    {
        $this->offer = filter_var($offer, FILTER_SANITIZE_STRING);
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getAll()
    {
        $products = $this->db->query("SELECT * FROM productos ORDER BY id DESC;");

        return $products;
    }

    public function getAllCategory()
    {
        $sql = "SELECT p.*, c.nombre FROM productos p INNER JOIN categorias c ON c.id=p.categoria_id WHERE categoria_id={$this->getCategoryId()};";
        $products = $this->db->query($sql);

        return $products;
    }

    public function getRandom($limit)
    {
        $sql = "SELECT * FROM productos ORDER BY RAND() LIMIT $limit;";
        $products = $this->db->query($sql);

        return $products;
    }

    public function getProduct()
    {
        $products = $this->db->query("SELECT * FROM productos WHERE id = '{$this->getId()}';");

        return $products->fetch(PDO::FETCH_OBJ);
    }

    public function save()
    {
        $sql = "INSERT INTO productos VALUES (null,'{$this->getCategoryId()}','{$this->getName()}','{$this->getDescription()}',
                {$this->getPrice()},{$this->getStock()}, null, CURDATE(), '{$this->getImage()}');";

        $statement = $this->db->prepare($sql);
        $save = $statement->execute();
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function edit()
    {
        $sql = "UPDATE productos SET categoria_id='{$this->getCategoryId()}', nombre='{$this->getName()}', descripcion='{$this->getDescription()}',
                precio={$this->getPrice()}, stock={$this->getStock()}";
        
        if ($this->getImage() != null) {
            $sql .= ", imagen='{$this->getImage()}'";
        }
        
        $sql .= " WHERE id={$this->getId()};";

        $statement = $this->db->prepare($sql);
        $save = $statement->execute();
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function delete()
    {
        $result = false;
        $sql = "DELETE FROM productos WHERE id = '{$this->getId()}';";
        
        $delete = $this->db->query($sql);

        if ($delete) {
            $result = true;
        }

        return $result;
    }
}