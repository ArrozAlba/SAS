// JavaScript Document
	function valida() {
	if(document.form_profesion.nombre.value==''){
		document.form_profesion.nombre.focus();
		jAlert('El campo "Nombre profesi&oacute;n" no puede estar vacio!','Dialogo de Alerta');
		return false;
	}
	if(document.form_profesion.nombre.value.length<3) {
		jAlert('El campo "Nombre profesi&oacute;n" no puede ser menor a 3 caracteres!','Dialogo de Alerta');
		document.form_profesion.nombre.focus();
		return false;
	}
	var checkOK="ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ"+"abcdefghijklmnñopqrstuvwxyzáéíóú "; 
	var checkStr=document.form_profesion.nombre.value;
	var allValid=true; 
	for(var i =0;i<checkStr.length;i++){
		ch=checkStr.charAt(i); 
	for(var j=0;j<checkOK.length;j++)
	  if(ch==checkOK.charAt(j))
		break;
		if(j==checkOK.length){ 
	  	allValid=false; 
	  	break; 
		}
  	}
  	if (!allValid){ 
		jAlert('El campo "Nombre profesi&oacute;n" admite solo letras.','Dialogo de Alerta');
		document.form_profesion.nombre.value='';  
		document.form_profesion.nombre.focus(); 
		return false; 
  	}		
return true;
}	
