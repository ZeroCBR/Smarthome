<ul class="nav nav-pills pull-right" id="nav-bar">
	<li <?php if (uri_string()===""||uri_string()==="home")echo "class='active'";?>><a href="<?= site_url("home"); ?>"> Home </a></li>
	<li  <?php if(uri_string()==="home/about")echo "class='active'";?> > <a href="<?= site_url("home/about")?>">about</a> </li>
	<li  <?php if(uri_string()==='account') echo "class='active'"; ?> > <a href="<?= site_url("account"); ?>">Sign in</a></li>
</ul>
<h3 class="text-muted">Smart Home</h3>
