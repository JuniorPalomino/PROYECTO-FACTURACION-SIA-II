<?php
    include("conexion.php");

    $id = $_GET['id'];

    $sql="DELETE FROM producto WHERE idproducto='$id'";

    if(mysqli_query($mysqli, $sql))
    {
        echo '<script language="javascript">';
        echo 'window.location="registration-producto.php";';
        echo '</script>';
    }
    else
    {
        echo '<script language="javascript">';
        
        echo 'window.location="registration-producto.php";';
        echo '</script>';
    }
?>