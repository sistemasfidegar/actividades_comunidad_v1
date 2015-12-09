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
	

	 var rules_form = {
		        rules: {		        	
		        	mes: "selectNone",
		        	id_tipo_reporte: "selectNone",
		        	trimestre: "selectNone"
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

<section class="content-header">
   <h1>Reporte Trimestral</h1>                    
</section>

<section class="content">
<form id="filtros" name="filtros" method="post" action="index.php/reportes/generaTrimestral">
	<div class="row">        	
        	<div class="col-md-12">
        		<div class="box box-solid box-success" style="text-align:left !important;  height:100%;">
   			     	<div class="box-body">
   			     	
   			     	       <div class="row">  
   			     	       
   			     	       		<div class="col-md-4">
						            <div class="form-group">
						            	<label>Tipo de reporte:</label>
							            <select name="id_tipo_reporte" id="id_tipo_reporte" class="form-control" >
							            	<option value="0">[Seleccionar]</option>
						            		<option value="1">Totales</option>
									        <option value="2">Por eje temático</option>
									        <option value="3">Por espacio público</option>
									        <option value="4">Por planteles</option>
									        <option value="5">Por museos</option>
									   <!-- <option value="6">Por escuela de adultos mayores</option> -->	
									        <option value="7">Tipo actividad</option>				            				           
						            	</select>
						            </div>
					            </div>
					            
	   			     	       <div class="col-md-4">
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
						              <label>Selecciona el trimestre:</label>
							            <select name="trimestre" id="trimestre" class="form-control" >
							            	<option value="0">[Seleccionar]</option>
						            		<option value="1">Enero - Marzo</option>
									        <option value="2">Abril - Junio</option>
									        <option value="3">Julio - Septiembre</option>
									        <option value="4">Octubre - Diciembre</option>									        			            				          
						            	</select>
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
						<p align="right"><img src="resources/images/btn_excel.png" class="botonExcel" style="cursor:pointer;" title="De click aquí para descargar en formato .xls"/></p>
						<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
					</form>
					<?php 
						if(isset($id_tipo_reporte) && $id_tipo_reporte==1)
						{
							/*
							 
							 echo "<pre>";
							 print_r($datos);
							 echo "</pre>";
						 */
					?>
							<table width="100%" border="1" id="Exportar_a_Excel" >
								<tr height="70px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td colspan="19" align="center">
									INFORME GENERAL TRIMESTRAL<br />
									<?php echo getMesesTrimestreLetra($trimestre);?> DE <?php echo $anio;?>
									</td>
								</tr>
																
								<tr height="40px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td width="20%">
									DELEGACIÓN
									</td>
									<td width="13%" colspan="3">
									NO. DE ACTIVIDADES
									</td>
									<td width="13%" colspan="3">
									NO. DE VALIDACIONES
									</td>
									<td width="13%" colspan="3">
									NO. DE COORDINADORES
									</td>
									<td width="13%" colspan="3">
									NO. DE PROMOTORES
									</td>
									<td width="13%" colspan="3">
									ASISTENTES ESP.
									</td>
									<td width="13%" colspan="3">
									ASISTENTES TOT.
									</td>
								</tr>
								<tr bgcolor="#3F7788" align="center" style="font-weight:bold;" >
								    <td></td>
								    <td align="center" width="4%">01</td>
								    <td align="center" width="4%">02</td>
									<td align="center" width="4%">03</td>
									<td align="center" width="4%">01</td>
								    <td align="center" width="4%">02</td>
									<td align="center" width="4%">03</td>
									<td align="center" width="4%">01</td>
								    <td align="center" width="4%">02</td>
									<td align="center" width="4%">03</td>
									<td align="center" width="4%">01</td>
								    <td align="center" width="4%">02</td>
									<td align="center" width="4%">03</td>
									<td align="center" width="4%">01</td>
								    <td align="center" width="4%">02</td>
									<td align="center" width="4%">03</td>
									<td align="center" width="4%">01</td>
								    <td align="center" width="4%">02</td>
									<td align="center" width="4%">03</td>
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
								if(isset($datos[$row['id_delegacion']]['actividad1']) && isset($datos[$row['id_delegacion']]['actividad2']) && isset($datos[$row['id_delegacion']]['actividad3'])){
									$td1 = $datos[$row['id_delegacion']]['actividad1'];
									$td2 = $datos[$row['id_delegacion']]['actividad2'];
									$td3 = $datos[$row['id_delegacion']]['actividad3'];
								}
								else 
								{
									$td1=0; $td2=0; $td3=0;
								}
								if (isset($datos[$row['id_delegacion']]['validaciones1'] ) && isset($datos[$row['id_delegacion']]['validaciones2']) && isset($datos[$row['id_delegacion']]['validaciones3'])){	
									$tv1 = $datos[$row['id_delegacion']]['validaciones1'];
									$tv2 = $datos[$row['id_delegacion']]['validaciones2'];
									$tv3 = $datos[$row['id_delegacion']]['validaciones3'];
								}else 
								{
									$tv1=0; $tv2=0; $tv3=0;
								}
								if (isset($datos[$row['id_delegacion']]['coordinadores1']) && isset($datos[$row['id_delegacion']]['coordinadores2']) && isset($datos[$row['id_delegacion']]['coordinadores3']) ){
									
									$tc1 = $datos[$row['id_delegacion']]['coordinadores1'];
									$tc2 = $datos[$row['id_delegacion']]['coordinadores2'];
									$tc3 = $datos[$row['id_delegacion']]['coordinadores3'];
								}
								else {
									$tc1=0; $tc2=0; $tc3=0;
								}
								if (isset($datos[$row['id_delegacion']]['promotores1']) && isset($datos[$row['id_delegacion']]['promotores2']) && isset($datos[$row['id_delegacion']]['promotores3'])){
									$tp1 = $datos[$row['id_delegacion']]['promotores1'];
									$tp2 = $datos[$row['id_delegacion']]['promotores2'];
									$tp3 = $datos[$row['id_delegacion']]['promotores3'];
								}else
								{
								 $tp1=0; $tp2=0; $tp3=0;	
								}
								if (isset($datos[$row['id_delegacion']]['esperados1']) && isset($datos[$row['id_delegacion']]['esperados2']) && isset($datos[$row['id_delegacion']]['esperados3'])){
									$te1 = $datos[$row['id_delegacion']]['esperados1'];
									$te2 = $datos[$row['id_delegacion']]['esperados2'];
									$te3 = $datos[$row['id_delegacion']]['esperados3'];
								}
								else
								{
									$te1 = 0;
									$te2 = 0;
									$te3 = 0;
								}
								
								
								if (isset($datos[$row['id_delegacion']]['Asistentes1']) && isset($datos[$row['id_delegacion']]['Asistentes2']) && isset($datos[$row['id_delegacion']]['Asistentes3'])){
									$ta1 = $datos[$row['id_delegacion']]['Asistentes1'];
									$ta2 = $datos[$row['id_delegacion']]['Asistentes2'];
									$ta3 = $datos[$row['id_delegacion']]['Asistentes3'];
								}
								else 
								{
									$ta1 = 0;
									$ta2 = 0;
									$ta3 = 0;
								}
								
								$tact  += $td1 + $td2 + $td3;
								$tval  += $tv1 + $tv2 + $tv3;
								$tcoor += $tc1 + $tc2 + $tc3;
								$tprom += $tp1 + $tp2 + $tp3;
								$tesp += $te1 + $te2 + $te3;
								$tasis += $ta1 + $ta2 + $ta3;
								$color ='#A5D5E2';
								if($r%2==0)
									$color ='#D2EAF1';
								
								
								echo '<tr bgcolor="'.$color.'"><td align="left" style="padding-left:5px; font-weight:bold;">'.$delegacion.'</td>';
								echo '<td>'.$td1.'</td><td>'.$td2.'</td><td>'.$td3.'</td>';
								echo '<td>'.$tv1.'</td><td>'.$tv2.'</td><td>'.$tv3.'</td>';
								echo '<td>'.$tc1.'</td><td>'.$tc2.'</td><td>'.$tc3.'</td>';
								echo '<td>'.$tp1.'</td><td>'.$tp2.'</td><td>'.$tp3.'</td>';
								echo '<td>'.$te1.'</td><td>'.$te2.'</td><td>'.$te3.'</td>';
								echo '<td>'.$ta1.'</td><td>'.$ta2.'</td><td>'.$ta3.'</td></tr>';
								$r++;
							}	
							echo '<tr style="font-weight:bold;"><td style="border-left: 1px solid #ffffff; border-bottom:1px solid #ffffff;">&nbsp;</td><td colspan="3">'.$tact.'</td><td colspan="3">'.$tval.'</td><td colspan="3">'.$tcoor.'</td><td colspan="3">'.$tprom.'</td><td colspan="3">'.$tesp.'</td><td colspan="3">'.$tasis.'</td></tr>';
							
							?>							
							</table>																								
						<?php 							
						}
						if(isset($id_tipo_reporte) && $id_tipo_reporte==2)
						{
							
						?>
							<table width="100%" border="1"  id="Exportar_a_Excel">
								<tr height="70px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td colspan="22" align="center" >
									INFORME GENERAL TRIMESTRAL :EJE TEMÁTICO<br />
									<?php echo getMesesTrimestreLetra($trimestre);?> DE <?php echo $anio;?>
									</td>
								</tr>
								<tr height="40px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td width="25%">
									
									</td>
									
									<td width="10%" colspan="3" >
									ARTE Y CULTURA
									</td>
									<td width="10%" colspan="3">
									CIENCIA Y TECNOLOGÍA
									</td>
									<td width="10%" colspan="3">
									DEPORTE Y RECREACIÓN
									</td>
									<td width="10%" colspan="3">
									ECONOMÍA SOLIDARIA
									</td>
									<td width="10%" colspan="3" >
									MEDIO AMBIENTE
									</td>
									<td width="10%" colspan="3">
									PARTICIPACIÓN JUVENIL
									</td>
									<td width="10%" colspan="3">
									SALUD
									</td>
									
								</tr>
								<tr bgcolor="#3F7788" align="center" style="font-weight:bold;">
								    <td></td>
								    <td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
								</tr>
								<?php
								$r=1; 
								$tarte=0;
								$tciencia=0;
								$tdeporte=0;
								$teconomia=0;
								$tambiente=0;
								$tparticipacion=0;
								$tsalud=0;
								$t1 =0;
								$t2=0;
								$t3=0;
								foreach($delegaciones as $row)
							 	{
							 	
							 		$color ='#A5D5E2';
								if($r%2==0)
									$color ='#D2EAF1';
								
								$delegacion = $row['delegacion'];
								
								echo '<tr bgcolor="'.$color.'"><td align="left" style="padding-left:5px; font-weight:bold;">'.$delegacion.'</td>';
								
								if((isset($datos[$row['id_delegacion']]['arte1'])) && ($datos[$row['id_delegacion']]['arte1']!= 0))//ARTE
								{
									$arte1=$datos[$row['id_delegacion']]['arte1'];
									$tarte+=$datos[$row['id_delegacion']]['arte1'];
								}
								else
									$arte1=0;
								if((isset($datos[$row['id_delegacion']]['arte2'])) && ($datos[$row['id_delegacion']]['arte2']!= 0))
								{
									$arte2=$datos[$row['id_delegacion']]['arte2'];
									$tarte+=$datos[$row['id_delegacion']]['arte2'];
								}
								else
									$arte2=0;
								if((isset($datos[$row['id_delegacion']]['arte3'])) && ($datos[$row['id_delegacion']]['arte3']!= 0))
								{
									$arte3=$datos[$row['id_delegacion']]['arte3'];
									$tarte+=$datos[$row['id_delegacion']]['arte3'];
								}
								else
									$arte3=0;
								
								if((isset($datos[$row['id_delegacion']]['ciencia1'])) && ($datos[$row['id_delegacion']]['ciencia1']!= 0))//CIENCIA
								{
								
									$ciencia1=$datos[$row['id_delegacion']]['ciencia1'];
									$tciencia+=$datos[$row['id_delegacion']]['ciencia1'];
								}
								else
									$ciencia1=0;
								if((isset($datos[$row['id_delegacion']]['ciencia2'])) && ($datos[$row['id_delegacion']]['ciencia2']!= 0))
								{
								
									$ciencia2=$datos[$row['id_delegacion']]['ciencia2'];
									$tciencia+=$datos[$row['id_delegacion']]['ciencia2'];
								}
								else
									$ciencia2=0;
								if((isset($datos[$row['id_delegacion']]['ciencia3'])) && ($datos[$row['id_delegacion']]['ciencia3']!= 0))
								{
								
									$ciencia3=$datos[$row['id_delegacion']]['ciencia3'];
									$tciencia+=$datos[$row['id_delegacion']]['ciencia3'];
								}
								else
									$ciencia3=0;
								if((isset($datos[$row['id_delegacion']]['deporte3'])) && ($datos[$row['id_delegacion']]['deporte3']!= 0))//DEPORTE
								{
								
									$deporte3=$datos[$row['id_delegacion']]['deporte3'];
									$tdeporte+=$datos[$row['id_delegacion']]['deporte3'];
								
								}
								else
									$deporte3=0;
								if((isset($datos[$row['id_delegacion']]['deporte1'])) && ($datos[$row['id_delegacion']]['deporte1']!= 0))
								{
								
									$deporte1=$datos[$row['id_delegacion']]['deporte1'];
									$tdeporte+=$datos[$row['id_delegacion']]['deporte1'];
								
								}
								else
									$deporte1=0;
								if((isset($datos[$row['id_delegacion']]['deporte2'])) && ($datos[$row['id_delegacion']]['deporte2']!= 0))
								{
								
									$deporte2=$datos[$row['id_delegacion']]['deporte2'];
									$tdeporte+=$datos[$row['id_delegacion']]['deporte2'];
								
								}
								else
									$deporte2=0;
								if((isset($datos[$row['id_delegacion']]['economia1'])) && ($datos[$row['id_delegacion']]['economia1']!= 0))//ECONOMIA
								{
								
									$economia1=$datos[$row['id_delegacion']]['economia1'];
									$teconomia+=$datos[$row['id_delegacion']]['economia1'];
								}
								else
									$economia1=0;
								if((isset($datos[$row['id_delegacion']]['economia2'])) && ($datos[$row['id_delegacion']]['economia2']!= 0))
								{
								
									$economia2=$datos[$row['id_delegacion']]['economia2'];
									$teconomia+=$datos[$row['id_delegacion']]['economia2'];
								}
								else
									$economia2=0;
								if((isset($datos[$row['id_delegacion']]['economia3'])) && ($datos[$row['id_delegacion']]['economia3']!= 0))
								{
								
									$economia3=$datos[$row['id_delegacion']]['economia3'];
									$teconomia+=$datos[$row['id_delegacion']]['economia3'];
								}
								else
									$economia3=0;
								
								if((isset($datos[$row['id_delegacion']]['ambiente1'])) && ($datos[$row['id_delegacion']]['ambiente1']!= 0))//MEDIO AMBIENTE
								{
								
									$ambiente1=$datos[$row['id_delegacion']]['ambiente1'];
									$tambiente+=$datos[$row['id_delegacion']]['ambiente1'];
								}
								else
									$ambiente1=0;
								if((isset($datos[$row['id_delegacion']]['ambiente2'])) && ($datos[$row['id_delegacion']]['ambiente2']!= 0))
								{
								
									$ambiente2=$datos[$row['id_delegacion']]['ambiente2'];
									$tambiente+=$datos[$row['id_delegacion']]['ambiente2'];
								}
								else
									$ambiente2=0;
								if((isset($datos[$row['id_delegacion']]['ambiente3'])) && ($datos[$row['id_delegacion']]['ambiente3']!= 0))
								{
								
									$ambiente3=$datos[$row['id_delegacion']]['ambiente3'];
									$tambiente+=$datos[$row['id_delegacion']]['ambiente3'];
								}
								else
									$ambiente3=0;
								if((isset($datos[$row['id_delegacion']]['participacion1'])) && ($datos[$row['id_delegacion']]['participacion1']!= 0))//PARTICIPACION
								{
								
									$participacion1=$datos[$row['id_delegacion']]['participacion1'];
									$tparticipacion=$datos[$row['id_delegacion']]['participacion1'];
								
								}
								else
									$participacion1=0;
								if((isset($datos[$row['id_delegacion']]['participacion2'])) && ($datos[$row['id_delegacion']]['participacion2']!= 0))
								{
								
									$participacion2=$datos[$row['id_delegacion']]['participacion2'];
									$tparticipacion=$datos[$row['id_delegacion']]['participacion2'];
								
								}
								else
									$participacion2=0;
								if((isset($datos[$row['id_delegacion']]['participacion3'])) && ($datos[$row['id_delegacion']]['participacion3']!= 0))
								{
								
									$participacion3=$datos[$row['id_delegacion']]['participacion3'];
									$tparticipacion=$datos[$row['id_delegacion']]['participacion3'];
								
								}
								else
									$participacion3=0;
								if((isset($datos[$row['id_delegacion']]['salud3'])) && ($datos[$row['id_delegacion']]['salud3']!= 0))//SALUD
								{
								
									$salud3=$datos[$row['id_delegacion']]['salud3'];
									$tsalud=$datos[$row['id_delegacion']]['salud3'];
								
								}
								else
									$salud3=0;
								if((isset($datos[$row['id_delegacion']]['salud1'])) && ($datos[$row['id_delegacion']]['salud1']!= 0))
								{
								
									$salud1=$datos[$row['id_delegacion']]['salud1'];
									$tsalud=$datos[$row['id_delegacion']]['salud1'];
								
								}
								else
									$salud1=0;
								if((isset($datos[$row['id_delegacion']]['salud2'])) && ($datos[$row['id_delegacion']]['salud2']!= 0))
								{
								
									$salud2=$datos[$row['id_delegacion']]['salud'];
									$tsalud=$datos[$row['id_delegacion']]['salud2'];
								
								}
								else
									$salud2=0;
								echo '<td>'.$arte1.'</td><td>'.$arte2.'</td><td>'.$arte3.'</td>';
								echo '<td>'.$ciencia1.'</td><td>'.$ciencia2.'</td><td>'.$ciencia3.'</td>';
								echo '<td>'.$deporte1.'</td><td>'.$deporte2.'</td><td>'.$deporte3.'</td>';
								echo '<td>'.$economia1.'</td><td>'.$economia2.'</td><td>'.$economia3.'</td>';
								echo '<td>'.$ambiente1.'</td><td>'.$ambiente2.'</td><td>'.$ambiente3.'</td>';
								echo '<td>'.$participacion1.'</td><td>'.$participacion2.'</td><td>'.$participacion3.'</td>';
								echo '<td>'.$salud1.'</td><td>'.$salud2.'</td><td>'.$salud3.'</td></tr>';
								
								$r++;
							 	}	
							 	echo '<tr style="font-weight:bold;"><td style="border-left: 1px solid #ffffff; border-bottom:1px solid #ffffff;">&nbsp;</td><td colspan="3">'.$tarte.'</td><td colspan="3">'.$tciencia.'</td><td colspan="3">'.$tdeporte.'</td><td colspan="3">'.$teconomia.'</td><td colspan="3">'.$tambiente.'</td><td colspan="3">'.$tparticipacion.'</td><td colspan="3">'.$tsalud.'</td></tr>';
						}
						if(isset($id_tipo_reporte) && $id_tipo_reporte==3)
						{
							
						?>
						
							<table width="100%" border="1"  id="Exportar_a_Excel">
								<tr height="70px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td colspan="10" align="center" >
									INFORME GENERAL TRIMESTRAL :ESPACIOS PUBLICOS<br />
									<?php echo getMesesTrimestreLetra($trimestre);?> DE <?php echo $anio;?>
									</td>
								</tr>
								<tr height="40px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;" >
									<th width="40%">
									
									</th>
									<td width="20%" colspan="3">
									ASISTENTES ESP.
									</td>
									<td width="20%" colspan="3">
									ASISTENTES TOT.
									</td>
									<td width="20%" colspan="3" align="center" >
									NO. DE VALIDACIONES
									
									</td>
									
									
							 	</tr>
							 	<tr bgcolor="#3F7788" align="center" style="font-weight:bold; font-size:18px;">
								    <td></td>
								    <td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									
								</tr>
							 	<?php 
							 	$r=1;
							 	$valor = 0;
							 	$valor2 = 0;
							 	$valor3 = 0;
							 	$t1 =0;
							 	$t2=0;
							 	$t3=0;
							 	foreach($delegaciones as $row)
							 	{
							 	
							 		$cdel='#67A6BA';
							 		$delegacion = $row['delegacion'];
							 	
							 		echo '<tr bgcolor="'.$cdel.'" ><td align="left" style="padding-left:5px; font-weight:bold;" colspan="10">'.$delegacion.'</td></td></tr>';
							 		foreach ($espacios as $esp)
							 		{
							 			$color ='#A5D5E2';
							 			if($r%2==0)
							 				$color ='#D2EAF1';
							 		
							 			if ($esp['id_delegacion']==$row['id_delegacion']){
							 				echo '<tr bgcolor="'.$color.'"><td align="left" style="padding-left:5px;">'.$esp['espacio_publico'].'</td>';
							 				
							 				if((isset($datos[$esp['id_espacio_publico']]['esperado1'])) && ($datos[$esp['id_espacio_publico']]['esperado1']!= 0)){
							 					$esp1+= $datos[$esp['id_espacio_publico']]['esperado1'];
							 					$te1+=$esp1;
							 				}
							 				else
							 					$esp1=0;
							 				if((isset($datos[$esp['id_espacio_publico']]['esperado2'])) && ($datos[$esp['id_espacio_publico']]['esperado2']!= 0)){
							 					$esp2+= $datos[$esp['id_espacio_publico']]['esperado2'];
							 					$te2+=$esp2;
							 				}
							 				else
							 					$esp2=0;
							 				if((isset($datos[$esp['id_espacio_publico']]['esperado3'])) && ($datos[$esp['id_espacio_publico']]['esperado3']!= 0)){
							 					$esp3+= $datos[$esp['id_espacio_publico']]['esperado3'];
							 					$te3+=$esp3;
							 				}
							 				else
							 					$esp3=0;
							 					
							 				if((isset($datos[$esp['id_espacio_publico']]['asistente1'])) && ($datos[$esp['id_espacio_publico']]['asistente1']!= 0)){
							 					$as1+= $datos[$esp['id_espacio_publico']]['asistente1'];
							 					$ta1+=$as1;
							 				}
							 				else
							 					$as1=0;
							 				if((isset($datos[$esp['id_espacio_publico']]['asistente2'])) && ($datos[$esp['id_espacio_publico']]['asistente2']!= 0)){
							 					$as2+= $datos[$esp['id_espacio_publico']]['asistente2'];
							 					$ta2+=$as2;
							 				}
							 				else
							 					$as2=0;
							 				if((isset($datos[$esp['id_espacio_publico']]['asistente3'])) && ($datos[$esp['id_espacio_publico']]['asistente3']!= 0)){
							 					$as3+= $datos[$esp['id_espacio_publico']]['asistente3'];
							 					$ta3+=$as3;
							 				}
							 				else
							 					$as3=0;
							 					
								 				if((isset($datos[$esp['id_espacio_publico']]['validado1'])) && ($datos[$esp['id_espacio_publico']]['validado1']!= 0))
								 				{
								 					$valor += $datos[$esp['id_espacio_publico']]['validado1'];
								 					$t1+=$valor;								 					
								 				}
								 				else
								 					$valor=0;
							 					
								 				if((isset($datos[$esp['id_espacio_publico']]['validado2'])) && ($datos[$esp['id_espacio_publico']]['validado2']!= 0))
								 				{
								 					$valor2+= $datos[$esp['id_espacio_publico']]['validado2'];
								 					$t2+=$valor2;
								 				}
								 				else
								 					$valor2=0;
								 				if((isset($datos[$esp['id_espacio_publico']]['validado3'])) && ($datos[$esp['id_espacio_publico']]['validado3']!= 0))
								 				{
								 					$valor3+= $datos[$esp['id_espacio_publico']]['validado3'];
								 					$t3+=$valor3;
								 				}
								 				else $valor3=0;
								 				
								 			
								 				
											echo'<td>'.$esp1.'</td><td>'.$esp2.'</td><td>'.$esp3.'</td><td>'.$as1.'</td><td>'.$as2.'</td><td>'.$as3.'</td><td>'.$valor.'</td><td>'.$valor2.'</td><td>'.$valor3.'</td>';
											
										}
							 			$r++;
							 		}
							 	}
							 	$t=$t1+$t2+$t3;
							 	$te=$te1+$te2+$te3;
							 	$ta=$ta1+$ta2+$ta3;
							 	echo '<tr style="font-weight:bold;"><td  style="border-left: 1px solid #ffffff; border-bottom:1px solid #ffffff;">&nbsp;</td><td colspan=3>'.$te.'</td><td colspan=3>'.$ta.'</td><td colspan=3>'.$t.'</td></tr>';
							 		
							 	
							 	?>
							 							
   			     		<?php }
   			     		if(isset($id_tipo_reporte) && $id_tipo_reporte==4)
						{
							
						?>
						
							<table width="100%" border="1"  id="Exportar_a_Excel">
								<tr height="70px" bgcolor="#3F7788" style="font-weight:bold;  font-size:18px;">
									<td colspan="10" align="center" >
									INFORME GENERAL TRIMESTRAL: PLANTELES<br />
									<?php echo getMesesTrimestreLetra($trimestre);?> DE <?php echo $anio;?>
									</td>
								</tr>
								<tr height="40px" bgcolor="#3F7788" style="font-weight:bold;   font-size:18px;" >
									<th width="45%">
									
									</th>
									<td width="18%" colspan="3">
									ASISTENTES ESP.
									</td>
									<td width="18%" colspan="3">
									ASISTENTES TOT.
									</td>
									<td width="18%" colspan="3" align="center" >
									NO. DE VALIDACIONES
									
									</td>
									
							 	</tr>
							 	<tr bgcolor="#3F7788" align="center"   style="font-weight:bold;   font-size:18px;" >
								    <td></td>
								    <td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									
								</tr>
							 	<?php 
							 	$r=1;
							 	$valor = 0;
							 	$valor2 = 0;
							 	$valor3 = 0;
							 	$t1 =0;
							 	$t2=0;
							 	$t3=0;
							 	foreach($delegaciones as $row)
							 	{
							 	
							 		$cdel='#67A6BA';
							 		$delegacion = $row['delegacion'];
							 	
							 		echo '<tr bgcolor="'.$cdel.'" ><td align="left" style="padding-left:5px; font-weight:bold;" colspan="10">'.$delegacion.'</td></td></tr>';
							 		foreach ($planteles as $plan)
							 		{
							 			$color ='#A5D5E2';
							 			if($r%2==0)
							 				$color ='#D2EAF1';
							 		
							 			if ($plan['id_delegacion']==$row['id_delegacion']){
							 				echo '<tr bgcolor="'.$color.'"><td align="left" style="padding-left:5px;">'.$plan['plantel'].'</td>';
								 				
								 				if((isset($datos[$plan['id_plantel']]['esperado1'])) && ($datos[$plan['id_plantel']]['esperado1']!= 0))
								 				{
								 					$esp1 += $datos[$plan['id_plantel']]['esperado1'];
								 					$te1+=$esp1;
								 				}
								 				else
								 					$esp1=0;
								 				if((isset($datos[$plan['id_plantel']]['esperado2'])) && ($datos[$plan['id_plantel']]['esperado2']!= 0))
								 				{
								 					$esp2 += $datos[$plan['id_plantel']]['esperado2'];
								 					$te2+=$esp2;
								 				}
								 				else
								 					$esp2=0;
								 				if((isset($datos[$plan['id_plantel']]['esperado3'])) && ($datos[$plan['id_plantel']]['esperado3']!= 0))
								 				{
								 					$esp3 += $datos[$plan['id_plantel']]['esperado3'];
								 					$te3+=$esp3;
								 				}
								 				else
								 					$esp3=0;
								 				if((isset($datos[$plan['id_plantel']]['asistente1'])) && ($datos[$plan['id_plantel']]['asistente1']!= 0))
								 				{
								 					$as1 += $datos[$plan['id_plantel']]['asistente1'];
								 					$ta1+=$as1;
								 				}
								 				else
								 					$as1=0;
								 				if((isset($datos[$plan['id_plantel']]['asistente2'])) && ($datos[$plan['id_plantel']]['asistente2']!= 0))
								 				{
								 					$as2 += $datos[$plan['id_plantel']]['asistente2'];
								 					$ta2+=$as2;
								 				}
								 				else
								 					$as2=0;
								 				if((isset($datos[$plan['id_plantel']]['asistente3'])) && ($datos[$plan['id_plantel']]['asistente3']!= 0))
								 				{
								 					$as3 += $datos[$plan['id_plantel']]['asistente3'];
								 					$ta3+=$as3;
								 				}
								 				else
								 					$as3=0;
								 				if((isset($datos[$plan['id_plantel']]['validado1'])) && ($datos[$plan['id_plantel']]['validado1']!= 0))
								 				{
								 					$valor += $datos[$plan['id_plantel']]['validado1'];
								 					$t1+=$valor;
								 				}
								 				else
								 					$valor=0;
							 					
								 				if((isset($datos[$plan['id_plantel']]['validado2'])) && ($datos[$plan['id_plantel']]['validado2']!= 0))
								 				{
								 					$valor2+= $datos[$plan['id_plantel']]['validado2'];
								 					$t2+=$valor2;
								 				}
								 				else
								 					$valor2=0;
								 				if((isset($datos[$plan['id_plantel']]['validado3'])) && ($datos[$plan['id_plantel']]['validado3']!= 0))
								 				{
								 					$valor3+= $datos[$plan['id_plantel']]['validado3'];
								 					$t3+=$valor3;
								 				}
								 				else $valor3=0;
								 				
											echo'<td>'.$esp1.'</td><td>'.$esp2.'</td><td>'.$esp3.'</td><td>'.$as1.'</td><td>'.$as2.'</td><td>'.$as3.'</td><td>'.$valor.'</td><td>'.$valor2.'</td><td>'.$valor3.'</td>';
											
										}
							 			$r++;
							 		}
							 	}
							 	$t=$t1+$t2+$t3;
							 	$te=$te1+$te2+$te3;
							 	$ta=$ta1+$ta2+$ta3;
							 	echo '<tr style="font-weight:bold;"><td  style="border-left: 1px solid #ffffff; border-bottom:1px solid #ffffff;">&nbsp;</td><td colspan=3>'.$te.'</td><td colspan=3>'.$ta.'</td><td colspan=3>'.$t.'</td></tr>';
							 	
							 	
							 		
							 	
							 	?>
							 	</table>						
   			     		<?php }
   			     		if(isset($id_tipo_reporte) && $id_tipo_reporte==5)
						{
							
						?>
						
							<table width="100%" border="1" id="Exportar_a_Excel">
								<tr height="70px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td colspan="10" align="center" >
									INFORME GENERAL TRIMESTRAL: MUSEOS<br />
									<?php echo getMesesTrimestreLetra($trimestre);?> DE <?php echo $anio;?>
									</td>
								</tr>
								<tr height="40px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;" >
									<th width="40%">
									
									</th>
									<td width="20%" colspan="3">
									ASISTENTES ESP.
									</td>
									<td width="20%" colspan="3">
									ASISTENTES TOT.
									</td>
									<td width="20%" colspan="3" align="center" >
									NO. DE VALIDACIONES
									
									</td>
																		
							 	</tr>
							 	<tr bgcolor="#3F7788" align="center" >
								    <td></td>
								    <td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									
								</tr>
							 	<?php 
							 	$r=1; 
							 	$valor = 0;
							 	$valor2 = 0;
							 	$valor3 = 0;
							 	$t1 =0;
							 	$t2=0;
							 	$t3=0;
							 	foreach($delegaciones as $row)
							 	{
							 	
							 		$cdel='#67A6BA';
							 		$delegacion = $row['delegacion'];
							 	
							 		echo '<tr bgcolor="'.$cdel.'" ><td align="left" style="padding-left:5px; font-weight:bold;" colspan="10">'.$delegacion.'</td></td></tr>';
							 		foreach ($museos as $mus)
							 		{
							 			$color ='#A5D5E2';
							 			if($r%2==0)
							 				$color ='#D2EAF1';
							 		
							 			if ($mus['id_delegacion']==$row['id_delegacion']){
							 				echo '<tr bgcolor="'.$color.'"><td align="left" style="padding-left:5px;">'.$mus['museo'].'</td>';
								 				if((isset($datos[$mus['id_museo']]['esperado1'])) && ($datos[$mus['id_museo']]['esperado1']!= 0))
								 				{
								 					$esp1 += $datos[$mus['id_museo']]['esperado1'];
								 					$te1+=$esp1;
								 				}
								 				else
								 					$esp1=0;
								 				if((isset($datos[$mus['id_museo']]['esperado2'])) && ($datos[$mus['id_museo']]['esperado2']!= 0))
								 				{
								 					$esp2 += $datos[$mus['id_museo']]['esperado2'];
								 					$te2+=$esp2;
								 				}
								 				else
								 					$esp2=0;
								 				if((isset($datos[$mus['id_museo']]['esperado3'])) && ($datos[$mus['id_museo']]['esperado3']!= 0))
								 				{
								 					$esp3 += $datos[$mus['id_museo']]['esperado3'];
								 					$te3+=$esp3;
								 				}
								 				else
								 					$esp3=0;
								 				if((isset($datos[$mus['id_museo']]['asistente1'])) && ($datos[$mus['id_museo']]['asistente1']!= 0))
								 				{
								 					$as1 += $datos[$mus['id_museo']]['asistente1'];
								 					$ta1+=$as1;
								 				}
								 				else
								 					$as1=0;
								 				if((isset($datos[$mus['id_museo']]['asistente2'])) && ($datos[$mus['id_museo']]['asistente2']!= 0))
								 				{
								 					$as2 += $datos[$mus['id_museo']]['asistente2'];
								 					$ta2+=$as2;
								 				}
								 				else
								 					$as2=0;
								 				if((isset($datos[$mus['id_museo']]['asistente3'])) && ($datos[$mus['id_museo']]['asistente3']!= 0))
								 				{
								 					$as3 += $datos[$mus['id_museo']]['asistente3'];
								 					$ta3+=$as3;
								 				}
								 				else
								 					$as3=0;
								 				
								 				if((isset($datos[$mus['id_museo']]['validado1'])) && ($datos[$mus['id_museo']]['validado1']!= 0))
								 				{
								 					$valor += $datos[$mus['id_museo']]['validado1'];
								 					$t1+=$valor;								 					
								 				}
								 				else
								 					$valor=0;
							 					
								 				if((isset($datos[$mus['id_museo']]['validado2'])) && ($datos[$mus['id_museo']]['validado2']!= 0))
								 				{
								 					$valor2+= $datos[$mus['id_museo']]['validado2'];
								 					$t2+=$valor2;
								 				}
								 				else
								 					$valor2=0;
								 				if((isset($datos[$mus['id_museo']]['validado3'])) && ($datos[$mus['id_museo']]['validado3']!= 0))
								 				{
								 					$valor3+= $datos[$mus['id_museo']]['validado3'];
								 					$t3+=$valor3;
								 				}
								 				else $valor3=0;
								 				
								 				$total=$valor+$valor2+$valor3;
								 				
											echo'<td>'.$esp1.'</td><td>'.$esp2.'</td><td>'.$esp3.'</td><td>'.$as1.'</td><td>'.$as2.'</td><td>'.$as3.'</td><td>'.$valor.'</td><td>'.$valor2.'</td><td>'.$valor3.'</td>';
											
										}
							 			$r++;
							 		}
							 	}
							 	$t=$t1+$t2+$t3;
							 	$te=$te1+$te2+$te3;
							 	$ta=$ta1+$ta2+$ta3;
							 	echo '<tr style="font-weight:bold;"><td  style="border-left: 1px solid #ffffff; border-bottom:1px solid #ffffff;">&nbsp;</td><td colspan=3>'.$te.'</td><td colspan=3>'.$ta.'</td><td colspan=3>'.$t.'</td></tr>';
							 	
							 	?>
							 							
   			     		<?php }
   			     		if(isset($id_tipo_reporte) && $id_tipo_reporte==6)
						{
							
						?>
						
							<table width="100%" border="1"  id="Exportar_a_Excel">
								<tr height="70px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td colspan="10" align="center" >
									INFORME GENERAL TRIMESTRAL: ESCUELA ADULTOS MAYORES<br />
									<?php echo getMesesTrimestreLetra($trimestre);?> DE <?php echo $anio;?>
									</td>
								</tr>
								<tr height="40px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;" >
									<th width="40%">
									
									</th>
									<td width="20%" colspan="3">
									ASISTENTES ESP.
									</td>
									<td width="20%" colspan="3">
									ASISTENTES TOT.
									</td>
									<td width="20%" colspan="3" align="center" >
									NO. DE VALIDACIONES
									
									</td>
									
							 	</tr>
							 	<tr bgcolor="#3F7788" align="center" >
								    <td></td>
								    <td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									
								</tr>
							 	<?php 
							 	$r=1;
							 	$valor = 0;
							 	$valor2 = 0;
							 	$valor3 = 0;
							 	$t1 =0;
							 	$t2=0;
							 	$t3=0;
							 	foreach($delegaciones as $row)
							 	{
							 	
							 		$cdel='#67A6BA';
							 		$delegacion = $row['delegacion'];
							 	
							 		echo '<tr bgcolor="'.$cdel.'" ><td align="left" style="padding-left:5px; font-weight:bold;" colspan="10">'.$delegacion.'</td></td></tr>';
							 		foreach ($escuelas as $esc)
							 		{
							 			$color ='#A5D5E2';
							 			if($r%2==0)
							 				$color ='#D2EAF1';
							 		
							 			if ($esc['id_delegacion']==$row['id_delegacion']){
							 				echo '<tr bgcolor="'.$color.'"><td align="left" style="padding-left:5px;">'.$esc['escuela'].'</td>';
							 				if((isset($datos[$esc['id_escuela_adulto']]['esperado1'])) && ($datos[$esc['id_escuela_adulto']]['esperado1']!= 0))
							 				{
							 					$esp1 += $datos[$esc['id_escuela_adulto']]['esperado1'];
							 					$te1+=$esp1;
							 				}
							 				else
							 					$esp1=0;
							 				if((isset($datos[$esc['id_escuela_adulto']]['esperado2'])) && ($datos[$esc['id_escuela_adulto']]['esperado2']!= 0))
							 				{
							 					$esp2 += $datos[$esc['id_escuela_adulto']]['esperado2'];
							 					$te2+=$esp2;
							 				}
							 				else
							 					$esp2=0;
							 				if((isset($datos[$esc['id_escuela_adulto']]['esperado3'])) && ($datos[$esc['id_escuela_adulto']]['esperado3']!= 0))
							 				{
							 					$esp3 += $datos[$esc['id_escuela_adulto']]['esperado3'];
							 					$te3+=$esp3;
							 				}
							 				else
							 					$esp3=0;
							 				if((isset($datos[$esc['id_escuela_adulto']]['asistente1'])) && ($datos[$esc['id_escuela_adulto']]['asistente1']!= 0))
							 				{
							 					$as1 += $datos[$esc['id_escuela_adulto']]['asistente1'];
							 					$ta1+=$as1;
							 				}
							 				else
							 					$as1=0;
							 				if((isset($datos[$esc['id_escuela_adulto']]['asistente2'])) && ($datos[$esc['id_escuela_adulto']]['asistente2']!= 0))
							 				{
							 					$as2 += $datos[$esc['id_escuela_adulto']]['asistente2'];
							 					$ta2+=$as2;
							 				}
							 				else
							 					$as2=0;
							 				if((isset($datos[$esc['id_escuela_adulto']]['asistente3'])) && ($datos[$esc['id_escuela_adulto']]['asistente3']!= 0))
							 				{
							 					$as3 += $datos[$esc['id_escuela_adulto']]['asistente3'];
							 					$ta3+=$as3;
							 				}
							 				else
							 					$as3=0;
								 				if((isset($datos[$esc['id_escuela_adulto']]['validado1'])) && ($datos[$esc['id_escuela_adulto']]['validado1']!= 0))
								 				{
								 					$valor += $datos[$esc['id_escuela_adulto']]['validado1'];
								 					$t1+=$valor;
								 				}
								 				else
								 					$valor=0;
							 					
								 				if((isset($datos[$esc['id_escuela_adulto']]['validado2'])) && ($datos[$esc['id_escuela_adulto']]['validado2']!= 0))
								 				{
								 					$valor2+= $datos[$esc['id_escuela_adulto']]['validado2'];
								 					$t2+=$valor2;
								 				}
								 				else
								 					$valor2=0;
								 				if((isset($datos[$esc['id_escuela_adulto']]['validado3'])) && ($datos[$esc['id_escuela_adulto']]['validado3']!= 0))
								 				{
								 					$valor3+= $datos[$esc['id_escuela_adulto']]['validado3'];
								 					$t3+=$valor3;
								 				}
								 				else $valor3=0;
								 				
								 				$total=$valor+$valor2+$valor3;
								 				
											echo'<td>'.$esp1.'</td><td>'.$esp2.'</td><td>'.$esp3.'</td><td>'.$as1.'</td><td>'.$as2.'</td><td>'.$as3.'</td><td>'.$valor.'</td><td>'.$valor2.'</td><td>'.$valor3.'</td>';
											
										}
							 			$r++;
							 		}
							 	}
							 	$t=$t1+$t2+$t3;
							 	$te=$te1+$te2+$te3;
							 	$ta=$ta1+$ta2+$ta3;
							 	echo '<tr style="font-weight:bold;"><td  style="border-left: 1px solid #ffffff; border-bottom:1px solid #ffffff;">&nbsp;</td><td colspan=3>'.$te.'</td><td colspan=3>'.$ta.'</td><td colspan=3>'.$t.'</td></tr>';
							 	
							 	?>
							 							
   			     <?php  }
   			     		if(isset($id_tipo_reporte) && $id_tipo_reporte==7)
						{
							?>
						
							<table width="100%" border="1"  id="Exportar_a_Excel">
								<tr height="70px" bgcolor="#3F7788" style="font-weight:bold; font-size:18px;">
									<td colspan="11" align="center" >
									INFORME GENERAL TRIMESTRAL: TIPO ACTIVIDAD<br />
									<?php echo getMesesTrimestreLetra($trimestre);?> DE <?php echo $anio;?>
									</td>
								</tr>
								<tr height="40px" bgcolor="#3F7788" style="font-weight:bold; font-size:14px;" >
									<td width="20%" rowspan="2" >EJE TEMÁTICO</td>
									<td width="20%" rowspan="2">TIPO ACTIVIDAD</td>
									<td width="20%" align="center" colspan="3">ACTIVIDADES</td>
									<td width="20%" align="center" colspan="3">#ASISTETES E.</td>
									<td width="20%" align="center" colspan="3">#ASISTETES R.</td>
									
							 	</tr>
							 	<tr height="40px" bgcolor="#3F7788" style="font-weight:bold; font-size:12px;">
							 		
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
									<td align="center">01</td>
								    <td align="center">02</td>
									<td align="center">03</td>
							 	</tr>
							 	
						<?php 
							$r=0;
							$mes1=0;
							$mes2=0;
							$mes3=0;
							foreach ($eje as $row){
								$color ='#A5D5E2';
							 			if($r%2==0)
							 				$color ='#D2EAF1';
							 	$r++;
								$eje = $row['eje_tematico'];
									
								echo '<tr bgcolor="'.$color.'" ><td align="left" style="padding-left:5px; font-weight:bold; border-bottom: thin solid;" >'.$eje.'</td>';
								echo '<td align="left"  style="padding-left:0px;"><ul style="list-style-type:none">';
								foreach ($actividad[$row['id_eje']] as $act){
									
									if ($row['id_eje']==$act['id_eje']){
											
										echo '<li>'.$act['tipo_actividad'].'</li>';
									}
								
								}
								
								echo '</ul></td>';
								echo '<td align="left"  style="padding-left:0px;"><ul style="list-style-type:none">';
								
								foreach ($actividad[$row['id_eje']] as $act){
									if ($cuenta[$act['id_actividad']]['Actmes1']['id_tipo_actividad'] == $act['id_actividad'] && $cuenta[$act['id_actividad']]['Actmes1']['val'] != 0 ){
										$mes1=$cuenta[$act['id_actividad']]['Actmes1']['val'];
										echo '<li>'.$mes1.'</li>';	
									}
									else
										echo '<li>0</li>';
							
								
								}	 
								
								echo '</ul></td>';
								echo '<td align="left"  style="padding-left:0px;"><ul style="list-style-type:none">';
								foreach ($actividad[$row['id_eje']] as $act){
									if ($cuenta[$act['id_actividad']]['Actmes2']['id_tipo_actividad'] == $act['id_actividad'] && $cuenta[$act['id_actividad']]['Actmes2']['val'] != 0 ){
										$mes2=$cuenta[$act['id_actividad']]['Actmes2']['val'];
										echo '<li>'.$mes2.'</li>';
									}
									else
										echo '<li>0</li>';
								  $t2+=$mes2;
								}
								
								echo '</ul></td>';
								echo '<td align="left"  style="padding-left:0px;"><ul style="list-style-type:none">';
								foreach ($actividad[$row['id_eje']] as $act){
									if ($cuenta[$act['id_actividad']]['Actmes3']['id_tipo_actividad'] == $act['id_actividad'] && $cuenta[$act['id_actividad']]['Actmes3']['val'] != 0 )
										echo '<li>'.$cuenta[$act['id_actividad']]['Actmes3']['val'].'</li>';
										
									else
										echo '<li>0</li>';
								
								}
								
								echo '</ul></td>';
								echo '<td align="left"  style="padding-left:0px;"><ul style="list-style-type:none">';
								foreach ($actividad[$row['id_eje']] as $act){
									if ($cuenta[$act['id_actividad']]['Asismes1']['id_actividad'] == $act['id_actividad'] && $cuenta[$act['id_actividad']]['Asismes1']['esperados'] != 0 )
										echo '<li>'.$cuenta[$act['id_actividad']]['Asismes1']['esperados'].'</li>';
								
									else
										
										echo '<li>0</li>';
								
								}
								
								echo '</ul></td>';
								echo '<td align="left"  style="padding-left:0px;"><ul style="list-style-type:none">';
								foreach ($actividad[$row['id_eje']] as $act){
									if($cuenta[$act['id_actividad']]['Asismes2']['id_actividad'] == $act['id_actividad'] && $cuenta[$act['id_actividad']]['Asismes2']['esperados'] != 0 )
										echo '<li>'.$cuenta[$act['id_actividad']]['Asismes2']['esperados'].'</li>';
									else
										echo '<li>0</li>';
									
								}
								
								$r++;
								echo '</ul></td>';
								echo '<td align="left"  style="padding-left:0px;"><ul style="list-style-type:none">';
								foreach ($actividad[$row['id_eje']] as $act){
									if ($cuenta[$act['id_actividad']]['Asismes3']['id_actividad'] == $act['id_actividad'] && $cuenta[$act['id_actividad']]['Asismes3']['esperados'] != 0 )
										echo '<li>'.$cuenta[$act['id_actividad']]['Asismes3']['esperados'].'</li>';
								
									else
										echo '<li>0</li>';
								
								}
								
								echo '</ul></td>';
								echo '<td align="left"  style="padding-left:0px;"><ul style="list-style-type:none">';
								foreach ($actividad[$row['id_eje']] as $act){
									if ($cuenta[$act['id_actividad']]['Asismes1']['id_actividad'] == $act['id_actividad'] && $cuenta[$act['id_actividad']]['Asismes1']['no_asistentes'] != 0 )
										echo '<li>'.$cuenta[$act['id_actividad']]['Asismes1']['no_asistentes'].'</li>';
								
									else
										echo '<li>0</li>';
								
								}
								
								echo '</ul></td>';
								echo '<td align="left"  style="padding-left:0px;"><ul style="list-style-type:none">';
								foreach ($actividad[$row['id_eje']] as $act){
									if ($cuenta[$act['id_actividad']]['Asismes2']['id_actividad'] == $act['id_actividad'] && $cuenta[$act['id_actividad']]['Asismes2']['no_asistentes'] != 0 )
										echo '<li>'.$cuenta[$act['id_actividad']]['Asismes2']['no_asistentes'].'</li>';
								
									else
										echo '<li>0</li>';
								
								}
								
								echo '</ul></td>';
								echo '<td align="left"  style="padding-left:0px;"><ul style="list-style-type:none">';
								foreach ($actividad[$row['id_eje']] as $act){
									if ($cuenta[$act['id_actividad']]['Asismes3']['id_actividad'] == $act['id_actividad'] && $cuenta[$act['id_actividad']]['Actmes3']['no_asistentes'] != 0 )
										echo '<li>'.$cuenta[$act['id_actividad']]['Asismes3']['no_asistentes'].'</li>';
								
									else
										echo '<li>0</li>';
								
								}
								$r++;
								echo '</ul></td></tr>';
								
							}
							echo '<tr style="font-weight:bold;"><td colspan=2 style="border-left: 1px solid #ffffff; border-bottom:1px solid #ffffff;"></td><td colspan=3>'.$sumaAct['suma'].'</td><td colspan=3>'.$sumaEsp['suma'].'</td><td colspan=3>'.$sumaReal['suma'].'</td></tr>';
						?>
							 	
							 	
							 		
							</table>
					<?php }?>	
					
   			     	</div>
   			     </div>
   			 </div>
   		</div>
</section>