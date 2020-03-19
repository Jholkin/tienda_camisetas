<?php

require_once 'config/database.php';

class Order
{
    private $id;
    private $user_id;
    private $province;
    private $locality;
    private $address;
    private $cost;
    private $state;
    private $date;
    private $time;

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

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $user_id_sanitize = filter_var($user_id, FILTER_SANITIZE_NUMBER_INT);
        $this->user_id = filter_var($user_id_sanitize, FILTER_VALIDATE_INT);
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function setProvince($province)
    {
        $this->province = filter_var($province, FILTER_SANITIZE_STRING);
    }

    public function getLocality()
    {
        return $this->locality;
    }

    public function setLocality($locality)
    {
        $this->locality = filter_var($locality, FILTER_SANITIZE_STRING);
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = filter_var($address, FILTER_SANITIZE_STRING);
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function setCost($cost)
    {
        $this->cost = filter_var($cost, FILTER_SANITIZE_NUMBER_FLOAT);
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = filter_var($state, FILTER_SANITIZE_STRING);
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function getAll()
    {
        $orders = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC;");

        return $orders;
    }

    public function getOrder()
    {
        $order = $this->db->query("SELECT * FROM pedidos WHERE id={$this->getId()};");

        return $order->fetch(PDO::FETCH_OBJ);
    }

    public function getOrderByUser()
    {
        $sql = "SELECT p.id, p.coste FROM pedidos p WHERE usuario_id={$this->getUserId()} ORDER BY id DESC LIMIT 1;";

        $order = $this->db->query($sql);

        return $order->fetch(PDO::FETCH_OBJ);
    }

    public function getAllByUser()
    {
        $sql = "SELECT p.* FROM pedidos p WHERE usuario_id={$this->getUserId()} ORDER BY id DESC;";

        $order = $this->db->query($sql);

        return $order;
    }

    public function getProductsByOrder($id)
    {
        // $sql = "SELECT * FROM productos WHERE id IN (SELECT producto_id FROM lineas_pedidos WHERE pedido_id = {$id});";
        $sql = "SELECT p.*, lp.unidades FROM productos p INNER JOIN lineas_pedidos lp ON lp.producto_id = p.id WHERE lp.pedido_id = {$id};";
        $products = $this->db->query($sql);

        return $products;
    }

    public function save()
    {
        $sql = "INSERT INTO pedidos VALUES (null,'{$this->getUserId()}','{$this->getProvince()}',
    '{$this->getLocality()}', '{$this->getAddress()}', {$this->getCost()}, 'confirm', CURDATE(), CURTIME());";

        $statement = $this->db->prepare($sql);
        $save = $statement->execute();
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function save_line()
    {
        $sql = "SELECT LAST_INSERT_ID() AS 'pedido';";

        $stm = $this->db->query($sql);
        $order = $stm->fetch(PDO::FETCH_OBJ)->pedido;

        foreach ($_SESSION['carrito'] as $value) {
            $product = $value['product'];
            $insert = "INSERT INTO lineas_pedidos VALUES (null, {$order}, {$product->id}, {$value['unidades']})";
            $save = $this->db->query($insert);
        }

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function updateOrder()
    {
        $sql = "UPDATE pedidos SET estado='{$this->getState()}' WHERE id={$this->getId()};";

        $statement = $this->db->prepare($sql);
        $save = $statement->execute();
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

}

?>
