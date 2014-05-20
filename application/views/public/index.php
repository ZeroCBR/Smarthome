<?php $this->load->view("share/_header")?>
<body class="main" style="overflow:hidden;">
<div class="shadow-div">
        <div class="top">
		<?php $this->load->view("share/_topnav");?>	
	</div>
	
	<div class="content">
		<?php $this->load->view($load_page);?>
	</div>
	
</div>

</body>
