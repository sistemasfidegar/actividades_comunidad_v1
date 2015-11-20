<?php

class operador extends CI_Controller {

    var $id_usuario = null;
    
   	var $id_delegacion= null;
  
    public function __construct() {
        parent::__construct();
                        
        if (!$this->session->userdata('logged_in'))
        {
        	redirect('main');
        }
        else if ($this->session->userdata('id_perfil') != 2)
        {
        	echo '<br /><br /><div ><center>
        	<table cellpadding="0" cellspacing="0" border="0" style="width:524px; height:34px; border: 2px solid #7F0000; background:#ffffff; color:#7F0000; font-family: Arial; font-weight:bold; font-size:20px;">
	        	<tr>
		        	<td width="60px" valign="middle" align="center"><img src="' . base_url() . 'resources/images/warning.png"/></td>
		        	<td valign="middle">NO EST&Aacute; AUTORIZADO PARA INGRESAR AQU&Iacute;</td>
	        	</tr>
        	</table></center>
        	</div>';
        	exit();
        }

        $this->id_usuario = (int) $this->session->userdata('id_usuario');
        $this->id_delegacion = (int) $this->session->userdata('id_delegacion');
        
        $this->load->model('m_operador'); 
      	$this->load->model('m_catalogos');
        $this->load->helper('utilerias_helper');
        $this->load->helper('my_date_helper');
    }

    function index() {
		$datos['content'] = $this->load->view('operador/v_index.php', null, true);
        $this->load->view('operador/v_template.php', $datos, false);
    }
    
