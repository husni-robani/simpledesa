 
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.3/css/jquery.orgchart.min.css'>

<style>
  #chart-container {
  font-family: Arial;
  height: 420px;
  border: 2px dashed #aaa;
  border-radius: 5px;
  overflow: auto;
  text-align: center;
}

.orgchart {
  background: #fff; 
}
.orgchart td.left, .orgchart td.right, .orgchart td.top {
  border-color: #aaa;
}
.orgchart td>.down {
  background-color: #aaa;
}
.orgchart .biru .title {
  background-color: #006699;
}
.orgchart .biru .content {
  border-color: #006699;
}
.orgchart .hijau .title {
  background-color: #009933;
}
.orgchart .hijau .content {
  border-color: #009933;
}
.orgchart .ungu .title {
  background-color: #993366;
}
.orgchart .ungu .content {
  border-color: #993366;
}
.orgchart .cokelat .title {
  background-color: #996633;
}
.orgchart .cokelat .content {
  border-color: #996633;
}
.orgchart .magenta .title {
  background-color: #cc0066;
}
.orgchart .magenta .content {
  border-color: #cc0066;
}
 
</style>

  <div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="card full-height">
             <div class="card-body">
          <div class="page-header">
            <h4 class="page-title">Struktur Organisasi <?= subjudul(); ?></h4>
            <div class="ml-md-auto py-2 py-md-0"> 
                <a href='?page=perangkat_desa&sub=data' class="btn btn-primary btn-sm "  data-toggle='tooltip' data-original-title='Kelola Data'><i class="fas fa-database"></i> Kelola Data</a>
              </div>
              
          </div>        
<div id="chart-container"></div>
 
                </div>
              </div> 
            </div>
          </div>

        </div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.3/js/jquery.orgchart.min.js'></script>
<?php
$lurah = mysqli_fetch_array(mysqli_query($k, "SELECT a.nama_pegawai, b.`nama` FROM tb_pegawai a LEFT JOIN tb_jabatan b ON a.`jabatan`=b.`id_jabatan` WHERE a.jabatan=1 AND a.rowstatus=1"));
 $x = mysqli_query($k,"SELECT b.*, c.`nama_pegawai`,c.`nip` FROM tb_jabatan a LEFT JOIN tb_jabatan b ON a.`id_jabatan`=b.`id_sub` LEFT JOIN tb_pegawai c ON b.`id_jabatan`=c.`jabatan` WHERE b.`id_jabatan` IS NOT NULL AND b.`id_sub`=1   AND c.rowstatus !=0 ");
 ?>
<script >
	
	'use strict';

(function($){

  $(function() {

    var datascource = {
      'name': '<?= $lurah['nama_pegawai']; ?>',
      'title': '<?= $lurah['nama']; ?>',
      'children': [
        <?php 
        while ($d = mysqli_fetch_array($x)){ 
            echo  "{ 'name': '$d[nama]', 'title': '$d[nama_pegawai]', 'className': '$d[warna]'";
              $x1 = mysqli_query($k,"SELECT b.*, c.`nama_pegawai`,c.`nip` FROM tb_jabatan a LEFT JOIN tb_jabatan b ON a.`id_jabatan`=b.`id_sub` LEFT JOIN tb_pegawai c ON b.`id_jabatan`=c.`jabatan` WHERE b.`id_jabatan` IS NOT NULL AND b.`id_sub`=$d[id_jabatan]  AND c.rowstatus !=0 ");
              if(mysqli_num_rows($x1) > 0){
                echo ",'children': [";
                while ($dx = mysqli_fetch_array($x1)){
                  echo "{ 'name': '$dx[nama]', 'title': '$dx[nama_pegawai]', 'className': '$dx[warna]' 
                ";
                $x2 = mysqli_query($k,"SELECT b.*, c.`nama_pegawai`,c.`nip` FROM tb_jabatan a LEFT JOIN tb_jabatan b ON a.`id_jabatan`=b.`id_sub` LEFT JOIN tb_pegawai c ON b.`id_jabatan`=c.`jabatan` WHERE b.`id_jabatan` IS NOT NULL AND b.`id_sub`=$dx[id_jabatan]  AND c.rowstatus !=0  ");
              if(mysqli_num_rows($x2) > 0){
                echo ",'children': [";
                while ($dx1 = mysqli_fetch_array($x2)){
                  echo "{ 'name': '$dx1[nama]', 'title': '$dx1[nama_pegawai]', 'className': '$dx1[warna]' },
                ";
                }
                echo "],";
              }else{
                echo ","; 
              }
        
           echo "},
           ";
                }
                echo "],";
              }else{
                echo ","; 
              }
        
           echo "},
           ";
          }
        
          ?> 
      ]
    };

    var oc = $('#chart-container').orgchart({
      'data' : datascource,
      'nodeContent': 'title'
    });

  });

})(jQuery);
</script>

</body>
</html>
