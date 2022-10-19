<?php

class CardService{
    protected $_cards;
    protected $_card_suffixes;
    protected $_card_suffix;
    protected $_rand;

    public function __construct(){
        $this->_card_suffixes=["spades", "hearts", "clubs", "diamonds"];
        
    }

    public function newDeck(){
        $_SESSION['game']['i']=0;
        $_SESSION['computer']['array']=[];
        $_SESSION['player']['array']=[];
        for($i=1;$i<=26;$i++){
            $this->_checkCredentials("computer");
            $this->_checkCredentials("player");
        }
        header("location: ../../game.php");
        exit();
    }

    protected function _checkCredentials($player){
        $this->_cards=[];
        foreach($this->_card_suffixes as $this->_card_suffix){
            if(!in_array("{$this->_card_suffix}/{$this->_card_suffix}_ace_14", $_SESSION['computer']['array'], TRUE) && 
            !in_array("{$this->_card_suffix}/{$this->_card_suffix}_ace_14", $_SESSION['player']['array'], TRUE)){
                $this->_cards[]="ace:{$this->_card_suffix}:14";
            }
    
            for($i=2; $i<=10; $i++){
                if(!in_array("{$this->_card_suffix}/{$this->_card_suffix}_{$i}_{$i}", $_SESSION['computer']['array'], TRUE) && 
                !in_array("{$this->_card_suffix}/{$this->_card_suffix}_{$i}_{$i}", $_SESSION['player']['array'], TRUE)){
                    $this->_cards[]="$i:{$this->_card_suffix}:$i";
                }
            }

            if(!in_array("{$this->_card_suffix}/{$this->_card_suffix}_jack_11", $_SESSION['computer']['array'], TRUE) && 
            !in_array("{$this->_card_suffix}/{$this->_card_suffix}_jack_11", $_SESSION['player']['array'], TRUE)){
                $this->_cards[]="jack:{$this->_card_suffix}:11";
            }
            if(!in_array("{$this->_card_suffix}/{$this->_card_suffix}_queen_12", $_SESSION['computer']['array'], TRUE) && 
            !in_array("{$this->_card_suffix}/{$this->_card_suffix}_queen_12", $_SESSION['player']['array'], TRUE)){
                $this->_cards[]="queen:{$this->_card_suffix}:12";
            }
            if(!in_array("{$this->_card_suffix}/{$this->_card_suffix}_king_13", $_SESSION['computer']['array'], TRUE) && 
            !in_array("{$this->_card_suffix}/{$this->_card_suffix}_king_13", $_SESSION['player']['array'], TRUE)){
                $this->_cards[]="king:{$this->_card_suffix}:13";
            }
        }
        $this->_rand=rand(0, count($this->_cards)-1);
        $this->_cards=explode(":", $this->_cards[$this->_rand]);
        $_SESSION[$player]['array'][]="{$this->_cards[1]}/{$this->_cards[1]}_{$this->_cards[0]}_{$this->_cards[2]}";
    }
}
?>