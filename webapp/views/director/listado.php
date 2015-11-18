<section class="content-header">
    <h1>
        Actividades en comunidad registradas        
    </h1>   
    <ol class="breadcrumb">
        <li><a href="javascript:history.back(-1);"><i class="fa fa-angle-double-left"></i> Regresar</a></li>        
    </ol>
</section>
<section class="content">
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
</style>
<script>

$(document).ready(function() {
    $('#dtUsuarios').DataTable({
    	"columnDefs": [
                       {"searchable": false, "targets": [1]},
                       {"sortable": false, "targets": [1]}
                   ]

    });

    $("#Borrar").click(function ()
			{ 
				 if($('#BorrarE').valid())
						     {
								 $.blockUI({message: 'Procesando por favor espere...'});
					             $.ajax({
					                 type: 'POST',
					                 url: $('#BorrarE').attr("action"),
					                 data: $('#BorrarE').serialize(),
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
					                          		irA('index.php/director/listado');
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
					                         		 irA('index.php/director/listado');
					                         	  } 
					                         	});
					                     }
					                 }
					             });
					         }

					     });

    function irA(uri) {
	    window.location.href = '<?php echo base_url(); ?>' + uri;
	}

    
});


</script>
<?php /* 
echo "<pre>";
print_r($lugar);
echo "</pre>";
*/
?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-solid box-success" style="text-align:left !important; min-height:260px; height:100%;">
 					<div>DELEGACIÓN  </div>           
            		<table id ="dtUsuarios" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" border="1" style="width:100%;"> <!-- table-hover table-condensed -->
            			<thead style="font-size:13px;">
								<tr bgcolor="#808080">
									<td>NOMBRE EVENTO</td>
									<td width="76px">FECHA </td>
									<td>COORDINACIÓN </td>
									<td width="95px">DELEGACIÓN</td>
									<td>PARTICIPANTES</td>
									<td>SEDE</td>
									<td>UBICACI&Oacute;N</td>
									<td></td>
								</tr>
								</thead>
								
			        			<tbody style="font-size:12px;">
																
									<?php foreach ($lista as $value){?>
									<tr class="otro">
									
										
										<td><?php echo $value['descripcion']?></td>
										<td><?php echo $value['inicio']?></td>
										<td><?php echo $value['coordinacion']?></td>
										<td  align="center"><?php echo $value['siglas']?></td>
										
										<td><ul>
											<?php foreach ($participantes[$value['id_evento']] as $delegacion){?>
												<li value="" ><?php echo $delegacion['delegacion']; ?></li>				                  
				            				<?php }?>
				            			</ul></td>
				            			<?php foreach ($lugar[$value['id_evento']] as $lu){ ?>
				            			<td><?php if($value['id_tipo_lugar']==1){echo 'Plantel <br>'.$lu['lugar'];}elseif ($value['id_tipo_lugar']==2){echo 'Espacio Público <br>'.$lu['lugar'];}elseif ($value['id_tipo_lugar']==3){echo 'Museo <br>'.$lu['lugar'];}elseif ($value['id_tipo_lugar']==4){echo 'Escuela para adultos <br>'.$lu['lugar'];}}    ?></td>
					            		<td> <?php if ($value['id_tipo_lugar']==1){echo '';}else {echo $lu['direccion'];}?></td>
					            		
					            		
					            			
					            		<td><a href='director/BorrarEvento/<?php echo $value['id_evento']?>'" ><img src="resources/images/tache.png" border="0" /></a> </td>
					            		
										<?php }?>
				            	</form>
								</tr>
								
						</tbody>
							
				</table>
           				 
            </div>
        </div>
     </div>
</section>
