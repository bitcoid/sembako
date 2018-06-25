<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class References extends Admin_Controller{ 
	
	public function __construct() 
	{
			parent::__construct();
			$this->load->helper(array('form', 'url','text'));
			$this->load->library(array('form_validation' ,'datatables')); 
			Template::set('toolbar_title','Referensi Kabupaten'); 
			$this->load->model('ref_kabupaten_model');
    }
	 
	public function index() 
	{  
		Template::set_block('sub_nav', 'manage/_sub_nav');
		$this->auth->restrict('ref_kabupaten.references.view'); 
		Template::set_view('manage/index');
		Template::render();
    }
	 
	 /*----------PRIVATE DATA TABLEs SHORT TERM-----------------*/
	public function gettable(){
	    $this->datatables->where('id', $this->config->item('kota') );
		$this->datatables->select('id,id_provinsi, nama', FALSE)->from('kabupaten'); 
		$this->datatables->add_column('edit', '<a class="btn btn-xs btn-info"  href="'.site_url('admin/references/ref_kabupaten/edit/$1').'"><i class="fa fa-pencil-square"></i> </a> 
											   <a class="btn btn-xs btn-danger" href="#" onclick="funct_hapus($1)"><i class="fa fa-trash-o"></i></a>
											', 'id');
		$this->datatables->order_by('id','DESC');
		echo $this->datatables->generate();  
		die;  
	}
	 
	public function create(){  
		$this->auth->restrict('ref_kabupaten.references.create'); 		 
	 	$t=$this->input; 
		
		if($t->post('save') == 'Submit'){
			$this->ref_kabupaten_model->save();
			Template::set_message('Successfully Saving', 'success');
			Template::redirect('admin/references/ref_kabupaten');
		} 
		Template::set_view('manage/create');
		Template::render();
		 
	}
	 
	
	public function edit(){  
		$this->auth->restrict('ref_kabupaten.references.Edit');  
		$id =  abs($this->uri->segment(5));
		if($id == 0) { show_404(); } ;  
		$dbEdit = $this->ref_kabupaten_model->GetEditData($id);				
		Template::set('Edit', $dbEdit);
		 
		$t=$this->input;
		if($t->post('save') == 'Submit'){
			$this->ref_kabupaten_model->save();
			Template::set_message('Successfully Saving', 'success');
			Template::redirect('admin/references/ref_kabupaten');
		}
				
		Template::set_view('manage/edit');
		Template::render();
	}

	public function delete()
	{
 		$t=$this->input;
		$id =  abs($this->uri->segment(5));
		 
		$this->auth->restrict('ref_kabupaten.references.Delete'); 				
		$this->ref_kabupaten_model->DeleteTrans($id);  
		Template::set_message('Successfully Delete', 'success');
		Template::redirect('admin/references/ref_kabupaten');	
	} 
	
	 
	 
}