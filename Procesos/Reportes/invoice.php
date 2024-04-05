<?php

	# Incluyendo librerias necesarias #
	require "./code128.php";
	require "../../conexion.php";
	$Id=$_GET['id'];
	$fecha=mysqli_query($conn, "SELECT `factura`.`Fecha`, `factura`.`Codigo`, `factura`.`Monto`, `factura`.`Id_Parametro`, `factura`.`Id_Detalle`, `factura`.`RTN`, `factura`.`CAI`, `factura`.`Id_Moneda`, `factura`.`Metodo_Pago`, `factura`.`Cantidad_Efectivo`, `factura`.`Numero_Tarjeta` FROM `factura` where `Id_Factura`=$Id;");

	$met = array();
	$efec = array();
	$tarje = array();
    $date = array();
	$cod = array();
	$mon = array();
	$detall = array();
	$moneda = array();
	$cai= array();
	$rtn= array();
	$param= array();
    while($datos = mysqli_fetch_array($fecha)) {
        array_push($met, $datos['Metodo_Pago']);
		array_push($efec, $datos['Cantidad_Efectivo']);
		array_push($tarje, $datos['Numero_Tarjeta']);
		array_push($date, $datos['Fecha']);
        array_push($cod, $datos['Codigo']);
		array_push($detall, $datos['Id_Detalle']);
		array_push($param, $datos['Id_Parametro']);
		array_push($mon, $datos['Monto']);
		array_push($cai, $datos['CAI']);
		array_push($rtn, $datos['RTN']);
		array_push($moneda, $datos['Id_Moneda']);
    }
$pruebamet = $met[0];
$pruebaefec = $efec[0];
$pruebatarje = $tarje[0];
$pruebafecha=$date[0];
$pruebacod=$cod[0];
$pruebamoneda=$moneda[0];
$pruebamon=$mon[0];
$pruebadetall=$detall[0];
$pruebacai=$cai[0];
$pruebartn=$rtn[0];
$pruebaparam=$param[0];


$queryparametro=mysqli_query($conn, "SELECT Rango_Ini, Rango_Fin, Consecutivo, Fecha_Emi, Fecha_Ven FROM parametro WHERE `Id_Parametro`=$pruebaparam;");
    
    $rangini = array();
    $rangfin = array();
    $conse = array();
    $fechaemi = array();
    $fechafin = array();
  
    while($datos = mysqli_fetch_array($queryparametro)) {
        array_push($rangini, $datos['Rango_Ini']);
        array_push($rangfin, $datos['Rango_Fin']);
        array_push($conse, $datos['Consecutivo']);
        array_push($fechaemi, $datos['Fecha_Emi']);
        array_push($fechafin, $datos['Fecha_Ven']);
    }

	$rangoinicial=$rangini[0];
$rangofinal=$rangfin[0];
$consecutivo=$conse[0];
$fechaemision=$fechaemi[0];
$fechafinal=$fechafin[0];

$querydetall=mysqli_query($conn, "SELECT `Id_Boleto`, `Subtotal`, `Total`, `Total_Descuento`, `Total_Impuesto` FROM `detallefactura` where `Id_Detalle`=$pruebadetall;");

$bol= array();
$subt= array();
$tot= array();
$totdesc= array();
$todimp= array();

while($datos = mysqli_fetch_array($querydetall)) {
	array_push($bol, $datos['Id_Boleto']);
	array_push($subt, $datos['Subtotal']);
	array_push($tot, $datos['Total']);
	array_push($totdesc, $datos['Total_Descuento']);
	array_push($todimp, $datos['Total_Impuesto']);
}
$pruebabol=$bol[0];
$pruebasubt=$subt[0];
$pruebatot=$tot[0];
$pruebatotdesc=$totdesc[0];
$pruebatotimp=$todimp[0];


$querymoneda=mysqli_query($conn, "SELECT `ConversionADolar` FROM `moneda` where `Id_Moneda`=$pruebamoneda;");

$convermoneda= array();

