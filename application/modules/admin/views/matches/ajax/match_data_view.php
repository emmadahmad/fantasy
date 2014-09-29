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