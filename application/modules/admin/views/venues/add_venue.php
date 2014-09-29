<h2 class="page-header">Add Venue</h2>
<div class="inner_content">
	<form role="form" id="frm_add_venue" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/addVenue" method="post">
		<div class="row">
			<div class="col-md-4">
				<label for="venue_name">Venue Name</label>
				<input type="text" class="form-control validate[required]" id="venue_name" name="venue_name" placeholder="Venue Name" data-prompt-position="topLeft">
			</div>
			<div class="col-md-4">
				<label for="venue_city">Venue City</label>
				<input type="text" class="form-control validate[required]" id="venue_city" name="venue_city" placeholder="Venue City" data-prompt-position="topLeft">
			</div>
			<div class="col-md-4">
				<label for="venue_capacity">Venue Capacity</label>
				<input type="text" class="form-control validate[required]" id="venue_capacity" name="venue_capacity" placeholder="Venue Capacity" data-prompt-position="topLeft">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-8">
				<label for="venue_description">Venue Description</label>
				<textarea class="form-control" rows="3" id="venue_description" name="venue_description" placeholder="Venue Description"></textarea>
			</div>
			<div class="col-md-4">
				<label for="venue_photo">Venue Photo</label>
				<input type="file" id="venue_photo" name="venue_photo">
    		<p class="help-block">Dimensions of photo</p>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Save</button>
				<a href="<?php echo base_url(); ?>admin/venues/" class="btn btn-default" role="button">Back</a>
			</div>
		</div>								
	</form>
</div>