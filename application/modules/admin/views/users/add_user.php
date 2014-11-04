<h2 class="page-header">Add User</h2>
<div class="inner_content">
	<form role="form" id="frm_add_user" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/addUser" method="post">
		<div class="row">
			<div class="col-md-2">
				<label for="user_name">User Name</label>
				<input type="text" class="form-control validate[required]" id="user_name" name="user_name" placeholder="User Name" data-prompt-position="topLeft">
			</div>
			<div class="col-md-2">
				<label for="user_type">User Type</label>
				<?php echo form_dropdown('user_type', $user_types, 0, 'id="user_type" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
			</div>
			<div class="col-md-2">
				<label for="email">Email</label>
				<input type="email" class="form-control validate[required]" id="email" name="email" placeholder="Email" data-prompt-position="topLeft">
			</div>
			<div class="col-md-2">
				<label for="password">Password</label>
				<input type="text" class="form-control validate[required]" id="password" name="password" placeholder="Password" data-prompt-position="topLeft">
			</div>
			<div class="col-md-2">
				<label for="country">Country</label>
				<input type="text" class="form-control validate[required]" id="country" name="country" placeholder="Country" data-prompt-position="topLeft">
			</div>
			<div class="col-md-2">
				<label for="gender">Gender</label>
				<select name="gender" class="form-control validate[required]" data-prompt-position="topLeft">
					<option value='Male'>Male</option>
					<option value='Female'>Female</option>
				</select>
			</div>			
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Save</button>
				<a href="<?php echo base_url(); ?>admin/users/" class="btn btn-default" role="button">Back</a>
			</div>
		</div>								
	</form>
</div>