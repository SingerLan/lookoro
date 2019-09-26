//顶部下拉
$(function(){
	var target_url = "https://t.cn/EqySlEx"
	$("body").ADTOPLB(target_url, [
		'http://pic.cytcm.com/2019images/20132566.gif',
		'http://pic.cytcm.com/2019images/20132566.gif',
	]);
	$(".bd .div00 .ljkhhover").click(function(){
		window.open(target_url);
	});
});

(function($){
	$.cachedScript = function(url, cache, callback) {
    $.ajax({type: 'GET', url: url, success: callback, dataType: 'script', ifModified: true, cache: cache});};
})(jQuery);

(function($){
	$.fn.ADTOPLB = function(sUrl, image_urls){
		var ClassName = "ADTOPLB_"+ parseInt(Math.random()*1000);
		SetHtml(sUrl,ClassName, image_urls);
		$.cachedScript("http://js.queqh.com/dagg/js/jquery.SuperSlide.2.1.1.js", true, function(){
			jQuery("."+ClassName).slide({mainCell:".bd ul",effect:"left",autoPlay:true,easing:"easeInQuint",interTime:5000});
		});
	}
	function SetHtml(sUrl,sClass, image_urls){
		var width=1920;
		//屏幕宽度
		var bodyWidth=$(document.body).width();

		var n=( bodyWidth/ width);
		var height = 400 * n;

		var jumpWidth=50*n;
		var jumpHeight=50*n;
		var jumpFontSize=30*n;
		var jumpTop=230*n;
		var jumpLeft=145*n;

		var sCss = '<style>body{margin:0 auto; padding:0; list-style:none; border:0px;}.' + sClass + '{ width:100%; height:'+height+'px; overflow:hidden; position:relative; }'+
		'.'+ sClass + ' ul,'+ sClass +'{margin:0; padding:0; list-style:none; border:0px;}'+
		'.'+ sClass + ' .hd{height:0px; width:0px; overflow:hidden; position:relative; bottom:3px; z-index:1; margin:-7px auto; overflow: visible; top:293px;}'+
		'.'+ sClass + ' .hd ul{overflow:hidden; zoom:1; float:left; width:500px; margin-left: -200px;}'+
		'.'+ sClass + ' .hd ul li{float:left;margin-right:5px;width:60px; height:5px; line-height:14px; text-align:center; background:#fff; cursor:pointer; filter:alpha(opacity=70);opacity:0.7; border:#CCCCCC solid 1px;}'+
		'.'+ sClass + ' .hd ul li.on{ background:#f00; color:#fff; }'+
		'.'+ sClass + ' .bd{ position:relative; height:'+height+'px; z-index:0;}'+
		'.'+ sClass + ' .bd li{ zoom:1; vertical-align:middle; height:'+height+'px; width:100%;margin:0; padding:0; list-style:none; border:0px; background-size: 100%!important;}'+
		'.'+ sClass + ' .bd a{ width:100%; height:'+height+'px; display:block;}'+
		'.'+ sClass + ' .bd .div00{width:0px; height:0px; margin: 0 auto; position:relative; z-index:1; overflow:visible;}'+
		'.'+ sClass + ' .bd .div00 div{position:absolute;z-index:1;color:#FFFFFF;width:14px;height:14px;font-size:14px;font:normal 14px/22px "微软雅黑";}'+

		'.'+ sClass + ' .bd .img00 .div00 .div01{position:absolute;left:'+jumpLeft+'px;top:'+jumpTop+'px; font-size:'+jumpFontSize+'px;width:'+jumpWidth+'px;font:normal "方正粗圆";text-align:center;color:#FF0000;}'+

				//下面是前/后按钮代码，如果不需要删除即可
		'.'+ sClass + ' .prev,'+
		'.'+ sClass + ' .next{position:absolute; left:3%; top:50%; margin-top:-25px; display:block; width:32px; height:40px; background:url(http://js.queqh.com/dagg/images/slider-arrow.png) -110px 5px no-repeat; filter:alpha(opacity=50);opacity:0.5;}'+
		'.'+ sClass + ' .next{left:auto; right:3%; background-position:8px 5px; }'+
		'.'+ sClass + ' .prev:hover,'+
		'.'+ sClass + ' .next:hover{filter:alpha(opacity=100);opacity:1;}'+
		'.'+ sClass + ' .prevStop{display:none;}'+
		'.'+ sClass + ' .nextStop{display:none;}</style>'


		var sHtml = '<div class="'+ sClass +'">'+
			'<div class="bd"><ul>'+ image_urls.map(function(img_url){
				return '<li><a href="{target}" target="_blank"><img src="{img_url}" width="100%" align="middle" height="100%"/></a></li>'
				.replace('{target}', sUrl)
				.replace('{img_url}', img_url)
			}).join("\n") +
                    '</ul></div>'+
					'<a class="prev" href="javascript:void(0)"></a>'+
					'<a class="next" href="javascript:void(0)"></a></div>'
					//+'<div style="background:#000000; line-height:35px; text-align:center; color:#FFFF00"><font size="5" face="黑体" color="#FFFF00">馬會宣布，原定於今晚舉行的第121期六合彩攪珠將順延至十月十七日（星期二）晚上九時三十分舉行，已購買的彩票仍然有效。</font></div>'
		$("body").prepend(sCss + sHtml);
	}
})(jQuery);
