
<style>
.btn-custom {
  background-color: hsl(312, 80%, 43%) !important;
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #FF139B", endColorstr="#c515a2");
  background-image: -khtml-gradient(linear, left top, left bottom, from( #FF139B), to(#c515a2));
  background-image: -moz-linear-gradient(top, #FF139B, #c515a2);
  background-image: -ms-linear-gradient(top, #FF139B, #c515a2);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,  #FF139B), color-stop(100%, #c515a2));
  background-image: -webkit-linear-gradient(top,  #FF139B, #c515a2);
  background-image: -o-linear-gradient(top, #FF139B, #c515a2);
  background-image: linear-gradient(#FF139B, #c515a2);
  border-color: #c515a2 #c515a2 hsl(312, 80%, 40.5%);
  color: #fff !important;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.16);
  -webkit-font-smoothing: antialiased;
}
    fieldset{
        border-top: 1px solid #3C8DBC;
        //border-left: 1px solid #3C8DBC;
        border-radius: 0px;       
        padding-left: 0px;
    }
    .textbox_insert { 
        border: 1px solid #c4c4c4; 
        height: 28px; 
        width: 275px; 
        font-size: 14px; 
        padding: 4px 4px 4px 4px; 
        border-radius: 4px; 
        -moz-border-radius: 4px; 
        -webkit-border-radius: 4px; 
        box-shadow: 0px 0px 8px #d9d9d9; 
        -moz-box-shadow: 0px 0px 8px #d9d9d9; 
        -webkit-box-shadow: 0px 0px 8px #d9d9d9; 
        background: #f4f4f4;

    } 
    .textbox_insert:focus { 
        outline: none; 
        border: 1px solid #34D83F; 
        box-shadow: 0px 0px 8px #34D83F; 
        -moz-box-shadow: 0px 0px 8px #3C8DBC; 
        -webkit-box-shadow: 0px 0px 8px #3C8DBC;         
        color:#555555;
        font-weight:bold; 
    } 
    .select_insert { 
        border: 1px solid #c4c4c4; 
        height: 30px; 
        font-size: 14px; 
        padding: 4px 4px 4px 4px; 
        border-radius: 4px; 
        -moz-border-radius: 4px; 
        -webkit-border-radius: 4px; 
        box-shadow: 0px 0px 8px #d9d9d9; 
        -moz-box-shadow: 0px 0px 8px #d9d9d9; 
        -webkit-box-shadow: 0px 0px 8px #d9d9d9;
        background: #f4f4f4;

    } 
    .select_insert:focus { 
        outline: none; 
        border: 1px solid #34D83F; 
        box-shadow: 0px 0px 8px #34D83F; 
        -moz-box-shadow: 0px 0px 8px #3C8DBC; 
        -webkit-box-shadow: 0px 0px 8px #3C8DBC;         
        color:#555555;
        font-weight:bold; 
        font-size: 12px; 
    }

    #form_coo { 
        border-spacing: 15px;
        border-collapse: separate;
        font-size: 1em;
        width: 1080px;
    }
    .pestania{
        font-size:13px;
        font-family:Arial Black;
        font-weight:bold;
    }

    .titulos{
        padding: 3px;
        font-size: 13px;
        border: 1px solid #3C8DBC;   
        margin-left: 30px;
    }
    /*********************errores de validacion*********/  
    .error-message, label.error {
        color: #ff0000;   
        margin:0;
        display: inline;
        font-size: 9px !important;
        font-weight:lighter;

    }
    input.error {
        border: 1px dotted red; 
    }
    select.error{
        border: 1px dotted red;
        display: block;
        float: left;
    }
    textarea.error {
        border: 1px dotted red; 
    }
    /****************************/

</style>
<script>
$().ready(function () {

	$("#nuevoEspacio").validate(
			{
				rules: {    tipo_espacio: "required"},
				messages: { 
							tipo_espacio: "Campo obligatorio"},
				ignore: ":not(:visible),:disabled"
			});
	$("#guardar").click(function ()
			{ 
				 if($('#nuevoEspacio').valid())
						     {
								 $.blockUI({message: 'Procesando por favor espere...'});
					             $.ajax({
					                 type: 'POST',
					                 url: $('#nuevoEspacio').attr("action"),
					                 data: $('#nuevoEspacio').serialize(),
					                 success: function (data) {

					                     $.unblockUI();
					                     if(data === 'ok')
					                     {
					                    	 swal({
					                          	  title: "¡Registro exitoso!",
					                          	  text: "",
					                          	  type: "success",
					                          	  showCancelButton: false,
					                          	  confirmButtonColor: "#34AF00",
					                          	  confirmButtonText: "Ok",
					                          	  //cancelButtonText: "No, cancel plx!",
					                          	  closeOnConfirm: false
					                          	  //closeOnCancel: false
					                          	},
					                          	function(isConfirm){
					                          	  if (isConfirm) {
					                          		irA('index.php/director/cat_espacio_publico');
					                          	  } 
					                          	});
					                     }
					                     else
					                     {
					                    	 swal({
					                         	  title: "Ocurrio un error, intentelo más tarde!!!",
					                         	  text: "",
					                         	  type: "error",
					                         	  showCancelButton: false,
					                         	  confirmButtonColor: "#C9302C",
					                         	  confirmButtonText: "Ok",
					                         	  //cancelButtonText: "No, cancel plx!",
					                         	  closeOnConfirm: false
					                         	  //closeOnCancel: false
					                         	},
					                         	function(isConfirm){
					                         	  if (isConfirm) {
					                         		 irA('index.php/director/cat_espacio_publico');
					                         	  } 
					                         	});
					                     }
					                 }
					             });
					         }

					     });

					});
function irA(uri) {
    window.location.href = '<?php echo base_url(); ?>' + uri;
}

</script>
<div class="box">     
        <div class="box-body table-responsive">
        <div class="pad20" style="text-align:left; width:90%;">
			   
					&nbsp;&nbsp;&nbsp;<img src="resources/images/catalogo.png" />
			   	<br /><br />
			</div>
   
	
			<div class="" style="width:100%">
			    <form action="index.php/director/updateCatalogo/" name="nuevoEspacio" method="post" id="nuevoEspacio">
			        <table id="form_coo" border="0">
			            <tr>
			                <td colspan="1" style="text-align:right; font-weight:bold;">Nombre:</td>
							<td colspan="4" style="text-align:left;">             
			                    <input id="nombre" name="nombre" class="textbox_insert" type="text" style="width: 97%;" value="<?php echo $busca['espacio_publico'];?>"/></td>
							</td>
			                                
			            </tr>
			             <tr>
			                <td colspan="1" style="text-align:right; font-weight:bold;">Dirección:</td>
							<td colspan="4" style="text-align:left;">        
			                    <input id="direccion" name="direccion" class="textbox_insert" type="text" style="width: 97%;" value="<?php echo $busca['direccion'];?>"/></td>
							 	<input id="id_espacio_publico" name="id_espacio_publico" class="textbox_insert" type="hidden" style="width: 97%;" value="<?php echo $busca['id_espacio_publico'];?>"/></td>
							 	<input id="update" name="update" type="hidden" style="width: 97%;" value="espacio"/></td>
		            		</td>
			                                 
			            </tr>
			           <tr>
			           	   <td style="text-align:right; font-weight:bold;" width="15%">Tipo Espacio:</td>
						    <td width="35%">
						    <table  border="0"  style="width:100%" >
							  <tr>
							    <td><input type="radio" id="tipo_espacio" name="tipo_espacio" value="1">Alameda</td>
							    <td><input type="radio" id="tipo_espacio" name="tipo_espacio" value="2">Bosque</td>		
							    <td><input type="radio" id="tipo_espacio" name="tipo_espacio" value="3">Camellón</td>
							    
							  </tr>
							  <tr>
							    
							    <td><input type="radio" id="tipo_espacio" name="tipo_espacio" value="4">Cancha</td>		
							    <td><input type="radio" id="tipo_espacio" name="tipo_espacio" value="5">Deportivo</td>
							    <td><input type="radio" id="tipo_espacio" name="tipo_espacio" value="6">Explanada</td>
							    
							 </tr>
							    
							  <tr>
							    <td><input type="radio" id="tipo_espacio" name="tipo_espacio" value="7">Faro Cultural</td>		
							    <td><input type="radio" id="tipo_espacio" name="tipo_espacio" value="8">Jardin</td>
							   	<td><input type="radio" id="tipo_espacio" name="tipo_espacio" value="9">Módulo</td>
						    </tr>
						    <tr>
						    	<td><input type="radio" id="tipo_espacio" name="tipo_espacio" value="10">Parque</td>
						    	<td><input type="radio" id="tipo_espacio" name="tipo_espacio" value="11">Otro</td>
						    	
						    </tr>
							 </table>
						    
						    </td>
			                <td style="text-align:right;  font-weight:bold;" width="15%">Delegacion:</td>
							<td  style="text-align:left;" width="30%">          
			                    <select name="delegacion" id="delegacion" class="form-control"  size="6">			            		
							            <?php foreach ($delegaciones as $value){
							            	$selected="";
							            	if(in_array($value['id_delegacion'],$busca))
							            		$selected="selected";
							            	
							            	?>
							            
						            	<option value="<?php echo $value['id_delegacion'];?>" <?php echo $selected;?> ><?php echo $value['delegacion']; ?></option>				                  
						            <?php }?>				            
				            	</select>
							</td>
			                               
			            </tr>
			            <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
			            <tr>    
			            	<td colspan="4" style="text-align:right; "> 
			            	  <button id="guardar" name="guardar" type="button" class="btn btn-small btn-custom">Guardar</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                       
			                  <button id="cancelar" name="cancelar" type="button" class="btn btn-small" onclick="irA('index.php/director/cat_espacio_publico')">Cancelar</button>
			                                                                                                    
			                </td>  
			               <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			            </tr>                
					</table>
			    </form>
			</div>
	</div>
