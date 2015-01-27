<?php if(count($webtv) > 0) { ?>
<script>
	//id du stream pour l'utiliser dans le js youtube
	var idVideo = "<?php echo $webtv[0]['Webtv'][iframe_video_thumb] ?>" ;
</script>
<div class="hidden-xs">
	<div class="row">
		<div class="col-lg-12">
			<div >
				<h4><span class="col-lg-5 col-md-5 col-sm-5 col-xs-4 line-title-high-tech">&nbsp;</span>
					<span class="col-lg-2 col-md-2 col-sm-2 col-xs-4 big-title">WEB TV</span>
					<span  class="col-lg-5 col-md-5 col-sm-5 col-xs-4 line-title-high-tech">&nbsp;</span>
				</h4>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-lg-12" id="controlPlayer">
        <span id="closePlayer" style="color:white"><button class="btn btn-thunder2"><span
		        class="glyphicon glyphicon-remove"></span> Fermer
        </button></span>
        <span id="openPlayer" style="color:white;display:none"><button class="btn btn-thunder2"><span
		        class="glyphicon glyphicon-chevron-down"></span> Ouvrir
        </button></span>
		</div>
		<div class="row">
			<div id="player">
				<div class="col-xs-8 col-sm-8 col-lg-8">
					<div class="">
						<div id="webtv" class="panel-body">
							<?php

						if($webtv[0]['Webtv'][iframe_video_thumb])
						{
                            echo $webtv[0]['Webtv'][iframe_video_thumb];
                         }
                     ?>
						</div>
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-lg-4">
					<div class="">
						<div id="webchat" class="panel-body">

							<?php
                        if($webtv[0]['Webtv'][iframe_chat])
                        {
                            echo $webtv[0]['Webtv'][iframe_chat];
                         }
                    ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	if(strlen($webtv[0]['Webtv'][iframe_video_thumb]) < 25)
	{
			echo $this->Html->script('/design/js/videoplayer/youtubePlayer');
}

} ?>