<h2 class="page-header">Register your Team</h2>
<div class="inner_content">
	<form role="form" id="frm_add_team" class="validate_form" action="<?php echo base_url(); ?>fantasy/form_requests/addTeam" method="post">
		<div class="form-group">
			<label for="team_name">Team Name</label>
			<input type="text" class="form-control validate[required]" id="team_name" name="team_name" placeholder="Team Name" data-prompt-position="topLeft">
		</div>
		<button type="submit" class="btn btn-primary">Register</button>
		<a href="<?php echo base_url(); ?>fantasy" class="btn btn-default" role="button">Back</a>
		<input type="hidden" name="manager" value="<?php echo $manager; ?>">
	</form>
</div>