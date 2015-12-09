<style>
   .ui-tooltip, .arrow:after {
        background: white;
        border: 2px solid #cd0a0a;
    }
    .ui-tooltip {
        padding: 5px 20px;
        color: #cd0a0a;
        border-radius: 10px;
        font: bold 12px "Helvetica Neue", Sans-Serif;
        box-shadow: 0 0 4px #cd0a0a;
    }
    .arrow {
        width: 70px;
        height: 16px;
        overflow: hidden;
        position: absolute;
        left: 50%;
        margin-left: -35px;
        bottom: -16px;
    }
    .arrow.top {
        top: -16px;
        bottom: auto;
    }
    .arrow.left {
        left: 20%;
    }
    .arrow:after {
        content: "";
        position: absolute;
        left: 20px;
        top: -20px;
        width: 25px;
        height: 25px;
        box-shadow: 6px 5px 9px -9px black;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
    .arrow.top:after {
        bottom: -20px;
        top: auto;
    }
</style>

<script>
jQuery(document).ready(function(){

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

	 $(".dateP").datepicker({
         language: 'es',
         format: 'dd/mm/yyyy',
         autoclose: true
     });


	 var rules_form = {
		        rules: {		        	
		        	fecha_inicio: "esLunes",
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


	 jQuery.validator.addMethod(
	        "esLunes",
            function (value, element) {

	        	var str = element.value;
	        	var res = str.split("/");
	        	var fecha = res[2]+'-'+res[1]+'-'+res[0];

	        	ms = Date.parse(fecha);
	        	fecha = new Date(ms);
                if(fecha.getDay() != 0 || str=="")
                    return false;
                else
                    return true;
            },
            "Debe seleccionar el día lunes del comienzo del reporte"
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

<section class="content-header">
   <h1>Reporte Semanal</h1>                    
</section>
<?php // echo "<PRE>"; var_dump($datos); echo "</PRE>";?>
<section class="content">

 		<form id="filtros" name="filtros" method="post" action="index.php/reportes/generaSemanal">
 		 		 		
		<div class="row">        	
        	<div class="col-md-12">
        		<div class="box box-solid box-success" style="text-align:left !important;  height:100%;">
   			     	<div class="box-body">
   			     		
   			     		<div class="row">  
   			     		
   			     			<div class="col-md-8">
		   			     		<div class="form-group">
					            	<label>Tipo de reporte:</label>
						            <select name="id_tipo_reporte" id="id_tipo_reporte" class="form-control" >
						            	<option value="0">[Seleccionar]</option>
					            		<option value="1">Totales</option>
								        <option value="2">Por eje temático</option>
								        <option value="3">Por espacio público</option>
								        <option value="4">Por planteles</option>
								        <option value="5">Por museos</option>
								    <!--<option value="6">Por Escuela de Adultos Mayores</option> -->
							            				            
					            	</select>
					            </div>
					        </div>
					        
	   			     	    <div class="col-md-4">
		   			     		<div class="form-group">
					              <label>Selecciona la fecha:</label>
						            <div class="input-group" style="width:135px;">
				                        <div class="input-group-addon">
				                        	<i class="fa fa-calendar"></i>
				                        </div>
				                        <input name="fecha_inicio" id="fecha_inicio" type="text" value=""  class="form-control pull-right dateP" onFocus="this.blur();"/>
			                        </div>
					            </div>
		   			     	</div>	

			            </div>
			            
			             <div class="box-footer" style="text-align: right;" >
				     		<button id="generar" name="generar" type="button" class="btn btn-primary">Generar Reporte</button>
				     	</div> 
			            
			         </div>
			         
			      </div>  
			      			          
        	</div>        	
        </div>        
 		</form>
 		
 		<?php 
 		$display ="none";
 		if(isset($id_tipo_reporte) && $id_tipo_reporte!=null)
 			$display ="block";
 		?>
 		<div class="row" style="display:<?php echo $display;?>;">        	
        	<div class="col-md-12" style="text-align:center !important;">
        		<div class="box box-solid box-success" style="text-align:center !important;  height:100%;">
        			<div class="box-body">
        			<form action="index.php/reportes/exportaExcel" method="post" target="_blank" id="FormularioExportacion">
						<p align="right"><img src="resources/images/btn_excel.png" class="botonExcel" style="cursor:pointer;"/></p>
						<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
					</form>
						<?php 
						if(isset($id_tipo_reporte) && $id_tipo_reporte==1)
						{
						?>
							<table width="100%" border="1" id="Exportar_a_Excel" >
								<tr height="70px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td colspan="5" align="center">
									INFORME GENERAL SEMANAL<br />
									DEL  LUNES <?php echo $fecha_inicio;?>  AL  DOMINGO <?php echo $fecha_fin;?>
									</td>
								</tr>
																
								<tr height="40px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td width="200px">
									DELEGACIÓN
									</td>
									<td width="20%">
									NO. DE ACTIVIDADES
									</td>
									<td width="20%">
									NO. DE VALIDACIONES
									</td>
									<td width="20%">
									NO. DE COORDINADORES
									</td>
									<td width="20%">
									NO. DE PROMOTORES
									</td>
								</tr>
							<?php
							$tact = 0;
							$tval = 0;
							$tcoor = 0;
							$tprom = 0;
							$r=1;
							foreach($delegaciones as $row)
							{
								$delegacion = $row['delegacion'];
								if(isset($datos[$row['id_delegacion']]['actividades']))
								{
									$td = $datos[$row['id_delegacion']]['actividades'];
									$tv = $datos[$row['id_delegacion']]['validaciones'];
									$tc = $datos[$row['id_delegacion']]['coordinadores'];
									$tp = $datos[$row['id_delegacion']]['promotores'];
									$tact += $td;
									$tval += $tv;
									$tcoor += $tc;
									$tprom += $tp;
								}
								else
								{
									$td = 0;
									$tv = 0;
									$tc = 0;
									$tp = 0;
								}
								
								$color ='#A5D5E2';
								if($r%2==0)
									$color ='#D2EAF1';
								
								
								echo '<tr bgcolor="'.$color.'"><td align="left" style="padding-left:5px; font-weight:bold;">'.$delegacion.'</td><td>'.$td.'</td><td>'.$tv.'</td><td>'.$tc.'</td><td>'.$tp.'</td></tr>';
								$r++;
							}	
							echo '<tr style="font-weight:bold;"><td style="border-left: 1px solid #ffffff; border-bottom:1px solid #ffffff;">&nbsp;</td><td>'.$tact.'</td><td>'.$tval.'</td><td>'.$tcoor.'</td><td>'.$tprom.'</td></tr>';
							
							?>							
							</table>																								
						<?php 							
						}
						if(isset($id_tipo_reporte) && $id_tipo_reporte==2)
						{
						
						?>
							<table width="100%" border="1" id="Exportar_a_Excel">
								<tr height="70px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td colspan="9" align="center">
										INFORME GENERAL SEMANAL: EJES TEMATICOS<br />
										DEL  LUNES <?php echo $fecha_inicio;?>  AL  DOMINGO <?php echo $fecha_fin;?>
									</td>
								</tr>
								<tr height="40px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td width="20%">
									
									</td>
									
									<td width="10%" >
									ARTE Y CULTURA
									</td>
									<td width="10%">
									CIENCIA Y TECNOLOGÍA
									</td>
									<td width="10%">
									DEPORTE Y RECREACIÓN
									</td>
									<td width="10%">
									ECONOMÍA SOLIDARIA
									</td>
									<td width="10%">
									MEDIO AMBIENTE
									</td>
									<td width="10%">
									PARTICIPACIÓN JUVENIL
									</td>
									<td width="10%">
									SALUD
									</td>
									<td width="5%">
									TOTAL
									</td>
								</tr>
								<?php 
								$valor=0;
								$r=1;
								$tarte=0;
								$tciencia=0;
								$tdeporte=0;
								$teconomia=0;
								$tambiente=0;
								$tparticipacion=0;
								$tsalud=0;
							
							foreach($delegaciones as $row)
							{
								$color ='#A5D5E2';
								if($r%2==0)
									$color ='#D2EAF1';
								
								$delegacion = $row['delegacion'];
								
								echo '<tr bgcolor="'.$color.'"><td align="left" style="padding-left:5px; font-weight:bold;">'.$delegacion.'</td>';
								if((isset($datos[$row['id_delegacion']]['arte'])) && ($datos[$row['id_delegacion']]['arte']!= 0))
								{
										
									$arte=$datos[$row['id_delegacion']]['arte'];
									$tarte+=$datos[$row['id_delegacion']]['arte'];
								}
								else 
									$arte=0;
								if((isset($datos[$row['id_delegacion']]['ciencia'])) && ($datos[$row['id_delegacion']]['ciencia']!= 0))
								{
								
									$ciencia=$datos[$row['id_delegacion']]['ciencia'];
									$tciencia+=$datos[$row['id_delegacion']]['ciencia'];
								}
								else
									$ciencia=0;
								if((isset($datos[$row['id_delegacion']]['deporte'])) && ($datos[$row['id_delegacion']]['deporte']!= 0))
								{
								
									$deporte=$datos[$row['id_delegacion']]['deporte'];
									$tdeporte+=$datos[$row['id_delegacion']]['deporte'];
								
								}
								else
									$deporte=0;
								if((isset($datos[$row['id_delegacion']]['economia'])) && ($datos[$row['id_delegacion']]['economia']!= 0))
								{
								
									$economia=$datos[$row['id_delegacion']]['economia'];
									$teconomia+=$datos[$row['id_delegacion']]['economia'];
								}
								else
									$economia=0;
								if((isset($datos[$row['id_delegacion']]['ambiente'])) && ($datos[$row['id_delegacion']]['ambiente']!= 0))
								{
								
									$ambiente=$datos[$row['id_delegacion']]['ambiente'];
									$tambiente+=$datos[$row['id_delegacion']]['ambiente'];
								}
								else
									$ambiente=0;
								if((isset($datos[$row['id_delegacion']]['participacion'])) && ($datos[$row['id_delegacion']]['participacion']!= 0))
								{
								
									$participacion=$datos[$row['id_delegacion']]['participacion'];
									$tparticipacion=$datos[$row['id_delegacion']]['participacion'];
								
								}
								else
									$participacion=0;
								if((isset($datos[$row['id_delegacion']]['salud'])) && ($datos[$row['id_delegacion']]['salud']!= 0))
								{
								
									$salud=$datos[$row['id_delegacion']]['salud'];
									$tsalud=$datos[$row['id_delegacion']]['salud'];
								
								}
								else
									$salud=0;
								$tdel=$arte+$ciencia+$deporte+$economia+$ambiente+$participacion+$salud;
								echo '<td>'.$arte.'</td><td>'.$ciencia.'</td><td>'.$deporte.'</td><td>'.$economia.'</td><td>'.$ambiente.'</td><td>'.$participacion.'</td><td>'.$salud.'</td><td>'.$tdel.'</td></tr>';	
								
								$r++;
								
								$tt=$tdel+$tarte+$tciencia+$tdeporte+$teconomia+$tambiente+$tparticipacion+$tsalud;
							}
							
							echo '<tr style="font-weight:bold;"><td style="border-left: 1px solid #ffffff; border-bottom:1px solid #ffffff;">&nbsp;</td><td>'.$tarte.'</td><td>'.$tciencia.'</td><td>'.$tdeporte.'</td><td>'.$teconomia.'</td><td>'.$tambiente.'</td><td>'.$tparticipacion.'</td><td>'.$tsalud.'</td><td>'.$tt.'</td></tr>';
								
						}
						if(isset($id_tipo_reporte) && $id_tipo_reporte==4)
						{
						?>
							<table width="100%" border="1" id="Exportar_a_Excel">
								<tr height="70px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td colspan="2" align="center">
									INFORME GENERAL SEMANAL<br />
									DEL  LUNES <?php echo $fecha_inicio;?>  AL  DOMINGO <?php echo $fecha_fin;?>
									</td>
								</tr>
																
								<tr height="40px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td width="200px">
									DELEGACIÓN - PLANTELES
									</td>
									
									<td width="20%">
									NO. DE VALIDACIONES
									</td>
								
								</tr>
							<?php
							$valor=0;
							$r=1;
							
							foreach($delegaciones as $row)
							{
								
								$cdel='#67A6BA';
								
								
								$delegacion = $row['delegacion'];
								
								echo '<tr bgcolor="'.$cdel.'"><td align="left" style="padding-left:5px; font-weight:bold;">'.$delegacion.'</td><td></td></tr>';
								foreach ($planteles as $plan)
								{
									$color ='#A5D5E2';
									if($r%2==0)
										$color ='#D2EAF1';
										
									if ($plan['id_delegacion']==$row['id_delegacion']){
										echo '<tr bgcolor="'.$color.'"><td align="left" style="padding-left:5px;">'.$plan['plantel'].'</td>';
										
										if ((isset($datos[$plan['id_plantel']]['validado'])) && ($datos[$plan['id_plantel']]['validado']!= 0)  ){
											
											$valor+=$datos[$plan['id_plantel']]['validado'];
											echo '<td>'.$valor.'</td></tr>';
											
										}
										else{
											$valor=0;
											echo  '<td>'.$valor.'</td></tr>';
											
										}
										
										
									}
									$r++;
								}
								
							}
										
						
							?>							
							</table>																								
						<?php 							
						}
						
						if(isset($id_tipo_reporte) && $id_tipo_reporte==5)
						{
						?>
							<table width="100%" border="1" id="Exportar_a_Excel">
								<tr height="70px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td colspan="2" align="center">
									INFORME GENERAL SEMANAL<br />
									DEL  LUNES <?php echo $fecha_inicio;?>  AL  DOMINGO <?php echo $fecha_fin;?>
									</td>
								</tr>
																
								<tr height="40px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td width="200px">
									DELEGACIÓN - MUSEOS
									</td>
									
									<td width="20%">
									NO. DE VALIDACIONES
									</td>
								
								</tr>
							<?php
							
						
							$valor = 0;
							$r=1;
							
							foreach($delegaciones as $row)
							{
								
								$cdel='#67A6BA';
								
								
								$delegacion = $row['delegacion'];
								
								echo '<tr bgcolor="'.$cdel.'"><td align="left" style="padding-left:5px; font-weight:bold;">'.$delegacion.'</td><td></td></tr>';
								foreach ($museos as $mus)
								{
									$color ='#A5D5E2';
									if($r%2==0)
										$color ='#D2EAF1';
										
									if ($mus['id_delegacion']==$row['id_delegacion']){
										echo '<tr bgcolor="'.$color.'"><td align="left" style="padding-left:5px;">'.$mus['museo'].'</td>';
										
										if ((isset($datos[$mus['id_museo']]['validado'])) && ($datos[$mus['id_museo']]['validado']!= 0)  ){
											
											$valor+=$datos[$mus['id_museo']]['validado'];
											echo '<td>'.$valor.'</td></tr>';
											
										}
										else{
											$valor=0;
											echo  '<td>'.$valor.'</td></tr>';
											
										}
										
										
									}
									$r++;
								}
								
							}
				
							?>							
							</table>																								
						<?php 							
						}
												
						if(isset($id_tipo_reporte) && $id_tipo_reporte==3)
						{
						?>
						
							<table width="100%" border="1" id="Exportar_a_Excel">
								<tr height="70px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td colspan="2" align="center">
									INFORME GENERAL SEMANAL<br />
									DEL  LUNES <?php echo $fecha_inicio;?>  AL  DOMINGO <?php echo $fecha_fin;?>
									</td>
								</tr>
																
								<tr height="40px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td width="200px">
									DELEGACIÓN - ESPACIOS PUBLICOS
									</td>
									
									<td width="20%">
									NO. DE VALIDACIONES
									</td>
								
								</tr>
							<?php
							
							$valor = 0;
							$r=1;
							
							foreach($delegaciones as $row)
							{
								
								$cdel='#67A6BA';
								$delegacion = $row['delegacion'];
								
								echo '<tr bgcolor="'.$cdel.'"><td align="left" style="padding-left:5px; font-weight:bold;">'.$delegacion.'</td><td></td></tr>';
								foreach ($espacios as $esp)
								{
									$color ='#A5D5E2';
									if($r%2==0)
										$color ='#D2EAF1';
										
									if ($esp['id_delegacion']==$row['id_delegacion']){
										echo '<tr bgcolor="'.$color.'"><td align="left" style="padding-left:5px;">'.$esp['espacio_publico'].'</td>';
										
										if ((isset($datos[$esp['id_espacio_publico']]['validado'])) && ($datos[$esp['id_espacio_publico']]['validado']!= 0)  ){			
											$valor+=$datos[$esp['id_espacio_publico']]['validado'];
											echo '<td>'.$valor.'</td></tr>';
											
										}
										else{
											$valor=0;
											echo  '<td>'.$valor.'</td></tr>';
											
										}
										
										
									}
									$r++;
								}
								
							}
					
							?>							
							</table>																								
						<?php 							
						}
						
						if(isset($id_tipo_reporte) && $id_tipo_reporte==6)
						{
						?>
						
							<table width="100%" border="1" id="Exportar_a_Excel">
								<tr height="70px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td colspan="2" align="center">
									INFORME GENERAL SEMANAL<br />
									DEL  LUNES <?php echo $fecha_inicio;?>  AL  DOMINGO <?php echo $fecha_fin;?>
									</td>
								</tr>
																
								<tr height="40px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td width="200px">
									DELEGACIÓN - ESCUELA ADULTOS MAYORES
									</td>
									
									<td width="20%">
									NO. DE VALIDACIONES
									</td>
								
								</tr>
							<?php
							
							$r=1;
							$valor=0;
							foreach($delegaciones as $row)
							{
								
								$cdel='#67A6BA';
								$delegacion = $row['delegacion'];
								
								echo '<tr bgcolor="'.$cdel.'"><td align="left" style="padding-left:5px; font-weight:bold;">'.$delegacion.'</td><td></td></tr>';
								foreach ($escuelas as $esc)
								{
									$color ='#A5D5E2';
									if($r%2==0)
										$color ='#D2EAF1';
										
									if ($esc['id_delegacion']==$row['id_delegacion']){
										echo '<tr bgcolor="'.$color.'"><td align="left" style="padding-left:5px;">'.$esc['escuela'].'</td>';
										
										if ((isset($datos[$esc['id_escuela_adulto']]['validado'])) && ($datos[$esc['id_escuela_adulto']]['validado']!= 0)  ){		
											$valor+=$datos[$esc['id_escuela_adulto']]['validado'];
											echo '<td>'.$valor.'</td></tr>';
											
										}
										else{
											$valor=0;
											echo  '<td>'.$valor.'</td></tr>';
											
										}
										
										
									}
									$r++;
								}
								
							}
					
							?>							
							</table>																								
						<?php 							
						}
						?>
   			     	</div>
   			     </div>
   			 </div>
   		</div>
 </section>
 