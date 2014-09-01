<?php if(isset($alert)): ?>
	<div class="alert alert-<?php echo $alert_type; ?>">
		<?php echo $alert_message; ?>
	</div>
<?php endif; ?>
<h2 class="page-header">Pages <small><a href="<?php echo base_url(); ?>admin/pages/add_page"><span class="glyphicon glyphicon-plus-sign"></span> Add New Page</a></small></h2>
<div class="inner_content">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>				
					<th>Page Id</th>
					<th>Page Name</th>
					<th>Readable Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<?php if(!empty($pages)): ?>
				<?php foreach($pages as $cont): ?>
				<tbody>
					<tr>
						<td><?php echo $cont->page_id; ?></td>
						<td><?php echo $cont->page_name; ?></td>
						<td><?php echo $cont->display_name; ?></td>
						<td><a href="<?php echo base_url(); ?>admin/pages/edit_page/<?php echo $cont->page_name; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
						<td><a href="<?php echo base_url(); ?>admin/deletePage/<?php echo $cont->page_name; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
					</tr>
				</tbody>			
				<?php endforeach; ?>
			<?php else: ?>
				<tbody>
					<tr>
						<td colspan="5" class="text-center">No Data Available</td>
					</tr>
				</tbody>
			<?php endif; ?>
		</table>
	</div>
</div>