<?php
include("conexion.php"); //incluimos al archivo config.php ya que tiene la variable $msqli

$id = $_GET['id']; // Creamos nueva variable con un valor de arreglo                      //asignamos la variable $query con la funcion mysqli_query
?>

<!DOCTYPE html>
<html lang="en">

<head> <!--creamos nuestro head-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style-general.css?ts=<?= time() ?>" />
    <link rel="stylesheet" type="text/css" href="style-home2.css?ts=<?= time() ?>" />
    <!--Asignamos nuestro CSS, para el diseño-->
    <title>Editar Cliente</title>

</head>
<div>
    <?php
    require_once "header.php";
    ?>
</div>

<body>
    <div class="users-form">
        <form action="edit-cliente.php" method="POST">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Ingrese los nuevos datos del Cliente
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> <!--creamos nuestro formulario para editar los datos de los clientes creados-->
            <?php
            $result = mysqli_query($mysqli, "SELECT * FROM cliente WHERE idcliente='$id'");
            while ($row = mysqli_fetch_array($result)) {
                echo "<h1>Editar datos del Cliente</h1>";
                echo "<input type='hidden' name='idcliente' value='{$row['idcliente']}' required>";
                echo "<p>Actualizar Dni</p>";
                echo "<input type='text' name='dni' value='{$row['dni']}' required>";
                echo "<p>Actualizar Nombre</p>";
                echo "<input type='text' name='nombre' value='{$row['nombre']}' required>";
                echo "<p>Actualizar Telefono</p>";
                echo "<input type='text' name='telefono' value='{$row['telefono']}' required>";
                echo "<p>Actualizar Direccion</p>";
                echo "<input type='text' name='direccion' value='{$row['direccion']}' required>";
            }
            ?>
            <input type="submit" onclick="edit()" value="Actualizar">
        </form>
    </div>
    <script>
        function edit() {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Cambios guardados',
                html: 'Click para continuar',
                timer: 4500
            })
        }
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>