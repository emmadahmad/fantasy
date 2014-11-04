<?php if(isset($alert)): ?>
	<div class="alert alert-<?php echo $alert_type; ?>">
		<?php echo $alert_message; ?>
	</div>
<?php endif; ?>
<h2 class="page-header">Teams</h2>
<div class="inner_content">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Team Name</th>				
					<th>Manager</th>
					<th>Country</th>
					<th>Points</th>
					<th>Team Cash</th>
				</tr>
			</thead>
			<?php if(!empty($teams)): ?>
				<?php foreach($teams as $cont): ?>
				<tbody>
					<tr>
						<td><?php echo $cont->team_name; ?></td>
						<td><?php echo $cont->user_name; ?></td>
						<td><?php echo $cont->country; ?></td>
						<td><?php echo $cont->points; ?></td>
						<td><?php echo $cont->cash; ?></td>
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