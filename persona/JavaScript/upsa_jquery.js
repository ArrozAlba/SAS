// JavaScript Document
$(document).ready(function(){
	fn_listar_upsa();
	$("#grilla tbody tr").mouseover(function(){
		$(this).addClass("over");
	}).mouseout(function(){
		$(this).removeClass("over");
	});
});
	   $(document).ready(function(){
		$("#estado").change(function(event){
		$("#ciudad").load('../../Controladores/control_select_ciudad.php?select='+$("#estado option:selected").val());					
		$("#cap1").css("display","none");	
		$("#cap2").css("display","block"); 
		});	
		});	
	function fn_agregar(){		
		var str = $("#form_upsa").serialize();
		$.ajax({
			url: '../../Controladores/controlador_upsa.php',
			data: str,
			type: 'post',
			success: function(data){
				if(data== "No"){				
					jAlert('Esta Sede ya ha Sido incluido al Sistema.','Mensaje de Alerta');
				}else{
					jAlert(data);
					fn_listar_upsa();
				}				
			}
		});
	};
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

function fn_listar_upsa(){
	var str = $("#form_upsa").serialize();
	$.ajax({
		url: '../../Php/upsa/listar_upsa.php',
		type: 'get',
		data: str,
		success: function(data){		
			$("#div_listar_upsa").html(data);				
		}
	});

}

function fn_eliminar_upsa(id_upsa){
	jConfirm('Desea eliminar esta UPSA?', 'Mensaje Confirmación', function(r) {
		if(r==true){
		$.ajax({
			url: '../../Php/upsa/eliminar_upsa.php',
			data: 'id_upsa='+id_upsa,
			type: 'post',
			success: function(data){
				if(data!="")
						jAlert(data, 'Resultado de la confirmación');
						fn_listar_upsa();
							}
					});
		}
					});
	
}