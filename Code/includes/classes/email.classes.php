<?php

class EmailService extends db{
    protected $_id;
    protected $_email1;
    protected $_email2;

    public function __construct(){
        $this->_id=$_SESSION['player']['id'];
        $this->_email1=$_SESSION['player']['email'];
        $this->_email2=strtolower($_POST['email-email']);
    }

    public function email(){
        $this->_checkCredentials();
        $_SESSION['player']['email']=$this->_email2;
        header("location: ../../profile.php");
        exit();
    }

    protected function _checkCredentials(){
        if(empty($this->_id) || empty($this->_email2)){
            setcookie("alert", "<span style=\"color:red;\">update personal data error</span>", time() + 5, "/");
            header("location: ../../profile.php");
            exit();
        }
        if($this->_email2==$this->_email1){
            setcookie("alert", "<span style=\"color:red;\">update personal data error</span>", time() + 5, "/");
            header("location: ../../profile.php");
            exit();
        }
        $stmt=$this->connect()->prepare("SELECT `email` FROM `users` WHERE `id-user`!=? AND `email`=?;");
        $stmt->execute(array($this->_id, $this->_email2));
        if($stmt->rowCount()>0){
            setcookie("alert", "<span style=\"color:red;\">update personal data error</span>", time() + 5, "/");
            header("location: ../../profile.php");
            exit();
        }
        $stmt=$this->connect()->prepare("UPDATE `users` SET `email`=? WHERE `id-user`=?;");
        $stmt->execute(array($this->_email2, $this->_id));
        $stmt=null;
    }
}
?>