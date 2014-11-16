<?php if(isset($alert)): ?>
	<div class="alert alert-<?php echo $alert_type; ?>">
		<?php echo $alert_message; ?>
	</div>
<?php endif; ?>
<h2 class="page-header">Point Rules <small><a href="<?php echo base_url(); ?>admin/point_rules/edit_point_rules"><span class="glyphicon glyphicon-pencil"></span> Edit Point Rules</a></small></h2>
<div class="inner_content">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Rules</th>
					<th>Points</th>
				</tr>
			</thead>
			<?php if(!empty($rules)): ?>
				<?php foreach($rules as $cont): ?>
					<?php if($cont->rule_name != 'bat_econ' && $cont->rule_name != 'bowl_econ'): ?>
					<tbody>
						<tr>
							<td><?php echo $cont->rule_description; ?></td>
							<td><?php echo $cont->rule_points; ?></td>
						</tr>
					</tbody>
					<?php endif; ?>			
				<?php endforeach; ?>
			<?php else: ?>
				<tbody>
					<tr>
						<td colspan="2" class="text-center">No Data Available</td>
					</tr>
				</tbody>
			<?php endif; ?>
		</table>
		<h3>Batting Run Rates</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Run rate bonus (for players scoring <?php echo $rules[6]->rule_points; ?> runs or more or facing <?php echo $rules[7]->rule_points; ?> balls or more)</th>
					<th>Points</th>
				</tr>
			</thead>
			<?php if(!empty($rules)): ?>
				<?php foreach($rules as $cont): ?>
					<?php if($cont->rule_name == 'bat_econ'): ?>
					<tbody>
						<tr>
							<td>Between <?php echo $cont->rule_val1; ?>
								<?php if($cont->rule_val2 == 0.00) : ?> 
									onwards 
								<?php else: ?>
									and <?php echo $cont->rule_val2; ?> runs per 100 balls
								<?php endif; ?>
							</td>
							<td><?php echo $cont->rule_points; ?></td>
						</tr>
					</tbody>
					<?php endif; ?>			
				<?php endforeach; ?>
			<?php else: ?>
				<tbody>
					<tr>
						<td colspan="2" class="text-center">No Data Available</td>
					</tr>
				</tbody>
			<?php endif; ?>
		</table>
		<h3>Bowling Economy</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Run rate bonus (for players scoring <?php echo $rules[6]->rule_points; ?> runs or more or facing <?php echo $rules[7]->rule_points; ?> balls or more)</th>
					<th>Points</th>
				</tr>
			</thead>
			<?php if(!empty($rules)): ?>
				<?php foreach($rules as $cont): ?>
					<?php if($cont->rule_name == 'bowl_econ'): ?>
					<tbody>
						<tr>
							<td>Between <?php echo $cont->rule_val1; ?>
								<?php if($cont->rule_val2 == 0.00) : ?> 
									runs per over and over 
								<?php else: ?>
									and <?php echo $cont->rule_val2; ?> runs per over
								<?php endif; ?>
							</td>
							<td><?php echo $cont->rule_points; ?></td>
						</tr>
					</tbody>
					<?php endif; ?>			
				<?php endforeach; ?>
			<?php else: ?>
				<tbody>
					<tr>
						<td colspan="2" class="text-center">No Data Available</td>
					</tr>
				</tbody>
			<?php endif; ?>
		</table>
	</div>
</div>