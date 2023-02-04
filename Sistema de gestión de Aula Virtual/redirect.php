<?php 

	if(isset($_GET['tp'])){
		$tipousuario = $_GET['tp'];
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

	<style>
		#loader-wrapper {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 1000;
		}
		#loader {
			display: flex;
			position: relative;
			left: 50%;
			top: 50%;
			width: 150px;
			height: 150px;
			margin: -75px 0 0 -75px;
			border-radius: 50%;
			border: 3px solid transparent;
			/* border-top-color: #3498db; */

			animation: flip; 
			animation-duration: 2s;

			z-index: 1001;
		}

		#loader:before {
			content: "";
			position: absolute;
			top: 5px;
			left: 5px;
			right: 5px;
			bottom: 5px;
			border-radius: 50%;
			border: 3px solid transparent;
			/* border-top-color: #e74c3c; */


		}

		#loader:after {
			content: "";
			position: absolute;
			top: 15px;
			left: 15px;
			right: 15px;
			bottom: 15px;
			border-radius: 50%;
			border: 3px solid transparent;
			/* border-top-color: #f9c922; */


		}



		#loader-wrapper .loader-section {
			position: fixed;
			top: 0;
			width: 100%;
			height: 100%;
			background: #2980B9;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        /* background-image: url(../img/loader3.jpg);
        background-size: cover;
        background-repeat: no-repeat; */
        z-index: 1000;
        -webkit-transform: translateX(0);  /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: translateX(0);  /* IE 9 */
        transform: translateX(0);  /* Firefox 16+, IE 10+, Opera */
    }

    #loader-wrapper .loader-section.section-left {
    	left: 0;
    }

    #loader-wrapper .loader-section.section-right {
    	right: 0;
    }


    
    .loaded #loader {
    	opacity: 0;
    	-webkit-transition: all 0.3s ease-out;  
    	transition: all 0.3s ease-out;
    }
    .loaded #loader-wrapper {
    	visibility: hidden;

    	animation: fadeOut; /* referring directly to the animation's @keyframe declaration */
    	animation-duration: 2s; /* don't forget to set a duration! */

    	-webkit-transition: all 0.3s 1s ease-out;  
    	transition: all 0.3s 1s ease-out;
    }
    
    /* JavaScript Turned Off */
    .no-js #loader-wrapper {
    	display: none;
    }
    .no-js h1 {
    	color: #222222;
    }
</style>

</head>
<body>


	<div id="loader-wrapper">
		<div id="loader"><img src="view/images/camps.png"  alt=""></div>

		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>

	</div>

	<script src="view/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript">

		var tipo = "<?php echo $tipousuario; ?>";
		$(document).ready(function() {

			setTimeout(function(){
				$('body').addClass('loaded');
				if(tipo == 1){
					window.location = "view/admininicioview.php";
				}else if(tipo == 2){
					window.location = "view/profesorinicioview.php";

				}else if(tipo == 3){
					window.location = "view/estudianteinicioview.php";
				}
				//window.location = "admincursoview.php";

			}, 2500);

		});
	</script>
	
</body>
</html>