while($datos = mysqli_fetch_array($querymoneda)) {
	array_push($convermoneda, $datos['ConversionADolar']);
}
$pruebaconver=$convermoneda[0];

if($pruebamoneda==1){
$symbolmoneda="$";
$txtmoneda="USD";	
}else if($pruebamoneda==2){
	$symbolmoneda="E";
	$txtmoneda="EUR";	
}if($pruebamoneda==3){
	$symbolmoneda="L";
	$txtmoneda="LPS";	
}

$boleto=mysqli_query($conn, "SELECT `boleto`.`Codigo`, `boleto`.`Id_Asiento`, `boleto`.`Id_Pasajero`, `boleto`.`Id_Vuelo`, `boleto`.`Id_Clase`, `boleto`.`Id_Equipaje` FROM `boleto` where `Id_Boleto`=$pruebabol;");

$bolcod = array();
$pas = array();
$vuelo = array();
$clase = array();
$equipaje = array();

while($datos = mysqli_fetch_array($boleto)) {
	array_push($bolcod, $datos['Codigo']);
	array_push($vuelo, $datos['Id_Vuelo']);
	array_push($clase, $datos['Id_Clase']);
	array_push($pas, $datos['Id_Pasajero']);
	array_push($equipaje, $datos['Id_Equipaje']);
}
$pruebabolcod=$bolcod[0];
$pruebapas=$pas[0];
$pruebavuelo=$vuelo[0];
$pruebaclase=$clase[0];
$pruebaequipaje=$equipaje[0];

$queryclase=mysqli_query($conn, "SELECT Tipo_Clase, MultiplicadorPrecio FROM `clase` where `Id_Clase`= '$pruebaclase';");

$multclase = array();
$classfin= array();

while($datos = mysqli_fetch_array($queryclase)) {
	array_push($classfin, $datos['Tipo_Clase']);
	array_push($multclase, $datos['MultiplicadorPrecio']);
}
$prueclassfin=$classfin[0];
$pruemultclase=$multclase[0];

$queryvuelo=mysqli_query($conn, "SELECT Lugar_Salida, Lugar_LLegada, Precio FROM `vuelo` where `Id_Vuelo`= '$pruebavuelo';");


$salidafin= array();
$llegadafin = array();
$vueloprice = array();
while($datos = mysqli_fetch_array($queryvuelo)) {
	array_push($salidafin, $datos['Lugar_Salida']);
	array_push($llegadafin, $datos['Lugar_LLegada']);
	array_push($vueloprice, $datos['Precio']);
}
$prueballegadafin=$llegadafin[0];
$pruebasalidafin=$salidafin[0];
$pruebapricevuelo=$vueloprice[0];

$queryequipaje=mysqli_query($conn, "SELECT MultiplicadorPrecio FROM equipaje WHERE Id_Equipaje=$pruebaequipaje");
    $equifinal = array();
  
    while($datos = mysqli_fetch_array($queryequipaje)) {
        array_push($equifinal, $datos['MultiplicadorPrecio']);
    }

$pruebaequipajefin=$equifinal[0];




$contadorboleto=mysqli_query($conn, "SELECT COUNT(`boleto`.`Id_Boleto`) AS boletoRes FROM `boleto` where `boleto`.`Codigo`= '$pruebabolcod' AND `boleto`.`Id_Pasajero`=$pruebapas AND `boleto`.`Id_Vuelo`=$pruebavuelo AND `boleto`.`Id_Clase`=$pruebaclase AND `boleto`.`Id_Equipaje`=$pruebaequipaje;");

$contbol= array();

while($datos = mysqli_fetch_array($contadorboleto)) {
	array_push($contbol, $datos['boletoRes']);
}

$pruebacontbol=$contbol[0];

$pasajero=mysqli_query($conn, "SELECT `pasajero`.`Nombre`,`pasajero`.`Telefono`, `pasajero`.`Tipo_Documento`, `pasajero`.`Numero_Documento`,`pasajero`.`Correo`,`pasajero`.`Fecha_Nacimiento` FROM `pasajero` where `Id_Pasajero`=$pruebapas;");

	$nom = array();
	$tel = array();
	$cor = array();
	$tipdoc = array();
	$numdoc = array();
