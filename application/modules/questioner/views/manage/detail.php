<style>
.grey {     
    background: #FAFAFA;  
	padding:14px;
}
.white {      
	padding:10px;
}
</style> 
        <div class="col-lg-12">
		   
		   <div class="col-sm-12"><h3>DATA PEMILIK  &nbsp; [ <a href="#" onclick="kembali();"> Kembali </a> ]  <hr style="margin-top:1px; border-top:2px solid #ccc;"></h3></div>
		   <div class="col-sm-2"><h2 style="background:blue;padding:15px;color:white;"><b><?php echo @$data[0]['Nopolisi'];?></h2></b><br></div>
		   <div class="col-sm-12">
		      <label class="control-label white">NAMA PEMILIK</label> <br>
			  <div class="grey"><?php echo @$data[0]['NAMA_PEMILIK'];?> </div>
		   </div>
		   <div class="col-sm-12">
		      <label class="control-label white">ALAMAT</label><br>
			  <div class="grey"><?php echo @$data[0]['Alamat'];?></div>
		   </div>
		   <div class="col-sm-6">
		     <label class="control-label white">KECAMATAN</label><br>
			 <div class="grey"><?php echo @$data[0]['Kecamatan'];?></div>
		   </div>
		   <div class="col-sm-6">
			<label class="control-label white">KABUPATEN</label><br>
			<div class="grey"><?php echo @$data[0]['kota'];?></div>
		   </div>
		</div>
		 <div class="clearfix">&nbsp;</div>
		 <div class="col-lg-12">
		    
		   <div class="col-sm-12"><h3>DATA KENDARAAN <hr style="margin-top:1px; border-top:2px solid #ccc;"></h3></div>
		   
		   <div class="col-sm-6">
		      <label class="control-label white">MERK</label><br>
			  <div class="grey"><?php echo @$data[0]['Merek'];?>  </div>
		   </div>
		   
		   <div class="col-sm-6">
		      <label class="control-label white">TYPE</label><br>
			  <div class="grey"><?php echo @$data[0]['type'];?>  </div>
		   </div>
		   
		   <div class="col-sm-6">
		     <label class="control-label white">JENIS/MODEL</label><br>
			 <div class="grey"><?php echo @$data[0]['Jenis'];?>  </div>
		   </div>
		   
		   <div class="col-sm-6">
			<label class="control-label white">TAHUN PEMBUATAN</label><br>
			<div class="grey"><?php echo @$data[0]['TAHUN_PERAKITAN'];?></div>
		   </div>
		   
		   <div class="col-sm-6">
			<label class="control-label white">ISI SILINDER</label><br>
			<div class="grey"><?php echo @$data[0]['type'];?></div>
		   </div>
		   
		   <div class="col-sm-6">
			<label class="control-label white">WARNA</label><br>
			<div class="grey"><?php echo @$data[0]['WARNA'];?></div>
		   </div>
		   
		   <div class="col-sm-6">
			<label class="control-label white">NOMOR RANGKA / NIK</label><br>
			<div class="grey"><?php echo @$data[0]['norangka'];?></div>
		   </div>
		   
		   <div class="col-sm-6">
			<label class="control-label white">NOMOR MESIN</label><br>
			<div class="grey"><?php echo @$data[0]['NO_MESIN'];?></div>
		   </div>
		   
		   <div class="col-sm-6">
			<label class="control-label white">BAHAN BAKAR</label><br>
			<div class="grey"><?php echo @$data[0]['BahanBakar'];?></div>
		   </div>
		   
		   <div class="col-sm-6">
			<label class="control-label white">WARNA TNKB</label><br>
			<div class="grey"><?php echo @$data[0]['WarnaTNKB'];?></div>
		   </div>
		   
		   <div class="col-sm-6">
			<label class="control-label white">TAHUN REGISTRASI</label><br>
			<div class="grey"><?php echo @$data[0]['TGLREGISTER'];?></div>
		   </div>
		   
		   <div class="col-sm-6">
			<label class="control-label white">NO BPKB</label><br>
			<div class="grey"><?php echo @$data[0]['noBpkb'];?></div>
		   </div>
		   
		    <div class="col-sm-6">
			<label class="control-label white">MASA BERLAKU S/D </label><br>
			<div class="grey"><?php echo @$data[0]['tglAkhirSTNK'];?></div>
		   </div>
		   
		</div>
 <script>
 $(".loading").hide();
 </script>