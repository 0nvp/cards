function sideNav(value){
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            document.body.innerHTML=xhttp.responseText;
        }
    }
    xhttp.open("GET", "home.php?p="+value, true);
    xhttp.send();
}