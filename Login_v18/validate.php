<?php 
include('conexion.php');
session_start(); 

$username=$_POST['usuario']; 
$password=$_POST['clave'];

$username=$mysqli->real_escape_string($username); 

$query="SELECT usuario, clave FROM usuario WHERE usuario='$username' AND clave='$password';"; 
$result=$mysqli->query($query);

if($result->num_rows==1){
    $_SESSION['user']=$username;
    header('Location:inicio.php');
}
else{
    header('Location:index.php');
}
?>