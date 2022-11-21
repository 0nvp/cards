<?php

class RemoveService extends db{
    protected $_id;
    protected $_password;

    public function __construct(){
        $this->_id=$_SESSION['data']['id'];
        $this->_password=hash("sha3-512", $_POST['drop-password']);
    }

    public function remove(){
        $this->_checkCredentials();
        /*
        ** SET VARIABLES
        */
        setcookie("LOGIN", "", time() - 3600, "/");
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['login']="drop";
        header("location: ../../../login");
        exit();
    }

    protected function _checkCredentials(){
        /*
        ** PASSWORD
        */
        switch($this->_password){
            case empty($this->_password):
                $_SESSION['home']="emptyPassword";
                header("location: ../../../home");
                exit();
                break;
            case !preg_match("/^[a-zA-Z0-9]*$/", $this->_password):
                $_SESSION['home']="passwordPolity";
                header("location: ../../../home");
                exit();
                break;
            default:
                $stmt=$this->connect()->prepare("SELECT `id-user` FROM `users` WHERE `password`=? AND `id-user`=?;");
                $stmt->execute(array($this->_password, $this->_id));
                if($stmt->rowCount()==0){
                    $_SESSION['home']="stmt";
                    header("location: ../../../home");
                    exit();
                }
                break;
        }
        /*
        ** CREDENTIALS PASSED
        */
        $stmt=$this->connect()->prepare("UPDATE `users` SET `status`=\"removed\" WHERE `id-user`=?;");
        $stmt->execute(array($this->_id));
        $stmt=null;
    }
}
?>