  <style>
  .pagination-dive { float:right;}
.pagination-dive li {
    list-style: none;
    display: inline-block;
}
.pagination-dive a:hover, .pagination-dive .active a {
    background: #F2FBEF;
}

.pagination-dive a {
    display: inline-block;
    height: initial;
    background: #FFF;
    padding: 10px 15px;
    border: 1px solid #F2FBEF;
    color: #000;
}
</style>
 
    <div class="row">
        <div class="col-lg-12">
             	<div class="tabs-container">
                        <ul class="nav nav-tabs" id="myTab"> 
                            <li class="tab1 active"><a data-toggle="tab" href="#tab-2" id="tab1" onclick="tabShow('search', 'true')">SEARCH</a></li> 
                        </ul> 
				
				<!---Mulai-->
				 <div class="tab-content"> 
						<div id="tab-2" class="tab-pane active">
                                <div class="panel-body">
                                    <form method="post" action="<?php echo base_url(); ?>index.php/admin/registrasi/questioner/index" > 
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
									<div class="row"><!--start row--> 
												
												<div class="col-sm-4">
													<div class="form-group"> 
														<label class="control-label" for="order_id">NO KK</label>
														<input type="text" name="no_kk" value="<?php echo $this->input->post('no_kk') ;?>" placeholder="cth: 12345678" class="form-control">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group"> 
														<label class="control-label" for="order_id">NAMA KK</label>
														<input type="text" name="nm_kepala" value="<?php echo $this->input->post('nm_kepala') ;?>" placeholder="cth: Kurniawan" class="form-control">
													</div>
												</div>
											 
												
												<div class="col-md-4" style="padding-top:22px;"> 
													<input type="submit" class="btn btn-primary" name="submit2" value="CARI DATA"  >
												</div>  
												 
												
									</div><!--end row-->
									</form>
                                </div>
                        </div>
						
				<!--Akhir-->
				<table class="table table-striped table-bordered table-hover dataTables-example" >
						<thead>
						 <tr>
							<th width="2%">No</th>
							<th width="20%">No. KK</th>
							<th width="25%">Nama KK</th>
							<th>Kabupaten</th> 
							<th>Kecamatan</th> 
							<th>Desa</th>  
							<th width="15%">Action</th>
						</tr>
						</thead>
						<tbody>
							<?php $i=0;
							$count = (is_numeric($this->uri->segment(6)) ? $this->uri->segment(6) : 0);
							if($datas) {
							foreach($datas as $data)
							{  $count++;
							?>
						   <tr>
							<td><?php echo ($count);?></td>
							<td><?php echo $data->no_kk;?></td>
							<td><?php echo $data->nm_kepala;?></td>
							<td ><?php echo $data->kota;?></td>  
							<td><?php echo $data->kecamatan;?></td> 
							<td><?php echo $data->desa;?></td>  
							<td>
							<a class="btn btn-xs btn-info"  href="<?php echo site_url('admin/registrasi/questioner/edit/'.$data->id);?>" title="Ubah Data"><i class="fa fa-pencil-square"></i> </a>  
								<a class="btn btn-xs btn-danger" href="#" onclick="funct_hapus(<?php echo $data->id;?>)" title="Hapus Data"><i class="fa fa-trash-o"></i></a> 
								<a class="btn btn-xs btn-warning"  href="<?php echo site_url('admin/registrasi/questioner/detail/'.$data->id);?>" title="Lihat Detail Data"><i class="fa fa-external-link-square"></i> </a><br></td>
						   </tr>
							<?php } } ?>

						</tbody>
						<tfoot>
						 <tr>
							<th width="2%">No</th>
							<th width="20%">No. KK</th>
							<th width="25%">Nama KK</th>
							<th>Kabupaten</th> 
							<th>Kecamatan</th> 
							<th>Desa</th>  
							<th>Action</th>
						</tr>
						</tfoot>
						</table>
						<div class="pagination-dive">	
							<?php echo $nav;?>	 
						</div> 
			</div>   
             
        </div>
    
	</div>
	
 
	
<script>
   
   $(document).ready(function(){
    $('#tab1').css('font-weight','bold');
	var currTab; 
    tabShow = function(vals, status)
	{
		window.location.reload(); 
		currTab = vals; 
		//alert(status)
		if(status == 'true' && vals == 'Advsearch'){ 
			$('.'+vals).show();  
			localStorage.setItem("fontbold", '');
			localStorage.setItem("fontbold2", 'bold'); 	
			localStorage.setItem("tabs", currTab); 
		}
		else { $('.'+vals).hide(); localStorage.setItem("tabs", currTab); localStorage.setItem("fontbold", 'bold');localStorage.setItem("fontbold2", ''); 	 }  
	}
	var langStored = localStorage.getItem("tabs");
	$('.'+langStored).show();
	$('#tab1').css('font-weight', localStorage.getItem("fontbold"));
	$('#tab2').css('font-weight', localStorage.getItem("fontbold2"));

	
	$('.typeahead_2').keyup( function() { $('#loading2').html('Loading...'); });
	$('.typeahead_2').typeahead({
	    source:  function (query, process) { 
        return $.post('<?php echo site_url('admin/registrasi/questioner/merk_kend');?>', { query: query, ci_csrf_token : '<?php echo $this->security->get_csrf_hash(); ?>' }, function (data) {
       		data = $.parseJSON(data); 
	            return process(data);
	        });
	    },
		updater: function (item) { 
			selectedState = item.name;
			$("#motor_merk").val(selectedState);  
			$('#loading2').html('');
			return strip(item.name);
		}
	}); 
	$('.typeahead_3').keyup( function() { $('#loading3').html('Loading...'); });
	$('.typeahead_3').typeahead({
	    source:  function (query, process) { 
        return $.post('<?php echo site_url('admin/registrasi/questioner/tipe_kend');?>', { query: query, ci_csrf_token : '<?php echo $this->security->get_csrf_hash(); ?>' }, function (data) {
       		data = $.parseJSON(data); 
	            return process(data);
	        });
	    },
		updater: function (item) { 
			selectedState = item.name;
			$("#motor_type").val(selectedState);  
			$('#loading3').html('');
			return strip(item.name);
		}
	}); 	
	 //Warna TNKB 
	$.ajax({
		type: "POST",
		url : "<?php echo site_url('admin/registrasi/questioner/warnabpkb');?>",
		data :{ 'id_edit' :'<?php echo $this->input->post('id_warna');?>', ci_csrf_token : '<?php echo $this->security->get_csrf_hash(); ?>' },
		success: function(data){  
			$("#id_warna").html(data); 
		},
		'dataType': 'json'
	});	 
	 funct_hapus = function(vid){
				swal({
                        title: "Are you sure?",
                        text: " Delete",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                            window.location ="<?php echo site_url('admin/registrasi/questioner/delete');?>/" + vid;
                        } else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
            });
        } 	
});
 
</script>