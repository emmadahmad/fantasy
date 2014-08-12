<?php include(get_views_include_path() . 'frontend/partials/head.php'); ?>
<!-- WARNING Do Not put swMAin div top of head -->
<?php include(get_views_include_path() . 'frontend/partials/top_nav.php'); ?>
<div id="wizard" class="swMain">
    <?php //include(get_views_include_path() . 'frontend/partials/wizard_tabs.php'); ?>
    <?php echo $template['body']; ?>	
</div>
