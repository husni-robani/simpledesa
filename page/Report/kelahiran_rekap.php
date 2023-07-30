<?php 
session_start(); 
ini_set('max_execution_time', 300); 
set_time_limit(300); 
error_reporting(0);
 		header( "Content-Type: application/vnd.ms-excel" );
		header( "Content-disposition: attachment; filename=Rekap-SKL.xls" );  
$dir = dirname(__FILE__,3);
include("$dir/config/konek.php"); 
include("$dir/page/Model/Setting.php"); 
include_once("$dir/config/fungsi.php");  
$content="";

$normalout=true; 

$content=ob_get_clean();

$normalout=false;  
ob_start(); 
?> 
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 

<title>Rekap Surat</title> 
<style type="text/css">
	.tempat{
		font-size: 12px;
	}
	.hed{
		font-size: 11px;
		font-weight: bold;
		line-height: 13px;
	}
	.th{
		font-size: 11px; 
    	border: 1px solid black;
    	padding: 3px; 
  		vertical-align: middle;
	}
	 
	.text7{
		font-size: 11px;
		text-align: center;
		padding: 1px;
	}
	.center{
		font-size: 11px;
		text-align: center;
		padding: 3px;  
		vertical-align: middle;
	} 
	.left{
		font-size: 11px;
		text-align: left; 
		padding: 3px; 
  vertical-align: middle;
	}  

	.right{
		font-size: 11px;
		text-align: right; 
		padding: 3px; 
  vertical-align: middle;
	}  
	.table{
    	border-collapse: collapse;
	}
	.nama_acc{
		font-weight: bold;
	}
	.warna{
		background-color: #f2f8ff; 
	}
	.kosong{
		width: 4px;
	}
	.pre{
        margin-left: 1000px;
		font-size: 11px;
	}
</style>
</head>
<body  >     
    <div align="center">
        <h3>REKAPITULASI SURAT KETERANGAN KELAHIRAN</h3>  
    </div>
    <br> 
    <br> 
                  <table class='table' border="0" width='100%'  >
                   <thead>
						<tr>
							<th class="th">No</th> 
							<th class="th">Nomor Surat</th>
							<th class="th">Tgl Surat</th>     
							<th class="th">Nama Lengkap</th>
							<th class="th">Jenis Kelamin</th>  
							<th class="th">Alamat</th>  
							<th class="th">RT</th>  
							<th class="th">RW</th>  
							<th class="th">Pekerjaan</th>  
						</tr>
					</thead>  
                     <tbody>
                     	<?php
                     	$no = 1;
                     	$q = mysqli_query($k,"SELECT * FROM tb_surat WHERE jenis_surat='SKL' AND  rowstatus='1' ORDER BY id_surat ASC");
                     	while ($d = mysqli_fetch_array($q)) {
							$bio = json_decode($d['isi_surat'],true);
						                      		 
                     	echo"
                     	<tr>
                     		<td class='th'>$no</td>
                     		<td class='th'>$d[no_surat]</td>
                     		<td class='th'>$d[tanggal]</td>
                     		<td class='th'>$bio[nama]</td>
                     		<td class='th'>$bio[jenis_kelamin]</td> 
                     		<td class='th'>$bio[alamat]</td> 
                     		<td class='th'>$bio[rt]</td> 
                     		<td class='th'>$bio[rw]</td> 
                     		<td class='th'>$bio[pekerjaan]</td> 
						</tr>";
						$no++;
						}
						?>
                     </tbody>
                   </table>
               </body>
               </html>