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
    $('#dtUsuarios').DataTable({
    	"columnDefs": [
                       {"searchable": false, "targets": [1]},
                       {"sortable": false, "targets": [1]}
                   ]

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
									
								</tr>
								</thead>
								
			        			<tbody style="font-size:12px;">
															
									<?php foreach ($lista as $value){?>
									<tr onClick="location.href='operador/modifica/<?php echo $value['id_evento']?>'" style="cursor:pointer;">
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
					            		<?php }?>
				  					</tr>
						</tbody>	
				</table>
            
            </div>
        </div>
     </div>
</section>
