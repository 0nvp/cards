<?php

class CookieService extends db{
    protected $_cookie;
    protected $_result;

    public function __construct(){
        $this->_cookie=$_COOKIE['LOGIN'];
    }

    public function login(){
        session_start();
        $this->_checkCredentials();
        setcookie("LOGIN", $this->_result['id-cookie'], time() + 3600, "/");
        $_SESSION['data']=array("id-user"=>$this->_result['id-user'], "email"=>$this->_result['email'], "username"=>$this->_result['username'],
        "level"=>$this->_result['level'], "xp"=>$this->_result['xp']);
    }

    protected function _checkCredentials(){
        switch($this->_cookie){
            case empty($this->_cookie):
                $_SESSION['login']="cookie";
                header("location: ../../../login");
                exit();
                break;
            default:
                $stmt=$this->connect()->prepare("SELECT users.`id-user`, `id-cookie`, `email`, `username`, `level`, `xp` FROM `users` INNER JOIN `data` 
                ON users.`id-user`=data.`id-user` WHERE `id-cookie`=? AND `status`=\"active\";");
                $stmt->execute(array($this->_cookie));
                if($stmt->rowCount()==0){
                    $_SESSION['login']="cookie";
                    header("location: ../../../login");
                    exit();
                }
                break;
        }
        $this->_result=$stmt->fetch(PDO::FETCH_ASSOC);
        $stmt=null;
        return $this->_result;
    }
}
?>