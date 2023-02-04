
/* Setea los valores de la rúbrica perteneciente a un curso */

$(".btnEditarCurso").on("click", function(){
	$('#rubricaForm').trigger("reset");
	$('#modalEditarCurso #total').empty();
	$('#botonRubrica'). prop('disabled', true);
	var cursoid = $(this).attr("cursoid");
	var total = 0;
	$('#modalEditarCurso #cursoid ').val(cursoid);

	$.ajax({
		type: "POST",
		url: "../business/cursoaction.php",
		data: {id: cursoid, verificarRubrica:'verificarRubrica'},
		dataType:"json",
		success: function(respuesta){
			if(respuesta == 404){
				$('#modalEditarCurso #actualizarRubrica ').attr("name", "insertarRubrica");
				$('#modalEditarCurso #actualizarRubrica ').attr("id", "insertarRubrica");
				$('#modalEditarCurso #insertarRubrica ').val("insertarRubrica");
				$('#modalEditarCurso #rubricaid ').val(0);
				$('#modalEditarCurso #cursoid ').val(cursoid);
				$('#modalEditarCurso #examen1 ').val(0);
				$('#modalEditarCurso #examen2 ').val(0);
				$('#modalEditarCurso #examen3 ').val(0);
				$('#modalEditarCurso #tarea1 ').val(0);
				$('#modalEditarCurso #tarea2 ').val(0);
				$('#modalEditarCurso #prueba1 ').val(0);
				$('#modalEditarCurso #prueba2 ').val(0);

				$('.rubrica tr td ').each(function(){
					$(this).find('input').each(function(){
						total = total+ parseInt($(this).val());

					})
				})
				$('#modalEditarCurso #total').append(total);
			}else{
				console.log(respuesta);
				$('#modalEditarCurso #insertarRubrica ').attr("name", "actualizarRubrica");
				$('#modalEditarCurso #insertarRubrica ').attr("id", "actualizarRubrica");
				$('#modalEditarCurso #actualizarRubrica ').val("actualizarRubrica");
				$('#modalEditarCurso #rubricaid ').val(respuesta[0]['rubricaid']);
				$('#modalEditarCurso #cursoid ').val(respuesta[0]['epccursoid']);
				$('#modalEditarCurso #examen1 ').val(respuesta[0]['epcexamen1']);
				$('#modalEditarCurso #examen2 ').val(respuesta[0]['epcexamen2']);
				$('#modalEditarCurso #examen3 ').val(respuesta[0]['epcexamen3']);
				$('#modalEditarCurso #tarea1 ').val(respuesta[0]['epctarea1']);
				$('#modalEditarCurso #tarea2 ').val(respuesta[0]['epctarea2']);
				$('#modalEditarCurso #prueba1 ').val(respuesta[0]['epcprueba1']);
				$('#modalEditarCurso #prueba2 ').val(respuesta[0]['epcprueba2']);

				$('.rubrica tr td ').each(function(){
					$(this).find('input').each(function(){
						total = total+ parseInt($(this).val());

					})
				})
				$('#modalEditarCurso #total').append(total);
				if(total ==100){
					$('#botonRubrica'). prop('disabled', false);

				}

			}

		}
	});

});


	/* Cada vez que se inserte un porcentaje, se verifica que cumpla
	los requisitos y no se exceda a valores muy altos, además realiza
	la sumatoria del total */

$("#modalEditarCurso table tr td input").change(function() { 

	var total = 0;

	$('#modalEditarCurso #total').empty();

	$('.rubrica tr td ').each(function(){
		$(this).find('input').each(function(){
			total = total+ parseInt($(this).val());

		})
	})

	$('.rubrica tr td ').each(function(){
		$(this).find('input').each(function(){
			if($(this).val() > 100){
				$(this).val(0);
			}

		})
	})

	if(total > 100){
		$.jGrowl("Los porcentajes tienen que sumar 100%",{theme: 'changeCount'});
		$('#botonRubrica'). prop('disabled', true);
	}else if(total ==100){
		$('#botonRubrica'). prop('disabled', false);

	}
	$('#modalEditarCurso #total').append(total);
}); 

/* Inicializa el datatable para la tabla cursos
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

/* Gestiona los datos del formulario
y los envía a la base de datos por
medio de ajax */

jQuery(document).ready(function(){
	jQuery("#modalEditarCurso #rubricaForm").submit(function(e){
		e.preventDefault();
		var data = jQuery(this).serialize();

		$.ajax({
			type: "POST",
			url: "../business/cursoaction.php",
			data: data,
			dataType:"json",
			success: function(respuesta){

				console.log(respuesta);
				if(respuesta == 1){
					$.jGrowl("Rúbrica actualizada con éxito",{theme: 'changeCount'});
					$('#modalEditarCurso').modal('toggle');
					$('#rubricaForm').trigger("reset");
				}else if(respuesta == 4){
					$.jGrowl("Error al actualizar la rúbrica",{theme: 'changeCount'});
				}
			}	
		});
		
	});

});