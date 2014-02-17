<h3><?php echo empty($user->id) ? '添加一个新用户' : '编辑用户：' . $user->name;?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table>
	<tr>
		<td>称呼</td>
		<td><?php echo form_input('name', set_value('name', $user->name)); ?></td>
	</tr>
	<tr>
		<td>邮箱：</td>
		<td><?php echo form_input('email', set_value('email', $user->email)); ?></td>
	</tr>
	<tr>
		<td>密码：</td>
		<td><?php echo form_password('password'); ?></td>
	</tr>
	<tr>
		<td>确认密码：</td>
		<td><?php echo form_password('password_confirm'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', '保存'); ?></td>
	</tr>
</table>
<?php echo form_close(); ?>