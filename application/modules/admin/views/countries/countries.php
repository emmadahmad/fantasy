<?php if(isset($alert)): ?>
	<div class="alert alert-<?php echo $alert_type; ?>">
		<?php echo $alert_message; ?>
	</div>
<?php endif; ?>
<h2 class="page-header">Countries <small><a href="<?php echo base_url(); ?>admin/countries/add_country"><span class="glyphicon glyphicon-plus-sign"></span> Add New Country</a></small></h2>
<div class="inner_content">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Country Flag</th>				
					<th>Country Id</th>
					<th>Country Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<?php if(!empty($countries)): ?>
				<?php foreach($countries as $cont): ?>
				<tbody>
					<tr>
						<td><?php echo $cont->country_flag; ?></td>
						<td><?php echo $cont->country_id; ?></td>
						<td><?php echo $cont->country_name; ?></td>
						<td><a href="<?php echo base_url(); ?>admin/countries/edit_country/<?php echo $cont->country_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
						<td><a href="<?php echo base_url(); ?>admin/countries/delete_country/<?php echo $cont->country_id; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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