<?php
// Llamado a la clase a usarse.
	include_once("../Clases/clase_exclusion_PDF.php");
	include_once("../Clases/clase_titular.php");
	include_once("../Clases/clase_departamento.php");
	include_once("../Clases/clase_cargo.php");
	include_once("../Clases/clase_detalle_profesion.php");
	include_once("../Clases/clase_beneficiario.php");
	include_once("../Clases/clase_ciudad.php");
	include_once("../Clases/clase_upsa.php");
	$titular= new titular();	
	$beneficiario= new beneficiario();	
	$ciudad= new ciudad();
	$upsa= new upsa();
	$departamento= new departamento();
	$detalle_pro= new detalle_pro();
	$cargo= new cargo();
	$id2=$_GET["id2"];
	$id=$_GET["id"];

	$titular->setidTitular($id2);
	$resultado=$titular->buscar_id();
	if($resultado!='-1'){
	$pdf=new PDF('P','mm','A4');
	$d= "DÍA";
	$dia = utf8_decode($d);
	$a= "AÑO";	
	$año = utf8_decode($a);
	$pdf->Open();
	$pdf->AliasNbPages();
	$pdf->AddPage();
  	$pdf->SetFont('Times','B',10);
	$pdf->SetFillColor(255);
    $pdf->SetTextColor(000);
	$pdf->SetMargins(6,6,6,6);
	$Fecha=date("d/m/Y");
	if (strlen($Fecha)==10)
	{
  	 	$elDia=substr($Fecha,0,2);
  	 	$elMes=substr($Fecha,3,2);
  	 	$elYear=substr($Fecha,6,4);
	}
	$pdf->Cell(150);
	$pdf->Cell(45,6,'FECHA',1,1,'C',true);
	$pdf->Cell(154);
	$pdf->Cell(15,6,$dia,1,0,'C',true);
	$pdf->Cell(15,6,'MES',1,0,'C',true);
	$pdf->Cell(15,6,$año,1,1,'C',true);
	   	for($i=0;$i<count($resultado);$i++){
			
		if($resultado[$i][2]=='V'){
			$nacionalidad ='Venezolano';
		}else{
			$nacionalidad ='Extranjero';
		}

		$cedula 		=$resultado[$i][3];
		$nombre1 		=utf8_decode($resultado[$i][4]);
		$nombre2 		=utf8_decode($resultado[$i][5]);
		$apellido1 		=utf8_decode($resultado[$i][6]);
		$apellido2 		=utf8_decode($resultado[$i][7]);
		if($resultado[$i][8]=='M'){
			$sexo ='Masculino';
		}else{
			$sexo ='Femenino';
		}
		$fecha_nac 		=$resultado[$i][9];
		if($resultado[$i][10]=='S'){
			$estado_civ ='Soltero';
		}else{
			if($resultado[$i][10]=='C'){
				$estado_civ ='Casado';
			}else{
				if($resultado[$i][10]=='D'){
					$estado_civ ='Divorciado';
				}else{
					if($resultado[$i][10]=='V'){
						$estado_civ ='Viudo';
					}
					
				}
			}			
		}
		$celular 		=$resultado[$i][11];
		$telefono 		=$resultado[$i][12];
		$correo_elect 	=$resultado[$i][13];
		$fecha_ingr 	=$resultado[$i][14];
		$direccion_hab 	=$resultado[$i][15];
		$id_cargo 		=$resultado[$i][16];
		$id_ciudad 		=$resultado[$i][17];
		$id_departamento=$resultado[$i][18];
		$id_upsa 		=$resultado[$i][19];
		$CiudadNac		=$resultado[$i][22];
		$correo_corp	=$resultado[$i][23];
		}
	$ciudad->setidCiudad($CiudadNac);
	$consulta=$ciudad->buscar_c_e_p();
	for($i=0;$i<count($consulta);$i++){
		$nombCiudad= $consulta[$i][1];
		$nombEstado= $consulta[$i][2];
		$nombPais= $consulta[$i][3];

	}
	$pdf->Cell(45,6,'DATOS DEL TITULAR',1,0,'C',true);
	$pdf->SetFont('Times','',10);
	$pdf->Cell(109,6,'','L',0,'C',true);
	$pdf->Cell(15,6,$elDia,1,0,'C',true);
	$pdf->Cell(15,6,$elMes,1,0,'C',true);
	$pdf->Cell(15,6,$elYear,1,1,'C',true);
	$pdf->SetFont('Times','B',10);
	$pdf->Cell(90,6,'Apellidos y Nombres',1,0,'C',true);
	$pdf->Cell(32,6,'Nacionanlidad',1,0,'C',true);
	$pdf->Cell(47,6,'Cedula de Identidad',1,0,'C',true);
	$pdf->Cell(30,6,'Sexo',1,1,'C',true);	
	$pdf->SetFont('Times','',11);
	$pdf->Cell(90,6,$nombre1.' '.$nombre2.' '.$apellido1.' '.$apellido2,1,0,'C',true);
	$pdf->Cell(32,6,$nacionalidad,1,0,'C',true);
	$pdf->Cell(47,6,$cedula,1,0,'C',true);
	$pdf->Cell(30,6,$sexo,1,1,'C',true);	
	$pdf->Ln(3);
	$pdf->SetFont('Times','B',10);
	$pdf->Cell(40,6,'FECHA DE NAC.',1,0,'C',true);
	$pdf->Cell(20,6,'EDAD',1,0,'C',true);
	$pdf->Cell(30,6,'CIUDAD',1,0,'C',true);
	$pdf->Cell(30,6,'ESTADO',1,0,'C',true);
	$pdf->Cell(30,6,'EDO. CIVIL',1,0,'C',true);
	$pdf->Cell(49,6,'TELEFONOS',1,1,'C',true);	
	$pdf->SetFont('Times','',10);
	if (strlen($fecha_nac)==10)
	{
  	 	$elDia=substr($fecha_nac,8,2);
		$elMes=substr($fecha_nac,5,2);
		$elYear=substr($fecha_nac,0,4);
		$FechaNac=$elDia."-".$elMes."-".$elYear;		
	}
	if (strlen($fecha_ingr)==10)
	{
  	 	$elDia=substr($fecha_ingr,8,2);
		$elMes=substr($fecha_ingr,5,2);
		$elYear=substr($fecha_ingr,0,4);
		$fecha_Ingr=$elDia."-".$elMes."-".$elYear;		
	}
	$titular->setFec_nac($fecha_nac);
	$edad=$titular->edad();	
	$pdf->Cell(40,6,$FechaNac,1,0,'C',true);
	$pdf->Cell(20,6,$edad,1,0,'C',true);
	$pdf->Cell(30,6,$nombCiudad,1,0,'C',true);
	$pdf->Cell(30,6,$nombEstado,1,0,'C',true);
	$pdf->Cell(30,6,$estado_civ,1,0,'C',true);
	$pdf->Cell(49,6,$telefono.' / '.$celular,1,1,'C',true);
	$pdf->Ln(5);
	$pdf->SetFont('Times','B',10);
	$h= "DIRECCIÓN DE HABITACIÓN";
	$h = utf8_decode($h);
	$pdf->Cell(199,6,$h,1,1,'C',true);	
	$pdf->SetFont('Times','',10);
	$pdf->Cell(199,6,$direccion_hab,1,1,'L',true);
	$ciudad->setidCiudad($id_ciudad);
	$consulta=$ciudad->buscar_c_e_p();
	for($i=0;$i<count($consulta);$i++){
		$nombCiudad= $consulta[$i][1];
		$nombEstado= $consulta[$i][2];
		$nombPais= $consulta[$i][3];

	}
	$pdf->Cell(40,6,'Pais:   '.$nombPais,1,0,'L',true);	
	$pdf->Cell(45,6,'Estado: '.$nombEstado,1,0,'L',true);
	$pdf->Cell(50,6,'Ciudad: '.$nombCiudad,1,0,'L',true);
	$pdf->Cell(64,6,'E-mail: '.$correo_elect,1,1,'L',true);
	$pdf->Ln(5);
	$pdf->SetFont('Times','B',10);
	$h= "DIRECCIÓN DE TRABAJO";
	$h = utf8_decode($h);
	$upsa->setidUpsa($id_upsa);
	$consulta=$upsa->Buscar_upsa();
	for($i=0;$i<count($consulta);$i++){
		$nombre			=$consulta[$i][1];
		$direccion		=$consulta[$i][2];
		$ciudad_upsa	=$consulta[$i][3];
		$estado_upsa	=$consulta[$i][4];
		$pais_upsa		=$consulta[$i][5];
	}
	$departamento->setidDepartamento($id_departamento);
	$consulta=$departamento->buscar();
	for($i=0;$i<count($consulta);$i++){
		$departamento			=$consulta[$i][2];
	}
	$cargo->setidCargo($id_cargo);
	$consulta=$cargo->buscar_cargo();
	for($i=0;$i<count($consulta);$i++){
		$cargo			=$consulta[$i][2];
	}
	$detalle_pro->setidTitular($id2);
	$consulta=$detalle_pro->buscar_profesion_pdf();
	for($i=0;$i<count($consulta);$i++){
		$profesion	=utf8_decode($consulta[$i][2]);
	}
	$p= "Profesión: ";
	$p = utf8_decode($p);
	$pdf->Cell(199,6,$h,1,1,'C',true);	
	$pdf->SetFont('Times','',10);
	$pdf->Cell(199,6,$direccion,1,1,'L',true);
	$pdf->Cell(40,6,'Pais: '.$pais_upsa,1,0,'L',true);	
	$pdf->Cell(45,6,'Estado: '.$estado_upsa,1,0,'L',true);
	$pdf->Cell(50,6,'Ciudad: '.$ciudad_upsa,1,0,'L',true);
	$pdf->Cell(64,6,'E-mail: '.$correo_corp,1,1,'L',true);
	$pdf->Cell(135,6,'Departamento / UPSA: '.utf8_decode($departamento).' / '.$nombre,1,0,'L',true);
	$pdf->Cell(64,6,'Fecha de Ingreso: '.$fecha_Ingr,1,1,'L',true);
	$pdf->Cell(135,6,$p.$profesion,1,0,'L',true);
	$pdf->Cell(64,6,'Cargo: '.$cargo,1,1,'L',true);
	$pdf->Ln(5);
	$e="EXCLUSIÓN DE BENEFICIARIO";
	$e = utf8_decode($e);
	$pdf->Cell(199,6,$e,1,1,'C',true);	
	$pdf->SetFont('Times','B',10);	
	$pdf->Cell(199,6,'BENEFICIARIOS',1,1,'C',true);	
	$pdf->Cell(80,6,'Apellidos y Nombres',1,0,'C',true);
	$pdf->Cell(25,6,'C.I.',1,0,'C',true);
	$pdf->Cell(28,6,'FECHA NAC.',1,0,'C',true);
	$pdf->Cell(18,6,'EDAD',1,0,'C',true);
	$pdf->Cell(20,6,'SEXO',1,0,'C',true);
	$pdf->Cell(28,6,'PARENTESCO',1,1,'C',true);
	$pdf->SetFont('Times','',10);
	$beneficiario->setidBeneficiario($id);
	$cons=$beneficiario->excluir_Beneficiario();
	for ($i=0;$i<count($cons);$i++){		
		if($cons[$i][9]=='M'){
			$sex='Masculino';
		}if($cons[$i][9]=='F'){
			$sex='Femenino';
		}
		if($cons[$i][4]!='0'){
			$ced=$cons[$i][3].'-'.$cons[$i][4];
		}else{
			$ced='N/A';
		}
	$titular->setFec_nac($cons[$i][10]);
	$edad=$titular->edad();	
$pdf->Cell(80,6,utf8_decode($cons[$i][5]).' '.utf8_decode($cons[$i][6]).' '.utf8_decode($cons[$i][7]).' '.utf8_decode($cons[$i][8]),1,0,'C',true);
		$pdf->Cell(25,6,$ced,1,0,'C',true);
		$pdf->Cell(28,6,$cons[$i][10],1,0,'C',true);
		$pdf->Cell(18,6,$edad,1,0,'C',true);
		$pdf->Cell(20,6,$sex,1,0,'C',true);
		$pdf->Cell(28,6,$cons[$i][13],1,1,'C',true);
	}
	$pdf->Ln(5);
	$pdf->SetFont('Times','',10);
	$cadena= "por medio de la siguiente declaro ante Autogestión";
	$cadena2=" de Salud de la Empresa Mixta Arroz del ALBA S.A. La exclusión del beneficiario arriba señalado y anexo recaudos";
	$cadena = utf8_decode($cadena);
	$cadena2 = utf8_decode($cadena2);
	$pdf->Cell(199,5,'Yo: '.$nombre1.' '.$nombre2.' '.$apellido1.' '.$apellido2.' portador de la C.I.:'.$cedula.' '.$cadena,0,1,'C');
	$pdf->Cell(199,5,$cadena2,0,1,'C');
	$pdf->SetFont('Times','B',10);
	$pdf->Ln(5);
	$pdf->Cell(199,6,'FIRMA: ______________________________',0,1,'C',true);
	$pdf->Ln(2);
	$pdf->Cell(65,6,'','R',0,'C',true);
	$pdf->Cell(69,6,'HUELLA: ','LRT',0,'l',true);
	$pdf->Cell(60,6,'','L',1,'C',true);
	$pdf->Cell(65,6,'','R',0,'C',true);
	$pdf->Cell(69,6,'','RL',0,'l',true);
	$pdf->Cell(60,6,'','L',1,'C',true);
	$pdf->Cell(65,6,'','R',0,'C',true);
	$pdf->Cell(69,6,'','RLB',0,'l',true);
	$pdf->Cell(60,6,'','L',1,'C',true);

// Se envia el PDF.
		$pdf->Output();
	}else{
		echo 'Ha ocurrido un error generando el PDF.';
	}
// Fin del Controlador que el General PDF de la consulta de articulos
		
		
?>
