<?php if(count($webtv) > 0 && $webtv[0]['Webtv']['onlinehp'] == 1 ) { ?>
<div class="hidden-xs">
	<div class="row">
		<div id="">
		<div class="col-xs-12 col-sm-12 col-lg-12" id="controlPlayer">
        <span id="closePlayer" style="color:white ;float:right"><button class="pull-right btn"><span
		        class="glyphicon glyphicon-remove"></span>
        </button></span>
        <span id="openPlayer" style="float:right;color:white;display:none"><button class="pull-right btn"><span
		        class="glyphicon glyphicon-chevron-down"></span>
        </button></span>
		</div>
		<div class="row" >
			<div class="col-lg-12">
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
	</div>
</div>



<?php
} ?>
