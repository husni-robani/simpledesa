
	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="card full-height">
						 <div class="card-body">
					<div class="page-header">
						<h4 class="page-title">Data Perangkat Desa</h4>
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
													<th>No. HP</th> 
													<th>Email</th>  
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
		$ins = mysqli_query($k,"INSERT INTO  `tb_pegawai`( `nip`,`jabatan`,`nama_pegawai`,`email`,`no_hp`,`alamat`,`tempat_lahir`,`tanggal_lahir`,`jenkel`,`aktif`,`createdon`,`createdby`,`rowstatus`)VALUES ( '$nip','$jabatan','".anti($nama_pegawai)."','$email','$no_hp','".anti($alamat)."','$tempat_lahir','$tanggal_lahir','$jenkel','1',NOW(),'$_SESSION[nama_pegawai]','1')");
		if ($ins) { 
			echo "
			<script>
			swal('Berhasil!', 'Data berhasil ditambahkan!, 'success');
				</script>
			";
		}else{
			echo gagal_j('disimpan');
		} 
	unset($_POST);

}

if (isset($_POST['simpanData'])) {   
		extract($_POST);
		$upd = mysqli_query($k,"UPDATE `tb_pegawai`SET `nip` = '$nip',`jabatan` = '$jabatan',`nama_pegawai` = '".anti($nama_pegawai)."',`email` = '$email',`no_hp` = '$no_hp',`alamat` = '".anti($alamat)."',`tempat_lahir` = '$tempat_lahir',`tanggal_lahir` = '$tanggal_lahir',`jenkel` = '$jenkel'  WHERE `id_pegawai` = '$id'");
		if ($upd) { 
			echo "
			<script>
			swal('Berhasil!', 'Data berhasil diubah!, 'success');
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
                "url": "Ajax/perangkat_desa.php", // URL file untuk proses select datanya
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
                        { "data": "nama_lengkap", 
                          "width": "300px",   },
                        { "data": "no_hp" },
                        { "data": "email" }, 
                        { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                        	var html  =   
									"<a class=' btn btn-xs btn-warning infoPR ' title='Edit Data' data-judul='Edit Data' data-id='"+row.id+"'  data-btn='edit'  data-original-title='Edit Data'   href='#'><i class='fa fa-edit'></i></a>&nbsp;"+ 
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
		                        url: 'Ajax/perangkat_desa.php',
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
					 		url: 'Ajax/perangkat_desa.php',
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