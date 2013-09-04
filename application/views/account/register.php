<div class="col-md-6">
<form  class = "form-horizontal" role="form" action = "<?= site_url('account/register'); ?>" method = "post">
	
	<div class = "form-group">
		<label for ="email" class = "col-lg-2 control-label">Email</label>
		<div class="col-lg-8">
			<input name = "email" type = "text" placeholder="Your Email" class="form-control">
		</div>
	</div>

	<div class = "form-group">
		<label for = "username" class="col-lg-2 control-label">Username</label>
		<div class="col-lg-8">
                	<input name = "username" type = "text" placeholder="Pick up a Username" class="form-control">
     		</div>
        </div>

	<div class = "form-group">
		<label for = "password" class = "col-lg-2 control-label">Password</label>
                <div class="col-lg-8">
			<input name = "password" type = "password" placeholder="More than 6 digits" class="form-control">
		</div>
        </div>	

	<div class = "col-lg-offset-6">	       
		<button type = "submit"  class="btn btn-primary btn-lg register-btn" > Sign Up</button>	
	</div>
</form>
</div>
