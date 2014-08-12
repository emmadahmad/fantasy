<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <?php header('X-UA-Compatible: IE=edge,chrome=1');?>
  <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="<?php if(isset($meta_keywords)) echo $meta_keywords; ?>" />
	<meta name="description" content="<?php if(isset($meta_description)) echo $meta_description; ?>" />  
	<link rel="icon" href="http://www.ccjk.com/wp-content/uploads/2013/04/favicon.ico" type="image/x-icon">
	<title><?php echo $template['title']; ?></title>
    <?php echo $template['metadata']; ?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <script src="<?php  echo frontend_theme_url(); ?>js/html5shiv.js"></script>
  <link type="text/css" rel="stylesheet" href="<?php  echo frontend_theme_url(); ?>css/jquery-ui.min.css" media="screen" />	
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/latest/css/styles.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/latest/css/developer.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/latest/css/validationEngine.jquery.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/latest/css/rateit.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/latest/css/ie-grid.css">
	<!--  START CUSTOM SCRIPTS  -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/latest/css/colorbox.css" />
  <!-- 
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:400italic,300,400,600,700|Droid+Serif:regular:italic:bold:bolditalic&amp;subset=latin,latin-ext">
-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/latest/css/fonts/webfonts/webfonts.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/latest/css/apk.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/latest/css/animate.css">

	<script type="text/javascript" src="<?php  echo frontend_theme_url(); ?>js/jquery.min.js"  charset="UTF-8"></script>
	<script src="<?php echo base_url(); ?>assets/latest/js/vendors/holder.js"  charset="UTF-8"></script>
	<script src="<?php  echo frontend_theme_url(); ?>/js/vendors/bootstrap.min.js"  charset="UTF-8"></script>
	<script type="text/javascript" src="<?php  echo frontend_theme_url(); ?>js/jquery-ui.min.js" charset="UTF-8"></script>	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/latest/js/vendors/jquery.flexisel.js"  charset="UTF-8"></script>

  <script src="<?php echo base_url(); ?>assets/latest/js/jquery.colorbox.js"  charset="UTF-8"></script>
  <script src="<?php echo base_url(); ?>assets/latest/js/vendors/organictabs.jquery.js"  charset="UTF-8"></script>
	<script type="text/javascript" src="<?php  echo frontend_theme_url(); ?>js/vendors/jquery.uniform.js" charset="UTF-8"></script>
	<script type="text/javascript" src="<?php  echo frontend_theme_url(); ?>js/developer.js" charset="UTF-8"></script>
  <script type="text/javascript" src="<?php  echo frontend_theme_url(); ?>js/jquery.creditCardValidator.js"  charset="UTF-8"></script>
  <script type="text/javascript" src="<?php  echo frontend_theme_url(); ?>js/creditcard.js"  charset="UTF-8"></script>
   <?php if(get_session('site_lang')=='chinese'): ?>
	<script src="<?php  echo frontend_theme_url(); ?>js/vendors/languages/jquery.validationEngine-zh_CN.js"  charset="UTF-8"></script>
	<?php else: ?>
        <script src="<?php  echo frontend_theme_url(); ?>js/vendors/languages/jquery.validationEngine-en.js"  charset="UTF-8"></script>
	<?php endif;?>
  <script src="<?php  echo frontend_theme_url(); ?>js/vendors/jquery.validationEngine.js"  charset="UTF-8"></script>
  <script src="<?php  echo frontend_theme_url(); ?>js/vendors/jquery.rateit.min.js"  charset="UTF-8"></script>

  <script src="<?php  echo frontend_theme_url(); ?>js/vendors/jquery.placeholder.js"  charset="UTF-8"></script>

	<script src="<?php  echo frontend_theme_url(); ?>js/jquery.blockUI.js"  charset="UTF-8"></script>   
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <script src="<?php  echo frontend_theme_url(); ?>js/respond.min.js"  charset="UTF-8"></script>
  <script src="<?php  echo frontend_theme_url(); ?>js/vendors/charts.js"  charset="UTF-8"></script> 
  <script src="<?php  echo frontend_theme_url(); ?>js/jquery.alphanumeric.pack.js"  charset="UTF-8"></script> 
    <script src="<?php  echo frontend_theme_url(); ?>js/vendors/jquery.cycle2.min.js"></script>
   <!-- IF IE - use Placeholder Fallback -->
