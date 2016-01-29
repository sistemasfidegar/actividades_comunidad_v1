<script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDB2X_xfuwffmcKei_-IQGwbWX4MpaOQjk&sensor=false">
</script>
    
<script src="resources/js/date.js"></script>
 
<script>
 /*****CARGA DE ARCHIVO****/ 
$().ready(function () {
        	$("#progressBar").hide();
             
     	    $("#archivo").change(function() {
     		    
     	        var cadena = $("#archivo").val();	        
     	        extension = (cadena.substring(cadena.lastIndexOf("."))).toLowerCase();
     	             	        						
                 if('.exe' != extension && '.php' != extension && '.js' != extension)
                 {
     	            $("#progressBar").show();
     	            cargArchivo();	                
                 }
                 	            
     	    });
});
     
        	function _(el){
 	            return document.getElementById(el);
 	        }

         	function cargArchivo()
             {
                     var file = _("archivo").files[0];
                     var id = document.getElementById("id_evento1").value;
                     //var n_ds = _("nombre_ds").value;
                     //alert (file.name + " | " + file.size + " | " + file.type);
                     var formdata = new FormData();
                     formdata.append("archivo", file);
                     formdata.append("id_evento", id);
                     //formdata.append("nombre_ds",n_ds);
                     var ajax = new XMLHttpRequest();
                     ajax.upload.addEventListener("progress", progressHandler, false);
                     ajax.addEventListener("load", completeHandler, false);
                     ajax.addEventListener("error", errorHandler, false);
                     ajax.addEventListener("abort", abortHandler, false);
                     ajax.open("POST", "index.php/operador/save_foto"); //hay que crear una funcion que lo procese
                     ajax.send(formdata);
             }

             function progressHandler(event)
             {
             	_("loaded_n_total").innerHTML = "Cargando " + event.loaded + " bytes de " + event.total;
                 var porciento = (event.loaded / event.total) * 100;
                 _("progressBar").value = Math.round(porciento);
                 _("status").innerHTML = Math.round(porciento) + "% Cargado"; 
                                                   
             }
             
             function completeHandler(event)
             {
             	_("status").innerHTML = event.target.responseText;
                 _("progressBar").value = 100;
               //  $('#archivo').attr('disabled', true);   
               		location.reload();              
                 var file = _("archivo").files[0];            
                 $("#nombre_archivo").val(file.name);
                
                 
                     
             }
             
             function errorHandler(event)
             {
                 _("status").innerHTML = "Carga Erronea";
             }
             
             function abortHandler(event)
             {
                 _("status").innerHTML = "Carga cancelada";
             }
</script>

 <style>
        
 	  		
  		div.upload {
		    width: 95%;
		    height: 99px;
		    background: url('resources/images/btn_adjuntar.png') no-repeat;
		    overflow: hidden;
		    text-align:left;
		}
		
		div.upload input {
		    display: block !important;
		    width: 157px !important;
		    height: 57px !important;
		    opacity: 0 !important;
		    overflow: hidden !important;
		    text-align:left;
		}
		
