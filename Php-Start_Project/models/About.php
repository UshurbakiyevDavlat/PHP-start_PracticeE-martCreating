<?php
class About{
    public static function getInfo(){
        $db = Db::getConnection();
        $query = '
            SELECT *FROM about
        ';
        $result = $db->prepare($query);
        $result->execute();

        $row = $result->fetch();

        return $row;
    }
}