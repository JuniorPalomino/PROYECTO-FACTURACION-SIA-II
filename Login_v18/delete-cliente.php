<?php
    include("conexion.php");

    $id = $_GET['id'];

    $sql="DELETE FROM cliente WHERE idcliente='$id'";

    if(mysqli_query($mysqli, $sql))
    {
        echo '<script language="javascript">';
        echo 'window.location="registration-cliente.php";';
        echo '</script>';
    }
    else
    {
        echo '<script language="javascript">';
        echo 'window.location="registration-cliente.php";';
        echo '</script>';
    }
?>