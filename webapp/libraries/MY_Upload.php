<?php

class MY_Upload extends CI_Upload {

    public $date_dir = false;
    public $relative_full = '';

    public function __construct() {
        parent::__construct();
    }

    function uploadFile($config) {



        $CI = & get_instance();
        $CI->load->helper('date');
        $this->relative_full = $config['upload_path'];
        if (isset($config['date_dir']) and $config['date_dir'] == true) {
            $time = time();
            $anio = mdate("%Y", $time);
            $mes = mdate("%m", $time);
            $dia = mdate("%d", $time);
            $this->relative_full = $config['upload_path'] .= '/' . $anio . '/' . $mes . '/' . $dia;
        }


        if (!file_exists($config['upload_path'])) {

            if (!mkdir($config['upload_path'], 0775, true))
                die('No fue posible crear el Directorio' . $this->upload_path);
        }

        $this->initialize($config);

        if (!$this->do_upload($config['nombre_input'])) {
            $result = array(
                'result' => false,
                'error' => $this->display_errors()
            );
        } else {
            $temp = $this->data();
            $temp['relative_path'] = $this->relative_full .'/'. $temp['file_name'];
            $result = array(
                'result' => true,
                'data' => $temp
            );
        }
        return $result;
    }

}

?>
