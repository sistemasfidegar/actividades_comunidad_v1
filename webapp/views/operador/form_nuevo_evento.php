<script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDB2X_xfuwffmcKei_-IQGwbWX4MpaOQjk&sensor=false">
</script>

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

<script type="text/javascript">
//Declaramos las variables que vamos a user
var lat = null;
var lng = null;
var map = null;
var geocoder = null;
var marker = null;


         
jQuery(document).ready(function(){

	$('#hora_inicio').timepicker({
		'minTime': '09:00',
		'maxTime': '15:00',
		'showDuration': false,
		'timeFormat': 'H:i',
		'step': 60
	});
	
     //obtenemos los valores en caso de tenerlos en un formulario ya guardado en la base de datos
     lat = jQuery('#latbox').val();
     lng = jQuery('#lonbox').val();
     
     //Asignamos al evento click del boton la funcion codeAddress
   
     jQuery('#id_lugar').change(function()
     {

	     if($('#id_tipo_lugar').val()!="0" && $('#id_lugar').val()!="0")
	     {			    			       
	     	codeAddress();
	     }
	    
        return false;
     });

  	     
     //Inicializamos la función de google maps una vez el DOM este cargado
    xz();
    
});
     
    function xz()
    {
     
      geocoder = new google.maps.Geocoder();
        
      //Si hay valores creamos un objeto Latlng
      if(lat !='' && lng != '')
      {
         var latLng = new google.maps.LatLng(lat,lng);
      }
      else
      {
         var latLng = new google.maps.LatLng(19.432612, -99.133269);

      }
	      
      //Definimos algunas opciones del mapa a crear
       var myOptions = {
          center: latLng,//centro del mapa
          zoom: 16,//zoom del mapa              
          //zoomControl: true,
          disableDefaultUI: true,
          //zoomControlOptions: {style: google.maps.ZoomControlStyle.large},
          mapTypeId: google.maps.MapTypeId.ROADMAP //tipo de mapa, carretera, híbrido,etc
        };
        
        //creamos el mapa con las opciones anteriores y le pasamos el elemento div
        map = new google.maps.Map(document.getElementById("map"), myOptions);
        
         
        //creamos el marcador en el mapa
        marker = new google.maps.Marker({
            map: map,//el mapa creado en el paso anterior
            position: latLng,//objeto con latitud y longitud
            draggable: true, //que el marcador se pueda arrastrar
            icon:'resources/images/point_ps.png'
        });
        
       //función que actualiza los input del formulario con las nuevas latitudes
       //Estos campos suelen ser hidden
        //computepos(latLng);

        google.maps.event.addListener(marker, 'dragend', function(){
            updatePosition(marker.getPosition());
        });  
         
    }
     
    //funcion que traduce la direccion en coordenadas
    function codeAddress()
        {
        	var delegacion = '';
        	 var tipo = $('#id_tipo_lugar').val();
        	 var lugar = $('#id_lugar').val();

    	     
    			     
        	 jQuery.ajax({
    	            type: 'post',
    	            dataType: 'html',
    	            url: 'index.php/operador/getDireccionMapa/'+lugar+'/'+tipo,
    	            data: {id_lugar: lugar, id_tipo_lugar:lugar},
    	            success: function (data) {
    	                direccion = data;	

    	                if(direccion !='')
    	            	{
    	            		//obtengo la direccion del formulario
    	            		var address = direccion;

	            		 //hago la llamada al geodecoder
	        	        geocoder.geocode({'address': address}, function(results, status)
			        	{
	        	         
	        			        //si el estado de la llamado es OK
	        			      if(status == google.maps.GeocoderStatus.OK)
		        			  {
	        			            //centro el mapa en las coordenadas obtenidas
	        			            map.setCenter(results[0].geometry.location);
	        			            //coloco el marcador en dichas coordenadas
	        			            marker.setPosition(results[0].geometry.location);
	        			            //actualizo el formulario      
	        			            updatePosition(results[0].geometry.location);
	        			             
	        			            //Añado un listener para cuando el markador se termine de arrastrar
	        			            //actualize el formulario con las nuevas coordenadas
	        			            google.maps.event.addListener(marker, 'dragend', function(){
	        			                updatePosition(marker.getPosition());
	        			            });
	        			      }
	        				  else
	        				  {
	        			          //si no es OK devuelvo error
	        			          //alert("No podemos encontrar la dirección, error: " + status);
	        			         // jAlert("Asegurate de haber seleccionado al menos la delegación y la colonia.", "Importante");
	        			      }
	        	    	});
	                }
	            	else
	            	{
	            		updatePosition(marker.getPosition());
	                }               
	            }
	        });

    	
        //alert(delegacion);

  }
   
  //funcion que simplemente actualiza los campos del formulario
  function updatePosition(latLng)
  {	       
      jQuery('#latbox').val(latLng.lat());
      jQuery('#lonbox').val(latLng.lng());	   
  }
      
      function computepos(point)
      {
            var latA = Math.abs(Math.round(point.lat() * 1000000.));
            var lonA = Math.abs(Math.round(point.lng() * 1000000.));
            if (point.lat() < 0)
            {
                var ls = '-' + Math.floor((latA / 1000000)).toString();
            }
            else
            {
                var ls = Math.floor((latA / 1000000)).toString();
            }
            var lm = Math.floor(((latA / 1000000) - Math.floor(latA / 1000000)) * 60).toString();
            var ld = (Math.floor(((((latA / 1000000) - Math.floor(latA / 1000000)) * 60) - Math.floor(((latA / 1000000) - Math.floor(latA / 1000000)) * 60)) * 100000) * 60 / 100000).toString();
            if (point.lng() < 0)
            {
                var lgs = '-' + Math.floor((lonA / 1000000)).toString();
            }
            else
            {
                var lgs = Math.floor((lonA / 1000000)).toString();
            }
            var lgm = Math.floor(((lonA / 1000000) - Math.floor(lonA / 1000000)) * 60).toString();
            var lgd = (Math.floor(((((lonA / 1000000) - Math.floor(lonA / 1000000)) * 60) - Math.floor(((lonA / 1000000) - Math.floor(lonA / 1000000)) * 60)) * 100000) * 60 / 100000).toString();
            document.getElementById("latbox").value = point.lat().toFixed(6);
            //document.getElementById("latboxm").value = ls;
            //document.getElementById("latboxmd").value = lm;
            //document.getElementById("latboxms").value = ld;
            document.getElementById("lonbox").value = point.lng().toFixed(6);
            //document.getElementById("lonboxm").value = lgs;
            //document.getElementById("lonboxmd").value = lgm;
            //document.getElementById("lonboxms").value = lgd;
       }
