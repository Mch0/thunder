<?php if(count($webtv) > 0 && $webtv[0]['Webtv']['onlinehp'] == 1 ) { ?>
<div class="hidden-xs">
	<div class="row" style="max-height: 230px">
		<div class="col-xs-12 col-sm-12 col-lg-12" >
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
			<div id="player">
				<div id="webtv">
							<?php

						if($webtv[0]['Webtv'][iframe_video_thumb])
						{
                            echo $webtv[0]['Webtv'][iframe_video_thumb];
                         }
                     ?>
						</div>

				<?php if(!hp)
				{ ?>
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
				<?php } ?>
			</div>
			</div>
		</div>
	</div>
</div>



<?php
} ?>
