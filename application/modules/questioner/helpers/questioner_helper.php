<?php
function ref_kab($id_kabupaten){
	$CI =& get_instance();  
	$CI->db->where('id', $id_kabupaten);
	$dr = $CI->db->select('nama')->from('dbs_kabupaten')->get()->row();
	//echo $CI->db->last_query();die;
	$return ='';
	if($dr){ 
		$return .= $dr->nama; 
	}
    return $return;		
} 
function ref_kec($id_kec){
	$CI =& get_instance();  
	$CI->db->where('id', $id_kec);
	$dr = $CI->db->select('nama')->from('dbs_kecamatan')->get()->row();
	//echo $CI->db->last_query();die;
	$return ='';
	if($dr){ 
		$return .= $dr->nama; 
	}
    return $return;		
}  
