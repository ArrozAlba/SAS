// JavaScript Document
$(document).ready(function(){
	fn_listar_recaudos();
	$("#grilla tbody tr").mouseover(function(){
		$(this).addClass("over");
	}).mouseout(function(){
		$(this).removeClass("over");
	});
});
	function fn_agregar(){		
		var str = $("#form_recaudos").serialize();
		$.ajax({
			url: '../../Controladores/controlador_recaudos.php',
			data: str,
			type: 'post',
			success: function(data){
				if(data== "No"){				
					jAlert('Este Recaudo ya ha Sido incluido al Sistema.','Mensaje de Alerta');
				}else{
					jAlert(data);
					fn_listar_recaudos();
				}				
			}
		});
	};
function abreVentana()
{ 
	var miPopup 
    $(miPopup)= window.open
	url:'../Php/beneficiario/exclusion_beneficiario.php', 
    $(miPopup).focus();
} 
	

function fn_paginar(var_div, url){
	var div = $("#" + var_div);
	$(div).load(url);
	/*
	div.fadeOut("fast", function(){
		$(div).load(url, function(){
			$(div).fadeIn("fast");
		});
	});
	*/
}

function fn_listar_recaudos(){
	var str = $("#form_recaudos").serialize();
	$.ajax({
		url: '../../Php/recaudos/listar_recaudos.php',
		type: 'get',
		data: str,
		success: function(data){		
			$("#div_listar_recaudos").html(data);				
		}
	});

}

function fn_eliminar_recaudos(id_recaudo){
	jConfirm('Desea eliminar a este Recaudo?', 'Mensaje Confirmación', function(r) {
		if(r==true){
		$.ajax({
			url: '../../Php/recaudos/eliminar_recaudos.php',
			data: 'id_recaudo='+id_recaudo,
			type: 'post',
			success: function(data){
				if(data!="")
						jAlert(data, 'Resultado de la confirmación');
						fn_listar_recaudos();
							}
					});
		}
					});
	
}