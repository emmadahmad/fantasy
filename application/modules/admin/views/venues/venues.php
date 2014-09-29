<?php if(isset($alert)): ?>
	<div class="alert alert-<?php echo $alert_type; ?>">
		<?php echo $alert_message; ?>
	</div>
<?php endif; ?>
<h2 class="page-header">Venues <small><a href="<?php echo base_url(); ?>admin/venues/add_venue"><span class="glyphicon glyphicon-plus-sign"></span> Add New Venue</a></small></h2>
<div class="inner_content">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Venue Name</th>
					<th>Venue City</th>
					<th>Venue Capacity</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<?php if(!empty($venues)): ?>
				<?php foreach($venues as $cont): ?>
				<tbody>
					<tr>
						<td><?php echo $cont->venue_name; ?></td>
						<td><?php echo $cont->venue_city; ?></td>
						<td><?php echo $cont->venue_capacity; ?></td>
						<td><a href="<?php echo base_url(); ?>admin/venues/edit_venue/<?php echo $cont->venue_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
						<td><a href="<?php echo base_url(); ?>admin/venues/delete_venue/<?php echo $cont->venue_id; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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