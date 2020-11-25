<?php
    class Contact extends Controller {
        public function index() {
            $data = [];
            //Проверяем массив POST на заполнение данных(можно выбрать любой из ключей)
            if (isset($_POST['name'])) {
                //создаем обьект на основе ContactModel
                $mail = $this->model('ContactModel');
                //устанавливаем передаваемые значения в переменные
                $mail->setData($_POST['name'],$_POST['email'],$_POST['age'],$_POST['message']);
                //поместим в переменную значение функции, которая проверяет передаваемые данные
                $isValid = $mail->validForm();
                if ($isValid == "Верно")
                    $data['message'] = $mail->mail();
                else
                    $data['message'] = $isValid;
            }


            $this->view("contact/index", $data);

        }

        public function about() {
            $this->view('contact/about');
        }
    }
