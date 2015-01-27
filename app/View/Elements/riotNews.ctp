<div id="riot">
	<div >
		<h5><span class="col-lg-3 col-sm-5 col-md-3 col-xs-5 line-title-high-tech">&nbsp;</span>
			<span class="col-lg-6 col-sm-2 col-md-6 col-xs-2 big-title">RIOT NEWS</span>
			<span  class="col-lg-3 col-sm-5 col-md-3 col-xs-5 line-title-high-tech">&nbsp;</span>
		</h5>
	</div>
	<br/>
	<ul>
		<?php foreach($riotLinks as $link) { ?>
		<li>
			<div class="row">

				<div class="col-sm-1 col-xs-1 col-md-1 col-lg-1">
					<?php echo $this->Html->Image('logo_news_riot.png') ?>
				</div>
				<div class="col-sm-10 col-xs-10 col-md-10 col-lg-10">
					<?= $link ?>
				</div>
			</div>
		</li>
		<hr/>
		<?php } ?>
	</ul>
</div>