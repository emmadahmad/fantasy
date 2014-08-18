<?php $page_name = $this->uri->segment(2); ?>
<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li class="<?php echo ($page_name==''?'active':''); ?>"><a href="<?php echo base_url(); ?>admin">Overview</a></li>
    <li class="<?php echo ($page_name=='pages'?'active':''); ?>"><a href="<?php echo base_url(); ?>admin/pages">Pages</a></li>
    <li class="<?php echo ($page_name=='countries'?'active':''); ?>"><a href="<?php echo base_url(); ?>admin/countries">Countries</a></li>
    <li class="<?php echo ($page_name=='players'?'active':''); ?>"><a href="<?php echo base_url(); ?>admin/players">Players</a></li>
  </ul>
  <ul class="nav nav-sidebar">
    <li class="<?php echo ($page_name=='teams'?'active':''); ?>"><a href="<?php echo base_url(); ?>admin/teams">Teams</a></li>
    <li class="<?php echo ($page_name=='#'?'active':''); ?>"><a href="<?php echo base_url(); ?>admin/pages">Nav item again</a></li>
    <li class="<?php echo ($page_name=='#'?'active':''); ?>"><a href="<?php echo base_url(); ?>admin/pages">One more nav</a></li>
    <li class="<?php echo ($page_name=='#'?'active':''); ?>"><a href="<?php echo base_url(); ?>admin/pages">Another nav item</a></li>
    <li class="<?php echo ($page_name=='#'?'active':''); ?>"><a href="<?php echo base_url(); ?>admin/pages">More navigation</a></li>
  </ul>
  <ul class="nav nav-sidebar">
    <li class="<?php echo ($page_name=='#'?'active':''); ?>"><a href="">Nav item again</a></li>
    <li class="<?php echo ($page_name=='#'?'active':''); ?>"><a href="">One more nav</a></li>
    <li class="<?php echo ($page_name=='#'?'active':''); ?>"><a href="">Another nav item</a></li>
  </ul>
</div>