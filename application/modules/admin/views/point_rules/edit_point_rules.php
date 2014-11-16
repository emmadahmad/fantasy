<?php if(isset($alert)): ?>
	<div class="alert alert-<?php echo $alert_type; ?>">
		<?php echo $alert_message; ?>
	</div>
<?php endif; ?>
<h2 class="page-header">Update Point Rules</h2>
<div class="inner_content">
	<form role="form" id="frm_edit_point_rules" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/updatePointRules" method="post">
		<?php foreach ($rules as $cont): ?>
			<?php if($cont->rule_name != 'bat_econ' && $cont->rule_name != 'bowl_econ'): ?>
			<div class="row">
				<p><strong><?php echo $cont->rule_description; ?></strong></p>
				<div class="col-md-4">
					<label for="rule_value">Value</label>
					<input type="text" class="form-control validate[required]" id="rule_value" name="<?php echo $cont->rule_name; ?>-value" placeholder="Value" data-prompt-position="topLeft" value="<?php echo $cont->rule_points; ?>">
				</div>
				<div class="col-md-8">
					<label for="rule_description">Description</label>
					<input type="text" class="form-control " id="rule_description" name="<?php echo $cont->rule_name; ?>-description" placeholder="Description" data-prompt-position="topLeft" value="<?php echo $cont->rule_description; ?>">
				</div>
			</div>
			<br>
			<?php endif; ?>
		<?php endforeach; ?>
		<br>
		<h3>Batting Run Rates</h3>
		<?php $i = 0; foreach ($rules as $cont): ?>			
			<?php if($cont->rule_name == 'bat_econ'): $i++; ?> 
			<div class="row">
				<div class="col-md-2">
					<label for="rule_value">Minimum Limit</label>
					<input type="text" class="form-control validate[required]" id="rule_value" name="<?php echo $cont->rule_name; ?>-val1[]" placeholder="Value" data-prompt-position="topLeft" value="<?php echo $cont->rule_val1; ?>">
				</div>
				<div class="col-md-2">
					<label for="rule_value">Maximum Limit</label>
					<input type="text" class="form-control validate[required]" id="rule_value" name="<?php echo $cont->rule_name; ?>-val2[]" placeholder="Value" data-prompt-position="topLeft" value="<?php echo $cont->rule_val2; ?>">
				</div>
				<div class="col-md-2">
					<label for="rule_value">Points</label>
					<input type="text" class="form-control validate[required]" id="rule_value" name="<?php echo $cont->rule_name; ?>-value[]" placeholder="Value" data-prompt-position="topLeft" value="<?php echo $cont->rule_points; ?>">
				</div>
				<?php if($i == 1): ?>
					<div class="col-md-6">
						<label for="rule_description">Description</label>
						<input type="text" class="form-control validate[required]" id="rule_description" name="<?php echo $cont->rule_name; ?>-description" placeholder="Description" data-prompt-position="topLeft" value="<?php echo $cont->rule_description; ?>">
					</div>
				<?php endif; ?>	
			</div>
			<br>
			<?php endif; ?>	
		<?php endforeach; ?>
		<br>
		<h3>Bowling Economy</h3>
		<?php $j = 0; foreach ($rules as $cont): ?>			
			<?php if($cont->rule_name == 'bowl_econ'): $j++; ?> 
			<div class="row">
				<div class="col-md-2">
					<label for="rule_value">Minimum Limit</label>
					<input type="text" class="form-control validate[required]" id="rule_value" name="<?php echo $cont->rule_name; ?>-val1[]" placeholder="Value" data-prompt-position="topLeft" value="<?php echo $cont->rule_val1; ?>">
				</div>
				<div class="col-md-2">
					<label for="rule_value">Maximum Limit</label>
					<input type="text" class="form-control validate[required]" id="rule_value" name="<?php echo $cont->rule_name; ?>-val2[]" placeholder="Value" data-prompt-position="topLeft" value="<?php echo $cont->rule_val2; ?>">
				</div>
				<div class="col-md-2">
					<label for="rule_value">Points</label>
					<input type="text" class="form-control validate[required]" id="rule_value" name="<?php echo $cont->rule_name; ?>-value[]" placeholder="Value" data-prompt-position="topLeft" value="<?php echo $cont->rule_points; ?>">
				</div>
				<?php if($j == 1): ?>
					<div class="col-md-6">
						<label for="rule_description">Description</label>
						<input type="text" class="form-control validate[required]" id="rule_description" name="<?php echo $cont->rule_name; ?>-description" placeholder="Description" data-prompt-position="topLeft" value="<?php echo $cont->rule_description; ?>">
					</div>
				<?php endif; ?>	
			</div>
			<br>
			<?php endif; ?>	
		<?php endforeach; ?>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Save</button>
				<a href="<?php echo base_url(); ?>admin/venues/" class="btn btn-default" role="button">Back</a>
			</div>
		</div>								
	</form>
</div>