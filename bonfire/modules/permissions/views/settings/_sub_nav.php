<?php

$testSegment = $this->uri->segment(4);
$settingsUrl = site_url(SITE_AREA . '/settings');

?>

<a class="btn btn-small btn-primary" href='<?php echo "{$settingsUrl}/permissions"; ?>'><?php echo lang('bf_action_list'); ?></a>
<a class="btn btn-small btn-warning" href='<?php echo "{$settingsUrl}/permissions/create"; ?>' id="create_new"><?php echo lang('bf_action_create'); ?></a>
<a class="btn btn-small btn-danger" href='<?php echo "{$settingsUrl}/roles/permission_matrix"; ?>'><?php echo lang('permissions_matrix'); ?></a>
 