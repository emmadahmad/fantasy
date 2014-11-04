<?php if(isset($alert)): ?>
	<div class="alert alert-<?php echo $alert_type; ?>">
		<?php echo $alert_message; ?>
	</div>
<?php endif; ?>
<h2 class="page-header">Users <small><a href="<?php echo base_url(); ?>admin/users/add_user"><span class="glyphicon glyphicon-plus-sign"></span> Add New User</a></small></h2>
<div class="inner_content">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>User Name</th>
					<th>User Email</th>
					<th>User Type</th>
					<th>Country</th>
					<th>Gender</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<?php if(!empty($users)): ?>
				<?php foreach($users as $cont): ?>
				<tbody>
					<tr>
						<td><?php echo $cont->user_name; ?></td>
						<td><?php echo $cont->email; ?></td>
						<td><?php echo $cont->type_name; ?></td>
						<td><?php echo $cont->country; ?></td>
						<td><?php echo $cont->gender; ?></td>
						<td><a href="<?php echo base_url(); ?>admin/users/edit_user/<?php echo $cont->user_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
						<td><a href="<?php echo base_url(); ?>admin/users/delete_user/<?php echo $cont->user_id; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
					</tr>
				</tbody>			
				<?php endforeach; ?>
			<?php else: ?>
				<tbody>
					<tr>
						<td colspan="5" class="text-center">No Data Available</td>
					</tr>
				</tbody>
			<?php endif; ?>

		</table>
	</div>
</div>