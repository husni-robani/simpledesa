<?php
session_start();
include( '../../page/Model/Setting.php' );
include_once( '../../config/fungsi.php' );
include( '../../config/konek.php' );
$conn = mysqli_connect( 'localhost', 'root', '', 'karyawangi' );
require_once __DIR__ . '/../../assets/mpdf/autoload.php';

$penduduk = mysqli_query( $conn, "SELECT * FROM v_data_penduduk WHERE rowstatus='1' ORDER BY rw,rt ASC" );

$mpdf = new \Mpdf\Mpdf( [
    'mode' => 'utf-8',
    'format' => 'A4-L', // Set paper size to landscape ( A4-L )
    'margin_left' => 10,
    'margin_right' => 10,
    'margin_top' => 20,
    'margin_bottom' => 20,
    'margin_header' => 10,
    'margin_footer' => 10,
] );
$html = '<!DOCTYPE html>
      <html lang="en">
      <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

	   <div style="text-align: center; background: url(\'../../assets/image/' . logo() . '\') no-repeat left top; background-size: 290px 220px;">
        <div align="center" style="display: inline-block; padding-left: 80px;text-align:center;">
            <p class="kop1">' . kop_1() . '<br>' . kop_2() . '</p>
            <p class="kop2">' . kop_3() . '</p>
            <p class="kop3">' . kop_4() .' Parongpong '.kode_desa(). '</p>
        </div>
    </div>

</div>
<br>
<hr/>

<div align = "center"><p><u>LAPORAN DATA PENDUDUK</u></p></div>
<br>
<table class = "table"  >

<thead>
<tr>

<th  class = "th Content center" rowspan = "2" width = "20" >No Urut</th>

<th  class = "th Content center" rowspan = "2" width = "90">Nomor Kartu Keluarga</th>
<th  class = "th Content center" rowspan = "2" width = "90">Nomor Induk Kependudukan</th>
<th  class = "th Content center" rowspan = "2" width = "220">Nama</th>
<th  class = "th Content center" rowspan = "2" width = "90">Tempat Lahir</th>
<th  class = "th Content center" rowspan = "2" width = "40">Tanggal Lahir</th>
<th  class = "th Content center" rowspan = "2" >Umur</th>
<th  class = "th Content center" rowspan = "2" width = "30">Status Kawin</th>
<th  class = "th Content center" rowspan = "2" width = "35">Jenis Kelamin</th>
<th  class = "th Content center" colspan = "3" >Alamat</th>
<th  class = "th Content center" rowspan = "2" >Ket</th>

</tr>
<tr>
<th  class = "th Content center" width = "190" >Jalan/Dukuh</th>
<th  class = "th Content center" >RT</th>
<th  class = "th Content center" width = "10">RW</th>
</tr>
</thead>';

$i = 1;
foreach ( $penduduk as $row ) {
    $html .= '<tbody>
        <tr>
        <td class="td Content th center">' . $i++ . '</td>
        <td class="td Content th center">' . $row[ 'no_kk' ] . '</td>
        <td class="td Content th center">' . $row[ 'no_nik' ] . '</td>
        <td class="td Content th">' . $row[ 'nama_lengkap' ] . '</td>
        <td class="td Content th">' . $row[ 'tempat_lahir' ] . '</td>
        <td class="td Content th center">' . tgl_gabung( $row[ 'tanggal_lahir' ] ) . '</td>
        <td class="td Content th center">' . $row[ 'umur' ] . '</td>
        <td class="td Content th center">' . $row[ 'kawin_singkat' ] . '</td>
        <td class="td Content th center">' . $row[ 'jenis_kelamin' ] . '</td>
        <td class="td Content th">' . $row[ 'alamat_kampung' ] . '</td>
        <td class="td Content th">' . $row[ 'rt' ] . '</td>
        <td class="td Content th">' . $row[ 'rw' ] . '</td>
        <td class="td Content th">' . $row[ 'keterangan' ] . '</td>
        </tr>
        </tbody>';
}

$html .=   '</table>
<br><br><br>
<hr/>
<br>
<div style="text-align: right; padding-right: 10px;">
        <p>Bandung, <span>'.date( 'l, d-m-Y' ).'</span></p><br><br><br><br>
        <p  style="text-align: right; padding-right: 23px;"><u>Dadang Sudayat., S.E</u></p>
    </div>
  </body>
  </html>';

$mpdf->WriteHTML( $html );
$mpdf->Output( 'Data-History.pdf', 'I' );
?>