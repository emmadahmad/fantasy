<h2 class="page-header">Add Match</h2>
<div class="inner_content">
	<form role="form" id="frm_add_match" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/addMatch" method="post">
		<div class="row">			
			<div class="col-md-4">
				<label for="home_team">Home Team</label>
				<?php echo form_dropdown('home_team', $countries, 0, 'id="home_team" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
			</div>
			<div class="col-md-4">
				<label for="away_team">Away Team</label>
				<?php echo form_dropdown('away_team', $countries, 0, 'id="away_team" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
			</div>
			<div class="col-md-4">
				<label for="match_venue">Venue</label>
				<?php echo form_dropdown('match_venue', $venues, 0, 'id="match_venue" class="form-control validate[required]" data-prompt-position="topLeft"'); ?>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
					<label for="venue">Date</label>
	                <div class='input-group date date_only' id='match_date'>
	                    <input name="match_date" type='text' class="form-control validate[required]" placeholder="Date"/>
	                    <span class="input-group-addon">
	                    	<span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>
	            </div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label for="venue">Time</label>
	                <div class='input-group date time_only' id='match_time'>
	                    <input name="match_time" type='text' class="form-control validate[required]" placeholder="Time"/>
	                    <span class="input-group-addon">
	                    	<span class="glyphicon glyphicon-time"></span>
	                    </span>
	                </div>
	            </div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Save</button>
				<a href="<?php echo base_url(); ?>admin/matches/" class="btn btn-default" role="button">Back</a>
			</div>
		</div>								
	</form>
</div>