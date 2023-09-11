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
    <title>Editar Usuario</title>

</head>


<body>
<div>
        <?php
        require_once "header.php";
        ?>
    </div>
    <div class="users-form">
        <form action="edit-usuario.php" method="POST">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Ingrese los nuevos datos del Usuario
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> <!--creamos nuestro formulario para editar los datos de los clientes creados-->
            <?php
            $result = mysqli_query($mysqli, "SELECT * FROM usuario WHERE idusuario='$id'");
            while ($row = mysqli_fetch_array($result)) {
                echo "<h1>Editar datos del Usuario</h1>";
                echo "<input type='hidden' name='idusuario' value='{$row['idusuario']}' required>";
                echo "<p>Actualizar Nombre</p>";
                echo "<input type='text' name='nombre' value='{$row['nombre']}' required>";
                echo "<p>Actualizar Correo</p>";
                echo "<input type='text' name='correo' value='{$row['correo']}' required>";
                echo "<p>Actualizar Usuario</p>";
                echo "<input type='text' name='usuario' value='{$row['usuario']}' required>";
                echo "<p>Actualizar Clave</p>";
                echo "<input type='password' name='clave' value='{$row['clave']}' required>";
                echo "<p>Actualizar Rol</p>";
                echo "<select name='rol' required>";
                // Consulta para obtener todos los roles
                $roles = mysqli_query($mysqli, "SELECT * FROM rol");
                while ($rol = mysqli_fetch_array($roles)) {
                    // Si el rol actual coincide con el rol del usuario, lo seleccionamos por defecto
                    $selected = ($rol['idrol'] == $row['rol']) ? "selected" : "";
                    echo "<option value='{$rol['idrol']}' $selected>{$rol['rol']}</option>";
                }
                echo "</select>";


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