	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="card full-height">
						 <div class="card-body">
					<div class="page-header">
						<h4 class="page-title">Surat Keterangan Pemakaman</h4>
						<div class="ml-md-auto py-2 py-md-0">
								<a   href='#'  data-btn='cekarsip' data-judul='Lihat Arsip Data'  class='infoPR btn btn-sm btn-primary' data-toggle='modal'   class="btn btn-secondary btn-sm"><i class="fas fa-archive"></i> Arsip Surat</a>
								<a href="Report/pemakaman_rekap.php" target="_BLANK" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i> Rekap Data</a>
								<a   href='#'  data-btn='add' data-judul='Tambah Data'  class='infoPR btn btn-sm btn-primary' data-toggle='modal' ><i class="fas fa-plus-circle"></i> Tambah Data</a>
							</div>
					 		
					</div>      
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th> 
													<th>Nomor Surat</th>
													<th>Tgl Surat</th>     
													<th>NIK</th>     
													<th>Nama Lengkap</th>
	 												<th>Jenis Kelamin</th>   
													<th>Tgl Kematian</th>    
													<th>Tgl Pemakaman</th>    
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
	$cek = mysqli_query($k,"SELECT no_surat FROM tb_surat WHERE no_surat='$nomor_surat'  AND rowstatus=1");
	if (mysqli_num_rows($cek) <= 0) {

		$isi  = array(
					"nik" 				=> 	$nomor_nik,
					"nama" 				=> 	$nama_lengkap,
					"tempat_lahir" 		=> 	$tempat,
					"tgl_lahir" 		=>	$tgl_lahir,
					"jenis_kelamin"		=>	$jenkel,
					"agama"				=>	$agama,
					"perkawinan"		=> 	$perkawinan,
					"alamat"			=>	$nama_kampung,
					"rt"				=>	$rt,
					"rw"				=>	$rw,
					"warga"				=> 	$kewarganegaraan,
					"pekerjaan"			=> 	$pekerjaan,
					"tgl_kematian"		=> 	$tgl_kematian,
					"tgl_pemakaman"		=> 	$tgl_pemakaman,
					"jam_pemakaman"		=> 	$jam_pemakaman,
					"tempat_pemakaman"	=> 	$tempat_pemakaman 
				);
		$cek_ttd = mysqli_fetch_array(mysqli_query($k,"SELECT a.nama_pegawai, a.nip, b.`nama` as jabatan FROM tb_pegawai a LEFT JOIN tb_jabatan b ON a.`jabatan`=b.`id_jabatan` WHERE a.jabatan=$mengetahui AND a.`aktif`=1 AND a.`rowstatus`=1"));
		if ($mengetahui != 1) {
			 $x = 'An.'.strtoupper('KEPALA '.desa());
			 $wakilkan = 1;
		}else{
			 $x =  strtoupper('KEPALA '.desa());
			 $wakilkan = 0; 
		}
				$ttd = array(
					"nama"		=> $cek_ttd['nama_pegawai'],
					"nip"		=> $cek_ttd['nip'],
					"jabatan"	=> strtoupper("$cek_ttd[jabatan]"),
					"wakilkan"	=> $wakilkan,
					"head"		=> $x,
					"id_jabatan" => $mengetahui
				);

		$isiSurat = json_encode($isi);
		$xttd = json_encode($ttd); 
		$ins = mysqli_query($k,"INSERT INTO tb_surat (jenis_surat,no_surat,nama_surat,tanggal,isi_surat,tanda_tangan,id_warga,createdon,createdby,rowstatus) VALUES ('SKP','$_POST[nomor_surat]','Surat Keterangan Pemakaman',NOW(),'".gantikutip($isiSurat)."','$xttd','$idd',NOW(),'$_SESSION[nama_pegawai]','1')");
		if ($ins) {
			$id = mysqli_insert_id($k);
			echo "
			<script>
			swal({
				  title: 'Data disimpan',
				  text: 'Apakah anda akan mencetak surat?',
				  type: 'success',
				  showCancelButton: true,
				  confirmButtonColor: '#3B55F5',
				  confirmButtonText: 'Ya, Cetak!',
				  closeOnConfirm: false
				},
				function(){ 
					swal('Mencetak', 'Proccess', 'success');  
					pop($id);

				});
				</script>
			";
		}else{
			echo gagal_j('disimpan');
		}
	}else{
			echo gagal_j('Duplikasi nomor surat');
	} 
	unset($_POST);

}
if (isset($_POST['update'])) {
		extract($_POST); 

		$isi  = array(
					"nik" 			=> 	$nomor_nik,
					"nama" 			=> 	$nama_lengkap,
					"tempat_lahir" 	=> 	$tempat,
					"tgl_lahir" 	=>	$tgl_lahir,
					"jenis_kelamin"	=>	$jenkel,
					"agama"			=>	$agama,
					"perkawinan"	=> 	$perkawinan,
					"alamat"		=>	$nama_kampung,
					"rt"			=>	$rt,
					"rw"			=>	$rw,
					"warga"			=> 	$warga,
					"pekerjaan"		=>	$pekerjaan,
					"tgl_kematian"		=> 	$tgl_kematian,
					"tgl_pemakaman"		=> 	$tgl_pemakaman,
					"jam_pemakaman"		=> 	$jam_pemakaman,
					"tempat_pemakaman"	=> 	$tempat_pemakaman 
				);
		$cek_ttd = mysqli_fetch_array(mysqli_query($k,"SELECT a.nama_pegawai, a.nip, b.`nama` as jabatan FROM tb_pegawai a LEFT JOIN tb_jabatan b ON a.`jabatan`=b.`id_jabatan` WHERE a.jabatan=$mengetahui AND a.`aktif`=1 AND a.`rowstatus`=1"));
		if ($mengetahui != 1) {
			 $x = 'An.'.strtoupper('KEPALA '.desa());
			 $wakilkan = 1;
		}else{
			 $x =  strtoupper('KEPALA '.desa());
			 $wakilkan = 0; 
		}
				$ttd = array(
					"nama"		=> $cek_ttd['nama_pegawai'],
					"nip"		=> $cek_ttd['nip'],
					"jabatan"	=> strtoupper("$cek_ttd[jabatan]"),
					"wakilkan"	=> $wakilkan,
					"head"		=> $x,
					"id_jabatan" => $mengetahui
				);

		$isiSurat = json_encode($isi);
		$xttd = json_encode($ttd); 
		$upd = mysqli_query($k,"UPDATE tb_surat SET  tanggal=NOW(),  isi_surat='".gantikutip($isiSurat)."', tanda_tangan='$xttd' WHERE id_surat='$update'");
		if ($upd) {
			$id = $update;
			echo "
			<script>
			swal({
				  title: 'Data disimpan',
				  text: 'Apakah anda akan mencetak surat?',
				  type: 'success',
				  showCancelButton: true,
				  confirmButtonColor: '#3B55F5',
				  confirmButtonText: 'Ya, Cetak!',
				  closeOnConfirm: false
				},
				function(){ 
					swal('Mencetak', 'Proccess', 'success');  
					pop($id);

				});
				</script>
			";
		}else{
			echo gagal_j('disimpan');
		} 
	unset($_POST);
}
?>

 <?php echo modal(1); ?>

  <script type="text/javascript">  
  var tabel = null;
    function isiTabel(){
    $(document).ready(function() {
        tabel =  $('#basic-datatables').DataTable( {
        	"destroy"	: true,
            "processing": true, 
            "ajax":
            {
                "url": "Ajax/pemakaman.php", // URL file untuk proses select datanya
                "type": "POST",
                "data": {
                	"btn":'tabel',
                	"jenis":''
                }
            }, 
           "lengthMenu":[10,50,100,200,300,500],
           "pageLength": 10, 
            "columns": [
                        {
                            "data": "no", 
                            "sClass": "text-center"
                        }, 
                        { "data": "no_surat" },
                        { "data": "tanggal" },  
                        { "data": "nik" },  
                        { "data": "nama_lengkap", 
                          "width": "200px",   },
                        { "data": "jenis_kelamin" },  
                        { "data": "tgl_kematian" }, 
                        { "data": "tgl_pemakaman" },  
                        { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                        	var html  =  
									"<a href='#' onclick='pop("+row.id+")' title='Cetak Surat' class='btn btn-xs btn-info'  > <i class='fa fa-print'></i> </a> "+
									"<a class='infoPR btn btn-xs btn-warning' data-btn='edit' data-judul='Edit Surat' title='Edit Data'  data-id='"+row.id+"'   data-toggle='modal' ><i class='fa fa-edit'></i></a> &nbsp;"+ 
									"<a class=' btn btn-xs btn-secondary arsip'   title='Arsip Data' href='#' data-id='"+row.id+"'><i class='fa fa-archive'></i></a> &nbsp;"+ 
									"<a class=' btn btn-xs btn-danger hapus'  title='Hapus Data' data-id='"+row.id+"'   href='#'><i class='fa fa-trash'></i></a>";
                        		return html
                    		}
                    	}

                    ]
		        });
		    }); 
    		} 
    		isiTabel();
    		function pop(id)
    		{ 
		        $('.modal-body').html("<embed  src='Report/pemakaman.php?id="+id+"' width='100%' height='600px' ></embed>");  
		        $('.modal-title').html('Cetak Surat');  
		        $('#empModal').modal('show');  
    		}
		    $(document).on("click", ".infoPR", function () {
		                    var url =  document.URL; 
		                    var id = $(this).data('id');
		                    var btn = $(this).data('btn'); 
		                    var judul = $(this).data('judul'); 
		                    $.ajax({
		                        url: 'Ajax/pemakaman.php',
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
					 		url: 'Ajax/pemakaman.php',
		                        type: 'post',
		                        data: {id: id, btn:'hapus', url:url},
		                        success: function(response){  
				  					swal("Terhapus!", "Data anda berhasil dihapus.", "success"); 
				  					isiTabel();
		                  }, 
		              });
				});
		  	}); 

		    $(document).on("click", ".arsip", function () { 
		    	  var url =  document.URL; 
		          var id = $(this).data('id'); 
		    	swal({
				  title: "Arsipkan Surat ini?",
				  text: "Data yang sudah diarsipkan tidak akan ditampilkan di tabel ini",
				  type: "info",
				  showCancelButton: true,
				  confirmButtonColor: "#55A5DD",
				  confirmButtonText: "Ya, arsipkan!",
				  closeOnConfirm: false
				},
				function(){
					 $.ajax({  
					 		url: 'Ajax/pemakaman.php',
		                        type: 'post',
		                        data: {id: id, btn:'arsip', url:url},
		                        success: function(response){  
				  					swal("Diarsipkan!", "Surat berhasil diarsipkan.", "success"); 
				  					isiTabel();
		                  }, 
		              });
				});
		  	}); 


  		</script>
