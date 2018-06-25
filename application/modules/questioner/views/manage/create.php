
<?php echo form_open($this->uri->uri_string(), 'id="form"'); ?> 
<div class="row">
    <div class="col-lg-12">
		   <input type="hidden" name="status"  id="status"> 
					 
					<div class="col-md-12"> 
						<label class="font-bold"> No KK  *)</label> 
							<input type="text" class="form-control" name="no_kk" id="no_kk" required="true" value="<?php echo $this->input->post('no_kk') ;?>" placeholder="Silahkan ketik no KK...">					 
					</div>	
					<div class="col-md-3"> 
						<label class="font-bold">  Nama Suami *)</label>  
							<input type="text" class="form-control" name="nm_kepala" id="nm_kepala"  required="true" value="<?php echo $this->input->post('nm_kepala') ;?>"  placeholder="Silahkan ketik no KK...">					 
					</div>
					<div class="col-md-4"> 
						<label class="font-bold">  No. KTP *)</label>  
							<input type="text" class="form-control" name="no_ktp_kepala" id="no_ktp_kepala"  required="true" value="<?php echo $this->input->post('no_ktp_kepala') ;?>" placeholder="Silahkan ketik no KTP...">					 
					</div>
					<div class="col-md-4" id="dataumur_1">
							<label class="font-bold"> Tanggal Lahir </label> 
							<div class="input-group date">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tgl_lhr_kepala" class="form-control" value="<?php echo $this->input->post('tgl_lhr_kepala') == '' ? date('Y-m-d') : $this->input->post('tgl_lhr_kepala');?>">
							</div> 
					</div> 
					<div class="col-md-1"> 
						<label class="font-bold">  Umur </label> 
							<input type="text" class="form-control" name="umur_kepala" id="umur_kepala" required="true" value="<?php echo $this->input->post('umur_kepala') ;?>" readonly>					 
					</div>
					
					<div class="col-md-3"> 
						<label class="font-bold"> Nama Istri  *)</label> 
							<input type="text" class="form-control" name="nm_istri" id="nm_istri" required="true" value="<?php echo $this->input->post('nm_istri') ;?>" placeholder="Silahkan ketik Nama...">					 
					</div>	
					<div class="col-md-4"> 
						<label class="font-bold">  No. KTP *)</label>  
							<input type="text" class="form-control" name="no_ktp_istri" id="no_ktp_istri"  required="true" value="<?php echo $this->input->post('no_ktp_istri') ;?>" placeholder="Silahkan ketik no KTP..."> 
					</div>
					<div class="col-md-4" id="dataumur_2">
							<label class="font-bold"> Tanggal Lahir </label> 
							<div class="input-group date">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tgl_lhr_istri" class="form-control" value="<?php echo $this->input->post('tgl_lhr_istri') == '' ? date('Y-m-d') : $this->input->post('tgl_lhr_istri');?>">
							</div> 
					</div>
					<div class="col-md-1"> 
						<label class="font-bold">  Umur </label> 
							<input type="text" class="form-control" name="umur_istri" id="umur_istri" required="true" value="<?php echo $this->input->post('umur_istri') ;?>" readonly>					 
					</div>
					
					<div class="col-md-3">
							<label class="font-bold">Pendidikan Suami </label> 
								<select class="form-control col-sm-5"  name="pendidikan_kepala" id="pendidikan_kepala">
								<option value=""> -- Select -- </option> 
								<?php if($pendidikan):?>
								   <?php foreach($pendidikan as $Row):?>
									<option value="<?php echo $Row->nm_pddk;?>"> <?php echo $Row->nm_pddk;?> </option> 
								   <?php endforeach;?>
								<?php endif;?>
								</select>
							<span id="loadKec"></span>
					</div>
					
					<div class="col-md-3">
							<label class="font-bold">Pendidikan Istri </label> 
								<select class="form-control col-sm-5"  name="pendidikan_istri" id="pendidikan_istri">
								<option value=""> -- Select -- </option> 
								<?php if($pendidikan):?>
								   <?php foreach($pendidikan as $Row):?>
									<option value="<?php echo $Row->nm_pddk;?>"> <?php echo $Row->nm_pddk;?> </option> 
								   <?php endforeach;?>
								<?php endif;?>
								</select>
							<span id="loadKec"></span>
					</div>
					
					<div class="col-md-12"> 
						<label class="font-bold">  Alamat  *)</label> 
							<input type="text" class="form-control" name="alamat" required="true" value="<?php echo $this->input->post('alamat') ;?>" placeholder="Masukkan Alamat Sesuai KTP/KK...">					 
					</div> 
					
					<div class="col-md-4">
							<label class="font-bold">KECAMATAN </label> 
								<select class="form-control col-sm-5"  name="id_kec" id="id_kec"  onchange="changeKel(this.value)" required="true">
								<option value=""> -- Select -- </option> 
								<?php if($ref_kec):?>
								   <?php foreach($ref_kec as $Row):?>
									<option value="<?php echo $Row->id;?>" <?php echo $Row->id== $this->input->post('id_kec') ? 'selected' : '';?>> <?php echo $Row->nama;?> </option> 
								   <?php endforeach;?>
								<?php endif;?>
								</select>
							<span id="loadKec"></span>
					</div>
					
					<div class="col-md-4">
							<label class="font-bold">DESA / KELURAHAN </label> 
								<select class="form-control col-sm-5"  name="id_desa" id="id_desa" required="true">
								<option value=""> -- Select -- </option> 
								</select>
							<span id="loadKel"></span>
					</div>
					
					 
					<div class="clearfix">&nbsp;</div>
					<div class="clearfix">&nbsp;</div>
					<div class="col-md-12">
					<input type="submit" class="ladda-button btn btn-danger" data-style="expand-right" name="save" value="Submit"> 
					</div>
	 </div> 			
	</div> 
 <?php echo form_close(); ?> 

<script>
$(document).ready(function(){
 	  
		$('#dataumur_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
				format: "yyyy-mm-dd", 
            }).on('changeDate', function(e) { 
			 $('#umur_kepala').val(getAge(e.format(0,"yyyy-mm-dd"))); 	
		});
		
		$('#dataumur_2 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
				format: "yyyy-mm-dd", 
            }).on('changeDate', function(e) {
			 $('#umur_istri').val(getAge(e.format(0,"yyyy-mm-dd"))); 
		});
		 
	changeKel = function (val){
           $("#loadKel").html('<div class="h1 m-t-xs text-navy"> <span class="loading"></span> </div>');
           var id_kec = val; 
				 $.ajax({
				 type: "POST",
				 url : "<?php echo site_url('admin/registrasi/questioner/getkel');?>",
				 data :{'id_edit' :'<?php echo $this->input->post('id_kec');?>', 'id_kec' : id_kec, ci_csrf_token : '<?php echo $this->security->get_csrf_hash(); ?>' },
				 success: function(data){ 
					 $("#loadKel").html('');
					 $("#id_desa").html(data); 
				 },
			   'dataType': 'json'
			 });
		   
     }
	
 
	function getAge(dateString)
	{
		var today = new Date();
		var birthDate = new Date(dateString);
		var age = today.getFullYear() - birthDate.getFullYear();
		var m = today.getMonth() - birthDate.getMonth();
		if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate()))
		{
			age--;
		}
		return age;
	}
	
 	 
});//Document ready
	   

</script>
