<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Registrasi extends Admin_Controller{ 
	
	public function __construct() 
	{
			parent::__construct();
			$this->load->helper(array('form', 'url','text','questioner'));
			$this->load->library(array('form_validation' ,'datatables','session','pagination')); 
			Template::set('toolbar_title','DAFTAR QUESTIONARE'); 
			$this->load->model('questioner_model');
    }
	 
	public function index() 
	{  
		Template::set_block('sub_nav', 'manage/_sub_nav');
		$this->auth->restrict('questioner.registrasi.view'); 
		$title ='';
		 
		
		if($this->input->post('submit2') == 'CARI DATA' || $title !='' ){
			$no_kk = $this->input->post('no_kk');
			$nm_kepala = $this->input->post('nm_kepala');  
			
			if($no_kk !="" || $nm_kepala !='')
			{
				$gabung = $no_kk.'_'.$nm_kepala;
				$base_64 = base64_encode($gabung);
				$title = rtrim($base_64, '=');
			}
			else{
				$title = str_replace("%20",' ',($this->uri->segment(5))?$this->uri->segment(5):0);  
			}  
		}else{
			$title = str_replace("%20",' ',($this->uri->segment(5))?$this->uri->segment(5):0);  
		}
		 
			Template::set('search_title', $title);
			$allrecord = $this->questioner_model->allrecords($title); 
			$baseurl =  base_url()."index.php/admin/registrasi/questioner/index/".$title;
			
			$paging=array();
			$paging['base_url'] =$baseurl;
			$paging['total_rows'] = $allrecord;
			$paging['per_page'] = 20;
			$paging['uri_segment']= 6;
			$paging['num_links'] = 7;
			$paging['first_link'] = 'First';
			$paging['first_tag_open'] = '<li>>';
			$paging['first_tag_close'] = '</li>';
			$paging['num_tag_open'] = '<li>';
			$paging['num_tag_close'] = '</li>';
			$paging['prev_link'] = 'Prev';
			$paging['prev_tag_open'] = '<li>';
			$paging['prev_tag_close'] = '</li>';
			$paging['next_link'] = 'Next';
			$paging['next_tag_open'] = '<li>';
			$paging['next_tag_close'] = '</li>';
			$paging['last_link'] = 'Last';
			$paging['last_tag_open'] = '<li>';
			$paging['last_tag_close'] = '</li>';
			$paging['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
			$paging['cur_tag_close'] = '</a></li>';
			
			$this->pagination->initialize($paging);    
			
			$limit = $paging['per_page'];
			$number_page = $paging['per_page']; 
			$offset = ($this->uri->segment(6)) ? $this->uri->segment(6):'0';    
			$nav = $this->pagination->create_links();
			$datas = $this->questioner_model->data_lists($limit,$offset,$title); 
			 
			 
			Template::set('limit', $limit);
			Template::set('number_page', $number_page);
			Template::set('offset', $offset);
			Template::set('nav', $nav);
			Template::set('datas', $datas); 
			Template::set_view('manage/index');
			Template::render();
			
    }
	
	public function detail($id=0)
	{
		$datas = $this->questioner_model->data_detail($id); 
		Template::set('Row', $datas);
		Template::set_view('manage/detail');
		Template::render();
	}	
	
	 
	 
	
	public function getkel()
	{
		 $ref_kel = $this->questioner_model->kelurahan($this->input->post('id_kec') );
		 $kec ='';
		 foreach($ref_kel as $row)
		 {
			$kec .= '<option value="'.$row->id.'" '.($this->input->post('id_edit') == $row->id ? "selected" : "").'>'.$row->nama.'</option>';
         }
       echo json_encode($kec, true);die;
	}
	
	
	public function create(){  
		$this->auth->restrict('questioner.registrasi.create'); 		  	
		
		$ref_kec = $this->questioner_model->kecamatan();
		Template::set('ref_kec', $ref_kec);
		
		$pddk = $this->questioner_model->getPendidikan();
		Template::set('pendidikan', $pddk);
		if($this->input->post('save') == 'Submit') 
		{   
				$this->questioner_model->save();
				Template::set_message('Successfully Saving', 'success');
				Template::redirect('admin/registrasi/questioner/'); 		
		} 
		Template::set_view('manage/create');
		Template::render();
		 
	} 
 
	 
	 
	public function edit($id=0){  
		$this->auth->restrict('questioner.registrasi.Edit');  
		
		$ref_kec = $this->questioner_model->kecamatan();
		Template::set('ref_kec', $ref_kec);
		
		$pddk = $this->questioner_model->getPendidikan();
		Template::set('pendidikan', $pddk);
		
		$id =  abs($this->uri->segment(5));
		if($id == 0)
		{
			Template::redirect('admin/registrasi/questioner');
		}
		$dbEdit = $this->questioner_model->GetEditData($id);				
		Template::set('Edit', $dbEdit);
		  
		if($this->input->post('save') == 'Submit') 
		{  
			
			if($this->input->post('status') != 1){
				$this->questioner_model->save();
				Template::set_message('Successfully Saving', 'success');
				Template::redirect('admin/registrasi/questioner/edit/'.$this->input->post('id'));			
			}else{
				$platInput = $this->input->post('plat_dp').''. $this->input->post('plat_nomor').''. $this->input->post('plat_blk');
				//Jgn keluarkan alert kalau plat nya sama dengan plat sebelumnya.
				Template::set('status', '');
				if($dbEdit->plat_kend != $platInput)
				{
					Template::set_message('<div class="alert alert-danger">Plat Nomor Sudah pernah Digunakan...</div>','error');
					Template::set('status', 1);
				}
			}	 
		}
				
		Template::set_view('manage/edit');
		Template::render();
	}

	public function delete()
	{
 		$t=$this->input;
		$id =  abs($this->uri->segment(5));
		
		$this->auth->restrict('questioner.registrasi.Delete'); 				
		$this->questioner_model->DeleteTrans($id);  
		Template::set_message('Successfully Delete', 'success');
		Template::redirect('admin/registrasi/questioner');	
	} 
	 
}