<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo SOURCE;?>/css/admin.css" rel="stylesheet" type="text/css" />
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<!--date-->
<link href="<?php echo SOURCE;?>/jquery-ui-1.10.4.custom/css/custom/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<script src="<?php echo SOURCE;?>/jquery-ui-1.10.4.custom/js/jquery-1.10.2.js"></script>
<script src="<?php echo SOURCE;?>/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js"></script>
<script>

    $(function() {
        $( "#startTime" ).datepicker({ showOn: 'focus' })
        $( "#endTime" ).datepicker({ showOn: 'focus' })
    });
</script>
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
	<div class="path"><span class="path-icon"></span>当前位置：申请激活</div>
    <div class="set-wrap">
    	<form action="" method="post" name="form1" id="form1" onsubmit="return $.formValidator.pageIsValid('1')" enctype="multipart/form-data">
        <div class="wrap-inner">
        	<h4 class="main-title">当前位置：申请激活（以下信息全部为必填）</h4>
    		<div class="set-area-int">
            	<div class="site-info-a">
            		<p>姓名：<span></span></p>
            		<input name="name" id="name" class="input-box site-box-w" type="text" />

            	</div>
                <div class="site-info-a">
                    <p>学校名称：<span></span></p>
                    <input name="company" id="company" class="input-box site-box-w" type="text" />

                </div>
                <div class="site-info-a">
                    <p>城市：<span></span></p>
                    <input name="city" id="city" class="input-box site-box-w" type="text" />

                </div>
                <div class="site-info-a">
                    <p>地址：<span></span></p>
                    <input name="address" id="address" class="input-box site-box-w" type="text" />

                </div>
                <div class="site-info-a">
                    <p>QQ：<span></span></p>
                    <input name="QQ" id="QQ" class="input-box site-box-w" type="text" />

                </div>
                <div class="site-info-a">
                    <p>邮箱：<span></span></p>
                    <input name="email" id="email" class="input-box site-box-w" type="text" />

                </div>
                <div class="site-info-a">
                    <p>电话：<span></span></p>
                    <input name="telphone" id="telphone" class="input-box site-box-w" type="text" />

                </div>
                <div class="site-info-a">
                    <p>微信：<span></span></p>
                    <input name="weixin" id="weixin" class="input-box site-box-w" type="text" />

                </div>

            	<div class="site-info-a">
                    <p>学生证等有效证件：<span></span></p>
                    <input name="file" id="file" class="input-box site-box-w" type="file" />
            	</div>

        	</div>
        </div>
<!--        <input name="cal" id="cal" class="input-box site-box-w" type="text" />日历控件测试 -->
        <div class="button button-position"><input type="submit" id="submitBtn" name="submit" value="确认添加" /></div>
		</form>

    </div>
</div>

<script language="javascript">$(document).ready(P_index);</script>
</body>
</html>
