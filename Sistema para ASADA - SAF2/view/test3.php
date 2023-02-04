<style type="text/css">
	#reporte{
  margin-top: 2%;border: 1px dashed black; width: 500px;height: 100px;display: flex;flex-direction: column;justify-content: center;align-items: center; opacity: 0.7; display: none;
}
</style>
<link rel="stylesheet" type="text/css" href="css/jquery-confirm.min.css">
<div id="cargarDocumentoModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="cerrar-doc-modal">&times;</span>
    <div id="contenedor" style="display: flex;flex-direction: column;">
	    <div id="formulario" style="margin-top: -1%; display: flex;align-items: center;justify-content: center;">

	    	<form method="post" id="cargar_form" enctype="multipart/form-data">
		      	<div class="form-group" style="display: flex;justify-content: center;align-items: center;">
		       
		       <input type="file" name="file" id="subida" required />
		       <p style="margin-top: 90px;">Arrastre sus archivos aquí o clickee en esta área.</p>
		      </div>
      <br />
		      <div class="form-group" style="margin-top: 14%;display: flex;justify-content: center;align-items: center;">
		       <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Cargar documento" />
		      </div>
     		</form>
	    	
	    </div>
	    <div style="margin-top:4%;margin-left: auto;margin-right: auto; width: 50%;">
	    	 <div  class="progress"> <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div> </div>
	    </div>
	    
	    <div id="resultados" style="display: flex; justify-content: center;align-items: center; flex-direction: column; ">
	    	

        <div style="margin-left: auto;margin-right: auto; width: 40%;">
          <center><span id="message">Mensaje</span> </center>
        </div>

        <div style="display: flex; justify-content: center;align-items: center; width: 40%;">
          <center><span id="reporte"></span> </center>
        </div>

	    	<!----<div id="reporte" style="margin-top: 2%;border: 1px dashed black; width: 500px;height: 100px;display: flex;flex-direction: column;justify-content: center;align-items: center; opacity: 0.7;">---->
            

        </div>

	    	
	    	</div>
	     
    </div>
    
  </div>

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/jquery-confirm.min.js"></script>


     		<script>
$(document).ready(function(){
 $('#cargar_form').on('submit', function(event){
  event.preventDefault();

  $.ajax({
   url:"cargarmedicionesdoc.php",
   method:"POST",
   data: new FormData(this),
   contentType:false,
   cache:false,
   dataType:"json",
   processData:false,
   async: true,
   beforeSend:function(){
    $('#submit').attr('disabled','disabled'),
    $('#submit').val('Cargando...');
   },
   /*xhr: function () {
      var xhr = new window.XMLHttpRequest();
      //Upload Progress
      xhr.upload.addEventListener("progress", function (evt) {
         if (evt.lengthComputable) {
        var percentComplete = (evt.loaded / evt.total) * 100; $('div.progress > div.progress-bar').css({ "width": percentComplete + "%" }); } }, false);
 
//Download progress
 xhr.addEventListener("progress", function (evt)
 {
 if (evt.lengthComputable)
  { var percentComplete = (evt.loaded / evt.total) *100;
 $("div.progress > div.progress-bar").css({ "width": percentComplete + "%" }); } },
false);
return xhr;
},*/
   


   success:function(data)
   {
    //$('#message').html(data[0]);
    $.alert({
        useBootstrap: false,
        
         boxWidth: "30%",
          title: "Datos de medición procesados",
          type:'blue',
          backgroundDismiss: true,
          draggable: true,
        
         content: "Los datos de medición brindados en el archivo han sido procesados. Para más información, revisar reportes.",
         animation: "scaleX" 
  
  
      }); 
    $('#reporte').html(data[2]).css('display', 'block');
    $('#cargar_form')[0].reset();
    $('#subida').text('Arrastre sus archivos aquí o clickee en esta área.')
    $('#submit').attr('disabled', false);
    $('#submit').val('Cargar documento');
    $( ".progress-bar" ).css( "width", "0%" ).attr( "aria-valuenow", 0);
   }
  })

  setInterval(function(){
   $('#message').html('');
  }, 5000);

  /*setInterval(function(){
   $('#message').html('');
  }, 5000);*/

 });
});
</script>