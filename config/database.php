<?php

class Database
{
    private static $dbh;

    private function __construct() {}

    public static function getConnect()
    {
        if (!self::$dbh instanceof self) {
            try {
                self::$dbh = new pdo('mysql:host=localhost;dbname=tienda_master','root','toor');
                self::$dbh->query('SET NAMES utf8');
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return self::$dbh;
    }

    /*public static function connect() {
        $db = new mysqli('localhost', 'root', '', 'tienda_master');
        $db->query("SET NAMES 'utf-8'");
        return $db;
    }*/
}