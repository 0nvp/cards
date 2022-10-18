<?php

class AjaxService{
    protected $_deck1;
    protected $_deck2;
    protected $_str1;
    protected $_str2;
    protected $_status;
    protected $_i;

    public function __construct(){
        $this->_deck1=$_SESSION['player']['array'];
        $this->_deck2=$_SESSION['computer']['array'];
    }

    public function nextRound(){
        $this->_checkCredentials();
        if($this->_status==true){
            $_SESSION['game']['status']=$this->_status;
            $_SESSION['game']['i']=$this->_i;
        }
        elseif($this->_status==false){
            $_SESSION['player']['array']=$this->_deck1;
            $_SESSION['computer']['array']=$this->_deck2;
        }
    }

    protected function _checkCredentials(){
        // STR OF CARDS
        $this->_str1=explode("_", $this->_deck1[0]);
        $this->_str2=explode("_", $this->_deck2[0]);
        // CARD1 == CARD2
        if($this->_str1[2]==$this->_str2[2]){
            $this->_status=true;
            $this->_i=2;
        }
        // CARD1 > CARD2
        elseif($this->_str1[2]>$this->_str2[2]){
            array_push($this->_deck1, $this->_deck1[0], $this->_deck2[0]);
            unset($this->_deck1[0], $this->_deck2[0]);
        }
        // CARD2 > CARD1
        elseif($this->_str2[2]>$this->_str1[2]){
            array_push($this->_deck2, $this->_deck2[0], $this->_deck1[0]);
            unset($this->_deck2[0], $this->_deck1[0]);
        }
        // SORT ARRAY
        $this->_deck1=array_values($this->_deck1);
        $this->_deck2=array_values($this->_deck2);
        return $this->_status;
    }
}
?>