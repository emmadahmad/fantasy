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
      <a class="navbar-brand" href="../">Fantasy Cricket</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="<?php echo ($page_name==''?'active':''); ?>"><a href="../">Home</a></li>
        <li class="<?php echo ($page_name=='view_points'?'active':''); ?>"><a href="../fantasy/view_points">View Points</a></li>
        <li class="<?php echo ($page_name=='manage'?'active':''); ?>"><a href="../fantasy/manage">Manage</a></li>
        <li class="<?php echo ($page_name=='leagues'?'active':''); ?>"><a href="../fantasy/leagues">Leagues</a></li>
        <li class="<?php echo ($page_name=='stats'?'active':''); ?>"><a href="../fantasy/stats">Stats</a></li>
        <li class="<?php echo ($page_name=='fixtures'?'active':''); ?>"><a href="../fantasy/fixtures">Fixtures</a></li>
        <li class="<?php echo ($page_name=='leaderboard'?'active':''); ?>"><a href="../fantasy/leaderboard">Leaderboard</a></li>
        <li class="<?php echo ($page_name=='prizes'?'active':''); ?>"><a href="../fantasy/prizes">Prizes</a></li>
        <li class="dropdown <?php echo ($page_name=='how_to_play'||$page_name=='faqs'||$page_name=='terms'||$page_name=='contact'?'active':''); ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Help <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="<?php echo ($page_name=='how_to_play'?'active':''); ?>"><a href="../fantasy/how_to_play">How to Play</a></li>
            <li class="<?php echo ($page_name=='faqs'?'active':''); ?>"><a href="../fantasy/faqs">FAQs</a></li>
            <li class="<?php echo ($page_name=='terms'?'active':''); ?>"><a href="../fantasy/terms">T&amp;CS</a></li>
            <li class="<?php echo ($page_name=='contact'?'active':''); ?>"><a href="../fantasy/contact">Contact Us</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <p class="navbar-text">Emmad Ahmad</p>
        <li><a href="#">Logout</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>