<?php

class RankingService extends db{

    public function ranking(){
        $ranking=$this->_checkCredentials();
        $_SESSION['ranking']['array']=$ranking;
        header("location: ../../home.php");
        exit();
    }

    protected function _checkCredentials(){
        $stmt=$this->connect()->query("SELECT `username`, `deck1`, `deck2`, `time`, `win` FROM `ranking` INNER JOIN `users` ON ranking.`id-user`=users.`id-user` 
        INNER JOIN `status` ON users.`id-user`=`status`.`id-user` WHERE `status` = \"active\";");
        $ranking=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=null;
        return $ranking;
    }
}