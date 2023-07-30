<?php
extract($_POST);
include '../../config/konek.php';
include '../../config/fungsi.php';
include '../../page/Model/Setting.php';
include '../../page/verif.php';
if ($btn=='arsip') {
	$qry = mysqli_query($k,"UPDATE tb_surat SET arsip='1' WHERE id_surat='$id'");  
}elseif ($btn=='unarsip') {
	$qry = mysqli_query($k,"UPDATE tb_surat SET arsip=NULL WHERE id_surat='$id'");  
}elseif ($btn=='hapus') {
	$qry = mysqli_query($k,"UPDATE tb_surat SET rowstatus='0' WHERE id_surat='$id'");  
}elseif($btn == 'add'){

	$last = mysqli_fetch_array(mysqli_query($k,"SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(no_surat,'/',2),'/',-1)+1 AS nomor FROM tb_surat WHERE jenis_surat='SKL' AND YEAR(tanggal)=YEAR(NOW()) AND rowstatus=1 ORDER BY id_surat DESC LIMIT 1"));
	$next = $last['nomor'] ?? '1';
	$kode_surat = kode_surat(); 
	$nomor = $kode_surat.'/'.$next.'/'.kode_desa().'/SKL/'.getRomawi(DATE('m')).'/'.DATE('Y');
	?>


						<form method="POST" id="form" action="">
								<div class="row">
										<div class="col-lg-12">

 
										<div class="form-group form-inline">
											<label for="inlineinput" class="col-md-3 col-form-label">Nomor Surat<span class="text-red">*</span></label> 
												<input type="text"   required placeholder="Autogenerate" value="<?php echo $nomor; ?>" name="nomor_surat" class="col-md-6 form-control">
											</div> 
 

									<div class="form-group form-inline">

										<label for="inlineinput" class="col-md-3 col-form-label">Data Berdasarkan<span class="text-red">*</span></label>   
											<input type="text"   autocomplete="off" placeholder="Masukan NIK atau Nama Lengkap"  id="key" class="  col-md-6 form-control">
											<input type="hidden"  name="idd" id="idd">
											<br>
											<div style="position: absolute;z-index: 4;" class="  col-md-4" id="keyList"></div>

										</div>   
 
										<div class="form-group form-inline">
											<label for="inlineinput" class="col-md-3 col-form-label">NIK<span class="text-red">*</span></label> 
												<input type="number" id="nik" required placeholder="Masukan Nomor KK" name="nomor_nik" class="col-md-6 form-control">
											</div> 
 
									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Nama Lengkap<span class="text-red">*</span></label> 
											<input type="text" id="nama" required placeholder="Masukan Nama Lengkap" name="nama_lengkap" class="col-md-6 form-control">
										</div> 


										<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Tempat dan Tgl. Lahir</label>
											<input type="text" id="tempat"  autocomplete="off" placeholder="Tempat Lahir" name="tempat" class="col-md-3 form-control">
											&nbsp;&nbsp;
											&nbsp;&nbsp;

												<div class="input-group col-md-3">
													<input type="text" id="tgl_lahir" placeholder="dd/mm/yyyy" class="form-control datepicker"   name="tgl_lahir">
													<div class="input-group-append">
														<span class="input-group-text">
															<i class="fa fa-calendar-check"></i>
														</span>
													</div>
												</div>
											 
										</div> 



									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Jenis Kelamin<span class="text-red">*</span></label>
												<select class="form-control col-md-6" id="jenkel" required name="jenkel">
													<option value="">-- Pilih Jenis Kelamin -- </option>
													<option value="Laki-laki">Laki-laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
										</div> 

									

									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Agama<span class="text-red">*</span></label>
											<select name="agama" id="agama" class="select2 form-control col-md-6">
												<option value="">-- Pilih Agama -- </option>
												<?php 
												$q = mysqli_query($k,"SELECT * FROM tb_agama");
												while ($d = mysqli_fetch_array($q)) {
													echo "<option value='$d[nama]'>$d[nama]</option>";
												} 
												?>
												<option value="99" >Lainnya</option>
											</select>
										</div> 


  
									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Status Perkawinan<span class="text-red">*</span></label>
											<select name="perkawinan" id="perkawinan" class="select2 form-control col-md-6">
												<?php 
												$q = mysqli_query($k,"SELECT * FROM tb_kawin");
												while ($d = mysqli_fetch_array($q)) {
													echo "<option value='$d[nama]'>$d[nama]</option>";
												} 
												?>
											</select>
										</div> 
 
  
									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Pekerjaan<span class="text-red">*</span></label>
											<select name="pekerjaan" id="pekerjaan" class="select2 form-control col-md-6">
												<?php 
												$q = mysqli_query($k,"SELECT * FROM tb_pekerjaan");
												while ($d = mysqli_fetch_array($q)) {
													echo "<option value='$d[nama]'>$d[nama]</option>";
												} 
												?>
											</select>
										</div> 


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Alamat<span class="text-red">*</span></label> 
											<input type="text" id="alamat"  required placeholder="Masukan Nama Kampung" name="nama_kampung" class="col-md-6 form-control"> 
										</div>


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label"> </label>  
											<label class="col-lg-1 col-form-label">RT<span class="text-red">*</span></label>

											<input type="text" id="rt" required placeholder="RT" name="rt" class="col-md-1 form-control">
											&nbsp;
											<label class="col-lg-1 col-form-label">RW<span class="text-red">*</span></label>
											<input type="text" id="rw"  required placeholder="RW" name="rw" class="col-md-1 form-control">
										</div> 

									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Kewarganegaraan<span class="text-red">*</span></label>
											<select name="kewarganegaraan" id="warga" class="select2 form-control col-md-4">
												<option value="WNI">WNI</option>
												<option value="WNA">WNA</option>
											</select>
										</div>   
 
										<hr/>
 
									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Mengetahui<span class="text-red">*</span></label>
											<select name="mengetahui" required id="mengetahui" class="select2 form-control col-md-4">
												<option value="">-- Silahkan Pilih --</option>
											 <?php 
												$q = mysqli_query($k,"SELECT * FROM tb_jabatan");
												while ($d = mysqli_fetch_array($q)) {
													echo "<option value='$d[id_jabatan]'>$d[nama]</option>";
												} 
												?>
											</select>
										</div> 

										<span class="text-red" >*</span>)Wajib isi.

										</div> 

									</div> 
									<div class="form-group form-inline"> 
										<label for="inlineinput" class="col-md-3 col-form-label"> </label>

										<button type="submit" name="tambah" class="btn btn-sm btn-primary" ><i class="fa fa-save"> Simpan Data</i></button>
										</div>  
								</form>
								<?php 
}elseif($btn == 'edit'){
$data = mysqli_fetch_array(mysqli_query($k,"SELECT * FROM tb_surat WHERE id_surat=$_POST[id]"));
	$bio = json_decode($data['isi_surat'],true);
	$ttd = json_decode($data['tanda_tangan'],true);
	?>


						<form method="POST" id="form" action="">
							<input type="hidden" name="update" value="<?php echo $data['id_surat']; ?>" >
								<div class="row">
										<div class="col-lg-12">

 
										<div class="form-group form-inline">
											<label for="inlineinput" class="col-md-3 col-form-label">Nomor Surat<span class="text-red">*</span></label> 
												<input type="text"   required placeholder="Autogenerate" value="<?php echo $data['no_surat']; ?>" readonly name="nomor_surat" class="col-md-6 form-control">
											</div> 
 

									 
										<div class="form-group form-inline">
											<label for="inlineinput" class="col-md-3 col-form-label">NIK<span class="text-red">*</span></label> 
												<input type="number" id="nik" required placeholder="Masukan Nomor KK" name="nomor_nik" class="col-md-6 form-control"  value="<?php echo $bio['nik']; ?>" readonly  >
											</div> 
 
									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Nama Lengkap<span class="text-red">*</span></label> 
											<input type="text" id="nama" required placeholder="Masukan Nama Lengkap" name="nama_lengkap" class="col-md-6 form-control" value="<?php echo $bio['nama']; ?>" readonly >
										</div> 


										<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Tempat dan Tgl. Lahir</label>
											<input type="text" id="tempat"  autocomplete="off" placeholder="Tempat Lahir" name="tempat" class="col-md-3 form-control" value="<?php echo $bio['tempat_lahir']; ?>" readonly>
											&nbsp;&nbsp;
											&nbsp;&nbsp;

												<div class="input-group col-md-3">
													<input type="text" id="tgl_lahir" placeholder="dd/mm/yyyy" value="<?php echo $bio['tgl_lahir']; ?>" readonly class="form-control datepicker"   name="tgl_lahir">
													<div class="input-group-append">
														<span class="input-group-text">
															<i class="fa fa-calendar-check"></i>
														</span>
													</div>
												</div>
											 
										</div> 
 										
 										<input type="hidden" name="jenkel" value="<?php echo $bio['jenis_kelamin']; ?>"> 
 										<input type="hidden" name="agama" value="<?php echo $bio['agama']; ?>"> 
 										<input type="hidden" name="warga" value="<?php echo $bio['warga']; ?>"> 

									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Status Perkawinan<span class="text-red">*</span></label>
											<select name="perkawinan" id="perkawinan" class="select2 form-control col-md-6">
												<?php 
												$q = mysqli_query($k,"SELECT * FROM tb_kawin");
												while ($d = mysqli_fetch_array($q)) {
													if ($bio['perkawinan']==$d['nama']) {
														echo "<option value='$d[nama]' selected>$d[nama]</option>"; 
													}else{
														echo "<option value='$d[nama]'>$d[nama]</option>";
													}
												} 
												?>
											</select>
										</div> 
 


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Alamat<span class="text-red">*</span></label> 
											<input type="text" id="alamat"  value="<?php echo $bio['alamat'] ?>" required placeholder="Masukan Nama Kampung" name="nama_kampung" class="col-md-6 form-control"> 
										</div>


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label"> </label>  
											<label class="col-lg-1 col-form-label">RT<span class="text-red">*</span></label>

											<input type="text" id="rt" value="<?php echo $bio['rt'] ?>" required placeholder="RT" name="rt" class="col-md-1 form-control">
											&nbsp;
											<label class="col-lg-1 col-form-label">RW<span class="text-red">*</span></label>
											<input type="text" id="rw" value="<?php echo $bio['rw'] ?>" required placeholder="RW" name="rw" class="col-md-1 form-control">
										</div>   

									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Pekerjaan<span class="text-red">*</span></label> 											
										<input type="text"   autocomplete="off"   value="<?php echo $bio['pekerjaan'] ?>"  name="pekerjaan"  id="pekerjaan" class="  col-md-4 form-control">
										</div> 

 
										<hr />

									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Mengetahui<span class="text-red">*</span></label>
											<select name="mengetahui" required id="mengetahui" class="select2 form-control col-md-4">
												<option value="">-- Silahkan Pilih --</option>
											 <?php 
												$q = mysqli_query($k,"SELECT * FROM tb_jabatan");
												while ($d = mysqli_fetch_array($q)) {
													if ($ttd['id_jabatan']==$d['id_jabatan']) {
													echo "<option value='$d[id_jabatan]' selected>$d[nama]</option>"; 
													}else{
													echo "<option value='$d[id_jabatan]'>$d[nama]</option>";
													}
												} 
												?>
											</select>
										</div> 

										<span class="text-red" >*</span>)Wajib isi.

										</div> 

									</div> 
									<div class="form-group form-inline"> 
										<label for="inlineinput" class="col-md-3 col-form-label"> </label>

										<button type="submit" class="btn btn-sm btn-primary" ><i class="fa fa-save"> Simpan Data</i></button>
										</div>  
								</form>
								<?php 
}elseif($btn=='tabel'){ 
$no = 1;
$res = array();
$data = array();
if ($jenis=='arsip') {
	$qry = mysqli_query($k,"SELECT * FROM tb_surat WHERE jenis_surat='SKL' AND arsip='1' AND rowstatus='1'");  

}else{
$qry = mysqli_query($k,"SELECT * FROM tb_surat WHERE jenis_surat='SKL' AND arsip is null AND rowstatus='1'");  

}

   $jsonResult = '{"data" : '; 
   	while ($d = mysqli_fetch_array($qry)) {
   		$isi = json_decode($d['isi_surat'],true);
		$data['no']				= $no;
		$data['no_surat']		= $d['no_surat'];
		$data['tanggal']		= tgl_miring($d['tanggal']);
		$data['nama_lengkap'] 	= $isi['nama'];
		$data['jenis_kelamin'] 	= jenkel($isi['jenis_kelamin']);
		$data['nik']			= $isi['nik'];  
		$data['pekerjaan']		= $isi['pekerjaan'];
		$data['id']				= $d['id_surat'];
		array_push($res, $data);
		$no++;
    } 	$jsonResult .= json_encode($res);
        $jsonResult .= ' }';
    echo $jsonResult;
 
}elseif ($btn=='cekarsip') {
	echo "
	<div class='table-responsive'>
										<table id='basic-arsip' class='table table-striped table-hover' >
											<thead>
												<tr>
													<th>No</th> 
													<th>Nomor Surat</th>
													<th>Tgl Surat</th>     
													<th>Nama Lengkap</th>
	 												<th>Jenis Kelamin</th> 
													<th>Pekerjaan</th>     
													<th>Aksi</th>  
												</tr>
											</thead> 
										</table>
									</div>
	";
} 
 if($btn == 'add'){
?>

<script type="text/javascript"> 

 $(document).ready(function(){  
      $('#key').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"Ajax/cari_nik_nama.php",  
                     method:"POST",  
                     data:{cari:query},  
                     success:function(data)  
                     {   
                          $('#keyList').fadeIn();  
                          $('#keyList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#key').val($(this).text());    
           var id = $(this).data('id');
           if ($(this).data('id') != 0) {
				$.ajax({  
                     url:"Ajax/data_personal.php",  
                     method:"POST",  
                     data:{id:id},  
                     success:function(data)  
                     {   
                     	console.log(data);
                     	$('#nik').val(data[0].no_kk); 
                     	$('#nama').val(data[0].nama_lengkap); 
                     	$('#tempat').val(data[0].tempat_lahir); 
                     	$('#tgl_lahir').val(data[0].tanggal_lahir); 
                     	$('#jenkel').val(data[0].jenis_kelamin);    
                     	$('#agama').val(data[0].agama);    
                     	$('#perkawinan').val(data[0].status_perkawinan);    
                     	$('#warga').val(data[0].kewarganegaraan);    
                     	$('#alamat').val(data[0].alamat_kampung);    
                     	$('#pekerjaan').val(data[0].pekerjaan_text);    
                     	$('#rt').val(data[0].rt);    
                     	$('#rw').val(data[0].rw);    
                     	$('#idd').val(data[0].id);    
 
                     }  
                });  
           }
           $('#keyList').fadeOut();  
      });  
 });  

 $('.datepicker').datetimepicker({
			format: 'DD/MM/YYYY',
		}); 
