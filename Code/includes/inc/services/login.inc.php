<?php
if(isset($_POST['login-submit'])){
    require_once("../../db.classes.php");
    require_once("../../classes/services/login.classes.php");
    $LoginService=new LoginService();
    $LoginService->login();
    // RANKING
    require_once("../../classes/ranking.classes.php");
    $RankingService=new RankingService();
    $RankingService->ranking();
}
?>