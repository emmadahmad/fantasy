<h2 class="page-header"><?php echo $player_info->player_name; ?></h2>
<div class="inner_content">
	<div class="row">
		<div class="col-md-4">
			<dl class="dl-horizontal">
				<dt>Player Name</dt>
				<dd><?php echo $player_info->player_name; ?></dd>

				<dt>Country</dt>
				<dd><?php echo $player_info->country_name; ?></dd>

				<dt>Player Type</dt>
				<dd><?php echo $player_info->type_name; ?></dd>

				<dt>Matches</dt>
				<dd><?php echo $player_stats->matches; ?></dd>
			</dl>
		</div>
		<div class="col-md-4">
			<dl class="dl-horizontal">
				<dt>League Matches</dt>
				<dd><?php echo $player_league_stats->matches; ?></dd>

				<dt>League Points</dt>
				<dd><?php echo $player_league_stats->points; ?></dd>

				<dt>League Price</dt>
				<dd><?php echo $player_league_stats->price; ?></dd>
			</dl>
		</div>
		<div class="col-md-4">
			<img src="<?php echo base_url(); ?>/uploads/players/<?php echo $player_stats->player_photo; ?>" width="100" alt="Responsive image">
		</div>
	</div>
	<br>
	<div class="panel-group" id="player_accordian">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#player_accordian" href="#batting_details">
						Batting Stats
					</a>
				</h4>
			</div>
			<div id="batting_details" class="panel-collapse collapse in">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<h3>Overall Stats</h3>
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Mat</th>				
											<th>Inns</th>
											<th>NO</th>									
											<th>BF</th>
											<th>Runs</th>
											<th>Ave</th>
											<th>SR</th>
										</tr>
									</thead>
									<tbody id="player_table_body">
									<?php if(!empty($batting_stats)): ?>			
									<tr>
										<td><?php echo $player_stats->matches; ?></td>
										<td><?php echo $batting_stats->innings; ?></td>
										<td><?php echo $batting_stats->not_outs; ?></td>
										<td><?php echo $batting_stats->balls_faced; ?></td>
										<td><?php echo $batting_stats->runs; ?></td>
										<td><?php echo $player_stats->batting_avg; ?></td>
										<td><?php echo $player_stats->batting_sr; ?></td>
									</tr>							
									<?php else: ?>
										<tr>
											<td colspan="7" class="text-center">No Data Available</td>
										</tr>
									<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-6">
							<h3>League Stats</h3>
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Mat</th>				
											<th>Inns</th>
											<th>NO</th>									
											<th>BF</th>
											<th>Runs</th>
											<th>Ave</th>
											<th>SR</th>
										</tr>
									</thead>
									<tbody id="player_table_body">
									<?php if(!empty($batting_stats)): ?>			
									<tr>
										<td><?php echo $player_league_stats->matches; ?></td>
										<td><?php echo $player_league_stats->innings_batted; ?></td>
										<td><?php echo $player_league_stats->matches; ?></td>
										<td><?php echo $player_league_stats->matches; ?></td>
										<td><?php echo $player_league_stats->matches; ?></td>
										<td><?php echo $player_league_stats->batting_avg; ?></td>
										<td><?php echo $player_league_stats->batting_sr; ?></td>
									</tr>							
									<?php else: ?>
										<tr>
											<td colspan="7" class="text-center">No Data Available</td>
										</tr>
									<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>							
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#player_accordian" href="#bowling_details">
						Bowling Stats
					</a>
				</h4>
			</div>
			<div id="bowling_details" class="panel-collapse collapse">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<h3>Overall Stats</h3>
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Mat</th>				
											<th>Inns</th>
											<th>Balls</th>									
											<th>Runs</th>
											<th>Wkts</th>
											<th>Ave</th>
											<th>SR</th>
											<th>Econ</th>
										</tr>
									</thead>
									<tbody id="player_table_body">
									<?php if(!empty($bowling_stats)): ?>				
									<tr>
										<td><?php echo $player_stats->matches; ?></td>
										<td><?php echo $bowling_stats->innings; ?></td>
										<td><?php echo $bowling_stats->balls; ?></td>
										<td><?php echo $bowling_stats->runs; ?></td>
										<td><?php echo $bowling_stats->wickets; ?></td>
										<td><?php echo $player_stats->bowling_avg; ?></td>
										<td><?php echo $player_stats->bowling_sr; ?></td>
										<td><?php echo $player_stats->bowling_econ; ?></td>
									</tr>							
									<?php else: ?>
										<tr>
											<td colspan="8" class="text-center">No Data Available</td>
										</tr>
									<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-6">
							<h3>League Stats</h3>
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Mat</th>				
											<th>Inns</th>
											<th>Balls</th>									
											<th>Runs</th>
											<th>Wkts</th>
											<th>Ave</th>
											<th>SR</th>
											<th>Econ</th>
										</tr>
									</thead>
									<tbody id="player_table_body">
									<?php if(!empty($bowling_stats)): ?>			
									<tr>
										<td><?php echo $player_stats->matches; ?></td>
										<td><?php echo $bowling_stats->innings; ?></td>
										<td><?php echo $bowling_stats->balls; ?></td>
										<td><?php echo $bowling_stats->runs; ?></td>
										<td><?php echo $bowling_stats->wickets; ?></td>
										<td><?php echo $player_stats->bowling_avg; ?></td>
										<td><?php echo $player_stats->bowling_sr; ?></td>
										<td><?php echo $player_stats->bowling_econ; ?></td>
									</tr>							
									<?php else: ?>
										<tr>
											<td colspan="8" class="text-center">No Data Available</td>
										</tr>
									<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>							
				</div>
			</div>
		</div>
	</div>
</div>