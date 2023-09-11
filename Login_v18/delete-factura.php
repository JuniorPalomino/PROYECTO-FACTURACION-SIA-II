<?php
    include("conexion.php");

    $id = $_GET['id'];

    $sql="DELETE FROM factura WHERE idfactura='$id'";

    if(mysqli_query($mysqli, $sql))
    {
        echo '<script language="javascript">';
        echo 'window.location="registration-factura.php";';
        echo '</script>';
    }
    else
    {
        echo '<script language="javascript">';
        
        echo 'window.location="registration-factura.php";';
        echo '</script>';
    }
?>