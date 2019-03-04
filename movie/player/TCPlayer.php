<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CDNBye MediaElement Demo</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/mediaelement@latest/build/mediaelementplayer.min.css">
    <script src="//cdn.jsdelivr.net/npm/cdnbye@latest"></script>
    <script src="//cdn.jsdelivr.net/npm/mediaelement@latest/build/mediaelement-and-player.min.js"></script>
</head>
<body style="margin: 0px;">
<video id="player"
       src="<?php echo $_GET['url'];?>"
       class="mejs__player"
       controls height="475" width="100%">
</video>
<script>
    var player = new MediaElementPlayer('player', {
        hls: {
            debug: false,
            // Other hlsjsConfig options provided by hls.js
            p2pConfig: {
                logLevel: true,
                live: false,        // 如果是直播设为true
                // Other p2pConfig options provided by CDNBye
            }
        },
        success: function (me) {
            me.play();
        }
    });

</script>
</body>
</html>