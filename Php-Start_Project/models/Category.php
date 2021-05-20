<?php

class Category
{
    public static function getCategoryList()
    {
        $db = Db::getConnection();
        $categoryList = array();

        $result = $db->query('SELECT id,name,sort_order,status FROM category' .
            ' ORDER BY id ASC');

        $i = 0;

        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }

    public static function getCategoryById($id)
    {
        $db = Db::getConnection();
        $query = "SELECT * FROM category WHERE id = :id";
        $result = $db->prepare($query);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();

        $row = $result->fetch();
        return $row;
    }


    public static function addCategory($options)
    {
        $db = Db::getConnection();
        $query = "
                    INSERT INTO category(`name`,`sort_order`,`status`) VALUES (:name,:sort_order,:status)
            ";
        $status = ($options['hid'] == "yes") ? 0 : 1;

        $result = $db->prepare($query);
        $result->bindParam(":name", $options['name'], PDO::PARAM_STR);
        $result->bindParam(":sort_order", $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam(":status", $status, PDO::PARAM_INT);
        $result->execute();
    }

    public static function updateCategory($id, $options)
    {
        $db = Db::getConnection();
        $query = "
                    UPDATE  `category` 
                    SET `name` = :cat_name,
                    `sort_order` = :sort_order,
                    `status` = :status
                    WHERE `id` = :id
            ";
        $status = ($options['hid'] == "yes") ? 0 : 1;

        $result = $db->prepare($query);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->bindParam(":cat_name", $options['name'], PDO::PARAM_STR);
        $result->bindParam(":sort_order", $options['sort_order'], PDO::PARAM_INT);
        $result->bindParam(":status", $status, PDO::PARAM_INT);
        $result->execute();
    }

    public static function deleteCategory($id){
            $db = Db::getConnection();
            $query = "
                DELETE FROM `category`
                WHERE  `id` = :id
            ";
            $result = $db->prepare($query);
            $result->bindParam(":id",$id,PDO::PARAM_INT);
            $result->execute();
    }
}