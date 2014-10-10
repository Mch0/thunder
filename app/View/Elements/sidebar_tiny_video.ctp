
<h2>Logitech</h2>

<center>
<script src="http://www.google.com/jsapi"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/swfobject/2.1/swfobject.js"></script>
    <div id="ytapiplayer">You need Flash player 8+ and JavaScript enabled to view this video.</div>
    <script type="text/javascript">
        google.load("swfobject", "2.1");
        function onYouTubePlayerReady(playerId) {
            ytplayer = document.getElementById("myytplayer");
            ytplayer.playVideo();
            ytplayer.mute();
                }
        var params = { allowScriptAccess: "always" };
        var atts = { id: "myytplayer" };
        swfobject.embedSWF("http://www.youtube.com/v/5P4JNOv8cf4?enablejsapi=1&playerapiid=ytplayer&allowFullScreen=true&version=3",
        "ytapiplayer", "366", "206", "8", null, null, params, atts)
    </script>
</center>