</script> 
     
<script>
$().ready(function () {

	$( document ).tooltip({
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

	 var rules_form = {
		        rules: {
		        	id_tipo: "selectNone",
		        	id_responsable: "selectNone",
		        	id_eje: "selectNone",
		        	id_coordinacion: "selectNone",
		        	id_seriada: "selectNone",
		        	id_tipo_lugar: "selectNone",
		        	id_lugar: "selectNone",		           
		        	descripcion: "required",
		        	fecha_inicio: "required",
		        	fecha_fin: "required",
		        	hora_inicio: "required",
		        	num_horas: "required",
		        	noAsistentes: "required",
		        	noPromotores: "required",
		        	noCoordinadores: "required",		                   
		            "involucrados[]": "required"
		           
		            
		        },
		        messages: {
		        	descripcion: {required: "Campo obligatorio"},
		        	fecha_inicio: {required: "Campo obligatorio"},
		        	fecha_fin: {required: "Campo obligatorio"},
		        	hora_inicio: {required: "Campo obligatorio"},
		        	num_horas: {required: "Campo obligatorio"},
		        	noAsistentes: {required: "Campo obligatorio"},
		        	noPromotores: {required: "Campo obligatorio"},
		        	noCoordinadores: {required: "Campo obligatorio"},
		            "involucrados[]": {required: "Debe seleccionar una o más opciones"}
		           
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

	function irA(uri) {
        window.location.href = '<?php echo base_url(); ?>' + uri;
    }

	$("#id_tipo").change(function () {
        var tipo = $("#id_tipo option:selected").val();
        if (tipo == 2)
        {
            $("#div_involucrados").show('slow');            
        }
        else
        {
            $("#div_involucrados").hide('slow');            
        }
    });


	$("#id_tipo_lugar").change(function () {
        var tipo = $("#id_tipo_lugar option:selected").val();

        //plantel
        if(tipo == 1)
        {
        	$("#id_lugar").html('<option value="0">Cargando...</option>');
        	jQuery.ajax({
	            type: 'post',
	            dataType: 'html',
	            url: 'index.php/operador/ajaxGetPlanteles',
	            data: {operacion: 'ajax'},
	            success: function (data) {
	                $("#id_lugar").html(data);	               
	            }
	        });
	        
                        
        }        
        else if(tipo == 2)
        {            
        	$("#id_lugar").html('<option value="0">Cargando...</option>');
        	jQuery.ajax({
	            type: 'post',
	            dataType: 'html',
	            url: 'index.php/operador/ajaxGetEspacios',
	            data: {operacion: 'ajax'},
	            success: function (data) {
	                $("#id_lugar").html(data);	               
	            }
	        });            
        }else if(tipo == 3)
        {            
        	$("#id_lugar").html('<option value="0">Cargando...</option>');
        	jQuery.ajax({
	            type: 'post',
	            dataType: 'html',
	            url: 'index.php/operador/ajaxGetMuseos',
	            data: {operacion: 'ajax'},
	            success: function (data) {
	                $("#id_lugar").html(data);	               
	            }
	        });            
        }
        else if(tipo == 4)
        {            
        	$("#id_lugar").html('<option value="0">Cargando...</option>');
        	jQuery.ajax({
	            type: 'post',
	            dataType: 'html',
	            url: 'index.php/operador/ajaxGetEscuela',
	            data: {operacion: 'ajax'},
	            success: function (data) {
	                $("#id_lugar").html(data);	               
	            }
	        });            
        }
        else
        {
        	$("#id_lugar").html('<option value="0">[Seleccionar]</option>');
        }
        
    });

	 $(".dateP").datepicker({
         language: 'es',
         format: 'dd/mm/yyyy',
         defaultDate: "05/10/2015",
         autoclose: true
     });

    

  
    	   
    	  

	 $("#num_horas").numeric({decimal: true, negative: false});
	 $("#noAsistentes").numeric();
	 $("#noPromotores").numeric();
	 $("#noCoordinadores").numeric();
	 $("#cantidad").numeric();

		    
    


	$("#registro").validate(rules_form);

    
	$("#guardar").click(function ()
	{ 
		
		 if($('#registro').valid())
	     {
			 $.blockUI({message: 'Procesando por favor espere...'});
             $.ajax({
                 type: 'POST',
                 url: $('#registro').attr("action"),
                 data: $('#registro').serialize(),
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
                          		irA('operador/listado');
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
                         		 irA('operador/listado');
                         	  } 
                         	});
                     }
                 }
             });
         }

     });

    $('#agregar').click(function(){

		$('#tblLogistica tr:last').after('<tr><td>'+
	            '<div class="col-md-6">'+      
		     		'<div class="form-group">'+
		     				            	
		            	'<div class="form-group" id="logistica" >'+
					            '<select name="logistica[]" id="logistica[]" class="form-control">'+
					            	'<option value="0">[Seleccionar]</option>'+		            		
						            <?php foreach ($logistica as $value){	?>
					            	'<option value="<?php echo $value['id_logistica'];?>"><?php echo $value['logistica']; ?></option>'+			                  
					                <?php }?>				            
			            	'</select>'+
			            '</div>'+		            
		            '</div>'+
		         '</div>'+
		         
		        '<div class="col-md-6">'+      
		     		'<div class="form-group">'+
		            	
		            	'<div class="form-group" id="logistica">'+
					            '<input type="text" name="cantidad[]" id="cantidad" value="" class="form-control" maxlength="4">'+
			            '</div>'+	            
		            '</div>'+
	           '</div>'+
	           '</td></tr>');
    });


});

