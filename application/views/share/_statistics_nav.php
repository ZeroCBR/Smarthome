<div class="left-nav container col-md-5">
	<div class="st-intro">
		<img src='<?= base_url()."assets/image/barchart.png"?>' width="100px" height="100px"></img>
		<span class="nav-subheader"><p>STATISTICS</p></span>
		<span class="nav-intro"><p> ACCURACY  PERCPTUAL </p></span>
	</div>
</div>
<div class="gra container col-md-7">
		<div class="jumbotron">
			<h2>Your Machine</h2>
			<p><canvas id="myChart" width="500" height="250"></canvas></h2>
		</div>
</div>
<script type="text/javascript">
<?php
	if(count($result)){
		$data_str ="labels:[";
		foreach($result as $key => $task_count){
			$data_str = $data_str."'".$key."',";	
		}
		$data_str = substr($data_str,0,-1);
		$data_str = $data_str."],datasets:[{fillColor : 'rgba(151,187,205,0.5)',
					strokeColor : 'rgba(220,220,220,1)',
					data : [";
		foreach($result as $key => $task_count){
			$data_str = $data_str.$task_count.",";
		}
		$data_str = substr($data_str,0,-1);
		$data_str = $data_str."]}]";
		echo  "var data = {".$data_str."}	
			var ctx = $('#myChart').get(0).getContext('2d');
			var myNewChart = new Chart(ctx).Bar(data);
			
		";
	}
	
?>
</script>
