<?php

Assets::add_js(array( 'jwerty.js'), 'external', true);

echo theme_view('header');

?>  
<div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
			<?php Template::block('sub_nav', ''); ?>
			<br><br>			
	    <div class="ibox-content">
		<?php  
			echo Template::message();
            echo isset($content) ? $content : Template::content();
        ?> 
	    </div>
     </div>
 </div>
			
<?php echo theme_view('footer'); ?>