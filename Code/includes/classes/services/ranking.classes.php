<?php

class RankingService extends db{

    public function ranking(){
        $ranking=$this->_checkCredentials();
        $_SESSION['ranking']['array']=$ranking;
        header("location: ../../../home");
        exit();
    }

    protected function _checkCredentials(){
        $stmt=$this->connect()->query("SELECT `username`, `color`, `tag`, `level`, `gold` FROM `users` INNER JOIN `data` ON users.`id-user`=data.`id-user` 
        WHERE `status`=\"active\" 
        ORDER BY `gold` DESC LIMIT 5;");
        $ranking=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=null;
        return $ranking;
    }
}