<?php if ( ! defined('BASEPATH')) exit('Tidak ada akses langsung script diperbolehkan');
 
class Pdf{
    function pdf(){
        $CI =& get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }
 
    function load($param=NULL){
        include_once APPPATH.'third_party/mpdf60/mpdf.php';
        if($params == NULL){
            $mpdf=new mPDF('c', 'A4-L'); 
        }
        return $mpdf;
    }
}
 