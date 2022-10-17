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
        if(isset($_SESSION['test'])){
            $this->_status=$_SESSION['test'];
            $this->_i=$_SESSION['test2'];
        }
    }

    public function nextRound(){
        $this->_checkCredentials();
        if($this->_status==true){
            $_SESSION['test']=$this->_status;
            $_SESSION['test2']=$this->_i;
        }
        elseif($this->_status==false){
            $_SESSION['player']['array']=$this->_deck1;
            $_SESSION['computer']['array']=$this->_deck2;
        }
    }

    public function test(){
        $this->_test();
        if($this->_status==true){
            $_SESSION['test']=$this->_status;
            $_SESSION['test2']=$this->_i;
        }
        elseif($this->_status==false){
            unset($_SESSION['test'], $_SESSION['test2']);
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

    protected function _test(){
        $this->_str1=explode("_", $this->_deck1[$this->_i]);
        $this->_str2=explode("_", $this->_deck2[$this->_i]);
        // NEXT CARD1 == CARD2
        if($this->_str1[2]==$this->_str2[2]){
            $this->_i+=2;
        }
        // NEXT CARD1 > CARD2
        elseif($this->_str1[2]>$this->_str2[2]){
            for($i=0;$i<=$this->_i;$i++){
                array_push($this->_deck1, $this->_deck1[$i], $this->_deck2[$i]);
                unset($this->_deck1[$i], $this->_deck2[$i]);
            }
            $this->_status=false;
        }
        // NEXT CARD2 > CARD1
        elseif($this->_str2[2]>$this->_str1[2]){
            for($i=0;$i<=$this->_i;$i++){
                array_push($this->_deck2, $this->_deck1[$i], $this->_deck2[$i]);
                unset($this->_deck1[$i], $this->_deck2[$i]);
            }
            $this->_status=false;
        }
        // SORT ARRAY
        $this->_deck1=array_values($this->_deck1);
        $this->_deck2=array_values($this->_deck2);
        return $this->_status;
    }
}
?>