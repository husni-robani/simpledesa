<?php 
session_start();

function cari($username,$password){
	global $k;
	$pass = substr(sha1($password),0,10);  
	$qry = mysqli_query($k,"SELECT a.`id_pegawai`, c.`id_jabatan`,  a.`password`,  b.`nama_pegawai`, c.`nama` as nama_jabatan, a.`foto`, a.`role` FROM tb_user a LEFT JOIN tb_pegawai b ON a.`id_pegawai`=b.`id_pegawai` LEFT JOIN tb_jabatan c ON c.`id_jabatan`=b.`jabatan` WHERE a.`status_user`=1 AND a.`username`='$username' AND a.`password`='$pass'"); 
	if (mysqli_num_rows($qry) > 0) {
		$x = mysqli_fetch_array($qry); 
		$_SESSION['sesi_aktif']		= 1;
		$_SESSION['id_pegawai'] 	= $x['id_pegawai'];
		$_SESSION['id_jabatan'] 	= $x['id_jabatan'];
		$_SESSION['nama_pegawai']	= $x['nama_pegawai'];
		$_SESSION['nama_jabatan']	= $x['nama_jabatan'];
		$_SESSION['foto']			= $x['foto'];		
		$_SESSION['pass']			= $x['password'];		
		$_SESSION['role']			= $x['role'];		
		return 200;
	}else{
		return 400;
	}
}