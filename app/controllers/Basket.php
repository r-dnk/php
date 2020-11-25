<?php
    class Basket extends Controller {
        public function index() {
            $data = [];

            $cart = $this->model('BasketModel');
            if (isset($_POST['item_id'])) {
                $cart->addToCart($_POST['item_id']);
            }
            if (isset($_POST['item_id_del'])) {
                $cart->itemDel($_POST['item_id_del']);
            }
            if (isset($_POST['del_all'])) {
                $cart->deleteSession();
            }
            if (!$cart->isSetSession())
                $data['empty'] = 'Пустая корзина';
            else {
                $products = $this->model('Products');
                $data['products'] = $products->getProductsCard($cart->getSession());
            }


            $this->view('basket/index', $data);

        }
    }
