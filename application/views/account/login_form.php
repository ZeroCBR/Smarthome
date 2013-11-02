<div class="container">
	<div class="col-md-4">
		<form class="form-signin" action='<?= site_url('account/login') ?>' method="post">
			<h2 class="form-signin-heading">Sign in</h2>
			<input type="text" name="email" class="form-control" placeholder="Email">
			<input type="password" name="password" class="form-control" placeholder="Password">
			<label class="checkbox">
				<input type="checkbox" value="remember me">Remember Me
			</label>
			<button type="submit" class="btn btn-primary btn-lg">Sign in</button>
		</form>
	</div>
</div>
