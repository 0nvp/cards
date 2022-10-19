<?php

class PasswordService extends db{
    protected $_id;
    protected $_password1;
    protected $_password2;

    public function __construct(){
        $this->_id=$_SESSION['player']['id'];
        $this->_password1=$_POST['password-password1'];
        $this->_password2=$_POST['password-password2'];
    }

    public function password(){
        $this->_checkCredentials();
        setcookie("LOGIN", "", time() - 3600, "/");
        session_unset();
        session_destroy();
        header("location: ../../../index.php");
        exit();
    }

    protected function _checkCredentials(){
        if(empty($this->_password2)){
            $_SESSION['password']['empty']=true;
            header("location: ../../../profile.php");
            exit();
        }
        if($this->_password2==$this->_password1){
            $_SESSION['password']['password']=true;
            header("location: ../../../profile.php");
            exit();
        }
        $stmt=$this->connect()->prepare("SELECT `id-user` FROM `users` WHERE `password`=?;");
        $stmt->execute(array(hash("sha3-512", $this->_password1)));
        if($stmt->rowCount()==0){
            $_SESSION['password']['stmt']=true;
            header("location: ../../../profile.php");
            exit();
        }
        $stmt=$this->connect()->prepare("UPDATE `users` SET `password`=? WHERE `id-user`=?;");
        $stmt->execute(array(hash("sha3-512", $this->_password2), $this->_id));
        $stmt=null;
    }
}
?>