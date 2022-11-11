<?php

class ResetService extends db{
    protected $_id;
    protected $_password;

    public function __construct(){
        $this->_id=$_GET['id-recovery'];
        $this->_password=$_POST['reset-password'];
    }

    public function reset(){
        session_start();
        $this->_checkCredentials();
        $_SESSION['login']="reset";
        header("location: ../../../login");
        exit();
    }

    protected function _checkCredentials(){
        switch($this->_id){
            case empty($this->_id):
                $_SESSION['login']="empty";
                header("location: ../../../recovery={$this->_id}");
                exit();
                break;
            default:
                break;
        }
        switch($this->_password){
            case empty($this->_password):
                $_SESSION['login']="empty";
                header("location: ../../../recovery={$this->_id}");
                exit();
                break;
            case !preg_match("/^[a-zA-Z0-9]*$/", $this->_password):
                $_SESSION['login']="password";
                header("location: ../../../recovery={$this->_id}");
                exit();
                break;
            default:
                $stmt=$this->connect()->prepare("SELECT `id-user` FROM `users` WHERE `id-recovery`=?;");
                $stmt->execute(array(hash("sha3-512", $this->_id)));
                if($stmt->rowCount()==0){
                    $_SESSION['login']="stmt";
                    header("location: ../../../recovery={$this->_id}");
                    exit();
                }
                break;
        }
        $stmt=$this->connect()->prepare("UPDATE `users` SET `password`=? WHERE `id-user` IN (SELECT `id-user` FROM `users` WHERE `id-recovery`=?);");
        $stmt->execute(array(hash("sha3-512", $this->_password), hash("sha3-512", $this->_id)));
        $stmt=$this->connect()->prepare("UPDATE `users` SET `id-recovery`=NULL WHERE `id-user` IN (SELECT `id-user` FROM `users` WHERE `id-recovery`=?);");
        $stmt->execute(array(hash("sha3-512", $this->_id)));
        $stmt=null;
    }
}
?>