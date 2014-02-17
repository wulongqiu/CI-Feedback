	<p><?php echo anchor('admin/user/edit', '添加新用户');?></p>
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