function nuevoAjax(){

    var ajax = false;
    try {
        ajax = new XMLHttpRequest();
    } catch (E) {
        ajax = false;
    }
    return ajax;
}




function realizarCobro(id){

    var caja = document.getElementById("cobrosModal");
    caja.style.display = "block";
   
    var ajax = nuevoAjax();
    ajax.open("POST","./modalcobro.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("id="+id); 
    ajax.onreadystatechange=function(){

        if(ajax.readyState===4){
            caja.innerHTML=ajax.responseText;
        }
    };

}



function actualizaMedidorCliente(id){

    var caja = document.getElementById("actualizarModalMedidor");
    caja.style.display = "block";
    //alert(id);
    var ajax = nuevoAjax();
    ajax.open("POST","./actualizarmedidorcliente.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("id="+id); 
    ajax.onreadystatechange=function(){

        if(ajax.readyState===4){
            caja.innerHTML=ajax.responseText;
        }
    };

}

function eliminaCliente(id){

    var caja = document.getElementById("eliminarModal");
    //alert(id);
    var ajax = nuevoAjax();
    ajax.open("POST","./eliminarcliente.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("id="+id); 
    ajax.onreadystatechange=function(){

        if(ajax.readyState===4){
            caja.innerHTML=ajax.responseText;
        }
    };

}


/*function veCliente(id){
    var caja = document.getElementById("verModal");
    caja.style.display = "block";
    var caja = document.getElementById("verModal");
    var ajax = nuevoAjax();
    ajax.open("POST","./vercliente.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("id="+id); 
    ajax.onreadystatechange=function(){

        if(ajax.readyState===4){
            caja.innerHTML=ajax.responseText;
        }
    };
}*/


