<?php

function card($player){
$cards=[];
$card_suffixes=["spades", "hearts", "clubs", "diamonds"];
foreach($card_suffixes as $card_suffix){
    if(in_array("{$card_suffix}/{$card_suffix}_ace_14", $_SESSION['computer']['array'])<1 && 
    in_array("{$card_suffix}/{$card_suffix}_ace_14", $_SESSION['player']['array'])<1){
        $cards[]="ace:{$card_suffix}:14";
    }
    
    for($i=2; $i<=10; $i++){
        if(in_array("{$card_suffix}/{$card_suffix}_{$i}_{$i}", $_SESSION['computer']['array'])<1 && 
        in_array("{$card_suffix}/{$card_suffix}_{$i}_{$i}", $_SESSION['player']['array'])<1){
            $cards[]="$i:{$card_suffix}:$i";
        }
    }

    if(in_array("{$card_suffix}/{$card_suffix}_jack_11", $_SESSION['computer']['array'])<1 && 
    in_array("{$card_suffix}/{$card_suffix}_jack_11", $_SESSION['player']['array'])<1){
        $cards[]="jack:{$card_suffix}:11";
    }
    if(in_array("{$card_suffix}/{$card_suffix}_queen_12", $_SESSION['computer']['array'])<1 && 
    in_array("{$card_suffix}/{$card_suffix}_queen_12", $_SESSION['player']['array'])<1){
        $cards[]="queen:{$card_suffix}:12";
    }
    if(in_array("{$card_suffix}/{$card_suffix}_king_13", $_SESSION['computer']['array'])<1 && 
    in_array("{$card_suffix}/{$card_suffix}_king_13", $_SESSION['player']['array'])<1){
        $cards[]="king:{$card_suffix}:13";
    }
}
$card_rand=rand(1, count($cards));
$cards=explode(":", $cards[$card_rand]);
$_SESSION[$player]['array'][]="{$cards[1]}/{$cards[1]}_{$cards[0]}_{$cards[2]}";
}
?>