<?php
session_start();
include( '../../config/konek.php' );
include( '../../page/Model/Setting.php' );

include_once( '../../config/fungsi.php' );
require_once __DIR__ . '/../../assets/mpdf/autoload.php';

$data = mysqli_fetch_array( mysqli_query( $k, "SELECT * FROM tb_surat WHERE id_surat=$_GET[id]" ) );
$bio = json_decode( $data[ 'isi_surat' ], true );
$ttd = json_decode( $data[ 'tanda_tangan' ], true );

$mpdf = new \Mpdf\Mpdf( [
    'mode' => 'utf-8',
    'format' => 'A4',
    'margin_left' => 10,
    'margin_right' => 10,
    'margin_top' => 10,
    'margin_bottom' => 10,
    'margin_header' => 10,
    'margin_footer' => 10,
] );

$html = '
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
<body>
    <div class="pagesetup">
        <div style="text-align: center; background: url(\'../../assets/image/' . logo() . '\') no-repeat left top; background-size: 290px 220px;">
        <div align="center" style="display: inline-block; padding-left: 00px;text-align:center;">
            <p class="kop1">' . kop_1() . '<br>' . kop_2() . '</p>
            <p class="kop2">' . kop_3() . '</p>
            <p class="kop3">' . kop_4() .' Parongpong '.kode_desa(). '</p>
        </div>
        <div style="width: 100%;">
        <hr/>
        <br> 
        <p style="font-size: 15px; text-align: center;"><u>' . strtoupper($data['nama_surat']) . '</u></p> 
        <p style="font-size: 13px; text-align: center;">Nomor : ' . $data['no_surat'] . '</p>
        <br>
        <br>
    </div>
    <div style="width: 80%; margin-left: 50px;">
        <p style="text-align: justify;">Yang bertanda tangan dibawah ini, Kepala ' . desa() . ' ' . kecamatan() . ' ' . kabupaten() . ' dengan ini menerangkan bahwa :</p>
        <table style="margin-left: 70px;">
            <tr>
                <td width="160">Nama</td>
                <td>:</td>
                <td>' . $bio['nama'] . '</td>
            </tr>
            <!-- Add the rest of the table rows here -->
        </table>
        <br>
        <p style="text-align: justify;">Nama tersebut di atas benar telah di makamkan pada :</p>
        <table style="margin-left: 70px;">
            <tr>
                <td width="160">Hari, Tanggal Kematian</td>
                <td>:</td>
                <td>' . tanggal_indo(tgl_muter($bio['tgl_kematian'])) . '</td>
            </tr>
            <!-- Add the rest of the table rows here -->
        </table>
        <p style="text-align: justify;">Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
        <br> 
        <br>
        <br>
        <table class="center" border="0" style="margin-left: 400px;">
            <tr>
                <td width="160">Mengetahui</td>
            </tr>
            <tr>
                <td>' . $ttd['head'] . '</td>
            </tr>';
            
if ($ttd['wakilkan'] == 1) {
    $html .= '<tr>
                <td>' . $ttd['jabatan'] . '</td>
            </tr>';
}

$html .= '<tr>
                <td><br><br><br><br></td>
            </tr>
            <tr>
                <td><strong><u>' . $ttd['nama'] . '</u></strong></td>
            </tr>
            <tr>
                <td>NIP/NRPD : ' . $ttd['nip'] . '</td>
            </tr>
        </table>
    </div> 
</body>
</html>';

$mpdf->WriteHTML( $html );
$mpdf->Output( 'SKP_' . $bio['nama'] .'_' . date( 'd-m-Y' ) . '.pdf', 'I' );
?>
