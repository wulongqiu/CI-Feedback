<?php if(count($feedbacks)): foreach($feedbacks as $feedback): ?>
	<h3><?php echo $feedback->title; ?></h3>
	<p>信息ID：<?php echo $feedback->id;?>
		<?php echo anchor('admin/feedback/edit' . $feedback->id, '编辑反馈');?>
		<?php echo anchor('admin/feedback/delete' . $feedback->id, '删除反馈');?>
	</p>
	<p class="info">
		发布人：<?php echo $feedback->name; ?>
		IP：<?php echo $feedback->ip;?>
		发布日期：<?php echo $feedback->pubdate;?>
	</p>
	<p><?php echo $feedback->content;?></p>
	<hr/>
<?php endforeach; ?>
<?php else: ?>
	<p><b>暂时没有留言信息!</b></p>
<?php endif; ?>