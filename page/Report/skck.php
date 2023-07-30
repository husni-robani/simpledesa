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

<title>CETAK SURAT</title> 

 <style type="text/css">  	


 	.pagesetup{
 		padding: 0.5cm 0.5cm 0.5cm 0.5cm;
 	}
 

	.hed{

		font-size: 10px;

		font-weight: bold;

		line-height: 13px;

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

	p{

		font-size: 14px; 
		margin-left: 0px;  
		color: black;

	}

	.kop1{

		font-size: 20px; 
		margin: 2px; 
		padding:  0px;  
 		font-weight: bold;

	}

	.kop2{
		font-weight: 800;
		font-size: 24px; 
		margin: 2px; 
		padding:  0px;    
		font-weight: bold;

	}

	.kop3{

		font-size: 12px; 
		margin: 0px; 
		padding:  0px;  

	} 

	.center{

		text-align: center;

	} 
.judul{

		font-size: 15px; 
		margin: 1px; 
		padding:  0px;  
 		font-weight: bold;

}
.nomor{
		font-size: 13px; 
		margin: 1px; 
		padding:  0px;   
}
.isi{ 
	text-align: justify;  
	text-indent: 45px;
	line-height: 1.5;
	font-size: 14px;
}
</style>

</head>

<body >
	<?php
	$data = mysqli_fetch_array(mysqli_query($k,"SELECT * FROM tb_surat WHERE id_surat=$_GET[id]"));

	$bio = json_dec($data['isi_surat']);
	$ttd = json_dec($data['tanda_tangan']);
	?>
	 <div class="pagesetup">     
	 <img width="70" height="70" style="float: left; " src="<?php echo '../../assets/image/'.logo(); ?>"  >   

	<div align="center" style="margin-right: 0px; margin-left: -200px;">

		<p class="kop1"><?php echo kop_1(); ?> <br> <?php echo kop_2(); ?></p>
		<p class="kop2"> <?php echo kop_3(); ?> </p>
		<p class="kop3"><?php echo kop_4(); ?></p> 

	</div>  
  	<div  style="width: 90%;" >
  		<hr/>
  		<br> 
  		<p class="judul center"><u><?php echo strtoupper($data['nama_surat']); ?></u></p> 
  		<p class="nomor center">Nomor : <?php echo $data['no_surat']; ?></p>
  		<br>
  		<br>
  	</div>

  	<div style="width: 80%; margin-left: 50px;"  >
  		<p class="isi">Yang bertanda tangan dibawah ini, Kepala <?php echo  desa().' '.kecamatan().' '.kabupaten(); ?>  dengan ini menerangkan bahwa :</p>

  		<table   style="  margin-left: 70px;" >			

  				<tr>
  					<td>NIK</td>
  					<td>:</td>
  					<td><?php echo $bio['nik']; ?> </td>
  				</tr>
  				<tr>
  					<td width="160">Nama</td>
  					<td>:</td>
  					<td><?php echo $bio['nama']; ?></td>
  				</tr>

  				<tr>
  					<td>Tempat/Tanggal Lahir</td>
  					<td>:</td>
  					<td><?php echo $bio['tempat_lahir'].', '.tgl_indo(tgl_muter($bio['tgl_lahir']));?> </td>
  				</tr>

  				<tr>
  					<td>Jenis Kelamin</td>
  					<td>:</td>
  					<td><?php echo $bio['jenis_kelamin']; ?> </td>
  				</tr>

          <tr>
            <td>Agama</td>
            <td>:</td>
            <td><?php echo $bio['agama']; ?> </td>
          </tr>  
          <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td><?php echo $bio['pekerjaan']; ?> </td>
          </tr>  	
  				<tr>
  					<td>Status Perkawinan</td>
  					<td>:</td>
  					<td><?php echo $bio['perkawinan']; ?> </td>
  				</tr> 

  				<tr>
  					<td>Kewarganegaraan</td>
  					<td>:</td>
  					<td><?php echo $bio['warga']; ?> </td>
  				</tr> 

  				<tr>
  					<td>Alamat</td>
  					<td>:</td>
  					<td><?php echo $bio['alamat'].' RT/RW '.$bio['rt'].'/'.$bio['rw'].' '. desa(); ?> </td>
  				</tr> 
  				 <tr>
            <td></td>    
            <td></td>    
            <td><?php echo  kecamatan().' '.kabupaten(); ?></td>    
           </tr>
          
  		</table>
  		<br>
  		<p class="isi">Benar nama tersebut di atas adalah penduduk <?php echo  desa().' '.kecamatan().' '.kabupaten(); ?>, berdasarkan data serta pengetahuan kami bahwa nama tersebut : </p>  
        <p  style="margin-left: 45px">
          <?php echo  nl2br($bio['kelakuan']); ?>
        </p> 
        <p class="isi" >Surat keterangan ini dibuat dan diberikan untuk mendapatkan rekomendasi dari Kapolsek <?php echo kecamatan(); ?> dan untuk keperluan <?php echo $bio['keperluan'].'.'; ?></p>
  		<p class="isi">Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>

  		<br> 
  		<br>
  		<br>

  		<table class="center"  border="0" style="  margin-left: 400px;" >
  				<tr>
  					<td width="160">Mengetahui</td>  
  				</tr> 
  				<tr>
  					<td><?php echo $ttd['head']; ?></td>  
  				</tr>  
  				<?php
  				if ($ttd['wakilkan']==1) { 
  					echo "
  				<tr>
  					<td>$ttd[jabatan]</td>  
  				</tr>  ";
  				}?>

  				<tr>
  					<td><br><br><br><br></td>  
  				</tr>  
				<tr>
  					<td  ><strong><u><?php echo $ttd['nama']; ?></u></strong></td>  
  				</tr>  
				<tr>
  					<td>NIP/NRPD : <?php echo $ttd['nip']; ?></td>  
  				</tr>  

  		</table> 
  	</div> 
</div>
                  

</body>

</html> 
 
<?php

$filename="SKKB_".date('d-m-Y').".pdf";  

$content = ob_get_clean();

	$content = '<page style="font-family: Arial">'. $content .'</page>';

	require_once('../../assets/html2pdf/html2pdf.class.php');

	try

	{ 

		$html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(12, 10, 12, 12));

		$html2pdf->setDefaultFont('Arial');

		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));

		$html2pdf->Output($filename);

	}

	catch(HTML2PDF_exception $e) { echo $e; }

?>

 

				