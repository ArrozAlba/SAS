// JavaScript Document
	 function valida() {
 //Valida Todo el campo segundo nombre del Discapacidad
          //Valida que el Discapacidad no este vacia
		if(document.form_discapacidad.nombre.value == '') {
		document.form_discapacidad.nombre.focus();
		jAlert('El campo "Nombre Discapacidad" no puede estar vacio!','Dialogo de Alerta');
		return false;
		}
		  if(document.form_discapacidad.nombre.value.length <3 ) {		
		  jAlert('El campo "Nombre Discapacidad" no puede ser menor a 3 caracteres!','Dialogo de Alerta');
		  document.form_discapacidad.nombre.focus();
		  return false;
	      }
		  //valida que se ingresen solo letras al campo nombre
		  var checkOK = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ" + "abcdefghijklmnñopqrstuvwxyzáéíóú ";
		  var checkStr = document.form_discapacidad.nombre.value;
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
			jAlert('El campo "Nombre Discapacidad" admite solo letras.','Dialogo de Alerta');
			document.form_discapacidad.nombre.value='';  
			document.form_discapacidad.nombre.focus(); 
			return false; 
		  } 
	return true;
}	
