<?php
session_start();
require_once("../../classes/games/card.classes.php");
$CardService=new CardService();
$CardService->newDeck();
?>