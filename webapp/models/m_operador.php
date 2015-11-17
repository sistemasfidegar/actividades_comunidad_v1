<?php

class M_operador extends MY_Model {
	 
    function M_operador() {
        parent::__construct();
    }
    function getLogisticaEvento($id_evento){
    	$this->sql = "select * from logistica_x_evento where id_evento=$id_evento; ";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getCatDelegaciones() {
    	$this->sql = "select id_delegacion, delegacion, id_zona from cat_delegacion	where activo is true order by delegacion;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getResultado($id_evento){
    	$this->sql="select * from resultado where id_evento=$id_evento;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    
    }
function updateEvento($datos){
    	$this->sql="UPDATE evento set  id_eje=:id_eje, descripcion=:descripcion, id_coordinacion=:id_coordinacion,id_tipo_lugar=:id_tipo_lugar, latitud=:latitud, longitud=:longitud,
							id_lugar=:id_lugar, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_inicio, horario=:horario, num_horas=:num_horas, no_asistentes=:no_asistentes, no_coordinadores=:no_coordinadores,
							no_promotores=:no_promotores, fecha_modificacion=now(), id_usuario_modifica=:id_usuario_registra, id_delegacion=:id_delegacion, id_responsable=:id_responsable, id_seriada=:id_seriada
							WHERE id_evento=:id_evento;";
    	$this->bindParameters($datos);
    	$results = $this->db->query($this->sql, array(1));
    	return 1;
    	 
    }
    function borraInvolucrados($id_evento){
    	$this->sql = "DELETE FROM involucrados WHERE id_evento=$id_evento;";
    	$results = $this->db->query($this->sql);
    
    }
    function borraLogistica($id_evento){
    	$this->sql = "DELETE FROM logistica_x_evento where id_evento=$id_evento;";
    	$results = $this->db->query($this->sql);
    
    }
    function verificaResultado($datos){
    	$this->sql="select id_evento from resultado where id_evento=:id_evento and id_delegacion=:id_delegacion;";
    	$this->bindParameters($datos);
    	$result = $this->db->query($this->sql,array(1));
    	 
    	if ($result ->num_rows() > 0){
    		return 1;
    	}
    	else{
    		return 0;
    	}
    
    }
    function getPerfil($datos){
    	$this->sql="SELECT id_perfil from usuario where id_usuario=$datos;";
    	$results = $this->db->query($this->sql, array(1));
    	return $results->result_array();
    }
    function usRegistroEvento($id_evento){
    	$this->sql="SELECT id_usuario_registra from evento where id_evento=$id_evento;";
    	$results = $this->db->query($this->sql, array(1));
    	return $results->result_array();
    }
    function getDelegacionEvento($id_evento){
    	$this->sql="SELECT id_delegacion from evento where id_evento=$id_evento;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function guardaResultados($datos){
    	$this->sql="insert into resultado (id_resultado, id_evento, id_delegacion, id_usuario, no_asistentes, no_coordinadores, no_promotores,no_validado,activo) 
    				values (default,:id_evento,:id_delegacion, :id_usuario,:asistentes,:coordinador, :promotores, :validado, 't');";
    	$this->bindParameters($datos);
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
    
    function updateResultados($datos){
    	$this->sql="update resultado set id_usuario=:id_usuario, no_asistentes=:asistentes, no_coordinadores=:coordinador, no_promotores=:promotores, no_validado=:validado where id_evento=:id_evento and id_delegacion=:id_delegacion;";
    	$this->bindParameters($datos);
    	$results = $this->db->query($this->sql, array(1));
    	return 1;
    }
    function updatefecha($datos){
    	
    	$this->sql="update evento set fecha_inicio=:fecha_inicio, fecha_fin=:fecha_inicio, 
    				num_horas=:num_horas, horario=:hora_inicio, id_usuario_modifica=:id_usuario where id_evento=:id_evento;";
    	$this->bindParameters($datos);
    	$results = $this->db->query($this->sql, array(1));
    	return 1;
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
	function insertaEvento($data)
    {
    	$this->sql = "INSERT INTO evento (id_tipo_evento,id_eje,descripcion,id_coordinacion,id_seriada,id_tipo_lugar,id_lugar,fecha_inicio,fecha_fin,horario,num_horas,no_asistentes,no_coordinadores,no_promotores,id_usuario_registra, id_responsable,id_delegacion,latitud,longitud, activo) values
   			(1,:id_eje,:descripcion,:id_coordinacion,:id_seriada,:id_tipo_lugar,:id_lugar,:fecha_inicio,:fecha_inicio,:horario,:num_horas,:no_asistentes,:no_coordinadores,:no_promotores,:id_usuario_registra, :id_responsable,:id_delegacion,:latitud,:longitud,  't') returning id_evento;";
    	 
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
    function getDelUsuario($id_usuario){
    	$this->sql = "select id_delegacion from usuario where id_usuario=$id_usuario; ";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    function getImagen($id_evento){
    	$this->sql = "select ruta_archivo from archivo where id_evento=$id_evento and activo ='t';";
    	
    	$results = $this->db->query($this->sql);
    	
    		return $results->result_array();
    	
    	
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////
    function getDestinatariosAlertasSupervisor() {
    	$this->sql = "select (nombre||' '||paterno||' '||materno) as nombre_usuario, email, id_perfil
    	from usuario
    	where id_perfil in (2)
    	and activo is true
    	order by nombre_usuario;";
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }

    function getDificultades($id_actividad = '') {
        $this->sql = "select *, to_char(dxa.fecha_registro, 'DD/MM/YYYY') AS fecha_registro_f, axp.actividad 
    	from dificultades_x_actividad dxa
    	inner join actividades_x_proyecto axp on (dxa.id_actividad = axp.id_actividad)
    	where dxa.id_actividad = $id_actividad and dxa.activo is true order by dxa.fecha_registro;";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getNombreActividad($id_actividad = '') {
        $this->sql = "select * from actividades_x_proyecto where id_actividad=$id_actividad;";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getActividades($id_proyecto = '') {
        $this->sql = "select *, to_char(fecha_inicio, 'DD/MM/YYYY') AS fecha_comienzo, to_char(fecha_fin, 'DD/MM/YYYY') AS fecha_cumplimiento from actividades_x_proyecto
    	where id_proyecto = $id_proyecto and activo is true order by fecha_registro;";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function actualizar_avance($id_compromiso, $avance) {
        $this->sql = "UPDATE compromiso SET avance=$avance WHERE id_compromiso =$id_compromiso;";

        $result = $this->db->query($this->sql);


        return $result;
    }

    function getArchivosSeguimiento($id_seguimiento) {
        $this->sql = "select id_archivo,id_generico,id_tipo,archivo,descripcion_archivo,to_char(fecha_registro, 'DD/MM/YYYY') AS fecha_registro,activo from archivo where id_generico =$id_seguimiento and activo is true";
        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function insert_archivo($data) {
        $this->sql = "INSERT INTO archivo (id_generico, id_tipo, archivo, descripcion_archivo) VALUES (:id_generico, :id_tipo, :archivo, :descripcion_archivo) returning id_archivo;";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getArchivos($data) {
        $this->sql = "select id_archivo,id_generico,id_tipo,archivo,descripcion_archivo,to_char(fecha_registro, 'DD/MM/YYYY') AS fecha_registro,activo from archivo where id_generico =:id_generico and id_tipo_proyecto=:id_tipo and activo is true";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function getArchivo($id_archivo) {
        $this->sql = "select * from archivo where id_archivo =$id_archivo and activo is true";
        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function elimina_archivo($data) {
        $this->sql = "UPDATE archivo SET activo=:activo WHERE id_archivo=:id_archivo;";

        $this->bindParameters($data);

        $result = $this->db->query($this->sql);


        return $result;
    }

    function getProyecto($id_proyecto = '') {
        $this->sql = "select pes.*,depe.nombre_ente from proyectos_estrategicos pes
    	inner join cat_ente_publico depe on (id_ente_responsable = id_ente)
    	where id_proyecto = $id_proyecto
    	order by fecha_registro desc;";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getProyectos() {
        $this->sql = "select pes.*,depe.nombre_ente from proyectos_estrategicos pes 
						inner join cat_ente_publico depe on (id_ente_responsable = id_ente)
						where id_estatus_proyecto < 3 
						order by fecha_registro desc;";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getEntesInvolucrados($ids) {
        $this->sql = "select id_ente, nombre_ente, siglas_ente from cat_ente_publico where id_ente in ($ids) and activo is true order by nombre_ente;";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function insertaCompromiso($data) {
        $this->sql = "INSERT INTO compromiso (id_discurso, compromiso, id_estatus, fecha_tentativa, fecha_definitiva, beneficios, tipo_compromiso, prioridad, avance) "
                . "             VALUES ( :id_discurso, :compromiso, :id_estatus, :fecha_tentativa, :fecha_definitiva, :beneficios, :tipo_compromiso, :prioridad, :avance) "
                . "             returning id_compromiso";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function insertaSeguimiento($data) {
        $this->sql = "INSERT INTO seguimiento (id_generico, id_tipo_proyecto, fecha_seguimiento, observacion, avance, fecha_registro, activo, id_usuario, acepta_o_rechaza) "
                . "             VALUES ( :id_generico, :id_tipo_proyecto, :fecha_seguimiento, :observacion, :avance, now(), 't', :id_usuario, :acepta_o_rechaza) "
                . "             returning id_seguimiento";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        
        
        $this->sql = "UPDATE compromiso SET id_estatus=:id_estatus, id_usuario_modifico=:id_usuario_modifico, fecha_modifico=now() WHERE id_compromiso =:id_compromiso;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        
        return $results->result_array();
    }

    function getEstatusCompromiso() {
        $this->sql = "select * from cat_estatus_compromiso where activo is true";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getTotalDiscursosMensuales() {
        $this->sql = "select to_char(fecha_discurso,'YY-MM') as fecha , count(*) as total "
                . "from discurso "
                . "where fecha_discurso is not null "
                . "and activo is true "
                . "and fecha_discurso > '2011-01-01' "
                . "GROUP BY fecha "
                . "ORDER BY fecha";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getTotalCompromisosMensuales($data) {
        $this->sql = " select to_char(fecha_discurso, 'YY-MM') as fecha, count(id_compromiso) as total from discurso as dis 
            INNER JOIN compromiso as com USING(id_discurso) 
            where fecha_discurso is not null 
            and dis.activo is true 
            and fecha_discurso > '2011-01-01'
            and id_estatus IN (->estatus)
            GROUP BY fecha ORDER BY fecha";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getDiscursos() {
        $this->sql = " select to_char(fecha_discurso, 'DD/MM/YYYY') as fecha_discurso, nombre_discurso, lugar_evento,count(id_compromiso) as total_compromisos "
                . "from discurso "
                . "LEFT JOIN  compromiso using(id_discurso) "
                . "GROUP BY discurso.id_discurso "
                . "order by fecha_discurso";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getDependencias() {
        $this->sql = " select * from cat_dependencia where activo is true";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getDiscurso($id_discurso) {
        $this->sql = " select to_char(fecha_discurso, 'DD/MM/YYYY') as fecha_discurso, nombre_discurso, lugar_evento,count(id_compromiso) as total_compromisos "
                . "from discurso "
                . "LEFT JOIN  compromiso using(id_discurso) "
                . "where discurso.activo is true "
                . "and id_discurso=$id_discurso "
                . "GROUP BY discurso.id_discurso "
                . "order by fecha_discurso";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getCompromisos() {
        $this->sql = " select id_compromiso, compromiso, id_estatus "
                . "from compromiso "
                . "order by id_compromiso";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getCompromiso($id_compromiso) {
        $this->sql = " select id_discurso, id_compromiso, compromiso, id_estatus, avance "
                . "from compromiso "
                . "where id_compromiso=$id_compromiso";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getSegimientos($id_compromiso) {
        $this->sql = " select seguimiento.* , nombre,paterno, materno from seguimiento inner join usuario using(id_usuario) "
                . "where id_generico=$id_compromiso order by fecha_registro DESC";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getCompromisosOfDiscurso($id_discurso) {
        $this->sql = " select id_compromiso, compromiso, id_estatus "
                . "from compromiso "
                . "where id_discurso=$id_discurso"
                . "order by id_compromiso";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    /**
      Querys simopi borrar despues
     */
    /* ---------------------------------------------------------------------------------------
     *              CatÃ¡logos
      -----------------------------getInventarioAltaInformesDesglosado----------------------------------------------------------- */

    function get_sectores() {
        $this->sql = "select distinct sector from cat_unidades order by sector;";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function get_unidades($todas = 1) {
        $this->sql = "SELECT * FROM cat_unidades order by id_dependencia";

        if ($todas == 0)
            $this->sql = "SELECT * FROM cat_unidades where id_dependencia not in (999,1000) order by descripcion";

        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function get_unidad($id_dependencia) {
        $data['id_dependencia'] = $id_dependencia;
        $this->sql = "SELECT * FROM cat_unidades where id_dependencia=:id_dependencia;";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function get_nextIdUnidad() {
        $this->sql = "select max(id_dependencia)+1 as id_dependencia from cat_unidades where id_dependencia not in (1000,999);";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function inserta_unidad($data) {
        $this->sql = "insert into cat_unidades values(:clave_unidad,:sector,:descr_unidad,:id_dependencia,:estatus,:ambito) returning id_dependencia;";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function actualizar_unidad($data) {
        $this->sql = "UPDATE cat_unidades SET clave_unidad=:clave_unidad, sector=:sector, 
            descripcion=:descr_unidad, activo=:activo,ambito=:ambito WHERE id_dependencia=:id_dependencia;";

        $this->bindParameters($data);
        $result = $this->db->query($this->sql);


        return $result;
    }

    function get_causa($causa, $movimiento) {
        $data['causa'] = $causa;
        $data['movimiento'] = $movimiento;

        $this->sql = "select * from cat_causas where causa=:causa and movimiento=:movimiento;";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function get_causas() {
        $this->sql = "select * from cat_causas order by movimiento,cast(causa as integer);";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function actualizar_causa($data) {
        $this->sql = "UPDATE cat_causas SET descripcion=:descripcion, activo=:activo WHERE causa=:causa and movimiento=:movimiento;";

        $this->bindParameters($data);
        $result = $this->db->query($this->sql);


        return $result;
    }

    function inserta_causa($data) {
        $this->sql = "insert into cat_causas values(:causa,:descripcion,:movimiento,:activo) returning causa;";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function get_perfiles() {
        $this->sql = "SELECT * FROM perfil order by perfil";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function get_perfil($id_perfil) {
        $data['id_perfil'] = $id_perfil;
        $this->sql = "SELECT * FROM perfil WHERE id_perfil=:id_perfil;";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function actualizar_perfil($data) {

        $this->sql = "UPDATE perfil SET perfil=:perfil, activo=:activo WHERE id_perfil=:id_perfil;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result;
    }

    function inserta_perfil($data) {
        $this->sql = "INSERT INTO perfil (perfil,activo) VALUES ( :perfil, :activo) returning id_perfil;";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function get_cambs() {
        $this->sql = "select * from cat_clave_cambs order by cla_camb";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getPublicCambs($capitulos) {
        $this->sql = "select  cla_camb, des_camb, niv, part1 from cat_clave_cambs where substring(cla_camb from 1 for 1)in ($capitulos) ORDER BY cla_camb;";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getPublicCambsNivel($capitulos, $nivel) {
        $this->sql = "select  cla_camb, des_camb, niv, part1 "
                . "from cat_clave_cambs"
                . " where niv=$nivel and "
                . "substring(cla_camb from 1 for 1)in ($capitulos) "
                . "ORDER BY cla_camb;";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getSearchedPublicCambsNivel($data) {
        $this->sql = "select  cla_camb as id, des_camb || ' ['|| cla_camb||']' as name "
                . "from cat_clave_cambs"
                . " where niv=:nivel and "
                . "substring(cla_camb from 1 for 1)in (->capitulos) "
                . "and ( (translate(upper(des_camb),'Ã¡Ã©Ã­Ã³ÃºÃ�Ã‰Ã�Ã“ÃšÃ¤Ã«Ã¯Ã¶Ã¼Ã„Ã‹Ã�Ã–Ãœ','aeiouAEIOUaeiouAEIOU')) like '%->qword%' "
                . "or (translate(upper(cla_camb),'Ã¡Ã©Ã­Ã³ÃºÃ�Ã‰Ã�Ã“ÃšÃ¤Ã«Ã¯Ã¶Ã¼Ã„Ã‹Ã�Ã–Ãœ','aeiouAEIOUaeiouAEIOU')) like '%->qword%' )"
                . "ORDER BY cla_camb;";
        $this->bindParameters($data);

        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getValidatorPublicCambsNivel($data) {
        $this->sql = "select count(cla_camb) as total "
                . "from cat_clave_cambs "
                . "where niv=:nivel and "
                . "substring(cla_camb from 1 for 1)in (->capitulos) "
                . "and des_camb || ' ['|| cla_camb||']'=:qword "
                . "group BY cla_camb;";
        $this->bindParameters($data);

        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getCambsNivelBusqueda($capitulos, $nivel) {
        $this->sql = "select  cla_camb as id, des_camb||' ['||cla_camb||']' as text "
                . "from cat_clave_cambs"
                . " where niv=$nivel and "
                . "substring(cla_camb from 1 for 1)in ($capitulos) "
                . "ORDER BY cla_camb;";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function get_camb($clave_camb) {
        $data['cla_camb'] = $clave_camb;
        $this->sql = "select * from cat_clave_cambs where cla_camb=:cla_camb;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function actualizar_cambs($data) {
        $this->sql = "UPDATE cat_clave_cambs SET cla_camb=:cla_camb, niv=:niv, part1=:part1, des_camb=:des_camb, activo=:activo, comentario=:comentario WHERE cla_camb=:cla_camb;";
        $this->bindParameters($data);

        $result = $this->db->query($this->sql);

        return $result;
    }

    function inserta_camb($data) {
        $this->sql = "INSERT INTO cat_clave_cambs (cla_camb,niv,part1,des_camb,activo, fecha_registro, comentario) VALUES (:cla_camb, :niv, :part1, :des_camb, :activo, now(), :comentario) returning cla_camb;";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function get_lugares() {
        $this->sql = "select * from cat_lugar order by desc_lugar;";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function get_lugar($id_lugar) {
        $data['id_lugar'] = $id_lugar;
        $this->sql = "select * from cat_lugar where id_lugar=:id_lugar;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function actualizar_lugar($data) {
        $this->sql = "UPDATE cat_lugar SET opcion=:opcion, desc_lugar=:desc_lugar, activo=:activo WHERE id_lugar=:id_lugar;";
        $this->bindParameters($data);

        $result = $this->db->query($this->sql);

        return $result;
    }

    function inserta_lugar($data) {
        $this->sql = "INSERT INTO cat_lugar (opcion,desc_lugar,activo) VALUES (:opcion, :desc_lugar, :activo) returning id_lugar;";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function get_sexos() {
        $this->sql = "select * from cat_sexo order by desc_sexo;";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function get_sexo($id_sexo) {
        $data['id_sexo'] = $id_sexo;
        $this->sql = "select * from cat_sexo where id_sexo=:id_sexo;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function actualizar_sexo($data) {
        $this->sql = "UPDATE cat_sexo SET opcion=:opcion, desc_sexo=:desc_sexo, activo=:activo WHERE id_sexo=:id_sexo;";
        $this->bindParameters($data);

        $result = $this->db->query($this->sql);

        return $result;
    }

    function inserta_sexo($data) {
        $this->sql = "INSERT INTO cat_sexo (opcion,desc_sexo,activo) VALUES (:opcion, :desc_sexo, :activo) returning id_sexo;";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function get_usos() {
        $this->sql = "select * from cat_uso order by desc_uso;";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function get_uso($id_uso) {
        $data['id_uso'] = $id_uso;
        $this->sql = "select * from cat_uso where id_uso=:id_uso;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function actualizar_uso($data) {
        $this->sql = "UPDATE cat_uso SET letra=:letra, desc_uso=:desc_uso, activo=:activo WHERE id_uso=:id_uso;";
        $this->bindParameters($data);

        $result = $this->db->query($this->sql);

        return $result;
    }

    function inserta_uso($data) {
        $this->sql = "INSERT INTO cat_uso (letra,desc_uso,activo) VALUES (:letra, :desc_uso, :activo) returning id_uso;";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function get_faunas() {
        $this->sql = "select * from cat_fauna order by des_camb;";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function get_clases() {
        $this->sql = "select distinct clase from cat_fauna order by clase;";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function get_orden() {
        $this->sql = "select distinct orden from cat_fauna order by orden;";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function get_fauna($id_fauna) {
        $data['id_fauna'] = $id_fauna;
        $this->sql = "select * from cat_fauna where id_fauna=:id_fauna;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function actualizar_fauna($data) {
        $this->sql = "UPDATE cat_fauna SET cla_camb=:cla_camb, des_camb=:des_camb, nom_cien=:nom_cien, clase=:clase, orden=:orden, activo=:activo WHERE id_fauna=:id_fauna;";
        $this->bindParameters($data);

        $result = $this->db->query($this->sql);

        return $result;
    }

    function inserta_fauna($data) {
        $this->sql = "insert into cat_fauna (cla_camb, des_camb, nom_cien, clase, orden, activo) values (:cla_camb, :des_camb, :nom_cien, :clase, :orden, :activo) returning id_fauna;";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    /* ---------------------------------------------------------------------------------------
     *              Usuarios
      ---------------------------------------------------------------------------------------- */

    function getAllUrls() {
        $this->sql = "SELECT * FROM url WHERE activo is true";
        //$this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getUrlsbyGroup($grupo) {
        $this->sql = "SELECT * FROM url WHERE activo is true and grupo=:grupo";
        $this->bindParameters(array('grupo' => $grupo));
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function total_usuarios() {
        $this->sql = "SELECT count(*) as total FROM usuario ";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function get_usuarios($start = '', $limit = '') {
        $this->sql = "SELECT * FROM  usuario inner join perfil using(id_perfil)
                ORDER BY usr_activo DESC, usr_nombre, usr_paterno, usr_materno  offset $start limit $limit";

        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function insert_usuario($data) {
        $this->sql = "INSERT INTO usuario (usr_nombre, usr_paterno, usr_materno,  usr_alias, usr_password, 
            usr_email, usr_activo, id_dependencia, id_perfil) 
            VALUES (:usr_nombre, :usr_paterno, :usr_materno,  :usr_alias, :usr_password, :usr_email, 
            :usr_activo, :id_dependencia, :id_perfil) returning usr_id ";

        $this->bindParameters($data);

        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function actualizar_usuario($data) {
        $this->sql = "UPDATE usuario SET usr_nombre=:usr_nombre, usr_paterno=:usr_paterno, 
            usr_materno=:usr_materno, usr_alias=:usr_alias, usr_email=:usr_email, usr_activo=:usr_activo,
            id_perfil=:id_perfil, id_dependencia=:id_dependencia
            WHERE usr_id=:usr_id";

        $this->bindParameters($data);
        $result = $this->db->query($this->sql);


        return $result;
    }

    function insertUsuarioDependencia($data) { // tablerocg
        $this->sql = "INSERT INTO usuario_dependencia (usr_id,  id_dependencia) 
            VALUES (:usr_id, :id_dependencia )";

        $this->bindParameters($data);
        // echo $this->sql;
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function get_datos_usuario($id_usr) {
        $data['usr_id'] = $id_usr;
        $this->sql = "SELECT * FROM usuario WHERE usr_id=:usr_id ;";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function user_login($alias, $password) { // sipad
        $data['alias'] = $alias;
        $data['password'] = $password;
        $this->sql = "SELECT * from usuario inner join usuario_perfil using(usr_id) where usr_alias=:alias and usr_password=:password";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function delete_usuario_entes($usr_id) {
        $data['usr_id'] = $usr_id;
        $this->sql = "DELETE FROM usuario_ente WHERE usr_id=:usr_id";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results;
    }

    function get_usuario($usr_id) { // sipad
        $data['usr_id'] = $usr_id;
        $this->sql = "SELECT * FROM usuario WHERE usr_id=:usr_id";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function get_usuario_by_usuario($usr_alias) { // sipad          
        $data['usr_alias'] = $usr_alias;
        $this->sql = "SELECT usr_id from usuario where usr_alias=:usr_alias";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function get_usuario_by_correo($usr_email) { // sipad
        $data['usr_email'] = $usr_email;
        $this->sql = "SELECT usr_id from usuario where usr_email=:usr_email";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function actualizar_contrasena($data) {

        $this->sql = "UPDATE usuario SET usr_password=:usr_password WHERE usr_id=:usr_id";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result;
    }

    /*
     * 		ALTAS
     *      
     */

    function getInventarioxEnte($id_ente) {
        $data['id_ente'] = $id_ente;

        $this->sql = "select distinct iv.bienmueble, cc.des_camb 
						from inventario iv
						full join cat_clave_cambs cc on (iv.bienmueble = cc.cla_camb)
						full join (select distinct trim(causa) causa, trim(descripcion) descripcion from cat_causas where movimiento='A') ccs on (trim(cast(iv.causaalta as varchar)) = trim(ccs.causa))
						where dependenci = :id_ente
						order by des_camb;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    /*
     *          Invetario
     * 
     */

    function get_all_entes_filtro() {
        $this->sql = "SELECT * FROM cat_unidades where activo=true ORDER BY ambito, descripcion";

        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getEntesUser($usr_id) {
        $this->sql = "SELECT cat_unidades.*, usr_id from cat_unidades LEFT JOIN usuario_dependencia on (cat_unidades.id_dependencia=usuario_dependencia.id_dependencia and usr_id=$usr_id) where activo=true ORDER BY ambito, descripcion";

        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function deleteUsuarioDependencia($usr_id) {
        $this->sql = "DELETE FROM usuario_dependencia WHERE usr_id=$usr_id";

        $results = $this->db->query($this->sql, array(1));
        return $results;
    }

    function getBienInventario($data) {
        $this->sql = "select * from inventario where id_inventario=:id_inventario";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function updateAltaInventario($data) {

        $this->sql = "update inventario set  bienmueble=:bienmueble, progresivo=:progresivo, dependenci=:dependenci, procedenci=:procedenci , causaalta=:causaalta, fechaalta=:fechaalta, 
                      factura=:factura, costoalta=:costoalta, placas=:placas, marca=:marca, modelo=:modelo, serie=:serie, motor=:motor, rfv=:rfv, uso=:uso, sexo=:sexo, lugardadq=:lugardadq, nomzoocriad=:nomzoocriad, edopais=:edopais
                      where id_inventario=:id_inventario returning id_inventario;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function deleteAltaInventario($data) {
        $this->sql = "DELETE FROM inventario "
                . "WHERE id_inventario=:id_inventario "
                . "and dependenci=:dependenci"
                . "and estado_alta=1";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results;
    }

    function bajaInventario($data) {

        $this->sql = "update inventario set causabaja=:causabaja, fechabaja=:fechabaja , costoestim=:costoestim, actanumero=:actanumero,fmobaja=now(), usr_baja=:usr_baja, estado_baja=:estado_baja where id_inventario=:id_inventario and dependenci=:dependenci returning fmobaja;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function destinoFinalInventario($data) {

        $this->sql = "update inventario set causadesti=:causadesti, actadest=:actadest, fechadestf=:fechadestf, valoravalu=:valoravalu, valorventa=:valorventa, fmodesfin=now(), usr_df=:usr_df, estado_df=:estado_df  where id_inventario=:id_inventario and dependenci=:dependenci returning fmodesfin;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function altaInventario($data) { // tablerocg
        $this->sql = "INSERT into inventario (unidad, bienmueble, progresivo, dependenci, procedenci, causaalta, fechaalta, 
                                                factura, costoalta, placas, marca, modelo, serie, motor, rfv, uso, usr_alta, estado_alta, sexo, lugardadq, nomzoocriad, edopais)
                                        VALUES (:unidad, :bienmueble, :progresivo, :dependenci, :procedenci, :causaalta, :fechaalta, 
                                                :factura, :costoalta, :placas, :marca, :modelo, :serie, :motor, :rfv, :uso, :usr_alta, :estado_alta, :sexo, :lugardadq, :nomzoocriad, :edopais) returning unidad ";
        $this->bindParameters($data);
        //echo $this->sql;
        //exit();
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getPadron($data) {
        $this->sql = "select *, to_char(fmoalta,'YYYY-MM-DD')=to_char(now(),'YYYY-MM-DD')  as hoy  from inventario 
            where dependenci=:id_dependencia 
            order by :order 
            offset :offset limit :limit";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioSearch($data) {
        $this->sql = "select inventario.*, descripcion, des_camb from inventario 
            inner join cat_unidades on (dependenci=id_dependencia and cat_unidades.activo is true) 
            inner join cat_clave_cambs on bienmueble=cla_camb 
            ->filter  order by :order 
            offset :offset limit :limit";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioSearchTotal($data) {
        $this->sql = "select count(id_inventario) as total from inventario ->filter ";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getPadronXLS($data) {
        $this->sql = "select * from inventario where dependenci=:id_dependencia ";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getTotalPadron($data) {
        $this->sql = "select count(*) as total from inventario where dependenci=:id_dependencia";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioAlta($data) {
        $this->sql = "select *, to_char(fmoalta,'YYYY-MM-DD')=to_char(now(),'YYYY-MM-DD')  as hoy  
                      from inventario 
                      where (causabaja=0 or causabaja is null) 
                      and dependenci=:id_dependencia 
                      ->filter 
                      order by :order 
                      offset :offset limit :limit";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getTotalInventarioAlta($data) {
        $this->sql = "select count(*) as total from inventario where (causabaja=0 or causabaja is null) and dependenci=:id_dependencia ->filter ";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

// Supervisor


    function getInventarioAltaSupervisor($data) {
        $this->sql = "select *, to_char(fmoalta,'YYYY-MM-DD')=to_char(now(),'YYYY-MM-DD')  as hoy  from inventario 
                      where (causabaja=0 or causabaja is null) 
                      and (:estado_alta is null or estado_alta = ANY (:estado_alta))
                      and (:array_unidades is null or dependenci = ANY (:array_unidades))
                      order by fmoalta offset :offset limit :limit";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getTotalInventarioAltaSupervisor($data) {
        $this->sql = "select count(*) as total from inventario 
                      where (causabaja=0 or causabaja is null)  
                      and (:estado_alta is null or estado_alta = ANY (:estado_alta))                      
                      and (:array_unidades is null or dependenci = ANY (:array_unidades))";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioGlobal($data) {
        $this->sql = "select *, to_char(fechaalta,'YYYY-MM-DD')=to_char(now(),'YYYY-MM-DD')  as hoy  from inventario 
                      where ((:tipo=1 and estado_alta=:estado)
                      or (:tipo=2 and estado_baja=:estado)
                      or (:tipo=3 and estado_df=:estado))      
                      and dependenci = :id_dependencia
                      and ((:tipo=1 and fechaalta >= :de and fechaalta <= :hasta)
                      or (:tipo=2 and fechabaja >= :de and fechabaja <= :hasta)
                      or (:tipo=3 and fechadestf >= :de and fechadestf <= :hasta))                      
                      order by :order offset :offset limit :limit";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        //echo $this->sql;

        return $result->result_array();
    }

    function getTotalInventarioGlobal($data) {
        $this->sql = "select count(*) as total from inventario 
                      where ((:tipo=1 and estado_alta=:estado)
                      or (:tipo=2 and estado_baja=:estado)
                      or (:tipo=3 and estado_df=:estado))  
                      and dependenci = :id_dependencia
                      and ((:tipo=1 and fechaalta >= :de and fechaalta <= :hasta)
                      or (:tipo=2 and fechabaja >= :de and fechabaja <= :hasta)
                      or (:tipo=3 and fechadestf >= :de and fechadestf <= :hasta))";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        // echo $this->sql;
        return $result->result_array();
    }

    function getInventarioByids($data) {
        $this->sql = "select *, to_char(fmoalta,'YYYY-MM-DD')=to_char(now(),'YYYY-MM-DD')  as hoy  from inventario 
                      where id_inventario in (:ids)";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        // echo $this->sql;

        return $result->result_array();
    }

    function updateEstadoInventario($data) {

        $this->sql = "update inventario set ->campo=:campo_val where id_inventario=:id_inventario returning ->campo;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function insertObservacion($data) { // tablerocg
        $this->sql = "INSERT into observacion (tipo, observacion, id_generico) VALUES (:tipo, :observacion,:id_generico) returning id_observacion; ";
        $this->bindParameters($data);
        //echo $this->sql;
        //exit();
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getObservacion($data) {
        $this->sql = "select * from observacion where tipo=:tipo and id_generico=:id_generico and activo is true order by id_observacion";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

// Fin supervisor

    function getInventarioBaja($data) {
        $this->sql = "select *, to_char(fmobaja,'YYYY-MM-DD')=to_char(now(),'YYYY-MM-DD')  as hoy  from inventario 
                      where causabaja!=0 and (causadesti=0 or causadesti is null) 
                      and dependenci=:id_dependencia
                       ->filter 
                      order by :order
                      offset :offset limit :limit";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getTotalInventarioBaja($data) {
        $this->sql = "select count(*) as total from inventario where causabaja!=0 and (causadesti=0 or causadesti is null) and dependenci=:id_dependencia ->filter ";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioDestinoFinal($data) {
        $this->sql = "select *, to_char(fmodesfin,'YYYY-MM-DD')=to_char(now(),'YYYY-MM-DD')  as hoy  from inventario 
            where causabaja!=0 
            and causadesti!=0 
            and dependenci=:id_dependencia 
             ->filter 
            order by :order 
            offset :offset limit :limit";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getTotalInventarioDestinoFinal($data) {
        $this->sql = "select count(*) as total from inventario where causabaja!=0 and causadesti!=0 and dependenci=:id_dependencia ->filter";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getCAMBS() {
        $this->sql = "select * from cat_clave_cambs where activo is true";
        //  $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getCodigosCAMBS() {
        $this->sql = "select cla_camb,des_camb from cat_clave_cambs where activo is true";
        //  $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getCausas($data) {
        $this->sql = "select * from cat_causas where movimiento=:movimiento and activo is true order by cast(causa as numeric) ";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getUsos() {
        $this->sql = "select * from cat_uso where activo is true";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getSexo() {
        $this->sql = "select * from cat_sexo where activo is true";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getProcedencias() {
        $this->sql = "select * from cat_unidades where activo is true order by descripcion";
        //$this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

//  Fin Inventario

    /*
     *  Informes
     * 
     */

    function updateEstadoInventarioAlta($data) {
        $this->sql = "update inventario set estado_alta=:estado_alta_nuevo
                      where estado_alta=:estado_alta_actual  
                      and dependenci=:id_dependencia
                      and fechaalta >= :de 
                      and fechaalta <= :hasta";
        $this->bindParameters($data);
        //echo $this->sql;
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioAltaInformesConcentrado($data) {
        $this->sql = "select  date_part('month', fechaalta ) as mes, bienmueble,count(*) as total, sum(costoalta) as  cash from inventario 
                      where estado_alta > 0 
                      and dependenci=:id_dependencia
                      and fechaalta >= :de 
                      and fechaalta <= :hasta 
                      GROUP BY mes,bienmueble
                      order by mes, bienmueble";
        $this->bindParameters($data);
        //echo $this->sql;
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioAltaInformesDesglosado($data) {
        $this->sql = "select date_part('month', fechaalta ) as mes, bienmueble, costoalta as  cash, 
                      progresivo, fechaalta, causaalta, factura, marca, modelo, serie, motor from inventario 
                      where estado_alta > 0 
                      and dependenci=:id_dependencia
                      and fechaalta >= :de 
                      and fechaalta <= :hasta 
                      order by mes, bienmueble,progresivo";
        $this->bindParameters($data);
        //echo $this->sql;
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioAltaInformesDesglosadotoCSV($data) {
        $this->sql = "select id_inventario, unidad, bienmueble, progresivo, 
                      dependenci, procedenci, causaalta, fechaalta, factura, costoalta, placas, 
                      marca, modelo, serie, motor, uso, sexo, lugardadq, nomzoocriad, edopais, 
                      causabaja, fechabaja, costoestim, actanumero, causadesti, actadest, fechadestf, 
                      valoravalu, valorventa, fmoalta, fmobaja, fmodesfin from inventario 
                      where  dependenci=:id_dependencia
                      and fechaalta >= :de 
                      and fechaalta <= :hasta 
                      order by fechaalta, bienmueble, progresivo";
        $this->bindParameters($data);
        //echo $this->sql;
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioAltaInformesRespuesta($data) {
        $this->sql = "select date_part('month', fechaalta ) as mes, bienmueble, costoalta as  cash, 
                      progresivo, fechaalta, causaalta, factura, marca, modelo, serie, motor, observacion from inventario 
                      left join observacion as o on (id_generico = id_inventario and o.tipo=1 and o.activo is true )
                      where estado_alta = 4
                      and dependenci=:id_dependencia
                      and fechaalta >= :de 
                      and fechaalta <= :hasta 
                      order by mes, bienmueble,progresivo";
        $this->bindParameters($data);
        //echo $this->sql;
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioBajaInformesConcentrado($data) {
        $this->sql = "select  date_part('month', fechabaja ) as mes, bienmueble,count(*) as total, sum(costoalta) as  cash , sum(costoestim) as  cashbaja from inventario 
                      where estado_baja > 0
                      and dependenci=:id_dependencia
                      and fechabaja >= :de 
                      and fechabaja <= :hasta 
                      GROUP BY mes,bienmueble
                      order by mes, bienmueble";
        $this->bindParameters($data);
        // echo $this->sql;
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function updateEstadoInventarioBaja($data) {
        $this->sql = "update inventario set estado_baja=:estado_baja_nuevo
                      where estado_baja=:estado_baja_actual
                      and dependenci=:id_dependencia
                      and fechabaja >= :de 
                      and fechabaja <= :hasta ";
        $this->bindParameters($data);
        //echo $this->sql;
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioBajaInformesDesglosado($data) {
        $this->sql = "select  date_part('month', fechabaja) as mes, bienmueble, costoalta as  cash, costoestim as  cashbaja, 
                      progresivo, fechaalta, causabaja, fechabaja, factura,marca,modelo,serie,motor from inventario 
                      where estado_baja > 0
                      and dependenci=:id_dependencia
                      and fechabaja >= :de 
                      and fechabaja <= :hasta 
                      order by mes, bienmueble,progresivo";
        $this->bindParameters($data);
        //echo $this->sql;
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioBajaInformesDesglosadotoCSV($data) {
        $this->sql = "select id_inventario, unidad, bienmueble, progresivo, 
                      dependenci, procedenci, causaalta, fechaalta, factura, costoalta, placas, 
                      marca, modelo, serie, motor, uso, sexo, lugardadq, nomzoocriad, edopais, 
                      causabaja, fechabaja, costoestim, actanumero, causadesti, actadest, fechadestf, 
                      valoravalu, valorventa, fmoalta, fmobaja, fmodesfin from inventario 
                      where estado_baja > 0
                      and dependenci=:id_dependencia
                      and fechabaja >= :de 
                      and fechabaja <= :hasta 
                      order by fechabaja, bienmueble, progresivo";
        $this->bindParameters($data);
        //echo $this->sql;
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioBajaInformesRespuesta($data) {
        $this->sql = "select  date_part('month', fechabaja) as mes, bienmueble, costoalta as  cash, costoestim as  cashbaja, 
                      progresivo, fechaalta, causabaja, fechabaja, factura,marca,modelo,serie,motor, observacion from inventario 
                      left join observacion as o on (id_generico = id_inventario and o.tipo=2 and o.activo is true )
                      where estado_baja = 4
                      and dependenci=:id_dependencia
                      and fechabaja >= :de 
                      and fechabaja <= :hasta 
                      order by mes, bienmueble,progresivo";
        $this->bindParameters($data);
        //echo $this->sql;
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioDFInformesConcentrado($data) {
        $this->sql = "select  date_part('month', fechadestf ) as mes, bienmueble,count(*) as total,
                      sum(costoalta) as  cash , sum(costoestim) as  cashbaja,
                      sum(valoravalu) as  cashavaluo , sum(valorventa) as  cashventa from inventario 
                      where estado_df > 0
                      and dependenci=:id_dependencia
                      and fechadestf >= :de 
                      and fechadestf <= :hasta 
                      GROUP BY mes,bienmueble
                      order by mes, bienmueble";
        $this->bindParameters($data);
        // echo $this->sql;
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function updateEstadoInventarioDF($data) {
        $this->sql = "update inventario set estado_df=:estado_df_nuevo  
                      where estado_df=:estado_df_actual
                      and dependenci=:id_dependencia
                      and fechadestf >= :de 
                      and fechadestf <= :hasta ";
        $this->bindParameters($data);
        //echo $this->sql;
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioDFInformesDesglosado($data) {
        $this->sql = "select  date_part('month', fechadestf) as mes, bienmueble, costoalta as  cash, costoestim as  cashbaja,
                      valoravalu as  cashavaluo, valorventa as  cashventa, 
                      progresivo, fechaalta, causabaja, fechabaja, factura,marca,modelo,serie,motor ,causadesti, fechadestf from inventario 
                      where estado_df > 0
                      and dependenci=:id_dependencia
                      and fechadestf >= :de 
                      and fechadestf <= :hasta 
                      order by mes, bienmueble,progresivo";
        $this->bindParameters($data);
        //echo $this->sql;
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioDFInformesDesglosadotoCSV($data) {
        $this->sql = "select id_inventario, unidad, bienmueble, progresivo, 
                      dependenci, procedenci, causaalta, fechaalta, factura, costoalta, placas, 
                      marca, modelo, serie, motor, uso, sexo, lugardadq, nomzoocriad, edopais, 
                      causabaja, fechabaja, costoestim, actanumero, causadesti, actadest, fechadestf, 
                      valoravalu, valorventa, fmoalta, fmobaja, fmodesfin from inventario 
                      where estado_df > 0
                      and dependenci=:id_dependencia
                      and fechadestf >= :de 
                      and fechadestf <= :hasta 
                      order by fechadestf, bienmueble, progresivo";
        $this->bindParameters($data);
        //echo $this->sql;
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInventarioDFInformesRespuesta($data) {
        $this->sql = "select date_part('month', fechadestf) as mes, bienmueble, costoalta as  cash, costoestim as  cashbaja,
                      valoravalu as  cashavaluo, valorventa as  cashventa, 
                      progresivo, fechaalta, causabaja, fechabaja, factura,marca,modelo,serie,motor ,causadesti, fechadestf, observacion from inventario 
                      left join observacion as o on (id_generico = id_inventario and o.tipo=2 and o.activo is true )
                      where estado_df = 4
                      and dependenci=:id_dependencia
                      and fechadestf >= :de 
                      and fechadestf <= :hasta 
                      order by mes, bienmueble,progresivo";
        $this->bindParameters($data);
        //echo $this->sql;
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function altaInforme() {
        $this->sql = "INSERT into informe (activo) VALUES (false) returning id_informe ";
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function updateInforme($data) {
        $this->sql = "update informe set activo=:activo, vistaprevia=:vistaprevia, tipo=:tipo, id_dependencia=:id_dependencia, estado=:estado,
                      year=:year, trimestre=:trimestre, archivo1=:archivo1, archivo2=:archivo2, 
                      archivo3=:archivo3, archivo4=:archivo4 where id_informe=:id_informe returning id_informe;";
        $this->bindParameters($data);

        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function altaInformeRespuesta($data) {
        $this->sql = "update informe set estado=2, fecha_respuesta=now(), archivo5=:archivo5 , revision=:revision, aprobado=:aprobado, pendiente=:pendiente, total=:total where id_informe=:id_informe returning id_informe;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInformes($data) {
        $this->sql = "select *,to_char(fecha_registro,'YYYY-MM-DD')=to_char(now(),'YYYY-MM-DD')  as hoy  from informe where activo is true and vistaprevia is not true and id_dependencia=:id_dependencia order by id_informe desc offset :offset limit :limit";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInforme($data) {
        $this->sql = "select *,to_char(fecha_registro,'YYYY-MM-DD')=to_char(now(),'YYYY-MM-DD')  as hoy  from informe where activo is true and id_informe=:id_informe";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getTotalInformes($data) {
        $this->sql = "select count(*) as total from informe where activo is true and vistaprevia is not true and id_dependencia=:id_dependencia";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getInformesSupervisor($data) {
        $this->sql = "select  id_informe, informe.tipo, fecha_registro, estado, year, trimestre, archivo1, archivo2, archivo3, archivo4, archivo5, fecha_respuesta,  t5.revision, t3.aprobado, t4.pendiente, t2.total from informe INNER JOIN (select  1 as tipo, count(*) as total from inventario 
                      where estado_alta >= 2
                      and dependenci = :id_dependencia
                      and fechaalta >= :de and fechaalta <= :hasta
											UNION
                      select  2 as tipo, count(*) as total from inventario 
                      where estado_baja >= 2
                      and dependenci = :id_dependencia
                      and fechabaja >= :de and fechabaja <= :hasta
											UNION
                      select  3 as tipo, count(*) as total from inventario 
                      where estado_df>= 2
                      and dependenci = :id_dependencia
                      and fechadestf >= :de and fechadestf <= :hasta
                ) as t2 on(informe.tipo= t2.tipo) INNER JOIN  (select 1 as tipo, count(*) as aprobado from inventario 
                      where estado_alta = 3
                      and dependenci = :id_dependencia
                      and fechaalta >= :de and fechaalta <= :hasta
										  UNION
                      select  2 as tipo, count(*) as total from inventario 
                      where estado_baja = 3
                      and dependenci = :id_dependencia
                      and fechabaja >= :de and fechabaja <= :hasta
											UNION
                      select  3 as tipo, count(*) as total from inventario 
                      where estado_df = 3
                      and dependenci = :id_dependencia
                      and fechadestf >= :de and fechadestf <= :hasta
                ) as t3 on(informe.tipo= t3.tipo) INNER JOIN  (select  1 as tipo, count(*) as pendiente from inventario 
                      where estado_alta = 4
                      and dependenci = :id_dependencia
                      and fechaalta >= :de and fechaalta <= :hasta
											UNION
                      select  2 as tipo, count(*) as total from inventario 
                      where estado_baja = 4
                      and dependenci = :id_dependencia
                      and fechabaja >= :de and fechabaja <= :hasta
											UNION
                      select  3 as tipo, count(*) as total from inventario 
                      where estado_df= 4
                      and dependenci = :id_dependencia
                      and fechadestf >= :de and fechadestf <= :hasta
                ) as t4 on(informe.tipo= t4.tipo) INNER JOIN  (select  1 as tipo, count(*) as revision from inventario 
                      where estado_alta = 2
                      and dependenci = :id_dependencia
                      and fechaalta >= :de and fechaalta <= :hasta
											UNION
                      select  2 as tipo, count(*) as total from inventario 
                      where estado_baja = 2
                      and dependenci = :id_dependencia
                      and fechabaja >= :de and fechabaja <= :hasta
											UNION
                      select  3 as tipo, count(*) as total from inventario 
                      where estado_df = 2
                      and dependenci = :id_dependencia
                      and fechadestf >= :de and fechadestf <= :hasta
                ) as t5 on(informe.tipo= t5.tipo) 
                where year=:year 
                and EXTRACT(QUARTER FROM TIMESTAMP :de) = trimestre 
                and informe.estado=1 
                and informe.id_dependencia=:id_dependencia                
                and informe.tipo=:informeDe                
                and vistaprevia is not true
                union 
                select  id_informe, informe.tipo, fecha_registro, estado, year, trimestre, archivo1, archivo2, archivo3, archivo4, archivo5, fecha_respuesta,  revision, aprobado, pendiente,total from informe 
                where year=:year                 
                and vistaprevia is not true
                and EXTRACT(QUARTER FROM TIMESTAMP :de) = trimestre 
                and estado=2 
                and id_dependencia=:id_dependencia
                and tipo=:informeDe
                order by id_informe asc offset :offset limit :limit ";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        // echo $this->sql;
        return $result->result_array();
    }

    function getRegistrosTotales($data) {
        $this->sql = "select  revision, aprobado, pendiente, total from (select :tipo as tipo) as informe INNER JOIN (select  1 as tipo, count(*) as total from inventario 
                      where estado_alta >= 2 
                      and dependenci = :id_dependencia
                      and fechaalta >= :de and fechaalta <= :hasta
											UNION
                      select  2 as tipo, count(*) as total from inventario 
                      where estado_baja >= 2
                      and dependenci = :id_dependencia
                      and fechabaja >= :de and fechabaja <= :hasta
											UNION
                      select  3 as tipo, count(*) as total from inventario 
                      where estado_df>= 2
                      and dependenci = :id_dependencia
                      and fechadestf >= :de and fechadestf <= :hasta
                ) as t2 on(informe.tipo= t2.tipo) INNER JOIN  (select 1 as tipo, count(*) as aprobado from inventario 
                      where estado_alta = 3
                      and dependenci = :id_dependencia
                      and fechaalta >= :de and fechaalta <= :hasta
										  UNION
                      select  2 as tipo, count(*) as total from inventario 
                      where estado_baja = 3
                      and dependenci = :id_dependencia
                      and fechabaja >= :de and fechabaja <= :hasta
											UNION
                      select  3 as tipo, count(*) as total from inventario 
                      where estado_df = 3
                      and dependenci = :id_dependencia
                      and fechadestf >= :de and fechadestf <= :hasta
                ) as t3 on(informe.tipo= t3.tipo) INNER JOIN  (select  1 as tipo, count(*) as pendiente from inventario 
                      where estado_alta = 4
                      and dependenci = :id_dependencia
                      and fechaalta >= :de and fechaalta <= :hasta
											UNION
                      select  2 as tipo, count(*) as total from inventario 
                      where estado_baja = 4
                      and dependenci = :id_dependencia
                      and fechabaja >= :de and fechabaja <= :hasta
											UNION
                      select  3 as tipo, count(*) as total from inventario 
                      where estado_df= 4
                      and dependenci = :id_dependencia
                      and fechadestf >= :de and fechadestf <= :hasta
                ) as t4 on(informe.tipo= t4.tipo) INNER JOIN  (select  1 as tipo, count(*) as revision from inventario 
                      where estado_alta = 2
                      and dependenci = :id_dependencia
                      and fechaalta >= :de and fechaalta <= :hasta
											UNION
                      select  2 as tipo, count(*) as total from inventario 
                      where estado_baja = 2
                      and dependenci = :id_dependencia
                      and fechabaja >= :de and fechabaja <= :hasta
											UNION
                      select  3 as tipo, count(*) as total from inventario 
                      where estado_df = 2
                      and dependenci = :id_dependencia
                      and fechadestf >= :de and fechadestf <= :hasta
                ) as t5 on(informe.tipo= t5.tipo) ";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

//  Fin Informes

    /*
     *  Control numeros Progresivos
     * 
     */

    function existeProgresivo($data) {
        $this->sql = "select id_dependencia from progresivo where id_dependencia=:id_dependencia and cla_camb=:cla_camb";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function altaProgresivo($data) {
        $this->sql = "INSERT into progresivo (id_dependencia, cla_camb) VALUES (:id_dependencia, :cla_camb) returning id_dependencia ";
        $this->bindParameters($data);

        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function checkAndLockProgresivo($data) {

        $this->sql = "update progresivo set usr_id=:usr_id, fecha_actualizacion=now() where id_dependencia=:id_dependencia and cla_camb=:cla_camb and (usr_id is null or usr_id=:usr_id) returning usr_id;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function countProgresivo($data) {
        $this->sql = "select count(*) as total from inventario where dependenci=:id_dependencia and bienmueble=:cla_camb";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getNextProgresivo($data) {
        $this->sql = "select max(progresivo) +1 as progresivo from inventario where dependenci=:id_dependencia and bienmueble=:cla_camb";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function unlockProgresivo($data) {

        $this->sql = "update progresivo set usr_id=NULL, fecha_actualizacion=now() where id_dependencia=:id_dependencia and cla_camb=:cla_camb returning usr_id;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function freeProgresivo($data) {
        $this->sql = "DELETE FROM progresivo WHERE id_dependencia=:id_dependencia and cla_camb=:cla_camb and (usr_id=:usr_id or (now()-fecha_actualizacion ) >= '5 minute')";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results;
    }

// FIN Control numeros Progresivos    
//propiedades

    function newPropiedad($data) {
        $this->sql = "INSERT into propiedad (prop_name, prop_value) VALUES (:prop_name, :prop_value) returning prop_name ";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function updatePropiedad($data) {

        $this->sql = "update propiedad set prop_value=:prop_value where prop_name=:prop_name returning prop_value;";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getPropiedad($data) {
        $this->sql = "select prop_value from propiedad where prop_name=:prop_name";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    /*  function getMinYearInventario() {
      $this->sql = "select min(fechaalta) as fechaalta from inventario;";
      $result = $this->db->query($this->sql);
      $fecha1=$result->result_array();
      $this->sql = "select min(fechabaja) as fechabaja from inventario;";
      $result = $this->db->query($this->sql);
      $fecha2=$result->result_array();
      $this->sql = "select min(fechadestf) as fechadestf from inventario;";
      $result = $this->db->query($this->sql);
      $fecha3=$result->result_array();
      print_r($fecha1);
      print_r($fecha2);
      print_r($fecha3);

      } */

    function getMinYearInventario() {
        $this->sql = "select min(fechaalta) as fecha from inventario;";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getallSessions() {
        $this->sql = "select * from ci_sessions";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function deleteSession($session_id) {
        $data['session_id'] = $session_id;
        $this->sql = "DELETE FROM ci_sessions WHERE session_id=:session_id";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results;
    }

    function informeTest($data) {
        $this->sql = "select ambito,  nombre, descripcion, clave_unidad,id_dependencia, cantidad_altas, total_altas, cantidad_bajas, total_bajas
from cat_unidades 
LEFT JOIN cat_ente_publico using(id_ente_publico) 
LEFT JOIN
(select  dependenci as id_dependencia, count(id_inventario) as cantidad_altas ,sum (costoalta) as total_altas from inventario  
where causabaja is null or causabaja=0 and fechaalta <:corte
GROUP BY dependenci)  as s1 using (id_dependencia)
LEFT JOIN
(select dependenci as id_dependencia,   count(id_inventario) as cantidad_bajas,sum (costoestim) as total_bajas from inventario  
where causabaja is not null and causabaja!=0 and fechabaja <:corte
GROUP BY dependenci) as s2 using (id_dependencia)
where ambito is not null and nombre is not null
and cat_unidades.activo is true
ORDER BY ambito asc, nombre asc,  descripcion asc";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function reporteCumplimiento($data) {
        $this->sql = "select clave_unidad, descripcion, cat_unidades.id_dependencia,sq1.id_informe as altas, sq2.id_informe as bajas , sq3.id_informe as df,sq1.pendiente as altas_pendiente, sq2.pendiente as bajas_pendiente, sq3.pendiente as df_pendiente  from cat_unidades 
LEFT JOIN (SELECT DISTINCT ON (id_dependencia) * FROM informe where tipo=1 and vistaprevia=false and year=:year and trimestre=:trimestre ORDER BY id_dependencia,id_informe desc)  sq1 using (id_dependencia)
LEFT JOIN (SELECT DISTINCT ON (id_dependencia) * FROM informe where tipo=2 and vistaprevia=false and year=:year and trimestre=:trimestre  ORDER BY id_dependencia,id_informe desc)  sq2 using (id_dependencia)
LEFT JOIN (SELECT DISTINCT ON (id_dependencia) * FROM informe where tipo=3 and vistaprevia=false and year=:year and trimestre=:trimestre  ORDER BY id_dependencia,id_informe desc)  sq3 using (id_dependencia)
where  ambito!='AUTONOMO' and cat_unidades.activo is true
order by ambito, descripcion";
        $this->bindParameters($data);

        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function totalInventario($data) {
        $this->sql = "select count(id_inventario) as total from inventario ->filtro";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function executeQuery($query, $data = null) {
        $this->sql = $query;
        if ($data != null)
            $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    /*     * ******************************** */

    function get_tipo_actividad() {
        $this->sql = "select * from cat_tipo_actividad;";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function get_entes() {
        $this->sql = "select * from cat_ente_publico where activo='t' order by nombre_ente;";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function guarda_actividad($data) {
        $this->sql = "INSERT INTO actividades (id_tipo_actividad, actividad, ids_ente_responsable, id_ente_registra, anio_actividad) VALUES "
                . "(:id_tipo_actividad, :actividad, :ids_ente_responsable, :id_ente_registra, :anio_actividad);";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql, array(1));
        return $result;
    }

    function get_actividad_ente($id_ente) {

        $this->sql = "select id_actividad, id_tipo_actividad, tipo_actividad, actividad,ids_ente_responsable,anio_actividad from actividades "
                . "inner join cat_tipo_actividad using (id_tipo_actividad)"
                . "where id_ente_registra=$id_ente order by id_actividad;";

        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function get_actividad($id_actividad) {

        $this->sql = "select id_actividad, id_tipo_actividad, tipo_actividad, actividad,ids_ente_responsable,anio_actividad from actividades "
                . "inner join cat_tipo_actividad using (id_tipo_actividad)"
                . "where id_actividad=$id_actividad order by id_actividad;";

        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function get_subactividades($id_actividad) {

        $this->sql = "select * from subactividades "
                . "where id_actividad=$id_actividad order by id_actividad;";

        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function guarda_subactividad($data) {
        $this->sql = "INSERT INTO subactividades (id_actividad, subactividad, meta) VALUES "
                . "(:id_actividad, :subactividad, :meta);";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql, array(1));
        return $result;
    }

    function get_subact_acciones($id_actividad, $id_subactividad) {

        $this->sql = "select * from subactividades "
                . "where id_actividad=$id_actividad and id_subactividad=$id_subactividad order by id_actividad;";

        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function get_acciones($id_actividad, $id_subactividad) {

        $this->sql = "select * from acciones "
                . "where id_actividad=$id_actividad and id_subactividad=$id_subactividad order by id_accion;";

        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function guarda_accion_cuantitativa($data) {
        $this->sql = "INSERT INTO acciones (id_actividad, id_subactividad,cantidad,accion, mes) VALUES "
                . "(:id_actividad, :id_subactividad, :cantidad, :accion, :mes);";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql, array(1));
        return $result;
    }

    function guarda_accion_no_cuantitativa($data) {
        $this->sql = "INSERT INTO acciones (id_actividad, id_subactividad,accion, mes) VALUES "
                . "(:id_actividad, :id_subactividad,:accion,:mes);";
        $this->bindParameters($data);
        $result = $this->db->query($this->sql, array(1));
        return $result;
    }

    function getSegimientos3($id_generico, $id_tipo_compromiso) {
        $this->sql = " select seguimiento.* , nombre,paterno, materno  from seguimiento inner join usuario using(id_usuario) "
                . "where id_generico=$id_generico and id_tipo_proyecto= $id_tipo_compromiso and seguimiento.activo is true order by fecha_registro DESC";
       
        //echo  $this->sql;
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }
   

}

?>
