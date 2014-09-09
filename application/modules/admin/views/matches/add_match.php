<h2 class="page-header">Add Player</h2>
<div class="inner_content">
	<form role="form" id="frm_add_player_info" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/addPlayerInfo" method="post">
		<div class="row">
			<div class="col-md-3">
				<label for="player_name">Player Name</label>
				<input type="text" class="form-control validate[required]" id="player_name" name="player_name" placeholder="Player Name" data-prompt-position="topLeft">
			</div>
			<div class="col-md-3">
				<label for="player_name">Matches</label>
				<input type="text" class="form-control validate[required]" id="matches" name="matches" placeholder="Matches" data-prompt-position="topLeft">
			</div>
			<div class="col-md-3">
				<label for="country">Country</label>
				<?php echo form_dropdown('country', $countries, 0, 'id="countries" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
			</div>
			<div class="col-md-3">
				<label for="player_type">Player Type</label>
				<?php echo form_dropdown('player_type', $player_types, 0, 'id="player_type" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Save</button>
				<a href="<?php echo base_url(); ?>admin/players/" class="btn btn-default" role="button">Back</a>
			</div>
		</div>								
	</form>
</div>