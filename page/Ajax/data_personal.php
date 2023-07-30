<?php 
header('Access-Control-Allow-Origin');
header('Content-Type: application/json');
extract($_POST);
include '../../config/konek.php';
include '../../config/fungsi.php';
include '../../page/verif.php';
if (isset($_POST['id'])) {
	$res = array();
$data = array();
$qry = mysqli_query($k,"SELECT *, IF(jenis_kelamin='L','Laki-laki','Perempuan') AS jenis_kelamin_text  FROM  v_data_penduduk WHERE id='$_POST[id]' AND rowstatus=1");  
   	while ($d = mysqli_fetch_array($qry)) { 
		$data['no_kk']						= $d['no_kk'];
		$data['no_nik']						= $d['no_nik'];
		$data['nama_lengkap'] 				= $d['nama_lengkap'];
		$data['jenis_kelamin'] 				= $d['jenis_kelamin_text'];
		$data['tempat_lahir'] 				= $d['tempat_lahir'];
		$data['tanggal_lahir']				= tgl_miring($d['tanggal_lahir']); 
		$data['id']							= $d['id'];
		$data['agama']						= $d['agama_text']; 
		$data['rt']							= $d['rt']; 
		$data['rw']							= $d['rw']; 
		$data['status_perkawinan']			= $d['kawin_text']; 
		$data['alamat_kampung']				= $d['alamat_kampung']; 
		$data['kewarganegaraan']			= $d['kewarganegaraan']; 
		$data['pekerjaan_text']				= $d['pekerjaan_text']; 
		$data['id']							= $d['id'];
		array_push($res, $data); 
    } 	
    echo json_encode($res);  
}

?>
 