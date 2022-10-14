<?php

class RemoveService extends db{
    protected $_date;
    protected $_id;
    protected $_password;

    public function __construct(){
        $this->_date=date("d M Y H:i:s");
        $this->_id=$_SESSION['player']['id'];
        $this->_password=hash("sha3-512", $_POST['drop-password']);
    }

    public function remove(){
        $this->_checkCredentials();
        setcookie("LOGIN", "", time() - 3600, "/");
        setcookie("alert", "<span style=\"color:lawngreen;\">account has been successfully deleted</span>", time() + 5, "/");
        session_unset();
        session_destroy();
        header("location: ../../index.php");
        exit();
    }

    protected function _checkCredentials(){
        if(empty($this->_id) || empty($this->_password)){
            setcookie("alert", "<span style=\"color:red;\">remove account error</span>", time() + 5, "/");
            header("location: ../../profile.php");
            exit();
        }
        $stmt=$this->connect()->prepare("SELECT `id-user` FROM `users` WHERE `password`=? AND `id-user`=?;");
        $stmt->execute(array($this->_password, $this->_id));
        if($stmt->rowCount()==0){
            setcookie("alert", "<span style=\"color:red;\">remove account error</span>", time() + 5, "/");
            header("location: ../../profile.php");
            exit();
        }
        $stmt=$this->connect()->prepare("UPDATE `status` SET `status`=\"removed\", `date`=? WHERE `id-user`=?;");
        $stmt->execute(array($this->_date, $this->_id));
        $stmt=null;
    }
}
?>