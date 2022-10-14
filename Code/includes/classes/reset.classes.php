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
        setcookie("alert", "<span style=\"color:lawngreen;\">password has been successfully changed</span>", time() + 5, "/");
        header("location: ../../index.php");
        exit();
    }

    protected function _checkCredentials(){
        if(empty($this->_id) || empty($this->_password)){
            setcookie("alert", "<span style=\"color:red;\">user not found</span>", time() + 5, "/");
            header("location: ../../reset.php?id-recovery={$this->_recovery}");
            exit();
        }
        $stmt=$this->connect()->prepare("SELECT `id-user` FROM `recovery` WHERE `id-recovery`=?;");
        $stmt->execute(array(hash("sha3-512", $this->_id)));
        if($stmt->rowCount()==0){
            setcookie("alert", "<span style=\"color:red;\">user not found</span>", time() + 5, "/");
            header("location: ../../reset.php?id-recovery={$this->_recovery}");
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