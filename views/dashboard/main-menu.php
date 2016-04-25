<div class="d-db-main-menu">
	<div class="d-db-main-menu-container">

		<div class="d-db-main-menu-item <?php echo $fileName == 'chart' ? 'd-db-main-menu-item-active' : ''; ?> ">
			<i class="fa fa-line-chart"></i>
			<span>Charts</span>
			<a href="<?php echo URL . 'dashboard'; ?>"></a>
		</div>
		<div class="d-db-main-menu-item <?php echo $fileName == 'list_users' ? 'd-db-main-menu-item-active' : ''; ?>">
			<i class="fa fa-user"></i>
			<span>Users</span>
			<a href="<?php echo URL . 'dashboard/list_users';  ?>"></a>
		</div>
		<div class="d-db-main-menu-item <?php echo $fileName == 'post' ? 'd-db-main-menu-item-active' : ''; ?>">
			<i class="fa fa-newspaper-o"></i>
			<span>Posts</span>
			<a href=""></a>
		</div>
		
	</div>
</div>