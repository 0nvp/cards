<?php

class EmailService extends db{
    protected $_id;
    protected $_email1;
    protected $_email2;

    public function __construct(){
        $this->_id=$_SESSION['data']['id'];
        $this->_email1=$_SESSION['data']['email'];
        $this->_email2=strtolower($_POST['email-email']);
    }

    public function email(){
        $this->_checkCredentials();
        $_SESSION['data']['email']=$this->_email2;
        header("location: ../../../profile.php");
        exit();
    }

    protected function _checkCredentials(){
        if(empty($this->_id) || empty($this->_email2)){
            $_SESSION['email']['empty']=true;
            header("location: ../../../profile.php");
            exit();
        }
        if(($this->_email2==$this->_email1) && !filter_var($this->_email2, FILTER_VALIDATE_EMAIL)){
            $_SESSION['email']['email']=true;
            header("location: ../../../profile.php");
            exit();
        }
        $stmt=$this->connect()->prepare("SELECT `email` FROM `users` WHERE `id-user`!=? AND `email`=?;");
        $stmt->execute(array($this->_id, $this->_email2));
        if($stmt->rowCount()>0){
            $_SESSION['email']['stmt']=true;
            header("location: ../../../profile.php");
            exit();
        }
        $stmt=$this->connect()->prepare("UPDATE `users` SET `email`=? WHERE `id-user`=?;");
        $stmt->execute(array($this->_email2, $this->_id));
        $stmt=null;
    }
}
?>