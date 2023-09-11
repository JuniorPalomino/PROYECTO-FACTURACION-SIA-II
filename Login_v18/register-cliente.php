<?php
    include("conexion.php");

    $idcliente=null; 
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql="INSERT INTO cliente VALUES('$idcliente','$dni','$nombre','$telefono','$direccion')";

    if(mysqli_query($mysqli, $sql)){
        echo '<script language="javascript">';
        
        echo 'window.location="registration-cliente.php";';
        echo '</script>';
    }
    else{
        echo '<script language="javascript">';
        
        echo 'window.location="registration-cliente.php";';
        echo '</script>';
    }
?>