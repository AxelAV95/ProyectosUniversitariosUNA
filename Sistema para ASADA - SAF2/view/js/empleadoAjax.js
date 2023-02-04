function nuevoAjax(){

    var ajax = false;
    try {
        ajax = new XMLHttpRequest();
    } catch (E) {
        ajax = false;
    }
    return ajax;
}

function actualizaEmpleado(id){

    var caja = document.getElementById("actualizarModal");
    caja.style.display = "block";
    var ajax = nuevoAjax();
    ajax.open("POST","./actualizarempleado.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("id="+id); 
    ajax.onreadystatechange=function(){

        if(ajax.readyState===4){
            caja.innerHTML=ajax.responseText;
            
        }
    };

    





}

function eliminaEmpleado(id){

    var caja = document.getElementById("eliminarModal");
    //alert(id);
    var ajax = nuevoAjax();
    ajax.open("POST","./eliminarempleado.php",true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("id="+id); 
    ajax.onreadystatechange=function(){

        if(ajax.readyState===4){
            caja.innerHTML=ajax.responseText;
        }
    };

}




function botonCancelar(){
    //window.location.reload(true);
    var caja = document.getElementById("actualizarModal");
    caja.style.display = "none";

   
}









