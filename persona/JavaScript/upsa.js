// JavaScript Document
	 function valida() {
		if(document.form_upsa.nombre.value == '') {
		document.form_upsa.nombre.focus();
		jAlert('El campo \"Nombre\" no puede estar vacio!','Dialogo de Alerta');
		return false;
		}
		  if(document.form_upsa.nombre.value.length <3 ) {		
		  jAlert('El campo \"Nombre" no puede ser menor a 3 caracteres!','Dialogo de Alerta');
		  document.form_upsa.nombre.focus();
		  return false;
	      }
		  var checkOK = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ" + "abcdefghijklmnñopqrstuvwxyzáéíóú ";
		  var checkStr = document.form_upsa.nombre.value;
		  var allValid=true; 
		  for(var i=0;i<checkStr.length;i++){
			ch=checkStr.charAt(i); 
			for (var j=0;j<checkOK.length;j++)
			  	if(ch==checkOK.charAt(j))
				break;
				if(j==checkOK.length) { 
			  		allValid = false; 
			  		break; 
				}
		  }
		  if (!allValid) { 
			jAlert('El campo \"Nombre\" admite solo letras.','Dialogo de Alerta');
			document.form_upsa.nombre.value='';  
			document.form_upsa.nombre.focus(); 
			return false; 
		  }
		  //Valida Todo el campo  Dirección de la UPSA
          //Valida que la Dirección no este vacia
		if(document.form_upsa.direccion.value == '') {
		document.form_upsa.direccion.focus();
		jAlert('El campo \"Dirección\" no puede estar vacio!','Dialogo de Alerta');
		return false;
		}
		  if(document.form_upsa.direccion.value.length <3 ) {		
		  jAlert('El campo \"Dirección" no puede ser menor a 3 caracteres!','Dialogo de Alerta');
		  document.form_upsa.direccion.focus();
		  return false;
	      }
		  if(document.form_upsa.estado.value=="0"){
		jAlert('Debe seleccionar el Estado!','Dialogo de Alerta');
		document.form_upsa.estado.focus();
		return false;
	}  
	  if(document.form_upsa.ciudad.value=="0"){
		jAlert('Debe seleccionar una Ciudad!','Dialogo de Alerta');
		document.form_upsa.ciudad.focus();
		return false;
	}    
	return true;
}	