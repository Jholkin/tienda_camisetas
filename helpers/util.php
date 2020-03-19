<?php

class Util
{
    public static function deleteSession($name)
    {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
    }

    public static function isAdmin()
    {
        if (!isset($_SESSION['admin'])) {
            header('Location: ' . base_url);
        }else {
            return true;
        }
    }

    public static function isLogged()
    {
        if (!isset($_SESSION['identify'])) {
            header('Location: ' . base_url);
        }else {
            return true;
        }
    }

    public static function showCategories()
    {
        require_once 'models/Category.php';
        $category = new Category();
        $categories = $category->getAll();

        return $categories;
    }

    public static function statisticsCarrito()
    {
        $stats = array(
            'count' => 0,
            'total' => 0
        );

        if (isset($_SESSION['carrito'])) {
            $stats['count'] = count($_SESSION['carrito']);

            foreach ($_SESSION['carrito'] as $key => $product) {
                $stats['total'] += $product['precio']*$product['unidades'];
            }
        }

        return $stats;
    }

    public static function showStatus($status)
    {
        $value = 'Pendiente';

        if ($status == 'confirm') {
            $value = 'Pendiente';
        }elseif ($status == 'preparation') {
            $value = 'En preparacion';
        }elseif ($status == 'ready') {
            $value = 'Preparado para enviar';
        }elseif ($status == 'sender') {
            $value = 'Enviado';
        }

        return $value;
    }
}
