<?php

require "./code128.php";
include ("conexion.php");		// Conexión a la base de datos (asegúrate de completar los valores adecuados)

$idfactura = $_POST['idfactura']; 			// Variable de referencia

// Consulta SQL para obtener la fecha de la tabla factura
$sqlFechaFactura = "SELECT fecha, cantidad, totalfactura FROM factura WHERE idfactura = $idfactura"; // Supongamos que quieres la fecha de la factura con ID 1

$resultFechaFactura = $mysqli->query($sqlFechaFactura);

if ($resultFechaFactura->num_rows > 0) {
    // Obtiene la fecha y asigna a una variable
    $rowFechaFactura = $resultFechaFactura->fetch_assoc();
    $fechaFactura = $rowFechaFactura['fecha'];
	$cantidad = $rowFechaFactura['cantidad'];
	$totalFactura = $rowFechaFactura['totalfactura'];
	$valorventa=$totalFactura-($totalFactura*18/118);
	$valorventa=round($valorventa,2);
	$igv=$totalFactura-$valorventa;
} else {
    echo "No se encontraron resultados para la fecha de la factura.";
}

// Consulta SQL para obtener el nombre y dirección del cliente
$sqlCliente = "SELECT cliente.nombre, cliente.direccion, cliente.dni FROM factura INNER JOIN cliente ON factura.idcliente = cliente.idcliente WHERE factura.idfactura = $idfactura"; // Supongamos que quieres los datos del cliente con ID 1

$resultCliente = $mysqli->query($sqlCliente);

if ($resultCliente->num_rows > 0) {
    // Obtiene el nombre y la dirección y asigna a variables
    $rowCliente = $resultCliente->fetch_assoc();
    $nombreCliente = $rowCliente['nombre'];
    $direccionCliente = $rowCliente['direccion'];
	$dniCliente = $rowCliente['dni'];
} else {
    echo "No se encontraron resultados para el cliente.";
}


$sqlUsuario = "SELECT usuario.nombre FROM factura INNER JOIN usuario ON factura.idusuario = usuario.idusuario WHERE factura.idfactura = $idfactura"; // Supongamos que quieres el nombre de usuario con ID 1

$resultUsuario = $mysqli->query($sqlUsuario);

if ($resultUsuario->num_rows > 0) {
    // Obtiene el nombre de usuario y asigna a una variable
    $rowUsuario = $resultUsuario->fetch_assoc();
    $nombreUsuario = $rowUsuario['nombre'];
} else {
    echo "No se encontraron resultados para el usuario.";
}
$sqlDescripcion = "SELECT producto.descripcion, producto.precio FROM factura INNER JOIN producto ON factura.idproducto = producto.idproducto WHERE factura.idfactura =$idfactura"; // Supongamos que quieres el nombre de usuario con ID 1

$resultDescripcion = $mysqli->query($sqlDescripcion);

if ($resultDescripcion->num_rows > 0) {
    // Obtiene el nombre de usuario y asigna a una variable
    $rowDescripcion = $resultDescripcion->fetch_assoc();
    $descripcion = $rowDescripcion['descripcion'];
	$precio = $rowDescripcion['precio'];
} else {
    echo "No se encontraron resultados para la descripcion.";
}

