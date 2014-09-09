<h2 class="page-header">Add Country</h2>
<div class="inner_content">
	<form role="form" id="frm_add_country" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/addCountry" method="post">
		<div class="form-group">
			<label for="country_name">Country Name</label>
			<input type="text" class="form-control validate[required]" id="country_name" name="country_name" placeholder="Country Name" data-prompt-position="topLeft">
		</div>
		<div class="form-group">
			<label for="country_flag">Country Flag</label>
			<input type="file" id="country_flag" name="country_flag">
    		<p class="help-block">Dimensions of flag</p>
		</div>
		<button type="submit" class="btn btn-primary">Save</button>
		<a href="<?php echo base_url(); ?>admin/countries/" class="btn btn-default" role="button">Back</a>
	</form>
</div>