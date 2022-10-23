function sideNav(value){
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("main").innerHTML=xhttp.responseText;
        }
    }
    xhttp.open("POST", "home.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("sidenav="+value);
}