
	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="card full-height">
						 <div class="card-body">
					<div class="page-header">
						<h4 class="page-title">Data Penduduk</h4>
						<div class="ml-md-auto py-2 py-md-0">
								<a href="Report/data_penduduk_pdf.php" target="_BLANK"  class="btn btn-success btn-sm"><i class="fas fa-print"></i> Cetak Data Penduduk</a>
								<a href='?page=add_data_penduduk' class="btn btn-primary btn-sm "  data-toggle='tooltip' data-original-title='Tambah Data Penduduk'><i class="fas fa-plus-circle"></i> Tambah Data</a>
							</div>
					 		
					</div>      

									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>

													<th>Nomor KK</th>
													<th>NIK</th>
													<th width="300px">Nama Lengkap</th> 
													<th>Jenis Kelamin</th> 
													<th>Tanggal Lahir</th> 
													<th>Umur</th>  
													<th>Aksi</th> 

												</tr>
											</thead> 
										</table>
									</div>
								</div>
							</div> 
						</div>
					</div>

				</div>

 <?php echo modal(); ?> 
 <script type="text/javascript"> 
    var tabel = null;
    function isiTabel(){
    $(document).ready(function() {
        tabel =  $('#basic-datatables').DataTable( {
        	"destroy"	: true,
            "processing": true, 
            "ajax":
            {
                "url": "Ajax/detail_penduduk.php", // URL file untuk proses select datanya
                "type": "POST",
                "data": {
                	"btn":'tabel'
                }
            }, 
           "lengthMenu":[10,50,100,200,300,500],
           "pageLength": 10, 
            "columns": [
                        {
                            "data": "no", 
                            "sClass": "text-center"
                        },
                        { "data": "no_kk", },
                        { "data": "no_nik" },
                        { "data": "nama_lengkap", 
                          "width": "300px",   },
                        { "data": "jenis_kelamin" },
                        { "data": "tanggal_lahir" },
                        { "data": "umur" },
                        { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                        	var html  =  
									"<a href='#' data-id='"+row.id+"' data-toggle='tooltip' title='Lihat Data' data-judul='Lihat Data' data-btn='view'  class='infoPR btn btn-xs btn-info'  > <i class='fa fa-file'></i> </a> "+
									"<a class=' btn btn-xs btn-warning ' title='Edit Data'  data-original-title='Lihat Data'   href='?page=update_data_penduduk&id="+row.id+"'><i class='fa fa-edit'></i></a>&nbsp;"+ 
									"<a class=' btn btn-xs btn-danger hapus'  title='Hapus Data' data-id='"+row.id+"'   href='#'><i class='fa fa-trash'></i></a>";
                        		return html
                    		}
                    	}

                    ]
		        });
		    }); 
    		}
    		isiTabel();

		    $(document).on("click", ".infoPR", function () {
		                    var url =  document.URL; 
		                    var id = $(this).data('id');
		                    var btn = $(this).data('btn'); 
		          			var judul = $(this).data('judul'); 

		                    $.ajax({
		                        url: 'Ajax/detail_penduduk.php',
		                        type: 'post',
		                        data: {id: id, btn:btn, url:url},
		                        success: function(response){  
		                            $('.modal-body').html(response);  
		                            $('.modal-title').html(judul);  
		                            $('#empModal').modal('show'); 
		                        }
		                    });
		                });   

		    $(document).on("click", ".hapus", function () { 
		    	  var url =  document.URL; 
		          var id = $(this).data('id'); 
		    	swal({
				  title: "Apakah anda yakin?",
				  text: "Data yang sudah dihapus tidak dapat dikembalikan",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonColor: "#DD6B55",
				  confirmButtonText: "Ya, hapus!",
				  closeOnConfirm: false
				},
				function(){
					 $.ajax({  
					 		url: 'Ajax/detail_penduduk.php',
		                        type: 'post',
		                        data: {id: id, btn:'hapus', url:url},
		                        success: function(response){  
				  					swal("Terhapus!", "Data anda berhasil dihapus.", "success"); 
				  					isiTabel();
		                  }, 
		              });
				});
		  	});    
		 
	</script>