<?php
class DB {
    private static $_db = null;

    public static function getInstence() {
        if(self::$_db == null)
            self::$_db = new PDO('mysql:host=ah403767.mysql.tools;dbname=ah403767_shop', 'ah403767_shop', 'xZyX;-689g');

        return self::$_db;
    }

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

}
