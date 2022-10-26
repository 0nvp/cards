<?php

class UsernameService extends db{
    protected $_id;
    protected $_username1;
    protected $_username2;

    public function __construct(){
        $this->_id=$_SESSION['data']['id'];
        $this->_username1=$_SESSION['data']['username'];
        $this->_username2=$_POST['username-username'];
    }

    public function username(){
        $this->_checkCredentials();
        $_SESSION['data']['username']=$this->_username2;
        header("location: ../../../home.php");
        exit();
    }

    protected function _checkCredentials(){
        if(empty($this->_id) || empty($this->_username2)){
            $_SESSION['home']="empty";
            header("location: ../../../home.php");
            exit();
        }
        if(($this->_username2==$this->_username1) && !preg_match("/^[a-zA-Z0-9]*$/", $this->_username2)){
            $_SESSION['home']="username";
            header("location: ../../../home.php");
            exit();
        }
        $stmt=$this->connect()->prepare("UPDATE `users` SET `username`=? WHERE `id-user`=?;");
        $stmt->execute(array($this->_username2, $this->_id));
        $stmt=null;
    }
}
?>