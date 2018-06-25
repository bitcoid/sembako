	  
    <div class="footer">
            <div class="pull-right">
                Executed in {elapsed_time} seconds, using {memory_usage} <?php echo BONFIRE_VERSION; ?>
            </div>
            <div>
                <strong>Copyright</strong> Aplikasi Questionare Gayo Lues &copy; <?php echo date('Y');?>
            </div>
    </div>
	
	<div id="debug"><!-- Stores the Profiler Results --></div>
    <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script> 
	
	<!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/pace/pace.min.js"></script> 
	
	
    <!-- jQuery UI -->
    <script src="<?php echo base_url();?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script> 
    
	<script src="<?php echo base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
	 <!-- Data picker -->
    <script src="<?php echo base_url();?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script> 
	  <!-- Sweet alert -->
    <script src="<?php echo base_url();?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.currency.js" type="text/javascript"></script>  
	<script src="<?php echo base_url(); ?>assets/js/jquery.loading.js" type="text/javascript"></script>
	 <!-- Steps -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/steps/jquery.steps.min.js"></script> 
	 <!-- Jquery Validate -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
	<!-- Typehead -->
	<script src="<?php echo base_url();?>assets/js/plugins/typehead/bootstrap3-typeahead.min.js"></script> 
	
	<!-- SUMMERNOTE -->
    <script src="<?php echo base_url();?>assets/js/plugins/summernote/summernote.min.js"></script>
	 <!-- ChartJS-->
    <script src="<?php echo base_url();?>assets/js/plugins/chartJs/Chart.min.js"></script>

	<script>
	 $(document).ready(function(){
		  $('.currency').on('focusout', function(){
            $(this).formatCurrency({
                symbol : '',
                roundToDecimalPlace : -2
            });
          });
		
		   $('#data_1 .input-group.date, #data_2 .input-group.date, #data_3 .input-group.date, #data_4 .input-group.date, #data_5 .input-group.date, #data_6 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
				format: "yyyy-mm-dd",
				startDate: new Date()
            }); 
		}); 
		
	function formatDate (input) {
		  var datePart = input.match(/\d+/g),
		  year = datePart[0].substring(2), // get only two digits
		  month = datePart[1], day = datePart[2];

		  return day+'/'+month+'/'+year;
		}
	Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) {
		var n = this,
			decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
			decSeparator = decSeparator == undefined ? "." : decSeparator,
			thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
			sign = n < 0 ? "-" : "",
			i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
			j = (j = i.length) > 3 ? j % 3 : 0;
		return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
	};
	
	
    
            
 </script>	
 
</body>
</html>