<h3>请登陆</h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table>
	<tr>
		<td>Email：</td>
		<td><?php echo form_input('email');?></td>
	</tr>
	<tr>
		<td>密码：</td>
		<td><?php echo form_password('password');?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', '登陆');?><?php echo form_reset('reset', '重置');?></td>
	</tr>

</table>
<?php echo form_close(); ?>