<?php
function judul(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT content FROM conf_sistem WHERE id=1"));
	return $qry['content'];
}

function subjudul(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT content FROM conf_sistem WHERE id=2"));
	return $qry['content'];
}
function jumlah_surat(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT COUNT(*) AS jm FROM tb_menu_surat WHERE kode > 1"));
	return $qry['jm'];
}
  
function tentang(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT content FROM conf_sistem WHERE id=3"));
	return $qry['content'];
}
 
function tentang2(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT content FROM conf_sistem WHERE id=4"));
	return $qry['content'];
}
 
function logo(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT content FROM conf_sistem WHERE id=5"));
	return $qry['content'];
} 

function singkatan(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT content FROM conf_sistem WHERE id=6"));
	return $qry['content'];
}

function desa(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT content FROM conf_sistem WHERE id=7"));
	return $qry['content'];
}
 

function kabupaten(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT content FROM conf_sistem WHERE id=8"));
	return $qry['content'];
}

function kecamatan(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT content FROM conf_sistem WHERE id=16"));
	return $qry['content'];
}

function kop_1(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT content FROM conf_sistem WHERE id=9"));
	return $qry['content'];
} 
function kop_2(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT content FROM conf_sistem WHERE id=10"));
	return $qry['content'];
} 

function kop_3(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT content FROM conf_sistem WHERE id=11"));
	return $qry['content'];
} 
function kop_4(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT content FROM conf_sistem WHERE id=12"));
	return $qry['content'];
} 
function kode_desa(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT content FROM conf_sistem WHERE id=14"));
	return $qry['content'];
} 
function gambar_login(){
	global $k;
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT content FROM conf_sistem WHERE id=15"));
	return $qry['content'];
} 


function kode_surat(){
	global $k;
	$url = explode('?', $_SERVER['HTTP_REFERER'])[1];
	$qry = mysqli_fetch_array(mysqli_query($k,"SELECT kode FROM tb_menu_surat WHERE url='?$url'"));
	return $qry['kode']; 
} 
function active($e)
{
	$xx = $_GET['page']=="$e" ? 'active' : '';
	return $xx;
}
function expand($e)
{
	$xx = $_GET['sub']=="$e" ? 'active' : '';
	return $xx;
}

function show($e)
{
	$xx = $_GET['sub']=="$e" ? 'show' : '';
	return $xx;
}
?>