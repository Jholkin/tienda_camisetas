<?php

require_once 'config/database.php';

class Product
{
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
        $price_sanitize = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT);
        $this->price = filter_var($price_sanitize, FILTER_VALIDATE_FLOAT);
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

    public function save()
    {
        $sql = "INSERT INTO productos VALUES (null,'{$this->getCategoryId()}','{$this->getName()}','{$this->getDescription()}',
                {$this->getPrice()},{$this->getStock()}, null, CURDATE(), null);";

        $statement = $this->db->prepare($sql);
        $save = $statement->execute();
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }
}