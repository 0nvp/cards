<?php
if(isset($_POST['login-submit'])){
    require_once("../../classes/db/login.classes.php");
    require_once("../../classes/services/login.classes.php");
    $LoginService=new LoginService();
    $LoginService->login();
    // RANKING
    require_once("../../classes/services/ranking.classes.php");
    $RankingService=new RankingService();
    $RankingService->ranking();
}
?>