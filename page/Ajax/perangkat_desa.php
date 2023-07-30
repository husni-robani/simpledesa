<?php
extract($_POST);
include '../../config/konek.php';
include '../../config/fungsi.php';
include '../../page/Model/Setting.php';
include '../../page/verif.php';
if ($btn=='hapus') {
	$qry = mysqli_query($k,"UPDATE tb_pegawai SET rowstatus='0' WHERE id_pegawai='$id'");  
}elseif($btn == 'add'){
 
	?>


						<form method="POST" id="form" action="">
								<div class="row">
										<div class="col-lg-12">
  
 
										<div class="form-group form-inline">
											<label for="inlineinput" class="col-md-3 col-form-label">NIP/NRPD<span class="text-red">*</span></label> 
												<input type="number" id="nip" required placeholder="Masukan Nomor NIP/NRPD" name="nip" class="col-md-6 form-control">
											</div> 
 
									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Jabatan<span class="text-red">*</span></label>
												<select class="form-control col-md-6" id="jabatan" required name="jabatan">
													<option value="">-- Pilih Jabatan -- </option>
												<?php
												$qryx = mysqli_query($k,"SELECT * FROM tb_jabatan");
												while ($d = mysqli_fetch_array($qryx)) {
													echo "<option value='$d[id_jabatan]'>$d[nama]</option>";
												} 
												?>
													
												</select>
										</div> 

									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Nama Lengkap<span class="text-red">*</span></label> 
											<input type="text" id="nama_pegawai" required placeholder="Masukan Nama Lengkap" name="nama_pegawai" class="col-md-6 form-control">
										</div> 


										<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Tempat dan Tgl. Lahir</label>
											<input type="text" id="tempat_lahir"  autocomplete="off" placeholder="Tempat Lahir" name="tempat_lahir" class="col-md-3 form-control">
											&nbsp;&nbsp;
											&nbsp;&nbsp;

												<div class="input-group col-md-3">
													<input type="text" id="tanggal_lahir" placeholder="yyyy-mm-dd" class="form-control datepicker"   name="tanggal_lahir">
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
													<option value="Pria">Pria</option>
													<option value="Wanita">Wanita</option>
												</select>
										</div> 

									 
										<div class="form-group form-inline">
											<label for="inlineinput" class="col-md-3 col-form-label">Email<span class="text-red">*</span></label> 
												<input type="email" id="email" required placeholder="Masukan Alamat Email" name="email" class="col-md-6 form-control">
											</div> 

										<div class="form-group form-inline">
											<label for="inlineinput" class="col-md-3 col-form-label">No Hp<span class="text-red">*</span></label> 
												<input type="number" id="no_hp" required placeholder="Masukan No Hp" name="no_hp" class="col-md-6 form-control">
											</div> 


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Alamat<span class="text-red">*</span></label> 
											<input type="text" id="alamat"  required placeholder="Masukan Alamat" name="alamat" class="col-md-6 form-control"> 
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
$data = mysqli_fetch_array(mysqli_query($k,"SELECT * FROM tb_pegawai WHERE id_pegawai=$_POST[id]"));
 
	?>

						<form method="POST" id="form" action="">
								<div class="row">
										<div class="col-lg-12">
  
 										<input type="hidden" name="id" value="<?= $id; ?>">
										<div class="form-group form-inline">
											<label for="inlineinput" class="col-md-3 col-form-label">NIP/NRPD<span class="text-red">*</span></label> 
												<input type="number" id="nip" value="<?= $data['nip']; ?>" required placeholder="Masukan Nomor NIP/NRPD" name="nip" class="col-md-6 form-control">
											</div> 
 
									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Jabatan<span class="text-red">*</span></label>
												<select class="form-control col-md-6" id="jabatan" required name="jabatan">
													<option value="">-- Pilih Jabatan -- </option>
												<?php
												$qryx = mysqli_query($k,"SELECT * FROM tb_jabatan");
												while ($d = mysqli_fetch_array($qryx)) {
													if($data['jabatan'] == $d['id_jabatan']){
														echo "<option value='$d[id_jabatan]' selected>$d[nama]</option>";
													}else{
														echo "<option value='$d[id_jabatan]'>$d[nama]</option>";
													}
												} 
												?>
													
												</select>
										</div> 

									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Nama Lengkap<span class="text-red">*</span></label> 
											<input type="text" id="nama_pegawai"  value="<?= $data['nama_pegawai']; ?>"  required placeholder="Masukan Nama Lengkap" name="nama_pegawai" class="col-md-6 form-control">
										</div> 


										<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Tempat dan Tgl. Lahir</label>
											<input type="text" id="tempat_lahir"   value="<?= $data['tempat_lahir']; ?>"  autocomplete="off" placeholder="Tempat Lahir" name="tempat_lahir" class="col-md-3 form-control">
											&nbsp;&nbsp;
											&nbsp;&nbsp;

												<div class="input-group col-md-3">
													<input type="text" id="tanggal_lahir"  value="<?= $data['tanggal_lahir']; ?>"  placeholder="yyyy-mm-dd" class="form-control datepicker"   name="tanggal_lahir">
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
													<option <?php echo $data['jenkel'] == 'Pria' ? 'selected' :'';  ?> value="Pria">Pria</option>
													<option <?php echo $data['jenkel'] == 'Wanita' ? 'selected' :'';  ?>  value="Wanita">Wanita</option>
												</select>
										</div> 

									 
										<div class="form-group form-inline">
											<label for="inlineinput" class="col-md-3 col-form-label">Email<span class="text-red">*</span></label> 
												<input type="email" id="email"  value="<?= $data['email']; ?>" required placeholder="Masukan Alamat Email" name="email" class="col-md-6 form-control">
											</div> 

										<div class="form-group form-inline">
											<label for="inlineinput"  class="col-md-3 col-form-label">No Hp<span class="text-red">*</span></label> 
												<input type="number" id="no_hp" value="<?= $data['no_hp']; ?>"  required placeholder="Masukan No Hp" name="no_hp" class="col-md-6 form-control">
											</div> 


									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Alamat<span class="text-red">*</span></label> 
											<input type="text" id="alamat"   value="<?= $data['alamat']; ?>" required placeholder="Masukan Alamat" name="alamat" class="col-md-6 form-control"> 
										</div>
  
										<span class="text-red" >*</span>)Wajib isi.

										</div> 

									</div> 
									<div class="form-group form-inline"> 
										<label for="inlineinput" class="col-md-3 col-form-label"> </label>

										<button type="submit" name="simpanData" class="btn btn-sm btn-primary" ><i class="fa fa-save"> Simpan Data</i></button>
										</div>  
								</form>
 
								<?php 
}elseif($btn=='tabel'){ 
$no = 1;
$res = array();
$data = array(); 
$qry = mysqli_query($k,"SELECT a.`id_pegawai`, a.`nip`, a.`nama_pegawai` as nama_lengkap, b.`nama` AS jabatan, a.`no_hp`,  a.`email` FROM tb_pegawai a LEFT JOIN tb_jabatan b ON a.`jabatan`=b.`id_jabatan` WHERE a.`rowstatus`=1");  
 
   $jsonResult = '{"data" : '; 
   	while ($d = mysqli_fetch_array($qry)) {
   		
		$data['no']				= $no;
		$data['jabatan']		= $d['jabatan'];
		$data['nip']			= $d['nip'];
		$data['nama_lengkap'] 	= $d['nama_lengkap'];
		$data['no_hp'] 			= $d['no_hp'];
		$data['email']			= $d['email'];   
		$data['id']				= $d['id_pegawai'];
		array_push($res, $data);
		$no++;
    } 	$jsonResult .= json_encode($res);
        $jsonResult .= ' }';
    echo $jsonResult;
 
} 
?>