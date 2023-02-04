


<?php 

/*
    HERRAMIENTAS USADAS: JQUERY-CONFIRM-FONTAWESOMEICONS-JQUERY
    

*/


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrarse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../view/css/animate.css" />
    <link rel="stylesheet" href="../view/icon/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../view/css/jquery-confirm.min.css">
    <script src="../view/js/jquery-3.3.1.min.js"></script>
    <script src="../view/js/jquery-confirm.min.js"></script>

    <style> 
    
    .text-holder{
  color:#aaaaaa;
  text-align:center;
  padding-top:40px;
}
.button-holder{
  padding-top:10px;
}
.ajax-button{
  
  display:inline-block;
  width:100px;
  height:40px;
  
  
  text-align:center;
}


.submit{
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  width:150px;
  height:40px;
  background-color:#111111;
  border:2px solid #FFFFFF;
  border-radius:10px;
  color:#FFFFFF;
  font-size:13px;
  cursor:pointer !important;
  outline:none;
  margin-left:-25%;
  
}

.submit:hover{
  background-color:#222222;
}


    
    </style>
    

    <style> 
        body{
                        background: #2980b9;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2c3e50, #2980b9);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2c3e50, #2980b9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }

        #contenedor-login{
            display:flex;
            align-items: center;
            justify-content: center;
            opacity: 0.3;
          


        }
        #entradas-formulario{
            display:flex;
            align-items: center;
            justify-content: center;
            margin: -3% auto;
            width:auto;
            flex-direction: column;
            

        }

        #formulario{
            margin: 12% auto;
            background-color:white;
            width: 500px;
            height:330px;
            border-radius: 10px;
            -webkit-box-shadow: 3px 0px 28px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 3px 0px 28px 0px rgba(0,0,0,0.75);
            box-shadow: 3px 0px 28px 0px rgba(0,0,0,0.75);
            
        }

        /*input{
            margin-top: 10px;
            width: 300px;
            height: 30px;
            border-radius: 15px; 
            
            
            color: black;
        }*/

        label{
            margin-top: 20px;
            text-align:left;
            float: left;
        }

        #login{
            display: inline-block;
    border: none;
    border-radius: 10px;
    padding: 0.5rem 1.5rem;
    margin: 0;
    text-decoration: none;
    background: #0069ed;
    color: #ffffff;
    font: 17px "Lato", Arial, sans-serif;
    font-size: 1rem;
    cursor: pointer;
    text-align: center;
    transition: background 250ms ease-in-out, 
                transform 150ms ease;
    -webkit-appearance: none;
    -moz-appearance: none;
        }

        #login:hover{
            background: #000428;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #004e92, #000428);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #004e92, #000428); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }

        #titulo{
            text-align: center;
        }
        
        h1{
            font: 28px "Lato", Arial, sans-serif;
        }
        ::placeholder{
            text-align: center;
        }

        .col-3{float: left; width: 57.33%; margin: 40px 3%; position: relative;} 
        input[type="text"],input[type="password"]{font: 14px "Lato", Arial, sans-serif; color: #333; width: 100%; box-sizing: border-box; letter-spacing: 1px;}
        
        .effect-1, 
.effect-2, 
.effect-3{border: 0; padding: 7px 0; border-bottom: 1px solid #ccc;}

.effect-1 ~ .focus-border{position: absolute; bottom: 0; left: 0; width: 0; height: 2px; background-color: #3399FF; transition: 0.4s;}
.effect-1:focus ~ .focus-border{width: 100%; transition: 0.4s;}



    </style>
    
</head>
<body>


        

        <div id="contenedor-login" class="animated jackInTheBox">
       
 
            <div id="formulario">   
            
            <div id="titulo" class="animated bounceIn delay-1s" ><h1> Registrarse</h1> </div>
            <center><img src="../view/img/user.png" width="30" height="30"></center>
                <form method="POST" id="registro" action="registro.php"> 
                
                <div id="entradas-formulario" class="animated bounceIn delay-1s">

                    <div class="col-3">
                        <input required class="effect-1"  onBlur="disponibilidad()" type="text" id="correo" name="correo" placeholder="Correo">
                        <span id="user-availability-status"></span> 
                        <span class="focus-border"></span>
                    </div>

                    <div class="col-3" style="margin-top:-10px;">
                        <input required class="effect-1" type="password" id="pass" name="pass" placeholder="Contraseña">
                        <span class="focus-border"></span>
                    </div>


                    <div class="container-fluid row ">
                        <div class="container">
                        <div class="row">
                            <div class="col-xs-1 button-holder">
                            <div class="ajax-button">
                            
                                <input type="submit" class="submit"  value="Registrarse"">
                                
                            </div>
                            </div>
                        </div>
                        
                        </div>  
                    </div>
               
        

                </div>
                </form>


                <center><a style="color:black;" href="login.php"><i style="margin-top: 40px;font-size: 70px;"  class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></a></center>

                

               
               

            </div>
            
        
        </div>
        

    

    

    <script>

        function disponibilidad() {
            setTimeout(function(){ $("#loaderIcon").show(); }, 2000);

                jQuery.ajax({
                url: "checkcorreo.php",
                data:'username='+$("#correo").val(),
                type: "POST",
                success:function(data){
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
                },
                error:function (){}
                });
        }
        /*$('#registro').on('submit', function(){

            alert("helleo");
        });*/
</script>
</body>
</html>