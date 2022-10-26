<?php

class ResetService extends db{
    protected $_id;
    protected $_password;

    public function __construct(){
        $this->_id=$_GET['id-recovery'];
        $this->_password=$_POST['reset-password'];
    }

    public function reset(){
        $this->_checkCredentials();
        header("location: ../../../index.php");
        exit();
    }

    protected function _checkCredentials(){
        if(empty($this->_id) || empty($this->_password)){
            $_SESSION['login']="empty";
            header("location: ../../../index.php?id-recovery={$this->_recovery}");
            exit();
        }
        $stmt=$this->connect()->prepare("SELECT `id-user` FROM `recovery` WHERE `id-recovery`=?;");
        $stmt->execute(array(hash("sha3-512", $this->_id)));
        if($stmt->rowCount()==0){
            $_SESSION['login']="stmt";
            header("location: ../../../index.php?id-recovery={$this->_recovery}");
            exit();
        }
        $stmt=$this->connect()->prepare("UPDATE `users` SET `password`=? WHERE `id-user` IN (SELECT `id-user` FROM `recovery` WHERE `id-recovery`=?);");
        $stmt->execute(array(hash("sha3-512", $this->_password), hash("sha3-512", $this->_id)));
        $stmt=$this->connect()->prepare("UPDATE `recovery` SET `id-recovery`=NULL, `date`=NULL WHERE `id-user` IN (SELECT `id-user` FROM `recovery` WHERE `id-recovery`=?);");
        $stmt->execute(array(hash("sha3-512", $this->_id)));
        $stmt=null;
    }
}
?>