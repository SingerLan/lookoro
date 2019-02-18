<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <title>CDNBye TCPlayer Demo</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="msapplication-tap-highlight" content="no">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="video-container" style="margin: 0px auto;">
</div>
<script src="//cdn.jsdelivr.net/npm/cdnbye@latest"></script>
<script src="//imgcache.qq.com/open/qcloud/video/vcplayer/TcPlayer-2.2.3.js"></script>
<script>
    var options = {
        m3u8: '<?php echo $_GET['url'];?>' ,
        autoplay: true,
        live: false,
        width: '100%',
        height: '442',
        hlsConfig: {
            debug: false,
            // Other hlsjsConfig options provided by hls.js
            p2pConfig: {
                logLevel: true,
                live: false,        // 如果是直播设为true
                // Other p2pConfig options provided by CDNBye
            }
        }
    };
    var player = new TcPlayer('video-container', options);
    window.qcplayer = player;
</script>
</body>
</html>