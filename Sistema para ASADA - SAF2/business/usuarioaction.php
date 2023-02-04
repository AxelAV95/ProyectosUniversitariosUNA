<?php 

    include 'usuariobusiness.php';
    
    if (isset($_POST['actualizar'])){

        if ( !empty($_POST)) {

            $user = $_POST['correo'];
            $pass = $_POST['pass'];
            $tipo = $_POST['tipo'];
            $id = $_POST['multiloginid'];

            $usuarioB = new BusinessUsuario();
            $usuario = new Usuario();
            $usuario->setUsuario($user);
            $usuario->setPassword($pass);
            $usuario->setTipo($tipo);

            $usuarioB->actualizarUsuario($usuario,$id);
            
        }

    }
    if(isset($_POST['insertar'])){

        if ( !empty($_POST)) {

            $user = $_POST['correo'];
            $pass = $_POST['pass'];
            $tipo = $_POST['tipo'];


            $usuarioB = new BusinessUsuario();
            $usuario = new Usuario();
            $usuario->setUsuario($user);
            $usuario->setPassword($pass);
            $usuario->setTipo($tipo);
            $usuarioB->insertarUsuario($usuario);
        }

    }
     if(isset($_POST['eliminar'])){

        if ( !empty($_POST)) {
            $id = $_POST['id'];
            $usuarioB = new BusinessUsuario();
            $usuarioB-> eliminarUsuario($id);
            

        }

    }









?>