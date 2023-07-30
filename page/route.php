<?php 
$pathAdm = 'AdmSurat';
if(isset($_GET["page"]))

{

    switch($_GET["page"])

    { 

        case "administrasi_surat"; include "administrasi_surat.php"; break;  
        case "data_penduduk"; include "data_penduduk.php"; break;   
        case "add_data_penduduk"; include "add_data_penduduk.php"; break; 
        case "update_data_penduduk"; include "update_data_penduduk.php"; break; 
        case "dashboard"; include "dashboard.php"; break;    
        case "pengaturan"; include "setting/pengaturan.php"; break;    
        case "pengguna"; include "setting/pengguna.php"; break;    
        case 'struktur_desa'; include 'orgChart.php'; break;
        case 'perangkat_desa'; include 'perangkat_desa.php'; break;
        // ADMINISTRASI SURAT
        case "$_GET[page]"; include "$pathAdm/$_GET[page].php"; break;   
        
    }
}else{ 
    include "dashboard.php";
}