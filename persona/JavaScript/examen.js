// JavaScript Document
function valida(){
	if(document.form_examen.nombre.value==''){
		document.form_examen.nombre.focus();
		jAlert('El campo "Nombre  Ex&aacute;men" no puede estar vacio!','Dialogo de Alerta');
		return false;
	}
	if(document.form_examen.nombre.value.length<3){		
		  jAlert('El campo "Nombre  Ex&aacute;men" no puede ser menor a 3 caracteres!','Dialogo de Alerta');
		  document.form_examen.nombre.focus();
		  return false;
	}
	if(document.form_examen.tipo.value=="0"){
		jAlert('Debe seleccionar el Tipo de Ex&aacute;men!','Dialogo de Alerta');
		document.form_examen.tipo.focus();
		return false;
	}   
	return true;
}
