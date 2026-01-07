<?php
class Comments {

    public static function insertComment($c, $id)
    {
        $query = "INSERT INTO `comments` (`id`, `news_id`, `text`, `date`) 
                  VALUES (NULL, '" . $id . "', '" . $c . "', CURRENT_TIMESTAMP)";
        $db = new Database();
        $q = $db->executeRun($query);
        return $q;
    }

    public static function getCommentByNewsID($id) {
        $query = "SELECT * FROM comments WHERE news_id=" . $id . " ORDER BY id DESC";
        $db = new Database();
        $q = $db->getAll($query);
        return $q;
    }

    public static function getCommentsCountByNewsID($id) {
        $query = "SELECT count(id) as 'count' FROM comments WHERE news_id=" . $id;
        $db = new Database();
        $q = $db->getOne($query);
        return $q['count'];
    }

}
?>