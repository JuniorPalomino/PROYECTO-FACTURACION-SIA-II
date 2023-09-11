<?php
    include("conexion.php");

    $idusuario = $_POST['idusuario'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $rol = $_POST['rol'];

    $sql="UPDATE usuario SET nombre='$nombre', correo='$correo', usuario='$usuario', clave='$clave', rol='$rol'
    WHERE idusuario='$idusuario'";

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