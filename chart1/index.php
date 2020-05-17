<!DOCTYPE html>
<html>
<head>
	<script src="https:cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
	<title>Grafik Harry</title>
</head>
<body>
	<?php 
		$conn=new mysqli('localhost', 'root', '', 'game');
		$sql="select * from peminat";
		$namaGame=$conn->query($sql);
		$jumlahPeminat=$conn->query($sql);

	 ?>





	<div style="height: 75%; width: 75%;">
		<canvas id="myChart" class="chart"></canvas>
	</div>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',

			data: {
				labels: [<?php while($b=mysqli_fetch_array($namaGame)) {echo '"'.$b['namaGame']. '",';} ?>],
				datasets: [{
					label: 'Grafik Data Beberapa Game',
					data: [<?php while($a=mysqli_fetch_array($jumlahPeminat)) {echo $a['jumlahPeminat']. ', ';} ?>],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)',
					],
					borderColor:[
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)',
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		})
	</script>

</body>
</html>