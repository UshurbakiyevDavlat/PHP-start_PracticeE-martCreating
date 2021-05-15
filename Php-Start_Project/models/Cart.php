<?php
    class Cart {
        public static function addCart($id){


            if (isset($_SESSION['prodArray'][$id])){
                $_SESSION['prodArray'][$id]++;

            } else {
                $_SESSION['prodArray'][$id] = 1;

                }

           return self::getTotal();
        }

        public static function getTotal(){
            $total = 0;
            $array = $_SESSION['prodArray'];
                foreach ($array as $key=>$value) {
                    $total += $value;
                }
                return $total;
        }

        public static function getTotalSum() {
            $totalSum = 0;
            $array = $_SESSION['prodArray'];
            $cartKeys = array_keys($array);
            $cartValues = array_values($array);
            $i=0;

            foreach ($cartKeys as $cartKey) {
                $cartInfo[$i] = Cart::getInfo($cartKey);
                $i++;
            }

            $i = 0;
            foreach ($cartInfo as $cartItem) {
                $totalSum += $cartItem[0]['price'] * $cartValues[$i];
                $i++;
            }

            return $totalSum;
        }

        public static function getAmount() {
            $amount = 0;
            $array = $_SESSION['prodArray'];
            foreach ($array as $item) {
                $amount++;
            }
            return $amount;
        }


        public static function getInfo($id){
            $db = Db::getConnection();
            $query = "
                SELECT * FROM product WHERE id = :id 
            ";
            $result = $db->prepare($query);
            $result->bindParam(":id",$id,PDO::PARAM_INT);
            $result->execute();
            $i=0;
            while ($row = $result->fetch()){
                $cartP[$i]['id'] = $row['id'];
                $cartP[$i]['name'] = $row['name'];
                $cartP[$i]['code'] = $row['code'];
                $cartP[$i]['price'] = $row['price'];
                $cartP[$i]['brand'] = $row['brand'];
                $i++;
            }
            return $cartP;
        }

        public static function clear(){
            if(isset($_SESSION['prodArray'])){
                unset($_SESSION['prodArray']);
            }
        }
    }