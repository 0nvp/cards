<?php

function card($player){
$cards=[];
$card_suffixes=["spades","hearts","clubs","diamonds"];
foreach($card_suffixes as $card_suffix){
    $cards[]="ace:{$card_suffix}:11";
    
    for($i=2; $i<=10; $i++){
        $cards[]="$i:{$card_suffix}:$i";
    }

    $cards[]="jack:{$card_suffix}:10";
    $cards[]="queen:{$card_suffix}:10";
    $cards[]="king:{$card_suffix}:10";
}
$card_rand=rand(0, 51);
$cards=explode(":", $cards[$card_rand]);
$_SESSION[$player]['sila']=$cards[2];
$_SESSION[$player]['array'][]="{$cards[1]}/{$cards[1]}_{$cards[0]}_{$cards[2]}";
}
?>