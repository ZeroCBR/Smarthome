<?php
	$this->load->view('share/_header');
?>

<table class="table table-striped">

	<tr>
		<th>Image</th>
		<th>Machine Name</th>
		<th>Annotation</th>
		<th>Create Time</th>
		<th></th>
	</tr>
	<?php
	foreach ($machine_list as $value){
		echo "<tr>
			<td><a href='#'><img src= '".base_url()."assets/image/light.png' class='img-thumbnail machine-icon' /></a></td>
			<td>$value->name</td>
			<td>$value->annotation</td>
			<td>$value->created_time</td>
			<td><a href='#'><img src= '".base_url()."assets/image/add.png' width='35' height='35'/></a></td>
		</tr>";
	}
	?>
</table>
