<?php $male_selected = ''; $female_selected = '';
if($user->gender == 'Male')
{
	$male_selected = 'selected';
}
else if($user->gender == 'Female')
{
	$female_selected = 'selected';
}
?>

<h2 class="page-header">Update User</h2>
<div class="inner_content">
	<form role="form" id="frm_edit_user" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/updateUser/<?php echo $user->user_id; ?>" method="post">
		<div class="row">
			<div class="col-md-3">
				<label for="user_name">User Name</label>
				<input type="text" class="form-control validate[required]" id="user_name" name="user_name" placeholder="User Name" data-prompt-position="topLeft" value="<?php echo $user->user_name; ?>">
			</div>
			<div class="col-md-2">
				<label for="user_type">User Type</label>
				<?php echo form_dropdown('user_type', $user_types, $user->user_type, 'id="user_type" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
			</div>
			<div class="col-md-3">
				<label for="email">Email</label>
				<input type="email" class="form-control validate[required]" id="email" name="email" placeholder="Email" data-prompt-position="topLeft" value="<?php echo $user->email; ?>">
			</div>
			<div class="col-md-2">
				<label for="country">Country</label>
				<input type="text" class="form-control validate[required]" id="country" name="country" placeholder="Country" data-prompt-position="topLeft" value="<?php echo $user->country; ?>">
			</div>
			<div class="col-md-2">
				<label for="gender">Gender</label>
				<select name="gender" class="form-control validate[required]" data-prompt-position="topLeft">
					<option value='Male' <?php echo $male_selected; ?>>Male</option>
					<option value='Female' <?php echo $female_selected; ?>>Female</option>
				</select>
			</div>			
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Save</button>
				<a href="<?php echo base_url(); ?>admin/users/" class="btn btn-default" role="button">Back</a>
				<input type="hidden" name="user_id" value="<?php echo $user->user_id; ?>">
			</div>
		</div>								
	</form>
</div>