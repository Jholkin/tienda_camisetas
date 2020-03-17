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
}