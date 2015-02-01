BCL = {};
//handler (gestionnaire) d'événement template loaded
BCL.onTemplateLoad = function (experienceID) {

  // permet d'obtenir des références au lecteur et aux événements et modules de l'API.
    BCL.player = brightcove.api.getExperience(experienceID);
      BCL.APIModules = brightcove.api.modules.APIModules;
        BCL.adEvent = brightcove.api.events.AdEvent;
          BCL.captionsEvent = brightcove.api.events.CaptionsEvent;
            BCL.contentEvent = brightcove.api.events.ContentEvent;
              BCL.cuePointEvent = brightcove.api.events.CuePointEvent;
              BCL.mediaEvent = brightcove.api.events.MediaEvent;
              console.log(BCL);
              };
              BCL.onTemplateReady = function (evt) {
                BCL.videoPlayer = BCL.player.getModule(BCL.APIModules.VIDEO_PLAYER);
                var test =  BCL.player.getModule(BCL.APIModules.VIDEO_PLAYER);
                };

$('document').ready(function(){
    $('#closePlayer').click(function(){
        $('#player').slideUp(1000,function(){
            $('#closePlayer').hide();
            $('#openPlayer').show();
            //player.stopVideo();
            BCL.videoPlayer.pause(true);
        });
    });

    $('#openPlayer').click(function(){
        $('#player').slideDown(1000,function(){
            $('#openPlayer').hide();
            $('#closePlayer').show();
            //player.playVideo();
            BCL.videoPlayer.pause(false);
        });
    });
});
