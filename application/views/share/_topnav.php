<div class="top-nav">
	<ul class="nav nav-pills pull-right" id="nav-bar">
		<li <?php if (uri_string()===""||uri_string()==="home")echo "class='active'";?>><a href="<?= site_url("machine"); ?>">Machines</a></li>
		<li <?php if(uri_string()==="home/about")echo "class='active'";?> > <a href="<?= site_url("")?>">Notification</a> </li>
		<li <?php if(uri_string()==='account') echo "class='active'"; ?> > <a href="<?= site_url(""); ?>">Sign out</a></li>
	</ul>
	<span class="text-muted"><a href='<?=site_url('machine/statistics')?>'><img src='<?= base_url()."assets/image/LOGOTANG.png"?>' width="200px"></a></span>
</div>
