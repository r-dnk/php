<?php
    class User extends Controller {
        public function reg() {

            $data = [];
            //Проверяем массив POST на заполнение данных(можно выбрать любой из ключей)
            if (isset($_POST['name'])) {
                //создаем обьект на основе UserModel
                $user = $this->model('UserModel');
                //устанавливаем передаваемые значения в переменные
                $user->setData($_POST['name'],$_POST['email'],$_POST['pass'],$_POST['re_pass']);
                //поместим в переменную значение функции, которая проверяет передаваемые данные
                $isValid = $user->validForm();
                if ($isValid == "Регистрация прошла успешно")
                    $user->addUser();
                else
                    $data['message'] = $isValid;
            }

            $this->view('user/reg', $data);
        }

        public function dashboard() {

            $user = $this->model('UserModel');

            if (isset($_POST['exit_btn'])) {
                $user->logOut();
                exit();
            }


            $this->view('user/dashboard', $user->getUser());
        }
        public function auth() {
            $data = [];
            if (isset($_POST['email'])) {
                $user = $this->model('UserModel');
                $data['message'] = $user->auth($_POST['email'],$_POST['pass']);

            }

            $this->view('user/auth', $data);
        }
    }