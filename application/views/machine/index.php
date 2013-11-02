<?php
	$this->load->view('share/_header');
	$this->load->view('share/_login_nav'); 
?>

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
