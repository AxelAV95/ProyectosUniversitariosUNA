/* Habilita datatable para las asignaciones */

$(function () {

	$('#asignacionest').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
		},
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
	});
});


/* Agrega un icono en el seleccionador de
archivos */
$( document ).ready(function() {
	$("<i class='fas fa-arrow-circle-down' style='font-size: 3rem; margin-top: 2rem;'></i><br>").insertBefore(".dz-button");
});


/* Configuración de plugin Dropzone para subir archivos */

  Dropzone.options.asignacionForm = { // camelized version of the `id`
  	paramName: "file", 
  	dictDefaultMessage: 'Puede arrastrar y soltar archivos aquí para añadirlos',
  	maxFilesize: 2, 
  	method: "post",
  	autoProcessQueue: false,
  	maxFiles: 100,
  	acceptedFiles: ".pdf,.doc,.odt,.jpg",
  	init: function () {
  		var myDropzone = this;

  		this.element.querySelector("#agregar").addEventListener("click", function(e) {
      // Make sure that the form isn't actually being sent.

  			if($("#fechaasignacion").val() == ""){
  				e.preventDefault();

  				$.jGrowl('Debe agregar una fecha de entrega',{theme: 'changeCount'});
  				$("#fechaasignacion").focus();
  			}else if($("#asignaciondescripcion").val() == ""){
  				e.preventDefault();

  				$.jGrowl('Debe agregar una descripción',{theme: 'changeCount'});
  				$("#asignaciondescripcion").focus();
  			}else{
  				e.preventDefault();
  				e.stopPropagation();
  				myDropzone.processQueue();

  			}
  			
  		});
  		this.on("addedfile", file => {
  			//alert("A file has been added");
  		});
  		this.on("sending", function(file, xhr, formData) {
  			formData.append("cursoid",$("#cursoid").val());
  			formData.append("profesorid",$("#profesorid").val());
  			formData.append("asignacionid",$("#asignacionid").val());
  			formData.append("estudianteid",$("#estudianteid").val());
  			formData.append("asignaciondescripcion",$("#asignaciondescripcion").val());
  			formData.append("fechaasignacion",$("#fechaasignacion").val());
  			formData.append("subirAsignacion",$("#subirAsignacion").val());

  			for (var key of formData.entries()) {
  				console.log(key[0] + ', ' + key[1]);
  			}
    		//console.log(formData.entries());
  		})

  		this.on("queuecomplete", function() {

  			$.jGrowl('Asignación subida con éxito',{theme: 'changeCount'});
  			window.location.href = "estudianteasignacionview.php?cursoid="+$("#cursoid").val()+"&asignacionid="+$("#asignacionid").val()+"&profesorid="+$("#profesorid").val()+"&mensaje=1";
  		})
  		document.querySelector(".cancel").onclick = function() {
  			myDropzone.removeAllFiles(true);
  		}
  	}

  };

/* Habilita datatable para tabla de cursos
SIN USO */

  $(function () {

  	$('#cursos').DataTable({
  		"language": {
  			"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
  		},
  		"paging": true,
  		"lengthChange": false,
  		"searching": true,
  		"ordering": true,
  		"info": true,
  		"autoWidth": false,
  		"responsive": true,
  	});
  });
