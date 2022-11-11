<?php

class RecoveryService extends db{
    protected $_email;
    protected $_recovery;

    public function __construct(){
        $this->_email=strtolower($_POST['recovery-email']);
        $this->_recovery=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_"), 0, 64);
    }

    public function recovery(){
        session_start();
        $this->_checkCredentials();
        header("location: ../../../config/email.php?id-recovery={$this->_recovery}");
        exit();
    }

    protected function _checkCredentials(){
        switch($this->_email){
            case empty($this->_email):
                $_SESSION['login']="stmt";
                header("location: ../../../login");
                exit();
                break;
            case !filter_var($this->_email, FILTER_VALIDATE_EMAIL):
                $_SESSION['login']="email";
                header("location: ../../../login");
                exit();
                break;
            default:
                $stmt=$this->connect()->prepare("SELECT `id-user` FROM `users` WHERE `id-user` IN (SELECT `id-user` FROM `users` WHERE `email`=?) AND `status`=\"active\";");
                $stmt->execute(array($this->_email));
                if($stmt->rowCount()==0){
                    $_SESSION['login']="stmt";
                    header("location: ../../../login");
                    exit();
                }
                break;
        }
        $stmt=$this->connect()->prepare("UPDATE `users` SET `id-recovery`=? WHERE `id-user` IN (SELECT `id-user` FROM `users` WHERE `email`=?);");
        $stmt->execute(array(hash("sha3-512", $this->_recovery), $this->_email));
        $stmt=null;
    }
}
?>