    function listado() {
    	
    	$aux=$this->m_catalogos->getEventoLista($this->id_usuario);
    	$listado['lista']= $aux;
    	$participantes= array();
    	$lugar=array();
    	
    	foreach ($aux as $dato){
    		$lugar[$dato['id_evento']]=$this->m_catalogos->getLugar($dato['id_tipo_lugar'], $dato['id_lugar']);
    	} 	
   
    	foreach ($aux as $dato){
    		$participantes[$dato['id_evento']]=$this->m_catalogos->getDelegacionInvolucradas($dato['id_evento']);
    	}
    	$listado['participantes']=$participantes;
    	$listado['lugar']=$lugar;
    	 
    	
    	$datos['content'] = $this->load->view('operador/listado_actividades.php',$listado, true);
    	$this->load->view('operador/v_template.php', $datos, false);
    }
    
function modifica($id_evento)
{
    	$aux = $this->m_catalogos->getOperador($id_evento);
    	$datos['dato'] = $aux[0];
    	$aux1=$this->m_operador->getDelegacionEvento($id_evento);
    	$datos['delegacion_evento']=$aux1;
    	$datos['actividad'] = $this->m_catalogos->getActividad();
    	$aux1=$this->m_operador->usRegistroEvento($id_evento);
    	$datos['usuario_registro']=$aux1[0]['id_usuario_registra'];
    
    	
    	$datos['usuario_operador']=$this->id_usuario;
    	$datos['logistica'] = $this->m_catalogos->getLogistica();
    	$datos['log_x_evento'] = $this->m_operador->getLogisticaEvento($id_evento);
    	
    	
	if ($datos['usuario_registro'] == $datos['usuario_operador']){ ///operador
    	 	
    		$aux=$this->m_catalogos->getDelegacionInvolucradas($id_evento);
    		 
    		$involucrados=array();
    		foreach ($aux as $value){
    			$involucrados[]=$value['id_delegacion'];
    		}
    		 
    		$datos['involucrados']=$involucrados;
    		$datos['responsable'] = $this->m_catalogos->getResponsable();
    		$datos['ejes'] = $this->m_catalogos->getEjeTematico();
    		$datos['coordinacion']=$this->m_catalogos->getCoordinacion();
    		$datos['delegaciones'] = $this->m_operador->getCatDelegaciones();
    		$datos['logistica'] = $this->m_catalogos->getLogistica();
    			
    		$aux = $this->m_catalogos->getOperador($id_evento);
    		$datos['dato'] = $aux[0];
    		 
    		$id_sede = $aux[0]['id_tipo_lugar'];
    		$datos['sedes'] = $this->m_operador->getSedeRespectiva($id_sede);
    		
    		$aux= $this->m_operador->getResultado($id_evento);
    		if($aux != null){
    			$datos['resultado']=$aux[0];
    		}
    		else {
    			$datos['resultado']=0;
    		}
    		
    		
    		$datos['imagen']=$this->m_operador->getImagen($id_evento);
    		
    	 	$data['content'] = $this->load->view('operador/form_operador.php', $datos, true);
    	 } 	
    	 else {
    		$f1=$aux[0];
    		
    		$f1=$this->m_operador->verificaResultado($f1);
    		 
    		if ($f1==1){
    			$aux= $this->m_operador->getResultado($id_evento);
    			$datos['resultado']=$aux[0];
    		}
    		else {
    			$datos['resultado']=0;
    		}
    		 
    		$participantes= array();
    		foreach ($aux as $dato){
    			$participantes['id_evento']=$this->m_catalogos->getDelegacionInvolucradas($id_evento);
    		}
    		 
    		$datos['delegacion']=$participantes;
    		$datos['imagen']=$this->m_operador->getImagen($id_evento);
    	 	$data['content'] = $this->load->view('operador/form_modifica.php', $datos, true);
    	}
    	 
    	$this->load->view('operador/v_template.php', $data, false);
    	
    }
public function updateEvento() {
    
    	$data['id_evento']=(int)$this->input->post('id_evento');
    	 
    	$dato=$this->m_operador->borraInvolucrados($data['id_evento']);
    
    	$data['id_usuario_registra'] = $this->id_usuario;
    	$data['id_usuario']=$this->id_usuario;
    	$data['id_tipo'] = (int) $this->input->post('id_tipo');
    	$data['actividad'] = (int) $this->input->post('id_actividad');
    	$data['id_responsable'] =  $this->id_usuario;
    
    	$aux=$this->m_operador->getDelUsuario($data['id_responsable']);
    	$data['id_delegacion'] = $aux[0]['id_delegacion'];
    
    	$data['id_eje'] = (int) $this->input->post('id_eje');
    	$data['id_coordinacion'] = (int) $this->input->post('id_coordinacion');
    	$data['id_seriada'] = (int) $this->input->post('id_seriada');
    	$data['id_tipo_lugar'] = (int) $this->input->post('id_tipo_lugar');
    	$data['id_lugar'] = (int) $this->input->post('id_lugar');
    
    	$data['num_horas'] = (int) $this->input->post('num_horas');
    	$data['no_asistentes'] = (int) $this->input->post('Asistentes');
    	$data['no_promotores'] = (int) $this->input->post('Promotores');
    	$data['no_coordinadores'] = (int) $this->input->post('Coordinadores');
    	
    	$data['latitud'] = $this->input->post('latbox');
    	$data['longitud'] = $this->input->post('lonbox');
    	
    	$data['descripcion'] = $this->input->post('descripcion');
    
    	
    	$data['fecha_inicio'] = misql($this->input->post('fecha_inicio'));
    	$data['fecha_fin'] = misql($this->input->post('fecha_fin'));
    	$data['horario'] = $this->input->post('hora_inicio');
    
    	$involucrados = null;
    	$involucrados = $this->input->post('involucrados');
    
    	$result = $this->m_operador->updateEvento($data);
    	//-- 
    	
    	$data['validado']=$this->input->post('noValidado');
  		$data['asistentes']=$this->input->post('noAsistentes');
  		$data['coordinador']=$this->input->post('noCoordinadores');
  		$data['promotores']=$this->input->post('noPromotores');
    	
  		$aux=$this->m_operador->verificaResultado($data);
  		
  		if ($aux ==0)
  		{
  			$result1 = $this->m_operador->guardaResultados($data);
  			
  		}
  		elseif($aux==1){
  			$result1 = $this->m_operador->updateResultados($data);
  		}
  		//--
    
    	if($result != null || $result1 !=null)
    	{
    		$id_evento = $data['id_evento'];
    
    		if($data['id_tipo']==2)
    		{
    			foreach($involucrados as $val)
    			{
    
    				if($val!= $data['id_delegacion'])
    				{
    					$r = $this->m_operador->insertaInvolucrado($id_evento, $val);
    				}
    			}
    		}
    
    		    		
    		$this->m_operador->borraLogistica($data['id_evento']);
    		$aux_log = $this->input->post('logistica');
    		$aux_cant = $this->input->post('cantidad');
    		
    		
    		if($aux_log[0]!=0)
    		{
    			for($i=0;$i<count($aux_log);$i++)
    			{
    			$id_logistica = $aux_log[$i];
    		
    			$cantidad = 0;
    			if($aux_cant[$i]!="")
    				$cantidad = $aux_cant[$i];
    		
    				$r = $this->m_operador->insertaLogistica($id_evento, $id_logistica, $cantidad);
    			}
    		}
    		echo "ok";
    	}
    	else
    	{
    		echo "bad";
    	}
    	
    }
    

public function guardaEvento() {
    	 
    	
    	$data['id_usuario_registra'] = $this->id_usuario;
    	$data['id_tipo'] = (int) $this->input->post('id_tipo');
    	$data['actividad'] = (int) $this->input->post('id_actividad');
    	$data['id_responsable'] = $this->id_usuario;
    	 
    	$aux=$this->m_operador->getDelUsuario($data['id_responsable']);
    	$data['id_delegacion'] = $aux[0]['id_delegacion'];
    	 
    	$data['id_eje'] = (int) $this->input->post('id_eje');
    	$data['id_coordinacion'] = (int) $this->input->post('id_coordinacion');
    	
    	$data['id_seriada'] = (int) $this->input->post('id_seriada');
    	$data['id_tipo_lugar'] = (int) $this->input->post('id_tipo_lugar');
    	$data['id_lugar'] = (int) $this->input->post('id_lugar');
    	 
    	$data['num_horas'] = (int) $this->input->post('num_horas');
    	$data['no_asistentes'] = (int) $this->input->post('noAsistentes');
    	$data['no_promotores'] = (int) $this->input->post('noPromotores');
    	$data['no_coordinadores'] = (int) $this->input->post('noCoordinadores');
    	 
    	$data['descripcion'] = $this->input->post('descripcion');
    
    	$data['fecha_inicio'] = misql($this->input->post('fecha_inicio'));
    	$data['fecha_fin'] = misql($this->input->post('fecha_fin'));
    	$data['horario'] = $this->input->post('hora_inicio');
    	 
    	$data['latitud'] = $this->input->post('latbox');
    	$data['longitud'] = $this->input->post('lonbox');
    	
    	$involucrados = null;
    	$involucrados = $this->input->post('involucrados');
    	 
    	$result = $this->m_operador->insertaEvento($data);
    	 
    	 
    	if($result!=null)
    	{
    		$id_evento = $result[0]['id_evento'];
    
    		if($data['id_tipo']==2)
    		{
    			foreach($involucrados as $val)
    			{
    				if($val!= $data['id_delegacion'])
    				{
    					$r = $this->m_operador->insertaInvolucrado($id_evento, $val);
    				}
    			}
    		}
    		
    		$aux_log = $this->input->post('logistica');
    		$aux_cant = $this->input->post('cantidad');
    		
    		if($aux_log[0]!=0)
    		{
    			for($i=0;$i<count($aux_log);$i++)
    			{
    			$id_logistica = $aux_log[$i];
    		
    			$cantidad = 0;
    			if($aux_cant[$i]!="")
    				$cantidad = $aux_cant[$i];
    		
    				$r = $this->m_operador->insertaLogistica($id_evento, $id_logistica, $cantidad);
    			}
    		}
    		echo "ok";
    	}
    	else
    	{
    		echo "bad";
    	}
    	
    	
    }
    
    
function guardarActividad(){
  		
   	
   	
   		$datos['id_evento']=(int)$this->input->post('id_evento');
  		$datos['validado']=$this->input->post('noValidado');
  		$datos['asistentes']=$this->input->post('Asistentes');
  		$datos['coordinador']=$this->input->post('Coordinadores');
  		$datos['promotores']=$this->input->post('Promotores');
  		$datos['id_delegacion']=$this->id_delegacion; 		
  		$datos['id_usuario']=$this->id_usuario;
  		
  		
  		
  		$aux=$this->m_operador->verificaResultado($datos);
  		
  		if ($aux ==0)
  		{
  			$result = $this->m_operador->guardaResultados($datos);
  		}
  		elseif($aux==1){
  			$result = $this->m_operador->updateResultados($datos);
  		}
  		

        if ($result  != null ){
        	echo "ok";
        	// header("Location: $retorno");
        }else
    	{
    		echo "bad";
    	}
          
    }
    
function eventoNuevo(){
    	
    	$data['ejes'] = $this->m_catalogos->getEjeTematico();
    	$data['coordinaciones'] = $this->m_catalogos->getCoordinacion();
    	$data['delegaciones'] = $this->m_catalogos->getDelegacion();
    	$data['responsable'] = $this->m_catalogos->getResponsable();
    	$data['logistica'] = $this->m_catalogos->getLogistica();
    	$data['actividad'] = $this->m_catalogos->getActividad();
    	$data['content'] = $this->load->view('operador/form_nuevo_evento.php', $data, true);
    	$this->load->view('operador/v_template.php', $data, false);
    }
    public function ajaxGetEspacios()
    {
    	$espacios = $this->m_catalogos->get_espacio_publico();
    	$a=0;
    	$b=0;
    	$c=0;
    	$d=0;
    	$e=0;
    	$f=0;
    	$g=0;
    	$h=0;
    	$i=0;
    	$j=0;
    	$k=0;
    	echo '<option value="0">[Seleccionar]</option>';
    	foreach($espacios as $row)
    	{
    		if($row['tipo']==1){
    			if($a==0){
    				echo " <optgroup label='Alamedas'>";
    			}
    			echo '<option value="'.$row['id_espacio_publico'].'">'.$row['espacio_publico'].'</option>';
    			$a++;
    		}
    		elseif ($row['tipo']==2){
    			if($b==0){
    				echo " <optgroup label='Bosques'>";
    			}
    			echo '<option value="'.$row['id_espacio_publico'].'">'.$row['espacio_publico'].'</option>';
    			$b++;
    		}
    		elseif($row['tipo']==3){
    			if($c==0){
    				echo " <optgroup label='Camellones'>";
    			}
    			echo '<option value="'.$row['id_espacio_publico'].'">'.$row['espacio_publico'].'</option>';
    			$c++;
    			
    			
    		}
    		elseif($row['tipo']==4){
    			if($d==0){
    				echo " <optgroup label='Canchas'>";
    			}   			
    			echo '<option value="'.$row['id_espacio_publico'].'">'.$row['espacio_publico'].'</option>';
    			$d++;
    			 
    			 
    		}
    		elseif($row['tipo']==5){
    			if($e==0){
    				echo " <optgroup label='Deportivos'>";
    			}
    			echo '<option value="'.$row['id_espacio_publico'].'">'.$row['espacio_publico'].'</option>';
    			$e++;
    			 
    			 
    		}
    		elseif($row['tipo']==6){
    			
    			if($f==0){
    				echo " <optgroup label='Explanadas'>";
    			}
    			echo '<option value="'.$row['id_espacio_publico'].'">'.$row['espacio_publico'].'</option>';
    			$f++;
    			 
    			 
    		}
    		elseif ($row['tipo']==7){
    			if($g==0){
    				echo " <optgroup label='Faros Culturales'>";
    			}
    			echo '<option value="'.$row['id_espacio_publico'].'">'.$row['espacio_publico'].'</option>';
    			$g++;
    		
    		
    		}
    		elseif($row['tipo']==8){
    			if($h==0){
    				echo " <optgroup label='Jardines'>";
    				
    			}
    			echo '<option value="'.$row['id_espacio_publico'].'">'.$row['espacio_publico'].'</option>';
    			$h++;
    		
    		
    		}
    		elseif($row['tipo']==9){
    			if($i==0){
    				echo " <optgroup label='Modulos'>";
    			}
    			echo '<option value="'.$row['id_espacio_publico'].'">'.$row['espacio_publico'].'</option>';
    			$i++;
    		
    		
    		}
    		elseif($row['tipo']==10){
    			if($j==0){
    				echo " <optgroup label='Parques'>";
    			}
    			echo '<option value="'.$row['id_espacio_publico'].'">'.$row['espacio_publico'].'</option>';
    			$j++;
    		
    		
    		}
    		else{
    			if($k==0){
    				
    				echo " <optgroup label='Otros'>";
    			}
    			echo '<option value="'.$row['id_espacio_publico'].'">'.$row['espacio_publico'].'</option>';
    			$k++;
    		}
    	}
    }
  
