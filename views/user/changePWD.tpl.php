<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="<?php echo SOURCE;?>/css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo SOURCE;?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SOURCE;?>/xheditor/xheditor-1.1.6-zh-cn.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#reasons').xheditor({tools:'simple',skin:'nostyle',upImgUrl:'<?php echo U("upload/img");?>'});
});
</script>
<!-- formValidator -->
<link type="text/css" rel="stylesheet" href="<?php echo SOURCE;?>/formValidator/style/validatorAuto.css" />
<script src="<?php echo SOURCE;?>/formValidator/formValidator.js" type="text/javascript" charset="UTF-8"></script>
<script src="<?php echo SOURCE;?>/formValidator/formValidatorRegex.js" type="text/javascript" charset="UTF-8"></script>
<script src="<?php echo SOURCE;?>/formValidator/DateTimeMask.js" language="javascript" type="text/javascript" ></script>
<!--<script src="<?php echo SOURCE;?>/formValidator/datepicker/WdatePicker.js" defer="defer" type="text/javascript"></script>-->
<!-- /formValidator -->

<script>
$(document).ready(function()
{
	$.formValidator.initConfig({autotip:true,onerror:function(msg){alert(msg)}});
	$("#username").formValidator({onshow:"请输入昵称.",onfocus:"昵称至少需要6个字符,最多20个字符。",oncorrect:"输入正确."})
				.inputValidator({min:6,max:20,onerror:"你输入的昵称长度不正常,请重新输入"});

});
function ajax_submit()
{
    if (! $('#oldpassword').val() )
    {
        alert('原始密码不能为空！');
        return false;
    }
    if (! $('#password').val() )
    {
        alert('新密码不能为空！');
        return false;
    }
    if ($('#password').val().length<6 )
    {
        alert('密码必须大于等于6位！');
        return false;
    }
    if ($('#password').val()!= $('#password2').val())
    {
        alert('新密码两次输入不正确！');
        return false;
    }
    $("#loginFrm").submit();
}
</script>

</head>
<body>
<div class="main-wrap">
	<div class="path"><span class="path-icon"></span>当前位置：个人中心<span> &gt; </span>修改密码</div>
    <div class="set-wrap">
        <form id="loginFrm" action="" method="post" onsubmit="return ajax_submit()">
        <div class="wrap-inner">
        	<h4 class="main-title">修改密码</h4>
    		<div class="set-area-int">



                <div class="site-info-a">
                <label>
                    <p>原始密码：<span></span></p>
                    <input name="oldpassword" id="oldpassword" class="input-box site-box-w" type="password"  />
                </label>
                </div>
                <div class="site-info-a">
                <label>
                    <p>新密码：<span></span></p>
                    <input name="password" id="password" class="input-box site-box-w" type="password"  />
                </label>
                </div>
                <div class="site-info-a">
                <label>
                    <p>确认密码：<span></span></p>
                    <input name="password2" id="password2" class="input-box site-box-w" type="password"  />
                </label>
                </div>
        	</div>
        </div>
        <div class="button button-position"><input type="submit" id="submitBtn" name="submit" value="确认修改" /></div>
		</form>

    </div>
</div>

</body>
</html>
