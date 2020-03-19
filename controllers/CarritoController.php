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

    public function remove()
    {

    }

    public function delete_all()
    {
        unset($_SESSION['carrito']);
    }
}
