<?php

include("conexion.php");

$sql = "SELECT * FROM usuario";
$query = mysqli_query($mysqli, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro de Usuarios</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style-home2.css?ts=<?= time() ?>" />
    <meta name="" viewport
        content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">

    <style>
        body {
            background-color: #a79d9d;
            /* Color lila */
            font-family: 'Roboto', sans-serif;
            color: #ffffff;
            /* Letras blancas */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .users-form {
            background-color: rgba(255, 255, 255, 0.1);
            /* Fondo semi-transparente */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            margin-bottom: 50px;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <div>
        <?php
        require_once "header.php";
        ?>
    </div>
    <div class="container">
        <div class="users-form">
            <form action="register-usuario.php" method="POST">
                <h1>Ingresar datos del Usuario</h1>
                <input type="text" placeholder="Nombre" name="nombre" required>
                <input type="text" placeholder="Correo" name="correo" required>
                <input type="text" placeholder="Usuario" name="usuario" required>
                <input type="password" placeholder="Contraseña" name="clave" required>

                <!-- Lista desplegable para seleccionar el Rol -->
                <!-- Lista desplegable para seleccionar el Rol -->
                <select name="rol" required>
                    <?php
                    // Consulta para obtener todos los roles
                    $roles = mysqli_query($mysqli, "SELECT * FROM rol");
                    while ($rol = mysqli_fetch_array($roles)) {
                        echo "<option value='{$rol['idrol']}'>{$rol['rol']}</option>";
                    }
                    ?>
                </select>

                <input type="submit" onclick="add()" value="Agregar">
            </form>
        </div>

        <script>
            function del() {
                Swal.fire(
                    'Usuario Eliminado',
                    'Click para continuar',
                    'success'
                )
            }

            function add() {
                Swal.fire(
                    'Usuario Agregado',
                    'Click para continuar',
                    'success'
                )
            }
        </script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <h1>Usuarios registrados</h1>
        <br>
        <div class="container">
            <div class="table-responsive">
                <table class="table table-light">
                    <div class="users-table">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>CORREO</th>
                                <th>USUARIO</th>
                                <th>CONTRASEÑA</th>
                                <th>ROL</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($query)): ?>
                                <tr>
                                    <td>
                                        <?= $row['idusuario'] ?>
                                    </td>
                                    <td>
                                        <?= $row['nombre'] ?>
                                        </th>
                                    <td>
                                        <?= $row['correo'] ?>
                                    </td>
                                    <td>
                                        <?= $row['usuario'] ?>
                                    </td>
                                    <td>
                                        <?= $row['clave'] ?>
                                    </td>
                                    <td>
                                        <?= $row['rol'] ?>
                                    </td>
                                    <td><a href="update-usuario.php?id=<?= $row['idusuario'] ?>"
                                            class="users-table--edit">Editar</a></td>
                                    <td><a onclick="del()" href="delete-usuario.php?id=<?= $row['idusuario'] ?>"
                                            class="users-table--delete">Eliminar</a></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </div>
                </table>
                <br>
                <br>
            </div>
        </div>
        
</html>