<h2 class="page-header">Add Player</h2>
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
			<div id="player_info" class="panel-collapse collapse in">
				<div class="panel-body">
					<form role="form" id="frm_add_player_info" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/addPlayerInfo" method="post">
						<div class="row">
							<div class="col-md-4">
								<label for="player_name">Player Name</label>
								<input type="text" class="form-control validate[required]" id="player_name" name="player_name" placeholder="Player Name" data-prompt-position="topLeft">
							</div>
							<div class="col-md-4">
								<label for="country">Country</label>
								<?php echo form_dropdown('country', $countries, 0, 'id="countries" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
							</div>
							<div class="col-md-4">
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
			<div id="batting_details" class="panel-collapse collapse">
				<div class="panel-body">
					<form role="form" id="frm_add_batting_info" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/addBattingInfo" method="post">
						<div class="row">
							<div class="col-md-4">
								<label for="player_name">Player Name</label>
								<input type="text" class="form-control validate[required]" id="player_name" name="player_name" placeholder="Player Name" data-prompt-position="topLeft">
							</div>
							<div class="col-md-4">
								<label for="country">Country</label>
								<?php echo form_dropdown('country', $countries, 0, 'id="countries" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
							</div>
							<div class="col-md-4">
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
			<div id="bowling_details" class="panel-collapse collapse">
				<div class="panel-body">
					Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				</div>
			</div>
		</div>
	</div>
</div>