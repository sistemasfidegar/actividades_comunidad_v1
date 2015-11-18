<?php

class M_director extends MY_Model {

    function M_director() {
        parent::__construct();
    }
    function getUnCoordinacion($id_coordinacion){
    	$this->sql = "select id_coordinacion, coordinacion, siglas from cat_coordinacion where id_coordinacion=$id_coordinacion; ";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getUnEje($id_eje){
    	$this->sql = "select id_eje, eje_tematico from cat_eje where id_eje=$id_eje; ";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function BorraEvento($id_evento){
    	$this->sql="update evento set activo=false where id_evento=$id_evento;";
    	//$this->sql="DELETE FROM evento WHERE id_evento=$id_evento;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getSedeRespectiva($id_sede)
    {
    	if($id_sede == 1)
    	{
    		$this->sql = "SELECT cp.id_plantel as id_espacio, cp.plantel as espacio, ci.institucion FROM cat_plantel cp
						inner join cat_institucion ci using(id_institucion)
						WHERE cp.activo is true
						order by institucion,plantel;";
    	}
    	
    	
    	if($id_sede == 2)
    	{
    		$this->sql = "SELECT id_espacio_publico as id_espacio, espacio_publico as espacio FROM cat_espacio_publico WHERE activo is true order by espacio_publico;";
    	}
    	
    	if($id_sede == 3)
    	{
    		$this->sql = "SELECT id_museo as id_espacio, museo as espacio FROM cat_museos WHERE activo='t' order by museo;";
    	}
    	
    	if($id_sede == 4)
    	{
    		$this->sql = "SELECT id_escuela_adulto as id_espacio, escuela as espacio FROM cat_escuelasadultosm WHERE activo='t';";
    	}
    	
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    
    function insertaLogistica($id_evento, $id_logistica, $cantidad)
    {
    	$this->sql = "INSERT INTO logistica_x_evento (id_evento,id_logistica,cantidad) values ($id_evento, $id_logistica, $cantidad) returning id_evento;";
    	  
    	$results = $this->db->query($this->sql, array(1));
    
    	return $results->result_array();
    }
    
    function getLogisticaEvento($id_evento){
    	$this->sql = "select * from logistica_x_evento where id_evento=$id_evento; ";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    
    function borraLogistica($id_evento){
    	$this->sql = "DELETE FROM logistica_x_evento where id_evento=$id_evento;";
    	$results = $this->db->query($this->sql);
    
    }
    
    
   function getDelUsuario($id_usuario){
   	$this->sql = "select id_delegacion from usuario where id_usuario=$id_usuario; ";
   	$results = $this->db->query($this->sql);
   	return $results->result_array();
   }

   function borraInvolucrados($id_evento){
   	$this->sql = "DELETE FROM involucrados WHERE id_evento=$id_evento;";
   	$results = $this->db->query($this->sql);

   }
   
   function updateEvento($datos){
   	$this->sql="UPDATE evento set id_tipo_evento=:id_tipo, id_eje=:id_eje, descripcion=:descripcion, id_coordinacion=:id_coordinacion, id_tipo_lugar=:id_tipo_lugar,
							id_lugar=:id_lugar, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin, horario=:horario, num_horas=:num_horas, no_asistentes=:no_asistentes, no_coordinadores=:no_coordinadores,
							no_promotores=:no_promotores, fecha_modificacion=now(), id_usuario_modifica=:id_usuario_registra, id_delegacion=:id_delegacion, id_responsable=:id_responsable, id_seriada=:id_seriada,
   							latitud=:latbox, longitud=:lonbox
							WHERE id_evento=:id_evento;";
   	$this->bindParameters($datos);
   	$results = $this->db->query($this->sql, array(1));
   	return 1;
   	 
   }
    function getEventos() {
    	$this->sql = "select e.id_evento, e.descripcion, e.fecha_inicio, e.fecha_fin, e.id_delegacion, ca.siglas 
						from evento e JOIN cat_delegacion ca  on e.id_delegacion= ca.id_delegacion
						where e.activo='t';";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    
    
           
    function getCatDelegaciones() {
    	$this->sql = "select id_delegacion, delegacion, id_zona, siglas from cat_delegacion	where activo='t' order by orden;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    
    
    function insertaEvento($data)
    {
    	$this->sql = "INSERT INTO evento (id_tipo_evento,id_eje,descripcion,id_coordinacion,id_seriada,id_tipo_lugar,id_lugar,fecha_inicio,fecha_fin,horario,num_horas,no_asistentes,no_coordinadores,no_promotores,id_usuario_registra, id_responsable,id_delegacion, activo, latitud, longitud) values 
   			(:id_tipo,:id_eje,:descripcion,:id_coordinacion,:id_seriada,:id_tipo_lugar,:id_lugar,:fecha_inicio,:fecha_fin,:horario,:num_horas,:no_asistentes,:no_coordinadores,:no_promotores,:id_usuario_registra, :id_responsable,:id_delegacion, 't',:latitud,:longitud) returning id_evento;";
    	
    	$this->bindParameters($data);
    	$results = $this->db->query($this->sql, array(1));

    	return $results->result_array();
    }
    
    
    function insertaInvolucrado($id_evento, $id_delegacion)
    {
    	$this->sql = "INSERT INTO involucrados (id_evento,id_delegacion) values (".$id_evento.",".$id_delegacion.");";

    	$results = $this->db->query($this->sql);    
    	return $results->result_array();
    }
	
    function insertEje($data){
    	$this->sql="insert into cat_eje (id_eje, eje_tematico, activo) values(default,:eje,'t')";
    	$this->bindParameters($data);
    	$results = $this->db->query($this->sql, array(1));
    	return 1;
    }
function insertCoordinacion($data){
    	$this->sql="insert into cat_coordinacion (id_coordinacion, coordinacion,siglas, activo) values(default,:coordinacion,:siglas,'t')";
    	$this->bindParameters($data);
    	$results = $this->db->query($this->sql, array(1));
    	return 1;
    }

	function insertEspacio($data){
    	$this->sql="insert into cat_espacio_publico (id_espacio_publico, espacio_publico,direccion, id_delegacion,tipo, activo) values(default,:espacio,:direccion,:delegacion,:tipo_es,'t')";
    	$this->bindParameters($data);
    	$results = $this->db->query($this->sql, array(1));
    	return 1;
    }
    function updateEje($data){
    	$this->sql="update cat_eje set eje_tematico=:eje where id_eje=:id_eje;";
    	$this->bindParameters($data);
    	$results = $this->db->query($this->sql, array(1));
    	return 1;
    }
    function updateCoordinacion($data){
    	$this->sql="update cat_coordinacion set coordinacion=:coordinacion, siglas=:siglas where id_coordinacion=:id_coordinacion;";
    	$this->bindParameters($data);
    	$results = $this->db->query($this->sql, array(1));
    	return 1;
    }
    function guardaImagen($datos){
    	$this->sql = "insert into archivo (id_archivo,id_evento,id_usuario,ruta_archivo,activo)
    					values (default,:id_evento,:id_usuario,:ruta_archivo,'t') ;";
    	$this->bindParameters($datos);
    	$results = $this->db->query($this->sql, array(1));
    
    	return $results->result_array();
    }
    function updateLogistica($data){
    	$this->sql="update logistica set logistica=:logistica where id_logistica=:id_logistica;";
    	$this->bindParameters($data);
    	$results = $this->db->query($this->sql, array(1));
    	return 1;
    }
    function get_escuelaADel(){
    	$this->sql="select e.id_escuela_adulto, e.escuela, e.direccion, d.delegacion
    				from cat_escuelasadultosm e inner join cat_delegacion d on e.id_delegacion=d.id_delegacion;";
    	$results = $this->db->query($this->sql, array(1));
    	
    	return $results->result_array();
    }
    function  insertEscuela($data){
    	$this->sql="insert into cat_escuelasadultosm (id_escuela_adulto, escuela, direccion, id_delegacion,  activo) values(default,:nombre,:direccion,:delegacion,'t');";
    	$this->bindParameters($data);
    	$results = $this->db->query($this->sql, array(1));
    	return 1;
    }
    function getUnEsc($id){
    	$this->sql = "select e.id_escuela_adulto, e.escuela, e.direccion, d.delegacion, d.id_delegacion
    				from cat_escuelasadultosm e inner join cat_delegacion d on e.id_delegacion=d.id_delegacion where id_escuela_adulto=$id; ";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function updateEscuela($data){
    	$this->sql="update cat_escuelasadultosm set escuela=:escuela, direccion=:direccion, id_delegacion=:delegacion where id_escuela_adulto=:id_escuela;";
    	$this->bindParameters($data);
    	$results = $this->db->query($this->sql, array(1));
    	return 1;
    }
	function getUnLogistica($id){
		$this->sql = "select * from logistica where id_logistica=$id; ";
		$results = $this->db->query($this->sql);
		return $results->result_array();
		
	}
	function insertLogistica($data){
		$this->sql="insert into logistica (id_logistica,logistica, activo) values(default,:logistica,'t');";
		$this->bindParameters($data);
		$results = $this->db->query($this->sql, array(1));
		return 1;
	}
	function getUnEspacio($id){
		$this->sql = "select e.id_espacio_publico, e.espacio_publico, e.direccion, d.delegacion, d.id_delegacion
		from cat_espacio_publico e inner join cat_delegacion d on e.id_delegacion=d.id_delegacion where id_espacio_publico=$id; ";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function get_espacio_publicoDel(){
		$this->sql = "SELECT cp.id_espacio_publico, cp.espacio_publico, cp.direccion, cp.id_delegacion, cd.delegacion 
							FROM cat_espacio_publico cp inner join cat_delegacion cd on cp.id_delegacion=cd.id_delegacion
						 	WHERE cp.activo is true order by espacio_publico;";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function updateEspacioP($data){
		$this->sql="update cat_espacio_publico set espacio_publico=:nombre, direccion=:direccion, id_delegacion=:id_delegacion, tipo=:tipo where id_espacio_publico=:id_espacio_publico;";
		$this->bindParameters($data);
		$results = $this->db->query($this->sql, array(1));
		return 1;
	}
	function get_museoDel(){
		$this->sql = "select m.museo, m.id_museo, m.direccion, d.delegacion, m.id_delegacion
		from cat_museos m inner join cat_delegacion d on m.id_delegacion=d.id_delegacion where m.activo='t';";
		$results = $this->db->query($this->sql);
		return $results->result_array();
	}
	function insertMuseo($data){
		$this->sql="insert into cat_museos (id_museo,museo, direccion, id_delegacion, activo) values(default,:museo,:direccion,:delegacion,'t');";
		$this->bindParameters($data);
		$results = $this->db->query($this->sql, array(1));
		return 1;
	}
	function getUnMuseo($id){
		$this->sql = "select m.museo, m.id_museo, m.direccion, d.delegacion, m.id_delegacion
		from cat_museos m inner join cat_delegacion d on m.id_delegacion=d.id_delegacion where m.activo='t' and id_museo=$id;";
		$results = $this->db->query($this->sql);
		return $results->result_array();
		
	}
	function updateMuseo($data){
		$this->sql="update cat_museos set museo=:museo, direccion=:direccion, id_delegacion=:id_delegacion where id_museo=:id_museo;";
		$this->bindParameters($data);
		$results = $this->db->query($this->sql, array(1));
		return 1;
	}
	function getImagen($id_evento){
		$this->sql = "select ruta_archivo from archivo where id_evento=$id_evento and activo ='t';";
		 
		$results = $this->db->query($this->sql);
		 
		return $results->result_array();
		 
		 
	}
}

?>
