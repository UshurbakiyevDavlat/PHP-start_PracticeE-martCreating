<?php

class User {
    public  static function register($name,$email,$password){
            $db = Db::getConnection();
            $query =  "INSERT INTO user(`name`,`email`,`password`) VALUES (:name,:email,:password)";

            $result = $db->prepare($query);

            $result->bindParam(":name",$name,PDO::PARAM_STR);
            $result->bindParam(":email",$email,PDO::PARAM_STR);
            $result->bindParam(":password",$password,PDO::PARAM_STR);

            return $result->execute();
    }

    public static function checkName($name){
            if(strlen($name)>1){
                return true;
            }
            return false;
    }

    public static function checkPhone($phone) {
        if (strlen($phone)>10){
            return true;
        } return false;
    }

    public static function checkCommentary($commentary) {
        if (strlen($commentary)>5) {
            return true;
        } return  false;
    }

    public static function checkPassword($pass){
        if(strlen($pass)>5){
            return true;
        }
        return false;
    }

    public static function checkEmail($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    public  static function checkEmailExists($email){
            $db = Db::getConnection();
            $query =  "SELECT COUNT(*) FROM user WHERE email = :email";
            $result = $db->prepare($query);
            $result->bindParam(":email",$email,PDO::PARAM_STR);
            $result->execute();

            if ($result->fetchColumn())
                return true;
            return false;
    }

    public static  function checkUserExist($email,$password){
            $db = Db::getConnection();
            $query = 'SELECT * FROM user WHERE email = :email AND password = :password';
            $result = $db ->prepare($query);
            $result->bindParam(":email",$email,PDO::PARAM_STR);
            $result->bindParam(":password",$password,PDO::PARAM_STR);


            $result->execute();

            $i = 0;
            while ($row = $result->fetch()){
                if ($row['email'] == $email && $row['password']==$password ) {
                    return $row['id'];
                }
                $i++;
            }
            return false;
    }
    public static function auth($id){
        $_SESSION['user'] = $id;
        header('Location:cabinet/');
    }

    public static function checkAuth() {
        if (isset($_SESSION['user'])){
            return true;
        }
        return  false;
    }

    public static function getUserbyId(){
        $db = Db::getConnection();
        $query = 'SELECT * FROM user WHERE id = :id ';
        $result = $db ->prepare($query);
        $result->bindParam(":id",$_SESSION['user'],PDO::PARAM_STR);
        $result->execute();

        $i=0;

        $row = $result->fetch();
        return $row;

    }

    public  static function updateUserById($name,$email,$password){
        $db = Db::getConnection();
        $query = '
            UPDATE user 
            SET name = :name , email = :email , password = :password
            WHERE id = :id';

        $result = $db->prepare($query);
        $result->bindParam(":id",$_SESSION['user'],PDO::PARAM_INT);
        $result->bindParam(":name",$name,PDO::PARAM_STR);
        $result->bindParam(":email",$email,PDO::PARAM_STR);
        $result->bindParam(":password",$password,PDO::PARAM_STR);

        if($result->execute()){
            return true;
        } return false;


    }

    public static function isGuest(){
        if (isset($_SESSION['user'])){
            return false;
        }return true;
    }

}