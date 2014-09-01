<?php if(isset($alert)): ?>
	<div class="alert alert-<?php echo $alert_type; ?>">
		<?php echo $alert_message; ?>
	</div>
<?php endif; ?>
<h2 class="page-header">Players <small><a href="<?php echo base_url(); ?>admin/players/add_player"><span class="glyphicon glyphicon-plus-sign"></span> Add New Player</a></small></h2>
<div class="inner_content">
	<select id="select_country" name="select_country" class="form-control">
		<option value="0">All Countries</option>
		<?php foreach($countries as $cont): ?>
		<option value="<?php echo $cont->country_id ?>"><?php echo $cont->country_name ?></option>
		<?php endforeach; ?>
	</select><br/>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Player Name</th>				
					<th>Country</th>
					<th>Type</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody id="player_table_body">
			<?php if(!empty($players)): ?>
				<?php foreach($players as $cont): ?>				
				<tr>
					<td><a href="<?php echo base_url(); ?>admin/players/view_player/<?php echo $cont->player_id; ?>"><?php echo $cont->player_name; ?></a></td>
					<td><?php echo $cont->country_name; ?></td>
					<td><?php echo $cont->type_name; ?></td>
					<td><a href="<?php echo base_url(); ?>admin/players/edit_player/<?php echo $cont->player_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
					<td><a href="<?php echo base_url(); ?>admin/deletePlayer/<?php echo $cont->player_id; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>							
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="5" class="text-center">No Data Available</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>