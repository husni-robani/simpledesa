 <?php 
 	if (isset($_POST['nomor_kk'])) {
 		extract($_POST);
 		$cek = mysqli_query($k,"SELECT * FROM tb_data_penduduk WHERE no_kk='$nomor_kk' AND no_nik='".anti($nomor_nik)."' WHERE rowstatus=1");
 		if (mysqli_num_rows($cek) > 0) {
 			echo "<script>sweetAlert('Gagal','Nomor KK dan Nomor NIK sudah ada', 'error'); </script>";
 		}else{
 			$tgg = tgl_muter($tgl_lahir);
 		$ins = mysqli_query($k,
 			"INSERT INTO `tb_data_penduduk`(`no_kk`,`no_nik`,`nama_lengkap`,`alamat_kampung`,`rt`,`rw`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`agama`,`pendidikan`,`jenis_pekerjaan`,`status_perkawinan`,`kewarganegaraan`,`nama_ayah`,`nama_ibu`,`keterangan`,`createdby`,`createdon`,`rowstatus` ) VALUES ('$nomor_kk','$nomor_nik','".anti($nama_lengkap)."','$nama_kampung','$rt','$rw','$jenkel','$tempat','$tgg','$agama','$pendidikan','$pekerjaan','$perkawinan','$kewarganegaraan','".anti($nama_ayah)."','".anti($nama_ibu)."','$keterangan','".anti($_SESSION['nama_pegawai'])."',NOW(),'1')");
 		
 		if ($ins) {
 		echo "<script>sweetAlert('Selamat','Data Berhasil Ditambahkan', 'success');document.location='?page=data_penduduk';</script>";

 		}else{
 		echo "<script>sweetAlert('Gagal','Data Gagal Ditambahkan', 'error'); </script>";

 		}
 	}
						
 	}

 ?>

	<div class="main-panel">

			<div class="content"> 

				<div class="page-inner">
					<div class="card full-height">
						 <div class="card-body">
					<div class="page-header">
						<h4 class="page-title">Tambah Data Penduduk</h4>
						<div class="ml-md-auto py-2 py-md-0"> 
								<a  href='?page=data_penduduk' class=" btn btn-warning btn-sm " ><i class="fas fa-chevron-circle-left"></i> Kembali</a>
							</div>
					 		
					</div>     


						<form method="POST" action="">
								<div class="row">
										<div class="col-lg-12">
									<div class="form-group form-inline">

										<label for="inlineinput" class="col-md-2 col-form-label">Nomor KK<span class="text-red">*</span></label> 
											<input type="number"  required placeholder="Masukan Nomor KK" name="nomor_kk" class="col-md-6 form-control">
										</div> 



									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">NIK<span class="text-red">*</span></label> 
											<input type="number"  required placeholder="Masukan Nomor NIK" name="nomor_nik" class="col-md-6 form-control">
										</div> 


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Nama Lengkap<span class="text-red">*</span></label> 
											<input type="text"  required placeholder="Masukan Nama Lengkap" name="nama_lengkap" class="col-md-6 form-control">
										</div> 


										<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Tempat dan Tgl. Lahir</label>
											<input type="text"   placeholder="Tempat Lahir" name="tempat" class="col-md-4 form-control">

												<div class="input-group">
													<input type="text" placeholder="dd/mm/yyyy" class="form-control datepicker"   name="tgl_lahir">
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
													<option value="L">Laki-laki</option>
													<option value="P">Perempuan</option>
												</select>
										</div> 

									

									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Agama<span class="text-red">*</span></label>
											<select name="agama" class="select2 form-control col-md-3">
												<?php 
												$q = mysqli_query($k,"SELECT * FROM tb_agama");
												while ($d = mysqli_fetch_array($q)) {
													echo "<option value='$d[id]'>$d[nama]</option>";
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
													echo "<option value='$d[id]'>$d[nama]</option>";
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
													echo "<option value='$d[id]'>$d[nama]</option>";
												} 
												?>
												<option value="99">Lainnya</option>
											</select>
										</div> 


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Status Perkawinan<span class="text-red">*</span></label>
											<select name="perkawinan"  class="select2 form-control col-md-3">
												<?php 
												$q = mysqli_query($k,"SELECT * FROM tb_kawin");
												while ($d = mysqli_fetch_array($q)) {
													echo "<option value='$d[id]'>$d[nama]</option>";
												} 
												?>
											</select>
										</div> 


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Nama Ayah</label>
											<input type="text"  placeholder="Masukan Nama Ayah" name="nama_ayah" class="col-md-6 form-control"> 
										</div> 

									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Nama Ibu</label>
											<input type="text"    placeholder="Masukan Nama Ibu" name="nama_ibu" class="col-md-6 form-control"> 
										</div> 


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Alamat<span class="text-red">*</span></label> 
											<input type="text"  required placeholder="Masukan Nama Kampung" name="nama_kampung" class="col-md-6 form-control"> 
										</div>


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label"> </label>  
											<label class="col-lg-1 col-form-label">RT<span class="text-red">*</span></label>

											<input type="text"  required placeholder="RT" name="rt" class="col-md-1 form-control">
											&nbsp;
											<label class="col-lg-1 col-form-label">RW<span class="text-red">*</span></label>
											<input type="text"  required placeholder="RW" name="rw" class="col-md-1 form-control">
										</div> 

									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Kewarganegaraan<span class="text-red">*</span></label>
											<select name="kewarganegaraan" class="select2 form-control col-md-3">
												<option>WNI</option>
												<option>WNA</option>
											</select>
										</div> 



									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-2 col-form-label">Keterangan</label>
											<input type="text"    placeholder="-" name="keterangan" class="col-md-6 form-control"> 
										</div> 


										</div>
									</div>
<span class="text-red">*</span>) Wajib diisi.

									<div class="form-group form-inline"> 
										<label for="inlineinput" class="col-md-2 col-form-label"> </label>

										<button type="submit" class="btn btn-sm btn-primary" ><i class="fa fa-save"> Simpan Data</i></button>
										</div>  
								</form>

								</div>
							</div> 
						</div> 
