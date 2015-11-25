<?php

class M_reportes extends MY_Model {

    function M_reportes() {
        parent::__construct();
    }
    
    function getTotalesxTrimestre($id_delegacion, $meses, $anio)
    {
    	$this->sql = "select sum(r.no_asistentes) asist, sum(r.no_coordinadores) coord, sum(r.no_promotores) prom, 
    						sum(r.no_validado) validados, sum(e.no_asistentes) as esperados
				    	from resultado r
				    	inner join evento e on r.id_evento=e.id_evento
				    	where r.activo is TRUE
				    	and r.id_evento in (
					    	select id_evento
					    	from evento
					    	where id_delegacion = $id_delegacion
					    	and TO_CHAR(FECHA_INICIO,'MM') in ('$meses')
					    	and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio'
					    	and id_tipo_evento=1
				    	);";
    
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    
    function getTotalActividadesxTrimestre($delegacion ,$mes, $anio)
    {
    	$this->sql = "SELECT ID_DELEGACION,COUNT(*) AS total
				    	FROM EVENTO
				    	WHERE  id_delegacion = $delegacion 
				    	and TO_CHAR(FECHA_INICIO,'MM') = '$mes'
				    	and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio'
				    	and id_tipo_evento=1
				    	GROUP BY ID_DELEGACION;";
    
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    
    
    function getTotalesxMes($id_delegacion, $mes, $anio)
    {
    	$this->sql = "select sum(no_asistentes) asist, sum(no_coordinadores) coord, sum(no_promotores) prom, sum(no_validado) validados 
						from resultado
						where activo is TRUE
						and id_evento in (
							select id_evento
							from evento
							where id_delegacion = $id_delegacion
							and TO_CHAR(FECHA_INICIO,'MM') = '$mes'
							and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio'
							and id_tipo_evento=1
						);";
    
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    
    
    function getTotalActividadesxMes($mes, $anio)
    {
    	$this->sql = "SELECT ID_DELEGACION,COUNT(*) AS TOT_ACT
						FROM EVENTO
						WHERE TO_CHAR(FECHA_INICIO,'MM') = '$mes'
						and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio'
						and id_tipo_evento=1
						GROUP BY ID_DELEGACION;";
    
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    
    
    function getDelegaciones()
    {        	
    	$this->sql = "select id_delegacion,delegacion from cat_delegacion where activo is true order by orden;";
    
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    
    
    function getTotalActividades($fecha_inicio, $fecha_fin)
    {
    	$this->sql = "SELECT ID_DELEGACION,COUNT(*) AS TOT_ACT
						FROM EVENTO
						WHERE FECHA_INICIO >= '$fecha_inicio'
						AND FECHA_INICIO <= '$fecha_fin'
						and id_tipo_evento=1
						GROUP BY ID_DELEGACION;";
    
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    
    
    function getTotales($id_delegacion, $fecha_inicio, $fecha_fin)
    {
    	$this->sql = "select sum(no_asistentes) asist, sum(no_coordinadores) coord, sum(no_promotores) prom, sum(no_validado) validados 
						from resultado
						where activo is TRUE
						and id_evento in (
							select id_evento
							from evento
							where id_delegacion = $id_delegacion 
							and fecha_inicio >= '$fecha_inicio'
							and fecha_inicio <= '$fecha_fin'
							and id_tipo_evento=1
						)";
    
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    
    
    function getPlantel()
    {
    	$this->sql = "select id_plantel, plantel,id_delegacion from cat_plantel order by id_delegacion asc;";
    	
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    	
    }
    function getValidacionesPlantel($id_plantel, $fecha_inicio, $fecha_fin){
    	$this->sql="select e.id_evento, e.id_delegacion, e.id_lugar, cp.plantel,sum(r.no_validado) as val
					from evento e   
					inner join resultado r  on e.id_evento=r.id_evento
					INNER JOIN cat_plantel cp on cp.id_plantel=e.id_lugar
					WHERE cp.id_plantel=$id_plantel
					and fecha_inicio >= '$fecha_inicio'
					and fecha_inicio <= '$fecha_fin'
					and e.id_tipo_evento=1
					
					GROUP BY e.id_evento, e.id_delegacion, e.id_lugar, cp.plantel;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    } 
    function getMuseos(){
    	$this->sql = "select id_museo, museo, id_delegacion from cat_museos where activo is true order by id_delegacion asc ;";
    	 
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getValidacionesMuseo($id_museo, $fecha_inicio, $fecha_fin){
    	$this->sql = "SELECT m.museo, sum(r.no_validado) as val, e.id_delegacion, m.id_museo
							from cat_museos m 
							INNER JOIN evento e on e.id_lugar=m.id_museo
							INNER JOIN resultado r on e.id_evento=r.id_evento
							where e.id_tipo_lugar= 3
							and m.id_museo=$id_museo
							and fecha_inicio >= '$fecha_inicio'
							and fecha_inicio <= '$fecha_fin'
							and e.id_tipo_evento=1
							GROUP BY m.museo, e.id_delegacion, m.id_museo;";
    	
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getEspaciosP(){
    	$this->sql="select id_espacio_publico, espacio_publico, id_delegacion from cat_espacio_publico 
    				where activo is true order by id_delegacion asc, espacio_publico;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getEjes(){
    	$this->sql="select id_eje, eje_tematico from cat_eje where activo is true order by id_eje;;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getEjesxSemana($id_del, $id_eje,$fecha_inicio, $fecha_fin){
    	$this->sql="SELECT  count(ce.eje_tematico) as value, cd.id_delegacion 
						FROM evento e 
						INNER JOIN cat_delegacion cd on cd.id_delegacion=e.id_delegacion
						INNER JOIN cat_eje ce on ce.id_eje= e.id_eje
						where ce.id_eje=$id_eje and cd.id_delegacion=$id_del
						and fecha_inicio >= '$fecha_inicio'
						and fecha_inicio <= '$fecha_fin'
						and e.id_tipo_evento=1
						GROUP BY cd.id_delegacion
						;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getEjesxMes($id_del, $id_eje,$mes, $anio){
    	$this->sql="SELECT  count(ce.eje_tematico) as value, cd.id_delegacion
    	FROM evento e
    	INNER JOIN cat_delegacion cd on cd.id_delegacion=e.id_delegacion
    	INNER JOIN cat_eje ce on ce.id_eje= e.id_eje
    	where ce.id_eje=$id_eje and cd.id_delegacion=$id_del
    	and TO_CHAR(FECHA_INICIO,'MM') = '$mes'
		and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio'
		and e.id_tipo_evento=1
    	GROUP BY cd.id_delegacion
    	;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getEjesxTrimestre($id_del, $id_eje,$inicio, $anio){
    	$this->sql="SELECT  count(ce.eje_tematico) as value, cd.id_delegacion
    	FROM evento e
    	INNER JOIN cat_delegacion cd on cd.id_delegacion=e.id_delegacion
    	INNER JOIN cat_eje ce on ce.id_eje= e.id_eje
    	where ce.id_eje=$id_eje and cd.id_delegacion=$id_del
    	and TO_CHAR(FECHA_INICIO,'MM') = '$inicio'
    	and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio'
    	and e.id_tipo_evento=1
    	GROUP BY cd.id_delegacion
    	;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getValidacionesEspacios($id_espacio, $fecha_inicio, $fecha_fin){
    	
    	$this->sql="SELECT ep.espacio_publico,sum(r.no_validado) as val, e.id_delegacion, ep.id_espacio_publico
						from cat_espacio_publico ep 
						INNER JOIN evento e on e.id_lugar=ep.id_espacio_publico
						INNER JOIN resultado r on e.id_evento=r.id_evento
						where ep.id_espacio_publico=$id_espacio 
						and e.id_tipo_lugar=2
						and fecha_inicio >= '$fecha_inicio'
						and fecha_inicio <= '$fecha_fin'
						and e.id_tipo_evento=1
									
						GROUP BY ep.espacio_publico, e.id_delegacion, ep.id_espacio_publico;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getEscuelaAdulto(){
    	$this->sql="select id_delegacion, id_escuela_adulto, escuela from cat_escuelasadultosm
    				 where activo is true order by id_delegacion, escuela;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getValidacionesEscuela($id_escuela, $fecha_inicio, $fecha_fin){
    	$this->sql="select  sum(r.no_validado) as val
						from cat_escuelasadultosm ea 
						INNER JOIN evento e on e.id_lugar = ea.id_escuela_adulto
						INNER JOIN resultado r on e.id_evento=r.id_evento
						where  ea.id_escuela_adulto = $id_escuela
						and e.id_tipo_lugar=4
						and fecha_inicio >= '$fecha_inicio'
						and e.id_tipo_evento=1
						and fecha_inicio <= '$fecha_fin';";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getValidacionesEspaciosxMes($id_espacio, $mes, $anio){
    	$this->sql="SELECT sum(r.no_validado) as val
						from cat_espacio_publico ep 
						INNER JOIN evento e on e.id_lugar=ep.id_espacio_publico
						INNER JOIN resultado r on e.id_evento=r.id_evento
						where ep.id_espacio_publico=$id_espacio 
						and e.id_tipo_lugar=2
    					and TO_CHAR(FECHA_INICIO,'MM') = '$mes'
    					and e.id_tipo_evento=1
						and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio';";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getValidacionesPlantelxMes($id_plantel, $mes, $anio){
    	$this->sql="select sum(r.no_validado) as val
					from evento e   
					inner join resultado r  on e.id_evento=r.id_evento
					INNER JOIN cat_plantel cp on cp.id_plantel=e.id_lugar
					WHERE cp.id_plantel=$id_plantel
    				and TO_CHAR(FECHA_INICIO,'MM') = '$mes'
    				and e.id_tipo_evento=1
					and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio';";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getValidacionesMuseoxMes($id_museo, $mes, $anio){
    	$this->sql="SELECT  sum(r.no_validado) as val
							from cat_museos m 
							INNER JOIN evento e on e.id_lugar=m.id_museo
							INNER JOIN resultado r on e.id_evento=r.id_evento
							where e.id_tipo_lugar= 3
							and m.id_museo=$id_museo
    						and TO_CHAR(FECHA_INICIO,'MM') = '$mes'
    						and e.id_tipo_evento=1
							and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio';";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getValidacionesEscuelaxMes($id_escuela, $mes, $anio){
    	$this->sql="select  sum(r.no_validado) as val
						from cat_escuelasadultosm ea 
						INNER JOIN evento e on e.id_lugar = ea.id_escuela_adulto
						INNER JOIN resultado r on e.id_evento=r.id_evento
						where  ea.id_escuela_adulto = $id_escuela
						and e.id_tipo_lugar=4
    					and TO_CHAR(FECHA_INICIO,'MM') = '$mes'
    					and e.id_tipo_evento=1
						and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio';";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getEspaciosxTrimestre($id_espacio, $inicio, $anio){
    	$this->sql="select sum(r.no_validado) as val, sum(r.no_asistentes) as asis, sum(e.no_asistentes) as esperados, e.id_delegacion
						from evento e
						inner join resultado r on r.id_evento=e.id_evento
						inner join cat_espacio_publico ep on ep.id_espacio_publico=e.id_lugar
						where e.id_tipo_lugar=2 and e.id_lugar= $id_espacio
						and TO_CHAR(FECHA_INICIO,'MM') = '$inicio' 
    					and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio' 
    					and e.id_tipo_evento=1
    					group by  e.id_delegacion;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getPlantelxTrimestre($id_plantel, $inicio, $anio){
    	$this->sql="select sum(r.no_validado) as val,sum(r.no_asistentes) as asis, sum(e.no_asistentes) as esperados, e.id_delegacion
						from evento e
						inner join resultado r on r.id_evento=e.id_evento
						inner join cat_plantel cp on cp.id_plantel=e.id_lugar
						where e.id_tipo_lugar=1 and e.id_lugar= $id_plantel
						and TO_CHAR(FECHA_INICIO,'MM') = '$inicio' 
    					and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio' 
    					and e.id_tipo_evento=1
    					group by  e.id_delegacion;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getMuseoxTrimestre($id_museo, $inicio,$anio){
    	$this->sql="select sum(r.no_validado) as val,sum(r.no_asistentes) as asis, sum(e.no_asistentes) as esperados, e.id_delegacion
						from evento e
						inner join resultado r on r.id_evento=e.id_evento
						inner join cat_museos m on m.id_museo=e.id_lugar
						where e.id_tipo_lugar=3 and e.id_lugar= $id_museo
						and TO_CHAR(FECHA_INICIO,'MM') = '$inicio' 
    					and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio'
    					and e.id_tipo_evento=1 
    					group by  e.id_delegacion;";
    	
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    	
    	
    }
    function  getEscuelaxTrimestre($id_escuela, $inicio,$anio){
    	$this->sql="select sum(r.no_validado) as val,sum(r.no_asistentes) as asis, sum(e.no_asistentes) as esperados, e.id_delegacion
    	from evento e
    	inner join resultado r on r.id_evento=e.id_evento
    	inner join cat_escuelasadultosm ce on ce.id_escuela_adulto=e.id_lugar
    	where e.id_tipo_lugar=4 and e.id_lugar= $id_escuela
    	and TO_CHAR(FECHA_INICIO,'MM') = '$inicio'
    	and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio'
    	and e.id_tipo_evento=1
    	group by  e.id_delegacion;";
    	 
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getLineaxTrimestre($id_eje,$inicio,$anio){
    	$this->sql="select DISTINCT(ta.tipo_actividad), e.id_actividad, e.id_eje 
					from evento e
					INNER JOIN tipo_actividad ta on ta.id_tipo_actividad=e.id_actividad
					where e.id_eje=$id_eje
					and TO_CHAR(FECHA_INICIO,'MM') IN ($inicio)
    				and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio'
    				order by e.id_eje, e.id_actividad;";
    				
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getActividadxTrimestre($id_actividad,$inicio,$anio){
    	$this->sql="SELECT count(*) as val, e.id_eje, ta.id_tipo_actividad
					FROM evento e 
					INNER JOIN tipo_actividad ta on ta.id_tipo_actividad=e.id_actividad
					
					where e.id_actividad = $id_actividad
					
					and TO_CHAR(FECHA_INICIO,'MM') = '$inicio'
					and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio'
    				
    				group by e.id_eje, ta.id_tipo_actividad;
    				";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getAsistentesxTrimestre($id_actividad,$inicio,$anio){
    	$this->sql="select sum(DISTINCT(e.no_asistentes)) as esperados, sum(DISTINCT(r.no_asistentes)) as no_asistentes, e.id_actividad, e.id_eje
    			 	from evento e
    			 	inner join resultado r on r.id_evento=e.id_evento
    				where e.id_actividad = $id_actividad
					
					and TO_CHAR(FECHA_INICIO,'MM') = '$inicio'
					and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio'
    				GROUP BY e.id_actividad, e.id_eje;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getNoEsperados($inicio, $anio){
    	$this->sql="select SUM(DISTINCT(no_asistentes)) as suma
    			 	from evento 
    				where 
					TO_CHAR(FECHA_INICIO,'MM') in ($inicio)
					AND TO_CHAR(FECHA_INICIO,'YYYY') = '$anio';";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getNoReales($inicio, $anio){
    	$this->sql="select SUM(DISTINCT(r.no_asistentes)) as suma
    			 	from evento e
					inner join resultado r on r.id_evento=e.id_evento
    				where 
					TO_CHAR(FECHA_INICIO,'MM') in ($inicio)
					AND TO_CHAR(FECHA_INICIO,'YYYY') = '$anio';";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    	
    }
    function getNoActividades($inicio, $anio){
    	$this->sql="select count(*) as suma from evento 
					where TO_CHAR(FECHA_INICIO,'MM') in ($inicio)
					and TO_CHAR(FECHA_INICIO,'YYYY') = '$anio';";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    
}   
?>