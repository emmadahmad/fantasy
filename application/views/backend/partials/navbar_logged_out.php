<?php $page_name = $this->uri->segment(2); ?>
<!-- Static navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>admin">Fantasy Cricket</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="<?php echo ($page_name=='login'?'active':''); ?>"><a href="<?php echo base_url(); ?>admin/login">Login</a></li>
        <li><a href="#">Help</a></li>
      </ul>
    </div>
  </div>
</div>