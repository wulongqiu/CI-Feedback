<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title><?php echo $site_name;?></title>
<style type="text/css">
.m {
	width: 800px;
	margin: 0 auto;
}
.info {
	font-size: 12px;
	color: #999999;
}
</style>
</head>
<body>
<div class="m">

<?php if(count($feedbacks)): foreach($feedbacks as $feedback): ?>
<h3><?php echo $feedback->title; ?></h3>
<p class="info">
	发布人：<?php echo $feedback->name; ?>
	IP：<?php echo $feedback->ip;?>
	发布日期：<?php echo $feedback->pubdate;?></p>
<p><?php echo $feedback->content;?></p>
<hr/>
<?php endforeach; ?>
<?php else: ?>
<p><b>暂时没有留言信息!</b></p>
<?php endif; ?>


<h2>表单提交系统</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('feedback/pub'); ?>
	<p>
		姓名：
		<?php echo form_input('name'); ?>
	</p>
	<p>
		标题：
		<?php echo form_input('title'); ?>
	</p>
	<p>
		内容：
		<?php echo form_textarea('content');?>
	</p>
	<p>
		<?php echo form_submit('submit', '提交');?>
		<?php echo form_reset('reset', '重置');?>
	</p>
<?php echo form_close();?>
</div>
</body>
</html>