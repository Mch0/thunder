$('document').ready(function(){

    $('#closePlayer').click(function(){
        $('#player').slideUp(1000,function(){
            $('#closePlayer').hide();
            $('#openPlayer').show();
        });
    });

    $('#openPlayer').click(function(){
        $('#player').slideDown(1000,function(){
            $('#openPlayer').hide();
            $('#closePlayer').show();
        });
    });
});