</script>
<?php } 
if ($btn=='cekarsip') {
	?>
<script type="text/javascript">
	  var tabel = null;
    function isiTabel2(){
    $(document).ready(function() {
        tabel =  $('#basic-arsip').DataTable( {
        	"destroy"	: true,
            "processing": true, 
            "ajax":
            {
                "url": "Ajax/kelahiran.php", // URL file untuk proses select datanya
                "type": "POST",
                "data": {
                	"btn":'tabel',
                	"jenis" : 'arsip'
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
                        { "data": "nama_lengkap", 
                          "width": "200px",   },
                        { "data": "jenis_kelamin" },
                        { "data": "pekerjaan" }, 
                        { "render": function ( data, type, row ) { // Tampilkan kolom aksi
                        	var html  =  
									"<a href='#' onclick='pop("+row.id+")' title='Cetak Surat' class='btn btn-xs btn-info'  > <i class='fa fa-print'></i> </a> "+ 
									"<a class=' btn btn-xs btn-secondary unarsip'   title='Kembalikan Arsip' href='#' data-id='"+row.id+"'><i class='fa fa-reply'></i></a>";
                        		return html
                    		}
                    	}

                    ]
		        });
		    }); 
    		} 
    		isiTabel2(); 
    		  $(document).on("click", ".unarsip", function () { 
		        $('#empModal').modal('hide');   
		    	  var url =  document.URL; 
		          var id = $(this).data('id'); 
		    	swal({
				  title: "Tampilkan Surat ini?",
				  text: "Data ditampilkan di tabel utama",
				  type: "info",
				  showCancelButton: true,
				  confirmButtonColor: "#55A5DD",
				  confirmButtonText: "Ya, kembalikan!",
				  closeOnConfirm: false
				},
				function(){
					 $.ajax({  
					 		url: 'Ajax/kelahiran.php',
		                        type: 'post',
		                        data: {id: id, btn:'unarsip', url:url},
		                        success: function(response){  
				  					swal("Dikembalikan!", "Surat berhasil dikembalikan.", "success"); 
				  					isiTabel();
		                  }, 
		              });
				});
		  	}); 

</script>
<?php } ?>