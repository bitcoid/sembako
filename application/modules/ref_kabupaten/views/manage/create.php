<div class="row">
    <div class="col-lg-12">
            <div class="ibox float-e-margins">
                        <div class="ibox-content">
                           <?php echo form_open_multipart($this->uri->uri_string(), 'class="form-horizontal"  id="form"'); ?> 
							<input type="hidden" class="form-control" name="id_provinsi" value="24993"> 
							<div class="col-md-5">
									<label class="font-bold"> Nama Kota </label> 
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


 