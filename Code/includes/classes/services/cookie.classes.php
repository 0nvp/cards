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
        $_SESSION['data']=array("id-user"=>$this->_result['id-user'],"email"=>$this->_result['email'],"username"=>$this->_result['username']);
    }

    protected function _checkCredentials(){
        if(empty($this->_cookie)){
            $_SESSION['login']['stmt']=true;
            header("location: ../../../index.php");
            exit();
        }
        $stmt=$this->connect()->prepare("SELECT users.`id-user`, `id-cookie`, `email`, `username` FROM `users` INNER JOIN `status` ON users.`id-user`=status.`id-user` 
        WHERE `id-cookie`=? AND `status`=\"active\";");
        $stmt->execute(array($this->_cookie));
        if($stmt->rowCount()==0){
            $_SESSION['login']['stmt']=true;
            header("location: ../../../index.php");
            exit();
        }
        $this->_result=$stmt->fetch(PDO::FETCH_ASSOC);
        $stmt=null;
        return $this->_result;
    }
}
?>