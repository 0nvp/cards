<?php

class LoginService extends db{
    protected $_email;
    protected $_password;
    protected $_result;

    public function __construct(){
        $this->_email=strtolower($_POST['login-email']);
        $this->_password=$_POST['login-password'];
    }

    public function login(){
        session_start();
        $this->_checkCredentials();
        setcookie("LOGIN", $this->_result['id-cookie'], time() + 3600, "/");
        $_SESSION['player']=array("id"=>$result['id-user'],"email"=>$this->_result['email'],"username"=>$this->_result['username']);
    }

    protected function _checkCredentials(){
        if(empty($this->_email) || empty($this->_password)){
            $_SESSION['login']['empty']=true;
            header("location: ../../../index.php");
            exit();
        }
        if(!filter_var($this->_email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['login']['email']=true;
            header("location: ../../../index.php");
            exit();
        }
        $stmt=$this->connect()->prepare("SELECT users.`id-user`, `id-cookie`, `username`, `email`, `status`, `date` FROM `users` 
        INNER JOIN `status` ON users.`id-user`=status.`id-user` 
        WHERE `email`=? AND `password`=? AND status.`status`=\"active\";");
        $stmt->execute(array($this->_email, hash("sha3-512", $this->_password)));
        if($stmt->rowCount()==0){
            $_SESSION['login']['stmt']=true;
            header("location: ../../../index.php");
            exit();
        }
        $this->_result=$stmt->fetch(PDO::FETCH_ASSOC);
        $stmt=null;
        return $this->_result;
    }
}
?>