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

  <div class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
      <h1>Navbar example</h1>
      <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
      <p>To see the difference between static and fixed top navbars, just scroll.</p>
      <p>
        <a class="btn btn-lg btn-primary" href="/prizes" role="button">View navbar docs &raquo;</a>
      </p>
    </div>
    <?php echo $template['body']; ?>
  </div> <!-- /container -->

  <?php echo $template['partials']['footer']; ?>
</body>
</html>