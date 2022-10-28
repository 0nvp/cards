<?php

class RankingService extends db{

    public function ranking(){
        $ranking=$this->_checkCredentials();
        $_SESSION['ranking']['array']=$ranking;
        header("location: ../../../home");
        exit();
    }

    protected function _checkCredentials(){
        $stmt=$this->connect()->query("SELECT `username`, `level` FROM `users` INNER JOIN `data` ON users.`id-user`=data.`id-user` WHERE `status`=\"active\";");
        $ranking=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=null;
        return $ranking;
    }
}