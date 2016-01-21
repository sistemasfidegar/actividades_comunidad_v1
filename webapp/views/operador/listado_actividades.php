<section class="content-header">
    <h1>
        Actividades en comunidad registradas        
    </h1>   
    <ol class="breadcrumb">
        <li><a href="javascript:history.back(-1);"><i class="fa fa-angle-double-left"></i> Regresar</a></li>        
    </ol>
</section>
<section class="content">

<script>

$(document).ready(function() {
    $('#Exportar_a_Excel').DataTable({
    	"columnDefs": [
                       {"searchable": true},
                       {"sortable": true}
                   ]

    });
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
            <div class="box box-solid box-success" style="width:100%; text-align:left !important; min-height:260px; height:100%;">
            		<form action="index.php/operador/exportaExcel" method="post" target="_blank" id="FormularioExportacion">
						<p align="right"><img src="resources/images/btn_excel.png" class="botonExcel" style="cursor:pointer;" title="De click aquí para descargar en formato .xls"/></p>
						<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
					</form>
 					<div>DELEGACIÓN  </div>           
            		<table id="Exportar_a_Excel" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" border="1" style="width:100%;"> <!-- table-hover table-condensed -->
            			<thead style="font-size:13px;">
								<tr bgcolor="#808080">
									<td>NOMBRE EVENTO</td>
									<td>EJE TEMÁTICO</td>
									<td>FECHA/HORA </td>
									<td>ASISTENTES </td>
									<td>RESPONSABLE ACTIVIDAD </td>
									<td>COORDINACIÓN </td>
									<td>DELEGACIÓN</td>
									<td>PARTICIPANTES</td>
									<td>LOGISTICA</td>
									<td>UBICACI&Oacute;N</td>									
								</tr>
								</thead>
								
			        			<tbody style="font-size:12px;">
															
									<?php foreach ($lista as $value){?>
									<tr onClick="location.href='index.php/operador/modifica/<?php echo $value['id_evento']?>'" style="cursor:pointer;">
										<td><?php echo $value['nombre']?></td>
										<td><?php echo $value['eje_tematico']?></td>
										<td><?php echo $value['inicio'].'<br>'.$value['horario']?></td>
										<td><?php echo $value['no_asistentes']?></td>
										<td><?php echo $value['responsable_actividad']?></td>
										<td><?php echo $value['coordinacion']?></td>
										<td  align="center"><?php echo $value['siglas']?></td>
										
										<td><ul>
											<?php foreach ($participantes[$value['id_evento']] as $delegacion){?>
												<li value="" ><?php echo $delegacion['delegacion']; ?></li>				                  
				            				<?php }?>
				            			</ul></td>
				            			<td><ul>
											<?php foreach ($logistica[$value['id_evento']] as $log){?>
												<li ><?php echo $log['logistica'].' - '.$log['cantidad']; ?></li>				                  
				            				<?php }?>
				            			</ul></td>
				            			<?php foreach ($lugar[$value['id_evento']] as $lu){ ?>
				            			<td><?php if($value['id_tipo_lugar']==1){echo 'Plantel <br>'.$lu['lugar'];}elseif ($value['id_tipo_lugar']==2){echo '<b>Espacio Público</b> <br>'.$lu['lugar'].'<br><b>Direccion: </b>'.$lu['direccion'];}elseif ($value['id_tipo_lugar']==3){echo '<b>Museo</b> <br>'.$lu['lugar'].'<br><b>Direccion: </b>'.$lu['direccion'];}elseif ($value['id_tipo_lugar']==4){echo '<b>Escuela para adultos </b><br>'.$lu['lugar'].'<br><b>Direccion: </b>'.$lu['direccion'];}}?></td>
					            			
					            		<?php }?>
				  					</tr>
						</tbody>	
				</table>
            
            </div>
        </div>
     </div>
</section>
