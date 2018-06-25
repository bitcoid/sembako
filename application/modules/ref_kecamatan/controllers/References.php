<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class References extends Admin_Controller{ 
	
	public function __construct() 
	{
			parent::__construct();
			$this->load->helper(array('form', 'url','text'));
			$this->load->library(array('form_validation' ,'datatables')); 
			Template::set('toolbar_title','Referensi Kabupaten'); 
			$this->load->model('ref_kecamatan_model');
    }
	 
	public function index() 
	{  
		Template::set_block('sub_nav', 'manage/_sub_nav');
		$this->auth->restrict('ref_kecamatan.references.view'); 
		Template::set_view('manage/index');
		Template::render();
    }
	 
	 /*----------PRIVATE DATA TABLEs SHORT TERM-----------------*/
	public function gettable(){
	    $this->datatables->where('id_provinsi', 1 );
		$this->datatables->where('id_kabupaten', $this->config->item('kota') );
		$this->datatables->select('id,kota, nama', FALSE)->from('view_kecamatan'); 
		$this->datatables->add_column('edit', '<a class="btn btn-xs btn-info"  href="'.site_url('admin/references/ref_kecamatan/edit/$1').'"><i class="fa fa-pencil-square"></i> </a> 
											   <a class="btn btn-xs btn-danger" href="#" onclick="funct_hapus($1)"><i class="fa fa-trash-o"></i></a>
											', 'id');
		$this->datatables->order_by('id','DESC');
		echo $this->datatables->generate();  
		die;  
	}
	 
	public function create(){  
		$this->auth->restrict('ref_kecamatan.references.create'); 		 
	 	$t=$this->input; 
		
		$kab = $this->ref_kecamatan_model->kabupaten();		
		Template::set('kab', $kab);
		
		if($t->post('save') == 'Submit'){
			$this->ref_kecamatan_model->save();
			Template::set_message('Successfully Saving', 'success');
			Template::redirect('admin/references/ref_kecamatan');
		} 
		Template::set_view('manage/create');
		Template::render();
		 
	}
	 
	
	public function edit(){  
		$this->auth->restrict('ref_kecamatan.references.Edit');  
		$id =  abs($this->uri->segment(5));
		if($id == 0) { show_404(); } ;  
		$dbEdit = $this->ref_kecamatan_model->GetEditData($id);				
		Template::set('Edit', $dbEdit);
		

		$kab = $this->ref_kecamatan_model->kabupaten();		
		Template::set('kab', $kab);
		
		$t=$this->input;
		if($t->post('save') == 'Submit'){
			$this->ref_kecamatan_model->save();
			Template::set_message('Successfully Saving', 'success');
			Template::redirect('admin/references/ref_kecamatan');
		}
				
		Template::set_view('manage/edit');
		Template::render();
	}

	public function delete()
	{
 		$t=$this->input;
		$id =  abs($this->uri->segment(5));
		 
		$this->auth->restrict('ref_kecamatan.references.Delete'); 				
		$this->ref_kecamatan_model->DeleteTrans($id);  
		Template::set_message('Successfully Delete', 'success');
		Template::redirect('admin/references/ref_kecamatan');	
	} 
	
	 
	 
}