/*
// Ahora puedes usar las variables $fechaFactura, $nombreCliente y $direccionCliente como necesites
echo "Fecha de la factura: " . $fechaFactura . "<br>";
echo "Nombre del cliente: " . $nombreCliente . "<br>";
echo "Dirección del cliente: " . $direccionCliente . "<br>";
*/


	# Incluyendo librerias necesarias

	$pdf = new PDF_Code128('P','mm','Letter');
	$pdf->SetMargins(17,17,17);
	$pdf->AddPage();

	# Logo de la empresa formato png #
	$pdf->Image('./img/logo.png',165,12,35,35,'PNG');

	# Encabezado y datos de la empresa #
	$pdf->SetFont('Arial','B',16);
	$pdf->SetTextColor(32,100,210);
	$pdf->Cell(150,10,utf8_decode(strtoupper("Nombre de empresa")),0,0,'L');

	$pdf->Ln(9);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(150,9,utf8_decode("RUC: 1046425421"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Direccion Calle Puno 345"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Teléfono: 987654321"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Email:ServiciosGenerales@gmail.com"),0,0,'L');

	$pdf->Ln(10);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(30,7,utf8_decode("Fecha de emisión:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(116,7,utf8_decode(date($fechaFactura)),0,0,'L');

	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(37,7,utf8_decode("Fecha de vencimiento:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(116,7,utf8_decode(date("Y-m-d H:m:s",strtotime($fechaFactura."+ 1 days"))),0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(35,7,utf8_decode(strtoupper("Factura Nro.")),0,0,'C');

	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(17,7,utf8_decode("Vendedor:"),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(134,7,utf8_decode($nombreUsuario),0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,utf8_decode(strtoupper($idfactura)),0,0,'C');

	$pdf->Ln(10);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,utf8_decode("Cliente:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,utf8_decode($nombreCliente),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(8,7,utf8_decode("Doc: "),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,utf8_decode($dniCliente),0,0,'L');
	

	$pdf->Ln(7);

	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(6,7,utf8_decode("Dir:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(109,7,utf8_decode( $direccionCliente),0,0);

	$pdf->Ln(9);

	# Tabla de productos #
	$pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(23,83,201);
	$pdf->SetDrawColor(23,83,201);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(78,8,utf8_decode("Descripción"),1,0,'C',true);
	$pdf->Cell(12,8,utf8_decode("Und."),1,0,'C',true);
	$pdf->Cell(15,8,utf8_decode("Cant."),1,0,'C',true);
	$pdf->Cell(25,8,utf8_decode("Precio"),1,0,'C',true);
	$pdf->Cell(19,8,utf8_decode("Desc."),1,0,'C',true);
	$pdf->Cell(32,8,utf8_decode("Subtotal"),1,0,'C',true);

	$pdf->Ln(8);

	
	$pdf->SetTextColor(39,39,51);



	/*----------  Detalles de la tabla  ----------*/
	$pdf->Cell(78,7,utf8_decode($descripcion),'L',0,'C');
	$pdf->Cell(12,7,utf8_decode("Kg"),'L',0,'C');
	$pdf->Cell(15,7,utf8_decode($cantidad),'L',0,'C');
	$pdf->Cell(25,7,utf8_decode(" S/. $precio"),'L',0,'C');
	$pdf->Cell(19,7,utf8_decode("S/.0.00 "),'L',0,'C');
	$pdf->Cell(32,7,utf8_decode("S/.$totalFactura"),'LR',0,'C');
	$pdf->Ln(7);
	/*----------  Fin Detalles de la tabla  ----------*/


	
	$pdf->SetFont('Arial','B',9);
	
	# Impuestos & totales #
	$pdf->Cell(100,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(32,7,utf8_decode("VALOR VENTA"),'T',0,'C');
	$pdf->Cell(34,7,utf8_decode("S/.$valorventa" ),'T',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode("I.G.V (18.00)"),'',0,'C');
	$pdf->Cell(34,7,utf8_decode("S/.$igv"),'',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');


	$pdf->Cell(32,7,utf8_decode("TOTAL A PAGAR"),'T',0,'C');
	$pdf->Cell(34,7,utf8_decode("S/.$totalFactura"),'T',0,'C');

	$pdf->Ln(12);

	$pdf->SetFont('Arial','',9);

	$pdf->SetTextColor(39,39,51);
	$pdf->MultiCell(0,9,utf8_decode("*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar esta factura ***"),0,'C',false);

	$pdf->Ln(9);

	# Codigo de barras #
	$pdf->SetFillColor(39,39,51);
	$pdf->SetDrawColor(23,83,201);
	$pdf->Code128(72,$pdf->GetY(),"COD000001V0001",70,20);
	$pdf->SetXY(12,$pdf->GetY()+21);
	$pdf->SetFont('Arial','',12);
	$pdf->MultiCell(0,5,utf8_decode("COD000001V0001"),0,'C',false);

	# Nombre del archivo PDF #
	$pdf->Output("I","Factura_Nro_1.pdf",true);