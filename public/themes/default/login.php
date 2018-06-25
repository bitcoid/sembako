<?php echo theme_view('header'); ?>   

   
	<?php
    echo isset($content) ? $content : Template::content();

    echo theme_view('footer', array('show' => false));
?>