<?php
    class UserController
    {
        public function actionRegister()
        {

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $result = false;

                $errors = false;
                if (!User::checkName($name)) {
                    $errors[] = "Имя пользователя должно содержать более 1 символа.";
                }
                if (!User::checkPassword($pass)) {
                    $errors[] = "Пароль должен быть с более чем 5 символами.";
                }
                if (!User::checkEmail($email)) {
                    $errors[] = "Неправильный e-mail.";
                }

                if (User::checkEmailExists($email)) {
                    $errors[] = "Пользователь с таким e-mail уже есть. ";
                }

                if ($errors == false) {
                    $result = User::register($name, $email, $pass);
                }

            }
            require_once ROOT . "/view/user/register.php";
            return true;
        }

        public function actionLogin()
        {
            $result = false;
            $errors = false;

            if (isset($_POST['submit'])) {

                $email = $_POST['email'];
                $password = $_POST['password'];

                if (isset($_POST['email']) && isset($_POST['password'])) {
                    if (!User::checkEmail($email)) {
                        $errors[] = "Неправильный e-mail.";
                    }
                    if (!User::checkPassword($password)) {
                        $errors[] = "Пароль должен быть с более чем 5 символами.";
                    }

                    if (!User::checkUserExist($email, $password)) {
                        $errors[] = "Не правильные логин или пароль";
                    }

                    if ($errors == false) {

                        $id = User::checkUserExist($email, $password);
                        if ($id) {
                            $result = User::auth($id);
                        }
                    }
                }
            }
            require_once ROOT . "/view/user/login.php";
            return true;
        }

        public function actionUnlogin()
        {
            unset($_SESSION['user']);
            header("Location:index.php");
        }

        public function actionCabinet()
        {

            if (!User::checkAuth()) {
                header("Location: login");
            }
            $user = User::getUserbyId();

            require_once ROOT . "/view/user/cabinet.php";
            return true;
        }

        public function actionEdit()
        {

            $user = User::getUserbyId();
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $pass = $_POST['password'];

                $result = false;
                $errors = false;

                if (!User::checkName($name)) {
                    $errors[] = "Имя пользователя должно содержать более 1 символа.";
                }
                if (!User::checkPassword($pass)) {
                    $errors[] = "Пароль должен быть с более чем 5 символами.";
                }
                if (!User::checkEmail($email)) {
                    $errors[] = "Неправильный e-mail.";
                }

//                if (User::checkEmailExists($email)) {
//                    $errors[] = "Пользователь с таким e-mail уже есть. ";
//                }

                if ($errors == false) {
                    $result = User::updateUserById($name, $email, $pass);
                    $user = User::getUserbyId();
                }
            }
                require_once ROOT . "/view/user/edit.php";
                return true;

        }
    }