<nav id="sidebar">
	<div class="custom-menu">
		<button type="button" id="sidebarCollapse" class="btn btn-primary">
			<i class="fa fa-bars"></i>
			<span class="sr-only">Toggle Menu</span>
		</button>
	</div>
	<div class="p-4">
		
		
		<h1><a href="index.html" class="logo">Aula virtual  <span><?php echo $usuario ?></span></a></h1>
		<ul class="list-unstyled components mb-5">
			<li >
				<a href="profesorcursoview.php?cursoid=<?php echo $cursoid ?>"><i class="fas fa-chalkboard-teacher mr-4"></i>Estudiantes</a>
			</li>
			<li class="active" >
				<a href="profesorasignacionview.php?cursoid=<?php echo $cursoid ?>"><i class="fas fa-file-import mr-4"></i></span>Asignaciones</a>
			</li>
			
			<li>
				<a href="../business/usuarioaction.php?cerrarSesion=true"><span class="fas fa-sign-out-alt mr-4"></span> Cerrar sesión</a>
			</li>

		</ul>
		<center><a href="profesorinicioview.php" class="btn btn-light ">Regresar</a></center>
		
	</div>
</nav>