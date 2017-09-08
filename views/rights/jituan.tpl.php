<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo SOURCE;?>/css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main-wrap">
	<div class="path"><span class="path-icon"></span>当前位置：集团教员列表<span> &gt; </span>集团教员</div>
    <div class="set-wrap">
        <h4 class="main-title">集团教员</h4>
		<div class="set-area-int">


            <div class="user-list">

            	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table-border">
	                <thead class="td-title-bg">
	  					<tr>
	    					<td width="10%">ID</td>
	    					<td width="10%">用户名</td>
	    					<td width="25%">公司名称</td>
	    					<td width="25%">手机号</td>
	    					<td width="20%">创建时间</td>
	    					<td width="20%">操作</td>
	  					</tr>
	                </thead>
	                <tbody>
	                	<?php if(!empty($this->data['data'])):?>
						<?php foreach($this->data['data'] as $v):?>
						<tr>
							<td><?php echo $v['id'];?></td>
							<td><?php echo $v['username'];?></td>
							<td><?php echo $v['company'];?></td>
							<td><?php echo $v['telphone'];?></td>
							<td><?php echo date("Y-m-d H:i:s",$v['cdate']);?></td>

							<td>
								<a href="/train.php/rights/jituanList/<?php echo $v['id'];?>">查看进度</a>
							</td>
						</tr>
						<?php endforeach;?>
						<tr>
							<td colspan="6" align="center"><?php echo $this->linkbar;?></td>
						</tr>
						<?php else:?>
						<tr>
							<td colspan="6" align="center">无内容</td>
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
