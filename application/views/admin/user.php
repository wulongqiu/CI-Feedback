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
		<table width="100%">
			<tr>
				<td width="70%">登陆邮箱</td>
				<td width="30%">相关操作</td>
			</tr>
		<?php if(count($users)): foreach($users as $user): ?>
			<tr>
				<td><?php echo anchor('admin/user/edit/' . $user->id, $user->email);?></td>
				<td>
					<?php echo anchor('admin/user/edit/' . $user->id, '编辑'); ?>
					&nbsp;&nbsp;
					<?php echo anchor('admin/user/delete/' . $user->id, '删除'); ?>
				</td>
			</tr>
		<?php endforeach;?>
		<?php else: ?>
			<tr>
				<td colspan="2">抱歉，没有找到用户！</td>
			</tr>
		<?php endif; ?>
		</table>
	</p>
</div>