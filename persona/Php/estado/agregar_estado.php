<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="../../Css/estilo2.css"/>  
    <link rel="stylesheet" type="text/css" href="../../Css/estilo.css"/>  
	<link rel="stylesheet" type="text/css" href="../../Css/jscal2.css"/>
    <link rel="stylesheet" type="text/css" href="../../Css/border-radius.css"/> 
    <link href="../../Css/PHPPaging.lib.css" rel="stylesheet" type="text/css"/> 	
	<link href="../../JavaScript/jquery.alerts.css" rel="stylesheet" type="text/css"/>    	
	<script language="javascript" type="text/javascript" src="../../JavaScript/jquery-1.4.2.min.js"></script>
    <script language="javascript" type="text/javascript" src="../../JavaScript/jquery.blockUI.js"></script>   
   	<script language="javascript" type="text/javascript" src="../../JavaScript/estado_jquery.js"></script>
    <script language="javascript" type="text/javascript" src="../../JavaScript/estado.js"></script>
    <script language="javascript" type="text/javascript" src="../../JavaScript/jquery.alerts.js"></script>
  </head><script language="javascript" type="text/javascript" >
	  
	  $(document).ready(function(){
		  
    	$('#nuevo').click(function(){
		$('#agregar').removeClass('btn_guardar_desact').addClass('btn_act');
		$('#agregar').attr('disabled', false);
		$('#nuevo').removeClass('btn_act').addClass('btn_guardar_desact');
		$('#nuevo').attr('disabled', true);
		
		$('#nombre').attr('disabled', false);
		$('#nombre').focus();
		$('#pais').attr('disabled', false);
		
    });	
     $('#agregar').click(function(){
		if(valida()){	
		fn_agregar();			
		$('#nuevo').removeClass('btn_guardar_desact').addClass('btn_act');
		$('#nuevo').attr('disabled', false);
		$('#agregar').removeClass('btn_act').addClass('btn_guardar_desact');
		$('#agregar').attr('disabled', true);
		
		$('#nombre').attr('disabled', true);
		$('#pais').attr('disabled', true);			
		}
    });
    });
		function limpiar_form(ele) {
   $(ele).find('input').each(function() {
      switch(this.type) {
         case 'select':
         case 'text':
         case 'textarea':
				 $(this).val('');
               	 break;
      }
   }); 			
 $(ele).find('select').each(function() {
       $("#"+this.id).val('0');
   });

   $(ele).find('textarea').each(function() {
       $("#"+this.id).val('');
   });
 
   } 
</script>
  <style>
.btn_act{
  height: 23px; 
  background-color: #f5f5f0; 
  border-bottom: 1px solid #09F;
  border-right:1px solid #09F; 
  border-top:0px; 
  border-left:0px; 
  font-size: 13px;
  color:black; 
  padding-left: 20px; 
  background-repeat: no-repeat; 
  cursor:hand; cursor:pointer;
  margin-left:5px; 
  margin-right:5px; 
  outline-width:0px;
  background-image: url(../../Imagen_sistema/cancelar.jpg);
}
.btn_nuevo_act_img{
	  background-image: url(../../Imagen_sistema/nuevo.jpg);
}
.btn_cancelar_act_img{
	 margin: auto;
	 background-repeat: no-repeat; 
	 cursor:hand; cursor:pointer;
	 height: 21px;
	 width: 22px;
	 border: 0px;
	 background-image: url(../../Imagen_sistema/cancelar.jpg);
}
.btn_guardar_act_img{
	  background-image: url(../../Imagen_sistema/guardar.jpg);
}
.btn_act:hover{
  height: 23px; 
  background-color: #f5f5f0; 
  border-bottom: 1px solid #0F0;
  border-right:1px solid #0F0; 
  border-top:0px; 
  border-left:0px;
  font-size: 13px; 
  color:black;
  padding-left: 20px; 
  background-repeat: no-repeat;
  cursor:hand; 
  cursor:pointer; 
  margin-left:5px; 
  margin-right:5px;
  outline-width:0px;
}

.btn_guardar_desact{
  height: 23px; 
  background-color: #f5f5f0; 
  border-bottom: 1px solid #999;
  border-right:1px solid #999; 
  border-top:0px; 
  border-left:0px; 
  font-size: 13px;
  color:#CCC;
  padding-left: 20px; 
  background-repeat: no-repeat; 
  cursor:hand; cursor:pointer;
  margin-left:5px; 
  margin-right:5px; 
  outline-width:0px;
}
/*.btn_guardar_desact_img{
  background-image: url(Imagen_sistema/guardar_desac.jpg);

}*/
.btn_guardar_desact:hover{
  height: 23px; 
  background-color: #f5f5f0; 
  border-bottom: 1px solid #333;
  border-right:1px solid #333; 
  border-top:0px; 
  border-left:0px;
  font-size: 13px; 
  color:#CCC;
  padding-left: 20px; 
  background-repeat: no-repeat;
  cursor:hand; 
  cursor:pointer; 
  margin-left:5px; 
  margin-right:5px;
  outline-width:0px;
}
</style> 
<body>
<div id="cuerpo">  
<form action="" method="post" id="form_estado" name="form_estado">
<table width="686" height="25" border="0" cellpadding="0" cellspacing="0">
  <tr>
   <td width="664" height="37"><h1>Agregando Estado</h1></td>
    <td width="22" valign="top"><input name="cancelar" type="button" id="cancelar" class='btn_cancelar_act_img' onclick="location.href='../../../html/blanco.html'" title="Salir" /></td>
  </tr>
</table>
<fieldset>  
<legend align="left"> </legend>
 <table width="677" height="59" cellpadding="0" cellspacing="0">
 <tbody>
 <tr>
  <td width="189" height="27"><input name="ope" type="hidden" id="ope" value="I" hidden="hidden" /></td>
  <td width="66">Nombre:</td>
  <td width="406" ><input name="nombre" type="text" disabled="disabled" id="nombre" size="30" title="Nombre del Estado" /></td>
 </tr>
 <tr>
  <td height="24">&nbsp;</td>
  <td>País:</td>
  <td ><select name="pais" id="pais" disabled="disabled" title="País donde pertenece el estado">
    <option value="0" selected="selected" disabled="disabled">Seleccionar</option>
    <?php include_once("../../Clases/clase_pais.php");
		$pais=new pais();
		$lista_pais=$pais->lista_pais();
		for($i=0;$i<count($lista_pais);$i++)
		{
		?><option value="<?php echo $lista_pais[$i][1];?>"><?php echo $lista_pais[$i][2];?></option>
    <?php }?>
  </select></td>
</tr>        
</tbody>
</table>     
</fieldset>
<table  width="686" border="0" cellpadding="0" cellspacing="0">
 <tr>
<td width="337" align="right"><input name="nuevo" type="button" id="nuevo" value="  Nuevo" class='btn_act btn_nuevo_act_img' onclick="limpiar_form(this.form)" title="Pulse para activar campos" /></td>
      <td width="349"><input name="agregar" type="submit"  class='btn_guardar_desact btn_guardar_act_img' disabled="disabled" id="agregar" onClick="if(!valida()){return false};" value=" Agregar"  title="Guardar"/></td>
 </tr>
</table>
<hr/>
 <div id="div_listar_estado"></div>        
</form>    
</div>
</body>
</html>
