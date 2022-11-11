<?php

class PasswordService extends db{
    protected $_id;
    protected $_password1;
    protected $_password2;

    public function __construct(){
        $this->_id=$_SESSION['data']['id'];
        $this->_password1=$_POST['password-password1'];
        $this->_password2=$_POST['password-password2'];
    }

    public function password(){
        $this->_checkCredentials();
        setcookie("LOGIN", "", time() - 3600, "/");
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['login']="update";
        header("location: ../../../login");
        exit();
    }

    protected function _checkCredentials(){
        switch($this->_password2){
            case empty($this->_password2):
                $_SESSION['home']="emptyPassword";
                header("location: ../../../home");
                exit();
                break;
            case $this->_password2==$this->_password1:
                $_SESSION['home']="password";
                header("location: ../../../home");
                exit();
                break;
            case !preg_match("/^[a-zA-Z0-9]*$/", $this->_password2):
                $_SESSION['home']="password";
                header("location: ../../../home");
                exit();
                break;
            default:
                $stmt=$this->connect()->prepare("SELECT `id-user` FROM `users` WHERE `password`=?;");
                $stmt->execute(array(hash("sha3-512", $this->_password1)));
                if($stmt->rowCount()==0){
                    $_SESSION['home']="stmt";
                    header("location: ../../../home");
                    exit();
                }
                break;
        }
        $stmt=$this->connect()->prepare("UPDATE `users` SET `password`=? WHERE `id-user`=?;");
        $stmt->execute(array(hash("sha3-512", $this->_password2), $this->_id));
        $stmt=null;
    }
}
?>