<?php $panel = ($panel) ? $panel : 'info'; ?>
<?php if(isset($alert)): ?>
	<div class="alert alert-<?php echo $alert_type; ?>">
		<?php echo $alert_message; ?>
	</div>
<?php endif; ?>
<h2 class="page-header">Add Match Details</h2>
<div class="inner_content">
	<div class="panel-group" id="match_accordian">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#match_accordian" href="#match_info">
						Match Info
					</a>
				</h4>
			</div>
			<div id="match_info" class="panel-collapse collapse <?php echo ($panel == 'info') ? 'in' : ''; ?>">
				<div class="panel-body">
					<form role="form" id="frm_add_match_details" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/addMatchDetails" method="post">
						<div class="row">			
							<div class="col-md-4">
								<label for="toss_won">Toss Won</label>
								<?php echo form_dropdown('toss_won', $countries, $match_info->toss_won, 'id="toss_won" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
							</div>
							<div class="col-md-4">
								<label for="batting_first">Batting First</label>
								<?php echo form_dropdown('batting_first', $countries, $match_info->batting_first, 'id="batting_first" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
							</div>
							<div class="col-md-4">
								<label for="winner">Winner</label>
								<?php echo form_dropdown('winner', $countries, $match_info->winner, 'id="winner" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-4">
								<label for="winner_runs">Winner Runs</label>
								<input type="text" class="form-control validate[required]" id="winner_runs" name="winner_runs" placeholder="Winner Runs" data-prompt-position="topLeft" value="<?php echo $match_info->winner_runs; ?>">
							</div>
							<div class="col-md-4">
								<label for="winner_wickets">Winner Wickets</label>
								<input type="text" class="form-control validate[required]" id="winner_wickets" name="winner_wickets" placeholder="Winner Wickets" data-prompt-position="topLeft" value="<?php echo $match_info->winner_wickets; ?>">
							</div>
							<div class="col-md-4">
								<label for="winner_extras">Winner Extras</label>
								<input type="text" class="form-control validate[required]" id="winner_extras" name="winner_extras" placeholder="Winner Extras" data-prompt-position="topLeft" value="<?php echo $match_info->winner_extras; ?>">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-4">
								<label for="loser_runs">Loser Runs</label>
								<input type="text" class="form-control validate[required]" id="loser_runs" name="loser_runs" placeholder="Loser Runs" data-prompt-position="topLeft" value="<?php echo $match_info->loser_runs; ?>">
							</div>
							<div class="col-md-4">
								<label for="loser_wickets">Loser Wickets</label>
								<input type="text" class="form-control validate[required]" id="loser_wickets" name="loser_wickets" placeholder="Loser Wickets" data-prompt-position="topLeft" value="<?php echo $match_info->loser_wickets; ?>">
							</div>
							<div class="col-md-4">
								<label for="loser_extras">Loser Extras</label>
								<input type="text" class="form-control validate[required]" id="loser_extras" name="loser_extras" placeholder="Loser Extras" data-prompt-position="topLeft" value="<?php echo $match_info->loser_extras; ?>">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary">Save</button>
								<a href="<?php echo base_url(); ?>admin/matches/view_match/<?php echo $match->match_id; ?>" class="btn btn-default" role="button">Back</a>
								<input type="hidden" name="match_id" value="<?php echo $match->match_id; ?>">
							</div>
						</div>								
					</form>
				</div>
			</div>
		</div>
		<?php if($match_info->winner != 0): ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#match_accordian" href="#winner_batting_details">
						Winner Details
					</a>
				</h4>
			</div>
			<div id="winner_batting_details" class="panel-collapse collapse <?php echo ($panel == 'win') ? 'in' : ''; ?>">
				<div class="panel-body">
					<form role="form" id="frm_add_winner_details" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/addWinnerDetails" method="post">
						<div class="row">
							<?php foreach($winning_team_players as $id => $name): ?>
							<?php $batted_check =  $winning_players_stats[$id]['batted'] ? TRUE : FALSE; ?>
							<?php $bowled_check =  $winning_players_stats[$id]['bowled'] ? TRUE : FALSE; ?>
							<?php $out_check =  $winning_players_stats[$id]['dismissal_type'] != NOT_OUT && $winning_players_stats[$id]['dismissal_type'] ? 'display_stats' : ''; ?>
							<?php $caught_check =  $winning_players_stats[$id]['dismissal_type'] == CAUGHT ? 'display_stats' : ''; ?>
							<?php $dismissal_t =  $winning_players_stats[$id]['dismissal_type'] ? $winning_players_stats[$id]['dismissal_type'] : NOT_OUT; ?>
							<div class="col-md-12">
								<div class="row player_names">	
									<div class="col-md-1">
										<label class="checkbox-inline">
											<input type="checkbox" class="batted-check" name="batted-check-<?php echo $id; ?>" <?php echo $batted_check ? 'checked' : ''; ?> value="<?php echo $id; ?>"> Bat
										</label>
									</div>
									<div class="col-md-1">
										<label class="checkbox-inline">
											<input type="checkbox" class="bowled-check" name="bowled-check-<?php echo $id; ?>" <?php echo $bowled_check ? 'checked' : ''; ?> value="<?php echo $id; ?>"> Bowl
										</label>
									</div>								
									<div class="col-md-8">
										<p><strong><?php echo $name; ?></strong></p>
									</div>
								</div>
								<div class="row player_match_stats <?php echo $batted_check ? 'display_stats' : ''; ?>" id="batted-<?php echo $id; ?>">
									<div class="col-md-2">
										<label for="batting_position-<?php echo $id; ?>">Batting Position</label>
										<input type="text" class="form-control validate[required]" id="batting_position-<?php echo $id; ?>" name="batting_position-<?php echo $id; ?>" placeholder="Batting Position" data-prompt-position="topLeft" value="<?php echo isset($winning_players_stats[$id]['batting_position']) ? $winning_players_stats[$id]['batting_position'] : ''; ?>">
									</div>
									<div class="col-md-2">
										<label for="balls_faced-<?php echo $id; ?>">Balls Faced</label>
										<input type="text" class="form-control validate[required]" id="balls_faced-<?php echo $id; ?>" name="balls_faced-<?php echo $id; ?>" placeholder="Balls Faced" data-prompt-position="topLeft" value="<?php echo isset($winning_players_stats[$id]['balls_faced']) ? $winning_players_stats[$id]['balls_faced'] : ''; ?>">
									</div>
									<div class="col-md-2">
										<label for="bat_runs-<?php echo $id; ?>">Runs</label>
										<input type="text" class="form-control validate[required]" id="bat_runs-<?php echo $id; ?>" name="bat_runs-<?php echo $id; ?>" placeholder="Runs" data-prompt-position="topLeft" value="<?php echo isset($winning_players_stats[$id]['bat_runs']) ? $winning_players_stats[$id]['bat_runs'] : ''; ?>">
									</div>
									<div class="col-md-2">
										<label for="dismissal_type-<?php echo $id; ?>">Dismissal Type</label>
										<?php echo form_dropdown('dismissal_type-'.$id, $dismissal_types, $dismissal_t, 'id="dismissal_type-'.$id.'" class="form-control validate[required] dismissal-type" data-player-id='.$id.' data-prompt-position="topLeft"'); ?>
									</div>
									<div class="col-md-2 hidden_fields dismissal_player1-<?php echo $id; ?> <?php echo $out_check; ?>">
										<label for="dismissed_player1-<?php echo $id; ?>">Dismissed By</label>
										<?php echo form_dropdown('dismissed_player1-'.$id, $losing_team_players, $winning_players_stats[$id]['dismissed_player1'], 'id="dismissed_player1-'.$id.'" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
									</div>
									<div class="col-md-2 hidden_fields dismissal_player2-<?php echo $id; ?> <?php echo $caught_check; ?>">
										<label for="dismissed_player2-<?php echo $id; ?>">Caught By</label>
										<?php echo form_dropdown('dismissed_player2-'.$id, $losing_team_players, $winning_players_stats[$id]['dismissed_player2'], 'id="dismissed_player2-'.$id.'" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
									</div>

								</div>
								<br>
								<div class="row player_match_stats <?php echo $bowled_check ? 'display_stats' : ''; ?>" id="bowled-<?php echo $id; ?>">
									<div class="col-md-2">
										<label for="overs-<?php echo $id; ?>">Overs</label>
										<input type="text" class="form-control validate[required]" id="overs-<?php echo $id; ?>" name="overs-<?php echo $id; ?>" placeholder="Overs" data-prompt-position="topLeft" value="<?php echo isset($winning_players_stats[$id]['overs']) ? $winning_players_stats[$id]['overs'] : ''; ?>">
									</div>
									<div class="col-md-2">
										<label for="wickets-<?php echo $id; ?>">Wickets</label>
										<input type="text" class="form-control validate[required]" id="wickets-<?php echo $id; ?>" name="wickets-<?php echo $id; ?>" placeholder="Wickets" data-prompt-position="topLeft" value="<?php echo isset($winning_players_stats[$id]['wickets']) ? $winning_players_stats[$id]['wickets'] : ''; ?>">
									</div>
									<div class="col-md-2">
										<label for="bowl_runs-<?php echo $id; ?>">Runs</label>
										<input type="text" class="form-control validate[required]" id="bowl_runs-<?php echo $id; ?>" name="bowl_runs-<?php echo $id; ?>" placeholder="Runs" data-prompt-position="topLeft" value="<?php echo isset($winning_players_stats[$id]['bowl_runs']) ? $winning_players_stats[$id]['bowl_runs'] : ''; ?>">
									</div>
								</div>
								<br>
							</div>
							<?php endforeach; ?>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary">Save</button>
								<a href="<?php echo base_url(); ?>admin/matches/view_match/<?php echo $match->match_id; ?>" class="btn btn-default" role="button">Back</a>
								<input type="hidden" name="match_id" value="<?php echo $match->match_id; ?>">
								<input type="hidden" name="country_id" value="<?php echo $winning_team_id; ?>">
							</div>
						</div>								
					</form>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#match_accordian" href="#winner_bowling_details">
						Loser Details
					</a>
				</h4>
			</div>
			<div id="winner_bowling_details" class="panel-collapse collapse <?php echo ($panel == 'lose') ? 'in' : ''; ?>">
				<div class="panel-body">
					<form role="form" id="frm_add_loser_details" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/addLoserDetails" method="post">
						<div class="row">
							<?php foreach($losing_team_players as $id => $name): ?>
							<?php $batted_check =  $losing_players_stats[$id]['batted'] ? TRUE : FALSE; ?>
							<?php $bowled_check =  $losing_players_stats[$id]['bowled'] ? TRUE : FALSE; ?>
							<?php $out_check =  $losing_players_stats[$id]['dismissal_type'] != NOT_OUT && $losing_players_stats[$id]['dismissal_type'] ? 'display_stats' : ''; ?>
							<?php $caught_check =  $losing_players_stats[$id]['dismissal_type'] == CAUGHT ? 'display_stats' : ''; ?>
							<?php $dismissal_t =  $losing_players_stats[$id]['dismissal_type'] ? $losing_players_stats[$id]['dismissal_type'] : NOT_OUT; ?>
							<div class="col-md-12">
								<div class="row player_names">	
									<div class="col-md-1">
										<label class="checkbox-inline">
											<input type="checkbox" class="batted-check" name="batted-check-<?php echo $id; ?>" <?php echo $batted_check ? 'checked' : ''; ?> value="<?php echo $id; ?>"> Bat
										</label>
									</div>
									<div class="col-md-1">
										<label class="checkbox-inline">
											<input type="checkbox" class="bowled-check" name="bowled-check-<?php echo $id; ?>" <?php echo $bowled_check ? 'checked' : ''; ?> value="<?php echo $id; ?>"> Bowl
										</label>
									</div>								
									<div class="col-md-8">
										<p><strong><?php echo $name; ?></strong></p>
									</div>
								</div>
								<div class="row player_match_stats <?php echo $batted_check ? 'display_stats' : ''; ?>" id="batted-<?php echo $id; ?>">
									<div class="col-md-2">
										<label for="batting_position-<?php echo $id; ?>">Batting Position</label>
										<input type="text" class="form-control validate[required]" id="batting_position-<?php echo $id; ?>" name="batting_position-<?php echo $id; ?>" placeholder="Batting Position" data-prompt-position="topLeft" value="<?php echo isset($losing_players_stats[$id]['batting_position']) ? $losing_players_stats[$id]['batting_position'] : ''; ?>">
									</div>
									<div class="col-md-2">
										<label for="balls_faced-<?php echo $id; ?>">Balls Faced</label>
										<input type="text" class="form-control validate[required]" id="balls_faced-<?php echo $id; ?>" name="balls_faced-<?php echo $id; ?>" placeholder="Balls Faced" data-prompt-position="topLeft" value="<?php echo isset($losing_players_stats[$id]['balls_faced']) ? $losing_players_stats[$id]['balls_faced'] : ''; ?>">
									</div>
									<div class="col-md-2">
										<label for="bat_runs-<?php echo $id; ?>">Runs</label>
										<input type="text" class="form-control validate[required]" id="bat_runs-<?php echo $id; ?>" name="bat_runs-<?php echo $id; ?>" placeholder="Runs" data-prompt-position="topLeft" value="<?php echo isset($losing_players_stats[$id]['bat_runs']) ? $losing_players_stats[$id]['bat_runs'] : ''; ?>">
									</div>
									<div class="col-md-2">
										<label for="dismissal_type-<?php echo $id; ?>">Dismissal Type</label>
										<?php echo form_dropdown('dismissal_type-'.$id, $dismissal_types, $dismissal_t, 'id="dismissal_type-'.$id.'" class="form-control validate[required] dismissal-type" data-player-id='.$id.' data-prompt-position="topLeft"'); ?>
									</div>
									<div class="col-md-2 hidden_fields dismissal_player1-<?php echo $id; ?> <?php echo $out_check; ?>">
										<label for="dismissed_player1-<?php echo $id; ?>">Dismissed By</label>
										<?php echo form_dropdown('dismissed_player1-'.$id, $winning_team_players, $losing_players_stats[$id]['dismissed_player1'], 'id="dismissed_player1-'.$id.'" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
									</div>
									<div class="col-md-2 hidden_fields dismissal_player2-<?php echo $id; ?> <?php echo $caught_check; ?>">
										<label for="dismissed_player2-<?php echo $id; ?>">Caught By</label>
										<?php echo form_dropdown('dismissed_player2-'.$id, $winning_team_players, $losing_players_stats[$id]['dismissed_player2'], 'id="dismissed_player2-'.$id.'" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
									</div>

								</div>
								<br>
								<div class="row player_match_stats <?php echo $bowled_check ? 'display_stats' : ''; ?>" id="bowled-<?php echo $id; ?>">
									<div class="col-md-2">
										<label for="overs-<?php echo $id; ?>">Overs</label>
										<input type="text" class="form-control validate[required]" id="overs-<?php echo $id; ?>" name="overs-<?php echo $id; ?>" placeholder="Overs" data-prompt-position="topLeft" value="<?php echo isset($losing_players_stats[$id]['overs']) ? $losing_players_stats[$id]['overs'] : ''; ?>">
									</div>
									<div class="col-md-2">
										<label for="wickets-<?php echo $id; ?>">Wickets</label>
										<input type="text" class="form-control validate[required]" id="wickets-<?php echo $id; ?>" name="wickets-<?php echo $id; ?>" placeholder="Wickets" data-prompt-position="topLeft" value="<?php echo isset($losing_players_stats[$id]['wickets']) ? $losing_players_stats[$id]['wickets'] : ''; ?>">
									</div>
									<div class="col-md-2">
										<label for="bowl_runs-<?php echo $id; ?>">Runs</label>
										<input type="text" class="form-control validate[required]" id="bowl_runs-<?php echo $id; ?>" name="bowl_runs-<?php echo $id; ?>" placeholder="Runs" data-prompt-position="topLeft" value="<?php echo isset($losing_players_stats[$id]['bowl_runs']) ? $losing_players_stats[$id]['bowl_runs'] : ''; ?>">
									</div>
								</div>
								<br>
							</div>
							<?php endforeach; ?>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary">Save</button>
								<a href="<?php echo base_url(); ?>admin/matches/view_match/<?php echo $match->match_id; ?>" class="btn btn-default" role="button">Back</a>
								<input type="hidden" name="match_id" value="<?php echo $match->match_id; ?>">
								<input type="hidden" name="country_id" value="<?php echo $losing_team_id; ?>">
							</div>
						</div>								
					</form>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>					
</div>