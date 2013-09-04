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
	<?php
		if(isset($addr))
			$this->load->view($addr); 
		else
			echo uri_string();
	?>
</div>
