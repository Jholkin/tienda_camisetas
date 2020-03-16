<?php

require_once 'models/User.php';

class UserController
{
    public function index() {
        echo "controlador de usuarios, accion index";
    }

    public function register() {
        require_once 'views/users/register.php';
    }

    public function save() {
        if (isset($_POST)) {
            $user = new User();
            $user->setName($_POST['name']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $save = $user->save();

            if ($save) {
                $_SESSION['register'] = 'complete';
            }else {
                $_SESSION['register'] = 'failed';
            }
        }else {
            $_SESSION['register'] = 'failed';
        }

        header('Location:' . base_url . 'user/register');
    }
}