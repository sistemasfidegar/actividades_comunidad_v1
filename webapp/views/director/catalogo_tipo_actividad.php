
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

	
	$("#guardar").click(function ()
			{ 
				 if($('#nuevActividad').valid())
						     {
								 $.blockUI({message: 'Procesando por favor espere...'});
					             $.ajax({
					                 type: 'POST',
					                 url: $('#nuevActividad').attr("action"),
					                 data: $('#nuevActividad').serialize(),
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
					                          		irA('index.php/director/tipo_actividad');
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
					                         		 irA('index.php/director/tipo_actividad');
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
   
	
			<div class="" style="width:90%">
			    <form action="index.php/director/updateCatalogo/" name="nuevActividad" method="post" id="nuevActividad">
			        <table id="form_coo" border="0">
			            <tr>
			                <td colspan="1" style="text-align:right;">Actividad</td>
			                <td colspan="2" style="text-align:left;">                   
			                    <input id="tipo_actividad" name="tipo_actividad" class="textbox_insert" type="text" style="width: 97%;" value="<?php echo $actividad['tipo_actividad'];?>"/></td>
							 	<input id="id_tipo_actividad" name="id_tipo_actividad" class="textbox_insert" type="hidden" style="width: 97%;" value="<?php echo $actividad['id_tipo_actividad'];?>"/></td>
							 	<input id="update" name="update" type="hidden" style="width: 97%;" value="tipo_actividad"/></td>
		            		</td>
			                <td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>                 
			            </tr>
			           
			            <tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
			           
			            <tr>    
			            	<td colspan="4" style="text-align:right; "> 
			            	  <button id="guardar" name="guardar" type="button" class="btn btn-small btn-custom">Guardar</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                       
			                  <button id="cancelar" name="cancelar" type="button" class="btn btn-small" onclick="irA('index.php/director/tipo_actividad')">Cancelar</button>
			                                                                                                    
			                </td>  
			               <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			            </tr>                
					</table>
			    </form>
			</div>
	</div>

