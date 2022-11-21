<?php

class LoginService extends db{
    protected $_email;
    protected $_password;
    protected $_result;
    protected $_avatar;

    public function __construct(){
        $this->_email=strtolower($_POST['login-email']);
        $this->_password=$_POST['login-password'];
    }

    public function login(){
        session_start();
        $this->_checkCredentials();
        /*
        ** SET AVATAR
        */
        $this->_avatar=strtolower($this->_result['username'][0]);
        $this->_avatar="avatar_{$this->_avatar}.png";
        /*
        ** SET VARIABLES
        */
        setcookie("LOGIN", $this->_result['id-cookie'], time() + 3600, "/");
        $_SESSION['data']=array("id"=>$this->_result['id-user'], "email"=>$this->_result['email'], "username"=>$this->_result['username'],
        "avatar"=>$this->_avatar, "gold"=>$this->_result['gold'], "color"=>$this->_result['color'], "level"=>$this->_result['level'], "xp"=>$this->_result['xp']);
        // DEFAULT PAGE: HOME
        $_SESSION['p']="home";
    }

    protected function _checkCredentials(){
        /*
        ** EMAIL
        */
        switch($this->_email){
            case empty($this->_email):
                $_SESSION['login']="emptyEmail";
                header("location: ../../../login");
                exit();
                break;
            case !filter_var($this->_email, FILTER_VALIDATE_EMAIL):
                $_SESSION['login']="emailPolity";
                header("location: ../../../login");
                exit();
                break;
            default:
                break;
        }
        /*
        ** PASSWORD
        */
        switch($this->_password){
            case empty($this->_password):
                $_SESSION['login']="emptyPassword";
                header("location: ../../../login");
                exit();
                break;
            case !preg_match("/^[a-zA-Z0-9]*$/", $this->_password):
                $_SESSION['login']="passwordPolity";
                header("location: ../../../login");
                exit();
                break;
            default:
                $stmt=$this->connect()->prepare("SELECT users.`id-user`, `id-cookie`, `username`, `email`, `gold`, `color`, `level`, `xp` FROM `users` 
                INNER JOIN `data` ON users.`id-user`=data.`id-user` WHERE `email`=? AND `password`=? AND `status`=\"active\";");
                $stmt->execute(array($this->_email, hash("sha3-512", $this->_password)));
                if($stmt->rowCount()==0){
                    $_SESSION['login']="stmt";
                    header("location: ../../../login");
                    exit();
                }
                break;
        }
        /*
        ** CREDENTIALS PASSED
        */
        $this->_result=$stmt->fetch(PDO::FETCH_ASSOC);
        $stmt=null;
        return $this->_result;
    }
}
?>