<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo SOURCE;?>/css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main-wrap">
	<div class="path"><span class="path-icon"></span>当前位置：激活列表</div>
    <div class="set-wrap">
        <h4 class="main-title">激活列表</h4>
		<div class="set-area-int">


            <div class="user-list">

            	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table-border">
	                <thead class="td-title-bg">
	  					<tr>
	    					<td width="0%" style="display:none">编号</td>
	    					<td width="10%">申请人</td>
	    					<td width="20%">学校</td>
	    					<td width="20%">软件版本</td>
                            <td width="10%">状态</td>
	    					<td width="20%">激活码</td>
	    					<td width="20%">操作</td>
	  					</tr>
	                </thead>
	                <tbody>
	                	<?php if(!empty($this->data['data'])):?>
						<?php foreach($this->data['data'] as $v):?>
						<tr>
							<td  style="display:none"><?php echo $v['id'];?></td>
							<td><?php echo $v['name'];?></td>
							<td><?php echo $v['company'];?></td>
							<td>教育版</td>
                            <td>
                                <?php if($v['state']==1 or $v['state']==2):?>
                                提交申请
                                <?php elseif($v['state']==3):?>
                                激活码返回
                                <?php endif;?>
                            </td>
							<td>
		                        <?php $i=0;?>
		                        <?php $code=explode("|",$v['code']) ;?>
		                        <?php foreach($code as $m):?>
		                            <?php if($i!=0):?>
		                            <?php echo $i."：".$m?></br>
		                            <?php endif;?>
		                            <?php $i++?>
		                        <?php endforeach;?>
							</td>

							<td>
								<a class="edit-icon" href="<?php echo U(getv('controller').'/check/id/'.$v['id']);?>" >查看</a>
							</td>
						</tr>
						<?php endforeach;?>
						<tr>
							<td colspan="8" align="center"><?php echo $this->linkbar;?></td>
						</tr>
						<?php else:?>
						<tr>
							<td colspan="8" align="center">无内容</td>
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
