<?php

class db{
    protected function connect(){
        $db=new PDO("mysql:host=localhost;dbname=coode;charset=utf8", "root", "");
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    }
}
?>