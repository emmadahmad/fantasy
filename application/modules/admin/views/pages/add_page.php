<h2 class="page-header">Add Page</h2>
<div class="inner_content">
	<form role="form" id="frm_add_page" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/addPage" method="post">
		<div class="form-group">
			<label for="exampleInputEmail1">Page Slug</label>
			<input type="text" class="form-control validate[required]" id="page_slug" name="page_slug" placeholder="Page Slug" data-prompt-position="topLeft">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Display Name</label>
			<input type="text" class="form-control validate[required]" id="page_name" name="page_name" placeholder="Page Name">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Content</label>
			<textarea class="form-control validate[required]" rows="3" id="page_content" name="page_content" placeholder="Page Content"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Save</button>
		<a href="<?php echo base_url(); ?>admin/pages/" class="btn btn-default" role="button">Back</a>
	</form>
</div>