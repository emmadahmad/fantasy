<h2 class="page-header">Pages <small><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Add New Page</a></small></h2>
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
			<?php foreach($content as $cont): ?>
			<tbody>
				<tr>
					<td><?php echo $cont->page_id; ?></td>
					<td><?php echo $cont->page_name; ?></td>
					<td><?php echo $cont->page_content; ?></td>
					<td><span class="glyphicon glyphicon-pencil"></span></td>
					<td><span class="glyphicon glyphicon-trash"></span></td>
				</tr>
			</tbody>			
			<?php endforeach; ?>
		</table>
	</div>
</div>