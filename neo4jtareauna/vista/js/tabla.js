
    		$('#tablaTarea').DataTable({
    			"language": {
            	"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        	},
    		});
		


$("#tablaTarea tbody").on("click", ".btnActualizar", function(){

			var id = $(this).attr("id");
			actualizar(id);
			
		});

		$("#tablaTarea tbody").on("click", ".btnBorrar", function(){

			var id = $(this).attr("id");
			var valor = $(this).attr("valor");
			//alert(valor);

			borrar(id,valor);
			//actualizar(id);
			
		});