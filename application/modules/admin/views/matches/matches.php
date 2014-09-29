<?php if(isset($alert)): ?>
	<div class="alert alert-<?php echo $alert_type; ?>">
		<?php echo $alert_message; ?>
	</div>
<?php endif; ?>
<h2 class="page-header">Matches <small><a href="<?php echo base_url(); ?>admin/matches/add_match"><span class="glyphicon glyphicon-plus-sign"></span> Add New Match</a></small></h2>
<div class="inner_content">
	<select id="select_country_matches" name="select_country" class="form-control">
		<option value="0">All Countries</option>
		<?php foreach($countries as $cont): ?>
		<option value="<?php echo $cont->country_id ?>"><?php echo $cont->country_name ?></option>
		<?php endforeach; ?>
	</select><br/>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Match</th>				
					<th>Venue</th>
					<th>Date</th>
					<th>Time</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody id="match_table_body">
			<?php if(!empty($matches)): ?>
				<?php foreach($matches as $cont): ?>				
				<tr>
					<td><a href="<?php echo base_url(); ?>admin/matches/view_match/<?php echo $cont->match_id; ?>"><?php echo $cont->home; ?> vs <?php echo $cont->away; ?></a></td>
					<td><?php echo $cont->venue_name; ?></td>
					<td><?php echo format_date($cont->match_date); ?></td>
					<td><?php echo format_date($cont->match_date , TIME); ?></td>
					<td><a href="<?php echo base_url(); ?>admin/matches/edit_match/<?php echo $cont->match_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
					<td><a href="<?php echo base_url(); ?>admin/matches/delete_match/<?php echo $cont->match_id; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>							
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="6" class="text-center">No Data Available</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>