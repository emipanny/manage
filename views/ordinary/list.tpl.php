<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo SOURCE;?>/css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main-wrap">
	<div class="path"><span class="path-icon"></span>当前位置：课程列表<span> &gt; </span>当前课程</div>
    <div class="set-wrap">
        <h4 class="main-title">当前课程</h4>
		<div class="set-area-int">


            <div class="user-list">

            	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table-border">
	                <thead class="td-title-bg">
	  					<tr>
	    					<td width="20%">课程序列</td>
	    					<td width="35%">课程名称</td>
	    					<td width="25%">所属章节</td>
	    					<td width="20%">操作</td>
	  					</tr>
	                </thead>
	                <tbody>
	                	<?php if(!empty($this->data['data'])):?>
						<?php foreach($this->data['data'] as $v):?>
						<tr>
							<td><?php echo $v['order_num'];?></td>
							<td><?php echo $v['title'];?></td>
							<td><?php if(!empty($this->class)):?>
								<?php foreach($this->class as $m):?>
								<?php if($m['id']==$v['class']):?>
								<?php echo $m['title'];?>
								<?php endif;?>
								<?php endforeach;?>
								<?php endif;?></td>
							<td>
								<a href="/train.php/ordinary/check/id/<?php echo $v['order_num'];?>" target="_blank">查看</a>
							</td>

						</tr>
						<?php endforeach;?>
						<tr>
							<td colspan="5" align="center"><?php echo $this->linkbar;?></td>
						</tr>
						<?php else:?>
						<tr>
							<td colspan="5" align="center">无内容</td>
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