<!--[if lt IE 10 ]>
<script>
    $("#frmLogin,#frmSignup").find('[placeholder]').each(function(){
    $(this).val($(this).attr('placeholder'));
    $(this).focus(function() {
      if ($(this).attr('placeholder')==$(this).val()) {
        $(this).val('');
      }
    });
  });
</script>
  <![endif]--> 
<script type="text/javascript">
var __lc = {};
__lc.license = 2316661;
__lc.group = 0;

(function() {
    var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
    lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
  })();
  
</script>  


<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-48054165-1', 'ccjk.com');
  ga('send', 'pageview');

</script>

</head>
 <?php if(get_session('site_lang')=='chinese')
 {?>
 <body class="chinese_fonts">
<?php } else {?> 
<body class="english_fonts">
<?php }?>
<div class="loader">

  <div class="loaderFade">
    <div class="loader_image"><img src="<?php echo frontend_theme_url(); ?>images/ui/loader.gif" alt=""/>&nbsp; Loading...</div>
  </div>

  </div>
  
  <div class="iframe-loader">

  <div class="iframe-loaderFade">
    <div class="iframe-loader_image"><img src="<?php echo frontend_theme_url(); ?>images/ui/loader.gif" alt=""/>&nbsp; Loading...</div>
  </div>

  </div>
