
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
function onPlayerReady(event) {
    event.target.setPlaybackQuality('hd720');
};
function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.BUFFERING) {
        event.target.setPlaybackQuality('hd720');
    }};
function onYouTubePlayerAPIReady() {
    player = new YT.Player('player', {
        height: '450',
        width: '720',
        videoId: idVideo,
        playerVars: {'autoplay': 1, 'hd': 1},
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
    $('#player').css('margin-left','20%');

    };

