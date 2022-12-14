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
        /*
        ** SET VARIABLES
        */
        $_SESSION['home']="saved";
        $_SESSION['data']['email']=$this->_email2;
        header("location: ../../../home");
        exit();
    }

    protected function _checkCredentials(){
        /*
        ** EMAIL
        */
        switch($this->_email2){
            case empty($this->_email2):
                $_SESSION['home']="emptyEmail";
                header("location: ../../../home");
                exit();.
                break;
            case $this->_email2==$this->_email1:
                $_SESSION['home']="emailMatch";
                header("location: ../../../home");
                exit();
                break;
            case !filter_var($this->_email2, FILTER_VALIDATE_EMAIL):
                $_SESSION['home']="emailPolity";
                header("location: ../../../home");
                exit();
                break;
            default:
                $stmt=$this->connect()->prepare("SELECT `email` FROM `users` WHERE `id-user`!=? AND `email`=?;");
                $stmt->execute(array($this->_id, $this->_email2));
                if($stmt->rowCount()>0){
                    $_SESSION['home']="stmt";
                    header("location: ../../../home");
                    exit();
                }
                break;
        }
        /*
        ** CREDENTIALS PASSED
        */
        $stmt=$this->connect()->prepare("UPDATE `users` SET `email`=? WHERE `id-user`=?;");
        $stmt->execute(array($this->_email2, $this->_id));
        $stmt=null;
    }
}
?>