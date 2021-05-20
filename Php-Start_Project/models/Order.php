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
        public static function ordUpd($id,$options) {
            $db = Db::getConnection();
            $query = "
                UPDATE `productorder`
                SET `userName` = :uName,
                    `userPhone` = :uPhone,
                    `userComment` = :uComm,
                    `Products` = :prod,
                    `user_id`= :u_Id,
                    `date_of_an_order` = :dateOfOrder
                WHERE `id`= :id
            ";
            $result= $db->prepare($query);
            $result->bindParam(":uName",$options['userName'],PDO::PARAM_STR);
            $result->bindParam(":uPhone",$options['userPhone'],PDO::PARAM_STR);
            $result->bindParam(":uComm",$options['userComment'],PDO::PARAM_STR);
            $result->bindParam(":prod",$options['Products'],PDO::PARAM_STR);
            $result->bindParam(":u_Id",$options['user_id'],PDO::PARAM_INT);
            $result->bindParam(":dateOfOrder", $options['date_of_an_order'],PDO::PARAM_STR);
            $result->bindParam(":id",$id,PDO::PARAM_INT);
            $result->execute();

        }

        public static function getOrdersList(){
            $db = Db::getConnection();
            $query = "
                SELECT *FROM productorder
            ";

            $result = $db->prepare($query);
            $result->execute();
            $i = 0;
            $orders = [];
            while ($row = $result->fetch()){
                $orders[$i]['id'] = $row['id'];
                $orders[$i]['userName'] = $row['userName'];
                $orders[$i]['userPhone'] = $row['userPhone'];
                $orders[$i]['userComment'] = $row['userComment'];
                $orders[$i]['Products'] = $row['Products'];
                $orders[$i]['user_id'] = $row['user_id'];
                $orders[$i]['date_of_an_order'] = $row['date_of_an_order'];
                $i++;
            }
            return $orders;
        }
        public static function getOrderById($id){
            $db = Db::getConnection();
            $query = "
                SELECT *FROM productorder WHERE id = :id
            ";

            $result = $db->prepare($query);
            $result->bindParam(":id",$id,PDO::PARAM_INT);
            $result->execute();

            $row = $result->fetch();
            return $row;

        }
        public static function orderDelete($id){
            $db = Db::getConnection();
            $query = "
                DELETE FROM productorder WHERE id=:id
            ";
            $result = $db->prepare($query);
            $result->bindParam(":id",$id,PDO::PARAM_INT);
            $result->execute();

        }



    }