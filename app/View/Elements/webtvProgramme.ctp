<div id="webtv-programme">
	<div >
		<h5><span class="col-lg-3 col-sm-5 col-md-3 col-xs-5 line-title-high-tech">&nbsp;</span>
			<span class="col-lg-6 col-sm-2 col-md-6 col-xs-2 big-title">PROGRAMME WEBTV</span>
			<span  class="col-lg-3 col-sm-5 col-md-3 col-xs-5 line-title-high-tech">&nbsp;</span>
		</h5>
	</div>
	<br/>
	<?php if(count($eventNow) > 0)
	{ ?>
	<div class="row">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-padding horaires">
		                                <span class="poste ">
			                                Maintenant
		                                </span>
		</div>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<?php
                            if (isset($eventNow[0]['EventType']['photo']))
                                echo $this->Html->image('http://www.thunderbot.gg/files/event_type/photo/'.($eventNow[0]['EventType']['photo_dir'].'/'.$eventNow[0]['EventType']['photo']),
			array('class' => 'img-responsive'));
			?>
		</div>
	</div>
	</br>
	<?php } ?>
	<?php

	if(count($eventsNext) > 0)
	{
	foreach ($eventsNext as $event): ?>
	<div class="row">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-padding horaires">
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
	<?php endforeach; } ?>
	</ul>
</div>