<!-- topHeaderSection Start -->   
    <header class="topHeaderSection">  

        <div class="container">

            <div class="logo pull-left"> 
            
            <a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>assets/latest/images/content/logo.png" alt="logo"/></a>

            </div>
        <div class="loginarea pull-right"> 
          <div class="btn-group pull-left lang_button">
            <form id="frm_lang" method="post" action="<?php echo base_url();?>translation/frontend/projects/switch_language" >
              <button data-toggle="dropdown" class="btn btn-default dropdown-toggle language-btn" type="button">
                  <?php if(get_session('site_lang')=='english'){?>
                <img alt="flag" src="<?php echo base_url(); ?>assets/latest/images/content/eng-flag-icon.jpg" style="padding-right:3px;">English
                <?php }elseif (get_session('site_lang')=='chinese') {?>
                     <img alt="flag" src="<?php echo base_url(); ?>assets/latest/images/content/cn-flag-icon.jpg" style="padding-right:3px;">简体中文
                <?php }else{?>
                      <img alt="flag" src="<?php echo base_url(); ?>assets/latest/images/content/eng-flag-icon.jpg" style="padding-right:3px;">English
                     <?php }?>
                <span class="caret"></span>
              </button>

              <ul class="dropdown-menu">
                <li>
                  <a href="javascript:void(0);" onclick="setLanguage('chinese');">
                    <img alt="logo" src="<?php echo base_url(); ?>assets/latest/images/content/cn-flag-icon.jpg" style="padding-right:3px;">简体中文
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0);" onclick="setLanguage('english');" >
                    <img alt="logo" src="<?php echo base_url(); ?>assets/latest/images/content/eng-flag-icon.jpg" style="padding-right:3px;">English
                  </a>
                </li>
              </ul>
                <input type="hidden" id="lang" name="lang" value="english" />
                <input type="hidden" name="last_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
            </form>
          </div>

          <div class="btn-group pull-left tool_button">
            <button type="button" class="btn btn-default dropdown-toggle tools_btn" data-toggle="dropdown">
              <?php echo _e('land_tools')?>
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="javascript:void(0);" onclick="open_iframe('<?php echo base_url(); ?>translation/frontend/projects/word_calculator','word_calculator');"><?php echo _e('land_wordcount')?></a></li>
              <li><a href="javascript:void(0);" onclick="open_iframe('<?php echo base_url(); ?>translation/frontend/projects/calculate_price','price_calculator');"><?php echo _e('land_time_price')?></a></li>
            </ul>
          </div>
          <?php
				if (get_session('is_login')) 
                { 
			 ?>
			<ul class="nav nav-pills pull-left dashboard_button">
				<li><a href="<?php echo base_url(); ?>translation/frontend/projects/dashboard" ><?php echo _e('land_my_dashboard')?></a></li>
			</ul>
			<?php
				}

			 ?>
				
        <ul class="nav pull-left user_button">
            <li class="login" >
              <div  id="login" class="user_form login hide_element" >
                <div class="user_form_inner">
                  <a class="hide_login_box" href="javascript:void(0);" onclick="close_popup('#login')">
                    <img src="<?php echo base_url(); ?>assets/latest/images/ui/icon-delete.png" alt="Hide Get Translation Box">
                  </a>
                  <form id="frmLogin">
                    <div class="title_row">
                      <h3><?php echo _e('acnt_login')?></h3>
                    </div>
                    <div class="form_hr_row">
                      <label><?php echo _e('acnt_email_id')?> </label>
                      <input type="text"  name="email" id="user_name" class="form-control validate[required,custom[email]]" placeholder="<?php echo _e('email_placholder')?>" data-prompt-position="topLeft:150px"/>
                    </div>
                    <div class="form_hr_row">
                      <label><?php echo _e('password_placholder')?></label>
                      <input type="password"  id="password" name="password" class="form-control validate[required]" placeholder="<?php echo _e('password_placholder')?>" data-prompt-position="topLeft:150px"/>
                    </div>
                    <div class="form_hr_row submit_links">
			                <div id="error-loginf" class="hide_element" style="color:red;text-align:right;padding-bottom:10px;"></div>								
                      <a class="forgot_pass" href="/user/forgot" target="_blank"><?php echo _e('forgot_placholder')?>?</a>
                      <a class="not_member" href="javascript:void(0);" onclick="not_a_member();"><?php echo _e('not_a_member')?>?</a>
                      <input class="button medium gold" type="submit" value="<?php echo _e("acnt_login")?>" onclick="return onLogin()">
                    </div>
                  </form>
                </div>
              </div>
            </li>
          <?php
          if (!get_session('is_login')) 
            {  
            ?>
            <li class="login"><a href="javascript:void(0);" onclick="$('#login').fadeIn(1000);"><?php echo _e("acnt_login")?></a></li>
            <?php
           }
            ?>
            <?php
             if (get_session('is_login'))
              {
              ?>
            <li class="signed_button">
              <button type="button" class="button little default dropdown-toggle language-btn" data-toggle="dropdown">
                <?php 
                $fn = trim(get_session('first_name')); $ln = trim(get_session('last_name'));
                if($fn)
                {

                  echo $fn;
                }
                /*if(!($fn) && !($ln))
                {
                  echo get_session('email');
                }
                else
                {
                  if(($fn))
                  {
                    echo get_session('first_name');
                  }                    
                  if(($ln))
                  {
                    echo " ";
                    echo get_session('last_name');
                  } 
                } 
                  */
                ?>
                <span class="caret"></span>
                <span class="my_credit">
                  <?php 
                  
                  if(get_session('user_id'))
                    {
                      $user_total_credit = get_db_value('users', 'availble_credits', array('user_id' => get_session('user_id')));
					if(empty($user_total_credit))
					{
							$user_total_credit='0.0';
					}
                      echo "$".$user_total_credit;
                      //echo "$ ".get_session('availble_credits');
                    }
                    else 
                    {
                      echo "$0.0";
                    }
                  ?>
                </span>
              </button>
              <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url();  ?>user/user_profile" ><?php echo _e("acnt_title")?></a></li>
                  <li><a href="<?php echo base_url(); ?>translation/frontend/projects/transactions" ><?php echo _e("land_transcation_history")?> </a></li>
                  <li><a href="<?php echo base_url(); ?>user/logout_frontend" ><?php echo _e("acnt_logout")?> </a></li>
              </ul>
            </li>

              <?php
             }else{
              ?>
                <li class="active account-btn">
                  <a href="javascript:void(0);" onclick="$('#signup').fadeIn(1000);$('#messageSuccess').hide();"><?php echo _e("acnt_create")?> </a>
                  <div id="signup" class="user_form signup hide_element">      							  
                    <div class="user_form_inner">
                      <a class="hide_login_box" href="javascript:void(0);" onclick="close_popup('#signup');">
                        <img src="<?php echo base_url(); ?>assets/latest/images/ui/icon-delete.png" alt="Hide Get Translation Box">
                      </a>
                      <form id="frmSignup" >
                        <div class="title_row">
                          <h3><?php echo _e("email_signup")?></h3>
                        </div>
                        <div class="form_hr_row">
                          <label>  <?php echo _e("acnt_fname")?></label>
				                  <input name="first_name" id="first_name" type="text" class="form-control validate[required]"  placeholder="<?php echo _e("fname_placholder")?>" data-prompt-position="topLeft:150px"/>
                        </div>
                        <!--<div class="form_hr_row">
                          <label><?php echo _e("acnt_lname")?></label>
				                  <input name="last_name" id="last_name" type="text" class="form-control validate[required]"  placeholder="<?php echo _e("lname_placholder")?>" data-prompt-position="topLeft:150px"/>
                        </div>	-->						
                        <div class="form_hr_row">
                          <label><?php echo _e("contact_string06")?></label>
                          <input name="phone_number" id="phone" maxlength="15" type="text" class="form-control validate[required,custom[phone],custom[allzero]]"  placeholder="<?php echo _e("phone_placholder")?>" data-prompt-position="topLeft:150px" onfocus="validate_phone();"/>
                        </div>  

                        <div class="form_hr_row">
                          <label><?php echo _e("acnt_email_id")?> </label>
                          <input type="text" id="email" name="email" class="form-control validate[required,custom[email]]" placeholder="<?php echo _e("email_placholder")?>" data-prompt-position="topLeft:150px"/>
                        </div>
                        <div class="form_hr_row submit_links">
                          <div id="error-signupf" class="hide_element" style="color:red;text-align:right;padding-bottom:10px;"></div>
                          <a class="already_member" href="javascript:void(0);" onclick="already_a_member();"><?php echo _e('already_a_member')?>?</a>
                          <input id="btn_signup" class="button medium default" type="submit" value="<?php echo _e('email_signup')?>" onclick="return onSignUp();">
                        </div>
                      </form>
                    </div>
                  </div>

                  <div id="messageSuccess" class="user_form signup hide_element" style="display:none;">                     
                    <div class="user_form_inner">
                      <a class="hide_login_box" href="javascript:void(0);" onclick="return onSignUpSuccess();">
                        <img src="<?php echo base_url(); ?>assets/latest/images/ui/icon-delete.png" alt="Hide Get Translation Box">
                      </a>
                      <div id="signup_success" style="display:block;">
                        <div class="title_row">
                          <h3> <?php echo _e("acnt_signup_done")?></h3>
                        </div>
                        <div class="form_hr_row">
                          <p> <?php echo _e("acnt_created")?></p>
                        </div>
                        <div class="form_hr_row">
                          <input class="button medium default" type="button" value="<?php echo _e("acnt_ok")?>" onclick="return onSignUpSuccess();">
                        </div>
                      </div> 
                    </div>
                  </div>

                </li>
                <?php
              }
            ?>

        </ul>

      </div>


    </div>

    </header>
