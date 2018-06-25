 <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?php echo base_url();?>favicons/manifest.json">
	<link rel="mask-icon" href="<?php echo base_url();?>favicons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">

    <title><?php echo isset($toolbar_title) ? $toolbar_title .' : ' : ''; ?> <?php echo $this->settings_lib->item('site.title') ?></title> 

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo base_url();?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url();?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
	<!--steps-->
	<link href="<?php echo base_url(); ?>assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet"> 
	<link href="<?php echo base_url();?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/plugins/textSpinners/spinners.css" rel="stylesheet"> 
	<link href="<?php echo base_url();?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
	
	<!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/js/jquery-2.1.1.js"></script>
	<!-- Sweet Alert -->
    <link href="<?php echo base_url();?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/js/jquery.loading.css" rel="stylesheet" type="text/css" />
	 
	
    <link href="<?php echo base_url();?>assets/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
	
</head>
<body class="skin-3">
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
					<center>
                            <img alt="image" class="img-responsive" src="<?php echo base_url();?>upload/Lambang_Polri.png" style="width:100px;"/>
							<h4 style="color:white;">GAYO LUES ACEH</h4>
                    </center>
                         
                    </div>
                    <div class="logo-element">
                        OPEN HF
                    </div>
                </li>
				<li>
                    <a href="<?php echo site_url('admin/content');?> "><i class="fa fa-files-o"></i> <span class="nav-label">Dashboard</span> </a> 
                </li>
                <?php echo Contexts::render_menu('icon', 'normal'); ?>
            </ul>

        </div>
    </nav>
  
   <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a> 
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to <?php echo (isset($current_user->display_name) && !empty($current_user->display_name)) ? $current_user->display_name : ($this->settings_lib->item('auth.use_usernames') ? $current_user->username : $current_user->email); ?>.</span>
                </li> 
                <li>
                    <a href="<?php echo site_url('logout'); ?>">
                        <i class="fa fa-sign-out"></i> <?php echo lang('bf_action_logout')?> 
                    </a>
                </li>
                 
            </ul>

        </nav>
  </div> 
  
		
  <div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>
				<?php if (isset($toolbar_title)) : ?>
                 <?php echo $toolbar_title ?> 
                <?php endif; ?></h2>
				<ol class="breadcrumb">
					<li>
						<a href="<?php echo base_url('admin');?>">Home</a>
					</li>
					<li class="active">
						<strong>
						<?php 
						if(isset($custom_crumb)){ 
							foreach($custom_crumb as $key => $val)  
							{  
								if($val['url'] == '#'){
								  echo ucfirst($val['name']); 
								}else{
								  echo '<a href="'.site_url('/'.$val['url']).'">'.ucfirst($val['name']).'</a> / '; 	
								}
							}
						}
						?>
						</strong>
					</li>
				</ol>
			</div> 
  </div>
  