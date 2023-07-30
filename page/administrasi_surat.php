  <div class="main-panel">
      <div class="content">
        <div class="page-inner"> 

          <div class="inbox-head d-lg-flex d-block">

            <h4 class="page-title">Administrasi Surat</h4>
              <?php
                    $cari = $_POST['cari'] ?? '';
                ?>
                <form action="" method="POST" class="ml-auto">
                  <div class="input-group">
                    <input type="text" name="cari" autocomplete="off" value="<?php echo $cari ?>" placeholder="Cari Menu Surat" class="form-control">

                    <div class="input-group-append">
                      <button class="input-group-text"><i class="fa fa-search search-icon"></i></button> 
                    </div>

                  </div>
                </form>

              </div>

 <div class="row">

<?php
$qry = mysqli_query($k,"SELECT * FROM tb_menu_surat WHERE nama_menu LIKE '%$cari%' AND kode > 0");
while ($d = mysqli_fetch_array($qry)) { 
          echo "
    <div class='col-sm-6 col-lg-3'>
          <a href='$d[url]'>

              <div class='card p-3'>
                <div class='d-flex align-items-center'>
                  <span class='stamp stamp-md bg-info mr-3'>
                    <i class='$d[icon]'></i>
                  </span>
                  <div>
                    <h5 class='mb-1'><b>$d[nama_menu] </b></h5> 
                  </div>
                </div>
              </div>  
              </a>
            </div>
          

            ";
          }?>
           

                </div>
              </div>
            </div>
          </div>