<!-- topHeaderSection End -->   
<?php 
// this code is to manage the selected menus

$pag_name =  $this->uri->segment(5);

if($pag_name=='web_development' or $pag_name=='mobile_development' or $pag_name=='desktop_development' or $pag_name=='content_management_system' or $pag_name=='corporate_website')
{

  $it_services = 'expanded';
  $lang_services = 'collapsed';
  $design_services = 'collapsed';
}
elseif($pag_name=='desktop_publishing' or $pag_name=='e-Book' or $pag_name=='e-magazine' or $pag_name=='website_design' or $pag_name=='animation' or $pag_name=='graphic_design' or $pag_name=='user_guide')
 {
  $it_services = 'collapsed';
  $lang_services = 'collapsed';
  $design_services = 'expanded';
}
else
{
  $it_services = 'collapsed';
  $lang_services = 'expanded';
  $design_services = 'collapsed';
}
?>
<!-- Top Nav Start -->
<div class="menu_section">
  <div class="top_nav">
    <nav class="main_menu">
      <a href="#" id="pull"><?php echo _e("land_menu")?></a>
      <ul class="collapsible_menu accor-menu">
            <li class="parent_menu">
                <a class="main_menu_item <?php echo $lang_services?>">
                  <span class="icon"><img src="<?php echo frontend_theme_url(); ?>images/content/icon-language.png" alt="Laguage icon"></span> 
                  <span class="text"><?php echo _e("land_services")?></span>
                </a>
                <ul class="expandible">
					
                    <li><a class="<?php echo ($this->uri->segment(4)==''?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects"><?php echo _e("land_doc_trans")?> </a></li>
                    <li><a href="<?php echo base_url(); ?>translation/frontend/projects/apk" class="<?php echo ($this->uri->segment(4)=='apk'?'isActive':''); ?>">APK <?php echo _e("land_trans")?> </a></li>
                    <li><a class="<?php echo ($pag_name=='transcription'?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects/contact_us/transcription/1"> <?php echo _e("land_transciption")?></a></li>
                    <li><a class="<?php echo ($pag_name=='voice_over'?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects/contact_us/voice_over/1"> <?php echo _e("land_voice_over")?> </a></li>
                    <li><a class="<?php echo ($pag_name=='subtitling'?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects/contact_us/subtitling/1"> <?php echo _e("land_subtitle")?></a></li>
