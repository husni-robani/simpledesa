<?php 
session_start();
ob_start();
$uri = $_SERVER['HTTP_HOST'];;

include("../../config/konek.php");  
include("../../page/Model/Setting.php");  

include_once("../../config/fungsi.php"); 
?> 
<html xmlns="http://www.w3.org/1999/xhtml">  

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 

<title>DATA PENDUDUK</title> 

 <style type="text/css">  

 	.batas{

 		margin-top: 100px;

 	} 

	.hed{

		font-size: 10px;

		font-weight: bold;

		line-height: 13px;

	}

	.th{

		font-size: 13px;

		text-align: center; 

    	border: 1px solid black;

    	padding: 5px;

	}

	.text7{

		font-size: 7px;

		text-align: center;

		padding: 1px;

	}

	.Content{

		font-size: 10px;

		text-align: left;

		padding: 3px;

	} 

	.namaContent{

		font-size: 9px;

		text-align: left;

		padding: 3px;

	}  

	.table{

    	border-collapse: collapse;

	} 

	.warna{

		background-color: #009641; 

		color: #fff;

	}

	p{

		font-size: 14px;

		float: right;

		margin-left: 0px; 

		font-weight: bold;

	}

	.kop1{

		font-size: 14px;
 		margin-bottom: -5px;
 		margin-top: -5px;
		margin: 0px; 
		padding:  0px; 

		font-weight: bold;

	}

	.kop2{

		font-size: 17px;
 		margin-bottom: -5px;
 		margin-top: -5px;
		margin: 0px; 
		padding:  0px; 

		font-weight: bold;

	}

	.kop3{

		font-size: 12px;
 		margin-bottom: -5px;
 		margin-top: -5px;
		margin: 0px; 
		padding:  0px; 

		font-weight: bold;

	}
	.kiri{

		margin-left:  800px;

	}



	.kiri2{

		margin-left:  270px;

	}

	.center{

		text-align: center;

	}

</style>

</head>

<body class="dotted">     

	 <img width="70" height="70" style="float: left; " src="<?php echo '../../assets/image/'.logo(); ?>"  >   

	<div align="center" style="margin-right: 0px; margin-left: -100px;">

		<p class="kop1"><?php echo kop_1(); ?> <br> <?php echo kop_2(); ?></p>
		<p class="kop2"> <?php echo kop_3(); ?> </p>
		<p class="kop3"><?php echo kop_4(); ?></p> 

	</div> 
	<br>
<hr/>
 
 <div align="center"><p><u>LAPORAN DATA PENDUDUK</u></p></div>
<br>
	<table class="table"  >

                    <thead  >

                      <tr  >
 
                        <th  class="th Content center" rowspan="2" width="20" >No Urut</th> 

                        <th  class="th Content center" rowspan="2" width="90">Nomor Kartu Keluarga</th> 
                        <th  class="th Content center" rowspan="2" width="90">Nomor Induk Kependudukan</th> 
                        <th  class="th Content center" rowspan="2" width="220">Nama</th> 
                        <th  class="th Content center" rowspan="2" width="90">Tempat Lahir</th> 
                        <th  class="th Content center" rowspan="2" width="40">Tanggal Lahir</th> 
                        <th  class="th Content center" rowspan="2" >Umur</th> 
                        <th  class="th Content center" rowspan="2" width="30">Status Kawin</th> 
                        <th  class="th Content center" rowspan="2" width="35">Jenis Kelamin</th> 
                        <th  class="th Content center" colspan="3" >Alamat</th>
                        <th  class="th Content center" rowspan="2" >Ket</th> 

                       </tr> 
                       <tr>
                       	<th  class="th Content center" width="190" >Jalan/Dukuh</th>
                       	<th  class="th Content center" >RT</th>
                       	<th  class="th Content center" width="10">RW</th>
                       </tr>
                    </thead>

                    <tbody>
 						<?php
 						$no = 1;
 						$q = mysqli_query($k,"SELECT * FROM v_data_penduduk WHERE rowstatus='1' ORDER BY rw,rt ASC");
 						while ($d = mysqli_fetch_array($q)) {
 							echo "

 							<tr>
 									<td  class='td Content th center'>$no</td>
 									<td  class='td Content th center'>$d[no_kk]</td>
 									<td  class='td Content th center'>$d[no_nik]</td>
 									<td  class='td Content th'>$d[nama_lengkap]</td>
 									<td  class='td Content th'>$d[tempat_lahir]</td>
 									<td  class='td Content th center'>".tgl_gabung($d['tanggal_lahir'])."</td>
 									<td  class='td Content th center'>$d[umur]</td>
 									<td  class='td Content th center' >$d[kawin_singkat]</td>
 									<td  class='td Content th center'>$d[jenis_kelamin]</td>
 									<td  class='td Content th'>$d[alamat_kampung]</td>
 									<td  class='td Content th'>$d[rt]</td>
 									<td  class='td Content th'>$d[rw]</td>
 									<td  class='td Content th'>$d[keterangan]</td>
 								</tr> 				
 											";
 						$no++;
 					}



 						?>
                    </tbody> 

                  </table> 

                  <br>

                  <br> 

                  

</body>

</html> 

<?php

$filename="Data_Penduduk_".date('d-m-Y').".pdf";  

$content = ob_get_clean();

	$content = '<page style="font-family: Arial">'. $content .'</page>';

	require_once('../../assets/html2pdf/html2pdf.class.php');

	try

	{ 

		$html2pdf = new HTML2PDF('L','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));

		$html2pdf->setDefaultFont('Arial');

		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));

		$html2pdf->Output($filename);

	}

	catch(HTML2PDF_exception $e) { echo $e; }

?>

 

				