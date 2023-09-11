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
        <form action="edit-factura.php" method="POST">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Ingrese los nuevos datos de la Factura
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> <!--creamos nuestro formulario para editar los datos de los clientes creados-->
            <?php
            $result = mysqli_query($mysqli, "SELECT * FROM factura WHERE idfactura='$id'");
            while ($row = mysqli_fetch_array($result)) {
                echo "<h1>Editar datos de la Factura</h1>";
                echo "<input type='hidden' name='idfactura' value='{$row['idfactura']}' required>";
                
                echo "<p>Actualizar ID_Usuario</p>";
                echo "<select name='idusuario' required>";

                // Consulta para obtener todos los usuarios
                $usuarios = mysqli_query($mysqli, "SELECT * FROM usuario");
                while ($idusuario = mysqli_fetch_array($usuarios)) {
                    // Si el rol actual coincide con el rol del usuario, lo seleccionamos por defecto
                    $selected = ($idusuario['idusuario'] == $idusuario['idusuario']) ? "selected" : "";
                    echo "<option value='{$idusuario['idusuario']}' $selected>{$idusuario['idusuario']}</option>";
                }

                echo "</select>";

                echo "<p>Actualizar ID_Cliente</p>";
                echo "<select name='idcliente' required>";

                // Consulta para obtener todos los clientes
                $clientes = mysqli_query($mysqli, "SELECT * FROM cliente");
                while ($idcliente = mysqli_fetch_array($clientes)) {
                    // Si el rol actual coincide con el rol del usuario, lo seleccionamos por defecto
                    $selected = ($idcliente['idcliente'] == $idcliente['idcliente']) ? "selected" : "";
                    echo "<option value='{$idcliente['idcliente']}' $selected>{$idcliente['idcliente']}</option>";
                }

                echo "</select>";

                echo "<p>Actualizar ID_Producto</p>";
                echo "<select name='idproducto' required>";

                // Consulta para obtener todos los productos
                $productos = mysqli_query($mysqli, "SELECT * FROM producto");
                while ($idproducto = mysqli_fetch_array($productos)) {
                    // Si el rol actual coincide con el rol del usuario, lo seleccionamos por defecto
                    $selected = ($idproducto['idproducto'] == $idproducto['idproducto']) ? "selected" : "";
                    echo "<option value='{$idproducto['idproducto']}' $selected>{$idproducto['idproducto']}</option>";
                }

                echo "</select>";

                echo "<p>Actualizar Cantidad</p>";
                echo "<input type='text' name='cantidad' value='{$row['cantidad']}' required>";
                
                echo "<p>Actualizar Total de la Factura</p>";
                echo "<input type='text' name='totalfactura' value='{$row['totalfactura']}' required>";
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