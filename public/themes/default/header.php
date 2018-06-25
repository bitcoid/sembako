<?php

Assets::add_css(array('bootstrap.min.css', 'bootstrap-responsive.min.css'));

Assets::add_js('bootstrap.min.js');

$inline  = '$(".dropdown-toggle").dropdown();';
$inline .= '$(".tooltips").tooltip();';
Assets::add_js($inline, 'inline');

?>
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
    <!-- CSS Files -->
    <link href="<?php echo Template::theme_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" /> 
	<link href="<?php echo Template::theme_url('assets/css/loginstyle.css');?>?<?php date('his');?>" rel="stylesheet" /> 
	<script src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js"></script>   
</head>
<body>
<div class="image-container set-full-height"  >
  
   
    


