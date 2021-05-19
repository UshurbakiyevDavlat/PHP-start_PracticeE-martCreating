<?php
class AdminBase{
    public static function checkAdminRight($id){
            $db = Db::getConnection();
            $query = "
                SELECT *FROM user WHERE id = :id
            ";
            $result = $db->prepare($query);
            $result->bindParam(":id",$id,PDO::PARAM_STR);
            $result->execute();

            $row = $result->fetch();
            if ($row['user_role'] == 'admin')return true;
            return  false;
    }
}