<!--                    <li><a href="#"> <?php //echo _e("land_proof_reading")?> </a></li>-->
                </ul>
            </li>

            <li class="parent_menu">
                <a class="main_menu_item <?php echo $it_services?>" >
                  <span class="icon"><img src="<?php echo frontend_theme_url(); ?>images/content/icon-it.png" alt="IT icon"></span> 
                  <span class="text"><?php echo _e("land_sit_services")?></span>
                </a>
                <ul class="expandible">
                    <li><a class="<?php echo ($pag_name=='web_development'?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects/contact_us/web_development/1"><?php echo _e("land_web")?></a></li>
                    <li><a class="<?php echo ($pag_name=='mobile_development'?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects/contact_us/mobile_development/1"><?php echo _e("land_mob")?> </a></li>
                    <li><a class="<?php echo ($pag_name=='desktop_development'?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects/contact_us/desktop_development/1"><?php echo _e("land_desktop")?></a></li>
                    <li><a class="<?php echo ($pag_name=='content_management_system'?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects/contact_us/content_management_system/1"><?php echo _e("land_content")?></a></li>
                    <li><a class="<?php echo ($pag_name=='corporate_website'?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects/contact_us/corporate_website/1"><?php echo _e("land_corporate")?> </a></li>

                </ul>
            </li>

            <li class="parent_menu">
                <a class="main_menu_item <?php echo $design_services?>">
                  <span class="icon"><img src="<?php echo frontend_theme_url(); ?>images/content/icon-design.png" alt="Design icon"></span> 
                  <span class="text"><?php echo _e("land_design")?></span>
                </a>
                <ul class="expandible">
                    <li><a class="<?php echo ($pag_name=='desktop_publishing'?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects/contact_us/desktop_publishing/1"> <?php echo _e("land_desktop_pub")?> </a></li>
                    <li><a class="<?php echo ($pag_name=='e-Book'?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects/contact_us/e-Book/1"> <?php echo _e("land_ebook")?> </a></li>
                    <li><a class="<?php echo ($pag_name=='e-magazine'?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects/contact_us/e-magazine/1"><?php echo _e("land_emaginzine")?> </a></li>
                    <li><a class="<?php echo ($pag_name=='website_design'?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects/contact_us/website_design/1"> <?php echo _e("land_web_design")?>  </a></li>
                    <li><a class="<?php echo ($pag_name=='animation'?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects/contact_us/animation/1"><?php echo _e("land_animation")?> </a></li>
                    <li><a class="<?php echo ($pag_name=='graphic_design'?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects/contact_us/graphic_design/1"><?php echo _e("land_graphic_design")?>  </a></li>
                    <li><a class="<?php echo ($pag_name=='user_guide'?'isActive':''); ?>" href="<?php echo base_url(); ?>translation/frontend/projects/contact_us/user_guide/1"><?php echo _e("land_user_guide")?>  </a></li>
                </ul>
            </li>
        </ul>
    </nav>
  </div>
  <div class="sub_nav"></div>
</div>
<!-- Top Nav End -->

	<?php 
 //echo $this->router->fetch_module(); 
  //echo $this->uri->segment(2);
 $controller =  $this->router->fetch_class(); 
 $action = $this->router->method ;
  $dopdown_output = '';
if($controller=='projects' && $action=='index'){
  
} elseif($controller=='projects' && $action=='apk'){
  
}
else{
    if($controller=='projects' && $action=='unpaid_projects'){
    
   
           
}

  echo "<div class='container'>".$this->breadcrumb->output().$project_dropdown."</div></div></div>";
  
}
echo $template['body']; ?>
		 
  <!-- BOTTOM FOOTER  START --> 
