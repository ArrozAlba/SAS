<?php
// Llamado a la clase a usarse
include_once("../Clases/clase_beneficiario.php");
include_once("../Clases/clase_detalle_discapacidad.php");
include_once("../Clases/clase_detalle_recaudos.php");
$ope = $_POST['ope'];
switch($ope){
  case "I":	{
	incluir();
	break;
	}
  case "Buscar":{
	buscar();
	break;
	}
  case "M":	{	
  	modificar();
	break;
	}
  case "E":{
	eliminar();
	break;
	}
}
//       Funcion para Registrar
function incluir(){
// Se crea un Objeto  de la clase 
	$beneficiario = new beneficiario();
	$detalle_disc = new detalle_disc();
	$detalle_rec = new detalle_rec();
//declaracion de unas variables a usarse
	$idbeneficiario='0';
	$idbeneficiario_disc='0';
	$idbeneficiario_rec='0';
//	$var_control= false; //variable de control para seguir o terminar la transaccion
	// Se envian los datos por los metodos set
		$beneficiario->setidTitular($_POST["id_titular"]);
		$beneficiario->setNac($_POST["nacionalidad"]);	
		$beneficiario->setCed($_POST["cedula"]);
		$beneficiario->setNom1($_POST["nombre1"]);
		$beneficiario->setNom2($_POST["nombre2"]);
		$beneficiario->setApe1($_POST["apellido1"]);
		$beneficiario->setApe2($_POST["apellido2"]);
		$beneficiario->setSex($_POST["sexo"]);
		$beneficiario->setFec_nac($_POST["fecha_nac"]);	
		$beneficiario->setEsta_civ($_POST["estado_civ"]);
		$beneficiario->setCel($_POST["celular"]);
		$beneficiario->setTlf($_POST["telefono"]);
		$beneficiario->setParentesco($_POST["parentesco"]);
		$beneficiario->setParticipacion($_POST["participacion"]);
		// Se verifica que no exista para poder incluir
		//$Validabeneficiario=$beneficiario->validar_beneficiario();
				// Se inicia la Transacción
				$beneficiario->IniciaTransaccion();
	//	if ($Validabeneficiario=='-1'){
		// Si $vadila_beneficiario no encuentra nada (-1) 
		// Busca el ultimo registro de la entrada e incrementa el id
				$result = $beneficiario->buscaUltimoID();	
					if ($result){
					$result = $beneficiario->sig_tupla($result);		
					$idbeneficiario = $result["id_beneficiario"] + 1;
					}
					$beneficiario->setidBeneficiario($idbeneficiario);
		//Registramos El beneficiario			
					$iBeneficiario= $beneficiario->iBeneficiario();	
					if($iBeneficiario!='-1'){
							$var_control=true;
							echo "Error 1";
						}						
			$arreglo_disc = $_POST["discapacidad"]; //Arreglo de discapacidad
			$cont_disc='0';
			while($cont_disc<count($arreglo_disc)){	
				$disc=$arreglo_disc[$cont_disc];
		//Consultamos el ultimo $id_beneficiario_discapacidad y traemos el ultimo	
		// Busca el ultimo registro de la entrada e incrementa el id	
					$result = $detalle_disc->bUltimoID_Disc();
					if ($result){
						$result = $detalle_disc->sig_tupla($result);		
						$idbeneficiario_disc = $result["id_beneficiario_discapacidad"] + 1;
					}	
					$detalle_disc->setId_beneficiario_disc($idbeneficiario_disc);	
					$detalle_disc->setidBeneficiario($idbeneficiario);	
					$detalle_disc->setidDiscapacidad($disc);
		//Registramos el Detalle de la Discapacidad
				$ibeneficiario_Discapacidad=$detalle_disc->iBeneficiario_Discapacidad();
					if($ibeneficiario_Discapacidad!='-1'){
					 $var_control=true;	 
					 echo "Error 3";
					 }
			 $cont_disc++;	 			 
			}
			 $arreglo_recaudos = $_POST["recaudos"]; //Arreglo de reaudos
			 $cont_rec='0';
			 while($cont_rec<count($arreglo_recaudos)){
				 $rec=	$arreglo_recaudos[$cont_rec];
				 $result = $detalle_rec->bUltimoID_Rec();
				 if ($result){
						$result = $detalle_rec->sig_tupla($result);		
						$idbeneficiario_rec = $result["id_beneficiario_recaudo"] + 1;
					}	
					$detalle_rec->setId_beneficiario_rec($idbeneficiario_rec);
					$detalle_rec->setidBeneficiario($idbeneficiario);
					$detalle_rec->setidRecaudos($rec);
					$detalle_rec->setTipo('I');
				//Registramos el Detalle de los recaudos
				$ibeneficiario_Recaudos=$detalle_rec->iBeneficiario_Recaudos();
					if($ibeneficiario_Recaudos!='-1'){
					 $var_control=true;	 
					 echo "Error 4";
					 }
			 $cont_rec++;	 	
			 }
	/*este else es el del vaildar no sera activado hasta pensar el metodo de validacion de beneficiario
	}else{
			echo "No";//usuario ya registrado			
			$var_control=true;
			exit();
		}*/
		
		if ($var_control){	
			$beneficiario->RompeTransaccion();		
			echo "No se pudo llevar a cabo el registro debido a un error interno de la Base de Datos.";
			exit();
		}else{
			$beneficiario->FinTransaccion();	
			echo "Los datos se guardaron con Exito!";
			exit();	
		}

}
//       Funcion para Modificar
function modificar(){
// Se crea un Objeto  de la clase 
	$beneficiario = new beneficiario();
	$beneficiario_disc = new detalle_disc();
	$beneficiario_rec = new detalle_rec();
	$var_control= false; //variable de control para seguir o terminar la transaccion
	// Se envian los datos por los metodos set		
		$beneficiario->setidBeneficiario($_POST['id_beneficiario']);
		$beneficiario->setNac($_POST["nacionalidad"]);
		if( $_POST["cedula"]=='N/A' || $_POST["cedula"]=='' ){
			$ced=0;
		}else{
			$ced=$_POST["cedula"];	
		}
		$beneficiario->setCed($ced);
		$beneficiario->setNom1($_POST["nombre1"]);
		$beneficiario->setNom2($_POST["nombre2"]);
		$beneficiario->setApe1($_POST["apellido1"]);
		$beneficiario->setApe2($_POST["apellido2"]);
		$beneficiario->setSex($_POST["sexo"]);
		$beneficiario->setFec_nac($_POST["fecha_nac"]);	
		$beneficiario->setEsta_civ($_POST["estado_civ"]);
		$beneficiario->setCel($_POST["celular"]);
		$beneficiario->setTlf($_POST["telefono"]);
		$beneficiario->setParentesco($_POST["parentesco"]);
		$beneficiario->setParticipacion($_POST["participacion"]);		
		// Se inicia la Transacción
		$beneficiario->IniciaTransaccion();	
		$mBeneficiario=$beneficiario->mBeneficiario();
		if($mBeneficiario!='-1'){				
			$var_control=true;
			echo "Error 1";
			exit();
		}		
//Para trabajo mas facil borramos el detalle de las discapacidades e insertamos nuevamente.
		$beneficiario_disc->setidBeneficiario($_POST['id_beneficiario']);
		$eBeneficiario_Discapacidad=$beneficiario_disc->eBeneficiario_Discapacidad();
		if($eBeneficiario_Discapacidad!='-1'){				
			$var_control=true;
			echo "Error 2";
			exit();
		}		
// Detalle beneficiario - Discapacidad
		$arreglo_disc = $_POST["discapacidad"]; //Arreglo de discapacidad
		$cont_disc='0';
		while($cont_disc<count($arreglo_disc)){		
		//Consultamos el ultimo $id_beneficiario_discapacidad y traemos el ultimo	
		// Busca el ultimo registro de la entrada e incrementa el id	
			$result = $beneficiario_disc->bUltimoID_Disc();
				if ($result){
					$result = $beneficiario_disc->sig_tupla($result);	
					$idBeneficiario_disc = $result["id_beneficiario_discapacidad"] + 1;
				}	
				$beneficiario_disc->setId_beneficiario_disc($idBeneficiario_disc);	
				$beneficiario_disc->setidDiscapacidad($arreglo_disc[$cont_disc]);
		//Registramos el Detalle de la Discapacidad
				$iBeneficiario_Discapacidad=$beneficiario_disc->iBeneficiario_Discapacidad();
					if($iBeneficiario_Discapacidad!='-1'){
					 $var_control=true;	 
			 		echo "Error 3";
					}
		$cont_disc++;	 
		}
//Para trabajo mas facil borramos el detalle de los recaudos e insertamos nuevamente.
				$beneficiario_rec->setidBeneficiario($_POST['id_beneficiario']);
				$eBeneficiario_Recaudos=$beneficiario_rec->eBeneficiario_Recaudos();
					if($eBeneficiario_Recaudos!='-1'){				
					$var_control=true;
					echo "Error 4!";
					exit();
				}
								
// Detalle beneficiario - Recaudos
		$arreglo_recaudos = $_POST["recaudos"]; //Arreglo de discapacidad
		$cont_rec='0';
		while($cont_rec<count($arreglo_recaudos)){
			// Busca el ultimo registro de la entrada e incrementa el id
			$result = $beneficiario_rec->bUltimoID_Rec();
			if ($result){
				$result = $beneficiario_rec->sig_tupla($result);		
				$idbeneficiario_rec = $result["id_beneficiario_recaudo"] + 1;
			}	
			$beneficiario_rec->setId_beneficiario_rec($idbeneficiario_rec);
			$beneficiario_rec->setidRecaudos($arreglo_recaudos[$cont_rec]);
			//Registramos el Detalle de los recaudos
			$iBeneficiario_Recaudos=$beneficiario_rec->iBeneficiario_Recaudos();
			if($iBeneficiario_Recaudos!='-1'){
				$var_control=true;	 
				echo "Error 5";
			}
			$cont_rec++;	 	
		}
		if ($var_control){	
			$beneficiario->RompeTransaccion();		
			echo "No se pudo llevar a cabo el registro debido a un error interno de la Base de Datos.";
			exit();
		}else{
			$beneficiario->FinTransaccion();	
			echo "Los Datos fueron actualizados con exito!!!";
			exit();	
		}

}		
// se envian los datos del formulario por los metodos set de cada uno
function eliminar(){
	$beneficiario = new beneficiario();
	$detalle_rec = new detalle_rec();
	$var_control= false; //variable de control para seguir o terminar la transaccion
// Detalle beneficiario - Recaudos	
		$detalle_rec->setidBeneficiario($_POST["idBeneficiario"]);
		$beneficiario->setidBeneficiario($_POST["idBeneficiario"]);
		$arreglo_recaudos = $_POST["recaudos"]; //Arreglo de discapacidad
		$cont_rec='0';
		while($cont_rec<count($arreglo_recaudos)){
			// Busca el ultimo registro de la entrada e incrementa el id
			$result = $detalle_rec->bUltimoID_Rec();
			if ($result){
				$result = $detalle_rec->sig_tupla($result);		
				$idbeneficiario_rec = $result["id_beneficiario_recaudo"] + 1;
			}	
			$detalle_rec->setId_beneficiario_rec($idbeneficiario_rec);
			$detalle_rec->setidRecaudos($arreglo_recaudos[$cont_rec]);
			$detalle_rec->setTipo('E');			
			//Registramos el Detalle de los recaudos
			$iBeneficiario_Recaudos=$detalle_rec->iBeneficiario_Recaudos();
			if($iBeneficiario_Recaudos!='-1'){
				$var_control=true;	 
				echo "Error 1";
			}
			$cont_rec++;	 	
		}
		$eBeneficiario=$beneficiario->eBeneficiario();
			if($eBeneficiario!='-1'){
				$var_control=true;	 
				echo "Error 1";
			}
		if ($var_control){	
			$beneficiario->RompeTransaccion();		
			echo "No se pudo llevar a cabo el registro debido a un error interno de la Base de Datos.";
			exit();
		}else{
			$beneficiario->FinTransaccion();	
			echo "Los Datos fueron actualizados con exito!!!";
			exit();	
		}
}	

?>