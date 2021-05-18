<?php
class Blog {
    const SHOW_BY_DEFAULT = 4;

    public static function getNews($page = 1){
        $db = Db::getConnection();
        $offset = ($page-1)*self::SHOW_BY_DEFAULT;

        $query = '
            SELECT *FROM news'.
         ' ORDER BY id ASC ' .
        ' LIMIT ' . self::SHOW_BY_DEFAULT." OFFSET ".$offset
        ;
        
        $result = $db->prepare($query);
        $result->execute();
        $news = [];
        $i=0;
        while ($row = $result->fetch()) {
            $news[$i]['id'] = $row['id'];
            $news[$i]['title'] = $row['title'];
            $news[$i]['date'] = $row['date'];
            $news[$i]['short_content'] = $row['short_content'];
            $news[$i]['full_content'] = $row['full_content'];
            $news[$i]['author_name'] = $row['author_name'];
            $i++;
        }

        return $news;
    }

    public static function getArticleById($id){
        $db = Db::getConnection();
        $query = '
        SELECT * FROM news WHERE id = :id
        ';
        $result = $db->prepare($query);
        $result->bindParam(":id",$id,PDO::PARAM_INT);
        $result->execute();

        $item = $result->fetch();

        return $item;
    }

    public static function getTotalAtricles() {
        $db = Db::getConnection();
        $result = $db->query(
            'SELECT count(id) AS count FROM news '
        );

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result ->fetch();

        return $row['count'];
    }
}