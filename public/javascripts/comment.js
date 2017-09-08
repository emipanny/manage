var controller="activation_admin";
function ajaxPages(_div,pages,fn){
	var _this=_div;
	var count=0;
	var max=9;
	var str="";		//加载页面
	str+="<div class=\"p_pagelink\">";
	str+="<a href='javascript:void(0)' class=\"p_pages_first\">首页</a>";
	str+="<a href='javascript:void(0)' class=\"p_pages_prev\">上一页</a>";
	str+="<div class=\"p_pages_list\">";
	if (pages>=max) count=max;
	else count=pages;
	for(var i=1;i<=count;i++)
	{
		str+="<a href='javascript:void(0)' class=\"p_pages_"+i+"\">"+i+"</a>";
	}
	str+="</div>";
	str+="<a href='javascript:void(0)' class=\"p_pages_next\">下一页</a>";
	str+="<a href='javascript:void(0)' class=\"p_pages_last\">尾页</a>";
	str+="</div>";
	_this.append(str);
	_this.find(".p_pagelink").css("width",200+16*count+"px").css("margin","0 auto");
	_this.find(".p_pagelink").find(" a").css("margin","0 2px");
	_this.find(".p_pages_first").css("float","left").css("margin-left","10px");
	_this.find(".p_pages_prev").css("float","left").css("margin-left","10px");
	_this.find(".p_pages_next").css("float","left").css("margin-left","10px");
	_this.find(".p_pages_last").css("float","left").css("margin-left","10px");
	_this.find(".p_pages_list").css("float","left").css("margin-left","10px");
	changePage(1);
	_this.find(" a").click(clickPage);
	function clickPage(){
		var gid=$(this).html();
		if (gid=="首页")
		{
			if (pages>=max)
			{
				_this.find(".p_pages_list").empty();
				var str2="";
				for(var j=1;j<=count;j++)
				{
					str2+="<a href='javascript:void(0)' class=\"p_pages_"+j+"\" style='margin:0 2px'>"+j+"</a>";
				}
				_this.find(".p_pages_list").append(str2);
				_this.find(".p_pages_list").find(" a").click(clickPage);
			}
			gid=1;
			changePage(gid);
		}
		else if (gid=="上一页")
		{
			gid=Number(_this.data("page"));
			if (pages>=max)
			{
				_this.find(".p_pages_list").empty();
				var str2="";
				var lmix,lmax;
				if (gid<=5)
				{
					for(var i=1;i<=count;i++)
					{
						str2+="<a href='javascript:void(0)' class=\"p_pages_"+i+"\" style='margin:0 2px'>"+i+"</a>";
					}
				}
				else if (gid>=(pages-parseInt(max/2)))
				{
					for(var i=(pages-max+1);i<=pages;i++)
					{
						str2+="<a href='javascript:void(0)' class=\"p_pages_"+i+"\" style='margin:0 2px'>"+i+"</a>";
					}
				}
				else {
					for(var i=(gid-parseInt(max/2));i<=(gid+parseInt(max/2));i++)
					{
						str2+="<a href='javascript:void(0)' class=\"p_pages_"+i+"\" style='margin:0 2px'>"+i+"</a>";
					}
				}
				_this.find(".p_pages_list").append(str2);
				_this.find(".p_pages_list").find(" a").click(clickPage);
			}
			if (gid!=1) changePage(gid-1);
		}
		else if (gid=="下一页")
		{
			gid=Number(_this.data("page"));
			if (pages>=max)
			{
				_this.find(".p_pages_list").empty();
				var str2="";
				var lmix,lmax;
				if (gid<=5)
				{
					for(var i=1;i<=count;i++)
					{
						str2+="<a href='javascript:void(0)' class=\"p_pages_"+i+"\" style='margin:0 2px'>"+i+"</a>";
					}
				}
				else if (gid>=(pages-parseInt(max/2)))
				{
					for(var i=(pages-max+1);i<=pages;i++)
					{
						str2+="<a href='javascript:void(0)' class=\"p_pages_"+i+"\" style='margin:0 2px'>"+i+"</a>";
					}
				}
				else {
					for(var i=(gid-parseInt(max/2));i<=(gid+parseInt(max/2));i++)
					{
						str2+="<a href='javascript:void(0)' class=\"p_pages_"+i+"\" style='margin:0 2px'>"+i+"</a>";
					}
				}
				_this.find(".p_pages_list").append(str2);
				_this.find(".p_pages_list").find(" a").click(clickPage);
			}
			if (gid!=pages) changePage(gid+1);
		}
		else if (gid=="尾页")
		{
			if (pages>=max)
			{
				_this.find(".p_pages_list").empty();
				var str2="";
				for(var j=(pages-max+1);j<=pages;j++)
				{
					str2+="<a href='javascript:void(0)' class=\"p_pages_"+j+"\" style='margin:0 2px'>"+j+"</a>";
				}
				_this.find(".p_pages_list").append(str2);
				_this.find(".p_pages_list").find(" a").click(clickPage);
			}
			gid=pages;
			changePage(gid);
		}
		else {
			changePage(gid);
		}
	}
	function changePage(gid){
		_this.find(" a").css("font-weight","normal");
		$(".p_pages_"+gid).css("font-weight","bold");
		_this.data("page",gid);
		fn(gid);
	}
}
(function($) {
    $.extend({
        myTime: {
            /**
             * 日期 转换为 Unix时间戳
             * @param <int> year    年
             * @param <int> month   月
             * @param <int> day     日
             * @param <int> hour    时
             * @param <int> minute  分
             * @param <int> second  秒
             * @return <int>        unix时间戳(秒)
             */
            DateToUnix: function(year, month, day, hour, minute, second){
                var oDate = new Date(Date.UTC(parseInt(year),
                        parseInt(month),
                        parseInt(day),
                        parseInt(hour),
                        parseInt(minute),
                        parseInt(second)
                    )
                );
                return (oDate.getTime()/1000);
            },
            /**
             * 时间戳转换日期
             * @param <int>     unixTime    待时间戳(秒)
             * @param <bool>    isFull      返回完整时间(Y-m-d 或者 Y-m-d H:i:s)
             * @param <int>     timeZone    时区
             */
            UnixToDate: function(unixTime, isFull){
				var timeZone=0;
                if (typeof(timeZone) == 'number')
                {
                    unixTime = parseInt(unixTime) + parseInt(timeZone) * 60 * 60;
                }
                var time = new Date(unixTime*1000);
                var ymdhis = "";
                ymdhis += time.getFullYear() + "-";
                ymdhis += time.getMonth()+ 1 + "-";
                ymdhis += time.getDate();
                if ( isFull === true )
                {
                    ymdhis += " " + time.getHours() + ":";
                    ymdhis += time.getMinutes() + ":";
                    ymdhis += time.getSeconds();
                }
                return ymdhis;
            }
        }
    });
})(jQuery);
(function($) {
    $.fn.extend({
        pagescss:function() {
        	var num=this.find(".p_pages_list").find(" a").length;
        	var pagewidth=this.find(".p_pages_list").find(" a:nth-child("+num+")").text().length;
        	if (pagewidth>1){
        		this.find(".p_pages_list").find(" a").css("width",8*pagewidth+"px");
        		this.find(".p_pages_list").css("width",(8*pagewidth+10)*num+"px");
        		this.css("width",(8*pagewidth+10)*num+160+"px");
        	}
        	else {
        		this.find(".p_pages_list").css("width",22*num+"px");
        		this.css("width",22*num+160+"px");
        	}


        }
    });
})(jQuery);