<?php
extract($_POST);
include '../../config/konek.php';
include '../../config/fungsi.php';
include '../../page/verif.php';
if ($btn=='view') {
	$x = mysqli_fetch_array(mysqli_query($k, "SELECT * FROM v_data_penduduk WHERE id='$id'"));
	echo "
	<table class='table table-striped' width='100%'>
	<tr>
		<th>Nomor KK </th> <th>:</th> <td>$x[no_kk]</td>  
		<th>Agama</th> <th>:</th> <td>$x[agama_text]</td>
	</tr>
	<tr>
		<th>Nomor NIK</th> <th>:</th> <td>$x[no_nik]</td> <th>Pendidikan</th> 
		<th>:</th> <td>$x[pendidikan_text]</td>
	</tr>
	<tr>
		<th>Nama Lengkap </th> <th>:</th> <td>$x[nama_lengkap]</td> 
		<th>Pekerjaan</th> <th>:</th> <td>$x[pekerjaan_text]</td>
	</tr>
	<tr>
		<th>Jenis Kelamin</th> <th>:</th> <td>".jenkel($x['jenis_kelamin'])."</td> 
		<th>Status Pernikahan</th> <th>:</th> <td>$x[kawin_text]</td>
	</tr>
	<tr>
		<th>Tempat & tanggal lahir</th> <th>:</th> <td>$x[tempat_lahir], ".tgl_indo($x['tanggal_lahir'])."</td> 
		<th>Alamat</th> <th>:</th> <td>$x[alamat_kampung], RT : $x[rt] RW : $x[rw]</td>
	</tr> 

	<tr>
		<th>Umur</th> <th>:</th> <td>$x[umur]  Tahun</td>
		<th>Kewarganegaraan</th> <th>:</th> <td>$x[kewarganegaraan]</td>
	</tr> 

	<tr>
		<th>Nama Ayah</th> <th>:</th> <td>$x[nama_ayah]</td>
		<th>Keterangan</th> <th>:</th> <td>".$x['keterangan']."</td>
	</tr> 

	<tr>
		<th>Nama Ibu</th> <th>:</th> <td>$x[nama_ibu]</td>
	</tr> 
	</table>

	";
}elseif ($btn=='hapus') {
	$qry = mysqli_query($k,"UPDATE tb_data_penduduk SET rowstatus='0' WHERE id='$id'"); 
}elseif($btn=='tabel'){
	
$no = 1;
$res = array();
$data = array();
$qry = mysqli_query($k,"SELECT * FROM  v_data_penduduk WHERE rowstatus=1"); 
   $jsonResult = '{"data" : '; 
   	while ($d = mysqli_fetch_array($qry)) {
		$data['no']				= $no;
		$data['no_kk']			= $d['no_kk'];
		$data['no_nik']			= $d['no_nik'];
		$data['nama_lengkap'] 	= $d['nama_lengkap'];
		$data['jenis_kelamin'] 	= jenkel($d['jenis_kelamin']);
		$data['tanggal_lahir']	= tgl_miring($d['tanggal_lahir']);
		$data['umur']			= $d['umur'];
		$data['id']				= $d['id'];
		array_push($res, $data);
		$no++;
    } 	$jsonResult .= json_encode($res);
        $jsonResult .= ' }';
    echo $jsonResult;
 
}else{

}
 