<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <meta http-equiv=?X-UA-Compatible? content=?IE=EmulateIE9?>
    <meta http-equiv=?X-UA-Compatible? content=?IE=9?>
    <link rel="shortcut icon" href="http://midclassified.com/property/assets/dummies/favicon.png">
    <title>Admin</title>
    <!--Core CSS -->
    <link href="<?php echo base_url();?>assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/clndr.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/uploadfile.css">
    <!--clock css-->
    <link href="<?php echo base_url();?>assets/js/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link rel="<?php echo base_url();?>assets/stylesheet" href="js/morris-chart/morris.css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet"/>
	<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.uploadfile.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    mode : "exact",
	elements:"cms_page_content, testimonial_page_content",
    editor_selector : "mceEditor",
	directionality :"ltr",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});

function set_session(lang)
{
    if(lang != '')
    {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>index.php/admin/set_session_lang",
            data: "language="+lang,
            success: function(msg) {
                location.reload();
            }
        });
    }
}
</script>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="#" class="logo"><?php echo $this->lang->line('logo');?></a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu"><?php echo $this->lang->line('welcome_dashboard');?>
    
    
</div>
<div class="top-nav clearfix">

    <!-- HEADER LANGUAGE : begin -->
    <div class="header-language">
        <?php 
        $lang = '';
$l = $this->session->userdata('language');
        if(empty($l)){
            $lang = 'EN';
        }
        else
        {
            if(trim($this->session->userdata('language')) == 'arabic'){
                $lang = 'AR';
            }
            else
            {
                $lang = 'EN';
            }
        }
        ?>
        <button class="header-btn" id="btn_active"><?php echo $lang; ?> <i class="fa fa-angle-down"></i></button> 
        <nav class="header-nav">
            <ul class="custom-list">
               <li class="active" id="li_english"><a href="javascript:void(0)" onClick="set_session('en');">EN</a></li>
                <li id="li_arabic"><a href="javascript:void(0)" onClick="set_session('ar');">AR</a></li>
            </ul>
        </nav>
    </div>
    <!-- HEADER LANGUAGE : end -->

    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!--<li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>-->
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="<?php echo base_url();?>assets/images/avatar1_small.jpg">
                <span class="username"><?php echo $this->session->userdata('admin_username'); ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
               <!-- <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>-->
                <li><a href="<?php echo base_url(); ?>index.php/admin/logout"><i class="fa fa-key"></i> <?php echo $this->lang->line('logout');?></a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
        <li>
            <div class="toggle-right-box">
                <div class="fa fa-bars"></div>
            </div>
        </li>
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                
				<li class="sub-menu">
                    <a class="active" href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span><?php echo $this->lang->line('property_management');?></span>
                    </a>
					 <ul class="sub">
                        <li><a href="<?php echo base_url();?>index.php/admin/list_package"><?php echo $this->lang->line('package_list');?></a></li>
                        <li><a href="<?php echo base_url();?>index.php/admin_package/add_package"><?php echo $this->lang->line('add_package');?></a></li>
						<li><a href="<?php echo base_url();?>index.php/admin_package/list_amenities"><?php echo $this->lang->line('list_amenities');?></a></li>
                        <li><a href="<?php echo base_url();?>index.php/admin_package/add_amenities"><?php echo $this->lang->line('add_amenities');?></a></li>
                    </ul>
					
                </li>
				<li class="sub-menu">
                    <a class="active" href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span><?php echo $this->lang->line('cms_management');?></span>
                    </a>
					 <ul class="sub">
                        <li><a href="<?php echo base_url();?>index.php/cms/add_cms"><?php echo $this->lang->line('add_cms_page');?></a></li>
                        <li><a href="<?php echo base_url();?>index.php/cms/list_cms"><?php echo $this->lang->line('list_cms_page');?></a></li>
						
                    </ul>
					
                </li>
				<li class="sub-menu">
                    <a class="active" href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span><?php echo $this->lang->line('testimonial_management');?></span>
                    </a>
					 <ul class="sub">
                        <li><a href="<?php echo base_url();?>index.php/testimonial/add_testimonial"><?php echo $this->lang->line('add_testimonial');?></a></li>
                        <li><a href="<?php echo base_url();?>index.php/testimonial/list_testimonial"><?php echo $this->lang->line('list_testimonial');?></a></li>
						
                    </ul>
					
                </li>
				<li class="sub-menu">
                    <a class="active" href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span><?php echo $this->lang->line('booking_management');?></span>
                    </a>
					 <ul class="sub">
                        
                        <li><a href="<?php echo base_url();?>index.php/admin_package/list_bookings"><?php echo $this->lang->line('list_bookings');?></a></li>
						
                    </ul>
					
                </li>
				
              
                    <a href="login.html">
                        <i class="fa fa-user"></i>
                        <span><?php echo $this->lang->line('login_page');?></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->