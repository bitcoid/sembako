<?php if (has_permission('Bonfire.Users.Manage')):?> 
	<a class="btn btn-small btn-primary" href="<?php echo site_url(SITE_AREA .'/settings/users') ?>"><?php echo lang('bf_users'); ?></a>
	<a class="btn btn-small btn-warning" href="<?php echo site_url(SITE_AREA .'/settings/users/create') ?>" id="create_new"><?php echo lang('bf_new') .' '. lang('bf_user'); ?></a>
  
<?php endif;?>
