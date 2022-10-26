<?php
if(isset($_COOKIE['LOGIN'])){
    require_once("../../classes/db/login.classes.php");
    require_once("../../classes/services/cookie.classes.php");
    $CookieService=new CookieService();
    $CookieService->login();
    // RANKING
    require_once("../../classes/services/ranking.classes.php");
    $RankingService=new RankingService();
    $RankingService->ranking();
}
?>