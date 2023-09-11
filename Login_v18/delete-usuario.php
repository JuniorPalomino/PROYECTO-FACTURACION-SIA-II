<?php
    include("conexion.php");

    $id = $_GET['id'];

    $sql="DELETE FROM usuario WHERE idusuario='$id'";

    if(mysqli_query($mysqli, $sql))
    {
        echo '<script language="javascript">';
        echo 'window.location="registration-usuario.php";';
        echo '</script>';
    }
    else
    {
        echo '<script language="javascript">';
        
        echo 'window.location="registration-usuario.php";';
        echo '</script>';
    }
?>