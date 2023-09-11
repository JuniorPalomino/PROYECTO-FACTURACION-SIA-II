<?php
    include("conexion.php");

    $idproducto=null; 
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $existencia = $_POST['existencia'];

    $sql="INSERT INTO producto VALUES('$idproducto','$descripcion','$precio','$existencia')";

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