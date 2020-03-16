<?php

class User
{
    private $id;
    private $name;
    private $lastname;
    private $email;
    private $password;
    private $role;
    private $image;

    private $db;

    public function __construct()
    {
        $this->db = Database::getConnect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = filter_var($name, FILTER_SANITIZE_STRING);
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $email_sanitize = filter_var($email, FILTER_SANITIZE_EMAIL); //sanitizamos la entrada
        $this->email = filter_var($email_sanitize, FILTER_VALIDATE_EMAIL); //validamos
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function save()
    {
        $sql = "INSERT INTO usuarios VALUES (null,'{$this->getName()}','{$this->getLastname()}','{$this->getEmail()}',
                '{$this->getPassword()}','admin','null');";

        $statement = $this->db->prepare($sql);
        $save = $statement->execute();
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }
}