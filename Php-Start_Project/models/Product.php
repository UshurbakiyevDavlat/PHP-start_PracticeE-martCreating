<?php

class Product
{
    const SHOW_BY_DEFAULT = 6;

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query(
            'SELECT id,name,price,image,is_new FROM product' .
            ' WHERE status = "1"' .
            ' ORDER BY id DESC' . ' LIMIT ' . $count
        );

        $i = 0;

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

    public static function getProductsListByCategory($cat_id, $page = 1)
    {

        if ($cat_id) {
            $db = Db::getConnection();
            $prodCatList = [];

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $result = $db->query(
                'SELECT id,name,price,image,is_new FROM product' .
                ' WHERE status  = "1" AND category_id = ' . $cat_id .
                ' ORDER BY id ASC ' .
                ' LIMIT ' . self::SHOW_BY_DEFAULT . " OFFSET " . $offset
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

    public static function getProductById($id)
    {

        if ($id) {
            $db = Db::getConnection();
            $result = $db->query(
                'SELECT * FROM product WHERE id = ' . $id
            );
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
        return -1;
    }

    public static function getTotalProductsToCategory($cat_id)
    {
        $db = Db::getConnection();
        $result = $db->query(
            'SELECT count(id) AS count FROM product ' . 'WHERE status = "1" AND category_id ="' . $cat_id . '"'
        );

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    public static function getRecAProducts()
    {
        $db = Db::getConnection();
        $query = '
                SELECT *FROM product WHERE is_recommended = 1 AND is_new = 1
            ';

        $result = $db->prepare($query);

        $result->execute();

        $recProd = [];
        $i = 0;
        while ($row = $result->fetch()) {
            $recProd[$i]['id'] = $row ['id'];
            $recProd[$i]['name'] = $row ['name'];
            $recProd[$i]['category_id'] = $row ['category_id'];
            $recProd[$i]['code'] = $row ['code'];
            $recProd[$i]['price'] = $row ['price'];
            $recProd[$i]['availability'] = $row ['availability'];
            $recProd[$i]['brand'] = $row ['brand'];
            $recProd[$i]['image'] = $row ['image'];
            $recProd[$i]['description'] = $row ['description'];
            $recProd[$i]['is_new'] = $row ['is_new'];
            $recProd[$i]['is_recommended'] = $row ['is_recommended'];
            $recProd[$i]['status'] = $row ['status'];
            $i++;
        }
        return $recProd;


    }

    public static function getRecIProducts()
    {
        $db = Db::getConnection();
        $query = '
                SELECT *FROM product WHERE is_recommended = 1 AND is_new = 0
            ';

        $result = $db->prepare($query);

        $result->execute();

        $recProd = [];
        $i = 0;
        while ($row = $result->fetch()) {
            $recProd[$i]['id'] = $row ['id'];
            $recProd[$i]['name'] = $row ['name'];
            $recProd[$i]['category_id'] = $row ['category_id'];
            $recProd[$i]['code'] = $row ['code'];
            $recProd[$i]['price'] = $row ['price'];
            $recProd[$i]['availability'] = $row ['availability'];
            $recProd[$i]['brand'] = $row ['brand'];
            $recProd[$i]['image'] = $row ['image'];
            $recProd[$i]['description'] = $row ['description'];
            $recProd[$i]['is_new'] = $row ['is_new'];
            $recProd[$i]['is_recommended'] = $row ['is_recommended'];
            $recProd[$i]['status'] = $row ['status'];
            $i++;
        }
        return $recProd;


    }

    public static function getProducts(){
        $db = Db::getConnection();
        $query = "
            SELECT *FROM product
        ";
        $result = $db->prepare($query);
        $result->execute();

        $i = 0;
        $products = [];

        while($row = $result->fetch()){
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }

    public static function deleteProduct($id){
        $db = Db::getConnection();
        $query = "
            DELETE FROM product WHERE status = 1 AND id = :id
        ";
        $result = $db->prepare($query);
        $result->bindParam(":id",$id,PDO::PARAM_INT);
        $result->execute();

    }

    public static function getOptionsCat($cat){
        switch ($cat){
            case "Рубашки": return 1;
            case "Брюки": return 2 ;
            case "Обувь" : return  3;
            case "Зимняя одежда": return 4 ;
            case "Летняя одежда": return 5  ;
            case "Демисезон": return 6 ;
            case "Акссесуары": return 7 ;
            case "Ювелирные украшения" : return  8;
        }
    }
    public static function getOptionsAvail($avail){
        switch ($avail){
            case "В наличии":return 1;
            case "Под заказ":return 0;
        }
    }

    public static function getOptionsNeww($nw){
        switch ($nw){
            case "yes":return 1;
            case "no":return 0;
        }
    }
    public static function getOptionsRec($rec){
        switch ($rec){
            case "yes":return 1;
            case "no":return 0;
        }
    }
    public static function getOptionsStat($stat){
        switch ($stat){
            case "yes":return 0;
            case "no":return 1;
        }
    }

    public static function addProduct($options){
        $db = Db::getConnection();
        $query = "
            INSERT INTO product 
             (code,name,category_id,price,brand,description,availability,is_new,is_recommended,status)
             VALUES (:article,:name,:catid,:price,:brand,:des,:avail,:neww,:rec,:status)
        ";

        $cat = self::getOptionsCat($options['category']) ;
        $avail = self::getOptionsAvail($options['avail']);
        $neww = self::getOptionsNeww($options['new']);
        $rec = self::getOptionsRec($options['rec']);
        $status =self::getOptionsStat($options['hid']) ;

        $result = $db->prepare($query);
        $result->bindParam(":article",$options['article'],PDO::PARAM_STR);
        $result->bindParam(":name",$options['name'],PDO::PARAM_STR);
        $result->bindParam(":catid",$cat);
        $result->bindParam(":price",$options['price'],PDO::PARAM_STR);
        $result->bindParam(":brand",$options['brand'],PDO::PARAM_STR);
        $result->bindParam(":des",$options['description'],PDO::PARAM_STR);
        $result->bindParam(":avail",$avail,PDO::PARAM_INT);
        $result->bindParam(":neww",$neww,PDO::PARAM_INT);
        $result->bindParam(":rec",$rec,PDO::PARAM_INT);
        $result->bindParam(":status",$status,PDO::PARAM_INT);

        $result->execute();
    }

    public static function updateProduct($id,$options){
        $db = Db::getConnection();
        $query = "
            UPDATE product 
            SET code = :article,
                name = :name,
                category_id = :catid,
                price = :price,
                brand = :brand,
                description = :des,
                availability = :avail,
                is_new =:neww,
                is_recommended = :rec,
                status = :status
            WHERE id = :id
        ";

        $cat = self::getOptionsCat($options['category']) ;
        $avail = self::getOptionsAvail($options['avail']);
        $neww = self::getOptionsNeww($options['new']);
        $rec = self::getOptionsRec($options['rec']);
        $status =self::getOptionsStat($options['hid']) ;

        $result = $db->prepare($query);
        $result->bindParam(":id",$id,PDO::PARAM_INT);
        $result->bindParam(":article",$options['article'],PDO::PARAM_STR);
        $result->bindParam(":name",$options['name'],PDO::PARAM_STR);
        $result->bindParam(":catid",$cat);
        $result->bindParam(":price",$options['price'],PDO::PARAM_STR);
        $result->bindParam(":brand",$options['brand'],PDO::PARAM_STR);
        $result->bindParam(":des",$options['description'],PDO::PARAM_STR);
        $result->bindParam(":avail",$avail,PDO::PARAM_INT);
        $result->bindParam(":neww",$neww,PDO::PARAM_INT);
        $result->bindParam(":rec",$rec,PDO::PARAM_INT);
        $result->bindParam(":status",$status,PDO::PARAM_INT);

        $result->execute();
    }
}