<?php

class RankingService extends db{
    protected $_id;

    public function __construct(){
        $this->_id=$_SESSION['data']['id'];
    }

    public function ranking(){
        $ranking=$this->_checkCredentials();
        /*
        ** SET VARIABLES
        */
        $_SESSION['ranking']['array']=$ranking;
        $_SESSION['shop']['array']=$shop;
        header("location: ../../../home");
        exit();
    }

    protected function _checkCredentials(){
        /*
        ** RANKING
        */
        $stmt=$this->connect()->query("SELECT `username`, `color`, `tag`, `level`, `gold` FROM `users` INNER JOIN `data` ON users.`id-user`=data.`id-user` 
        WHERE `status`=\"active\" 
        ORDER BY `gold` DESC LIMIT 5;");
        $ranking=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=null;
        /*
        ** SHOP
        */
        $stmt=$this->connect()->prepare("SELECT * FROM `shop` WHERE `id-user`=?;");
        $stmt->execute(array($this->_id));
        $shop=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=null;
        return $ranking;
    }
}