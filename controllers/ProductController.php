<?php

require_once 'models/Product.php';

class ProductController
{
    public function index()
    {
        require_once 'views/products/destacados.php';
    }

    public function gestion()
    {
        Util::isAdmin();

        $product = new Product();
        $products = $product->getAll();

        require_once 'views/products/gestion.php';
    }

    public function create()
    {
        require_once 'views/products/create.php';
    }

    public function save()
    {
        Util::isAdmin();

        if (isset($_POST)) {
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $price = isset($_POST['price']) ? $_POST['price'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $category = isset($_POST['category']) ? $_POST['category'] : false;

            if ($name && $description && $price && $stock && $category) {
                $product = new Product();
                $product->setName($name);
                $product->setDescription($description);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setCategoriId($category);

                // Guardar imagen
                $file = $_FILES['image'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {
                    if (!is_dir('uploads/images')) {
                        mkdir('uploads/images', 0777, true);
                    }

                    move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                    $product->setImage($filename);
                }

                $save = $product->save();

                if ($save) {
                    $_SESSION['product'] = 'complete';
                }else {
                    $_SESSION['product'] = 'failed';
                }
            }else {
                $_SESSION['product'] = 'failed';
            }
        }else {
            $_SESSION['product'] = 'failed';
        }

        header('Location: ' . base_url . 'product/gestion');
    }

    public function edit()
    {
        var_dump($_GET);
    }

    public function delete()
    {
        Util::isAdmin();

        if (isset($_GET['id'])) {
            $product = new Product();
            $product->setId($_GET['id']);

            $delete = $product->delete();

            if ($delete) {
                $_SESSION['delete'] = 'complete';
            }else {
                $_SESSION['delete'] = 'failed';
            }
        }else {
            $_SESSION['delete'] = 'failed';
        }

        header('Location: ' . base_url . 'product/gestion');
    }
}