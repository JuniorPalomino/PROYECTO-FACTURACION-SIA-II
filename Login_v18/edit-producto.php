<?php
    include("conexion.php");

    $idproducto = $_POST['idproducto'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $existencia = $_POST['existencia'];

    $sql="UPDATE producto SET descripcion='$descripcion', precio='$precio', existencia='$existencia'
    WHERE idproducto='$idproducto'";

    if(mysqli_query($mysqli, $sql)){
        echo '<script language="javascript">';
        
        echo 'window.location="registration-producto.php";';
        echo '</script>';
    }
    else{
        echo '<script language="javascript">';
        
        echo 'window.location="registration-producto.php";';
        echo '</script>';
    }
?>