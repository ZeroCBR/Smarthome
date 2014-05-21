	<div class="col-md-8  col-md-offset-2 container jumbotron noti-tb">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>TITLE</th>
					<th>ANNOTATION</th>
					<th>TIME</th>
					<th>STATUS</th>
				</tr>
			</thead>
			<tbody>
			<?php	
				foreach($noti_list[0] as $noti){
					if($noti->status ==="pending")$sta ="class='warning'";
					elseif($noti->status==="done")$sta ="class='success'";
					echo "
						<tr ".$sta.">
							<td>".$noti->id."</td>
							<td>".$noti->title."</td>
							<td>".$noti->annotation."</td>
							<td>".$noti->deadline."</td>
							<td>".$noti->status."</td>
						</tr>
					";
				}

			?>
			</tbody>
		</table>
	</div>
