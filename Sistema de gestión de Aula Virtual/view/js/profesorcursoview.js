

/* Inicializa el select2 para escoger múltiples estudiantes */
$(document).ready(function() {
	$('#estudiantescurso').select2({
		allowClear: true
	});
});

/* Inicializa la tabla de estudiantes con DataTable */
$(function () {

	$('#estudiantes').DataTable({
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




/* Verifica que los valores de los porcentajes cumplan
con lo establecido */

$("#modalCalificarCurso table tr td input").change(function() { 

	var total = 0;

	$('#modalCalificarCurso #total').empty();

	$('.rubrica tr td ').each(function(){
		$(this).find('input').each(function(){
			total = total+ parseInt($(this).val());

		})
	})

	$('.rubrica tr td ').each(function(){
		$(this).find('input').each(function(){
			if($(this).val() > 100){
				$(this).val(0);
				$(this).focus();

			}

		})
	})


	if(total > 100){
		$.jGrowl("Los porcentajes tienen que sumar 100%",{theme: 'changeCount'});
		$('#botonRubrica'). prop('disabled', true);
	}else if(0 < total && total <= 100){
		$('#botonRubrica'). prop('disabled', false);

	}

	$('#modalCalificarCurso #total').append(total);
});

/* Permite cargar un select con años desde 1970 hasta la actualidad */

let dateDropdown = document.getElementById('cursoanio'); 

let currentYear = new Date().getFullYear();    
let earliestYear = 1970;     
while (currentYear >= earliestYear) {      
	let dateOption = document.createElement('option');          
	dateOption.text = currentYear;      
	dateOption.value = currentYear;        
	dateDropdown.add(dateOption);      
	currentYear -= 1;    
}