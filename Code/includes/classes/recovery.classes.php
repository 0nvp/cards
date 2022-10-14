<?php

class RecoveryService extends db{
    protected $_email;
    protected $_recovery;

    public function __construct(){
        $this->_email=strtolower($_POST['recovery-email']);
        $this->_recovery=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_"), 0, 64);
    }

    public function recovery(){
        $this->_checkCredentials();
        setcookie("alert", "<span style=\"color:black;\">reset.php?id-recovery={$this->_recovery}</span>", time() + 5, "/");
        header("location: ../../config/email.php");
        exit();
    }

    protected function _checkCredentials(){
        if(empty($this->_email)){
            setcookie("alert", "<span style=\"color:red;\">user not found</span>", time() + 5, "/");
            header("location: ../../index.php");
            exit();
        }
        $stmt=$this->connect()->prepare("SELECT recovery.`id-user` FROM `recovery` INNER JOIN `status` ON recovery.`id-user`=status.`id-user` 
        WHERE recovery.`id-user` IN (SELECT `id-user` FROM `users` WHERE `email`=?) AND `status`=\"active\";");
        $stmt->execute(array($this->_email));
        if($stmt->rowCount()==0){
            setcookie("alert", "<span style=\"color:red;\">user not found</span>", time() + 5, "/");
            header("location: ../../index.php");
            exit();
        }
        $stmt=$this->connect()->prepare("UPDATE `recovery` SET `id-recovery`=? WHERE `id-user` IN (SELECT `id-user` FROM `users` WHERE `email`=?);");
        $stmt->execute(array(hash("sha3-512", $this->_recovery), $this->_email));
        $stmt=null;
    }
}
?>