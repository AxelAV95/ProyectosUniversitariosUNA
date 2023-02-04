<nav id="sidebar">
	<div class="custom-menu">
		<button type="button" id="sidebarCollapse" class="btn btn-primary">
			<i class="fa fa-bars"></i>
			<span class="sr-only">Toggle Menu</span>
		</button>
	</div>
	<div class="p-4 animate__animated animate__backInLeft">
		<h1><a href="index.html" class="logo">Aula virtual <span><?php echo $_SESSION['profesornombre'] ?></span></a></h1>
		<ul class="menu-profesor list-unstyled components mb-5">
			<li>
				<a href="profesorinicioview.php?pagina=1"><i class="fas fa-chalkboard-teacher mr-4"></i> Cursos</a>
			</li>
		
			<li>
				<a href="profesorreporteview.php"><i class="fas fa-file-alt mr-4"></i> Historial de cursos</a>
			</li>		
			<li>
				<a href="../business/usuarioaction.php?cerrarSesion=true"><span class="fas fa-sign-out-alt mr-4"></span> Cerrar sesión</a>
			</li>

		</ul>
	</div>
</nav>