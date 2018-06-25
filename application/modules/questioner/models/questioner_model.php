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
class Questioner_model extends CI_Model {
 
    // private $is_login = false;

    public function __construct() {
        parent::__construct();
    }
	
	 
	//ADVANCED SEACRh
	public function allrecords($title){ 
		$this->db->save_queries = FALSE;
		$base_64 = $title . str_repeat('=', strlen($title) % 4);
		$s = base64_decode($title); 
		$p = explode('_', $s); 
		//print_r($p); 
       
		$SQL ='select count(id) as nums from dbs_view_kartu_keluarga where 1=1';
		if(!empty($p[0]) || !empty($p[1]))
		{ 
			if(!empty($p[0])) { $SQL .=' AND no_kk = "'.$p[0].'" '; }
			if(!empty($p[1])) { $SQL .=' AND nm_kepala LIKE "%'.$p[1].'%" '; } 
		} 
		 
		$rs = $this->db->query($SQL)->row(); 
		return $rs->nums;
    }
    
    public function data_lists($limit=0,$offset=0,$title){
		$this->db->save_queries = FALSE;
		$base_64 = $title . str_repeat('=', strlen($title) % 4);
		$s = base64_decode($title); 
		$p = explode('_', $s);
		
        
		 $SQL ='select * from dbs_view_kartu_keluarga where 1=1';
		 if(!empty($p[0]) || !empty($p[1]) )
		 { 
			if(!empty($p[0])) { $SQL .=' AND no_kk = "'.$p[0].'" '; }
			if(!empty($p[1])) { $SQL .=' AND nm_kepala LIKE "%'.$p[1].'%" '; }  
		 }
		
		$SQL .= ' LIMIT '.$offset.','.$limit; 
		//echo $SQL; die;
		$rs = $this->db->query($SQL); 
		return $rs->result();
    }
	
	function data_detail($id){
		$this->db->where('id', $id);
		$dr = $this->db->from('view_stnk')->get()->row(); 
		return $dr;
	}
 
	
	function kecamatan(){
		$this->db->where('id_kabupaten', $this->config->item('kota'));
		$dr = $this->db->from('kecamatan')->get()->result();
		return $dr;
	}
	
	function kelurahan($id_kec=0){
		$this->db->where('id_kecamatan', $id_kec);
		$dr = $this->db->from('kelurahan')->get()->result();
		return $dr;
	}

    function GetEditData($id=0){
		$dr = $this->db->from('kartukeluarga')->where('id', $id)->get()->row();
		//echo $this->db->last_query();
		return $dr;
	}
	 
	function save(){
			$t=$this->input; 
		    
			$data_s_insert = array('createdBy' => $this->auth->identity(), 'createdDate' => date("Y-m-d H:i:s"));
			$data_s_update = array('updatedBy' => $this->auth->identity(), 'updatedDate' => date("Y-m-d H:i:s"));
			 
			$data = array( 
				'no_kk' => $t->post('no_kk'),
				'nm_kepala' => $t->post('nm_kepala'),
				'tgl_lhr_kepala' => $t->post('tgl_lhr_kepala'),
				'umur_kepala' => $t->post('umur_kepala'),
				'no_ktp_kepala' => $t->post('no_ktp_kepala'),
				'pendidikan_kepala' => $t->post('pendidikan_kepala'),
				'nm_istri' => $t->post('nm_istri'),
				'tgl_lhr_istri' => $t->post('tgl_lhr_istri'),
				'umur_istri' => $t->post('umur_istri'),
				'no_ktp_istri' => $t->post('no_ktp_istri'),
				'pendidikan_istri' => $t->post('pendidikan_istri'),
				'alamat' => $t->post('alamat'),
				'id_kota' => $this->config->item('kota'),
				'id_kec' => $t->post('id_kec'),
				'id_desa' =>$t->post('id_desa') 
			);
			//print_r($data);die; 
			$options = array('id' => $t->post('id'));		
			$Q = $this->db->get_where('kartukeluarga', $options,1);
			$r = $Q->row();
			 
			if($Q->num_rows() > 0){
			  if($t->post('id')){			  
			    
				$data_tb = array_merge($data, $data_s_update); 
				$data_ID = array('id' => $t->post('id'));   
				$this->db->trans_start(); 		
				$this->db->update('kartukeluarga',$data_tb, $data_ID); 
				$this->db->trans_complete();  
			  }
			}else{   	
				$this->db->trans_start(); 
				$data_tb = array_merge($data, $data_s_insert);
				$this->db->insert('kartukeluarga', $data_tb);
				$id = $this->db->insert_id(); 
				$this->db->trans_complete();
			} 
		$Q->free_result();
		$this->db->close();			  
	} 
	
	 
	function DeleteTrans($id=0){
		$this->db->trans_start(); 
		$this->db->where('id', $id); 
		$this->db->delete('kartukeluarga'); 
		$this->db->trans_complete(); 
		$this->db->close();
	}

	function getPendidikan(){
		$dr = $this->db->from('pendidikan')->get()->result();
		return $dr;
	}	
 	  
}

?>
