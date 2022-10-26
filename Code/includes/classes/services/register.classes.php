<?php

class RegisterService extends db{
    protected $_cookie;
    protected $_email;
    protected $_username;
    protected $_password;

    public function __construct(){
        $this->_cookie=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0, 32);
        $this->_email=strtolower($_POST['register-email']);
        $this->_username=$_POST['register-username'];
        $this->_password=$_POST['register-password'];
    }

    public function register(){
        session_start();
        $this->_checkCredentials();
        header("location: ../../../index.php");
        exit();
    }

    protected function _checkCredentials(){
        if(empty($this->_email) || empty($this->_username) || empty($this->_password)){
            $_SESSION['register']="empty";
            header("location: ../../../register.php");
            exit();
        }
        if(!filter_var($this->_email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['register']="email";
            header("location: ../../../register.php");
            exit();
        }
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->_username)){
            $_SESSION['register']="username";
            header("location: ../../../register.php");
            exit();
        }
        $stmt=$this->connect()->prepare("SELECT `email` FROM `users` WHERE `email`=?;");
        $stmt->execute(array($this->_email));
        if($stmt->rowCount()>0){
            $_SESSION['register']="stmt";
            header("location: ../../../register.php");
            exit();
        }
        $stmt=$this->connect()->prepare("INSERT INTO `users` (`id-cookie`, `username`, `email`, `password`) VALUES (?, ?, ?, ?);");
        $stmt->execute(array(hash("sha3-512", $this->_cookie), $this->_username, $this->_email, hash("sha3-512", $this->_password)));
        $stmt=$this->connect()->query("INSERT INTO `status` (`id-user`) VALUES (NULL);");
        $stmt=$this->connect()->query("INSERT INTO `recovery` (`id-user`) VALUES (NULL);");
        $stmt=null;
    }
}
?>