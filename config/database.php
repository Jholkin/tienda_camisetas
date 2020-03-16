<?php

class Database {
    public static function connect() {
        $db = new mysqli('localhost', 'root', 'toor', 'tienda_camisetas');
        $db->query("SET NAMES 'utf-8'");
        return $db;
    }
}