</style>
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
	        			          jAlert("Asegurate de haber seleccionado al menos la delegación y la colonia.", "Importante");
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
function recargar_mapa(){
    x=$(location).attr('href', 'index.php/operador/area_atencion#nuevo');
     location.reload();
}
</script>     
<script>
function recargar_mapa(){
    x=$(location).attr('href', 'index.php/operador/area_atencion#nuevo');
     location.reload();
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
		        	//fecha_fin: "required",
		        	hora_inicio: "fecha_valida",
		        	num_horas: "required",
		        	noAsistentes: "required",
		        	noPromotores: "required",
		        	noCoordinadores: "required",
		        	Asistentes: "required",
		        	Promotores: "required",
		        	Coordinadores: "required",
		        	noValidado: "required",
		        	nombre:"required",		                   
		            "involucrados[]": "required"
		           
		            
		        },
		        messages: {
		        	descripcion: {required: "Campo obligatorio"},
		        	fecha_inicio: {required: "Campo obligatorio"},
		        	//fecha_fin: {required: "Campo obligatorio"},
		        	hora_inicio: {required: "Campo obligatorio"},
		        	num_horas: {required: "Campo obligatorio"},
		        	noAsistentes: {required: "Campo obligatorio"},
		        	noPromotores: {required: "Campo obligatorio"},
		        	noCoordinadores: {required: "Campo obligatorio"},
		        	Asistentes: {required: "Campo obligatorio"},
		        	Promotores: {required: "Campo obligatorio"},
		        	Coordinadores: {required: "Campo obligatorio"},
		        	noValidado: {required: "Campo obligatorio"},
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

	
	/*jQuery.validator.addMethod("fecha_valida",function(value, element){

		
		 var r=document.getElementById("fecha_inicio").value;
		 var rf=document.getElementById("fecha_ultima").value;
		 if( r <= Date.today().add(14).day().toString('dd/MM/yyyy'))
		 {
			 return true;
		 }
		 else if (r==rf){
			 return true;
		 }
		 else
			return false;
				 
       
   }, "Debes reportar tu evento con 2 semanas de anticipacion");*/

	   
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

	/* $(".dateP").datepicker({
         language: 'es',
         format: 'dd/mm/yyyy',
         defaultDate: "<?php echo date('d/m/Y');?>",
         autoclose: true
     });*/

    

  
    	   
    	  

	 $("#num_horas").numeric({decimal: true, negative: false});
	 $("#noAsistentes").numeric();
	 $("#noPromotores").numeric();
	 $("#noCoordinadores").numeric();
	 $("#noValidado").numeric();	
	 $("#Asistentes").numeric();
	 $("#Promotores").numeric();
	 $("#Coordinadores").numeric();
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
                          		irA('index.php/operador/listado');
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
                         		 irA('index.php/operador/listado');
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


var fecha_evento, fecha_valida, hoy, variablejs;
$(document).ready(function() {
	
	var cad = document.getElementById("fecha_ultima").value;
	arregloDeSubCadenas = cad.split("/");
	cad = arregloDeSubCadenas[2]+'-'+arregloDeSubCadenas[1]+'-'+arregloDeSubCadenas[0];
	ms = Date.parse(cad);
	fecha_evento = new Date(ms);
	fecha_eventoi = new Date(ms);
   	
   	fecha_tope = fecha_evento.add(7).day(); 
   	
   	hoy = Date.today();


   	if(hoy>fecha_tope)
   	{
   	   	$('#guardar').hide('fast');
   	   	
   		swal({
        	  title: "¡Ya no puedes reportar información!",
        	  text: "",
        	  type: "error",
        	  showCancelButton: false,
        	  confirmButtonColor: "#FF0040",
        	  confirmButtonText: "Ok",
        	  //cancelButtonText: "No, cancel plx!",
        	  closeOnConfirm: false
        	  //closeOnCancel: false
        	},
        	function(isConfirm){
        	  if (isConfirm) {
        		irA('index.php/operador/listado');
        	  } 
        	});
   		
   	}   	
   	else if(hoy<=fecha_eventoi)
   	{
		$('#guardar').hide('fast');
   	   	
   		swal({
        	  title: "¡Aún no es tiempo de reportar información!",
        	  text: "",
        	  type: "error",
        	  showCancelButton: false,
        	  confirmButtonColor: "#FF0040",
        	  confirmButtonText: "Ok",
        	  //cancelButtonText: "No, cancel plx!",
        	  closeOnConfirm: false
        	  //closeOnCancel: false
        	},
        	function(isConfirm){
        	  if (isConfirm) {
        		irA('index.php/operador/listado');
        	  } 
        	});

   	 }
   	
   	
});


function irA(uri) {
    window.location.href = '<?php echo base_url(); ?>' + uri;
}



</script>

<section class="content">
<h1> ACTIVIDAD EN COMUNIDAD <?php  ?></h1> 



	<form id="registro" action="operador/updateEvento" method="post">
		<input type="hidden" name="latbox" id="latbox" value="<?php echo $dato['latitud'];?>" />
 		<input type="hidden" name="lonbox" id="lonbox" value="<?php echo $dato['longitud'];?>" />
 		
		<div class="row">        	
        	<div class="col-md-6">
        	<legend>Información del evento</legend>
                <div class="box box-solid box-success" style="text-align:left !important; min-height:260px; height:100%;">
   			     	<div class="box-body">
   			     	 <!-- 
   			     		<div class="form-group">
			            	<label>Tipo de evento:</label>
			            	<input type="text" name="id_tipo" id="id_tipo" value="Delegacional" class="form-control"/>
				        </div>
			            
			            <div class="form-group">
			            	<label>Persona que reporta la actividad:</label>
				            <select name="id_responsable" id="id_responsable" class="form-control">
				             
					            <?php foreach ($responsable as $value){	
					           		 $selected="";
							           if(in_array($dato['usuario'],$value))
							            $selected="selected";
							       ?>
								<option value="<?php echo $value['id_usuario'];?>" <?php echo $selected;?>><?php echo $value['usuario']; ?></option>				                  
				            <?php }?>				            
			            	</select>
			            </div>
			            -->
			            <div class="form-group">
			            	<label>Nombre Actividad:</label>
				            <input type="text" name="nombre" id="nombre" value="<?php echo $dato['nombre'];?>" class="form-control">
			            </div>
			            <div class="form-group">
			            	<label>Responsable Actividad:</label>
				            <input type="text" name="res_actividad" id="res_actividad" value="<?php echo $dato['responsable_actividad'];?>" class="form-control">
			            </div>
			            <div class="form-group">
			            	<label>Eje temático:</label>
			            	
				        	<select name="id_eje" id="id_eje" class="form-control" >
				            		
						             <?php foreach ($ejes as $value){	
						             	$selected="";
							           if(in_array($dato['eje_tematico'],$value))
							            $selected="selected";
							       ?>
						            	<option value="<?php echo $value['id_eje'];?>"<?php echo $selected;?>><?php echo $value['eje_tematico']; ?></option>				                  
						            <?php }?>		            
				            </select>
				        </div>
			             <div class="form-group">
			            	<label>Tipo actividad:</label>
				            <select name="id_actividad" id="id_actividad" class="form-control" >
			            		<option value="0">[Seleccionar]</option>
					            <?php foreach ($actividad as $value){
					            	$selected="";
					            	if(in_array($dato['tipo_actividad'],$value))
					            		$selected="selected";
					            	?>
				            	<option value="<?php echo $value['id_tipo_actividad'];?>" <?php echo $selected;?>><?php echo $value['tipo_actividad']; ?></option>				                  
				            <?php }?>	
					            				            
			            	</select>
			            	</div>
			            	
			            <div class="form-group">
			            	<label>Coordinación Interinstitucional:</label>
				            
			            	<select name="id_coordinacion" id="id_coordinacion" class="form-control" >
				            		
				            		 <?php foreach ($coordinacion as $value){	
				            		 	$selected="";
				            		 	if(in_array($dato['coordinacion'],$value))
				            		 		$selected="selected";
				            		 ?>
						            	<option value="<?php echo $value['id_coordinacion'];?>" <?php echo $selected;?>><?php echo $value['coordinacion']; ?></option>				                  
						            <?php }?>		            
				            </select>
			            </div>
			            
   			     		<div class="form-group">
			            	<label>Descripción del Evento: </label>
			            	<input type="text" name="descripcion" id="descripcion" value="<?php echo $dato['descripcion'];?>" class="form-control" />
			            </div>
			            
			            <div class="form-group" id="involucrados"">
			            	
			            	
			            <!-- 	
			            	<div class="form-group" id="div_involucrados" >
			            	<?php if ($dato['id_tipo_evento']==2){?>
			            	<label>Delegaciones Involucradas:</label>
				            <select name="involucrados[]" id="involucrados[]" class="form-control" multiple size="6">			            		
					            <?php foreach ($delegaciones as $value){
					            	$selected="";
					            	if(in_array($value['id_delegacion'],$involucrados))
					            		$selected="selected";
					            	?>
				            	<option value="<?php echo $value['id_delegacion'];?>" <?php echo $selected;?>><?php echo $value['delegacion']; ?></option>				                  
				            <?php }}?>				            
		            		</select>
		            		</div>
				        </div>	
				        -->	            			               			     					            			            			           		             			           
			            <div class="form-group">
			            	<label>Actividad Seriada:</label>
			            	<select name="id_seriada" id="id_seriada" class="form-control" >
				            	<option value="2" <?php if ($dato['id_seriada']==2){ echo 'selected';}?>>No</option>
			            		<option value="1" <?php if ($dato['id_seriada']==1){ echo 'selected';}?>>Si</option>						            					            				           
			            	</select>
						</div>
			       	<div class="row">
			             	<div  style="text-align:right; padding-right:15px;">
			             		<input type="button" id="agregar" class="btn btn-danger btn-sm" value="Agregar logística">
			             	</div>
			             	<table id="tblLogistica" width="100%" border="0">
			             	<?php 
			             	$i = 1;
			             	foreach($log_x_evento as $le)
			             	{
			             	?>			             	
			             		<tr>
				             		<td>
							            <div class="col-md-6">      
								     		<div class="form-group">
								     		    <?php if($i==1){?>
								     			<label>Logística del evento:</label>
								     			<?php } ?>			            	
								            	<div class="form-group" id="logistica" >
											            <select name="logistica[]" id="logistica[]" class="form-control">
											            	<option value="0">[Seleccionar]</option>			            		
												            <?php 
												            foreach ($logistica as $value)
												            {	
												                $selected = "";
												                if($value['id_logistica']==$le['id_logistica'])
												                	$selected = "selected";
												            	
												            ?>
											            	<option value="<?php echo $value['id_logistica'];?>" <?php echo $selected;?>><?php echo $value['logistica']; ?></option>				                  
											            <?php }?>				            
									            	</select>
									            </div>		            
								            </div>
								         </div>
								         
								        <div class="col-md-6">      
								     		<div class="form-group">
								     			 <?php if($i==1){?>
								     			<label>Cantidad:</label>
								     			<?php } ?>			            	
								            	<div class="form-group" id="logistica" >
											         <input type="text" name="cantidad[]" id="cantidad" value="<?php echo $le['cantidad']; ?>" class="form-control" maxlength="4">
									            </div>		            
								            </div>
							           </div>
						           </td>
					           </tr>
					         <?php
					         $i++; 
			             	 }
					         ?>  					          
					        </table>
					        				         
			            </div>
			        
			        	<legend>Valores esperados</legend>		
			            <div class="row">
			            	
			            	<div class="col-md-4">
				              <label>Asistentes:</label>
					          <input type="text" name="Asistentes" id="Asistentes" value="<?php echo $dato['no_asistentes'];?>" class="form-control"/>
				            </div>
				            <div class="col-md-4">
				              <label>Coordinadores:</label>
					          <input type="text" name="Coordinadores" id="Coordinadores" value="<?php echo $dato['no_coordinadores'];?>" class="form-control"/>
				            </div>		
				            <div class="col-md-4">
				              <label>Promotores:</label>
					          <input type="text" name="Promotores" id="Promotores" value="<?php echo $dato['no_promotores'];?>" class="form-control"/>
				            </div>	            			            							
		            	</div>	
		            	<br>
		            	<legend>Cargar imagenes</legend>
		            	<div class="row">
				            <div class="col-md-6">
				 				<div class="upload">
				 				<input name="id_evento1" id="id_evento1" value="<?php echo $dato['id_evento'];?>" type="hidden"/>
		         
									<input type="file" id="archivo" name="archivo" style="cursor:pointer;" title="Adjuntar una fotografía"/>
									<div style="padding-top:5px;">
										<progress id="progressBar" value="0" max="100" style="width:153px; display: inline;" ></progress>
										<span id="status" style="text-align: left; font-size: 11px; font-weight: bold; font-family: Verdana; color: grey; "></span>
										<p id="loaded_n_total" style="display: none;"></p>
										<input type="hidden" name="nombre_archivo" id="nombre_archivo"  />
										
		      
									</div>
								</div>	
							</div>
							
							</div>
							<div class="row">
								<div class="image-set" id="central">
								
								
								<?php 
									
									foreach ($imagen as $value){?>
			    					<div class="col-md-4">
				 						 <a id="gallery" class="example-image-link" href="<?php echo $value['ruta_archivo'];?>" data-lightbox="example-set" title="Actividades Comunidad Prepa Sí">
				  						<img class="example-image" src="<?php echo $value['ruta_archivo'];?>" alt="Foto -Actividades Comunidad " width="50%" height="50%"/></a>
									</div>
								<?php }?>
								
								</div>
							</div>
			     	</div>
	            </div>
	       </div>
	       </div>
	       
	       <div class="col-md-6">
	       <legend>Ubicación del evento</legend>
	       	<div class="box box-solid box-success" style="text-align:left !important; min-height:260px; height:100%;">
	       		<div class="box-body">
	       		   <div class="form-group">
		            	<label>Lugar del evento:</label>
			            <select name="id_tipo_lugar" id="id_tipo_lugar" class="form-control" >
			                <option value="1" <?php if($dato['id_tipo_lugar'] == 1){ echo 'selected';}?>>Plantel</option>
				            <option value="2" <?php if($dato['id_tipo_lugar'] == 2){ echo 'selected';}?>>Espacio Público</option>	
				            <option value="3" <?php if($dato['id_tipo_lugar'] == 3){ echo 'selected';}?>>Museos</option>
				            <option value="4" <?php if($dato['id_tipo_lugar'] == 4){ echo 'selected';}?>>Escuela Adultos</option>		        
						</select>
			       </div>
		            
		     		<div class="form-group" id="sede">
		            	<select name="id_lugar" id="id_lugar" class="form-control" >
			            		<?php 
		            	foreach($sedes as $value)
		            	{
		            		$selected = "";
		            		if($dato['id_lugar']==$value['id_espacio'])
		            			$selected = "selected";
		            	
		            	?>
		            		<option value="<?php echo $value['id_espacio'];?>" <?php echo$selected; ?>><?php echo $value['espacio'];?></option>			            		
			            		
			            <?php 
		            	}
			            ?>								            	            
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
		                       	<input name="fecha_inicio" id="fecha_inicio" type="text" value="<?php echo $dato['inicio'];?>" class="form-control pull-right dateP" onFocus="this.blur();" readonly/>
		                       	<input name="fecha_ultima" id="fecha_ultima" type="hidden" value="<?php echo $dato['inicio'];?>" />
	                        </div>
			            </div>
			            <div class="col-md-4">
			            		<label>Hora de inicio:</label><br/>		
			              		
		                    		<input name="hora_inicio" id="hora_inicio" value="<?php echo $dato['horario'];?>" class="form-control" type="text" onFocus="this.blur();"/>
	                   		</div>
			            	<div class="col-md-4">
				            	<label>Horas:</label>
				             	<input type="text" name="num_horas" id="num_horas" value="<?php echo $dato['num_horas'];?>" class="form-control" maxlength="2"/>
			            	</div>
			            
			           <!-- <div  class="col-md-6">
			            	<label>Fecha de conclusión:</label>
				           	<div class="input-group" style="width:135px;">
		                       	<div class="input-group-addon">
		                       		<i class="fa fa-calendar"></i>
		                       	</div>
		                       	<input name="fecha_fin" id="fecha_fin" type="text" value="<?php echo $dato['fin'];?>" class="form-control pull-right dateP" onFocus="this.blur();"/>
	                    	</div>
			            </div>-->
			         	</div>
			            <br />
			         <!-- 	<div class="row">
			           		 <div class="col-md-6">
			            		<label>Hora de inicio:</label><br/>		
			              		
		                    		<input name="hora_inicio" id="hora_inicio" value="<?php echo $dato['horario'];?>" class="form-control" type="text" onFocus="this.blur();"/>
	                   		</div>
			            	<div class="col-md-6">
				            	<label>Horas:</label>
				             	<input type="text" name="num_horas" id="num_horas" value="<?php echo $dato['num_horas'];?>" class="form-control" maxlength="2"/>
			            	</div>
			         	</div> -->
			            <br />
			        	 
			            <legend>Valores obtenidos</legend>	
			        	<div class="row">
		            	 
			            	<div class="col-md-3">
				              <label>Asistentes:</label>
					          <input type="text" name="noAsistentes" id="noAsistentes" value="<?php echo $resultado['no_asistentes'];?>" class="form-control"/>
				            </div>
				            
				            <div class="col-md-3">
				              <label>Coordinadores:</label>
					          <input type="text" name="noCoordinadores" id="noCoordinadores" value="<?php echo $resultado['no_coordinadores'];?>" class="form-control"/>
				            </div>
				            <div class="col-md-3">
				              <label>Promotores:</label>
					          <input type="text" name="noPromotores" id="noPromotores" value="<?php echo $resultado['no_promotores'];?>" class="form-control"/>
				            </div>
				            <div class="col-md-3">
			            		<label>No.Validaciones:</label>
				        		<input type="text" name="noValidado" id="noValidado" value="<?php echo $resultado['no_validado'];?>" class="form-control"/>
			        		</div>	 
				            			            			            							
		            	</div>
		            	
			       </div>       			            		           		           		          
		       </div>
		       <br/>
		       <input name="id_evento" id="id_evento" value="<?php echo $dato['id_evento'];?>" class="form-control" type="hidden"/>
		       <input name="update" id="update" value="1" class="form-control" type="hidden"/>
		       <div class="box-footer" style="text-align: right;" >
     				<button id="guardar" name="guardar" type="button" class="btn btn-primary">Guardar</button>
     		   </div>
    	 	</div>
	 	</div>
	 
	</form>

	</div>
</section>


