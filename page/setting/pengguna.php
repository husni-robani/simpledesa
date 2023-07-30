
	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="card full-height">
						 <div class="card-body">
					<div class="page-header">
						<h4 class="page-title">Data Pengguna</h4>
						<div class="ml-md-auto py-2 py-md-0">
							 
								<a href='#'  data-btn='add' data-judul='Tambah Data'  class='infoPR btn btn-sm btn-primary' data-toggle='modal' ><i class="fas fa-plus-circle"></i> Tambah Data</a>
							</div>
					 		
					</div>      

									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>

													<th>Jabatan</th>
													<th>NIP/NRPD</th>
													<th width="300px">Nama Lengkap</th> 
													<th>Username</th> 
													<th>Role</th>  
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
<?php
if (isset($_POST['tambah'])) {   
		extract($_POST);
		$pass = substr(sha1($password),0,10); 
		$ins = mysqli_query($k,"INSERT INTO  `tb_user`( `id_pegawai`,`username`,`password`,`status_user`,`foto`,`role`)VALUES ( '$pegawai','$username','$pass','1',NULL,'$role')");
		if ($ins) { 
			echo "
			<script>
			swal('Berhasil!', 'Data berhasil ditambahkan!', 'success');
				</script>
			";
		}else{
			echo gagal_j('disimpan');
		} 
	unset($_POST);

}

if (isset($_POST['simpanData'])) {   
		extract($_POST);
		if($password != ''){
			$pass = "password ='".substr(sha1($password),0,10)."',";
		}else{
			$pass = '';
		} 
		$upd = mysqli_query($k,"UPDATE tb_user SET id_pegawai='$pegawai', username='$username', $pass role='$role' WHERE id='$id'");
		if ($upd) { 
			echo "
			<script>
			swal('Berhasil!', 'Data berhasil disimpan!', 'success');
				</script>
			";
		}else{
			echo gagal_j('disimpan');
		} 
	unset($_POST);

}
?>
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
                "url": "Ajax/pengguna.php", // URL file untuk proses select datanya
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
                        { "data": "jabatan", },
                        { "data": "nip" },
                        { "data": "nama_pegawai", 
                          "width": "300px",   },
                        { "data": "username" },
                        { "data": "role" }, 
                        { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                        	var html  =   
									"<a class=' btn btn-xs btn-warning infoPR ' title='Edit Data'  data-judul='Edit Data'   data-id='"+row.id+"'  data-btn='edit'  data-original-title='Edit Data'   href='#'><i class='fa fa-edit'></i></a>&nbsp;"+ 
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
		                        url: 'Ajax/pengguna.php',
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
					 		url: 'Ajax/pengguna.php',
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