<link rel='stylesheet' href='resources/styles/theme.css' />
<link href='resources/styles/fullcalendar.css' rel='stylesheet' />
<link href='resources/styles/fullcalendar.print.css' rel='stylesheet' media='print' />
<!-- <script src='resources/scripts/moment.min.js'></script>  --> 

<script src='resources/scripts/fullcalendar.min.js'></script>  


    <?php
    //metemos dos blancos para empatar los ids con el catálogo
    $colors = array(
    		'#ffffff',
    		'#ffffff',
    		'#F80A17', 
			'#A809EE', 
			'#61093A', 
			'#E6CF2B', 
			'#E11486', 
			'#E659A8', 
			'#069400', 
			'#1CE114', 
			'#00BDB6', 
			'#AE3321', 
			'#7B443C', 
			'#88E54E', 
			'#1886F0', 
			'#941C5F', 
			'#068794', 
			'#FEB614', 
			'#B72259');

   /* $delegacion = array();
    foreach($delegaciones as $row)
    {
    	$delegacion[$row['id_delegacion']] = $row['delegacion'];
    }*/

  
   $eventos = array();
            
   foreach($registros as $valor)
   {
   
   		$eventos[] = "{title: '[".$valor['siglas'].'] '.$valor['descripcion']."', start: '".$valor['fecha_inicio']."', end: '".$valor['fecha_fin']."', backgroundColor:'" . $colors[$valor['id_delegacion']] . "', url:'index.php/director/detalleEvento/".$valor['id_evento']."'}";
   
   }
    /*$eventos[] = "{ title: 'evento1', start: '2015-09-21', end: '2015-09-25', url:'index.php/director/detalleEvento/1'}";
    $eventos[] = "{ title: 'evento2', start: '2015-09-18T10:30:00', end: '2015-09-18T13:00:00', url:'index.php/director/detalleEvento/2'}";
    $eventos[] = "{ title: 'evento3', start: '2015-09-29T10:30:00', url:'index.php/director/detalleEvento/2'}";*/
    $ev = implode(",",$eventos);
    
   

    ?>



<script>
    

    $(document).ready(function()
    {	              
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
		
        $('#calendar').fullCalendar({
        theme: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        editable: false,            
        events: [               
			<?php echo $ev; ?>
        ]
    });

       
		
    });

</script>
<style>
  
    #calendar {
        width: 800px;
        margin: 0 auto;
    }

</style>

<br /><br />
<div style="display:block; text-align:center;">

	<div id="calendar" style="display:inline-block;"></div>
	
	<div style="display:inline-block; vertical-align:top; padding-left:20px;">
		<table width="170px" border="0" style="font-size:11px; border:1px solid #999999;">
			<tr>			
				<td colspan="2" align="center" bgcolor="#999999" style="color:#ffffff;"><strong>DELEGACIÓN</strong></td>
			</tr>
			<?php 
			foreach($delegaciones as $row)
			{
			?>	
			<tr>
				<td bgcolor="<?php echo $colors[$row['id_delegacion']]; ?>">&nbsp;</td>
				<td width="140px" align="left" style="padding-left:5px;"><?php echo $row['delegacion']; ?></td>
			</tr>
				
			<?php 
			}
							
			?>
		
		</table>
	</div>
</div> 
