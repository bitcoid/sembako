<div class="row">
    <div class="col-lg-12">
            <div class="ibox float-e-margins">
                        <div class="ibox-content">
                           <?php echo form_open_multipart($this->uri->uri_string(), 'class="form-horizontal"  id="form"'); ?> 
							 
							<div class="col-md-4">
										<label class="font-bold"> Kecamatan </label> 
										<select class="form-control col-sm-5"  name="id_kecamatan" id="id_kecamatan" required="true">
										 <option value=""> -- Select -- </option>
										 <?php if($kec) { foreach($kec as $row){?>
										  <option value="<?php echo $row->id;?>"> <?php echo $row->nama;?> </option>
										 <?php }} ?>
									   </select> 
									  
								</div>
							<div class="col-md-5">
									<label class="font-bold"> Nama Kel/Desa </label> 
								    <input type="text" class="form-control" name="nama" value="<?php echo $this->input->post('nama') ;?>">
							</div> 
							
                            <div class="clearfix">&nbsp;</div>
							<div class="clearfix">&nbsp;</div> 
							<input type="submit" class="ladda-button btn btn-danger" data-style="expand-right" name="save" value="Submit">  
							 
							<?php echo form_close(); ?> 
				</div>			
			</div>
    </div>
</div>


 