<?php $events_now = $this->requestAction(array('controller' => 'events', 'action' => 'webtv_bar_now','plugin' => 'full_calendar','admin'=>false)); ?>
<?php $events_next = $this->requestAction(array('controller' => 'events', 'action' => 'webtv_bar','plugin' => 'full_calendar','admin'=>false)); ?>


<div  id="webtv">
    <?php $this->html->meta ('description', 'ThunderBot WebTV - Admirez le skill ! ThunderBot TV c\'est les meilleurs
    joueurs League of Legends, Chaîne sur laquelle vous pouvez retrouver les meilleurs joueurs français en activité sur
    League of Legends ainsi que John \'HyrqBot\' Velly.', array('inline' =>false));?>
    <script src='http://www.thunderbot.gg/caster/cast.js'></script>


    <!-- CONTENT -->
    <div class="container">
            <div class="row">
                <!-- EVENT IMAGE -->
                <!--<div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?php
                            if (isset($events_now[0]['EventType']['photo']))
                                echo $this->Html->image('http://www.thunderbot.gg/files/event_type/photo/'.($events_now[0]['EventType']['photo_dir'].'/'.$events_now[0]['EventType']['photo']),
                                    array('class' => 'img-responsive'));
                        ?>
                    </div>
                </div>-->
                <!-- WEB TV + CHAT -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="videocontainer">
                            <?php echo $webtvs[0]['Webtv']['iframe_video']; ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" id="tv-chat">
                        <?php echo $webtvs[0]['Webtv'][iframe_chat] ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-5">

                    </div>
                    <div class="row" id="tv-info">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#MyThunderBot" role="tab" data-toggle="tab">@MyThunderBot</a></li>
                                <li><a href="#ThunderBot" role="tab" data-toggle="tab">#ThunderBot</a></li>
                                <li><a href="#Programme" role="tab" data-toggle="tab">Programme</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="MyThunderBot">
                                    <div id="twit">
                                        <a class="twitter-timeline" href="https://twitter.com/MyThunderBot"
                                           data-widget-id="363309093869477888">Tweets de @MyThunderBot</a>
                                        <script>!function (d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                            if (!d.getElementById(id)) {
                                                js = d.createElement(s);
                                                js.id = id;
                                                js.src = p + "://platform.twitter.com/widgets.js";
                                                fjs.parentNode.insertBefore(js, fjs);
                                            }
                                        }(document, "script", "twitter-wjs");</script>
                                    </div>
                                </div>
                                <div class="tab-pane" id="ThunderBot">
                                    <div id="twit-ThunderBot">
                                        <a class="twitter-timeline"  href="https://twitter.com/hashtag/ThunderBot"
                                           data-widget-id="524544751295414273">Tweets #ThunderBot</a>
                                        <script>!function(d,s,id)
                                        {
                                            var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
                                            if(!d.getElementById(id))
                                            {
                                                js=d.createElement(s);
                                                js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
                                                fjs.parentNode.insertBefore(js,fjs);
                                            }
                                        }
                                                (document,"script","twitter-wjs");</script>
                                    </div>
                                </div>
                                <div class="tab-pane" id="Programme">
	                                <div class="row">
		                                <div class="col-xs-0 col-sm-3 col-md-3 col-lg-3">
		                                <span class="poste">
			                                En ce moment
		                                </span>
			                                </div>
		                                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			                                <?php
                            if (isset($events_now[0]['EventType']['photo']))
                                echo $this->Html->image('http://www.thunderbot.gg/files/event_type/photo/'.($events_now[0]['EventType']['photo_dir'].'/'.$events_now[0]['EventType']['photo']),
			                                array('class' => 'img-responsive'));
			                                ?>
		                                </div>
	                                </div>
	                                </br>
                                    <?php foreach ($events_next as $event): ?>
                                    <div class="row">
                                        <div class="col-xs-0 col-sm-3 col-md-3 col-lg-3">
                                <span class="poste">
                                    <?php echo $this->Time->format ('H:i', ($event['Event']['start'])); ?>/<?php echo $this->Time->format ('H:i', ($event['Event']['end'])); ?>
                                </span>
                                        </div>
                                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                                            <?php echo $this->
                                            Html->image('http://www.thunderbot.gg/files/event_type/photo/'.($event['EventType']['photo_dir'].'/'.$event['EventType']['photo']),
                                            array('class' => 'img-responsive')); ?>
                                        </div>
                                    </div>
                                    </br>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>









         
