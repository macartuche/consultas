<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mpdf {

    function m_pdf() {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }

    function load($param = "A4-L") {
        include_once APPPATH . '/third_party/mpdf/mpdf.php';

//        if ($params == NULL)
//        {
//            $param = '"en-GB-x","A4","","",10,10,10,10,6,3,"L"';          
//        }

        return new mPDF("en-GB", $param, "", "", 10, 10, 10, 10, 6, 3);
    }
	
	function load2($param = "A4-L") {
        include_once APPPATH . '/third_party/mpdf/mpdf.php';

//        if ($params == NULL)
//        {
//            $param = '"en-GB-x","A4","","",10,10,10,10,6,3,"L"';          
//        }

        return new mPDF("en-GB", $param, "", "", 10, 10, 25, 10, 6, 3);
    }

}
