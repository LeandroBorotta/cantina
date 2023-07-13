<?php
use Demo\Common\Environment;
Environment::load(__DIR__);

class DatabaseConnection {
    private static $pdo;

    public static function getPDO() {
        if (!isset(self::$pdo)) {
            $DB_HOST = getenv('DB_HOST');
            $DB_USER = getenv('DB_USER');
            $DB_PASS = getenv('DB_PASS');
            $DB_NAME = getenv('DB_NAME');

            try {
                self::$pdo = new PDO('mysql:host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
            } catch (PDOException $e) {
                echo 'Erro na conexão: ' . $e->getMessage();
            }
        }

        return self::$pdo;
    }
}