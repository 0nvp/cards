<?php

class AjaxService{
    protected $_deck1;
    protected $_deck2;
    protected $_card1;
    protected $_card2;
    protected $_str1;
    protected $_str2;

    public function __construct(){
        $this->_deck1=$_SESSION['player']['array'];
        $this->_deck2=$_SESSION['computer']['array'];
        $this->_card1=current($_SESSION['player']['array']);
        $this->_card2=current($_SESSION['computer']['array']);
        $this->_str1=explode("_", $this->_card1);
        $this->_str2=explode("_", $this->_card2);
    }

    public function nextRound(){
        $this->_checkCredentials();
        $_SESSION['player']['array']=$this->_deck1;
        $_SESSION['computer']['array']=$this->_deck2;
    }

    protected function _checkCredentials(){
        if($this->_str1[2]>$this->_str2[2]){
            array_push($this->_deck1, $this->_card2);
        }
        elseif($this->_str2[2]>$this->_str1[2]){
            array_push($this->_deck2, $this->_card1);
        }
    }
}
?>