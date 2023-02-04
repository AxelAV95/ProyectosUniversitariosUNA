<?php 
	session_start();
	include 'usuariobusiness.php';
	include 'profesorbusiness.php';
	include 'estudiantebusiness.php';
	
	if(isset($_POST['iniciarSesion']) ){
		if(isset($_POST['usuarionombre'] ) && isset($_POST['usuariopassword']) ){

			$usuario = $_POST['usuarionombre'];
			$password = $_POST['usuariopassword'];

			$usuarioBusiness = new UsuarioBusiness();
			$datosUsuario = $usuarioBusiness->getDatosUsuario(
				$usuario, $password);

			if(count($datosUsuario)>=1){


				if($datosUsuario[0]['usuarioidentidad'] == $usuario &&  $datosUsuario[0]['usuariopassword'] == $password){

					if($datosUsuario[0]['usuarioestado'] == 1){
						header("location: ../reestablecerclave.php?user=".$usuario);
					}else{
						if($datosUsuario[0]['usuariotipo'] == 1){
							$_SESSION["usuarioid"] = $datosUsuario[0]['usuarioid'];
							$_SESSION["usuarioidentidad"] = $datosUsuario[0]['usuarioidentidad'];
							$_SESSION['usuariotipo'] =$datosUsuario[0]['usuariotipo'];
							header("location: ../redirect.php?tp=1" );

						}else if($datosUsuario[0]['usuariotipo'] == 2){

							$profesorBusiness = new ProfesorBusiness();
							$datosProfesor = $profesorBusiness->obtenerDatosProfesor($datosUsuario[0]['usuarioidentidad']);
							
							$_SESSION["usuarioid"] = $datosUsuario[0]['usuarioid'];
							$_SESSION["usuarioidentidad"] = $datosUsuario[0]['usuarioidentidad'];
							$_SESSION['usuariotipo'] =$datosUsuario[0]['usuariotipo'];
							$_SESSION['profesorid'] = $datosProfesor[0]['profesorid'];
							$_SESSION['profesorcedula'] = $datosProfesor[0]['profesorcedula'];
							$_SESSION['profesornombre'] = $datosProfesor[0]['profesornombre'];
							header("location: ../redirect.php?tp=2" );
						}else if($datosUsuario[0]['usuariotipo'] == 3){

							$estudianteBusiness = new EstudianteBusiness();
							$datosEstudiante = $estudianteBusiness->obtenerDatosEstudiante($datosUsuario[0]['usuarioidentidad']);;

							$_SESSION["usuarioid"] = $datosUsuario[0]['usuarioid'];
							$_SESSION["usuarioidentidad"] = $datosUsuario[0]['usuarioidentidad'];
							$_SESSION['usuariotipo'] =$datosUsuario[0]['usuariotipo'];
							$_SESSION["estudianteid"] =  $datosEstudiante[0]['estudianteid'];
							$_SESSION["estudiantenombre"] =  $datosEstudiante[0]['estudiantenombre'];
							$_SESSION["estudiantecedula"] =  $datosEstudiante[0]['estudiantecedula'];
							$_SESSION["estudianteedad"] =  $datosEstudiante[0]['estudianteedad'];
							$_SESSION["estudiantedireccion"] =  $datosEstudiante[0]['estudiantedireccion'];
							$_SESSION["estudianteusuarioid"] =  $datosEstudiante[0]['estudianteusuarioid'];
							$_SESSION["estudiantecarreraid"] =  $datosEstudiante[0]['estudiantecarreraid'];
							$_SESSION["estudiantebecaid"] =  $datosEstudiante[0]['estudiantebecaid'];
							header("location: ../redirect.php?tp=3" );
						}

					}
				}else{
					header("location: index.php?mensaje=4" ); //error de sesion
				}

				
				
			}else{
				header("location: ../index.php?mensaje=3" ); //sin ninguna coincidencia
			}

		}else{
			header("location: ../index.php?mensaje=2" );  //datos incorrectos
		}
		
	}else if(isset($_GET['cerrarSesion'])){
		session_destroy();
		header("location: ../index.php");
	}else if(isset($_POST['cambiarClave'])){

		if(isset($_POST['usuarionombre']) && isset($_POST['usuarioclaveactual']) && isset($_POST['usuarionuevaclave']) && isset($_POST['usuarioverificarclave'])){
			
			$usuario = $_POST['usuarionombre'];
			$claveActual = $_POST['usuarioclaveactual'];
			$nuevaClave = $_POST['usuarionuevaclave'];
			$verificarClave = $_POST['usuarioverificarclave'];

			$usuarioBusiness = new UsuarioBusiness();
			$resultado = $usuarioBusiness->actualizarEstadoUsuario($usuario, $nuevaClave);
			if($resultado == 1){
				header("location: ../index.php?mensaje=1" );
			}else{
				header("location: ../index.php?mensaje=4" );
			}

		}
		

	}





 ?>