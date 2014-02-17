<?php $this->load->view('admin/head.php'); ?>
<body>
<div class="m">
	<div class="dashboard-nav">
		<div class="dashboard-nav-title">后台管理</div>
		<div class="dashboard-nav-nav">
			<?php echo anchor('admin/user', '用户管理'); ?>
			<?php echo anchor('admin/feedback', '反馈管理'); ?>
		</div>
		<div class="dashboard-nav-logout">
			<?php echo anchor('admin/user/logout', '退出登陆'); ?>
		</div>
	</div>
	<hr/>
<?php $this->load->view($subview); ?>
<?php $this->load->view('admin/foot.php'); ?>