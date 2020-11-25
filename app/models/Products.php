<?php
require 'DB.php';

class Products
{
    private $_db = null;

    public function __construct(){
        $this->_db = DB::getInstence();
    }

    public function getProducts(){
        $result = $this->_db->query("SELECT * FROM `products` ORDER BY 'id' DESC");
        //сохраним данные в массив
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsLimited($order, $limit){
        $result = $this->_db->query("SELECT * FROM `products` ORDER BY $order DESC LIMIT $limit");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductsCategory($category){
        $result = $this->_db->query("SELECT * FROM `products` WHERE `category` = '$category' ORDER BY 'id' DESC");
        //сохраним данные в массив
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOneProduct($id) {
        $result = $this->_db->query("SELECT * FROM `products` WHERE `id` = '$id'");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductsCard($items) {
        $result = $this->_db->query("SELECT * FROM `products` WHERE `id` IN ($items)");
        return $result->fetchALL(PDO::FETCH_ASSOC);
    }
}
