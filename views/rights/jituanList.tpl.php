<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo SOURCE;?>/css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main-wrap">
	<div class="path"><span class="path-icon"></span>当前位置：进度列表<span> &gt; </span>进度列表</div>
    <div class="set-wrap">
        <h4 class="main-title">学员列表</h4>
		<div class="set-area-int">
        	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table-border">
                <thead class="td-title-bg">
  					<tr>
    					<td>手机号(登录名)</td>
                        <td>名字</td>
                        <td>进度</td>
                        <td>学习进度</td>
                        <td>作业提交时间</td>
                        <td>作业</td>
  					</tr>
                </thead>
                <tbody>
                	<?php if($this->data['data']):?>
					<?php foreach($this->data['data'] as $v):?>
					<tr>
						<td><?php echo $v['username'];?></td>
						<td><?php echo $v['realname'];?></td>
                        <td>
                            <?php if($this->count>=$v['course_num']):?>
                            <span style="float:left; line-height:22px;"><?php echo $v['course_num'];?>/<?php echo $this->count;?></span>
                            <div style="float:left; width:<?php echo ($this->count*2);?>px; height:20px; border:1px solid #0082cb;">
                                <div style="width:<?php echo ($v['course_num']*2);?>px; height:20px; background:#0082cb;"></div>
                            </div>
                            <?php else:?>
                                <span style="color:red">课程全部学完</span>
                            <?php endif;?>
                        </td>
						<td><?php echo $v['title'];?>--<?php echo $v['zhang'];?></td>
						<td><?php echo date("Y-m-d H:i:s",$v['mdate']);?></td>
						<td>
                            <?php if($v['course_state']==0):?>
                            <a href="/assets/upload/train/<?php echo $v['homework'];?>" target="_blank">查看作业</a>
                            <?php elseif($v['course_state']==1):?>
                            还未提交作业
                            <?php elseif($v['course_state']==2):?>
                            未通过审核，等待重新提交作业
                            <?php endif;?>
                        </td>
					</tr>
					<?php endforeach;?>
					<?php else:?>
					<tr>
						<td colspan="7" align="center">无内容</td>
					</tr>
					<?php endif;?>
                </tbody>
			</table>
    	</div>
    </div>
</div>
</body>
</html>