$fecnac = array();
    while($datos = mysqli_fetch_array($pasajero)) {
        array_push($nom, $datos['Nombre']);
		array_push($fecnac, $datos['Fecha_Nacimiento']);
        array_push($tel, $datos['Telefono']);
		array_push($cor, $datos['Correo']);
		array_push($tipdoc, $datos['Tipo_Documento']);
		array_push($numdoc, $datos['Numero_Documento']);
    }

$pruebanom=$nom[0];
$pruebatel=$tel[0];
$pruebacor=$cor[0];
$pruebanumdoc=$numdoc[0];
$pruebatipdoc=$tipdoc[0];
$pruebafecnac=$fecnac[0];

$cumpleanos = new DateTime($pruebafecnac);
    $hoy = new DateTime();
    $annos = $hoy->diff($cumpleanos);
$desc=0;
	

function redondear_dos_decimal($valor) {
	$float_redondeado=round($valor * 100) / 100;
	return $float_redondeado;
	}

	$pdf = new PDF_Code128('P','mm','Letter');
	$pdf->SetMargins(9,17,17);
	$pdf->AddPage();

	# Logo de la empresa formato png #
	$pdf->Image('img/Emirates-Logo-1985-19991.png',160,12,40,40,'PNG');

	# Encabezado y datos de la empresa #
	$pdf->SetFont('Arial','B',16);
	$pdf->SetTextColor(66,92,90);
	$pdf->Cell(150,10,utf8_decode(strtoupper("Emirates Airlines")),0,0,'L');

	$pdf->Ln(9);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(150,9,utf8_decode(""),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("CAI: ".$pruebacai),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Rango Inicial:". $rangoinicial),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Rango Final:". $rangofinal),0,0,'L');
	
	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Direccion: Tegucigalpa, Honduras"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Teléfono: +504 2226-7808"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Email: customer.affairs@emirates.com"),0,0,'L');

	$pdf->Ln(10);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(30,7,utf8_decode("Fecha de emisión:"),0,0);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(116,7,utf8_decode($pruebafecha),0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(50,7,utf8_decode(strtoupper("Factura Nro.")),0,0,'C');

	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(12,7,utf8_decode(""),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(134,7,utf8_decode(""),0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(50,7,utf8_decode($pruebacod),0,0,'C');

	$pdf->Ln(10);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,utf8_decode("Cliente:"),0,0);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(45,7,utf8_decode($pruebanom),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(8,7,utf8_decode($pruebatipdoc.":"),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(45,7,utf8_decode("          ".$pruebanumdoc),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(7,7,utf8_decode("RTN:"),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(35,7,utf8_decode("  ".$pruebartn),0,0);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(7,7,utf8_decode("Tel:"),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(35,7,utf8_decode($pruebatel),0,0);
	$pdf->SetTextColor(39,39,51);

	$pdf->Ln(7);

	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(6,7,utf8_decode(""),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(109,7,utf8_decode(""),0,0);

	$pdf->Ln(9);

	# Tabla de productos #
	$pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(66,92,90);
	$pdf->SetDrawColor(66,92,90);
	$pdf->SetTextColor(255,205,163);
	$pdf->Cell(75,8,utf8_decode("Descripción"),1,0,'C',true);
	$pdf->Cell(16,8,utf8_decode("Cantidad"),1,0,'C',true);
	$pdf->Cell(18,8,utf8_decode("Precio vuelo"),1,0,'C',true);
	$pdf->Cell(17,8,utf8_decode("Precio clase"),1,0,'C',true);
	$pdf->Cell(17,8,utf8_decode("Precio equi."),1,0,'C',true);
	$pdf->Cell(17,8,utf8_decode("Precio"),1,0,'C',true);
	$pdf->Cell(18,8,utf8_decode("Desc."),1,0,'C',true);
	$pdf->Cell(20,8,utf8_decode("Subtotal"),1,0,'C',true);

	$pdf->Ln(8);

	
	$pdf->SetTextColor(39,39,51);



	/*----------  Detalles de la tabla  ----------*/

	$preciovuelo=redondear_dos_decimal($pruebapricevuelo*$pruebaconver);	
	$precioclase=redondear_dos_decimal($preciovuelo*$pruemultclase);
	$precioequipaje=redondear_dos_decimal($preciovuelo*$pruebaequipajefin);
	
	if($annos->y>=60){
		$desc=redondear_dos_decimal(($pruebamon*$pruebacontbol)*0.08);
		}
	$subtotal=$pruebamon- $desc;
	$pdf->Cell(77,10,utf8_decode("Boleto con código ".$pruebabolcod. ", saliendo de ".$pruebasalidafin),'L',0,'C');
	$pdf->Cell(14,13,utf8_decode($pruebacontbol),'L',0,'C');
	$pdf->Cell(18,13,utf8_decode($preciovuelo." ".$txtmoneda),'L',0,'C');
	$pdf->Cell(17,13,utf8_decode($precioclase." ".$txtmoneda),'L',0,'C');
	$pdf->Cell(18,13,utf8_decode($precioequipaje." ".$txtmoneda),'L',0,'C');
	$pdf->Cell(18,13,utf8_decode(redondear_dos_decimal($pruebasubt*$pruebaconver)." ".$txtmoneda),'L',0,'C');
	$pdf->Cell(16,13,utf8_decode(redondear_dos_decimal($pruebatotdesc*$pruebaconver)." ". $txtmoneda),'L',0,'C');
	$pdf->Cell(20,13,utf8_decode(redondear_dos_decimal($pruebasubt*$pruebaconver)." ".$txtmoneda),'LR',0,'C');
	$pdf->Ln(10);
	$pdf->Cell(77,3,utf8_decode(" con destino a ".$prueballegadafin.", en ".$prueclassfin),'L',0,'C');
	$pdf->Ln(3);
	/*----------  Fin Detalles de la tabla  ----------*/


	
	$pdf->SetFont('Arial','B',9);
	
	# Impuestos & totales #
	if($pruebamet=="Efectivo"){
	$pdf->Cell(117,7,utf8_decode('Metodo de pago: '. $pruebamet),'T',0,'C');
	$pdf->Cell(43,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(18,7,utf8_decode("SUBTOTAL"),'T',0,'C');
	$pdf->Cell(20,7,utf8_decode(redondear_dos_decimal($pruebasubt*$pruebaconver)." ". $txtmoneda),'T',0,'C');

	$pdf->Ln(7);
	$isv=redondear_dos_decimal($subtotal*0.18);
	$pdf->Cell(117,7,utf8_decode('Efectivo recibido: '.$pruebaefec." ".$txtmoneda ),'',0,'C');
	$pdf->Cell(43,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(18,7,utf8_decode("ISV (18%)"),'',0,'C');
	$pdf->Cell(20,7,utf8_decode(redondear_dos_decimal($pruebatotimp*$pruebaconver)." ". $txtmoneda),'',0,'C');

	$total=$subtotal+$isv;

	$pdf->Ln(7);
	
	$pdf->Cell(117,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(22,7,utf8_decode(''),'',0,'C');
	
	}else if($pruebamet=="Tarjeta"){
	
	$pdf->Cell(117,7,utf8_decode('Metodo de pago: '. $pruebamet),'T',0,'C');
	$pdf->Cell(43,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(18,7,utf8_decode("SUBTOTAL"),'T',0,'C');
	$pdf->Cell(20,7,utf8_decode(redondear_dos_decimal($pruebasubt*$pruebaconver)." ". $txtmoneda),'T',0,'C');

	$pdf->Ln(7);
	$isv=redondear_dos_decimal($subtotal*0.18);
	$pdf->Cell(117,7,utf8_decode('Cobro realizado a la tarjeta: '.$pruebatarje),'',0,'C');
	$pdf->Cell(43,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(18,7,utf8_decode("ISV (18%)"),'',0,'C');
	$pdf->Cell(20,7,utf8_decode(redondear_dos_decimal($pruebatotimp*$pruebaconver)." ". $txtmoneda),'',0,'C');

	$pdf->Ln(7);
	$total=$subtotal+$isv;
	$pdf->Cell(117,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(22,7,utf8_decode(''),'',0,'C');
	
	}else if($pruebamet=="Mixto"){
	
		$pdf->Cell(117,7,utf8_decode('Metodo de pago: '. $pruebamet),'T',0,'C');
		$pdf->Cell(43,7,utf8_decode(''),'T',0,'C');
		$pdf->Cell(18,7,utf8_decode("SUBTOTAL"),'T',0,'C');
		$pdf->Cell(20,7,utf8_decode(redondear_dos_decimal($pruebasubt*$pruebaconver)." ". $txtmoneda),'T',0,'C');
	
		$pdf->Ln(7);
	$isv=redondear_dos_decimal($subtotal*0.18);
		$pdf->Cell(117,7,utf8_decode('Efectivo recibido: '.$pruebaefec." ".$txtmoneda),'',0,'C');
		$pdf->Cell(43,7,utf8_decode(''),'',0,'C');
		$pdf->Cell(18,7,utf8_decode("ISV (18%)"),'',0,'C');
		$pdf->Cell(20,7,utf8_decode(redondear_dos_decimal($pruebatotimp*$pruebaconver)." ". $txtmoneda),'',0,'C');
	
		$pdf->Ln(7);
		$total=$subtotal+$isv;
		$pdf->Cell(117,7,utf8_decode('Cobro de: '.redondear_dos_decimal($pruebatot*$pruebaconver)-$pruebaefec." ".$txtmoneda.' realizado a la tarjeta: '.$pruebatarje),'',0,'C');
		$pdf->Cell(22,7,utf8_decode(''),'',0,'C');
		
		}

	$pdf->Cell(32,7,utf8_decode("TOTAL A PAGAR"),'T',0,'C');
	$pdf->Cell(34,7,utf8_decode(redondear_dos_decimal($pruebatot*$pruebaconver)." ". $txtmoneda),'T',0,'C');

	$pdf->Ln(7);
	
if(floatval($pruebaefec)-redondear_dos_decimal($pruebatot*$pruebaconver)>=0){
	$pdf->Cell(100,7,utf8_decode('Cambio: '.$pruebaefec-redondear_dos_decimal($pruebatot*$pruebaconver). " ". $txtmoneda),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode(""),'',0,'C');
	$pdf->Cell(34,7,utf8_decode(""),'',0,'C');
}else{
	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode(""),'',0,'C');
	$pdf->Cell(34,7,utf8_decode(""),'',0,'C');	
}
	$pdf->Ln(7);

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode(""),'',0,'C');
	$pdf->Cell(34,7,utf8_decode(""),'',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode(""),'',0,'C');
	$pdf->Cell(34,7,utf8_decode(""),'',0,'C');

	$pdf->Ln(12);

	$pdf->SetFont('Arial','',9);

	if($pruebaefec<$pruebatot && $pruebamet=="Efectivo"){
		$pdf->SetTextColor(39,39,51);
		$pdf->MultiCell(0,9,utf8_decode("*** ESTA FACTURA NO ES VÁLIDA, DEBE PAGAR LA TOTALIDAD DEL MONTO ***"),0,'C',false);
			
		}else{
		$pdf->SetTextColor(39,39,51);
		$pdf->MultiCell(0,9,utf8_decode("*** Para poder realizar un reclamo o devolución debe de presentar esta factura ***"),0,'C',false);
		}
	$pdf->Ln(9);

	# Codigo de barras #
	$pdf->SetFillColor(39,39,51);
	$pdf->SetDrawColor(23,83,201);
	$pdf->Code128(72,$pdf->GetY(),"COD000001V0001",70,20);
	$pdf->SetXY(12,$pdf->GetY()+21);
	$pdf->SetFont('Arial','',12);
	$pdf->MultiCell(0,5,utf8_decode($pruebacod),0,'C',false);

	# Nombre del archivo PDF #
	$pdf->Output("I","Factura_Nro_1.pdf",true);