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
        $_SESSION['login']="account";
        header("location: ../../../login");
        exit();
    }

    protected function _checkCredentials(){
        switch($this->_password){
            case empty($this->_password):
                $_SESSION['register']="emptyPassword";
                header("location: ../../../sign-up");
                exit();
                break;
            case !preg_match("/^[a-zA-Z0-9]*$/", $this->_password):
                $_SESSION['register']="password";
                header("location: ../../../sign-up");
                exit();
                break;
            default:
                break;
        }
        switch($this->_username) {
            case empty($this->_username):
                $_SESSION['register']="emptyUsername";
                header("location: ../../../sign-up");
                exit();
                break;
            case !preg_match("/^[a-zA-Z0-9]*$/", $this->_username):
                $_SESSION['register']="username";
                header("location: ../../../sign-up");
                exit();
                break;
            default:
                $stmt=$this->connect()->prepare("SELECT `username` FROM `data` WHERE `username`=?;");
                $stmt->execute(array($this->_username));
                if($stmt->rowCount()>0){
                    $_SESSION['register']="username";
                    header("location: ../../../sign-up");
                    exit();
                }
                break;
        }
        switch($this->_email){
            case empty($this->_email):
                $_SESSION['register']="emptyEmail";
                header("location: ../../../sign-up");
                exit();
                break;
            case !filter_var($this->_email, FILTER_VALIDATE_EMAIL):
                $_SESSION['register']="email";
                header("location: ../../../sign-up");
                exit();
                break;
            default:
                $stmt=$this->connect()->prepare("SELECT `email` FROM `users` WHERE `email`=?;");
                $stmt->execute(array($this->_email));
                if($stmt->rowCount()>0){
                    $_SESSION['register']="stmt";
                    header("location: ../../../sign-up");
                    exit();
                }
                break;
        }
        $stmt=$this->connect()->prepare("INSERT INTO `users` (`id-cookie`, `email`, `password`) VALUES (?, ?, ?);");
        $stmt->execute(array(hash("sha3-512", $this->_cookie), $this->_email, hash("sha3-512", $this->_password)));
        $stmt=$this->connect()->prepare("INSERT INTO `data` (`username`) VALUES (?);");
        $stmt->execute(array($this->_username));
        $stmt=null;
    }
}
?>