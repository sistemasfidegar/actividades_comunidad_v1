<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_mpdf {

    public function My_mpdf() {
        require_once('mpdf/mpdf.php');
    }
            
    public function generaPDF($data) {
    	
    	set_time_limit(0);
    	ini_set('memory_limit', '-1');
    	ini_set('max_execution_time', '0');
    	ini_set('zlib.output_compression', '0');
    	ini_set('implicit_flush', '1');

    	    	    
    	try
    	{
    		$papel = 'letter-'.$data['orientation'];
    		
    		$mpdf=new mPDF('utf-8', $papel, 8, '', 10,10,10,10,0,0,$data['orientation']); 
			$mpdf->displayDefaultOrientation = true;
			//$mpdf->setFooter('{PAGENO}');
			$mpdf->WriteHTML($data['html']);
			$mpdf->Output('resources/pdf/reporte.pdf');
			//exit;
    	}
    	catch(exception $e) {
    		echo $e;
    		exit;
    	}

    	
    }
    
                	
}

?>