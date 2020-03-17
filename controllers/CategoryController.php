<?php

require_once 'models/Category.php';
require_once 'models/Product.php';

class CategoryController
{
    public function index()
    {
        Util::isAdmin();
        $category = new Category();
        $categories = $category->getAll();

        require_once 'views/category/index.php';
    }

    public function show()
    {
        if (isset($_GET['id'])) {
            // Conseguir categoria
            $category = new Category();
            $category->setId($_GET['id']);

            $cat = $category->getCategory();

            // Conseguir productos asociados a la categoria
            $product = new Product();
            $product->setCategoriId($cat->id);
            $products = $product->getAllCategory();
            //var_dump($products);die();
        }

        require_once 'views/category/show.php';
    }

    public function create()
    {
        Util::isAdmin();
        require_once 'views/category/create.php';
    }

    public function save()
    {
        Util::isAdmin();

        // Guardamos la categoría
        if (isset($_POST) && isset($_POST['name'])) {
            $category = new Category();
            $category->setName($_POST['name']);
            $category->save();
        }

        header('Location: ' . base_url . 'category/index');
    }
}