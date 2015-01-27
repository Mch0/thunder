<!-- PREVIOUS ARTICLE -->
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	<?php if(count($articlePrev) > 0)
	{   ?>
	<a class="nav-article" href="<?php echo $this->Html->url($articlePrev['Article']['link']); ?>">
		<span class="prev-article pull-left">Article précédent</span>
		<br/>
		<span class="glyphicon glyphicon-chevron-left pull-left"></span> &nbsp;
		<span class="pull-left"><?=  $this->Text->truncate($articlePrev['Article']['article_title'],45,array('exact'=>false,'html'=>true)); ?></span>

	</a>
	<?php   }   ?>

</div>
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	<ul class="center">
		<li>
			<a class="link-facebook-small popup" onclick="" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $this->Html->url($article['Article']['link'],true) ?>">
				<?= $this->Html->image('social/icon_facebook.png',array('height' => '64', 'width' => '64')) ?>
			</a>
		</li>
		<li>
			<a class="link-tweeter-small popup" onclick="" target="_blank" href="http://twitter.com/share?text=<?= $title; ?>&url=<?= $this->Html->url($article['Article']['link'],true) ?>">
				<?= $this->Html->image('social/icon_twitter.png', array('height' => '64', 'width' => '64')) ?>
			</a>
		</li>
	</ul>
</div>
<!-- NEXT ARTICLE -->
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	<?php if(count($articleNext) > 0)
	{   ?>
	<a class="nav-article" href="<?php echo $this->Html->url($articleNext['Article']['link']); ?>">
		<span class="next-article pull-right">Article suivant</span>
		<br/>
		<span class="glyphicon glyphicon-chevron-right pull-right"></span> &nbsp;
		<span class="pull-right"><?=  $this->Text->truncate($articleNext['Article']['article_title'],45,array('exact'=>false,'html'=>true)); ?></span>

	</a>
	<?php   }   ?>



</div>