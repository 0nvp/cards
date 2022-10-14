<?php

class LoginService extends db{
    protected $_email;
    protected $_password;

    public function __construct(){
        $this->_email=strtolower($_POST['login-email']);
        $this->_password=$_POST['login-password'];
    }

    public function login(){
        $result=$this->_checkCredentials();
        session_start();
        setcookie("LOGIN", $result['id-cookie'], time() + 3600, "/");
        $_SESSION['player']=array("id"=>$result['id-user'],"email"=>$result['email'],"username"=>$result['username']);
    }

    protected function _checkCredentials(){
        if(empty($this->_email) || empty($this->_password)){
            setcookie("alert", "<span style=\"color:red;\">user not found</span>", time() + 5, "/");
            header("location: ../../index.php");
            exit();
        }
        $stmt=$this->connect()->prepare("SELECT users.`id-user`, `id-cookie`, `username`, `email`, `status`, `date` FROM `users` INNER JOIN `status` ON users.`id-user`=status.`id-user` 
        WHERE `email`=? AND `password`=? AND status.`status`=\"active\";");
        $stmt->execute(array($this->_email, hash("sha3-512", $this->_password)));
        if($stmt->rowCount()==0){
            setcookie("alert", "<span style=\"color:red;\">user not found</span>", time() + 5, "/");
            header("location: ../../index.php");
            exit();
        }
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $stmt=null;
        return $result;
    }
}
?>