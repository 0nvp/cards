<?php

class UsernameService extends db{
    protected $_id;
    protected $_username1;
    protected $_username2;

    public function __construct(){
        $this->_id=$_SESSION['player']['id'];
        $this->_username1=$_SESSION['player']['username'];
        $this->_username2=$_POST['username-username'];
    }

    public function username(){
        $this->_checkCredentials();
        $_SESSION['player']['username']=$this->_username2;
        header("location: ../../profile.php");
        exit();
    }

    protected function _checkCredentials(){
        if(empty($this->_id) || empty($this->_username2)){
            setcookie("alert", "<span style=\"color:red;\">update personal data error</span>", time() + 5, "/");
            header("location: ../../profile.php");
            exit();
        }
        if($this->_username2==$this->_username1){
            setcookie("alert", "<span style=\"color:red;\">update personal data error</span>", time() + 5, "/");
            header("location: ../../profile.php");
            exit();
        }
        $stmt=$this->connect()->prepare("UPDATE `users` SET `username`=? WHERE `id-user`=?;");
        $stmt->execute(array($this->_username2, $this->_id));
        $stmt=null;
    }
}
?>