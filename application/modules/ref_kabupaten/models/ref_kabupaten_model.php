<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of muser
 *
 * @author odyman
 */
class ref_kabupaten_model extends CI_Model {
 
    // private $is_login = false;

    public function __construct() {
        parent::__construct();
    }

    function GetEditData($id=0){
		$dr = $this->db->from('kabupaten')->where('id', $id)->get()->row();
		return $dr;
	}
	 
	function save(){
		$t=$this->input; 
	 
		$data = array(  'id_provinsi' => $t->post('id_provinsi'), 
					    'nama' => $t->post('nama'), 
					  );
		 
		$options = array('id' => $this->input->post('id'));		
		$Q = $this->db->get_where('kabupaten', $options,1);
		$r = $Q->row();
		 
		if($Q->num_rows() > 0){
		  if($this->input->post('id')){
			$data_ID = array('id' => $this->input->post('id'));  
			$this->db->trans_start(); 		
			$this->db->update('kabupaten',$data, $data_ID); 
			$this->db->trans_complete();  
		  }
		}else{   	
		 
			$this->db->trans_start();
			$this->db->insert('kabupaten', $data);
			$id = $this->db->insert_id(); 
			$this->db->trans_complete(); 
		    return $id;
		}
		$Q->free_result();
		$this->db->close();			  
	} 
	
				
	function DeleteTrans($id=0){
		$this->db->trans_start(); 
		 
		$this->db->where('id', $id);
		$this->db->delete('kabupaten'); 
		$this->db->trans_complete(); 
		$this->db->close();
	}	
 	 
     
}

?>
