<?php
if (! defined('BASEPATH')) exit('no se permite el acceso directo al script');

class M_catalogos extends MY_Model{
	
	function M_catalogos(){
		 parent::__construct();
	}
	
	
	function getDelegacionMapa($id_usuario){
		$this->sql = "select cde.delegacion
						from usuario 
						inner join cat_delegacion cde using(id_delegacion)
						where id_usuario = $id_usuario;";
		
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function getDireccion($id_lugar,$id_tipo_lugar){
		if ($id_tipo_lugar==1){
			$this->sql="select plantel as direccion from cat_plantel WHERE id_plantel=$id_lugar;";
		}
		if ($id_tipo_lugar==2){
			$this->sql="select direccion from cat_espacio_publico where id_espacio_publico=$id_lugar;";
		}
		if ($id_tipo_lugar==3){
			$this->sql="select direccion from cat_museos where id_museo=$id_lugar;";
		}
		if ($id_tipo_lugar==4){
			$this->sql="select direccion from cat_escuelasadultosm where id_escuela_adulto=$id_lugar;";
		}
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	
	function getActividad(){
		$this->sql="select id_tipo_actividad, tipo_actividad from cat_tipo_actividad where activo is true order by tipo_actividad;";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function getLogistica(){
		$this->sql = "SELECT id_logistica, logistica FROM logistica WHERE activo is true order by logistica;";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function getLogisticaxEvanto($id_evento){
		$this->sql="select cantidad, logistica from logistica_x_evento x INNER JOIN logistica l on x.id_logistica=l.id_logistica where x.id_evento=$id_evento;";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function getLugar($tipoLugar,$lugar){
		if($tipoLugar==1){
			$this->sql = "SELECT plantel as lugar FROM cat_plantel WHERE activo is true and id_plantel=$lugar;";
		}
		elseif ($tipoLugar==2){
			$this->sql = "SELECT espacio_publico as lugar, direccion FROM cat_espacio_publico WHERE activo is true and id_espacio_publico=$lugar;";
		}
		elseif ($tipoLugar==3){
			$this->sql = "SELECT museo as lugar, direccion FROM cat_museos WHERE activo is true and id_museo=$lugar;";
		}
		elseif ($tipoLugar==4){
			$this->sql = "SELECT escuela as lugar, direccion FROM cat_escuelasadultosm WHERE activo is true and id_escuela_adulto=$lugar;";
		}
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function get_espacio_publico(){
		$this->sql = "SELECT * FROM cat_espacio_publico WHERE activo is true order by tipo asc, espacio_publico;";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	
	function get_plantel(){
		$this->sql = "SELECT cp.*,ci.institucion FROM cat_plantel cp
						inner join cat_institucion ci using(id_institucion)
						WHERE cp.activo is true 
						order by institucion,plantel;";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	
	function getDelegacion(){
		$this->sql = "select id_delegacion, delegacion from cat_delegacion where activo='t' order by delegacion;";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function get_museo(){
		$this->sql = "SELECT * FROM cat_museos WHERE activo='t' order by museo;";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function getEjeTematico(){
		$this->sql = "SELECT * FROM cat_eje WHERE activo='1' order by eje_tematico;";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function  getResponsable(){
		$this->sql="select id_usuario, upper('['||cde.siglas||'] '||nombre||' '||paterno||' '||materno) as usuario 
					from usuario 
					inner join cat_delegacion cde using(id_delegacion)
					where usuario.activo='1' 
					and id_perfil=2 
					order by usuario;";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function  getResponsableEvento($id_evento){
		$this->sql="select * from usuario where activo='1' and id_perfil=2 order by usuario;";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function getSeriada(){
		$this->sql ="SELECT * FROM cat_seriada WHERE activo='1';";
		$results = $this->db->query($this->sql);
		return $results->result_array();
		
	}
	function get_escuelaA(){
		$this->sql ="SELECT * FROM cat_escuelasadultosm WHERE activo='t';";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function getNivel(){
		$this->sql ="SELECT * FROM cat_nivel WHERE activo='1';";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function  getCoordinacion(){
		$this->sql="select * from cat_coordinacion where activo='1' order by coordinacion;";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	
	function getEventoLista($id_usuario){
		$this->sql="(
	SELECT DISTINCT(e.id_evento),  e.descripcion, to_char(e.fecha_inicio,'DD/MM/YYYY') as inicio, to_char(e.fecha_fin,'DD/MM/YYYY') as fin,ce.eje_tematico, e.horario
					,e.no_asistentes,cd.delegacion, e.id_lugar, e.id_tipo_lugar, ep.espacio_publico, cp.plantel,co.coordinacion, cd.siglas, e.responsable_actividad,e.nombre
	FROM evento e 
	LEFT JOIN involucrados i on e.id_evento= i.id_evento
	INNER JOIN cat_delegacion cd on cd.id_delegacion=e.id_delegacion
	INNER JOIN cat_coordinacion co on co.id_coordinacion=e.id_coordinacion
	INNER JOIN	cat_eje ce on ce.id_eje=e.id_eje
	LEFT JOIN cat_espacio_publico ep on ep.id_espacio_publico = e.id_lugar
	LEFT JOIN cat_plantel cp on cp.id_plantel= e.id_lugar
	WHERE e.id_responsable=$id_usuario and e.activo is true
)
UNION
(
		SELECT DISTINCT(e.id_evento),  e.descripcion, to_char(e.fecha_inicio,'DD/MM/YYYY') as inicio, to_char(e.fecha_fin,'DD/MM/YYYY') as fin, ce.eje_tematico, e.horario
					,e.no_asistentes,cd.delegacion, e.id_lugar, e.id_tipo_lugar, ep.espacio_publico, cp.plantel,co.coordinacion, cd.siglas,e.responsable_actividad,e.nombre
	FROM evento e 
	LEFT JOIN involucrados i on e.id_evento= i.id_evento
	INNER JOIN cat_delegacion cd on cd.id_delegacion=e.id_delegacion
	INNER JOIN cat_coordinacion co on co.id_coordinacion=e.id_coordinacion
	INNER JOIN	cat_eje ce on ce.id_eje=e.id_eje
	LEFT JOIN cat_espacio_publico ep on ep.id_espacio_publico = e.id_lugar
	LEFT JOIN cat_plantel cp on cp.id_plantel= e.id_lugar
	WHERE i.id_delegacion= (select id_delegacion from usuario where id_usuario=$id_usuario) and e.activo is true	
)";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	} 
	
	
	function getAllEventos(){
		$this->sql="SELECT e.id_evento,  e.descripcion, to_char(e.fecha_inicio,'DD/MM/YYYY') as inicio, to_char(e.fecha_fin,'DD/MM/YYYY') as fin, e.no_asistentes
					,cd.delegacion, e.id_lugar, e.id_tipo_lugar, ep.espacio_publico, cp.plantel,co.coordinacion, cd.siglas, ce.eje_tematico, e.horario, e.responsable_actividad
					FROM evento e 
					LEFT JOIN involucrados i on e.id_evento= i.id_evento
					INNER JOIN cat_delegacion cd on cd.id_delegacion=e.id_delegacion
					INNER JOIN cat_coordinacion co on co.id_coordinacion=e.id_coordinacion
					INNER JOIN	cat_eje ce on ce.id_eje=e.id_eje
					LEFT JOIN cat_espacio_publico ep on ep.id_espacio_publico = e.id_lugar
					LEFT JOIN cat_plantel cp on cp.id_plantel= e.id_lugar
				
					WHERE  e.activo is true;";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function getDelegacionInvolucradas($id_evento){
		$this->sql="SELECT cd.id_delegacion, cd.delegacion
					FROM involucrados i join cat_delegacion cd on i.id_delegacion= cd.id_delegacion
					where i.id_evento= $id_evento;";
		$results= $this->db->query($this->sql);
		return $results->result_array();
	}
	
	
	function getOperador($id_evento)
	{
		$this->sql="SELECT d.id_delegacion, d.delegacion, ce.eje_tematico, n.nivel, co.coordinacion, e.id_evento, s.seriada, 
					to_char(e.fecha_inicio,'DD/MM/YYYY') as inicio, to_char(e.fecha_fin,'DD/MM/YYYY') as fin, e.descripcion, e.horario, 
					e.no_asistentes, e.no_coordinadores, e.num_horas, e.no_promotores, e.fecha_registro, e.id_evento,e.id_tipo_lugar, e.id_lugar, a.id_tipo_actividad, a.tipo_actividad,
					e.id_responsable, ur.usuario,ep.espacio_publico, cp.plantel, e.id_tipo_evento, e.id_seriada, cm.museo, ea.escuela,e.latitud,e.longitud, e.responsable_actividad, e.nombre, e.fin_reg  	
					FROM evento e 
					INNER JOIN cat_delegacion d ON e.id_delegacion = d.id_delegacion
					INNER JOIN cat_eje ce ON ce.id_eje = e.id_eje
					INNER JOIN cat_nivel n ON n.id_nivel = e.id_tipo_evento
					INNER JOIN usuario ur  on ur.id_usuario= e.id_responsable
					INNER JOIN cat_coordinacion co on co.id_coordinacion = e.id_coordinacion
					INNER JOIN cat_tipo_actividad a on e.id_actividad=a.id_tipo_actividad
					inner join seriada s on e.id_seriada= s.id_seriada
					LEFT JOIN cat_espacio_publico ep on ep.id_espacio_publico = e.id_lugar
					LEFT JOIN cat_plantel cp on cp.id_plantel= e.id_lugar
					LEFT JOIN cat_escuelasadultosm ea on ea.id_escuela_adulto=e.id_lugar
					LEFT JOIN cat_museos cm on cm.id_museo= e.id_lugar
					LEFT  JOIN usuario um  on um.id_usuario=e.id_usuario_modifica
					
					where e.id_evento=$id_evento and e.activo is true;";
		$results= $this->db->query($this->sql);
		return $results->result_array();
	}
	
}

?>