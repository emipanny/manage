<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo SOURCE;?>/css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main-wrap">
	<div class="path"><span class="path-icon"></span>当前位置：考试</div>
    <div class="set-wrap">
        <h4 class="main-title">考试</h4>
		<div class="set-area-int">
			<p>如果您学习完了课程，可以点击按钮进行考试。</p>
			<p>点击“考试”按钮，将会生成考试页面，您需要在1个小时内完成答题，并且提交。超过时限，提交会失败！</p>
			<a class="edit-icon" href="<?php echo U(getv('controller').'/exam');?>" >考试</a>

    	</div>
        <h4 class="main-title">参加考试记录</h4>
		<div class="set-area-int">


            <div class="user-list">

            	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table-border">
	                <thead class="td-title-bg">
	  					<tr>
	    					<td width="30%">提交答案时间</td>
	    					<td width="30%">考试得分</td>
	    					<td width="40%">操作</td>
	  					</tr>
	                </thead>
	                <tbody>
	                	<?php if(!empty($this->data['data'])):?>
						<?php foreach($this->data['data'] as $v):?>
						<tr>
							<td><?php echo date('Y-m-d H:i:s',$v['created_at']);?></td>
							<td><?php echo $v['score'];?></td>

							<td>
								<a class="edit-icon" href="<?php echo U(getv('controller').'/examresult/id/'.$v['id']);?>" >查看答错题目</a>
							</td>
						</tr>
						<?php endforeach;?>
						<tr>
							<td colspan="3" align="center"><?php echo $this->linkbar;?></td>
						</tr>
						<?php else:?>
						<tr>
							<td colspan="3" align="center">无内容</td>
						</tr>
						<?php endif;?>
	                </tbody>
				</table>
            </div>

    	</div>
    </div>
</div>
</body>
</html>
