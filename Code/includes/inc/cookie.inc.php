<?php
if(isset($_COOKIE['LOGIN'])){
    require_once("../db.classes.php");
    require_once("../classes/cookie.classes.php");
    $CookieService=new CookieService();
    $CookieService->login();
    require_once("../classes/ranking.classes.php");
    $RankingService=new RankingService();
    $RankingService->ranking();
}
?>