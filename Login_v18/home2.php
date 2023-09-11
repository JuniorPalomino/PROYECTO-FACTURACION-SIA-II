<?php
require_once "header.php";
include("conexion.php");
?>

<head>
    <link rel="stylesheet" type="text/css" href="style-home2.css?ts=<?= time() ?>" />
</head>

<div class="container">
    <h1>Sistema de Facturación</h1>
    <p>Bienvenido a nuestro sistema de facturación. Aquí podrás gestionar todas tus facturas de manera eficiente y
        segura.</p>

    <div class="row">
        <!-- Feature 1 -->
        <div class="col-md-4 feature-box">
            <img src="images/home_01.jpeg" alt="Imagen Descriptiva 1" class="feature-image">
            <p class="feature-description">Gestiona tus facturas de manera eficiente con nuestro sistema avanzado.</p>
        </div>

        <!-- Feature 2 -->
        <div class="col-md-4 feature-box">
            <img src="images/home_02.jpeg" alt="Imagen Descriptiva 2" class="feature-image">
            <p class="feature-description">Mantén un registro detallado de todas tus transacciones y clientes.</p>
        </div>

        <!-- Feature 3 -->
        <div class="col-md-4 feature-box">
            <img src="images/home_03.jpeg" alt="Imagen Descriptiva 3" class="feature-image">
            <p class="feature-description">Accede a reportes detallados y estadísticas de tus facturas.</p>
        </div>
    </div>

    <h1>Últimas Facturas</h1>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-light">
                <div class="users-table">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>FECHA</th>
                            <th>ID_USUARIO</th>
                            <th>ID_CLIENTE</th>
                            <th>ID_PRODUCTO</th>
                            <th>CANTIDAD</th>
                            <th>TOTAL FACTURA</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM factura";
                        $query = mysqli_query($mysqli, $sql);
                        while ($row = mysqli_fetch_array($query)): ?>
                            <tr>
                                <td name="idfactura">
                                    <?= $row['idfactura'] ?>
                                </td>
                                <td name="fecha">
                                    <?= $row['fecha'] ?>
                                </td>
                                <td name="idusuario">
                                    <?= $row['idusuario'] ?>
                                </td>
                                <td name="idcliente">
                                    <?= $row['idcliente'] ?>
                                </td>
                                <td name="idproducto">
                                    <?= $row['idproducto'] ?>
                                </td>
                                <td name="cantidad">
                                    <?= $row['cantidad'] ?>
                                </td>
                                <td name="totalfactura">
                                    <?= $row['totalfactura'] ?>
                                </td>
                                <td>
                                    <form action="Impresion_Factura/invoice.php" method="POST">
                                    <input type="hidden" name="idfactura" value="<?= $row['idfactura'] ?>">
                                    <button type="submit" class="users-table--imprimir">Imprimir Factura</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </div>
            </table>
            <br>
            <br>
        </div>
