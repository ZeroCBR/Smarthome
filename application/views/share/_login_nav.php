<?php $this->load->view("share/_header")?>
<div class="container">
        <div class="header">
		<ul class="nav nav-pills pull-right" id="nav-bar">
			<li <?php if (uri_string()===""||uri_string()==="home")echo "class='active'";?>><a href='<?=site_url("machine/")?>'>Machines</a></li>
			<li  <?php if(uri_string()==="home/about")echo "class='active'";?> > <a href="<?= site_url("account/usr_info")?>">Me</a> </li>
   			<li  <?php if(uri_string()==='account') echo "class='active'"; ?> > <a href="<?= site_url("account/logout"); ?>">Sign Out</a></li>
		</ul>
		<h3 class="text-muted">Smart Home</h3>
	</div>
</div>
