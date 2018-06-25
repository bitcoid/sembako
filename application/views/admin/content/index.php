 <div class="row">
    <div class="col-lg-12">
       <div class="wrapper wrapper-content">  
			<div class="row">
				<div class="row  border-bottom white-bg dashboard-header"> 
						<div class="col-sm-6">
							<h2>Informasi Penduduk</h2> 
							<ul class="list-group clear-list m-t">
								<li class="list-group-item fist-item">
									<span class="pull-right">
										 100 Kk
									</span>
									<span class="label label-success">1</span> Kota
								</li>
								<li class="list-group-item">
									<span class="pull-right">
										600 Kk
									</span>
									<span class="label label-info">2</span> Kecamatan
								</li>
								<li class="list-group-item">
									<span class="pull-right">
										500 Kk
									</span>
									<span class="label label-primary">3</span> Desa
								</li> 
								
								<li class="list-group-item">
									<span class="pull-right">
										1000 Ha
									</span>
									<span class="label label-primary">3</span> Total Lahan Berdaya
								</li> 
								
								<li class="list-group-item">
									<span class="pull-right">
										2000 Ha
									</span>
									<span class="label label-primary">3</span> Total Lahan Mati
								</li> 
							</ul>
						</div>
						<div class="col-sm-6">
							<div class="flot-chart dashboard-chart">
								<canvas id="barChart4" width="200" height="90" style="margin: 18px auto 0"></canvas>
								<center><h5>Pengolahan Jenis Tanaman Penduduk <?php echo date("Y");?></h5></center> 
							</div> 
						</div> 
				</div>
				<div class="clearfix">&nbsp;</div>
				<div class="clearfix">&nbsp;</div>
			   <!--mulai-->
			    <div class="col-lg-6">
					<canvas id="barChart" width="200" height="120" style="margin: 18px auto 0"></canvas>
					   <center><h5>Jumlah Penduduk Hingga tahun <?php echo date("Y");?></h5></center> 
			     </div>
				 
				 <div class="col-lg-6">
					<canvas id="barChart2" width="200" height="120" style="margin: 18px auto 0"></canvas>
					   <center><h5>Jumlah Penduduk  berdasarkan Pekerjaan <?php echo date("Y");?></h5></center> 
			     </div>
				 <div class="clearfix">&nbsp;</div>
				 
				 <div class="col-lg-6">
					<canvas id="barChart5" width="200" height="100" style="margin: 18px auto 0"></canvas>
					   <center><h5>Jumlah Penduduk berdasarkan Peternakan <?php echo date("Y");?></h5></center> 
			     </div>  
				 
				  <div class="col-lg-6">
					<canvas id="barChart3" width="200" height="120" style="margin: 18px auto 0"></canvas>
					   <center><h5>Jumlah Penduduk berdasarkan Benefit <?php echo date("Y");?></h5></center> 
			     </div>
				 <div class="clearfix">&nbsp;</div>
				 
				 <div class="col-lg-6">
					<canvas id="doughnutChart2"  style="margin: 18px auto 0"></canvas>
					   <center><h5>Jumlah Penduduk berdasarkan Pendidikan <?php echo date("Y");?></h5></center> 
			     </div>
				 
				 <div class="col-lg-6">
					<canvas id="doughnutChart"  style="margin: 18px auto 0"></canvas>
					   <center><h5>Jumlah Penduduk berdasarkan Status <?php echo date("Y");?></h5></center> 
			     </div>
				 <div class="clearfix">&nbsp;</div>  
				 <div class="col-lg-6">
					<canvas id="doughnutChart3"  style="margin: 18px auto 0"></canvas>
					   <center><h5>Jumlah Penduduk berdasarkan Pendapatan <?php echo date("Y");?></h5></center> 
			     </div> 
				 
				 <div class="col-lg-6">
					<canvas id="doughnutChart4"  style="margin: 18px auto 0"></canvas>
					   <center><h5>Jumlah Penduduk berdasarkan Umur <?php echo date("Y");?></h5></center> 
			     </div> 
				 <div class="clearfix">&nbsp;</div>
				 
				 
			   <!--end-->
			</div>	    
	   </div> 
	</div>
</div>
 


