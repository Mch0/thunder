
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
function onYouTubePlayerAPIReady() {
    player = new YT.Player('player', {
        height: '450',
        width: '720',
        style: 'margin-left: 26%',
        videoId: idVideo,
        playerVars: {'autoplay': 1}
    });
    $('#player').css('margin-left','20%');
    }

