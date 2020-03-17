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