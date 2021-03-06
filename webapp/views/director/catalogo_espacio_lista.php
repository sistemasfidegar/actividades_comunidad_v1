



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

#form_espacio {
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

		$("#nuevoEspacio").validate(
		{
			rules: {   espacio: "required",
					   tipo_espacio: "required"},
			messages: { espacio: "Campo obligatorio",
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

		



	</script>
	<section class="content-header">
	<label><h2> Espacio Publico</h2></label>

	</section>

	<section class="content">
	<div class="pad20" style="text-align:right; width:98%;">
	<input class="btn btn-small btn-custom" type="button" name="nuevo" id="nuevo" value="Agregar">
	</div>

	<div id="desliza" class="box box-solid box-success" style="display:none;width:100%;">
	<form action="index.php/director/guardaCatalogo/" name="nuevoEspacio" method="post" id="nuevoEspacio">
		<table id="form_espacio" border="0">
			<tr>
				<td colspan="1" style="text-align:right; font-weight:bold;">Nombre:</td>
				<td colspan="4" style="text-align:left;">
					<input id="espacio" name="espacio" class="textbox_insert" type="text" style="width: 97%;" value="" required/>
					<input id="tipo" name="tipo"  type="hidden" value="espacio"/>
				</td>
				
			</tr>
			<tr>
				<td colspan="1" style="text-align:right; font-weight:bold;">Dirección:</td>
				<td colspan="4" style="text-align:left;">
					<input id="direccion" name="direccion" class="textbox_insert" type="text" style="width: 97%;" value="" required/>
				</td>
				
			</tr>
			<tr >
			    
			   <td style="text-align:right; font-weight:bold;" width="10%">Tipo Espacio:</td>
			    <td width="30%">
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
				<td style="text-align:left;  font-weight:bold;" width="10%">Delegacion:</td>
			    <td  style="text-align:left;" width="20%">
			    	<select name="delegacion" id="delegacion" class="form-control"  size="6">			            		
				     <?php foreach ($delegaciones as $value){?>
				      	<option value="<?php echo $value['id_delegacion'];?>" ><?php echo $value['delegacion']; ?></option>				                  
				     <?php }?>				            
				  	</select>
			    </td>
			    <td style="text-align:left;  font-weight:bold;" width="1%"></td>	                      
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

					<table id ="espacios" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" border="1" style="min-width:612px; width:100%;"> <!-- table-hover table-condensed -->
							<thead style="font-size:13px;">
							<tr bgcolor="#808080">
								<th>#</th>
								<th>Espacio Publico</th>
								<th>Dirección</th>
								<th>Delegación</th>
								</tr>
								</thead>
								<tbody style="font-size:12px;">
								<?php
								$i=0;
							 foreach ($espacio_publico as $data){
							 $i++;
							 ?>
							<tr onClick="location.href='index.php/director/buscaespacio/<?php echo $data['id_espacio_publico']?>'" style="cursor:pointer;">
								<td><?php echo $i?></td>
								<td><?php echo $data['espacio_publico']?></td>
								<td><?php echo $data['direccion']?></td>
								<td><?php echo $data['delegacion']?></td>			
	    	 				<?php }?>
				  			</tr>
						</tbody>	
					</table>
            </div>
        </div>
     </div>
</section>