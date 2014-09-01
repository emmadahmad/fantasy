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
				<dd><?php echo $player_info->league_matches; ?></dd>

				<dt>League Points</dt>
				<dd><?php echo $player_info->league_points; ?></dd>

				<dt>League Price</dt>
				<dd><?php echo $player_info->league_price; ?></dd>
			</dl>
		</div>
		<div class="col-md-4">
			<p>Place for Picture thumbnail</p>
		</div>
	</div>
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
										<?php foreach($batting_stats as $cont): ?>				
										<tr>
											<td><?php echo $player_stats[0]->matches; ?></td>
											<td><?php echo $cont->innings; ?></td>
											<td><?php echo $cont->not_outs; ?></td>
											<td><?php echo $cont->balls_faced; ?></td>
											<td><?php echo $cont->runs; ?></td>
											<td><?php echo $player_stats[0]->batting_avg; ?></td>
											<td><?php echo $player_stats[0]->batting_sr; ?></td>
										</tr>							
										<?php endforeach; ?>
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
										<?php foreach($batting_stats as $cont): ?>				
										<tr>
											<td><?php echo $player_stats[0]->matches; ?></td>
											<td><?php echo $cont->innings; ?></td>
											<td><?php echo $cont->not_outs; ?></td>
											<td><?php echo $cont->balls_faced; ?></td>
											<td><?php echo $cont->runs; ?></td>
											<td><?php echo $player_stats[0]->batting_avg; ?></td>
											<td><?php echo $player_stats[0]->batting_sr; ?></td>
										</tr>							
										<?php endforeach; ?>
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
										<?php foreach($bowling_stats as $cont): ?>				
										<tr>
											<td><?php echo $player_stats[0]->matches; ?></td>
											<td><?php echo $cont->innings; ?></td>
											<td><?php echo $cont->balls; ?></td>
											<td><?php echo $cont->runs; ?></td>
											<td><?php echo $cont->wickets; ?></td>
											<td><?php echo $player_stats[0]->bowling_avg; ?></td>
											<td><?php echo $player_stats[0]->bowling_sr; ?></td>
											<td><?php echo $player_stats[0]->bowling_econ; ?></td>
										</tr>							
										<?php endforeach; ?>
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
										<?php foreach($bowling_stats as $cont): ?>				
										<tr>
											<td><?php echo $player_stats[0]->matches; ?></td>
											<td><?php echo $cont->innings; ?></td>
											<td><?php echo $cont->balls; ?></td>
											<td><?php echo $cont->runs; ?></td>
											<td><?php echo $cont->wickets; ?></td>
											<td><?php echo $player_stats[0]->bowling_avg; ?></td>
											<td><?php echo $player_stats[0]->bowling_sr; ?></td>
											<td><?php echo $player_stats[0]->bowling_econ; ?></td>
										</tr>							
										<?php endforeach; ?>
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