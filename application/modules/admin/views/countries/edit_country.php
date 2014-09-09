<h2 class="page-header">Update Country</h2>
<div class="inner_content">
	<form role="form" id="frm_edit_country" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/updateCountry/<?php echo $country->country_id; ?>" method="post">
		<div class="form-group">
			<label for="country_name">Country Name</label>
			<input type="text" class="form-control validate[required]" id="country_name" name="country_name" placeholder="Country Name" value="<?php echo $country->country_name; ?>">
		</div>
		<div class="form-group">
			<label for="country_flag">Country Flag</label>
			<input type="file" id="country_flag" name="country_flag">
    		<p class="help-block">Dimensions of flag</p>
		</div>
		<button type="submit" class="btn btn-primary">Update</button>
		<a href="<?php echo base_url(); ?>admin/countries/" class="btn btn-default" role="button">Back</a>
		<input type="hidden" name="country_id" value="<?php echo $country->country_id; ?>">
	</form>
</div>