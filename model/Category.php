<?php
class Category{

    public static function getAllCategories() {
        $query = "SELECT * FROM category" ;
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

}       