<footer>
  <div class="upper-footer">
    <div class="container">
      <div class="trusted-logo text-center">
        <ul>
          <li><a ><img class="img-responsive" src="<?php echo frontend_theme_url(); ?>images/content/trusted-logo-1.jpg" alt="trusted logo"/></a></li>
          <li><a href="http://www.ccjk.com/wp-content/uploads/2013/09/iso-certificate.pdf"><img class="img-responsive" src="<?php echo frontend_theme_url(); ?>images/content/trusted-logo-2.jpg" alt="trusted logo"/></a></li>
          <li><a ><img class="img-responsive" src="<?php echo frontend_theme_url(); ?>images/content/trusted-logo-3.jpg" alt="trusted logo"/></a></li>
          <li><a href="http://www.ccjk.com/wp-content/uploads/2013/09/ata-certificate.pdf"><img class="img-responsive" src="<?php echo frontend_theme_url(); ?>images/content/trusted-logo-4.jpg" alt="trusted logo"/></a></li>
          <li><a href="http://www.ccjk.com/wp-content/uploads/2013/09/tac.pdf"><img class="img-responsive" src="<?php echo frontend_theme_url(); ?>images/content/trusted-logo-5.jpg" alt="trusted logo"/></a></li>
          <li><a ><img class="img-responsive" src="<?php echo frontend_theme_url(); ?>images/content/trusted-logo-6.jpg" alt="trusted logo"/></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- BOTTOM FOOTER  START --> 
  <?php if(get_session('site_lang')=='chinese')
  {
    $lang_char = 'cn.';
  }
  else
  {
    $lang_char ='';
  }
  ?>
  <div class="bottom-footer">
    <div class="container">
      <div class="copyright text-center">
        <p><?php echo _e('land_copy_right')?></p>
        <ul>
          <li><a href="http://www.<?php echo $lang_char?>ccjk.com/contact/"><?php echo _e('land_contact_us')?></a></li>
          <li>|</li>
          <li><a href="http://www.<?php echo $lang_char?>ccjk.com/faqs/"><?php echo _e('land_faqs')?></a></li>
          <li>|</li>
          <li><a href="http://www.<?php echo $lang_char?>ccjk.com/privacy-statement/"><?php echo _e('land_privacy')?></a></li>
          <li>|</li>
          <li><a href="http://www.<?php echo $lang_char?>ccjk.com/terms-of-use/"><?php echo _e('land_terms')?></a></li>
          <li>|</li>
          <li><a href="http://www.<?php echo $lang_char?>ccjk.com/terms-of-use#rp"><?php echo _e('land_refund_policy')?></a></li>
          
        </ul>
      </div>
    </div>
  </div>

  <!-- BOTTOM FOOTER  START -->
</footer>
<!-- BOOTTOM FOOTER  END -->

<!-- START SEND EMAIL POPUP -->
<div id="email" class="user_form login hide_element" style="display: none;">
  <div class="user_form_inner">
    <a class="hide_login_box" href="javascript:void(0);" onclick="$('#email').fadeOut(1000);">
      <img src="<?php echo frontend_theme_url(); ?>images/ui/icon-delete.png" alt="Hide Get Translation Box">
    </a>
    <form id="frmSendEmail">
      <div class="title_row">
        <h3><?php echo _e('land_email_file');?> </h3>
      </div>
      <input type="hidden" name="file_id" id="file_id"> 
      <div class="form_hr_row">
        <label><?php echo _e('acnt_email_id');?>  </label>
        <input type="text" name="email" id="send_email" class="form-control validate[required,custom[email]]" placeholder="<?php echo _e('email_placholder');?>" data-prompt-position="topLeft:150px">
      </div>
      <div class="form_hr_row">
      <div id="error-loginf" class="hide_element" style="color:red;text-align:right;padding-bottom:10px;"></div>
        <input class="button small default pull-right" type="submit" value="<?php echo _e('det_send');?> " onclick="return onEmailSend()" id="send_file_btn">
      </div>
    </form>
  </div>
</div>
<!-- START SEND EMAIL POPUP -->

<!-- START question detailL POPUP -->
<div id="question_div" class="user_form login hide_element" style="display: none;">
  <div class="user_form_inner">
    <a class="hide_login_box" href="javascript:void(0);" onclick="$('#question_div').fadeOut(1000);">
      <img src="<?php echo frontend_theme_url(); ?>images/ui/icon-delete.png" alt="Hide Get Translation Box">
    </a>
    
      <div class="title_row">
        <h3><?php echo _e('question_detail_title');?></h3>
      </div>
      
      <div class="form_hr_row" id="question_details">
        
        
      </div>
      
   
  </div>
