<?php 
header('Access-Control-Allow-Origin');
extract($_POST);
include '../../config/konek.php';
include '../../config/fungsi.php';
include '../../page/verif.php';
if (isset($_POST['cari'])) {
	$res = array();
	$data = array(); 
	$qry = mysqli_query($k,"SELECT * FROM v_data_penduduk a WHERE a.`no_nik` LIKE '%".gantiKutip($cari)."%' OR a.`nama_lengkap` LIKE '%".gantiKutip($cari)."%' LIMIT 10");
	 $output = '<ul class="ull  list-unstyled">';
	 if (mysqli_num_rows($qry) > 0) {
			while ($d = mysqli_fetch_array($qry)) { 
				 $output .= "<li class='lii' data-id='".$d['id']."'>".$d['no_nik'].'-'.$d['nama_lengkap']."</li>"; 
			}
	 }else{
	 	$output .= "<li  class='lii' data-id='0'>Tidak ada yg cocok </li>";
	 }
	 $output .= '</ul>';
	 echo $output;
}

?>
 