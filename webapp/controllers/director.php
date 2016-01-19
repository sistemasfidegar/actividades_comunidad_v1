<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class director extends CI_Controller {

    var $id_usuario = null;
    

    public function __construct() {
        parent::__construct();
             
        if (!$this->session->userdata('logged_in')) {
            redirect('main');
        } else if ($this->session->userdata('id_perfil') != 3) {
            echo '<br /><br /><center><div >
				 	<table cellpadding="0" cellspacing="0" border="0" style="width:525px; height:34px; border: 2px solid #7F0000; background:#ffffff; color:#7F0000; font-family: Arial; font-weight:bold; font-size:20px;">
				 	<tr>
				 	<td width="60px" valign="middle" align="center"><img src="' . base_url() . 'resources/images/warning.png"/></td>
				 	<td valign="middle">NO EST&Aacute; AUTORIZADO PARA INGRESAR AQU&Iacute;</td>
				 	</tr>
				 	</table>
				 	</div>';
            echo '<a href="javascript:history.back(-1);">Regresar</a></center>';
            exit();
        }
        
        $this->id_usuario = (int) $this->session->userdata("id_usuario");
        
        
        $this->load->model('m_director');
        $this->load->model('m_catalogos');
        $this->load->helper('my_date_helper');
       
    }

    public function index() {
        
         $datos['content'] = $this->load->view('director/v_index.php', null, true);
        $this->load->view('director/v_template.php', $datos, false);
    }
    function listado() {
    	 
    	$mes=$this->input->post('mes');
    	$anio=$this->input->post('anio');
    	
    	$aux=$this->m_director->getAllEventos($mes, $anio);
    	$listado['lista']= $aux;
    	$participantes= array();
    	$lugar=array();
    	$logistica=array();
    	 
    	foreach ($aux as $dato){
    		$lugar[$dato['id_evento']]=$this->m_catalogos->getLugar($dato['id_tipo_lugar'], $dato['id_lugar']);
    	}
    	 
    	foreach ($aux as $dato){
    		$participantes[$dato['id_evento']]=$this->m_catalogos->getDelegacionInvolucradas($dato['id_evento']);
    	}
    	foreach ($aux as $dato){
    		$logistica[$dato['id_evento']]=$this->m_catalogos->getLogisticaxEvanto($dato['id_evento']);
    	}
    	$listado['logistica']=$logistica;
    	$listado['participantes']=$participantes;
    	$listado['lugar']=$lugar;
    
    	 
    	$datos['content'] = $this->load->view('director/listado.php',$listado, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    function BorrarEvento($id_evento){
    	
    	
    	$datos['borraEvento']=$this->m_director->BorraEvento($id_evento);
    	$datos['borraRes']=$this->m_director->BorraResultado($id_evento);
    	$datos['borraFoto']=$this->m_director->BorraFoto($id_evento);
    	$this->listado();
    }
    
    public function guardaEvento()
    {

    	$data['id_usuario_registra'] = $this->id_usuario;
    	$data['id_tipo'] = (int) $this->input->post('id_tipo');
    	$data['actividad'] = (int) $this->input->post('id_actividad');
    	$data['id_responsable'] = (int) $this->input->post('id_responsable');
    	
    	$aux=$this->m_director->getDelUsuario($data['id_responsable']);
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
    	$data['fecha_fin'] = misql($this->input->post('fecha_inicio'));
    	$data['horario'] = $this->input->post('hora_inicio');
    	
    	$data['latitud'] = $this->input->post('latbox');
    	$data['longitud'] = $this->input->post('lonbox');
   		
    	$involucrados = null;
    	$involucrados = $this->input->post('involucrados');
    	
   		$result = $this->m_director->insertaEvento($data);
    	
    	
    	if($result!=null)
    	{
	    	$id_evento = $result[0]['id_evento'];
	    	
	    	if($data['id_tipo']==2)
	    	{
		    	foreach($involucrados as $val)
		    	{
		    		if($val!= $data['id_delegacion'])
		    		{
		    		 	$r = $this->m_director->insertaInvolucrado($id_evento, $val);
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
	    			
	    			$r = $this->m_director->insertaLogistica($id_evento, $id_logistica, $cantidad);
	    		}	    		
	    	}
	    		 
	    	echo "ok";
    	}
    	else
    	{
    		echo "bad";
    	}
    }
    
    public function updateEvento()
    {
     	$data['id_evento']=(int)$this->input->post('id_evento');
     	    	    	    	 
    	$data['id_usuario_registra'] = $this->id_usuario;
    	$data['id_tipo'] = (int) $this->input->post('id_tipo');
    	$data['actividad'] = (int) $this->input->post('id_actividad');
    	$data['id_responsable'] = (int) $this->input->post('id_responsable');
    	 
    	$aux=$this->m_director->getDelUsuario($data['id_responsable']);
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
    	$data['fecha_fin'] = misql($this->input->post('fecha_inicio'));
    	$data['horario'] = $this->input->post('hora_inicio');
    	$data['latbox'] = $this->input->post('latbox');
    	$data['lonbox'] = $this->input->post('lonbox');

    	$involucrados = null;
    	$involucrados = $this->input->post('involucrados');
    	 
    	$result = $this->m_director->updateEvento($data);
    	 
    	 
    	if($result!=null)
    	{
    		$id_evento = $data['id_evento'];
    
    		if($data['id_tipo']==2)
    		{
    			//SE ELIMINAN LOS INVOLUCRADOS
    			$this->m_director->borraInvolucrados($data['id_evento']);
    			
    			foreach($involucrados as $val)
    			{    				
    				if($val!= $data['id_delegacion'])
    				{
    					$r = $this->m_director->insertaInvolucrado($id_evento, $val);
    				}
    			}
    		}
    		
    		
    		//SE ELIMINA LA LOGISTICA Y SE VUELVE A INSERTAR
    		$this->m_director->borraLogistica($data['id_evento']);
    		$aux_log = $this->input->post('logistica');
    		$aux_cant = $this->input->post('cantidad');
    		
    		if($aux_log[0]!=0)
    		{
    			for($i=0;$i<count($aux_log);$i++)
    			{
    				if($aux_log[$i]!=0)
    				{
		    			$id_logistica = $aux_log[$i];
		    		
		    			$cantidad = 0;
		    			if($aux_cant[$i]!="")
		    				$cantidad = $aux_cant[$i];
		    		
		    				$r = $this->m_director->insertaLogistica($data['id_evento'], $id_logistica, $cantidad);
    				}
    			}
    		}
    		
    
    		echo "ok";
    	}
    	else
    	{
    		echo "bad";
    	}
    }
    
    
    public function agenda() {
    	
    	$data['registros'] = $this->m_director->getEventos();
    	$data['delegaciones']=$this->m_director->getCatDelegaciones();
    	
    
    	$datos['content'] = $this->load->view('director/v_agenda.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    
    
    public function detalleEvento($id_evento) {
    	
    	$aux=$this->m_catalogos->getDelegacionInvolucradas($id_evento);
    	
    	$involucrados=array();
    	foreach ($aux as $value){
    		$involucrados[]=$value['id_delegacion']; 
    	}
    	$datos['usuario'] = $this->id_usuario;
 		$datos['involucrados']=$involucrados;
 		$datos['responsable'] = $this->m_catalogos->getResponsable();
 		$datos['ejes'] = $this->m_catalogos->getEjeTematico();
 		$datos['coordinacion']=$this->m_catalogos->getCoordinacion();
 		$datos['delegaciones'] = $this->m_director->getCatDelegaciones();
 		$datos['logistica'] = $this->m_catalogos->getLogistica();
 		$datos['actividad'] = $this->m_catalogos->getActividad();
       	$aux = $this->m_catalogos->getOperador($id_evento);       	       	
    	$datos['dato'] = $aux[0];
    	
    	$id_sede = $aux[0]['id_tipo_lugar'];
    	$datos['sedes'] = $this->m_director->getSedeRespectiva($id_sede);
    	    	    	
    	$datos['log_x_evento'] = $this->m_director->getLogisticaEvento($id_evento);
    	
    	$datos['imagen']=$this->m_director->getImagen($id_evento);
    	
    	$datos['content'] = $this->load->view('director/form_modifica.php', $datos, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    

    public function registro_evento() {
    	 
    	$data['ejes'] = $this->m_catalogos->getEjeTematico();
    	$data['coordinaciones'] = $this->m_catalogos->getCoordinacion();
    	$data['delegaciones'] = $this->m_catalogos->getDelegacion();
    	$data['responsable'] = $this->m_catalogos->getResponsable();
    	$data['logistica'] = $this->m_catalogos->getLogistica();
     	$data['actividad']=$this->m_catalogos->getActividad();
    	$datos['content'] = $this->load->view('director/form_nuevo_evento.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    
    /*
    public function ajaxGetEspacios()
    {
    	$espacios = $this->m_catalogos->get_espacio_publico();
    	
    	echo '<option value="0">[Seleccionar]</option>';
    	foreach($espacios as $row)
    	{
    		echo '<option value="'.$row['id_espacio_publico'].'">'.$row['espacio_publico'].'</option>';
    	}
    }
    */
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
    	
    	
    }
	
    public function cat_eje(){
    	
    	$data['eje']=$this->m_catalogos->getEjeTematico();
    	
    	$datos['content'] = $this->load->view('director/catalogo_eje_lista.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    public function buscaEje($id_eje){
    	$aux=$this->m_director->getUnEje($id_eje);
    	$data['busca']=$aux[0];
    	$datos['content'] = $this->load->view('director/catalogo_eje.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
	public function cat_coordinacion(){
    	 
    	$data['coordinacion']=$this->m_catalogos->getCoordinacion();
    	 
    	$datos['content'] = $this->load->view('director/catalogo_coo_lista.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    public function buscaCoordinacion($id_coordinacion){
    	$aux=$this->m_director->getUnCoordinacion($id_coordinacion);
    	$data['busca']=$aux[0];
    	$datos['content'] = $this->load->view('director/catalogo_coordinacion.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    public function cat_logistica(){
    	 
    	$data['logistica']=$this->m_catalogos->getLogistica();
    	 
    	$datos['content'] = $this->load->view('director/catalogo_logistica_lista.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    public function buscaLogistica($id_log){
    	$aux=$this->m_director->getUnLogistica($id_log);
    	$data['busca']=$aux[0];
    	$datos['content'] = $this->load->view('director/catalogo_logistica.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    public function cat_escAdultos(){
    	$data['escuela']=$this->m_director->get_escuelaADel();
    	$data['delegaciones'] = $this->m_director->getCatDelegaciones();
    	$datos['content'] = $this->load->view('director/catalogo_escAdultos_lista.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    public  function buscaEsc($id_esc){
    	$aux=$this->m_director->getUnEsc($id_esc);
    	$data['busca']=$aux[0];
    	$data['delegaciones'] = $this->m_director->getCatDelegaciones();
    	$datos['content'] = $this->load->view('director/catalogo_escAdultos.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    public function cat_espacio_publico(){
    
    	$data['espacio_publico']=$this->m_director->get_espacio_publicoDel();
    	$data['delegaciones'] = $this->m_director->getCatDelegaciones();
    	$datos['content'] = $this->load->view('director/catalogo_espacio_lista.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    public function buscaespacio($id_esc){
    	$aux=$this->m_director->getUnEspacio($id_esc);
    	$data['busca']=$aux[0];
    	$data['delegaciones'] = $this->m_director->getCatDelegaciones();
    	$datos['content'] = $this->load->view('director/catalogo_espacio.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    public function cat_museo(){
    	$data['museo']=$this->m_director->get_museoDel();
    	$data['delegaciones'] = $this->m_director->getCatDelegaciones();
    	$datos['content'] = $this->load->view('director/catalogo_museos_lista.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    	
    }
    public function buscaMuseo($id_museo){
    	$aux=$this->m_director->getUnMuseo($id_museo);
    	$data['busca']=$aux[0];
    	$data['delegaciones'] = $this->m_director->getCatDelegaciones();
    	$datos['content'] = $this->load->view('director/catalogo_museo.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    public function tipo_actividad(){
    
    	$data['tipo_actividad']=$this->m_director->get_tipo_actividad();
    	
    	$datos['content'] = $this->load->view('director/catalogo_tipo_actividad_lista.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    function buscaActividad($id_actividad){
    	$aux=$this->m_director->getUnActividad($id_actividad);
    	$data['actividad']=$aux[0];
    	$datos['content'] = $this->load->view('director/catalogo_tipo_actividad.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    public function guardaCatalogo(){
    
    	$datos['tipo']=$this->input->post('tipo');
    
    	if($datos['tipo']=='eje'){
    
    		$cat['eje']=$this->input->post('nombre_eje');
    		$res= $this->m_director->insertEje($cat);
    	}
    	elseif($datos['tipo']=='coordinacion'){
    		$cat['siglas']=$this->input->post('siglas');
    		$cat['coordinacion']=$this->input->post('coordinacion');
    		$res= $this->m_director->insertCoordinacion($cat);
    	}
    	elseif($datos['tipo']=='espacio'){
    		$cat['espacio']=$this->input->post('espacio');
    		$cat['tipo_es']=(int)$this->input->post('tipo_espacio');
    		$cat['direccion']=$this->input->post('direccion');
    		$cat['delegacion']=$this->input->post('delegacion');
    		$res= $this->m_director->insertEspacio($cat);
    	}
    	elseif($datos['tipo']=='logistica'){
    		$cat['logistica']=$this->input->post('logistica');
    		
    		$res= $this->m_director->insertLogistica($cat);
    	}
    	elseif ($datos['tipo']=='escuela'){
    		$cat['nombre']=$this->input->post('NombreEsc');
    		$cat['direccion']=$this->input->post('Direccion');
    		$cat['delegacion']=$this->input->post('delegacion');
    		$res=$this->m_director->insertEscuela($cat);
    	}
    	elseif ($datos['tipo']=='museo'){
    		$cat['museo']=$this->input->post('museo');
    		$cat['direccion']=$this->input->post('direccion');
    		$cat['delegacion']=(int)$this->input->post('delegacion');
    		$res=$this->m_director->insertMuseo($cat);
    	}
    	elseif ($datos['tipo']=='actividad'){
    		$cat['actividad']=$this->input->post('actividad');
    		$res=$this->m_director->insertActividad($cat);
    		
    	}
    
    
    
    	if ($res == 1){
    		echo 'ok';
    	}
    	else
    		echo 'bad';
    
    
    }
    public function updateCatalogo(){
    
    	$datos['update']=$this->input->post('update');
    
    	if($datos['update']=='eje'){
    
    		$cat['eje']=$this->input->post('eje');
    		$cat['id_eje']=$this->input->post('id_eje');
    		$res= $this->m_director->updateEje($cat);
    	}
    	if($datos['update']=='coordinacion'){
    	
    		$cat['coordinacion']=$this->input->post('coordinacion');
    		$cat['siglas']=$this->input->post('siglas');
    		$cat['id_coordinacion']=$this->input->post('id_coordinacion');
    		$res= $this->m_director->updateCoordinacion($cat);
    	}
    	if($datos['update']=='logistica'){
    		$cat['logistica']=$this->input->post('logistica');
    		$cat['id_logistica']=$this->input->post('id_logistica');
    		$res= $this->m_director->updateLogistica($cat);
    	}
    	if($datos['update']=='escuela'){
    		$cat['escuela']=$this->input->post('nombre');
    		$cat['id_escuela']=(int)$this->input->post('id_escuela');
    		$cat['direccion']=$this->input->post('direccion');
    		
			$cat['delegacion']=(int)$this->input->post('delegacion');
    		$res= $this->m_director->updateEscuela($cat);
    	}
    	if ($datos['update']=='espacio'){
    		$cat['nombre']=$this->input->post('nombre');
    		$cat['tipo']=(int)$this->input->post('tipo_espacio');
    		$cat['id_delegacion']=(int)$this->input->post('delegacion');
    		$cat['direccion']=$this->input->post('direccion');
    		
    		$cat['id_espacio_publico']=(int)$this->input->post('id_espacio_publico');
    		$res= $this->m_director->updateEspacioP($cat);
    		
    	}
    	if ($datos['update']=='museo'){
    		$cat['museo']=$this->input->post('museo');
    		$cat['id_delegacion']=(int)$this->input->post('delegacion');
    		$cat['direccion']=$this->input->post('direccion');
    		$cat['id_museo']=(int)$this->input->post('id_museo');
    		$res= $this->m_director->updateMuseo($cat);
    	}
    	elseif ($datos['update']=='tipo_actividad'){
    		$cat['actividad']=$this->input->post('tipo_actividad');
    		$cat['id_actividad']=$this->input->post('id_tipo_actividad');
    		$res=$this->m_director->updateActividad($cat);
    	
    	}
    
    	if ($res == 1){
    		echo 'ok';
    	}
    	else
    		echo 'bad';
    
    
    }
    //busqueda por delegacion de usuario
    /*
    public function getDelegacionMapa($id_usuario)
    {
    	$aux = $this->m_catalogos->getDelegacionMapa($id_usuario);
    	//$aux = $this->m_catalogos->getDireccion($id_tipo_lugar,$id_lugar);
    	
    	if($aux!=null && $aux[0]['delegacion']!="UNIVERSITARIOS")
    	{
    		echo $aux[0]['delegacion'];
    	}
    	else
    	{
    		echo "ZOCALO DF";
    	}
    }*/
    //busqueda por direccion
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
   /* public function save_foto(){
    	$datos['id_evento']=(int)$this->input->post('id_evento');
    	$datos['id_usuario']=$this->id_usuario;
    
    	$type = explode('.',$_FILES['archivo']['name']);
    	$type = strtolower($type[count($type)-1]);//obtengo la extencion
    	$uploaddir = 'resources/archivos/'.'foto'.$datos['id_evento'].'_'.rand().'.'.$type;
    
    	$nombre_arch = $this->limpia_cadena(utf8_decode($_FILES['archivo']['name']));
    	$fileTmploc = $_FILES['archivo']['tmp_name'];
    	if(in_array($type, array("jpg", "jpeg", "gif", "png"))){
    		if(is_uploaded_file($fileTmploc)){
	    		if(move_uploaded_file($fileTmploc, $uploaddir))
	    		{
	    			echo 'completo';
	    
	    			$datos['ruta_archivo']=$uploaddir;
	    			$r=$this->m_director->guardaImagen($datos);
	    
	    
	    		}
    		}
    		
    	}else {
    				echo 'formato no valido';
    	}
    
    }
    *
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
    		 
    
    		$imagen_origen=imagecreatefromjpeg($_FILES['archivo']['tmp_name']);
    		$ancho=imagesx($imagen_origen);//saca ancho
    		$alto=imagesy($imagen_origen);//saca alto
    		 
    		 
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
    		$r=$this->m_director->guardaImagen($datos);
    		////////////////////////////////////////////////////////////
    
    	}else {
    		echo 'formato no valido';
    	}
    }
    
    function limpia_cadena($string)
    {
    	$string = trim($string);
    
    	$string = str_replace(
    			array('Ã¡', 'Ã ', 'Ã¤', 'Ã¢', 'Âª', 'Ã�', 'Ã€', 'Ã‚', 'Ã„'),
    			array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
    			$string
    	);
    
    	$string = str_replace(
    			array('Ã©', 'Ã¨', 'Ã«', 'Ãª', 'Ã‰', 'Ãˆ', 'ÃŠ', 'Ã‹'),
    			array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
    			$string
    	);
    
    	$string = str_replace(
    			array('Ã­', 'Ã¬', 'Ã¯', 'Ã®', 'Ã�', 'ÃŒ', 'Ã�', 'ÃŽ'),
    			array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
    			$string
    	);
    
    	$string = str_replace(
    			array('Ã³', 'Ã²', 'Ã¶', 'Ã´', 'Ã“', 'Ã’', 'Ã–', 'Ã”'),
    			array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
    			$string
    	);
    
    	$string = str_replace(
    			array('Ãº', 'Ã¹', 'Ã¼', 'Ã»', 'Ãš', 'Ã™', 'Ã›', 'Ãœ'),
    			array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
    			$string
    	);
    
    	$string = str_replace(
    			array('Ã±', 'Ã‘', 'Ã§', 'Ã‡'),
    			array('n', 'N', 'c', 'C',),
    			$string
    	);
    
    	//Esta parte se encarga de eliminar cualquier caracter extraÃ±o
    	$string = str_replace(
    			array("\\", "Â¨", "Âº", "-", "~",
    					"#", "@", "|", "!", "\"",
    					"Â·", "$", "%", "&", "/",
    					"(", ")", "?", "'", "Â¡",
    					"Â¿", "[", "^", "`", "]",
    					"+", "}", "{", "Â¨", "Â´",
    					">", "< ", ";", ",", ":"),
    			'',
    			$string
    	);
    
    	return $string;
    }
    function exportaExcel()
    {
    	$archivo = 'tabla_'.date('dmY_hi').'.xls';
    	 
    	if( $_POST['datos_a_enviar']!=null)
    	{
    		header("Content-type: application/vnd.ms-excel; name='excel'");
    		header("Content-Disposition: filename=$archivo");
    		header("Pragma: no-cache");
    		header("Expires: 0");
    		 
    		echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
    		echo $_POST['datos_a_enviar'];
    	}
    }
    function pruebas(){
    	$datos['content'] = $this->load->view('director/pruebas.php',true, true);
    	$this->load->view('director/v_template.php', $datos, false);
    	
    }
    
}
