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
    <div class="set-wrap" style="width:980px; margin:20px auto; line-height:20px;">
                    <?php if(!empty($this->class)):?>
                    <?php foreach($this->class as $v):?>
                    <?php if($v['id']==$this->data[0]['class']):?>
                    <h1><?php echo $v['title']?></h1>
                    <?php endif;?>
                    <?php endforeach;?>
                    <?php endif;?>
                    <h2><?php echo $this->data[0]['title']?></h2>
                    <p><?php echo stripslashes($this->data[0]['content'])?></p>



    </div>
</div>

<script language="javascript">$(document).ready(P_index);</script>
</body>
</html>
