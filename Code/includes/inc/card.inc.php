<?php

function card($player){
$cards=[];
$card_suffixes=["spades","hearts","clubs","diamonds"];
foreach($card_suffixes as $card_suffix){
    if($_SESSION['ace']<4){
        $cards[]="ace:{$card_suffix}:14";
    }
    
    for($i=2; $i<=10; $i++){
        $cards[]="$i:{$card_suffix}:$i";
    }

    if($_SESSION['deck']<4){
        $cards[]="jack:{$card_suffix}:11";
    }
    if($_SESSION['deck']<4){
        $cards[]="queen:{$card_suffix}:12";
    }
    if($_SESSION['deck']<4){
        $cards[]="king:{$card_suffix}:13";
    }
}
$card_rand=rand(0, 51);
$cards=explode(":", $cards[$card_rand]);
$_SESSION[$cards[2]]++;
$_SESSION[$player]['array'][]="{$cards[1]}/{$cards[1]}_{$cards[0]}_{$cards[2]}";
}
?>