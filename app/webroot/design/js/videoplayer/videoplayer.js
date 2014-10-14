$('document').ready(function(){
    var player = $('#live_embed_player_flash')[0];
    $('#closePlayer').click(function(){
        $('#player').slideUp(1000,function(){
            $('#closePlayer').hide();
            $('#openPlayer').show();
            var player = $('#live_embed_player_flash')[0];
            player.pauseVideo();
        });
    });

    $('#openPlayer').click(function(){
        $('#player').slideDown(1000,function(){
            $('#openPlayer').hide();
            $('#closePlayer').show();
            player.playVideo();
        });
    });



});