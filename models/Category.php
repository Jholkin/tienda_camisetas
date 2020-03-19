<?php

class Category
{
    private $id;
    private $name;

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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = filter_var($name, FILTER_SANITIZE_STRING);
    }

    public function getAll()
    {
        $categories = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");

        return $categories;
    }

    public function getCategory()
    {
        $category = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()};");

        return $category->fetch(PDO::FETCH_OBJ);
    }

    public function save()
    {
        $sql = "INSERT INTO categorias VALUES (null,'{$this->getName()}');";

        $statement = $this->db->prepare($sql);
        $save = $statement->execute();
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }
}