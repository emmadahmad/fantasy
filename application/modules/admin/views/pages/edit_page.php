<h2 class="page-header">Update Page</h2>
<div class="inner_content">
	<form role="form" id="frm_edit_page" class="validate_form" action="<?php echo base_url(); ?>admin/form_requests/updatePage/<?php echo $page->page_name; ?>" method="post">
		<div class="form-group">
			<label for="exampleInputEmail1">Page Slug</label>
			<input type="text" class="form-control validate[required]" id="page_slug" name="page_slug" placeholder="Page Slug" data-prompt-position="topLeft" value="<?php echo $page->page_name; ?>">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Display Name</label>
			<input type="text" class="form-control validate[required]" id="page_name" name="page_name" placeholder="Page Name" value="<?php echo $page->display_name; ?>">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Content</label>
			<textarea class="form-control validate[required]" rows="3" id="page_content" name="page_content" placeholder="Page Content"><?php echo $page->page_content; ?></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Update</button>
		<a href="<?php echo base_url(); ?>admin/pages/" class="btn btn-default" role="button">Back</a>
		<input type="hidden" name="page_id" value="<?php echo $page->page_id; ?>">
	</form>
</div>