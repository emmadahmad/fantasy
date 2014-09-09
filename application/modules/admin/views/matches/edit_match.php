<?php $panel = ($panel) ? $panel : 'info'; ?>
<?php if(isset($alert)): ?>
	<div class="alert alert-<?php echo $alert_type; ?>">
		<?php echo $alert_message; ?>
	</div>
<?php endif; ?>
<h2 class="page-header">Update Player</h2>
<div class="inner_content">
		<div class="panel-group" id="player_accordian">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#player_accordian" href="#player_info">
						Player Info
					</a>
				</h4>
			</div>
			<div id="player_info" class="panel-collapse collapse <?php echo ($panel == 'info') ? 'in' : ''; ?>">
				<div class="panel-body">
					<form role="form" id="frm_update_player_info" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/updatePlayerInfo" method="post">
						<div class="row">
							<div class="col-md-3">
								<label for="player_name">Player Name</label>
								<input type="text" class="form-control validate[required]" id="player_name" name="player_name" placeholder="Player Name" data-prompt-position="topLeft" value="<?php echo $player_info->player_name; ?>">
							</div>
							<div class="col-md-3">
								<label for="player_name">Matches</label>
								<input type="text" class="form-control validate[required]" id="matches" name="matches" placeholder="Matches" data-prompt-position="topLeft" value="<?php echo $player_stats->matches; ?>">
							</div>
							<div class="col-md-3">
								<label for="country">Country</label>
								<?php echo form_dropdown('country', $countries, $player_info->player_country, 'id="countries" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
							</div>
							<div class="col-md-3">
								<label for="player_type">Player Type</label>
								<?php echo form_dropdown('player_type', $player_types, $player_info->player_type, 'id="player_type" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary">Save</button>
								<a href="<?php echo base_url(); ?>admin/players/" class="btn btn-default" role="button">Back</a>
								<input type="hidden" name="player_id" value="<?php echo $player_info->player_id; ?>">
							</div>
						</div>								
					</form>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#player_accordian" href="#batting_details">
						Batting Details
					</a>
				</h4>
			</div>
			<div id="batting_details" class="panel-collapse collapse <?php echo ($panel == 'bat') ? 'in' : ''; ?>">
				<div class="panel-body">
					<form role="form" id="frm_update_batting_info" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/updateBattingInfo" method="post">
						<div class="row">
							<div class="col-md-3">
								<label for="player_name">Innings</label>
								<input type="text" class="form-control validate[required]" id="bat_innings" name="bat_innings" placeholder="Innings" data-prompt-position="topLeft" value="<?php echo $batting_stats->innings; ?>">
							</div>
							<div class="col-md-3">
								<label for="player_name">Not Outs</label>
								<input type="text" class="form-control validate[required]" id="not_outs" name="not_outs" placeholder="Not Outs" data-prompt-position="topLeft" value="<?php echo $batting_stats->not_outs; ?>">
							</div>
							<div class="col-md-3">
								<label for="player_name">Balls Faced</label>
								<input type="text" class="form-control validate[required]" id="balls_faced" name="balls_faced" placeholder="Balls Faced" data-prompt-position="topLeft" value="<?php echo $batting_stats->balls_faced; ?>"> 
							</div>
							<div class="col-md-3">
								<label for="player_name">Runs</label>
								<input type="text" class="form-control validate[required]" id="bat_runs" name="bat_runs" placeholder="Runs" data-prompt-position="topLeft" value="<?php echo $batting_stats->runs; ?>">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary">Save</button>
								<a href="<?php echo base_url(); ?>admin/players/" class="btn btn-default" role="button">Back</a>
								<input type="hidden" name="player_id" value="<?php echo $player_info->player_id; ?>">
							</div>
						</div>								
					</form>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#player_accordian" href="#bowling_details">
						Bowling Details
					</a>
				</h4>
			</div>
			<div id="bowling_details" class="panel-collapse collapse <?php echo ($panel == 'bowl') ? 'in' : ''; ?>">
				<div class="panel-body">
					<form role="form" id="frm_update_bowling_info" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/updateBowlingInfo" method="post">
						<div class="row">
							<div class="col-md-3">
								<label for="player_name">Innings</label>
								<input type="text" class="form-control validate[required]" id="bowl_innings" name="bowl_innings" placeholder="Innings" data-prompt-position="topLeft" value="<?php echo $bowling_stats->innings; ?>">
							</div>
							<div class="col-md-3">
								<label for="player_name">Balls</label>
								<input type="text" class="form-control validate[required]" id="balls" name="balls" placeholder="Balls" data-prompt-position="topLeft" value="<?php echo $bowling_stats->balls; ?>">
							</div>
							<div class="col-md-3">
								<label for="player_name">Wickets</label>
								<input type="text" class="form-control validate[required]" id="wickets" name="wickets" placeholder="Wickets" data-prompt-position="topLeft" value="<?php echo $bowling_stats->wickets; ?>"> 
							</div>
							<div class="col-md-3">
								<label for="player_name">Runs</label>
								<input type="text" class="form-control validate[required]" id="bowl_runs" name="bowl_runs" placeholder="Runs" data-prompt-position="topLeft" value="<?php echo $bowling_stats->runs; ?>">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary">Save</button>
								<a href="<?php echo base_url(); ?>admin/players/" class="btn btn-default" role="button">Back</a>
								<input type="hidden" name="player_id" value="<?php echo $player_info->player_id; ?>">
							</div>
						</div>								
					</form>
				</div>
			</div>
		</div>
	</div>
</div>