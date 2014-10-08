<h2 class="page-header"><?php echo $match->home; ?> VS <?php echo $match->away; ?> <small><a href="<?php echo base_url(); ?>admin/matches/add_match_details/<?php echo $match->match_id; ?>"><span class="glyphicon glyphicon-plus-sign"></span> Add Details</a></small></h2>
<div class="inner_content">
	<div class="row">
		<div class="col-md-4">
			<dl class="dl-horizontal">
				<dt>Home Team</dt>
				<dd><?php echo $match->home; ?></dd>

				<dt>Away Team</dt>
				<dd><?php echo $match->away; ?></dd>

				<dt>Date</dt>
				<dd><?php echo format_date($match->match_date); ?></dd>

				<dt>Time</dt>
				<dd><?php echo format_date($match->match_date,TIME); ?></dd>
			</dl>
		</div>
		<div class="col-md-4">
			<dl class="dl-horizontal">
				<dt>Venue</dt>
				<dd><?php echo $venue->venue_name; ?></dd>

				<dt>City</dt>
				<dd><?php echo $venue->venue_city; ?></dd>

				<dt>Capacity</dt>
				<dd><?php echo $venue->venue_capacity; ?></dd>
			</dl>
		</div>
		<div class="col-md-4">
			<p>Place for Picture thumbnail</p>
		</div>
	</div>
	<br>
	<?php if($match_info->completed): ?>
		<?php
			$bat_first = ($match_info->batting_first == $match_info->winner) ? 'w' : 'l';
			if($bat_first == 'w')
			{
				$string1 = $winning_team . ' ' . $match_info->winner_runs . '/' . $match_info->winner_wickets;
				$string2 = $losing_team . ' ' . $match_info->loser_runs . '/' . $match_info->loser_wickets;
			}
			else
			{
				$string1 = $losing_team . ' ' . $match_info->loser_runs . '/' . $match_info->loser_wickets;
				$string2 = $winning_team . ' ' . $match_info->winner_runs . '/' . $match_info->winner_wickets;
			}
		?>
		<div class="row">
			<div class="col-md-6">
				<dl class="dl-horizontal">
					<dt>Result</dt>
					<dd><?php echo $toss_result; ?></dd>
					<dd><?php echo $result; ?></dd>
				</dl>
			</div>
			<div class="col-md-6">
				<dl class="dl-horizontal">
					<dt>Score</dt>
					<dd><?php echo $string1; ?></dd>
					<dd><?php echo $string2; ?></dd>
				</dl>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center"><?php echo $string1; ?></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<h4 class="text-center"><?php echo ($bat_first == 'w') ? $winning_team : $losing_team; ?> Batting</h4>
				<table class="table table-hover">
					<thead>
						<tr>
							<th></th>
							<th></th>
							<th></th>									
							<th>Runs</th>
							<th>Balls</th>
						</tr>
					</thead>
					<tbody id="player_table_body">
					<?php if(!empty($winning_players_stats)): ?>
						<?php foreach($winning_players_stats as $cont): ?>
							<?php if($cont['batted']): ?>
							<tr class="<?php echo $cont['dismissal_type'] == NOT_OUT ? 'success' : ''?>">
								<td><?php echo $winning_team_players[$cont['player_id']]; ?></td>
								<?php if($cont['dismissal_type'] == NOT_OUT): ?>
									<td colspan="2"><?php echo $dismissal_types[$cont['dismissal_type']]; ?></td>
								<?php elseif($cont['dismissal_type'] == CAUGHT): ?>
									<td><?php echo $dismissal_types[$cont['dismissal_type']] . " " . $losing_team_players[$cont['dismissed_player2']]; ?> </td>
									<td><?php echo "b " . $losing_team_players[$cont['dismissed_player1']]; ?> </td>
								<?php elseif($cont['dismissal_type'] == RUN_OUT): ?>
									<td><?php echo $dismissal_types[$cont['dismissal_type']] . " (" . $losing_team_players[$cont['dismissed_player1']] . ")"; ?> </td>
									<td></td>
								<?php elseif($cont['dismissal_type'] == STUMPED): ?>
									<td><?php echo $dismissal_types[$cont['dismissal_type']]; ?> </td>
									<td><?php echo "b " . $losing_team_players[$cont['dismissed_player1']]; ?> </td>
								<?php else: ?>
									<td></td>
									<td><?php echo $dismissal_types[$cont['dismissal_type']] . " " . $losing_team_players[$cont['dismissed_player1']]; ?> </td>
								<?php endif; ?>
								<td><b><?php echo $cont['bat_runs'] ?></b></td>
								<td><?php echo $cont['balls_faced'] ?></td>
							</tr>
							<?php else: ?>
							<tr>
								<td><?php echo $winning_team_players[$cont['player_id']]; ?></td>
								<td>DNB</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<?php endif; ?>
						<?php endforeach; ?>			
					<?php else: ?>
						<tr>
							<td colspan="5" class="text-center">No Data Available</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
			<div class="col-md-4">
				<h4 class="text-center"><?php echo ($bat_first == 'w') ? $losing_team : $winning_team; ?> Bowling</h4>
				<table class="table table-hover">
					<thead>
						<tr>
							<th></th>				
							<th>Overs</th>
							<th>Runs</th>									
							<th>Wickets</th>
						</tr>
					</thead>
					<tbody id="player_table_body">
					<?php if(!empty($losing_players_stats)): ?>
						<?php foreach($losing_players_stats as $cont): ?>
							<?php if($cont['bowled']): ?>
							<tr>
								<td><?php echo $losing_players_stats[$cont['player_id']]; ?></td>
								<td><?php echo $cont['overs'] ?></td>
								<td><?php echo $cont['bowl_runs'] ?></td>
								<td><?php echo $cont['wickets'] ?></td>
							</tr>
							<?php endif; ?>
						<?php endforeach; ?>			
					<?php else: ?>
						<tr>
							<td colspan="4" class="text-center">No Data Available</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>

		<br>
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center"><?php echo $string2; ?></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<h4 class="text-center"><?php echo ($bat_first == 'w') ? $losing_team : $winning_team; ?> Batting</h4>
				<table class="table table-hover">
					<thead>
						<tr>
							<th></th>
							<th></th>									
							<th>Runs</th>
							<th>Balls</th>
						</tr>
					</thead>
					<tbody id="player_table_body">
					<?php if(1/*!empty($batting_stats)*/): ?>			
					<tr>
						<td>Nasir Jamshed</td>
						<td>run out (Russel)</td>
						<td><b>12</b></td>
						<td>16</td>
					</tr>
					<tr>
						<td>Nasir Jamshed</td>
						<td>run out (Russel)</td>
						<td><b>12</b></td>
						<td>16</td>
					</tr>
					<tr>
						<td>Nasir Jamshed</td>
						<td>run out (Russel)</td>
						<td><b>12</b></td>
						<td>16</td>
					</tr>
					<tr>
						<td>Nasir Jamshed</td>
						<td>run out (Russel)</td>
						<td><b>12</b></td>
						<td>16</td>
					</tr>
					<tr>
						<td>Nasir Jamshed</td>
						<td>run out (Russel)</td>
						<td><b>12</b></td>
						<td>16</td>
					</tr>				
					<?php else: ?>
						<tr>
							<td colspan="7" class="text-center">No Data Available</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
			<div class="col-md-4">
				<h4 class="text-center"><?php echo ($bat_first == 'w') ? $winning_team : $losing_team; ?> Bowling</h4>
				<table class="table table-hover">
					<thead>
						<tr>
							<th></th>				
							<th>Overs</th>
							<th>Runs</th>									
							<th>Wickets</th>
						</tr>
					</thead>
					<tbody id="player_table_body">
					<?php if(!empty($winning_players_stats)): $i=0;?>
						<?php foreach($winning_players_stats as $cont):?>
							<?php if($cont['bowled']):  $i++;?>
							<tr>
								<td><?php echo $winning_team_players[$cont['player_id']]; ?></td>
								<td><?php echo $cont['overs'] ?></td>
								<td><?php echo $cont['bowl_runs'] ?></td>
								<td><?php echo $cont['wickets'] ?></td>
							</tr>
							<?php endif; ?>
						<?php endforeach;?>
						<?php if($i == 0): ?>
						<tr>
							<td colspan="4" class="text-center">No Data Available</td>
						</tr>
						<?php endif; ?>			
					<?php else: ?>
						<tr>
							<td colspan="4" class="text-center">No Data Available</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	<?php else: ?>
		<div class="row">
			<div class="col-md-12">
				<dl class="dl-horizontal">
					<dt>Result</dt>
					<dd>TBD</dd>
				</dl>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4>Match not played yet.</h4>
			</div>
		</div>
	<?php endif; ?>
</div>