<div id="sidebar">
	<!-- <div id="search">
		<input type="text" placeholder="Search here..."/><button type="submit" class="tip-right" title="Search"><i class="fa fa-search"></i></button>
	</div> -->
	<ul>
		<?php echo HTML::admin_clever_link('/admin/dashboard', 'Dashboard', 'fa-home'); ?>
		<?php echo HTML::admin_clever_link('/admin/users', 'Users', 'fa-user'); ?>
		<?php $roleItems = [
			['route' => '/admin/roles', 'text' => 'Roles'],
			['route' => '/admin/permissions', 'text' => 'Permission']
		]; ?>
		<?php echo HTML::admin_clever_dropdown('/admin/roles', 'Roles', 'fa-lock', $roleItems); ?>
	</ul>

</div>
