
		function actualizar(id){
			//alert(id);
			var texto = prompt('Ingrese su texto: ', id);
			var datos = new FormData();
			datos.append("tipo","actualizar");
			datos.append("id",id);
			datos.append("textoActualizar",texto);
			

			$.ajax({
					url:"ajax/texto.ajax.php",
					method: "POST",
					data: datos,
					cache: false,
					contentType: false,
					processData: false,
					success: function(respuesta){
						
						
						if(respuesta == '{"summary":null,"result":[]}null'){
								alert("Actualizado con éxito");
							window.location = "index.php";
						}else{
								alert("Error al  insertar");
						}

					}

			})
		}
		
		function insertarTexto(){

			var texto = $('.texto').val();
			
			

			var datos = new FormData();
			datos.append("tipo","insertar");
			datos.append("texto",texto);

			$.ajax({
					url:"ajax/texto.ajax.php",
					method: "POST",
					data: datos,
					cache: false,
					contentType: false,
					processData: false,
					success: function(respuesta){
						
						
						if(respuesta == '{"summary":null,"result":[]}null'){
								alert("Insertado con éxito");
							window.location = "index.php";
						}else{
								alert("Error al actualizar");
						}
						

					}

			})


		}

		function borrar(id,valor){

			var datos = new FormData();
			datos.append("tipo","borrar");
			datos.append("key","listatexto");
			datos.append("valor",valor);
			datos.append("id",id);

			$.ajax({
					url:"ajax/texto.ajax.php",
					method: "POST",
					data: datos,
					cache: false,
					contentType: false,
					processData: false,
					success: function(respuesta){
						

						
						if(respuesta == '{"summary":null,"result":[]}null'){
								alert("Borrado con éxito");
							window.location = "index.php";
						}else{
								alert("Error al borrar");
						}

					}

			})

		}