    public function ajaxGetMuseos(){
    	$museos=$this->m_catalogos->get_museo();
    	
    echo '<option value="0">[Seleccionar]</option>';
    	foreach($museos as $row)
    	{
    		echo '<option value="'.$row['id_museo'].'">'.$row['museo'].'</option>';
    	}
    }
    
    
    public function ajaxGetEscuela(){
    	$escuela=$this->m_catalogos->get_escuelaA();
    	 
    	echo '<option value="0">[Seleccionar]</option>';
    	foreach($escuela as $row)
    	{
    		echo '<option value="'.$row['id_escuela_adulto'].'">'.$row['escuela'].'</option>';
    	}
    }
    public function ajaxGetPlanteles()
    {
    	$planteles = $this->m_catalogos->get_plantel();
    	 
    	echo '<option value="0">[Seleccionar]</option>';
    	 
    	$procesados = array();
    	for($i=0;$i<count($planteles);$i++)
    	{
    	if(!in_array($planteles[$i]['id_institucion'], $procesados))
    	{
    			$procesados[] = $planteles[$i]['id_institucion'];
    			echo '<optgroup label="--- '.$planteles[$i]['institucion'].' ---">';
    	}
    
    	echo '<option value="'.$planteles[$i]['id_plantel'].'">'.$planteles[$i]['plantel'].'</option>';
    
    			if($i<count($planteles)-1)
    			{
    			if(!in_array($planteles[$i+1]['id_institucion'], $procesados))
    			{
    			echo '</optgroup>';
    			}
    			}
    
    			}
    			 
    			/*foreach($planteles as $row)
    			{
    			echo '<option value="'.$row['id_plantel'].'">'.$row['plantel'].'</option>';
    			}*/
    	}
    	/*
    	public function getDelegacionMapa($id_usuario)
    	{
    		$aux = $this->m_catalogos->getDelegacionMapa($id_usuario);
    	
    		if($aux!=null && $aux[0]['delegacion']!="UNIVERSITARIOS")
    		{
    			echo $aux[0]['delegacion'];
    		}
    		else
    		{
    			echo "ZOCALO DF";
    		}
    	}
    	*/
    	public function getDireccionMapa($id_lugar, $id_tipo_lugar)
    	{
    		$aux = $this->m_catalogos->getDireccion($id_lugar, $id_tipo_lugar);
    		 
    		if($aux!=null && $aux[0]['direccion']!= null)
    		{
    			echo $aux[0]['direccion'];
    		}
    		else
    		{
    			echo "ZOCALO DF";
    		}
    	}
    	
