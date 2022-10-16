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
        // STR OF 1st CARDS
        $this->_str1=explode("_", $this->_card1);
        $this->_str2=explode("_", $this->_card2);
        // CARD1 == CARD2 | 1st
        if($this->_str1[2]==$this->_str2[2]){
            // STR OF 2nd CARDS
            $this->_str1=explode("_", $this->_deck1[2]);
            $this->_str2=explode("_", $this->_deck2[2]);
            // CARD1 == CARD2 | 2st
            if($this->_str1[2]==$this->_str2[2]){
                // STR OF 4th CARDS
                $this->_str1=explode("_", $this->_deck1[4]);
                $this->_str2=explode("_", $this->_deck2[4]);
                // CARD1 > CARD2 | 4th
                if($this->_str1[2]>$this->_str2[2]){
                    array_push($this->_deck1, $this->_card1, $this->_deck1[1], $this->_deck1[2], $this->_deck1[3], $this->_deck1[4], 
                    $this->_card2, $this->_deck2[1], $this->_deck2[2], $this->_deck2[3], $this->_deck2[4]);
                    unset($this->_deck1[0], $this->_deck1[1], $this->_deck1[2], $this->_deck1[3], $this->_deck1[4], 
                    $this->_deck2[0], $this->_deck2[1], $this->_deck2[2], $this->_deck2[3], $this->_deck2[4]);
                }
                // CARD2 > CARD1 | 4th
            }
            // CARD1 > CARD2 | 2nd
            elseif($this->_str1[2]>$this->_str2[2]){
                array_push($this->_deck1, $this->_card1, $this->_deck1[1], $this->_deck1[2], $this->_card2, $this->_deck2[1], $this->_deck2[2]);
                unset($this->_deck1[0], $this->_deck1[1], $this->_deck1[2], $this->_deck2[0], $this->_deck2[1], $this->_deck2[2]);
            }
            // CARD2 > CARD1 | 2nd
            elseif($this->_str2[2]>$this->_str1[2]){
                array_push($this->_deck2, $this->_card2, $this->_deck2[1], $this->_deck2[2], $this->_card1, $this->_deck1[1], $this->_deck1[2]);
                unset($this->_deck2[0], $this->_deck2[1], $this->_deck1[2], $this->_deck1[0], $this->_deck1[1], $this->_deck1[2]);
            }
        }
        // CARD1 > CARD2 | 1st
        elseif($this->_str1[2]>$this->_str2[2]){
            array_push($this->_deck1, $this->_card1, $this->_card2);
            unset($this->_deck1[0], $this->_deck2[0]);
        }
        // CARD2 > CARD1 | 1st
        elseif($this->_str2[2]>$this->_str1[2]){
            array_push($this->_deck2, $this->_card2, $this->_card1);
            unset($this->_deck2[0], $this->_deck1[0]);
        }
        $this->_deck1=array_values($this->_deck1);
        $this->_deck2=array_values($this->_deck2);
    }
}
?>