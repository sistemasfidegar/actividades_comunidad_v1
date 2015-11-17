


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
        font-size: 15px !important;
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
        border: 15px dotted red; 
    }
    /****************************/

</style>

<script>
$().ready(function () {

	function irA(uri) {
	    window.location.href = '<?php echo base_url(); ?>' + uri;
	}
	$('#nuevo').click(function(evento) {
		$('#desliza').fadeToggle(1000);
	});

    $("#nuevaCoordinacion").validate(
 	{
 	 	rules: {   nombre_eje: "required"},
        messages: { nombre_eje: "Campo obligatorio"},
        ignore: ":not(:visible),:disabled"
    });
	
	$("#guardar").click(function ()
			{ 
				 if($('#nuevaCoordinacion').valid())
						     {
								 $.blockUI({message: 'Procesando por favor espere...'});
					             $.ajax({
					                 type: 'POST',
					                 url: $('#nuevaCoordinacion').attr("action"),
					                 data: $('#nuevaCoordinacion').serialize(),
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
					                          		irA('index.php/director/cat_coordinacion');
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
					                         		 irA('index.php/director/cat_coordinacion');
					                         	  } 
					                         	});
					                     }
					                 }
					             });
					         }

					     });


					});

			



</script>
<section class="content-header">
    <h1> Coordinaciones</h1>   
    
</section>

<section class="content">
	<div class="pad20" style="text-align:right; width:98%;">
	   <input class="btn btn-small btn-custom" type="button" name="nuevo" id="nuevo" value="Agregar">
	</div>

	<div id="desliza" class="box box-solid box-success" style="display:none;width:100%;">
		<form action="index.php/director/guardaCatalogo/" name="nuevaCoordinacion" method="post" id="nuevaCoordinacion">
		     <table id="form_coo" border="0">
	 				<tr><td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>			            
			        <tr>
			            <td colspan="1" style="text-align:right;">Nombre:</td>
			            <td colspan="2" style="text-align:left;">
			            	<input id="coordinacion" name="coordinacion" class="textbox_insert" type="text" style="width: 97%;" value="" />
			            	<input id="tipo" name="tipo"  type="hidden" value="coordinacion"/>
			            </td>
		                <td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>                 
		            </tr>
		            <tr>
			            <td colspan="1" style="text-align:right;">Siglas:</td>
			            <td colspan="2" style="text-align:left;">
			            	<input id="siglas" name="siglas" class="textbox_insert" type="text" style="width: 97%;" value="" />
			            </td>
		                <td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>                 
		            </tr>
		            <tr>    
			           	<td colspan="4" style="text-align:right; ">                           
			                <button id="guardar" name="guardar" type="button" class="btn btn-large ">Guardar</button>
			            </td>  
			        </tr>                
			</table>
		</form>
	</div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-solid box-success" style="text-align:left !important; min-height:260px; height:100%;">
 					          
            		<table id ="Ejes" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" border="1" style="min-width:612px; width:100%;"> <!-- table-hover table-condensed -->
            			<thead style="font-size:13px;">
							<tr bgcolor="#808080">
								<th>#</th>
								<th>Coordinación</th>
								<th>Siglas</th>
							</tr>
						</thead>
			        	<tbody style="font-size:12px;">
			  
			        	<?php 
			        		$i=0;
							 foreach ($coordinacion as $data){
							$i++;
						?>
							<tr onClick="location.href='index.php/director/buscaCoordinacion/<?php echo $data['id_coordinacion']?>'" style="cursor:pointer;">
								<td><?php echo $i?></td>
								<td><?php echo $data['coordinacion']?></td>
								<td><?php echo $data['siglas']?></td>	
	    	 				<?php }?>
				  			</tr>
						</tbody>	
					</table>
            </div>
        </div>
     </div>
</section>

