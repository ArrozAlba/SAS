<?php
// Llamado a la clase a usarse
include_once("../Clases/clase_upsa.php");
$ope = $_POST['ope'];
switch($ope){
  case "I":	{
	incluir();
	break;
	}
  case "B":{
	buscar();
	break;
	}
}
//       Funcion para Registrar
function incluir(){
	$upsa = new upsa();
	$upsa->setNom($_POST["nombre"]);
	$upsa->setDireccion($_POST["direccion"]);
	$upsa->setidCiudad($_POST["ciudad"]);
	$iUpsa=$upsa->iUpsa();
	if($iUpsa<0)
	{
	echo "Los datos se guardaron con Exito!!!";
	exit();
	}else{
	echo "Error al incluir upsa";
	}
	
}
?>