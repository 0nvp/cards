function sideNav(value){
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            document.body.textContent="";
            document.write(xhttp.responseText);
        }
    }
    xhttp.open("POST", "includes/inc/ajaxes/home.ajax.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("sidenav="+value);
}