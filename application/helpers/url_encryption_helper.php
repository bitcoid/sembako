<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function encode_url($string, $key="", $url_safe=TRUE){
    if($key==null || $key==""){
        $key="SinERgIb1sm1ll4hFOUndAtion";
    }
    $CI =& get_instance();
    $CI->load->library('encrypt');
    $ret = $CI->encrypt->encode($string, $key);

    if ($url_safe){
    	$ret = strtr($ret,
               		 array(
	                    '+' => '.',
                    	'=' => '-',
                        '/' => '~',
                        '1' => '3',
                        '2' => '5',
                        '3' => '1',
                        '4' => '6',
                        '5' => '9',
                        '6' => '2',
                        '7' => '4',
                        '8' => '7',
                        '9' => '0',
                    	'0' => '8'

                	)
            	);
    }
    return $ret;
}

function decode_url($string, $key=""){
    if($key==null || $key==""){
    	$key="SinERgIb1sm1ll4hFOUndAtion";
    }
    $CI =& get_instance();
    $string = strtr($string,
            		array(
                		'.' => '+',
                		'-' => '=',
                		'~' => '/',
                        '3' => '1',
                        '5' => '2',
                        '1' => '3',
                        '6' => '4',
                        '9' => '5',
                        '2' => '6',
                        '4' => '7',
                        '7' => '8',
                        '0' => '9',
                        '8' => '0'
            		)
        		);

    $CI->load->library('encrypt');

    return $CI->encrypt->decode($string, $key);
}

?>
