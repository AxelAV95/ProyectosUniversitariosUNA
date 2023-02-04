function nuevoAjax(){

    var ajax = false;
    try {
        ajax = new XMLHttpRequest();
    } catch (E) {
        ajax = false;
    }
    return ajax;
}


function enviarCorreoCliente(id){

    var caja = document.getElementById("emailModal");
    caja.style.display = "block";
    //alert(id);
    var ajax = nuevoAjax();
    ajax.open("POST","./modalcorreo.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("id="+id); 
    ajax.onreadystatechange=function(){

        if(ajax.readyState===4){
            caja.innerHTML=ajax.responseText;
        }
    };

}