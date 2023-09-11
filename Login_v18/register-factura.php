<?php
    include("conexion.php");

    $idfactura=null; 
    $fecha = date('Y-m-d H:i:s');
    $idusuario = $_POST['idusuario'];
    $idcliente = $_POST['idcliente'];
    $idproducto = $_POST['idproducto'];
    $cantidad = $_POST['cantidad'];
    $totalfactura = $_POST['totalfactura'];

    $sql="INSERT INTO factura VALUES('$idfactura','$fecha','$idusuario','$idcliente','$idproducto','$cantidad','$totalfactura')";

    if(mysqli_query($mysqli, $sql)){
        echo '<script language="javascript">';
        
        echo 'window.location="registration-factura.php";';
        echo '</script>';
    }
    else{
        echo '<script language="javascript">';
        
        echo 'window.location="registration-factura.php";';
        echo '</script>';
    }
?>