    	/*
    	public function save_foto(){
    		$datos['id_evento']=(int)$this->input->post('id_evento');
    		$datos['id_usuario']=$this->id_usuario;
    		 
    		$type = explode('.',$_FILES['archivo']['name']);
    		$type = strtolower($type[count($type)-1]);//obtengo la extencion
    		$uploaddir = 'resources/archivos/'.'foto'.$datos['id_evento'].'_'.rand(2,15).'.'.$type;
    		 
    		$nombre_arch = $this->limpia_cadena(utf8_decode($_FILES['archivo']['name']));
    		$fileTmploc = $_FILES['archivo']['tmp_name'];
    		if(in_array($type, array("jpg", "jpeg", "gif", "png"))){
    		if(move_uploaded_file($fileTmploc, $uploaddir))
	    		{
	    			
	    			$datos['ruta_archivo']=$uploaddir;
	    			$r=$this->m_operador->guardaImagen($datos);
	    	
	    	
	    		}
    		 
    		}else {
    			echo 'formato no valido';
    		}
    	}
    	*/
    	public function save_foto(){
    		$datos['id_evento']=(int)$this->input->post('id_evento');
    		$datos['id_usuario']=$this->id_usuario;
    		 
    		 
    		$type = explode('.',$_FILES['archivo']['name']);
    		$type = strtolower($type[count($type)-1]);//obtengo la extencion
    		 
    		if(in_array($type, array("jpg", "jpeg", "gif", "png"))){
    	
    			$uploaddir = 'resources/archivos/'.'foto'.$datos['id_evento'].'_'.rand(2,15).'.'.$type;
    			$tmpimagen = $_FILES['archivo']['tmp_name'];
    			$ancho_limite=640;
    			 
    			if ($type=='jpg' || $type=='jpeg'){
    				$imagen_origen=imagecreatefromjpeg($_FILES['archivo']['tmp_name']);
    			}
    			if ($type=='gif'){
    				$imagen_origen=imagecreatefromgif($_FILES['archivo']['tmp_name']);
    			}
    			if($type=='png'){
    				$imagen_origen=imagecreatefrompng($_FILES['archivo']['tmp_name']);
    			}
    			
    			$ancho=imagesx($imagen_origen);//saca ancho
    			$alto=imagesy($imagen_origen);//saca alto
    			 
    			 if ($ancho_limite <= $ancho){
	    			//para saber si es una imagen horizontal
	    			 
	    			if ($ancho>$alto){
	    				$ancho_o=$ancho_limite;
	    				$alto_o=intval(($ancho_limite*$alto)/$ancho);
	    			}else{//es vertical
	    				$alto_o=$ancho_limite;
	    				$ancho_o=intval($ancho_limite*$ancho/$alto);
	    			}
	    	
	    			if ($type=='jpg' || $type=='jpeg'){
	    				$viejaimagen =imagecreatefromjpeg($tmpimagen);
	    			}
	    			if ($type=='gif'){
	    				$viejaimagen=imagecreatefromgif($tmpimagen);
	    			}
	    			if($type=='png'){
	    				$viejaimagen=imagecreatefrompng($tmpimagen);
	    			}
	    			 
	    	
	    			$nuevaimagen= imagecreatetruecolor($ancho_o, $alto_o);//crea imagen con nuevas dimesiones
	    			imagecopyresized($nuevaimagen,$viejaimagen, 0, 0, 0,0,$ancho_o, $alto_o,$ancho,$alto);
	    	
	    			if ($type=='jpg' || $type=='jpeg'){
	    				imagejpeg($nuevaimagen,$uploaddir);
	    			}
	    			if ($type=='gif'){
	    				imagegif($nuevaimagen,$uploaddir);
	    			}
	    			if($type=='png'){
	    				imagepng($nuevaimagen,$uploaddir);
	    			}
	    			$datos['ruta_archivo']=$uploaddir;
	    			$r=$this->m_operador->guardaImagen($datos);
    			 }
    			 else 
    			 {
    			 	if(move_uploaded_file($tmpimagen, $uploaddir))
    			 	{
    			 		$datos['ruta_archivo']=$uploaddir;
    			 		$r=$this->m_operador->guardaImagen($datos);
    			 	}
    			 }		    	
    		}else {
    			echo 'formato no valido';
    		}
    	}
    	function limpia_cadena($string)
    	{
    		$string = trim($string);
    	
    		$string = str_replace(
    				array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
    				array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
    				$string
    		);
    	
    		$string = str_replace(
    				array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
    				array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
    				$string
    		);
    	
    		$string = str_replace(
    				array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
    				array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
    				$string
    		);
    	
    		$string = str_replace(
    				array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
    				array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
    				$string
    		);
    	
    		$string = str_replace(
    				array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
    				array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
    				$string
    		);
    	
    		$string = str_replace(
    				array('ñ', 'Ñ', 'ç', 'Ç'),
    				array('n', 'N', 'c', 'C',),
    				$string
    		);
    	
    		//Esta parte se encarga de eliminar cualquier caracter extraño
    		$string = str_replace(
    				array("\\", "¨", "º", "-", "~",
    						"#", "@", "|", "!", "\"",
    						"·", "$", "%", "&", "/",
    						"(", ")", "?", "'", "¡",
    						"¿", "[", "^", "`", "]",
    						"+", "}", "{", "¨", "´",
    						">", "< ", ";", ",", ":"),
    				'',
    				$string
    		);
    	
    		return $string;
    	}
    	 
	function pruebas(){
		$id_evento= 6;
		$datos['evento']=$id_evento;
		$datos['usuario']=$this->id_usuario;
		
		$datos['imagen']=$this->m_operador->getImagen($datos);
		
		
		$data['content'] = $this->load->view('operador/pruebas.php', $datos, true);
		$this->load->view('operador/v_template.php', $data, false);
	}
   
  	}
   

