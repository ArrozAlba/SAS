// JavaScript Document
	 function valida() {
 //Valida Todo el campo segundo nombre del ciudad
          //Valida que el Ciudad no este vacia
		if(document.form_ciudad.nombre.value == '') {
		document.form_ciudad.nombre.focus();
		jAlert('El campo "Nombre Ciudad" no puede estar vacio!','Dialogo de Alerta');
		return false;
		}
		  if(document.form_ciudad.nombre.value.length <3 ) {		
		  jAlert('El campo "Nombre Ciudad" no puede ser menor a 3 caracteres!','Dialogo de Alerta');
		  document.form_ciudad.nombre.focus();
		  return false;
	      }
		  //valida que se ingresen solo letras al campo nombre
		  var checkOK = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ" + "abcdefghijklmnñopqrstuvwxyzáéíóú ";
		  var checkStr = document.form_ciudad.nombre.value;
		  var allValid = true; 
		  for (i = 0; i < checkStr.length; i++) {
			ch = checkStr.charAt(i); 
			for (j = 0; j < checkOK.length; j++)
			  if (ch == checkOK.charAt(j))
				break;
			if (j == checkOK.length) { 
			  allValid = false; 
			  break; 
			}
		  }
		  if (!allValid) { 
			jAlert('El campo "Nombre Ciudad" admite solo letras.','Dialogo de Alerta');
			document.form_ciudad.nombre.value='';  
			document.form_ciudad.nombre.focus(); 
			return false; 
		  }
		  if(document.form_ciudad.estado.value=="0"){//6
		jAlert('Debe seleccionar el Estado!');
		document.form_ciudad.estado.focus();
		return false;
	}   

	return true;
}
