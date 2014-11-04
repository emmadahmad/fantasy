<?php if(isset($alert)): ?>
	<div class="alert alert-<?php echo $alert_type; ?>">
		<?php echo $alert_message; ?>
	</div>
<?php endif; ?>
<div id="row">
	<div class="col-md-12">
		<div id="notices"></div>
	</div>
</div>
<div id="row">
	<div class="col-md-9">
		<h3 class="page-header"><?php echo $team_name; ?></h3>
		<div class="row">
			<div class="col-md-6">
				<dl>
					<dt>Total Points</dt>
					<dd><?php echo $team_points; ?></dd>
					<dt>Points this week</dt>
					<dd><?php echo $team_points; ?></dd>
					<dt>Balance</dt>
					<dd><span id="team_cash"><?php echo $team_cash - $team_value; ?></span> M</dd>
					<dt>Team Value</dt>
					<dd><span id="team_value"><?php echo $team_value; ?></span> M</dd>
				</dl>
				<p>Total Points : <?php echo $team_points; ?></p>
				<p>Total Cash : <?php echo $team_cash; ?> Mil</p>
			</div>
			<div class="col-md-6">
				<form role="form" id="player_list" class="validate_form" action="<?php echo base_url(); ?>fantasy/form_requests/addPlayers" method="post">
					<?php if($current_lineup): ?>
						<?php foreach ($current_lineup as $cont): ?>
							<input type='hidden' name='players[]' value='<?php echo $cont->player_id; ?>'>
						<?php endforeach; ?>
					<?php endif; ?>
					<button disabled id="update_player" type="submit" class="btn btn-primary">Update</button>
				</form>
				<br>
				<div id="player_cart" class="well">
					<h4>Player Cart</h4>
					<ul class="list-group">
						<?php if($current_lineup): ?>
							<?php foreach ($current_lineup as $cont): ?>
								<li class="list-group-item" data-id="<?php echo $cont->player_id; ?>" data-price="<?php echo $cont->price; ?>">
									<span class='badge'>
										<a href='javascript:void(0);' class='remove-player'>
											<span class='glyphicon glyphicon-remove'></span>
										</a>
									</span>
									<span class='badge'>
										<?php echo $cont->price; ?> M
									</span>
									<?php echo $cont->player_name; ?>
								</li>
							<?php endforeach; ?>
						<?php else: ?>
							<li class="placeholder list-group-item">Add your Players here</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<h4>Batsmen</h4>
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>Player</th>
					<th>Points</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($batsmen as $cont) : ?>
			<?php $class_listed = in_array($cont->player_id,$curr_lineup) ? 'listed' : ''; ?>
				<tr>
					<td class="drag <?php echo $class_listed; ?>" data-id="<?php echo $cont->player_id; ?>" data-price="<?php echo $cont->price; ?>"><?php echo $cont->player_name; ?></td>
					<td><?php echo $cont->points; ?></td>
					<td><?php echo $cont->price; ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<h4>Bowlers</h4>
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>Player</th>
					<th>Points</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($bowlers as $cont) : ?>
			<?php $class_listed = in_array($cont->player_id,$curr_lineup) ? 'listed' : ''; ?>
				<tr>
					<td class="drag <?php echo $class_listed; ?>" data-id="<?php echo $cont->player_id; ?>" data-price="<?php echo $cont->price; ?>"><?php echo $cont->player_name; ?></td>
					<td><?php echo $cont->points; ?></td>
					<td><?php echo $cont->price; ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<h4>All Rounders</h4>
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>Player</th>
					<th>Points</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($all_rounders as $cont) : ?>
			<?php $class_listed = in_array($cont->player_id,$curr_lineup) ? 'listed' : ''; ?>
				<tr>
					<td class="drag <?php echo $class_listed; ?>" data-id="<?php echo $cont->player_id; ?>" data-price="<?php echo $cont->price; ?>"><?php echo $cont->player_name; ?></td>
					<td><?php echo $cont->points; ?></td>
					<td><?php echo $cont->price; ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<h4>Wicket Keepers</h4>
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>Player</th>
					<th>Points</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($wicket_keepers as $cont) : ?>
			<?php $class_listed = in_array($cont->player_id,$curr_lineup) ? 'listed' : ''; ?>
				<tr>
					<td class="drag <?php echo $class_listed; ?>" data-id="<?php echo $cont->player_id; ?>" data-price="<?php echo $cont->price; ?>"><?php echo $cont->player_name; ?></td>
					<td><?php echo $cont->points; ?></td>
					<td><?php echo $cont->price; ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>