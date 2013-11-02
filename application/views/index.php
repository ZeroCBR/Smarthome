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
	<?php $this->load->view('account/register')?>
</div>