<script>
$(function () {
 var doughnutData = {
        labels: ["0-1,000,000","1,000,000 - 5,000,000","5,000,000 - 10,000,000" ],
        datasets: [{
            data: [300,50,100],
            backgroundColor: ["#a3e1d4","#dedede","#b50a0a"]
        }]
    } ;

    var doughnutDataGender = {
        labels: ["Dewasa","Lanjut Usia", "Anak-anak"],
        datasets: [{
            data: [300,50,100],
            backgroundColor: ["#a3e1d4","#dedede","#b5b8cf"]
        }]
    } ;

	var doughnutPendidikan = {
        labels: ["SD","SMP","SMA","S1","S2","S3"],
        datasets: [{
            data: [300,50,100, 15,20, 10],
            backgroundColor: ["#a3e1d4","#dedede","#b5b8cf","#f4426e","#ddbf27","#27b5dd"]
        }]
    } ;
	
	var doughnutStatus = {
        labels: ["Kawin","Janda","Belum Kawin"],
        datasets: [{
            data: [300,350,100],
            backgroundColor: ["#b50a0a","#dedede","#b5b8cf"]
        }]
    } ;
	
    var doughnutOptions = {
        responsive: true
    };

   
    var ctx2 = document.getElementById("doughnutChart").getContext("2d");
    new Chart(ctx2, {type: 'doughnut', data: doughnutStatus, options:doughnutOptions});
	  
	 var ctx3 = document.getElementById("doughnutChart2").getContext("2d");
    new Chart(ctx3, {type: 'doughnut', data: doughnutPendidikan, options:doughnutOptions});
	 
	var ctx4 = document.getElementById("doughnutChart3").getContext("2d");
    new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});  
	
	var ctxGender = document.getElementById("doughnutChart4").getContext("2d");
    new Chart(ctxGender, {type: 'doughnut', data: doughnutDataGender, options:doughnutOptions});
	
	var barDataPenduduk = {
        labels: ["January", "February", "March", "April", "May", "June", "July","Aug","Sept","Oct","Nov","Dec"],
        datasets: [
            {
                label: "Pria",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                data: [65, 59, 80, 81, 56, 55, 40,80, 81, 56, 55, 40]
            },
            {
                label: "Wanita",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [65, 19, 80, 21, 56, 25, 40,80, 10, 56, 15, 40]
            }
        ]
    };

    var barOptions = { responsive: true }; 
    var ctx2 = document.getElementById("barChart").getContext("2d"); 
    new Chart(ctx2, {type: 'bar', data: barDataPenduduk, options:barOptions});
	
	
	var barDataPekerjaan = {
        labels: ["PNS", "Wiraswasta", "Karyawan Swasta", "Petani"],
        datasets: [ 
            {
                label: "Pekerjaan",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [28, 48, 40, 19]
            }
        ]
    };
	var ctx3 = document.getElementById("barChart2").getContext("2d");
	new Chart(ctx3, {type: 'bar', data: barDataPekerjaan, options:barOptions});
	
	
	var barDatax = {
        labels: ["BPJS", "RASKIN", "ASURANSI", "LAINNYA"],
        datasets: [ 
            {
                label: "Benefit",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [28, 48, 40, 19 ]
            }
        ]
    };
	
	var ctx4 = document.getElementById("barChart3").getContext("2d");
	new Chart(ctx4, {type: 'bar', data: barDatax, options:barOptions});
	
	var barDataTernak = {
        labels: ["KERBAU", "LEMBU", "KAMBING", "DOMBA","AYAM","BEBEK", "LAINNYA"],
        datasets: [ 
            {
                label: "Peternakan",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [28, 48, 40, 140, 19,89,90 ]
            }
        ]
    };
	
	var ctxTernah = document.getElementById("barChart5").getContext("2d");
	new Chart(ctxTernah, {type: 'bar', data: barDataTernak, options:barOptions});
	
	
	var barData2 = {
        labels: ["Padi", "Sere", "Kakao", "Kopi"],
        datasets: [
            {
                label: "Jenis Tanaman",
                 backgroundColor: 'rgba(26,179,148,0.5)',
                pointBorderColor: "#fff",
                data: [65, 59, 80, 81, 56, 55, 40]
            } 
        ]
    };

	var ctx5 = document.getElementById("barChart4").getContext("2d");
	new Chart(ctx5, {type: 'bar', data: barData2, options:barOptions});
});

</script>