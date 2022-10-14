<?php

class CookieService extends db{
    protected $_cookie;

    public function __construct(){
        $this->_cookie=$_COOKIE['LOGIN'];
    }

    public function login(){
        $result=$this->_checkCredentials();
        session_start();
        setcookie("LOGIN", $result['id-cookie'], time() + 3600, "/");
        $_SESSION['player']=array("id-user"=>$result['id-user'],"email"=>$result['email'],"username"=>$result['username']);
    }

    protected function _checkCredentials(){
        if(empty($this->_cookie)){
            setcookie("alert", "<span style=\"color:red;\">user not found</span>", time() + 5, "/");
            header("location: ../../index.php");
            exit();
        }
        $stmt=$this->connect()->prepare("SELECT users.`id-user`, `id-cookie`, `email`, `username` FROM `users` INNER JOIN `status` ON users.`id-user`=status.`id-user` 
        WHERE `id-cookie`=? AND `status`=\"active\";");
        $stmt->execute(array($this->_cookie));
        if($stmt->rowCount()==0){
            setcookie("alert", "<span style=\"color:red;\">user not found</span>", time() + 5, "/");
            header("location: ../../index.php");
            exit();
        }
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $stmt=null;
        return $result;
    }
}
?>