<div class="top-nav">
	<ul class="nav nav-pills pull-right" id="nav-bar">
		<li <?php if (preg_match('/machine$/',uri_string(),$matches) || preg_match('/machine\/manager_tag/',uri_string(),$matches)) echo "class='active'";?>><a href="<?= site_url("machine"); ?>">Machines</a></li>
		<li <?php if(uri_string()==="machine/noti")echo "class='active'";?> > <a href="<?= site_url("machine/noti")?>">Notification</a> </li>
		<li> <a href="<?= site_url(""); ?>">Sign out</a></li>
	</ul>
	<span class="text-muted"><a href='<?=site_url('machine/statistics')?>'><img src='<?= base_url()."assets/image/LOGOTANG.png"?>' width="200px"></a></span>
</div>
