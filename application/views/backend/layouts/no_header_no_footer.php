<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $template['title']; ?></title>

	 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/vendors/bootstrap/css/bootstrap.css">
	 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css">
</head>
<body>
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <?php echo $template['body']; ?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/frontend/js/vendors/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/js/vendors/bootstrap.min.js"></script>	
</body>
</html>