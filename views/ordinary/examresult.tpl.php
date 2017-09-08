<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo SOURCE;?>/css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo SOURCE;?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SOURCE;?>/web/js/json.js"></script>
</head>
<style>
	.clear {clear:both;}
	.set-area-int li p {float:left;}
	.set-area-int li input {float:left; width:16px; height:16px; margin:2px 5px; cursor: pointer}
	.set-area-int li {margin:30px 0; font-size: 16px; line-height: 20px;}
	.set-area-int li .question {margin-bottom:20px; font-weight: bold;}
	.set-area-int li .answer {margin:10px; margin-left:20px; }

#submitBtn{position: fixed;_position: absolute;_top: expression(eval(document.documentElement.scrollTop));right: 20px;bottom: 10px;display: block;z-index: 999; background: url(/assets/css/admin/admin_all_bg.png) -164px -191px no-repeat; width:95px; height: 28px; text-align: center; line-height: 28px; cursor: pointer}
#submitBtn:hover{background: url(/assets/css/admin/admin_all_bg.png) -164px -153px no-repeat;}
</style>
<script>
</script>
<body>
<div class="main-wrap">
	<div class="path"><span class="path-icon" ></span>考试结果</div>
    <div class="set-wrap">
        <h1 class="main-title">考试结果：<?php echo $this->result['score'];?></h1>
        <h4 class="main-title">以下是回答错误的选择题的列表：</h4>
		<div class="set-area-int">
			<ul>
			<?php $i=1;?>
			<?php if(!empty($this->wrong)):?>
			<?php foreach ($this->wrong as $v):?>
			<li id="question_<?php echo $v['id']?>" class="questions">
				<div class='question' id='que_<?php echo $i?>'><p><?php echo $i;?>、</p><?php echo $v['title']?><div class='clear'></div></div>
				<div class='answers'>
                    <?php $t=explode("|",$v['content']);?>
                    <?php for ($j=0; $j <count($t) ; $j++){
                        if($t[$j]!=""){
                            $t[$j]=explode("*",$t[$j]);
                            echo "<div class='answer'><p>".$t[$j][0]."、</p>". $t[$j][1]."<div class='clear'></div></div>";
                        }
                    };?>

				</div>
			</li>
			<?php $i++;?>
			<?php endforeach;?>
			<?php else:?>
			恭喜您，您答了满分！
			<?php endif;?>
			</ul>

    	</div>
    </div>
</div>
</body>
</html>
