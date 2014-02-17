<h3><?php echo empty($feedback->id) ? '添加一个反馈' : '编辑：' . $feedback->title;?></h3>
<?php echo validation_errors();?>
<?php echo form_open(); ?>
<p>
	姓名：
	<?php echo form_input('name', set_value('name', $feedback->name)); ?>
</p>
<p>
	标题：
	<?php echo form_input('title', set_value('title', $feedback->title)); ?>
</p>
<p>
	内容：
	<?php echo form_textarea('content', set_value('content', $feedback->content)); ?>
</p>
<?php if($feedback->id):?>
<p>其它信息：发布日期<?php echo $feedback->pubdate; ?>   发布者IP: <?php echo $feedback->ip; ?></p>
<?php else:?>
<!--	   添加反馈时隐藏日期和IP -->
<?php endif;?>
<p>
	<?php echo form_submit('submit', '提交');?>
	<?php echo form_reset('reset', '重置');?>
</p>
<?php echo form_close(); ?>