	<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
				
					<ul class="nav nav-primary">
						<li class="nav-item <?php echo active("dashboard"); ?>">
							<a  href="?page=dashboard" >
								<i class="fas fa-chart-bar"></i>
								<p>Dashboard</p> 
							</a> 
						</li>  
						<?php $sub = 'data'; 
					if($_SESSION['role']=='Admin' || $_SESSION['role']=='KepDes'){ ?>

					<li class="nav-item  <?php echo expand($sub); ?>" >
							<a data-toggle="collapse" href="#<?php echo $sub; ?>" aria-expanded="false" >
								<i class=" fas fa-database"></i>
								<p>Master Data</p>
								<span class="caret"></span>
							</a>

							<div class="collapse <?php  echo show($sub);?>" id="<?php echo $sub; ?>" style="">
								<ul class="nav nav-collapse"> 
									<!--  -->
									<li class='<?php echo active('data_penduduk'); ?>'>
										<a href="?page=data_penduduk&sub=<?php echo $sub; ?>">
											<span class="sub-item">Data Penduduk</span>
										</a>
									</li>
									<!--  --> 
									<!--  -->
									<li class='<?php echo active('struktur_desa'); ?>'>
										<a href="?page=struktur_desa&sub=<?php echo $sub; ?>">
											<span class="sub-item">Struktur Desa</span>
										</a>
									</li>
									<!--  -->
									<!--  -->
									<li class='<?php echo active('perangkat_desa'); ?>'>
										<a href="?page=perangkat_desa&sub=<?php echo $sub; ?>">
											<span class="sub-item">Perangkat Desa</span>
										</a>
									</li>
									<!--  -->
								 
								</ul>
							</div>
						</li>
					<?php } ?>

  				 
					<li class="nav-item  <?php echo active("administrasi_surat"); ?>" >
							<a href="?page=administrasi_surat"  >
								<i class="fas fa-envelope"></i>
								<p>Administrasi Surat</p> 
								<span class="badge badge-info"><?php echo jumlah_surat(); ?></span>
							</a> 
						</li>   

				<?php	if($_SESSION['role']=='Admin' || $_SESSION['role']=='KepDes'){ ?>

					<li class="nav-item  <?php echo active("pengguna"); ?>" >
							<a href="?page=pengguna"  >
								<i class="fas fa-users-cog"></i>
								<p>Pengguna</p>  
							</a> 
						</li>   
					<?php
					}
					if($_SESSION['role']=='Admin'){ ?>
					<li class="nav-item  <?php echo active("pengaturan"); ?>" >
							<a href="?page=pengaturan"  >
								<i class="fas fa-cogs"></i>
								<p>Pengaturan</p>  
							</a> 
						</li> 
					<?php } ?>


					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
