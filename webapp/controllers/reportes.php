<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class reportes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
             
        if (!$this->session->userdata('logged_in'))
        {
            redirect('main');
        } 
        else if($this->session->userdata('id_perfil') != 3)
        {
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
        
        
        $this->load->model('m_catalogos');
        $this->load->model('m_reportes');
        $this->load->helper('my_date_helper');
        $this->load->helper('utilerias_helper');
       
    }

        
    public function generaSemanal() {
    	
    	
    	$data['id_tipo_reporte'] = (int)$this->input->post('id_tipo_reporte');
    	    	
    	$fi = misql($this->input->post('fecha_inicio'));
    	$ff = strtotime('+6 day', strtotime($fi)) ;
    	$ff = date('Y-m-j', $ff);
    	$data['fecha_inicio'] = $this->input->post('fecha_inicio');
    	
    	$aux = explode("-",$ff);
    	$data['fecha_fin'] = $aux[2]."/".$aux[1]."/".$aux[0];
    	
    	//TOTALES
    	if($data['id_tipo_reporte']==1)//////////////////
    	{
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$data['delegaciones'] = $auxdel;
    		$aux = $this->m_reportes->getTotalActividades($fi, $ff);
    		
    		$valores = array();
    		foreach($aux as $val)
    		{
    			$valores[$val['id_delegacion']]['actividades'] = 0;
    			
    			if($val['tot_act']!="")
    				$valores[$val['id_delegacion']]['actividades'] = $val['tot_act'];
    		}
    		
    		
    		foreach($auxdel as $del)
    		{
    			$valores[$del['id_delegacion']]['validaciones'] = 0;
    			$valores[$del['id_delegacion']]['coordinadores'] = 0;
    			$valores[$del['id_delegacion']]['promotores'] = 0;
    			
    			$r = $this->m_reportes->getTotales($del['id_delegacion'], $fi, $ff);
    			
    			if($r!=null)
    			{   
    				if($r[0]['validados']!="") 				
    					$valores[$del['id_delegacion']]['validaciones'] = $r[0]['validados'];
    				
    				if($r[0]['coord']!="")
    					$valores[$del['id_delegacion']]['coordinadores'] = $r[0]['coord'];
    				
    				if($r[0]['prom']!="")
    					$valores[$del['id_delegacion']]['promotores'] = $r[0]['prom'];    				
    			}
    		}
    		
    		/*echo "<pre>";
    		print_r($valores);
    		echo "</pre>";*/
    		
    		$data['datos'] = $valores;
    		
    	}
    	if($data['id_tipo_reporte']==2)//////////////////
    	{
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$data['delegaciones'] = $auxdel;
    		
    		$valores = array();
    		foreach ($auxdel as $del){
	    		
	    		
	    			$valores[$del['id_delegacion']]['arte'] = 0;
	    			$valores[$del['id_delegacion']]['ciencia'] = 0;
	    			$valores[$del['id_delegacion']]['deporte'] = 0;
	    			$valores[$del['id_delegacion']]['economia'] = 0;
	    			$valores[$del['id_delegacion']]['ambiente'] = 0;
	    			$valores[$del['id_delegacion']]['participacion'] = 0;
	    			$valores[$del['id_delegacion']]['salud'] = 0;
	    			
	    			$r=$this->m_reportes->getEjesxSemana($del['id_delegacion'],2,$fi, $ff);
	    			if($r!=null){
	    				$valores[$del['id_delegacion']]['arte'] = $r[0]['value'];
	    				$valores[$del['id_delegacion']]['delegacion']=$r[0]['id_delegacion'];
	    			}
	    			$r=$this->m_reportes->getEjesxSemana($del['id_delegacion'],3,$fi, $ff);
	    			if($r!=null){
	    				$valores[$del['id_delegacion']]['ciencia'] = $r[0]['value'];
	    			}
	    			$r=$this->m_reportes->getEjesxSemana($del['id_delegacion'],4,$fi, $ff);
	    			if($r!=null){
	    				$valores[$del['id_delegacion']]['deporte'] = $r[0]['value'];
	    			}
	    			$r=$this->m_reportes->getEjesxSemana($del['id_delegacion'],5,$fi, $ff);
	    			if($r!=null){
	    				$valores[$del['id_delegacion']]['economia'] = $r[0]['value'];
	    			}
	    			$r=$this->m_reportes->getEjesxSemana($del['id_delegacion'],6,$fi, $ff);
	    			if($r!=null){
	    				$valores[$del['id_delegacion']]['ambiente'] = $r[0]['value'];
	    			}
	    			$r=$this->m_reportes->getEjesxSemana($del['id_delegacion'],7,$fi, $ff);
	    			if($r!=null){
	    				$$valores[$del['id_delegacion']]['participacion'] = $r[0]['value'];
	    			}
	    			$r=$this->m_reportes->getEjesxSemana($del['id_delegacion'],8,$fi, $ff);
	    			if($r!=null){
	    				$valores[$del['id_delegacion']]['salud'] = $r[0]['value'];
	    			}
	  		}
	  		$data['datos'] = $valores;
    	}
    	if($data['id_tipo_reporte']==3){////////////////////////////////
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$data['delegaciones'] = $auxdel;
    		$auxesp=$this->m_reportes->getEspaciosP();
    		$data['espacios']=$auxesp;
    		$valores = array();
    		foreach ($auxesp as $row){
    			$valores[$row['id_espacio_publico']]['validado'] = 0;
    			
    			 $r=$this->m_reportes->getValidacionesEspacios($row['id_espacio_publico'], $fi, $ff);
    			if($r!=null)
    			{
    				if($r[0]['val']!=""){
    					$valores[$row['id_espacio_publico']]['validado'] = $r[0]['val'];
    				}
    			}
    			
    		}
    		
    		$data['datos'] = $valores;
    		
    	}
    	if($data['id_tipo_reporte']==4){////////////////////////////////////////////////////////////////////////////////////////
    		
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$auxplan =  $this->m_reportes->getPlantel();
    		$data['planteles']=$auxplan;
    		$data['delegaciones'] =$auxdel;
    		
    		$valores = array();
    		foreach ($auxplan as $row){
    			
    			$valores[$row['id_plantel']]['validado'] = 0;
    		
    			$r = $this->m_reportes->getValidacionesPlantel($row['id_plantel'], $fi, $ff); 
    			
    			if($r!=null)
    			{
    				if($r[0]['val']!=""){
    					$valores[$row['id_plantel']]['validado'] = $r[0]['val'];
    				}
    			}
    		
    		}
    		$data['datos'] = $valores;
    	}
    	if($data['id_tipo_reporte']==5){////////////////////////////////////////////////////////////////
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$data['delegaciones'] =$auxdel;
    		$auxmus =$this->m_reportes->getMuseos();
    		$data['museos']=$auxmus;
    		$valores = array();
    		
    		foreach ($auxmus as $row){
    			 
    			$valores[$row['id_museo']]['validado'] = 0;
    		
    			$r = $this->m_reportes->getValidacionesMuseo($row['id_museo'], $fi, $ff);
    			 
    			if($r!=null)
    			{
    				if($r[0]['val']!=""){
    					$valores[$row['id_museo']]['validado'] = $r[0]['val'];
    				}
    			}
    		
    		}
    	}                                                                                                                        
    		if($data['id_tipo_reporte']==6){////////////////////////////////////////////////////////////////
    			$auxdel = $this->m_reportes->getDelegaciones();
    			$data['delegaciones'] =$auxdel;
    			$auxesc = $this->m_reportes->getEscuelaAdulto();
    			$data['escuelas']=$auxesc;
    			$valores = array();
    			foreach ($auxesc as $row){
    		
    				$valores[$row['id_escuela_adulto']]['validado'] = 0;
    		
    				$r = $this->m_reportes->getValidacionesEscuela($row['id_escuela_adulto'], $fi, $ff);
    		
    				if($r!=null)
    				{
    					if($r[0]['val']!=""){
    						$valores[$row['id_escuela_adulto']]['validado'] = $r[0]['val'];
    					}
    				}
    		
    			}
    		$data['datos'] = $valores;
    		
    		    		
    	}
    	
    
    	$datos['content'] = $this->load->view('reportes/v_semanal.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    
    
    
    public function generaMensual() {
    	
    	$data['id_tipo_reporte'] = (int)$this->input->post('id_tipo_reporte');
    	$data['anio'] = (int)$this->input->post('anio');
    	$data['mes'] = $this->input->post('mes');
    	
    	
    	//TOTALES
    	if($data['id_tipo_reporte']==1)
    	{
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$data['delegaciones'] = $auxdel;
    		$aux = $this->m_reportes->getTotalActividadesxMes($data['mes'], $data['anio']);
    		
    		$valores = array();
    		foreach($aux as $val)
    		{
    			$valores[$val['id_delegacion']]['actividades'] = 0;
    			 
    			if($val['tot_act']!="")
    				$valores[$val['id_delegacion']]['actividades'] = $val['tot_act'];
    		}
    		
    		
    		foreach($auxdel as $del)
    		{
    			$valores[$del['id_delegacion']]['validaciones'] = 0;
    			$valores[$del['id_delegacion']]['coordinadores'] = 0;
    			$valores[$del['id_delegacion']]['promotores'] = 0;
    			 
    			$r = $this->m_reportes->getTotalesxMes($del['id_delegacion'], $data['mes'], $data['anio']);
    			 
    			if($r!=null)
    			{
    				if($r[0]['validados']!="")
    					$valores[$del['id_delegacion']]['validaciones'] = $r[0]['validados'];
    		
    				if($r[0]['coord']!="")
    					$valores[$del['id_delegacion']]['coordinadores'] = $r[0]['coord'];
    		
    				if($r[0]['prom']!="")
    					$valores[$del['id_delegacion']]['promotores'] = $r[0]['prom'];
    			}
    		}
    		
    		$data['datos'] = $valores;
    	}
    	if($data['id_tipo_reporte']==3)///Espacio publico
    	{
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$data['delegaciones'] = $auxdel;
    		$auxesp=$this->m_reportes->getEspaciosP();
    		$data['espacios']=$auxesp;
    		$valores = array();
    		foreach ($auxesp as $row){
    			$valores[$row['id_espacio_publico']]['validado'] = 0;
    			 
    			$r=$this->m_reportes->getValidacionesEspaciosxMes($row['id_espacio_publico'], $data['mes'], $data['anio']);
    			if($r!=null)
    			{
    				if($r[0]['val']!=""){
    					$valores[$row['id_espacio_publico']]['validado'] = $r[0]['val'];
    				}
    			} 
    		}
    		
    		$data['datos'] = $valores;
    		
    	}
    	if($data['id_tipo_reporte']==2)
    	{
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$data['delegaciones'] = $auxdel;
    		$valores = array();
    		foreach ($auxdel as $del){
    			 
    			 
    			$valores[$del['id_delegacion']]['arte'] = 0;
    			$valores[$del['id_delegacion']]['ciencia'] = 0;
    			$valores[$del['id_delegacion']]['deporte'] = 0;
    			$valores[$del['id_delegacion']]['economia'] = 0;
    			$valores[$del['id_delegacion']]['ambiente'] = 0;
    			$valores[$del['id_delegacion']]['participacion'] = 0;
    			$valores[$del['id_delegacion']]['salud'] = 0;
    		
    			$r=$this->m_reportes->getEjesxMes($del['id_delegacion'],2, $data['mes'], $data['anio']);
    			if($r!=null){
    				$valores[$del['id_delegacion']]['arte'] = $r[0]['value'];
    				$valores[$del['id_delegacion']]['delegacion']=$r[0]['id_delegacion'];
    			}
    			$r=$this->m_reportes->getEjesxMes($del['id_delegacion'],3, $data['mes'], $data['anio']);
    			if($r!=null){
    				$valores[$del['id_delegacion']]['ciencia'] = $r[0]['value'];
    			}
    			$r=$this->m_reportes->getEjesxMes($del['id_delegacion'],4, $data['mes'], $data['anio']);
    			if($r!=null){
    				$valores[$del['id_delegacion']]['deporte'] = $r[0]['value'];
    			}
    			$r=$this->m_reportes->getEjesxMes($del['id_delegacion'],5, $data['mes'], $data['anio']);
    			if($r!=null){
    				$valores[$del['id_delegacion']]['economia'] = $r[0]['value'];
    			}
    			$r=$this->m_reportes->getEjesxMes($del['id_delegacion'],6, $data['mes'], $data['anio']);
    			if($r!=null){
    				$valores[$del['id_delegacion']]['ambiente'] = $r[0]['value'];
    			}
    			$r=$this->m_reportes->getEjesxMes($del['id_delegacion'],7, $data['mes'], $data['anio']);
    			if($r!=null){
    				$$valores[$del['id_delegacion']]['participacion'] = $r[0]['value'];
    			}
    			$r=$this->m_reportes->getEjesxMes($del['id_delegacion'],8, $data['mes'], $data['anio']);
    			if($r!=null){
    				$valores[$del['id_delegacion']]['salud'] = $r[0]['value'];
    			}
    		}
    		$data['datos'] = $valores;
   
    	}
    	if($data['id_tipo_reporte']==4)///Plantel
    	{
    		
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$auxplan =  $this->m_reportes->getPlantel();
    		$data['planteles']=$auxplan;
    		$data['delegaciones'] =$auxdel;
    		$valores = array();
    		
    		foreach ($auxplan as $row){
    			
    			$valores[$row['id_plantel']]['validado'] = 0;
    		
    			$r = $this->m_reportes->getValidacionesPlantelxMes($row['id_plantel'], $data['mes'], $data['anio']); 
    			
    			if($r!=null)
    			{
    				if($r[0]['val']!=""){
    					$valores[$row['id_plantel']]['validado'] = $r[0]['val'];
    				}
    			}
			}
    		$data['datos'] = $valores;
    	}
    	if($data['id_tipo_reporte']==5){///// museos
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$data['delegaciones'] =$auxdel;
    		$auxmus =$this->m_reportes->getMuseos();
    		$data['museos']=$auxmus;
    		$valores = array();
    		foreach ($auxmus as $row){
    	
    			$valores[$row['id_museo']]['validado'] = 0;
    	
    			$r = $this->m_reportes->getValidacionesMuseoxMes($row['id_museo'], $data['mes'], $data['anio']);
    	
    			if($r!=null)
    			{
    				if($r[0]['val']!=""){
    					$valores[$row['id_museo']]['validado'] = $r[0]['val'];
    				}
    			}
    	
    		}
    		$data['datos'] = $valores;
    	}
    	if($data['id_tipo_reporte']==6){////////////////////////////////////////////////////////////////
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$data['delegaciones'] =$auxdel;
    		$auxesc = $this->m_reportes->getEscuelaAdulto();
    		$data['escuelas']=$auxesc;
    		$valores = array();
    		foreach ($auxesc as $row){
    	
    			$valores[$row['id_escuela_adulto']]['validado'] = 0;
    	
    			$r = $this->m_reportes->getValidacionesEscuelaxMes($row['id_escuela_adulto'], $data['mes'], $data['anio']);
    	
    			if($r!=null)
    			{
    				if($r[0]['val']!=""){
    					$valores[$row['id_escuela_adulto']]['validado'] = $r[0]['val'];
    				}
    			}
    	
    		}
    		$data['datos'] = $valores;
    	
    	
    	}
    	 	 
    	$datos['content'] = $this->load->view('reportes/v_mensual.php', $data, true);    	     	 
    	$this->load->view('director/v_template.php', $datos, false);
    }
    
    
    public function generaTrimestral()
    {    	 
      
     
     	$data['id_tipo_reporte'] = (int)$this->input->post('id_tipo_reporte');
    	$data['anio'] = (int)$this->input->post('anio');
    	$data['trimestre'] = $this->input->post('trimestre');
    	$meses = getMesesTrimestre($data['trimestre']);
    	
    	if($data['trimestre']==1){
    		$i=01; $j=02; $k=03;
    	}
    	if($data['trimestre']==2){
    		$i=04; $j=05; $k=06;
    	}
    	if($data['trimestre']==3){
    		$i=07; $j=08; $k=09;
    	}
    	if($data['trimestre']==4){
    		$i=10; $j=11; $k=12;
    	} 
    		
    	
    	//TOTALES
    	
    	if($data['id_tipo_reporte']==1)
    	{
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$data['delegaciones'] = $auxdel;
    		$valores = array();
    		foreach ($auxdel as $del){
    			$valores[$del['id_delegacion']]['actividad1'] = 0;
    			$valores[$del['id_delegacion']]['actividad2'] = 0;
    			$valores[$del['id_delegacion']]['actividad3'] = 0;
    			
    			$valores[$del['id_delegacion']]['validaciones1'] = 0;
    			$valores[$del['id_delegacion']]['validaciones2'] = 0;
    			$valores[$del['id_delegacion']]['validaciones3'] = 0;
    			
    			$valores[$del['id_delegacion']]['coordinadores1'] = 0;
    			$valores[$del['id_delegacion']]['coordinadores2'] = 0;
    			$valores[$del['id_delegacion']]['coordinadores3'] = 0;
    			
    			$valores[$del['id_delegacion']]['promotores1'] = 0;
    			$valores[$del['id_delegacion']]['promotores2'] = 0;
    			$valores[$del['id_delegacion']]['promotores3'] = 0;
    			
    			$valores[$del['id_delegacion']]['Asistentes1'] = 0;
    			$valores[$del['id_delegacion']]['Asistentes2'] = 0;
    			$valores[$del['id_delegacion']]['Asistentes3'] = 0;
    			
    			$valores[$del['id_delegacion']]['esperados1'] =0;
    			$valores[$del['id_delegacion']]['esperados2'] =0;
    			$valores[$del['id_delegacion']]['esperados3'] =0;
    			
	    		$aux = $this->m_reportes->getTotalActividadesxTrimestre($del['id_delegacion'],$i, $data['anio']);
	    		if ($aux!= null)
	    			$valores[$del['id_delegacion']]['actividad1'] = $aux[0]['total'];
	    		
	    		$aux1 = $this->m_reportes->getTotalActividadesxTrimestre($del['id_delegacion'],$j, $data['anio']);
	  			if ($aux1!= null)
	    			$valores[$del['id_delegacion']]['actividad2'] = $aux1[0]['total'];
	  			$aux2 = $this->m_reportes->getTotalActividadesxTrimestre($del['id_delegacion'],$k, $data['anio']);
	  			if ($aux2!= null)
	    			$valores[$del['id_delegacion']]['actividad3'] = $aux2[0]['total'];
	    		
	    		$r = $this->m_reportes->getTotalesxTrimestre($del['id_delegacion'], $i, $data['anio']);
	    		
	    		if($r!=null)
	    		{
	    			if($r[0]['validados']!="")
	    				$valores[$del['id_delegacion']]['validaciones1'] = $r[0]['validados'];
	    			
	    			if($r[0]['asist']!="")
	    				$valores[$del['id_delegacion']]['Asistentes1'] = $r[0]['asist'];
	    			
	    			if($r[0]['coord']!="")
	    				$valores[$del['id_delegacion']]['coordinadores1'] = $r[0]['coord'];
	    		
	    			if($r[0]['prom']!="")
	    				$valores[$del['id_delegacion']]['promotores1'] = $r[0]['prom'];
	    			if($r[0]['esperados']!="")
	    				$valores[$del['id_delegacion']]['esperados1'] = $r[0]['esperados'];
	    		}
	    		$r = $this->m_reportes->getTotalesxTrimestre($del['id_delegacion'], $j, $data['anio']);
	    		
	    		if($r!=null)
	    		{
	    			if($r[0]['validados']!="")
	    				$valores[$del['id_delegacion']]['validaciones2'] = $r[0]['validados'];
	    		
	    			if($r[0]['asist']!="")
	    				$valores[$del['id_delegacion']]['Asistentes2'] = $r[0]['asist'];
	    			
	    			if($r[0]['coord']!="")
	    				$valores[$del['id_delegacion']]['coordinadores2'] = $r[0]['coord'];
	    		
	    			if($r[0]['prom']!="")
	    				$valores[$del['id_delegacion']]['promotores2'] = $r[0]['prom'];
	    			if($r[0]['esperados']!="")
	    				$valores[$del['id_delegacion']]['esperados2'] = $r[0]['esperados'];
	    		}
	    		$r = $this->m_reportes->getTotalesxTrimestre($del['id_delegacion'], $k, $data['anio']);
	    		
	    		if($r!=null)
	    		{
	    			if($r[0]['validados']!="")
	    				$valores[$del['id_delegacion']]['validaciones3'] = $r[0]['validados'];
	    			
	    			if($r[0]['asist']!="")
	    				$valores[$del['id_delegacion']]['Asistentes3'] = $r[0]['asist'];
	    			
	    			if($r[0]['coord']!="")
	    				$valores[$del['id_delegacion']]['coordinadores3'] = $r[0]['coord'];
	    		
	    			if($r[0]['prom']!="")
	    				$valores[$del['id_delegacion']]['promotores3'] = $r[0]['prom'];
	    			if($r[0]['esperados']!="")
	    				$valores[$del['id_delegacion']]['esperados2'] = $r[0]['esperados'];
	    		}
    		
    		}
    		    
    		$data['datos'] = $valores;
    	}
    	if($data['id_tipo_reporte']==2)
    	{
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$data['delegaciones'] = $auxdel;
    		$valores = array();
    		foreach ($auxdel as $del){
    		
    			$valores[$del['id_delegacion']]['arte1'] = 0;
    			$valores[$del['id_delegacion']]['arte2'] = 0;
    			$valores[$del['id_delegacion']]['arte3'] = 0;
    			$valores[$del['id_delegacion']]['ciencia1'] = 0;
    			$valores[$del['id_delegacion']]['ciencia2'] = 0;
    			$valores[$del['id_delegacion']]['ciencia3'] = 0;
    			$valores[$del['id_delegacion']]['deporte1'] = 0;
    			$valores[$del['id_delegacion']]['deporte2'] = 0;
    			$valores[$del['id_delegacion']]['deporte3'] = 0;
    			$valores[$del['id_delegacion']]['economia1'] = 0;
    			$valores[$del['id_delegacion']]['economia2'] = 0;
    			$valores[$del['id_delegacion']]['economia3'] = 0;
    			$valores[$del['id_delegacion']]['ambiente1'] = 0;
    			$valores[$del['id_delegacion']]['ambiente2'] = 0;
    			$valores[$del['id_delegacion']]['ambiente3'] = 0;
    			$valores[$del['id_delegacion']]['participacion1'] = 0;
    			$valores[$del['id_delegacion']]['participacion2'] = 0;
    			$valores[$del['id_delegacion']]['participacion3'] = 0;
    			$valores[$del['id_delegacion']]['salud1'] = 0;
    			$valores[$del['id_delegacion']]['salud2'] = 0;
    			$valores[$del['id_delegacion']]['salud3'] = 0;
    			
    			$r1=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],2,$i, $data['anio']);
    			$r2=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],2,$j, $data['anio']);
    			$r3=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],2,$k, $data['anio']);
    			if($r1 !=null)
    				$valores[$del['id_delegacion']]['arte1'] = $r1[0]['value'];
    			if($r2 !=null)
    				$valores[$del['id_delegacion']]['arte2'] = $r2[0]['value'];
    			if($r3 !=null)
    				$valores[$del['id_delegacion']]['arte3'] = $r3[0]['value'];
    			
    			
    			$r1=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],3, $i, $data['anio']);
    			$r2=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],3, $j, $data['anio']);
    			$r3=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],3, $k, $data['anio']);
    			if($r1 !=null)
    				$valores[$del['id_delegacion']]['ciencia1'] = $r1[0]['value'];
    			if($r2 !=null)
    				$valores[$del['id_delegacion']]['ciencia2'] = $r2[0]['value'];
    			if($r3 !=null)	
    				$valores[$del['id_delegacion']]['ciencia3'] = $r3[0]['value'];
    			
    			$r1=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],4, $i, $data['anio']);
    			$r2=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],4, $j, $data['anio']);
    			$r3=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],4, $k, $data['anio']);
    			if($r1 !=null)
    				$valores[$del['id_delegacion']]['deporte1'] = $r1[0]['value'];
    			if($r2 !=null)
    				$valores[$del['id_delegacion']]['deporte2'] = $r2[0]['value'];
    			if($r3 !=null)
    				$valores[$del['id_delegacion']]['deporte3'] = $r3[0]['value'];
    			
    			$r1=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],5, $i, $data['anio']);
    			$r2=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],5, $j, $data['anio']);
    			$r3=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],5, $k, $data['anio']);
    			if($r1 !=null)
    				$valores[$del['id_delegacion']]['economia1'] = $r1[0]['value'];
    			if($r2 !=null)
    				$valores[$del['id_delegacion']]['economia2'] = $r2[0]['value'];
    			if($r3 !=null)
    				$valores[$del['id_delegacion']]['economia3'] = $r3[0]['value'];
    			
    			$r1=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],6, $i, $data['anio']);
    			$r2=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],6, $j, $data['anio']);
    			$r3=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],6, $k, $data['anio']);
    			if($r1 !=null)
    				$valores[$del['id_delegacion']]['ambiente1'] = $r1[0]['value'];
    			if($r2 !=null)
    				$valores[$del['id_delegacion']]['ambiente2'] = $r2[0]['value'];
    			if($r3 !=null)
    				$valores[$del['id_delegacion']]['ambiente3'] = $r3[0]['value'];
    			
    			$r1=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],7, $i, $data['anio']);
    			$r2=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],7, $j, $data['anio']);
    			$r3=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],7, $k, $data['anio']);
    			if($r1 !=null)
    				$valores[$del['id_delegacion']]['participacion1'] = $r1[0]['value'];
    			if($r2 !=null)
    				$valores[$del['id_delegacion']]['participacion2'] = $r2[0]['value'];
    			if($r3 !=null)
    				$valores[$del['id_delegacion']]['participacion3'] = $r3[0]['value'];
    			
    			$r1=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],8, $i, $data['anio']);
    			$r2=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],8, $j, $data['anio']);
    			$r3=$this->m_reportes->getEjesxTrimestre($del['id_delegacion'],8, $k, $data['anio']);
    			if($r1 !=null)
    				$valores[$del['id_delegacion']]['salud1'] = $r1[0]['value'];
    			if($r2 !=null)
    				$valores[$del['id_delegacion']]['salud2'] = $r2[0]['value'];
    			if($r3 !=null)
    				$valores[$del['id_delegacion']]['salud3'] = $r3[0]['value'];
    			
    			
    		}
    		$data['datos'] = $valores;
    		
    	}
    	if($data['id_tipo_reporte']==3)
    	{
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$data['delegaciones'] = $auxdel;
    		$auxesp=$this->m_reportes->getEspaciosP();
    		$data['espacios']=$auxesp;
    		$valores = array();
    		foreach ($auxesp as $row)
    		{
    			$valores[$row['id_espacio_publico']]['validado1'] = 0;
    			$valores[$row['id_espacio_publico']]['validado2'] = 0;
    			$valores[$row['id_espacio_publico']]['validado3'] = 0;
    			
    			$valores[$row['id_espacio_publico']]['asistente1'] = 0;
    			$valores[$row['id_espacio_publico']]['asistente2'] = 0;
    			$valores[$row['id_espacio_publico']]['asistente3'] = 0;
    			
    			$valores[$row['id_espacio_publico']]['esperado1'] = 0;
    			$valores[$row['id_espacio_publico']]['esperado2'] = 0;
    			$valores[$row['id_espacio_publico']]['esperado3'] = 0;
    			
    			$r = $this->m_reportes->getEspaciosxTrimestre($row['id_espacio_publico'],$i, $data['anio']);
    			if($r!=null)
    			{
    				
    					$valores[$row['id_espacio_publico']]['validado1'] = $r[0]['val'];
    				
    					$valores[$row['id_espacio_publico']]['esperado1'] = $r[0]['esperados'];
    					$valores[$row['id_espacio_publico']]['asistente1'] = $r[0]['asis'];
    			}
    			
    			$r = $this->m_reportes->getEspaciosxTrimestre($row['id_espacio_publico'],$j, $data['anio']);
    			if($r!= null)
    			{
    				
    					$valores[$row['id_espacio_publico']]['validado2'] = $r[0]['val'];
    				
    					$valores[$row['id_espacio_publico']]['esperado2'] = $r[0]['esperados'];
    				
    					$valores[$row['id_espacio_publico']]['asistente2'] = $r[0]['asis'];
    			}
    			
    			$r = $this->m_reportes->getEspaciosxTrimestre($row['id_espacio_publico'],$k, $data['anio']);
    			if($r!=null)
    			{
    				
	    				$valores[$row['id_espacio_publico']]['validado3'] = $r[0]['val'];
    				
	    				$valores[$row['id_espacio_publico']]['esperado3'] = $r[0]['esperados'];
    				
	    				$valores[$row['id_espacio_publico']]['asistente3'] = $r[0]['asis'];
    			}
    			
    		}
    		$data['datos'] = $valores;
    	}
    	if($data['id_tipo_reporte']==4)
    	{
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$data['delegaciones'] = $auxdel;
    		$auxplan =  $this->m_reportes->getPlantel();
    		$data['planteles']=$auxplan;
    		
    		$valores = array();
    		foreach ($auxplan as $row)
    		{
    			$valores[$row['id_plantel']]['validado1'] = 0;
    			$valores[$row['id_plantel']]['validado2'] = 0;
    			$valores[$row['id_plantel']]['validado3'] = 0;
    			 
    			$valores[$row['id_plantel']]['esperado1'] = 0;
    			$valores[$row['id_plantel']]['esperado2'] = 0;
    			$valores[$row['id_plantel']]['esperado3'] = 0;
    			
    			$valores[$row['id_plantel']]['asistente1'] = 0;
    			$valores[$row['id_plantel']]['asistente2'] = 0;
    			$valores[$row['id_plantel']]['asistente3'] = 0;
    			 
    			$r = $this->m_reportes->getPlantelxTrimestre($row['id_plantel'],$i, $data['anio']);
    			if($r!=null)
    			{
    				$valores[$row['id_plantel']]['validado1'] = $r[0]['val'];
    				$valores[$row['id_plantel']]['esperado1'] = $r[0]['esperados'];
    				$valores[$row['id_plantel']]['asistente1'] = $r[0]['asis'];
    			}
    			 
    			$r = $this->m_reportes->getPlantelxTrimestre($row['id_plantel'],$j, $data['anio']);
    			if($r!= null)
    			{
    				$valores[$row['id_plantel']]['validado2'] = $r[0]['val'];
    				$valores[$row['id_plantel']]['esperado2'] = $r[0]['esperados'];
    				$valores[$row['id_plantel']]['asistente2'] = $r[0]['asis'];
    			}
    			 
    			$r = $this->m_reportes->getPlantelxTrimestre($row['id_plantel'],$k, $data['anio']);
    			if($r!=null)
    			{
    				$valores[$row['id_plantel']]['validado3'] = $r[0]['val'];
    				$valores[$row['id_plantel']]['esperado3'] = $r[0]['esperados'];
    				$valores[$row['id_plantel']]['asistente3'] = $r[0]['asis'];
    			}
    			 
    		}
    		$data['datos'] = $valores;
    	}
    	if($data['id_tipo_reporte']==5)
    	{
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$data['delegaciones'] = $auxdel;
    		$auxmus =$this->m_reportes->getMuseos();
    		$data['museos']=$auxmus;
    		
    		$valores = array();
    		foreach ($auxmus as $row)
    		{
    			$valores[$row['id_museo']]['validado1'] = 0;
    			$valores[$row['id_museo']]['validado2'] = 0;
    			$valores[$row['id_museo']]['validado3'] = 0;

    			$valores[$row['id_museo']]['esperado1'] = 0;
    			$valores[$row['id_museo']]['esperado2'] = 0;
    			$valores[$row['id_museo']]['esperado3'] = 0;
    			 
    			$valores[$row['id_museo']]['asistente1'] = 0;
    			$valores[$row['id_museo']]['asistente2'] = 0;
    			$valores[$row['id_museo']]['asistente3'] = 0;
    			 
    			 
    			$r = $this->m_reportes->getMuseoxTrimestre($row['id_museo'],$i, $data['anio']);
    			if($r!=null)
    			{
    				$valores[$row['id_museo']]['validado1'] = $r[0]['val'];
    				$valores[$row['id_museo']]['esperado1'] = $r[0]['esperados'];
    				$valores[$row['id_museo']]['asistente1'] = $r[0]['asis'];
    			}
    			 
    			$r = $this->m_reportes->getMuseoxTrimestre($row['id_museo'],$j, $data['anio']);
    			if($r!= null)
    			{
    				$valores[$row['id_museo']]['validado2'] = $r[0]['val'];
    				$valores[$row['id_museo']]['esperado2'] = $r[0]['esperados'];
    				$valores[$row['id_museo']]['asistente2'] = $r[0]['asis'];
    			}
    			 
    			$r = $this->m_reportes->getMuseoxTrimestre($row['id_museo'],$k, $data['anio']);
    			if($r!=null)
    			{
    				$valores[$row['id_museo']]['validado3'] = $r[0]['val'];
    				$valores[$row['id_museo']]['esperado3'] = $r[0]['esperados'];
    				$valores[$row['id_museo']]['asistente3'] = $r[0]['asis'];
    			}
    			 
    		}
    		$data['datos'] = $valores;
    	}
    	if($data['id_tipo_reporte']==6)
    	{
    		$auxdel = $this->m_reportes->getDelegaciones();
    		$data['delegaciones'] = $auxdel;
    		$auxesc = $this->m_reportes->getEscuelaAdulto();
    		$data['escuelas']=$auxesc;
  			$valores = array();
    		foreach ($auxesc as $row)
    		{
    			$valores[$row['id_escuela_adulto']]['validado1'] = 0;
    			$valores[$row['id_escuela_adulto']]['validado2'] = 0;
    			$valores[$row['id_escuela_adulto']]['validado3'] = 0;
    			
    			$valores[$row['id_escuela_adulto']]['esperado1'] = 0;
    			$valores[$row['id_escuela_adulto']]['esperado2'] = 0;
    			$valores[$row['id_escuela_adulto']]['esperado3'] = 0;
    			 
    			$valores[$row['id_escuela_adulto']]['asistente1'] = 0;
    			$valores[$row['id_escuela_adulto']]['asistente2'] = 0;
    			$valores[$row['id_escuela_adulto']]['asistente3'] = 0;
    	
    	
    	
    			$r = $this->m_reportes->getEscuelaxTrimestre($row['id_escuela_adulto'],$i, $data['anio']);
    			if($r!=null)
    			{
    				$valores[$row['id_escuela_adulto']]['validado1'] = $r[0]['val'];
    				$valores[$row['id_escuela_adulto']]['esperado1'] = $r[0]['esperados'];
    				$valores[$row['id_escuela_adulto']]['asistente1'] = $r[0]['asis'];
    				
    			}
    	
    			$r = $this->m_reportes->getEscuelaxTrimestre($row['id_escuela_adulto'],$j, $data['anio']);
    			if($r!= null)
    			{
    				$valores[$row['id_escuela_adulto']]['validado2'] = $r[0]['val'];
    				$valores[$row['id_escuela_adulto']]['esperado2'] = $r[0]['esperados'];
    				$valores[$row['id_escuela_adulto']]['asistente2'] = $r[0]['asis'];
    			}
    	
    			$r = $this->m_reportes->getEscuelaxTrimestre($row['id_escuela_adulto'],$k, $data['anio']);
    			if($r!=null)
    			{
    				$valores[$row['id_escuela_adulto']]['validado3'] = $r[0]['val'];
    				$valores[$row['id_escuela_adulto']]['esperado3'] = $r[0]['esperados'];
    				$valores[$row['id_escuela_adulto']]['asistente3'] = $r[0]['asis'];
    			}
    	
    		}
    		$data['datos'] = $valores;
    	}
    	
    	if($data['id_tipo_reporte']==7)
    	{
    		$auxeje= $this->m_catalogos->getEjeTematico();
    		$data['eje']=$auxeje;
    		$auxact=$this->m_catalogos->getActividad();
    		$actividad = array();
    		foreach ($auxeje as $row){
    				
    			$valores[$row['id_eje']]=$this->m_reportes->getLineaxTrimestre($row['id_eje'],$meses,$data['anio']);
    			 
    		}
    		foreach ($auxact as $row){
    			$actividad[$row['id_tipo_actividad']]['Actmes1']=0;
    			$actividad[$row['id_tipo_actividad']]['Actmes2']=0;
    			$actividad[$row['id_tipo_actividad']]['Actmes3']=0;
    			 
    			$aux=$this->m_reportes->getActividadxTrimestre($row['id_tipo_actividad'],$i,$data['anio']);
    			if ($aux != null)
    				$actividad[$row['id_tipo_actividad']]['Actmes1']=$aux[0];
    			 
    			$aux=$this->m_reportes->getActividadxTrimestre($row['id_tipo_actividad'],$j,$data['anio']);
    			if ($aux != null)
    				$actividad[$row['id_tipo_actividad']]['Actmes2']=$aux[0];
    			 
    			$aux=$this->m_reportes->getActividadxTrimestre($row['id_tipo_actividad'],$k,$data['anio']);
    			if ($aux != null)
    				$actividad[$row['id_tipo_actividad']]['Actmes3']=$aux[0];
    	
    		}
    		foreach ($auxact as $row){
    			$actividad[$row['id_tipo_actividad']]['Asismes1']=0;
    			$actividad[$row['id_tipo_actividad']]['Asismes2']=0;
    			$actividad[$row['id_tipo_actividad']]['Asismes3']=0;
    			 
    			 
    			$aux=$this->m_reportes->getAsistentesxTrimestre($row['id_tipo_actividad'],$i,$data['anio']);
    			if ($aux != null)
    				$actividad[$row['id_tipo_actividad']]['Asismes1']=$aux[0];
    			$aux=$this->m_reportes->getAsistentesxTrimestre($row['id_tipo_actividad'],$j,$data['anio']);
    			if ($aux != null)
    				$actividad[$row['id_tipo_actividad']]['Asismes2']=$aux[0];
    			$aux=$this->m_reportes->getAsistentesxTrimestre($row['id_tipo_actividad'],$k,$data['anio']);
    			if ($aux != null)
    				$actividad[$row['id_tipo_actividad']]['Asismes3']=$aux[0];
    		}
    		$aux=$this->m_reportes->getNoActividades($meses,$data['anio']);
    		$data['sumaAct']=$aux[0];
    		$aux=$this->m_reportes->getNoEsperados($meses,$data['anio']);
    		$data['sumaEsp']=$aux[0];
    		$aux=$this->m_reportes->getNoReales($meses,$data['anio']);
    		$data['sumaReal']=$aux[0];
    		$data['cuenta']=$actividad;
    		$data['actividad'] =$valores;
    		 
    	}
    	
   
    
    	$datos['content'] = $this->load->view('reportes/v_trimestral.php', $data, true);
    	$this->load->view('director/v_template.php', $datos, false);
    }
    
    function actividadesRealizadas()
    {
    	$mes=$this->input->post('mes');
    	$anio=$this->input->post('anio');
    	$aux=$this->m_reportes->getActividadesRealizadas($mes,$anio);
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
    	
    	$datos['content'] = $this->load->view('reportes/listado.php', $listado, true);
    	$this->load->view('director/v_template.php', $datos, false);
    	
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
    
    
        
}
