<?php
    class Order {

        public static function save($name,$phone,$comment,$productsO,$u_id ) {
                $db = Db::getConnection();
                $query = "
                    INSERT INTO productorder(`userName`,`userPhone`,`userComment`,`Products`,`user_id`)
                    VALUES (:name,:phone,:comment,:productsO,:u_id)
                ";
                $result = $db->prepare($query);
                $result->bindParam(":name",$name,PDO::PARAM_STR);
                $result->bindParam(":phone",$phone,PDO::PARAM_STR);
                $result->bindParam(":comment",$comment,PDO::PARAM_STR);
                $result->bindParam(":productsO",$productsO,PDO::PARAM_STR);
                $result->bindParam(":u_id",$u_id,PDO::PARAM_INT);

                $result->execute();
        }

    }