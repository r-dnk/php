<?php
    class ContactModel {
        private $name;
        private $email;
        private $age;
        private $message;

        public function setData($name, $email, $age, $message){
            $this->name = $name;
            $this->email = $email;
            $this->age = $age;
            $this->message = $message;
        }
//проверяет данные ввода формы
        public function validForm() {
            if (strlen($this->name) < 3)
                return "Имя слишком короткое";
            else if (strlen($this->email) < 3)
                return "Email слишком короткий";
            else if (!is_numeric($this->age) || $this->age <= 0 || $this->age > 90)
                return "Вы не ввели возраст";
            else if (strlen($this->message) < 10)
                return "Сообщение слишком короткое";
            else
                return "Верно";
        }
//отправляем сообщение на почту с предложением
        public function mail() {
            $to = "illich5930@gmail.com";
            $message = "Имя: " . $this->name . "Возраст: ". $this->age . "Сообщение: " . $this->message;

            $subject = "=?utf-8?B?".base64_encode("Сообщение с сайта")."?=";
            $headers = "From: $this->email\r\nReply-to: $this->email\r\nContent-type: text/html; charset=utf-8\r\n";
            $success = mail ($to, $subject, $message, $headers);

            if (!$success)
                return "Сообщение не было отправлено";
            else
                return true;
        }

    }
