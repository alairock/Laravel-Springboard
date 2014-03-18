<div id="sidebar">
	<!-- <div id="search">
		<input type="text" placeholder="Search here..."/><button type="submit" class="tip-right" title="Search"><i class="fa fa-search"></i></button>
	</div> -->
	<ul>
		<?php echo HTML::admin_clever_link('/admin/dashboard', 'Dashboard', 'fa-home'); ?>
		<?php $postsItems = [
			['route' => '/admin/posts', 'text' => 'All Posts'],
			['route' => '/admin/posts/create', 'text' => 'New Post']
		]; ?>
		<?php echo HTML::admin_clever_dropdown('/admin/posts', 'Posts', 'fa-file-text', $postsItems); ?>
		<?php $pagesItems = [
			['route' => '/admin/pages', 'text' => 'All Pages'],
			['route' => '/admin/pages/create', 'text' => 'New Page']
		]; ?>
		<?php echo HTML::admin_clever_dropdown('/admin/pages', 'Pages', 'fa-file', $postsItems); ?>
		<?php echo HTML::admin_clever_link('/admin/users', 'Users', 'fa-user'); ?>
		<?php $roleItems = [
			['route' => '/admin/roles', 'text' => 'Roles'],
			['route' => '/admin/permissions', 'text' => 'Permission']
		]; ?>
		<?php echo HTML::admin_clever_dropdown('/admin/roles', 'Roles', 'fa-lock', $roleItems); ?>
	</ul>

</div>
