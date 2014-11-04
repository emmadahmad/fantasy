<div id="inner_content">
	<form class="form-signin cvalidate_form" role="form" action="<?php echo base_url(); ?>fantasy/form_requests/login" method="post">
	<?php if(isset($alert)): ?>
		<div class="alert alert-<?php echo $alert_type; ?>">
			<?php echo $alert_message; ?>
		</div>
	<?php endif; ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" name="email" class="form-control first" placeholder="Email address" required="" autofocus="">
        <input type="password" name="password" class="form-control last" placeholder="Password" required="">
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
</div>