<?php if(!empty($players)): ?>
	<?php foreach($players as $cont): ?>	
	<tr>
		<td><a href="#"><?php echo $cont->player_name; ?></a></td>
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