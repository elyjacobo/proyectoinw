<?php
    session_start();
    require('conexion.php');
    include('class/usuario.php');
    
    if(empty ($_POST['usuario']) || empty ($_POST['pass'])){
        header("Location: login.php?error=1");
    }
    else{
        $usuario = new Usuario($_POST['usuario'], $_POST['pass']);
        if ($usuario->ChequearUsuario($conexion)){
            $_SESSION["autenticado"] = "si";
            $_SESSION["usuario"] = $usuario->ObtenerDato("login");
            $_SESSION["rol"] = $usuario->ObtenerDato("rol");
            $_SESSION["escuela"]=$usuario->ObtenerDato("escuela");
            
            header("Location: inicio.php");
        }
        else{
            header("Location: login.php?error=".$usuario->error);
        }
    }
?>
