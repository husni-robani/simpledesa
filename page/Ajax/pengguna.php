<?php
extract($_POST);
include '../../config/konek.php';
include '../../config/fungsi.php';
include '../../page/Model/Setting.php';
include '../../page/verif.php';
if ($btn=='hapus') {
	$qry = mysqli_query($k,"UPDATE tb_user SET status_user='0' WHERE id='$id'");  
}elseif($btn == 'add'){
 
	?>


						<form method="POST" id="form" action="">
								<div class="row">
										<div class="col-lg-12">
  
  
 
									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Pegawai<span class="text-red">*</span></label>
												<select class="form-control col-md-6" id="pegawai" required name="pegawai">
													<option value="">-- Pilih Pegawai -- </option>
												<?php
												$qryx = mysqli_query($k,"SELECT * FROM tb_pegawai");
												while ($d = mysqli_fetch_array($qryx)) {
													echo "<option value='$d[id_pegawai]'>$d[nama_pegawai]</option>";
												} 
												?>
													
												</select>
										</div> 

									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Username<span class="text-red">*</span></label> 
											<input type="text" id="username" required placeholder="Masukan Username" name="username" class="col-md-6 form-control">
										</div> 


										<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Kata Sandi</label>
											<input type="password" id="password"  autocomplete="off" placeholder="******" name="password" class="col-md-6 form-control"> 

											 
										</div> 



									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Role Akses<span class="text-red">*</span></label>
												<select class="form-control col-md-6" id="role" required name="role">
													<option value="">-- Pilih Role -- </option>
													<option value="Admin">Admin</option>
													<option value="KepDes">Kepala Desa</option>
													<option value="Staff">Kaur/Kasi/Staff</option>
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
$data = mysqli_fetch_array(mysqli_query($k,"SELECT a.*, b.`nama_pegawai`, b.`nip`, c.`nama` as jabatan FROM tb_user a LEFT JOIN tb_pegawai b ON a.`id_pegawai`=b.`id_pegawai` LEFT JOIN tb_jabatan c ON b.`jabatan`=c.`id_jabatan` WHERE a.status_user=1 AND id=$id"));
 
	?>
	<form method="POST" id="form" action="">
								<div class="row">
										<div class="col-lg-12">
  
  
 									<input type="hidden" name="id" value="<?= $data['id']; ?>">
									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Pegawai<span class="text-red">*</span></label>
												<select class="form-control col-md-6" id="pegawai" required name="pegawai">
													<option value="">-- Pilih Pegawai -- </option>
												<?php
												$qryx = mysqli_query($k,"SELECT * FROM tb_pegawai");
												while ($d = mysqli_fetch_array($qryx)) {
													if($data['id_pegawai']==$d['id_pegawai']){
														echo "<option value='$d[id_pegawai]' selected>$d[nama_pegawai]</option>";
													}else{
														echo "<option value='$d[id_pegawai]'>$d[nama_pegawai]</option>";
													}
												} 
												?>
													
												</select>
										</div> 

									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Username<span class="text-red">*</span></label> 
											<input type="text" id="username"  value="<?= $data['username']; ?>" required placeholder="Masukan Username" name="username" class="col-md-6 form-control">
										</div> 


										<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Kata Sandi</label>
											<input type="password" id="password"  autocomplete="off" placeholder="Kosongkan jika tidak diganti" name="password" class="col-md-6 form-control"> 

											 
										</div> 



									<div class="form-group form-inline">
										<label for="inlineinput" class="col-md-3 col-form-label">Role Akses<span class="text-red">*</span></label>
												<select class="form-control col-md-6" id="role" required name="role">
													<option value="">-- Pilih Role -- </option>
													<option <?php echo $data['role'] =='Admin' ?  'selected':''; ?> value="Admin">Admin</option>
													<option <?php echo  $data['role'] =='KepDes' ?  'selected':''; ?> value="KepDes">Kepala Desa</option>
													<option <?php echo $data['role'] =='Staff' ?  'selected':''; ?> value="Staff">Kaur/Kasi/Staff</option>
												</select>
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
$qry = mysqli_query($k,"SELECT a.*, b.`nama_pegawai`, b.`nip`, c.`nama` as jabatan FROM tb_user a LEFT JOIN tb_pegawai b ON a.`id_pegawai`=b.`id_pegawai` LEFT JOIN tb_jabatan c ON b.`jabatan`=c.`id_jabatan` WHERE a.status_user=1");  
 
   $jsonResult = '{"data" : '; 
   	while ($d = mysqli_fetch_array($qry)) {
   		
		$data['no']				= $no;
		$data['jabatan']		= $d['jabatan'];
		$data['nip']			= $d['nip'];
		$data['nama_pegawai'] 	= $d['nama_pegawai'];
		$data['role'] 			= $d['role'];
		$data['username']			= $d['username'];   
		$data['id']				= $d['id'];
		array_push($res, $data);
		$no++;
    } 	$jsonResult .= json_encode($res);
        $jsonResult .= ' }';
    echo $jsonResult;
 
} 
?>