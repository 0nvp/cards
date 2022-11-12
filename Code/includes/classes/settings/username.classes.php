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
        $_SESSION['home']="saved";
        $_SESSION['data']['username']=$this->_username2;
        header("location: ../../../home");
        exit();
    }

    protected function _checkCredentials(){
        switch($this->_username2){
            case empty($this->_username2):
                $_SESSION['home']="emptyUsername";
                header("location: ../../../home");
                exit();
                break;
            case $this->_username2==$this->_username1:
                $_SESSION['home']="usernameMatch";
                header("location: ../../../home");
                exit();
                break;
            case !preg_match("/^[a-zA-Z0-9]*$/", $this->_username2):
                $_SESSION['home']="usernamePolity";
                header("location: ../../../home");
                exit();
                break;
            default:
                $stmt=$this->connect()->prepare("SELECT `username` FROM `data` WHERE `username`=?;");
                $stmt->execute(array($this->_username));
                if($stmt->rowCount()>0){
                    $_SESSION['home']="usernameUse";
                    header("location: ../../../sign-up");
                    exit();
                }
                break;
        }
        $stmt=$this->connect()->prepare("UPDATE `data` SET `username`=? WHERE `id-user`=?;");
        $stmt->execute(array($this->_username2, $this->_id));
        $stmt=null;
    }
}
?>