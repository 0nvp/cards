<?php
session_start();
require_once("../classes/card.classes.php");
$CardService=new CardService();
$CardService->newDeck();
?>