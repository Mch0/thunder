


<?php $events = $this->requestAction(array('controller' => 'events', 'action' => 'webtv_bar_now','plugin' => 'full_calendar','admin'=>false)); ?>




<h2 class="thunder">Thunderbot TV </span></h2>

<div id="bouton">
    <a id="hide" class="btn btn-small btn-warning">Webtv</a>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
  $("#hide").click(function(){
    $("webtv").toggle();
  });
});
</script>


<webtv>
    <div class="container">
        <div class="box-center">
            <div class="row-fluid">
                <div class="span8">
                    <div id="ref_front"><object width="640" height="360"><param name="movie" value="http://www.dailymotion.com/swf/video/x11svk9?autoPlay=1&autoMute=1&forcedQuality=sd&syndication=150305"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param><param name="wmode" value="transparent"></param><embed type="application/x-shockwave-flash" src="http://www.dailymotion.com/swf/video/x11svk9?autoPlay=1&autoMute=1&forcedQuality=sd&syndication=150305" width="640" height="360" wmode="transparent" allowfullscreen="true" allowscriptaccess="always"></embed></object></div>
                </div>

<div id="box_streamer">     
    <div class="span4">

    <?php $events = $this->requestAction(array('controller' => 'events', 'action' => 'webtv_bar_now','plugin' => 'full_calendar','admin'=>false)); ?>
    <div class="banniere_stream">
    <?php foreach ($events as $event): ?>
    <?php echo $this->Html->image('/files/event_type/photo/'.($event['EventType']['photo_dir'].'/'.$event['EventType']['photo']), array('id' => 'img_front')); ?>
    <?php endforeach; ?>
    </div>

    <h3>A SUIVRE :</h3>
    <?php $events = $this->requestAction(array('controller' => 'events', 'action' => 'webtv_bar_index','plugin' => 'full_calendar','admin'=>false)); ?>
    <?php foreach ($events as $event): ?>
    <?php echo $this->Html->image('/files/event_type/photo/'.($event['EventType']['photo_dir'].'/'.$event['EventType']['photo']), array('id' => 'img_front')); ?>
    <?php endforeach; ?>

    </div>
</div>

</div>
        </div>
    </div>
</webtv>