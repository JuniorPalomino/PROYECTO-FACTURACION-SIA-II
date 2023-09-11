<?php
    include("conexion.php");

    $idusuario=null; 
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $rol = $_POST['rol'];

    $sql="INSERT INTO usuario VALUES('$idusuario','$nombre','$correo','$usuario','$clave','$rol')";

    if(mysqli_query($mysqli, $sql)){
        echo '<script language="javascript">';
        
        echo 'window.location="registration-usuario.php";';
        echo '</script>';
    }
    else{
        echo '<script language="javascript">';
        
        echo 'window.location="registration-usuario.php";';
        echo '</script>';
    }
?>