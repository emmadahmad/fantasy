<!DOCTYPE html>
<html lang="en">
<head>
  <?php include(get_views_include_path() . 'generic/partials/head.php'); ?>
  <?php echo $template['partials']['head']; ?>
</head>
<body>
  <div class="modal fade" id="page_spinner" tabindex="-1" role="dialog" aria-labelledby="Loader" aria-hidden="true">
    <div class="modal-dialog modal-spinner">
      <div class="spin" data-spin>
      </div>
    </div>
  </div>
  <!-- START HEADER -->

  <?php echo $template['partials']['header']; ?>

  <!-- END HEADER -->

  <div class="container frontend">
    <!-- Main component for a primary marketing message or call to action -->
    <?php echo $template['body']; ?>
  </div> <!-- /container -->

  <?php echo $template['partials']['footer']; ?>
</body>
</html>