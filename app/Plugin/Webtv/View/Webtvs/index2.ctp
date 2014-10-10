


    <?php $events_now = $this->requestAction(array('controller' => 'events', 'action' => 'webtv_bar_now','plugin' => 'full_calendar','admin'=>false)); ?>
    <?php $events_next = $this->requestAction(array('controller' => 'events', 'action' => 'webtv_bar','plugin' => 'full_calendar','admin'=>false)); ?>




<div id="webtv">
<?php $this->html->meta ('description', 'ThunderBot WebTV - Admirez le skill ! ThunderBot TV c\'est les meilleurs joueurs League of Legends, Chaîne sur laquelle vous pouvez retrouver les meilleurs joueurs français en activité sur League of Legends ainsi que John \'HyrqBot\' Velly.', array('inline' =>false));
?>
<script src='http://www.thunderbot.gg/caster/cast.js'></script>



 <!-- CONTENT -->
<div class="container">
  <div class="row">


<div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">

  <div class="list-group panel panel-primary">
      <div class="panel-body">
        <div class="thunderbox">
          <div class="caption">
            <div class="row"> 

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <?php 
            if (isset($events_now[0]['EventType']['photo']))
              echo $this->Html->image('http://www.thunderbot.gg/files/event_type/photo/'.($events_now[0]['EventType']['photo_dir'].'/'.$events_now[0]['EventType']['photo']), array('class' => 'img-responsive')); 
          ?>
                </div>

            </div>
          </div>
        </div>
    </div> 
  </div>





      <div class="list-group panel panel-primary">
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
<<!-- webtvs/index2.ctp -->
                  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="videocontainer">
                            <?php echo $webtvs[0]['Webtv']['iframe_video']; ?>
                        </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <iframe id="chattv" src="http://www.twitch.tv/ogaminglol/chat?popout=" frameborder="0" scrolling="no" height="600px" width="100%"></iframe>
                  </div>
                </div>
              </div>
            </div>
        </div> 
      </div>




      <div class="list-group panel panel-primary">
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 


  <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-5">
      <div class="panel-body">

      <hr>

      <?php foreach ($events_next as $event): ?>

      <div class="row"> 
      <div class="col-xs-0 col-sm-3 col-md-3 col-lg-3">
      <span class="poste"><?php echo $this->Time->format ('H:i', ($event['Event']['start'])); ?>/<?php echo $this->Time->format ('H:i', ($event['Event']['end'])); ?></span>
      </div>
      <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
      <?php echo $this->Html->image('http://www.thunderbot.gg/files/event_type/photo/'.($event['EventType']['photo_dir'].'/'.$event['EventType']['photo']), array('class' => 'img-responsive')); ?>
      </div>
      </div>
      </br>
      <?php endforeach; ?>
      </div>
  </div>






















                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                      <div id="twit">               
                        <a class="twitter-timeline"  href="https://twitter.com/MyThunderBot"  data-widget-id="363309093869477888">Tweets de @MyThunderBot</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        </div>  
                      </div> 
                  </div>

                </div>
              </div>
            </div>
        </div> 
      </div>

</div>





    </div>
</div>
</div>








         
