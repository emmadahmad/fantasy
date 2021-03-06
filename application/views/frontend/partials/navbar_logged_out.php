<?php $page_name = $this->uri->segment(2); ?>
<!-- Static navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">Fantasy Cricket</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="<?php echo ($page_name==''?'active':''); ?>"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="<?php echo ($page_name=='prizes'?'active':''); ?>"><a href="<?php echo base_url(); ?>fantasy/prizes">Prizes</a></li>
        <li class="<?php echo ($page_name=='how_to_play'?'active':''); ?>"><a href="<?php echo base_url(); ?>fantasy/how_to_play">How to Play</a></li>
        <li class="<?php echo ($page_name=='faqs'?'active':''); ?>"><a href="<?php echo base_url(); ?>fantasy/faqs">FAQs</a></li>
        <li class="<?php echo ($page_name=='terms'?'active':''); ?>"><a href="<?php echo base_url(); ?>fantasy/terms">T&amp;CS</a></li>
        <li class="<?php echo ($page_name=='contact'?'active':''); ?>"><a href="<?php echo base_url(); ?>fantasy/contact">Contact Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url(); ?>fantasy/login">Login</a></li>
        <li><a href="<?php echo base_url(); ?>fantasy/signup">Register</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>