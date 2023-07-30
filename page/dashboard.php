		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
								<h5 class="text-white op-7 mb-2"><?php echo judul(); ?></h5>
							</div> 
							<div class="ml-md-auto py-2 py-md-0"> 
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">
										<h5>Berdasarkan Status Perkawinan</h5> 
									</div>  
										
									<div class="chart-container">
										<canvas id="pieChart" style="width: 50%; height: 50%"></canvas>
 
									</div>  
								</div>
							</div>
						</div>


						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title"> </div> 
										<h5>Berdasarkan Jenis Kelamin</h5> 

									<div class="chart-container">
												<canvas id="totalIncomeChart" style="width: 50%; height: 50%"></canvas> 
									</div>  

								</div>
							</div>
						</div>

					</div> 
				</div>
			</div> 
		 		<script type="text/javascript"> 
		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d'), 
		pieChart = document.getElementById('pieChart').getContext('2d');
		<?php 
		$qjk = mysqli_fetch_array(mysqli_query($k,"SELECT * FROM v_stat_jenkel"));
		$qsk = mysqli_fetch_array(mysqli_query($k,"SELECT * FROM v_stat_perkawinan"));
		?>
		var myPieChart = new Chart(pieChart, {
			type: 'pie',
			data: {
				datasets: [{

					data: [<?php echo $qsk['kawin'].','.$qsk['tidak_kawin'].','.$qsk['janda'].','.$qsk['duda']; ?>],
					backgroundColor :["#4caf50","#2196f3","#ff9800","#ff5722"],
					borderWidth: 0
				}],
				labels: [<?php echo "'Kawin : ".$qsk['kawin']."', 'Tidak Kawin : ".$qsk['tidak_kawin']."','Janda : ".$qsk['janda']."', 'Duda : ".$qsk['duda']."'"; ?>] 
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position : 'bottom',
					labels : {
						fontColor: 'rgb(154, 154, 154)',
						fontSize: 11,
						usePointStyle : true,
						padding: 20
					}
				},
				pieceLabel: {
					render: 'percentage',
					fontColor: 'white',
					fontSize: 14,
				},
				tooltips: false,
				layout: {
					padding: {
						left: 20,
						right: 20,
						top: 20,
						bottom: 20
					}
				}
			}
		})

var mytotalIncomeChart =new Chart(totalIncomeChart, {
  type: 'bar',
  data: {
    labels: [<?php echo "'Laki-laki : ".$qjk['laki']."','Perempuan : ".$qjk['perempuan']."'"; ?>],
    datasets: [{
      data:  [<?php echo $qjk['laki'].','.$qjk['perempuan']; ?>],
      backgroundColor: ["#4caf50","#2196f3"],
      hoverBackgroundColor: ["#4caf50","#2196f3"],
    }]
  },
  			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							min : 0, //this will remove only the label
						},
						gridLines : {
							drawBorder: true,
							display : true
						}
					}],
					xAxes : [ {

						gridLines : {
							drawBorder: true,
							display : true, 
						}
					}]
				},
			} 

  
}); 
		 
 
	</script>
