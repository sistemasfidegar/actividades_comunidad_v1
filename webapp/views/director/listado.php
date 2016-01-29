<section class="content-header">
    <h1>
        Actividades en comunidad a realizar     
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
   /* $('#Exportar_a_Excel').DataTable({
    	"columnDefs": [
                       {"searchable": false, "targets": [0, 1, 2,3,4,5,6]},
                       {"sortable": false, "targets": [0, 1, 2,3,4,5,6]}
                   ]

    });*/
    
    $(document).tooltip({
	      position: {
	        my: "right bottom-10",
	        at: "right top",
	        using: function( position, feedback ) {
	          $( this ).css( position );
	          $( "<div>" )
	            .addClass( "arrow" )
	            .addClass( feedback.vertical )
	            .addClass( feedback.horizontal )
	            .appendTo( this );
	        }
	      }
	 });

	$(".botonExcel").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
		$("#FormularioExportacion").submit();
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
    var rules_form = {
	        rules: {		        	
	        	mes: "selectNone",
	        	id_tipo_reporte: "selectNone"
	        },
	        messages: {		        	
	        	
	        },
	        ignore: ":not(:visible)",
	        showErrors: function (map, list) {
	            // there's probably a way to simplify this
	            var focussed = document.activeElement;
	            
	           /* if (focussed && $(focussed).is("input, textarea")) {
	                $(this.currentForm).tooltip("close", {
	                    currentTarget: focussed
	                }, true);
	            }*/
	            
	            this.currentElements.removeAttr("title").removeClass("ui-state-error");
	            
	            $.each(list, function (index, error) {
	                $(error.element).attr("title", error.message).addClass("ui-state-error");
	            });
	            
	            /*if (focussed && $(focussed).is("input, textarea")) {
	                $(this.currentForm).tooltip("open", {
	                    target: focussed
	                });
	            }*/
	        }
	    };

 jQuery.validator.addMethod(
            "selectNone",
            function (value, element) {
                if (element.value == "0")
                    return false;
                else
                    return true;
            },
            "Debe seleccionar una opción"
 );


 $("#filtros").validate(rules_form);

    
	$("#generar").click(function ()
	{ 					
		 if($('#filtros').valid())
	     {

			 $("#filtros").submit();
	     }

	});
	
    
});


</script>
<?php /* 
echo "<pre>";
print_r($lugar);
echo "</pre>";
*/
?>
<!-- 

    <div class="row">
    
    <div class="col-md-12">
    <form id="filtros" name="filtros" method="post" action="index.php/director/listado">
	<div class="row">        	
        	<div class="col-md-12">
        		<div class="box box-solid box-success" style="text-align:left !important;  height:100%;">
   			     	<div class="box-body">
   			     	
   			     	       <div class="row">  
   			     	       
   			     	       		<div class="col-md-2">
						          
					            </div>
					            
	   			     	       <div class="col-md-2">
		   			     			<div class="form-group">
						              <label>Selecciona el año:</label>
							            <select name="anio" id="anio" class="form-control" >
							            	<?php for($i=date('Y');$i>=2015;$i--){?>
							            		<option value="<?php echo $i;?>"><?php echo $i;?></option>
							            	<?php }?>			            					            				          
						            	</select>
						            </div>
					            </div>
					            
					             <div class="col-md-4">
						            <div class="form-group">
						              <label>Selecciona el mes:</label>
							            <select name="mes" id="mes" class="form-control" >
							            	<option value="0">[Seleccionar]</option>
						            		<option value="01">Enero</option>
									        <option value="02">Febrero</option>
									        <option value="03">Marzo</option>
									        <option value="04">Abril</option>
									        <option value="05">Mayo</option>
									        <option value="06">Junio</option>
									        <option value="07">Julio</option>
									        <option value="08">Agosto</option>
									        <option value="09">Septiembre</option>
									        <option value="10">Octubre</option>
									        <option value="11">Noviembre</option>
									        <option value="12">Diciembre</option>					            				           
						            	</select>
						            </div>
						            
					            </div>
					            				            
				            </div>
							<div class="box-footer" style="text-align: right;" >
					     			<button id="generar" name="generar" type="button" class="btn btn-primary">Enviar</button>
					     	</div> 
				             
   			     	
   			     	
   			     	</div>
   			     </div>
   			 </div>
    </div>
