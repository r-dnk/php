<?php
session_start();
class BasketModel {
    private $session_name = 'cart';
//проверяет установлена ли сессия
    public function isSetSession() {
        return isset($_SESSION[$this->session_name]);

    }
//удаляем сессию
    public function deleteSession() {
        unset($_SESSION[$this->session_name]);
    }
//возвращает значение сессии
    public function getSession() {
        return $_SESSION[$this->session_name];
    }
//добавление товаров
    public function addToCart($itemID) {
        if(!$this->isSetSession())
            $_SESSION[$this->session_name] = $itemID;
        else {
            $items = explode(",", $_SESSION[$this->session_name]);
//проверяет добавлен ли уже товар + отменяет добавление, если да
            $itemExist = false;
            foreach ($items as $el) {
                if($el == $itemID)
                    $itemExist = true;
            }

            if(!$itemExist)
                $_SESSION[$this->session_name] = $_SESSION[$this->session_name].','.$itemID;
        }
    }
//удаляет товар
    public function itemDel($itemDel) {
        $items = explode(",", $_SESSION[$this->session_name]);
        if (count($items) == 1) {
            unset($_SESSION[$this->session_name]);
        }
        else {
            foreach ($items as $key => $item) {
                if ($item == $itemDel)
                    unset($items[$key]);
            }
            $_SESSION[$this->session_name] = implode(',', $items);
        }
    }



//подсчитывает товары
    public function countItems() {
        if(!$this->isSetSession())
            return 0;
        else {
            $items = explode(",", $_SESSION[$this->session_name]);
            return count($items);
        }
    }
}

