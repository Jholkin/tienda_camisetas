<?php

require_once 'models/User.php';

class UserController
{
    public function index() {
        echo "controlador de usuarios, accion index";
    }

    public function register() {
        require_once 'views/user/register.php';
    }

    public function save()
    {
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

    public function login()
    {
        if (isset($_POST)) {
            $user = new User();

            $identify = $user->login($_POST['email'],$_POST['password']);

            if ($identify && is_object($identify)) {
                $_SESSION['identify'] = $identify;

                if ($identify->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            }else {
                $_SESSION['error_login'] = "Identificación fallida";
            }
        }

        header('Location: ' . base_url);
    }

    public function logout()
    {
        if (isset($_SESSION['identify'])) {
            unset($_SESSION['identify']);
        }

        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        header('Location: ' . base_url);
    }
}
