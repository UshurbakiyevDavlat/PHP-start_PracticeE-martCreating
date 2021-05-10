<?php
    class Product {
        const SHOW_BY_DEFAULT = 6;

        public  static  function  getLatestProducts($count = self::SHOW_BY_DEFAULT) {
            $count = intval($count);
            $db = Db::getConnection();

            $productsList = array();

            $result = $db -> query(
                'SELECT id,name,price,image,is_new FROM product'.
                ' WHERE status = "1"'.
                ' ORDER BY id DESC'. ' LIMIT '.$count
            );

            $i = 0 ;

            while ($row = $result->fetch()) {
                $productsList[$i]['id'] = $row['id'];
                $productsList[$i]['name'] = $row['name'];
                $productsList[$i]['price'] = $row['price'];
                $productsList[$i]['image'] = $row['image'];
                $productsList[$i]['is_new'] = $row['is_new'];
                $i++;
            }
            return $productsList;
        }

        public static function getProductsListByCategory($cat_id,$page=1){

                if ($cat_id) {
                    $db  = Db::getConnection();
                    $prodCatList = [];

                    $page = intval($page);
                    $offset = ($page-1)*self::SHOW_BY_DEFAULT;

                    $result = $db->query(
                        'SELECT id,name,price,image,is_new FROM product' .
                        ' WHERE status  = "1" AND category_id = ' . $cat_id .
                        ' ORDER BY id ASC ' .
                        ' LIMIT ' . self::SHOW_BY_DEFAULT." OFFSET ".$offset
                    );
                    $i = 0;

                    while ($row = $result->fetch()) {
                        $prodCatList[$i]['id'] = $row['id'];
                        $prodCatList[$i]['name'] = $row['name'];
                        $prodCatList[$i]['price'] = $row['price'];
                        $prodCatList[$i]['image'] = $row['image'];
                        $prodCatList[$i]['is_new'] = $row['is_new'];
                        $i++;
                    }
                }

                return $prodCatList;
        }

        public static function getProductById($id){

                if($id) {
                    $db = Db::getConnection();
                    $result = $db->query(
                        'SELECT * FROM product WHERE id = '.$id
                    );
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    return $result->fetch();
                }
                return -1;
        }

        public static function  getTotalProductsToCategory($cat_id){
            $db = Db::getConnection();
            $result = $db->query(
                'SELECT count(id) AS count FROM product '. 'WHERE status = "1" AND category_id ="'.$cat_id.'"'
            );

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result ->fetch();

            return $row['count'];
        }
    }