<div id="inner_content">
	<form class="form-signin cvalidate_form" role="form" action="<?php echo base_url(); ?>fantasy/form_requests/signup" method="post">
	<?php if(isset($alert)): ?>
		<div class="alert alert-<?php echo $alert_type; ?>">
			<?php echo $alert_message; ?>
		</div>
	<?php endif; ?>
        <h2 class="form-signin-heading">Register</h2>
        <input type="email" name="email" class="form-control first" placeholder="Email address" required="" autofocus="">
        <input type="text" name="user_name" class="form-control middle" placeholder="Name" required="" >
        <input type="text" name="country" class="form-control middle" placeholder="Country" required="" >
        <input type="password" name="password" class="form-control middle" placeholder="Password" required="">
        <input type="password" name="confirm_password" class="form-control last" placeholder="Confirm Password" required="">
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
      </form>
</div>