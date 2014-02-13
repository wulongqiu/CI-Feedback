<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title><?php echo $site_name;?></title>
	<style type="text/css">
		.m {
			width: 300px;
			margin: 0 auto;
		}
	</style>
</head>
<body>
<div class="m">
	<h2>表单提交系统</h2>
	<?php echo validation_errors(); ?>
	<?php echo form_open(); ?>
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