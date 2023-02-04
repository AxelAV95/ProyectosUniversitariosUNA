<nav id="sidebar">
	<div class="custom-menu">
		<button type="button" id="sidebarCollapse" class="btn btn-primary">
			<i class="fa fa-bars"></i>
			<span class="sr-only">Toggle Menu</span>
		</button>
	</div>
	<div class="p-4">
		
		
		<h1><a href="index.html" class="logo">Aula virtual <span><?php 	echo $_SESSION['estudiantenombre'] ?></span></a></h1>
		<ul class="menu-curso list-unstyled components mb-5">
			
			<li>
				<a href="estudiantecursoview.php?cursoid=<?php echo $cursoid ?>&profesorid=<?php echo $profesorid ?>"><span class="fas fa-file-import mr-4"></span>Evaluaciones</a>
			</li>
			<li >
				<a href="estudiantedetallecursoview.php?cursoid=<?php echo $cursoid ?>&profesorid=<?php echo $profesorid ?>"><span class="fas fa-exclamation-circle mr-4"></span>Detalles del curso</a>
			</li>
			<li>
				<a href="../business/usuarioaction.php?cerrarSesion=true"><span class="fas fa-sign-out-alt mr-4"></span> Cerrar sesión</a>
			</li>

		</ul>
		
		
	</div>
</nav>