</div>
<!-- End question detail popup -->

  <div id="loggedInMsg" class="user_form login hide_element" style="display: none;">
      <div class="user_form_inner">
          <a class="hide_login_box" href="javascript:void(0);" onclick="$('#loggedInMsg').fadeOut(1000);">
            <img src="<?php echo frontend_theme_url(); ?>images/ui/icon-delete.png" alt="Hide Get Translation Box">
            </a>
                        <div class="title_row">
                          <h3><?php echo _e('land_already_login');?></h3>
                        </div>
                        <div class="form_hr_row">
                          <p id="loggedin_msg"><?php echo _e('land_try_link');?></p>
                        </div>
                        
      </div>
                      </div>

<script type="text/javascript">
  $(window).load(function() {
   
  });


  function setLanguage(lang)
  {
      $("#lang").val(lang);
      document.getElementById('frm_lang').submit();
  }
  $(function() {
    var pull    = $('#pull');
      menu    = $('nav > ul');
      menuHeight  = menu.height();

    $(pull).on('click', function(e) {
      e.preventDefault();
      menu.slideToggle();
    });

    $(window).resize(function(){
        var w = $(window).width();
        if(w > 320 && menu.is(':hidden')) {
          menu.removeAttr('style');
        }
    });
  });

  $(document).ready(function() 
  {      
 $(".flexisel_language_pairs").flexisel({
      visibleItems: 5,
      animationSpeed: 250,
      autoPlay: true,
      autoPlaySpeed: 4000,            
      pauseOnHover: true,
      enableResponsiveBreakpoints: true,
      responsiveBreakpoints: { 
        portrait: { 
          changePoint:480,
          visibleItems: 1
        }, 
        landscape: { 
          changePoint:768,
          visibleItems: 3
        },
        tablet: { 
          changePoint:960,
          visibleItems: 5
        }
      }
    });

    $(".flexisel_our_clients").flexisel({
        visibleItems: 6,
        animationSpeed: 250,
        autoPlay: true,
        autoPlaySpeed: 4000,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 3
            },
            tablet: { 
                changePoint:768,
                visibleItems: 5
            }
        }
    });

	   $("select").not('#dashboard_select,#dashboard_select1').uniform(); 
             $("#dashboard_select,#dashboard_select1").change(function()
                {

                    if($(this).val()=='create_project')
                    {
                        open_iframe('<?php echo base_url(); ?>translation/frontend/projects/order/clear','order');
                    }else if($(this).val()=='view_all')
                    {
                        document.location.href="<?php echo base_url(); ?>translation/frontend/projects/projects_list/";
                    }else if($(this).val()=='view_unpaid')
                    {
                        document.location.href="<?php echo base_url(); ?>translation/frontend/projects/unpaid_projects/";
                    }
                    //document.location.href = $(this).val();
                });
     $('#messageSuccess').hide();
    setTimeout(function() {     
      // Accordion
      $('.collapsible_menu > li > a.expanded + ul').slideToggle('medium');
      $('.collapsible_menu > li > a').click(function() {
        $('.collapsible_menu > li > a.expanded').not(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').slideToggle('medium');
        $(this).toggleClass('expanded').toggleClass('collapsed').parent().find('> ul').slideToggle('medium');
      });
    }, 250);

	$(".flexisel_language_pairs").show();

  });
