<?php

require_once 'models/Product.php';

class CarritoController
{
    public function index()
    {
        if (!isset($_SESSION['carrito'])) {
            echo "No ha agregado productos aún al carrito.";
        }else {
            $carrito = $_SESSION['carrito'];

            require_once 'views/carrito/index.php';
        }
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];
        }else {
            header('Location: '.base_url);
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $key => $element) {
                if ($element['id'] == $product_id) {
                    $_SESSION['carrito'][$key]['unidades']++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            // Conseguir producto
            $product = new Product();
            $product->setId($product_id);
            $prod = $product->getProduct();

            // Añadir al carrito
            if (is_object($prod)) {
                $_SESSION['carrito'][] = array(
                    'id' => $prod->id,
                    'precio' => $prod->precio,
                    'unidades' => 1,
                    'product' => $prod
                );
            }
        }

        header('Location: ' . base_url . 'carrito/index');
    }

    public function delete()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            unset($_SESSION['carrito'][$index]);

            header('Location: '. base_url . 'carrito/index');
        }
    }

    public function up()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']++;

            header('Location: '. base_url . 'carrito/index');
        }
    }

    public function down()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']--;

            if ($_SESSION['carrito'][$index]['unidades'] == 0) {
                unset($_SESSION['carrito'][$index]);
            }

            header('Location: '. base_url . 'carrito/index');
        }
    }

    public function delete_all()
    {
        unset($_SESSION['carrito']);
        header('Location: '. base_url . 'carrito/index');
    }
}
