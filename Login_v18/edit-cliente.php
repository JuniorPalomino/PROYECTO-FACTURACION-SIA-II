<?php
    include("conexion.php");

    $idcliente = $_POST['idcliente'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql="UPDATE cliente SET dni='$dni', nombre='$nombre', telefono='$telefono', direccion='$direccion'
    WHERE idcliente='$idcliente'";

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