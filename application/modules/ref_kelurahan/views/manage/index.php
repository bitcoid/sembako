  
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins"> 
                <div class="ibox-content"> 
                       
				<div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                     <tr> 
                            <th width="1%">No</th> 
							<th >Kecamatan</th> 
							<th >Kel/Desa</th> 
							<th>Action</th>
                        </tr>
                    </thead> 
                    <tfoot>
                       <tr> 
                            <th>No</th> 
							<th >Kecamatan</th> 
							<th >Kel/Desa</th> 
							<th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
					</div> 
                </div>
				
				
            </div>
        </div>
    </div>
      

 

<script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 15,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
				sAjaxSource : '<?php echo site_url('admin/references/ref_kelurahan/gettable/');?>',
				aoColumns: [{ "mDataProp": "id"  }, 
							{ "mDataProp": "kecamatan"  },
							{ "mDataProp": "nama"  }, 
							{ "mDataProp": "edit" },  
						  ],
				'fnServerData': function (sSource, aoData, fnCallback) {
					aoData.push(
					{name : '<?php echo $this->security->get_csrf_token_name(); ?>' , value : '<?php echo $this->security->get_csrf_hash(); ?>'}
					);
				   $.ajax
					({
						'dataType': 'json',
						'type': 'POST',
						'url': sSource,
						'data': aoData ,
						'success': fnCallback
					});
				},
				"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
					var index = iDisplayIndexFull  +1;
					$('td:eq(0)',nRow).html(index);
					return nRow;
				},
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'}, 
                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px'); 
                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

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
                            window.location ="<?php echo site_url('admin/references/ref_kelurahan/delete');?>/" + vid;
                        } else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
            });
        } 	
});
 
</script>