<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo SOURCE;?>/css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo SOURCE;?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SOURCE;?>/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo SOURCE;?>/ckeditor/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="<?php echo SOURCE;?>/xheditor/xheditor-1.1.6-zh-cn.min.js"></script>
<!-- formValidator -->
<script>
    function P_index(){
    }
</script>
<style>
.clear { CLEAR: both; FONT-SIZE: 0px; LINE-HEIGHT: 0; HEIGHT:0;}
    #start_end_time input {float:left; width:50px;}
    #start_end_time span {float:left; padding:0 5px;}
    .main_1 {display:none;}
    .main_2 {display:none;}
</style>
</head>
<body>
<div class="main-wrap">
	<div class="path"><span class="path-icon"></span>当前位置：查看激活</div>
    <div class="set-wrap">
        <div class="wrap-inner">
        	<h4 class="main-title">当前位置：查看激活</h4>
    		<div class="set-area-int">
            	<div class="site-info-a">
            		<p>姓名：<span></span></p>
            		<p><?php echo $this->info['name']?></p>

            	</div>
                <div class="site-info-a">
                    <p>学校名称：<span></span></p>
                    <p><?php echo $this->info['company']?></p>

                </div>
                <div class="site-info-a">
                    <p>城市：<span></span></p>
                    <p><?php echo $this->info['city']?></p>

                </div>
                <div class="site-info-a">
                    <p>地址：<span></span></p>
                    <p><?php echo $this->info['address']?></p>

                </div>
                <div class="site-info-a">
                    <p>QQ：<span></span></p>
                    <p><?php echo $this->info['QQ']?></p>

                </div>
                <div class="site-info-a">
                    <p>邮箱：<span></span></p>
                    <p><?php echo $this->info['email']?></p>

                </div>
                <div class="site-info-a">
                    <p>电话：<span></span></p>
                    <p><?php echo $this->info['telphone']?></p>

                </div>
                <div class="site-info-a">
                    <p>微信：<span></span></p>
                    <p><?php echo $this->info['weixin']?></p>

                </div>

                <div class="site-info-a">
                    <p>申请时间：<span></span></p>
                    <p><?php echo date('Y-m-d H:i:s',$this->info['created_at'])?></p>

                </div>
                <div class="site-info-a">
                    <p>激活码：<span></span></p>
                    <p>
                        <?php $i=0;?>
                        <?php $code=explode("|",$this->info['code']) ;?>
                        <?php foreach($code as $m):?>
                            <?php if($i!=0):?>
                            <?php echo $i."：".$m?></br>
                            <?php endif;?>
                            <?php $i++?>
                        <?php endforeach;?>
                    </p>

                </div>
                <div class="site-info-b">
                    <p>证件照：<span></span></p>
                    <img src="/assets/upload/education/<?php echo $this->info['image']?>">

                </div>


        	</div>
        </div>

    </div>
</div>

<script language="javascript">$(document).ready(P_index);</script>
</body>
</html>