</script>

 <script>

	function onLogin()
	{
    $('#error-loginf').text('');
	 // $('#frmLogin').validationEngine('hideAll');
    //  if($("#frmLogin").validationEngine('validate'))
    var validForm  = $('#frmLogin').validationEngine('validate');
   // $(".formError").css("z-index", 15000);
	if(validForm)
	  {

                $.ajax({
                    type: "POST",
                    url:'/user/login_frontend',
                    data: $('#frmLogin').serialize(),
                    beforeSend: function () {
                        
                    },
                    complete: function () {
                        
                        // $('#error-loginf').text('');
                    },
                    success: function (userStatus) {
                        //console.log(userStatus);
                       
                        if (userStatus == 1) 
						{
                                                  
              $("#frmSignup")[0].reset();
              <?php 
              $forward_url='';
              if(get_session('forward_detail')){?>
                 <?php $forward_url = get_session('forward_detail');
                    unset_session('forward_detail');
              }
              if($forward_url!='')
              {
                 ?>
                 window.location='<?php echo $forward_url; ?>' ;
                 
                 
              <?php }  else { ?>
                  window.location='<?php echo base_url(); ?>translation/frontend/projects/dashboard/'; 
            <?php    } ?>
        
								
                        } 
						else 
						{
                            $('#error-loginf').text('<?php echo _e('enter_correcct_pass')?>');
                            $("#error-loginf").fadeIn(100);
                         }
                    }
                });       
				
      }
      return false;
	}
	function onSignUp()
	{
    $('#messageSuccess').hide();
	  //$('#frmSignup').validationEngine('hideAll');
	 //  if($('#frmSignup').find("#user_name").val()=="" || $('#frmSignup').find("#email").val()=="")
	 //  {
		// return false;
	 //  }
     // if($("#frmSignup").validationEngine('validate'))
    var validForm  = $('#frmSignup').validationEngine('validate');
   // $(".formError").css("z-index", 15000);
  if(validForm)
	  {
      $('#btn_signup').addClass('disabled');
                $.ajax({
                    type: "POST",
                    url: '/user/signup_frontend',
                    data: $('#frmSignup').serialize(),
                    beforeSend: function () {
                        
                    },
                    complete: function () {
                      
                    },
                    success: function (userStatus) {
                        if (userStatus == 1)
            						{
                          $('#error-signupf').html('');
                          $('#frmSignup')[0].reset();
                          $('#signup').hide();
                          $('#messageSuccess').show();
                          //$('#signup').fadeOut(500);
            							//window.location='<?php echo base_url(); ?>translation/frontend/projects/dashboard/';
                        }
                        if (userStatus == 3) {
                            $('#btn_signup').removeClass('disabled');
                            $('#error-signupf').html('<?php echo _e("lbl_already_exists")?>');
                            $("#error-signupf").fadeIn(100);    
                        }
                    }
                });      
      }	
		return false;	  
	}

  function onSignUpSuccess()
  {
    window.location='<?php echo base_url(); ?>translation/frontend/projects/dashboard/';
    $('#signup').hide();
    $('#messageSuccess').hide();
    $('#frmSignup').show();
  }

  function onEmailSend(){
     $('#frmSendEmail').validationEngine('hideAll');
      var validForm  = $('#frmSendEmail').validationEngine('validate');
      if(validForm){
        $('#send_file_btn').addClass('disabled');
         $.ajax({
                    type: "POST",
                     url: '/translation/frontend/projects/send_email',
                    data: $('#frmSendEmail').serialize(),
                    beforeSend: function () {
                        // $.growlUI('', 'Sending file...');
                    },
                    complete: function () {
                      
                        // $('#error-loginf').text('');
                    },
                    success: function (userStatus) {
                        if (userStatus == 1) 
                        {
                          $('#send_file_btn').removeClass('disabled');
                         $('#send_email').val('');
                          $('#email').fadeOut(1000);
                           $.growlUI('', '<?php echo _e("your_email_send")?>');
             // window.location='<?php echo base_url(); ?>translation/frontend/projects/dashboard/';
                        }
                        // if (userStatus == 3) {
                        //     $('#error-signupf').html('Oops! Email already exists.');
                        //     $("#error-signupf").fadeIn(100);
    
                        // }
                    }
                });      
      }
      return false;  
  }
  function LoggedIn_box(flag){
  
  if(flag == 1){
      $('#loggedInMsg').fadeIn(1000);;
//   var text =   "Please logout and try to signup with another account";
//      $('#loggedin_msg').text(text);
    }
    else if(flag == 2){
        $('#loggedInMsg').fadeIn(1000);;
//   var text =   "Please logout and try to login with another account";
//      $('#loggedin_msg').text(text); 
    }
    }
  

window.setInterval(function(){
  /// call your function here
 words_translate();
}, 60000);
  function words_translate()
  {
    $.ajax({
                    type: "POST",
                    url: '/translation/frontend/projects/words_translated',
                   
                    success: function (html) 
                    {                      
                      $('#words_translated').html(html);
                    }
                });   
}
function not_a_member()
{
	close_popup('#login');
	$('#signup').fadeIn(1000);
	$('#messageSuccess').hide();
}
function already_a_member()
{
	close_popup('#signup');
	$('#login').fadeIn(1000);
}



</script> 


<!--  END CUSTOM SCRIPTS  -->
<div id="prizm-cloud-container">
<div class="documents-for-switching" id="documents-for-switching"></div>
<div class="prizm-cloud-viewer" id="prizm-cloud-viewer"></div>

</div>
</body>
</html>