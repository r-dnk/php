<?php
    require 'DB.php';

    class UserModel {
        private $name;
        private $email;
        private $pass;
        private $re_pass;

        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        public function setData($name, $email, $pass, $re_pass){
            $this->name = trim(filter_var($name, FILTER_SANITIZE_STRING));
            $this->email = trim(filter_var($email, FILTER_SANITIZE_EMAIL));
            $this->pass = trim(filter_var($pass, FILTER_SANITIZE_STRING));
            $this->re_pass = trim(filter_var($re_pass, FILTER_SANITIZE_STRING));
        }
    //проверяет данные ввода формы
        public function validForm() {
            if (strlen($this->name) < 3)
                return "Имя слишком короткое";
            else if (strlen($this->email) < 3)
                return "Email слишком короткий";
            else if (strlen($this->pass) < 3)
                return "Пароль слишком короткий";
            else if ($this->pass != $this->re_pass)
                return "Пароли не совпадают";
            else
                return "Регистрация прошла успешно";
        }
        public function addUser() {
            $sql = 'INSERT INTO users(name, email, pass) VALUES (:name, :email, :pass)';
            //prepare подготавливает запрос для БД
            $query = $this->_db->prepare($sql);

            $pass = password_hash($this->pass, PASSWORD_DEFAULT);
            $query->execute([ 'name' => $this->name, 'email' => $this->email, 'pass' => $pass]);

            $this->setAuth($this->email);

        }

        public function getUser() {
            $email = $_COOKIE['login'];
            $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public function logOut() {
            setcookie('login', $this->email, time() - 3600, '/');
            unset($_COOKIE['login']);
            header('Location: /user/auth');
        }
//авторизация
        public function auth($email, $pass) {
            $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
            $user = $result->fetch(PDO::FETCH_ASSOC);

            if ($user['email'] == '')
                return 'Пльзователь с таким email не существует';
            else if (password_verify($pass, $user['pass']))
                $this->setAuth($email);
            else
                return 'Пароли не совпали';
        }

        public function setAuth($email) {
            setcookie('login', $email, time() + 3600, '/');
            header('Location: /user/dashboard');
        }

    }