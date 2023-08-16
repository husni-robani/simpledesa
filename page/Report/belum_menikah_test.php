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
        <p style="text-align: justify; text-indent: 0;">Yang bertanda tangan dibawah ini, Kepala ' . desa() . ' ' . kecamatan() . ' ' . kabupaten() . ' dengan ini menerangkan bahwa:</p>
        <table style="margin-left: 70px;">
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>' . $bio['nik'] . '</td>
            </tr>
            <tr>
                <td width="160">Nama</td>
                <td>:</td>
                <td>' . $bio['nama'] . '</td>
            </tr>
            <tr>
                <td>Tempat/Tanggal Lahir</td>
                <td>:</td>
                <td>' . $bio['tempat_lahir'] . ', ' . tgl_indo(tgl_muter($bio['tgl_lahir'])) . '</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>' . $bio['jenis_kelamin'] . '</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>' . $bio['agama'] . '</td>
            </tr>
            <tr>
                <td>Status Perkawinan</td>
                <td>:</td>
                <td>' . $bio['perkawinan'] . '</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>' . $bio['pekerjaan'] . '</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>' . $bio['alamat'] . ' RT/RW ' . $bio['rt'] . '/' . $bio['rw'] . ' ' . desa() . '</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>' . kecamatan() . ' ' . kabupaten() . '</td>
            </tr>
        </table>
        <br>
        <p style="text-align: justify; text-indent: 45px;">Benar nama tersebut di atas adalah penduduk ' . desa() . ' ' . kecamatan() . ' ' . kabupaten() . ', dan sepanjang pengetahuan kami, serta catatan yang ada pada kami bahwa yang bersangkutan belum pernah menikah.</p>
        <p style="text-align: justify; text-indent: 45px;">Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
        <br>
        <br>
        <br>
        <br>
        <table style="border: none; margin-left: 400px;">
            <tr>
                <td style="width: 160px;">Mengetahui</td>
            </tr>
            <tr>
                <td>' . $ttd['head'] . '</td>
            </tr>
            ' . (($ttd['wakilkan'] == 1) ? '<tr><td>' . $ttd['jabatan'] . '</td></tr>' : '') . '
            <tr>
                <td style="padding-top: 4em;">' . (($ttd['nama']) ? '<strong><u>' . $ttd['nama'] . '</u></strong>' : '') . '</td>
            </tr>
            <tr>
                <td>NIP/NRPD : ' . $ttd['nip'] . '</td>
            </tr>
        </table>
    </div>
</body>
</html>';

$mpdf->WriteHTML( $html );
$mpdf->Output( 'SKBPM_'. $bio['nama'] .'_' . date( 'd-m-Y' ) . '.pdf', 'I' );
?>
