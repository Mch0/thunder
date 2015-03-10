BCL = {};


BCL.onTemplateLoaded = function (expID) {
    var player = brightcove.getPlayer(expID);
    var video = player.getModule(APIModules.VIDEO_PLAYER);
    var exp = player.getModule(APIModules.EXPERIENCE);
    exp.addEventListener(BCExperienceEvent.TEMPLATE_READY,
        function () {
            // sets the volume to 50%
            console.log("otot");
            video.mute(true);
        });
};

/*//handler (gestionnaire) d'événement template loaded
BCL.onTemplateLoad = function (experienceID) {

    // permet d'obtenir des références au lecteur et aux événements et modules de l'API.
    BCL.player = brightcove.api.getExperience(experienceID);
    BCL.APIModules = brightcove.api.modules.APIModules;
    BCL.adEvent = brightcove.api.events.AdEvent;
    BCL.captionsEvent = brightcove.api.events.CaptionsEvent;
    BCL.contentEvent = brightcove.api.events.ContentEvent;
    BCL.cuePointEvent = brightcove.api.events.CuePointEvent;
    BCL.mediaEvent = brightcove.api.events.MediaEvent;
};

BCL.onTemplateReady = function (evt) {
    BCL.videoPlayer = BCL.player.getModule(BCL.APIModules.VIDEO_PLAYER);
    var monPLayer = BCL.videoPlayer;
    var test = BCL.player.getModule(BCL.APIModules.VIDEO_PLAYER);

};*/

$('document').ready(function () {

    console.log(BCL);
    $('#closePlayer').click(function () {
        $('#player').slideUp(1000, function () {
            $('#closePlayer').hide();
            $('#openPlayer').show();
            //player.stopVideo();
            BCL.videoPlayer.pause(true);
        });
    });

    $('#openPlayer').click(function () {
        $('#player').slideDown(1000, function () {
            $('#openPlayer').hide();
            $('#closePlayer').show();
            //player.playVideo();
            BCL.videoPlayer.pause(false);
        });
    });
});
