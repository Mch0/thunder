$(document).ready(function(){
function ref(elem) {
$.ajax({ 
url: 'http://94.23.235.215/~cast/refresh.php',
//url : 'http://81.56.162.218:8888/thunderwork/cast/refresh.php',
processData: false,	contentType: false,	success: function(data) { console.log(data); if (data == 'refresh') {
$('#ref').html('<object width="366" height="206"><param name="movie" value="http://www.dailymotion.com/swf/video/x11svk9?autoPlay=1&autoMute=1"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param><param name="autoMute" value="true"></param><param name="forcedQuality" value="240"></param><param name="wmode" value="transparent"></param><embed type="application/x-shockwave-flash" src="http://www.dailymotion.com/swf/video/x11svk9?autoPlay=1&autoMute=1" width="366" height="206" wmode="transparent" allowfullscreen="true" allowscriptaccess="always" autoMute="1" forcedQuality="240"></embed></object>'); 
} } }); }
$('#data').val('');
setInterval(function refe() {
ref('false'); },29600);
});