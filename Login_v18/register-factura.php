<?php
include("conexion.php");

$idfactura = null;
$fecha = date('Y-m-d H:i:s');
$idusuario = $_POST['idusuario'];
$idcliente = $_POST['idcliente'];
$idproducto = $_POST['idproducto'];
$cantidad = $_POST['cantidad'];
$totalfactura = $_POST['totalfactura'];

$sqlPrecio = "SELECT precio FROM producto WHERE idproducto = $idproducto"; // Supongamos que quieres el nombre de usuario con ID 1

$resultDescripcion = $mysqli->query($sqlPrecio);

if ($resultDescripcion->num_rows > 0) {
    // Obtiene el nombre de usuario y asigna a una variable
    $rowDescripcion = $resultDescripcion->fetch_assoc();
    $precio = $rowDescripcion['precio'];
    $totalfactura=$precio*$cantidad;
} else {
    echo "No se encontraron resultados para la descripcion.";
}


$sql = "INSERT INTO factura VALUES('$idfactura','$fecha','$idusuario','$idcliente','$idproducto','$cantidad','$totalfactura')";

if (mysqli_query($mysqli, $sql)) {
    echo '<script language="javascript">';

    echo 'window.location="registration-factura.php";';
    echo '</script>';
} else {
    echo '<script language="javascript">';

    echo 'window.location="registration-factura.php";';
    echo '</script>';
}
?>