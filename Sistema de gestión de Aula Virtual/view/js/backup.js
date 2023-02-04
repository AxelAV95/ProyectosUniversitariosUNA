var Toast = Swal.mixin({
       toast: true,
       position: 'top-right',
       showConfirmButton: false,
       timer: 3000,
       timerProgressBar: true
     });

	
	$("#realizarBackup").on("click",function(){
		Swal.fire({
        title: '¿Desea realizar el respaldo?',
        text: 'Ruta defecto: C:/backup/',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
         cancelButtonText: "Cancelar",
        confirmButtonText: 'Respaldar'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
          		url: "../business/adminaction.php",
          		type: "POST",
          		data: {"realizarRespaldo": "realizarRespaldo"},
          		

          		success: function(respuesta){

          			console.log(respuesta);

          			if(respuesta == 1){
          				Toast.fire({
          					icon: 'success',
          					title: '<div style=margin-top:0.5rem;>Respaldo realizado con éxito.</div>'
          				})
          			}else{
          				Toast.fire({
          					icon: 'error',
          					title: '<div style=margin-top:0.5rem;>Error al respaldar.</div>'
          				})
          			}
          		}
          		});
      
          }
    })
	});