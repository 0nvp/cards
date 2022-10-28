<?php

class ResetService extends db{
    protected $_id;
    protected $_password;

    public function __construct(){
        $this->_id=$_GET['id-recovery'];
        $this->_password=$_POST['reset-password'];
    }

    public function reset(){
        session_start();
        $this->_checkCredentials();
        header("location: ../../../login");
        exit();
    }

    protected function _checkCredentials(){
        if(empty($this->_id) || empty($this->_password)){
            $_SESSION['login']="empty";
            header("location: ../../../login?id-recovery={$this->_id}");
            exit();
        }
        $stmt=$this->connect()->prepare("SELECT `id-user` FROM `users` WHERE `id-recovery`=?;");
        $stmt->execute(array(hash("sha3-512", $this->_id)));
        if($stmt->rowCount()==0){
            $_SESSION['login']="stmt";
            header("location: ../../../login?id-recovery={$this->_id}");
            exit();
        }
        $stmt=$this->connect()->prepare("UPDATE `users` SET `password`=? WHERE `id-user` IN (SELECT `id-user` FROM `users` WHERE `id-recovery`=?);");
        $stmt->execute(array(hash("sha3-512", $this->_password), hash("sha3-512", $this->_id)));
        $stmt=$this->connect()->prepare("UPDATE `users` SET `id-recovery`=NULL WHERE `id-user` IN (SELECT `id-user` FROM `users` WHERE `id-recovery`=?);");
        $stmt->execute(array(hash("sha3-512", $this->_id)));
        $stmt=null;
        $_SESSION['login']="reset";
    }
}
?>