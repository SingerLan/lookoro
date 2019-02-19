</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CDNBye Clappr Demo</title>
    <!-- Clappr Builds -->
    <script src="//cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js"></script>
    <!-- CDNBye P2PEngine -->
    <script src="//cdn.jsdelivr.net/npm/cdnbye@latest/dist/hlsjs-p2p-engine.min.js"></script>
    <!-- CDNBye Clappr Plugin -->
    <script src="//cdn.jsdelivr.net/npm/cdnbye@latest/dist/clappr-plugin.min.js"></script>
</head>
<body style="margin: 0px;">
<div id="player"></div>
<script>
    var player = new Clappr.Player(
        {
            source: "<?php echo $_GET['url'];?>",
            parentId: "#player",
            autoPlay: true,
            width:"100%",
            height:"100%",
            plugins: {
                playback: [CDNByeClapprPlugin]
            },
            playback: {
                hlsjsConfig: {
                    maxBufferSize: 0,       // Highly recommended setting
                    maxBufferLength: 5,     // Highly recommended setting
                    liveSyncDuration: 30,   // Highly recommended setting
                    // Other hlsjsConfig options provided by hls.js
                    p2pConfig: {
                        logLevel: 'debug',
                        live: false,        // 如果是直播设为true
                        // Other p2pConfig options provided by CDNBye
                    }
                }
            }
        });
</script>
</body>
</html>