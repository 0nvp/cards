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
        $this->_checkCredentials();
        setcookie("alert", "<span style=\"color:lawngreen;\">account has been successfully created</span>", time() + 5, "/");
        header("location: ../../index.php");
        exit();
    }

    protected function _checkCredentials(){
        if(empty($this->_email) || empty($this->_username) || empty($this->_password)){
            setcookie("alert", "<span style=\"color:red;\">register error</span>", time() + 5, "/");
            header("location: ../../register.php");
            exit();
        }
        $stmt=$this->connect()->prepare("SELECT `email` FROM `users` WHERE `email`=?;");
        $stmt->execute(array($this->_email));
        if($stmt->rowCount()>0){
            setcookie("alert", "<span style=\"color:red;\">register error</span>", time() + 5, "/");
            header("location: ../../register.php");
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