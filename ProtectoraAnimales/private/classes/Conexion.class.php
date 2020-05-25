<?php


class Conexion
{
    private const DB_SERVER = "localhost";
    private const DB_USER = "root";
    private const DB_PASS = "root";
    private const DB_NAME = "protectora_animales";
    //$dsn = 'mysql:host=localhost;dbname=protectora_animales;port=8889';
    private const DSN = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_NAME . ";";


    protected function setConnection() {
        try {
           return new PDO(self::DSN, self::DB_USER, self::DB_PASS);
        }
        catch (Exception $e) {
            exit($e->getMessage());
        }
}

}