<style type="text/css">
	.m {
		width: 700px;
		margin: 0 auto;
	}
	.dashboard-nav {
		width: 700px;
		float: left;
	}
	.dashboard-nav-title {
		width: 100px;
		float: left;
	}
	.dashboard-nav-nav {
		width: 500px;
		float: left;
	}
	.dashboard-nav-logout {
		width: 100px;
		float: left;
	}
</style>

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
	<p>
		一共有<?php echo $this->db->count_all('user');?>个用户<br>
		<?php echo $this->db->count_all('feedback');?>个反馈信息
	</p>
</div>