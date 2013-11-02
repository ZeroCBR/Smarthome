<?php
	$this->load->view('share/_header');
?>
<div class="container">
	<div class="header">
		
		<?php 
			$this->load->view('share/_topnav'); 
		?>
	</div>	
</div>

<div class="container">
		<?php $this->load->view('machine/add_machine_form')?>
		<div class="btn-group">
			<button class="btn btn-primary" data-toggle='modal' data-target= '#add_machine_modal'  type = "button">
	 		<i class="glyphicon glyphicon-plus"></i>&nbsp Add Machine
			</button>
		</div>
		<?php 
			$this->load->view('machine/list',$machine_list); 
		?>
</div>
