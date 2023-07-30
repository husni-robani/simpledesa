 <?php 
 	if (isset($_POST['simpanData'])) {
 		extract($_POST);
 		$cek = mysqli_query($k,"SELECT * FROM tb_data_penduduk WHERE no_kk='".anti($nomor_kk)."' AND no_nik='".anti($nomor_nik)."' WHERE rowstatus=1");
 		if (mysqli_num_rows($cek) > 0) {
 			echo "<script>sweetAlert('Gagal','Nomor KK dan Nomor NIK sudah ada', 'error'); </script>";
 		}else{
 			$tgg = tgl_muter($tgl_lahir); 
 		$upd = mysqli_query($k,"UPDATE  `tb_data_penduduk` SET `no_kk` = '$nomor_kk',`no_nik` = '$nomor_nik',`nama_lengkap` = '".anti($nama_lengkap)."',`alamat_kampung` = '$nama_kampung',`rt` = '$rt',`rw` = '$rw',`jenis_kelamin` = '$jenkel',`tempat_lahir` = '$tempat',`tanggal_lahir` = '$tgg',`agama` = '$agama',`pendidikan` = '$pendidikan',`jenis_pekerjaan` = '$pekerjaan',`status_perkawinan` = '$perkawinan',`kewarganegaraan` = '$kewarganegaraan',`nama_ayah` = '".anti($nama_ayah)."',`nama_ibu` = '".anti($nama_ibu)."',`keterangan` = '$keterangan', `modifiedon` = NOW()  WHERE `id` = '$id'");
 		if ($upd) {
 		echo "<script>sweetAlert('Selamat','Data Berhasil Disimpan', 'success');document.location='?page=data_penduduk';</script>";

 		}else{
 		echo "<script>sweetAlert('Gagal','Data Gagal Disimpan', 'error'); </script>";

 		}
 	}
						
 	}

	$data = mysqli_fetch_array(mysqli_query($k,"SELECT * FROM tb_data_penduduk WHERE id='$_GET[id]' AND rowstatus=1 "));
	if($data['id'] <= 0) {
 		echo "<script>sweetAlert('Gagal','Data tidak ditemukan', 'error'); document.location='?page=data_penduduk'; </script>";

	}else{
 ?>

	<div class="main-panel">

			<div class="content"> 

				<div class="page-inner">
					<div class="card full-height">
						 <div class="card-body">
					<div class="page-header">
						<h4 class="page-title">Edit Data Penduduk</h4>
						<div class="ml-md-auto py-2 py-md-0"> 
								<a  href='?page=data_penduduk' class=" btn btn-warning btn-sm " ><i class="fas fa-chevron-circle-left"></i> Kembali</a>
							</div>
					 		
					</div>     


						<form method="POST" action="">
									<input type="hidden" name="id" value="<?= $data['id']; ?>">
								<div class="row">
										<div class="col-lg-12">
									<div class="form-group form-inline">

										<label for="inlineinput" class="col-md-2 col-form-label">Nomor KK<span class="text-red">*</span></label> 
											<input type="number"  required value='<?= $data['no_kk']; ?>' placeholder="Masukan Nomor KK" name="nomor_kk" class="col-md-6 form-control">
										</div> 



									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">NIK<span class="text-red">*</span></label> 
											<input type="number"  required value='<?= $data['no_nik']; ?>' placeholder="Masukan Nomor NIK" name="nomor_nik" class="col-md-6 form-control">
										</div> 


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Nama Lengkap<span class="text-red">*</span></label> 
											<input type="text"  required value='<?= $data['nama_lengkap']; ?>' placeholder="Masukan Nama Lengkap" name="nama_lengkap" class="col-md-6 form-control">
										</div> 


										<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Tempat dan Tgl. Lahir</label>
											<input type="text" value='<?= $data['tempat_lahir']; ?>'   placeholder="Tempat Lahir" name="tempat" class="col-md-4 form-control">

												<div class="input-group">
													<input type="text" placeholder="dd/mm/yyyy" value='<?= tgl_miring($data['tanggal_lahir']); ?>' class="form-control datepicker"   name="tgl_lahir">
													<div class="input-group-append">
														<span class="input-group-text">
															<i class="fa fa-calendar-check"></i>
														</span>
													</div>
												</div>
											 
										</div> 



									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Jenis Kelamin<span class="text-red">*</span></label>
												<select class="form-control col-md-3" required name="jenkel">
													<option value="">-- Pilih Jenis Kelamin -- </option>
													<option <?php echo $data['jenis_kelamin'] == 'L' ? 'selected' : ''; ?> value="L">Laki-laki</option>
													<option <?php echo $data['jenis_kelamin'] == 'P' ? 'selected' : ''; ?>  value="P">Perempuan</option>
												</select>
										</div> 

									

									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Agama<span class="text-red">*</span></label>
											<select name="agama" class="select2 form-control col-md-3">
												<?php 
												$q = mysqli_query($k,"SELECT * FROM tb_agama");
												while ($d = mysqli_fetch_array($q)) {
													if($data['agama'] == $d['id']){
														echo "<option value='$d[id]' selected>$d[nama]</option>";
													}else{
														echo "<option value='$d[id]'>$d[nama]</option>";
													}
												} 
												?>
												<option value="99" >Lainnya</option>
											</select>
										</div> 



									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Pendidikan<span class="text-red">*</span></label>
											<select name="pendidikan" class="select2 form-control col-md-3">
												<?php 
												$q = mysqli_query($k,"SELECT * FROM tb_pendidikan");
												while ($d = mysqli_fetch_array($q)) {
													if($data['pendidikan'] == $d['id']){
														echo "<option value='$d[id]' selected>$d[nama]</option>";
													}else{
														echo "<option value='$d[id]' selected>$d[nama]</option>";
													}
												} 
												?>
											</select>
										</div> 
  


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Pekerjaan<span class="text-red">*</span></label>
											<select name="pekerjaan"  class="select2 form-control col-md-3">
												<?php 
												$q = mysqli_query($k,"SELECT * FROM tb_pekerjaan ORDER BY nama ASC");
												while ($d = mysqli_fetch_array($q)) {
													if($d['id']==$data['jenis_pekerjaan']){
														echo "<option value='$d[id]' selected >$d[nama]</option>"; 
													}else{
														echo "<option value='$d[id]'   >$d[nama]</option>"; 
													}
												} 
												if ($data['jenis_pekerjaan']==99) {
														echo "<option value='99' selected>Lainnya</option>";
													}
												?> 
											</select>
										</div> 


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Status Perkawinan<span class="text-red">*</span></label>
											<select name="perkawinan"  class="select2 form-control col-md-3">
												<?php 
												$q = mysqli_query($k,"SELECT * FROM tb_kawin");
												while ($d = mysqli_fetch_array($q)) {
													if($data['status_perkawinan'] == $d['id']){
														echo "<option value='$d[id]' selected>$d[nama]</option>";
													}else{
														echo "<option value='$d[id]'>$d[nama]</option>";
													}
												} 
												?>
											</select>
										</div> 


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Nama Ayah</label>
											<input type="text" value='<?= $data['nama_ayah']; ?>'  placeholder="Masukan Nama Ayah" name="nama_ayah" class="col-md-6 form-control"> 
										</div> 

									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Nama Ibu</label>
											<input type="text"    placeholder="Masukan Nama Ibu" value='<?= $data['nama_ibu']; ?>'   name="nama_ibu" class="col-md-6 form-control"> 
										</div> 


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Alamat<span class="text-red">*</span></label> 
											<input type="text"  value='<?= $data['alamat_kampung']; ?>'   required placeholder="Masukan Nama Kampung" name="nama_kampung" class="col-md-6 form-control"> 
										</div>


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label"> </label>  
											<label class="col-lg-1 col-form-label">RT<span class="text-red">*</span></label>

											<input type="text" value='<?= $data['rt']; ?>'   required placeholder="RT" name="rt" class="col-md-1 form-control">
											&nbsp;
											<label class="col-lg-1 col-form-label">RW<span class="text-red">*</span></label>
											<input type="text" value='<?= $data['rw']; ?>'    required placeholder="RW" name="rw" class="col-md-1 form-control">
										</div> 

									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Kewarganegaraan<span class="text-red">*</span></label>
											<select name="kewarganegaraan" class="select2 form-control col-md-3">
												<option <?php echo $data['kewarganegaraan']=='WNI' ? 'selected':'';?>>WNI</option>
												<option <?php echo $data['kewarganegaraan']=='WNA' ? 'selected':'';?>>WNA</option>
											</select>
										</div> 



									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Keterangan</label>
											<input type="text"  value="<?= $data['keterangan'] ?>"   placeholder="-" name="keterangan" class="col-md-6 form-control"> 
										</div> 


										</div>
									</div>
								<span class="text-red">*</span>) Wajib diisi.

									<div class="form-group form-inline"> 
										<label for="inlineinput" class="col-md-2 col-form-label"> </label>

										<button type="submit" name="simpanData" class="btn btn-sm btn-primary" ><i class="fa fa-save"> Simpan Data</i></button>
										</div>  
								</form>

								</div>
							</div> 
						</div> 
<?php } ?>