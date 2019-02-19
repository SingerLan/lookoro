var zzid=0;
var pisea_Player_File="play2.swf";//已无效参数
var playerw='100%';//电脑端播放器宽度
var playerh='502';//电脑端播放器高度
var mplayerw='100%';//手机端播放器宽度
var mplayerh='100%';//手机端播放器高度
var adsPage="";//视频播放前广告页路径
var adsTime=0;//视频播放前广告时间，单位秒
var jxAname="线路1";
var jxBname="线路2";
var jxCname="线路3";
var jxDname="线路4";
var jxEname="线路5";
var jxAapi="http://www.lookoro.cn/player/spare.php?url=";
var jxBapi="http://www.lookoro.cn/m3u8.php?url=";
var jxCapi="http://www.lookoro.cn/player/P2P-DPlayer.php?url=";
var jxDapi="http://www.lookoro.cn/player/TCPlayer.php?url=";
var jxEapi="http://g.alicdn.com/de/prismplayer-flash/1.2.16/PrismPlayer.swf?vurl=";
var forcejx="yes";
var unforcejx="yunpan#swf#iframe#url#xigua#ffhd#jjvod#ck#dp";
var unforcejxARR = unforcejx.split('#');


function contains(arr, obj) {  
    var i = arr.length;  
    while (i--) {  
        if (arr[i] === obj) {  
            return true;  
        }  
    }  
    return false;  
}

function IsPC() {
    var userAgentInfo = navigator.userAgent;
    var Agents = ["Android", "iPhone",
                "SymbianOS", "Windows Phone",
                "iPad", "iPod"];
    var flag = true;
    for (var v = 0; v < Agents.length; v++) {
        if (userAgentInfo.indexOf(Agents[v]) > 0) {
            flag = false;
            break;
        }
    }
    return flag;
}
 
var flag = IsPC(); //true为PC端，false为手机端
if(flag==false)
{
	playerw=mplayerw;
	playerh=mplayerh;
}