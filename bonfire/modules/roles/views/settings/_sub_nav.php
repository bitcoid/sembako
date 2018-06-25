<?php

$testSegment = $this->uri->segment(4);
$rolesUrl = site_url(SITE_AREA . '/settings/roles');

?>
 
	 
		<a class="btn btn-small btn-primary" href="<?php echo $rolesUrl; ?>"><?php echo lang('role_roles'); ?></a>
 
	<?php if (has_permission('Bonfire.Roles.Add')) : ?> 
		<a class="btn btn-small btn-primary" href='<?php echo "{$rolesUrl}/create"; ?>' id='create_new'><?php echo lang('role_new_role'); ?></a>
	 
	<?php endif;?>
	 <a class="btn btn-small btn-primary" href='<?php echo "{$rolesUrl}/permission_matrix"; ?>'><?php echo lang('matrix_header'); ?></a>
 