function irA(uri) {
        window.location.href = '<?php echo base_url(); ?>' + uri;
    }
</script>
<section class="content">

 		<form id="registro" name="registro" method="post" action="index.php/operador/guardaEvento">
 		<input type="hidden" name="latbox" id="latbox" value="19.432571529390096" />
 		<input type="hidden" name="lonbox" id="lonbox" value="-99.13318316931151" />
 		
		<div class="row">        	
        	<div class="col-md-6">
        	<legend>Información del nuevo evento</legend>
                <div class="box box-solid box-success" style="text-align:left !important; min-height:260px; height:100%;">
   			     	<div class="box-body">
   			     	
			            <div class="form-group">
			            <!--  	<label>Persona que reporta la actividad:</label>
				            <select name="id_responsable" id="id_responsable" class="form-control">
			            		<option value="0">[Seleccionar]</option>
					            <?php foreach ($responsable as $value){	?>
				            	<option value="<?php echo $value['id_usuario'];?>"><?php echo $value['usuario']; ?></option>				                  
				            <?php }?>				            
			            	</select>
			           -->
			            </div>
			            <div class="form-group">
			            	<label>Responsable Actividad:</label>
				            <input type="text" name="res_actividad" id="res_actividad" value="" class="form-control">
			            </div>
			            <div class="form-group">
			            	<label>Eje temático:</label>
				            <select name="id_eje" id="id_eje" class="form-control" >
				            		<option value="0">[Seleccionar]</option>
						             <?php foreach ($ejes as $value){	?>
						            	<option value="<?php echo $value['id_eje'];?>"><?php echo $value['eje_tematico']; ?></option>				                  
						            <?php }?>		            
				            </select>
			            </div>
			            <div class="form-group">
			            	<label>Tipo actividad:</label>
				            <select name="id_actividad" id="id_actividad" class="form-control" >
			            		<option value="0">[Seleccionar]</option>
					            <?php foreach ($actividad as $value){	?>
				            	<option value="<?php echo $value['id_tipo_actividad'];?>"><?php echo $value['tipo_actividad']; ?></option>				                  
				            <?php }?>	
					            				            
			            	</select>
			            </div>
			            <div class="form-group">
			            	<label>Coordinación Interinstitucional:</label>
				            <select name="id_coordinacion" id="id_coordinacion" class="form-control" >
				            		<option value="0">[Seleccionar]</option>
				            		 <?php foreach ($coordinaciones as $value){	?>
						            	<option value="<?php echo $value['id_coordinacion'];?>"><?php echo $value['coordinacion']; ?></option>				                  
						            <?php }?>		            
				            </select>
			            </div>
			            
   			     		<div class="form-group">
			            	<label>Descripción del Evento: </label>				            
				            <textarea name="descripcion" id="descripcion" class="form-control"/></textarea>
			            </div>
			            			            			               			     					            			            			           		             			           
			            <div class="form-group">
			            	<label>Actividad Seriada:</label>
				            <select name="id_seriada" id="id_seriada" class="form-control" >
				            	<option value="2">No</option>
			            		<option value="1">Si</option>						            					            				           
			            	</select>
			            </div>
			             
			             <div class="row">
			             	<div style="text-align:right; padding-right:15px;">
			             		<input type="button" id="agregar" class="btn btn-danger btn-sm" value="Agregar logística">
			             	</div>
			             	<table id="tblLogistica" width="100%" border="0">
			             		<tr>
				             		<td>
						            <div class="col-md-6">      
							     		<div class="form-group">
							     			<label>Logística del evento:</label>			            	
							            	<div class="form-group" id="logistica" >
										            <select name="logistica[]" id="logistica[]" class="form-control">
										            	<option value="0">[Seleccionar]</option>			            		
											            <?php foreach ($logistica as $value){	?>
										            	<option value="<?php echo $value['id_logistica'];?>"><?php echo $value['logistica']; ?></option>				                  
										            <?php }?>				            
								            	</select>
								            </div>		            
							            </div>
							         </div>
							         
							        <div class="col-md-6">      
							     		<div class="form-group">
							     			<label>Cantidad:</label>			            	
							            	<div class="form-group" id="logistica" >
										         <input type="text" name="cantidad[]" id="cantidad" value="" class="form-control" maxlength="4">
								            </div>		            
							            </div>
						           </div>
						           </td>
					           </tr>
					        </table>
					        				         
			            </div>
			            
			        <legend>Valores esperados</legend>			         	           
		       		<div class="row">		            	
		            	<div class="col-md-4">
			              <label>Asistentes:</label>
				          <input type="text" name="noAsistentes" id="noAsistentes" value="" class="form-control" maxlength="4">
			            </div>
			            
			            <div class="col-md-4">
			              <label>Coordinadores:</label>
				          <input type="text" name="noCoordinadores" id="noCoordinadores" value="" class="form-control" maxlength="4">
			            </div>	
			            
			            <div class="col-md-4">
			              <label>Promotores:</label>
				          <input type="text" name="noPromotores" id="noPromotores" value="" class="form-control" maxlength="4">
			            </div>
			            			            		            			            						
		            </div>				
			            
			     	</div>
	            </div>
	       </div>
	       
	       <div class="col-md-6">
	       <legend>Ubicación del evento</legend>
	       	<div class="box box-solid box-success" style="text-align:left !important; min-height:260px; height:100%;">
	       		<div class="box-body">
	       			       					           
		            <div class="form-group" id="div_involucrados" style="display:none;">
			            	<label>Delegaciones Involucradas:</label>
				            <select name="involucrados[]" id="involucrados[]" class="form-control" multiple size="6">			            		
					            <?php foreach ($delegaciones as $value){	?>
				            	<option value="<?php echo $value['id_delegacion'];?>"><?php echo $value['delegacion']; ?></option>				                  
				            <?php }?>				            
		            	</select>
		            </div>
		            
		             <div class="form-group">
		            	<label>Lugar del evento:</label>
			            <select name="id_tipo_lugar" id="id_tipo_lugar" class="form-control" >
			            		<option value="0">[Seleccionar]</option>
					            <option value="1">Plantel</option>
					            <option value="2">Espacio Público</option>
					            <option value="3">Museo</option>
					            <option value="4">Escuela Adultos</option>				            
			            </select>
			            				          
		            </div>
		            
		     		<div class="form-group" id="sede">
		            	<select name="id_lugar" id="id_lugar" class="form-control" >
			            		<option value="0">[Seleccionar]</option>					            	            
			            </select>				            
		            </div>
		            <fieldset><legend class="titulos">Ubica aquí la dirección de la actividad<br />
				        <sub>(Si el mapa no refresca correctamente mueve la ruedita del mouse para hacer zoom)</sub>
				        </legend>				        
				    </fieldset>
		           	<div class="row">		            		 
		                <div class="col-md-12">
				            <div id="map" style="min-width: 500px; width:100% !important; min-height: 200px; height:300px;"></div>
				        </div>
                    </div> 
		            <br>
		           
		            <div class="row">
			            <div class="col-md-4">
			              <label>Fecha de inicio:</label>
				            <div class="input-group" style="width:135px;">
		                        <div class="input-group-addon">
		                        	<i class="fa fa-calendar"></i>
		                        </div>
		                        <input name="fecha_inicio" id="fecha_inicio" type="text" value=""  class="form-control pull-right dateP" onFocus="this.blur();"/>
	                        </div>
			            </div>
			           <div class="col-md-4">
			              	<label>Hora de inicio:</label>				            
		                    <input name="hora_inicio" id="hora_inicio" value="" class="form-control" type="text" onFocus="this.blur();"/>
	                        
			            </div>
			            
			            <div class="col-md-4">
				             <label>Horas:</label>
				             <input type="text" name="num_horas" id="num_horas" value="" class="form-control" maxlength="2"/>
			            </div>
			           <!--   <div  class="col-md-6">
			              <label>Fecha de conclusión:</label>
				            <div class="input-group" style="width:135px;">
		                        <div class="input-group-addon">
		                        	<i class="fa fa-calendar"></i>
		                        </div>
		                        <input name="fecha_fin" id="fecha_fin" type="text" value="" class="form-control pull-right dateP" onFocus="this.blur();"/>
	                        </div>
			            </div>-->
			         </div>
			         
			         <br />
			      <!--   <div class="row">
			            <div class="col-md-6">
			              	<label>Hora de inicio:</label>				            
		                    <input name="hora_inicio" id="hora_inicio" value="" class="form-control" type="text" onFocus="this.blur();"/>
	                        
			            </div>
			            
			            <div class="col-md-6">
				             <label>Horas:</label>
				             <input type="text" name="num_horas" id="num_horas" value="" class="form-control" maxlength="2"/>
			            </div>
			         </div>  -->
		         </div>
		         
		          <br />
		         <div class="box-footer" style="text-align: right;" >
     				<button id="guardar" name="guardar" type="button" class="btn btn-primary">Guardar</button>&nbsp;&nbsp;
					<button id="cancelar" name="cancelar" type="button" class="btn btn-small" onclick="irA('index.php/operador/listado')">Cancelar</button>
     			</div>
	          </div>
	       </div>
	       
	      
	  </div>
        
	</form>
</section>


