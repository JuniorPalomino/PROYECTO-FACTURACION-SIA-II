<?php
    include("conexion.php");

    $idfactura = $_POST['idfactura'];
    $fecha = date('Y-m-d H:i:s');
    $idusuario = $_POST['idusuario'];
    $idcliente = $_POST['idcliente'];
    $idproducto = $_POST['idproducto'];
    $cantidad = $_POST['cantidad'];
    $totalfactura = $_POST['totalfactura'];

    $sql="UPDATE factura SET fecha='$fecha', idusuario='$idusuario', idcliente='$idcliente', idproducto='$idproducto', cantidad='$cantidad', totalfactura='$totalfactura'
    WHERE idfactura='$idfactura'";

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