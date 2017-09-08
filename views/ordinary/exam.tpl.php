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
	.path {position: fixed;_position: absolute;_top: expression(eval(document.documentElement.scrollTop));top: 0px;display: block;z-index: 999; width:100%;  border-bottom:#999 1px solid;}
</style>
<script>
	var timeID;
	function P_index(){
		var time=<?php echo $this->time;?>;
		timeID=setInterval(function(){
			time--;
			if (time==0) {
				$(".answer").find(" input").attr('disabled',true);
				auto();
				clearInterval(timeID);
			}
			else {
				var hour=parseInt(time/3600);
				if (hour<10) {hour="0"+hour;}
				var min=parseInt(time/60);
				min=min%60;
				if (min<10) {min="0"+min;};
				var sec=time%60;
				if (sec<10) {sec="0"+sec;};
				if (time<60)
					$("#end-time").css("color","red");
				$("#end-time").text("考试倒计时："+hour+":"+min+":"+sec);
			}

		},1000);

	}
	function auto(){
		var data=[];
		$(".set-area-int").find(".questions").each(function(){
			var id=$(this).attr("id").replace("question_","");
			var answer="";
			var _que= $(this).find("input[name='question']:checked");
	       _que.each(function(){
	            answer+=$(this).val();
	        });
	        data.push({"id":id,"answer":answer});
		});
		send(data);

	}
	function senddata(){
		var i=0;
		var data=[];
		var error=0;
		$(".set-area-int").find(".questions").each(function(){
			var id=$(this).attr("id").replace("question_","");
			var answer="";
			var _que= $(this).find("input[name='question']:checked");
			if (_que.length==0) {
				alert("您第"+$(this).find(".question").attr("id").replace("que_","")+"题未选择答案！");
				error=1;
				return false;
			}
	       _que.each(function(){
	            answer+=$(this).val();
	        });
	        data.push({"id":id,"answer":answer});
		});
		if (error==0) {
			send(data);
		}
	}
	function send(data){

		//alert(JSON.stringify(data));
			$.ajax({
				url: "/education.php/ordinary/exam",
				type: "POST",
				data: {data:data},
				success: function(data) {
					//alert(data);

				　　if(data.indexOf('系统发生错误')!=-1)
				　　{
						$(" body").append("<div style='display:none'>"+data+"</div>");
				　　}
					else{
						if (data==1) {
							 window.location.href="/education.php/ordinary/examlist.html";
							//window.close();

						}
						else if (data==0) {
							alert("发生错误，请重试提交！");
						}
						else if (data==2) {
							alert("发生错误，请重试提交！");
						}
					}
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
						alert("发生错误");
						isSend=false;
				}
			});
	}
</script>
<body>
<div class="main-wrap">
	<div class="path"><span class="path-icon"></span>当前位置：考试<span id="end-time" style="margin-left:200px; font-weight:bold; font-size:16px;">考试倒计时：</span></div>
    <div class="set-wrap" style="padding-top:50px;">
        <h4 class="main-title">考试</h4>
		<div class="set-area-int">
			<ul>
			<?php $i=1;?>
			<?php if(!empty($this->data)):?>
			<?php foreach ($this->data as $v):?>
			<li id="question_<?php echo $v['id']?>" class="questions">
				<div class='question' id='que_<?php echo $i?>'><p><?php echo $i;?>、</p><?php echo $v['title']?><div class='clear'></div></div>
				<div class='answers'>
                    <?php $t=explode("|",$v['content']);?>
                    <?php for ($j=0; $j <count($t) ; $j++){
                        if($t[$j]!=""){
                            $t[$j]=explode("*",$t[$j]);
                            echo "<div class='answer'><input type='checkbox' id='label_".$v['id']."_".$j."' name='question' class='box' value='".$t[$j][0]."'/><label for='label_".$v['id']."_".$j."'><p>".$t[$j][0]."、</p>". $t[$j][1]."<div class='clear'></div></label></div>";
                        }
                    };?>

				</div>
			</li>
			<?php $i++;?>
			<?php endforeach;?>
			<?php endif;?>
			</ul>

    	</div>
    	<form action="" method="post" name="form1" id="form1" onsubmit = "return senddata();">
    		<input type="text" name="send" id="send" style="display:none"  />
        <div class="button button-position" ><a type="submit" id="submitBtn" onclick="javascript:senddata()">提交答案</a></div>
		</form>
    </div>
</div>
<script language="javascript">$(document).ready(P_index);</script>
</body>
</html>