</form>
    </div>
 -->
    <?php 
 /*		$display ="none";
 		if(isset($lista) && $lista!=null)*/
 			$display ="block";
 		?>
			    
        <!-- left column -->
        <div class="col-md-12" style="display:<?php echo $display;?>;">
            <!-- general form elements -->
            <div class="box box-solid box-success" style="text-align:left !important; min-height:260px; height:100%;">
            		<form action="index.php/director/exportaExcel" method="post" target="_blank" id="FormularioExportacion">
						<p align="right"><img src="resources/images/btn_excel.png" class="botonExcel" style="cursor:pointer;" title="De click aquí para descargar en formato .xls"/></p>
						<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
					</form>
 					          
            		<table id="Exportar_a_Excel" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" border="1" style="width:100%;"> <!-- table-hover table-condensed -->
            			<thead style="font-size:13px;">
								<tr bgcolor="#808080">
									<td>NOMBRE EVENTO</td>
									<td>EJE TEMÁTICO</td>
									<td>FECHA/HORA </td>
									<td>ASISTENTES </td>
									<td>RESPONSABLE</td>
									
									<td>COORDINACIÓN </td>
									<td>DELEGACIÓN</td>
									<td>PARTICIPANTES</td>
									<td>LOGISTICA</td>
									<td>SEDE</td>
									
									<td></td>
								</tr>
								</thead>
								
			        			<tbody style="font-size:12px;">
																
									<?php foreach ($lista as $value){?>
									<tr>
									
										
										<td><?php echo $value['nombre']?></td>
										<td><?php echo $value['eje_tematico']?></td>
										<td><?php echo $value['inicio'].'<br>'.$value['horario']?></td>
										<td><?php echo $value['no_asistentes']?></td>
										<td><?php echo $value['responsable_actividad']?></td>
										<td><?php echo $value['coordinacion']?></td>
										
										<td  align="center"><?php echo $value['siglas']?></td>
										
										<td><ul>
											<?php foreach ($participantes[$value['id_evento']] as $delegacion){?>
												<li ><?php echo $delegacion['delegacion']; ?></li>				                  
				            				<?php }?>
				            			</ul></td>
				            			<td><ul>
											<?php foreach ($logistica[$value['id_evento']] as $log){?>
												<li ><?php echo $log['logistica'].' - '.$log['cantidad']; ?></li>				                  
				            				<?php }?>
				            			</ul></td>
				            				<?php foreach ($lugar[$value['id_evento']] as $lu){ ?>
				            			<td><?php if($value['id_tipo_lugar']==1){echo '<strong>Plantel</strong> <br>'.$lu['lugar'];}elseif ($value['id_tipo_lugar']==2){echo '<b>Espacio Público</b> <br>'.$lu['lugar'].'<br><b>Direccion: </b>'.$lu['direccion'];}elseif ($value['id_tipo_lugar']==3){echo '<b>Museo</b> <br>'.$lu['lugar'].'<br><b>Direccion: </b>'.$lu['direccion'];}elseif ($value['id_tipo_lugar']==4){echo '<b>Escuela para adultos </b><br>'.$lu['lugar'].'<br><b>Direccion: </b>'.$lu['direccion'];}}?></td>
					            			
					            		<td align="center"><a href='index.php/director/BorrarEvento/<?php echo $value['id_evento']?>'" ><img src="resources/images/tache.png" border="0" /></a> </td>
					            		
										<?php }?>
				            	</form>
								</tr>
								
						</tbody>
							
				</table>
           				 
            </div>
        </div>
     </div>
</section>
