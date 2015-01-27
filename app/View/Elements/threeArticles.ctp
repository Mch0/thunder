
<?php foreach ($threearticles as $threearticle): ?>
<article>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a class="" href="<?php echo $this->Html->url($threearticle['Article']['link']); ?>">
				<?php $srcImg = "http://".$_SERVER['SERVER_NAME']."/thumb.php?src=/files/article/photo/".$threearticle['Article']['photo_dir']."/".$threearticle['Article']['photo']."&w=270&h=166"  ?>
				<img id="" class="img-responsive" alt="<?php echo $threearticle['Article']['article_title']; ?>" src="<?php echo $srcImg ?>" />
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<strong class="strong_comment_redacteur"><em><?php echo h($thumbarticle['Category']['category_name']); ?></em></strong>
			<small><?php echo $this->frenchDate->french($threearticle['Article']['created']); ?> | </small>
			<strong class="strong_comment_redacteur"><em> &nbsp;<i class="icon-pencil"></i>
				<a class="" href="/membre/<?php echo $threearticle['User']['id']; ?>">
					<strong class="strong_comment_redacteur"> <?php echo h($threearticle['User']['user_name']); ?></strong>
				</a>
				<?php echo h($threearticle['Article']['redacteur']); ?></em></strong>
			<a class="" href="<?php echo $this->Html->url($threearticle['Article']['link']); ?>"><h4><?php echo h($threearticle['Article']['article_title']); ?></h4></a>
		</div>
	</div>
</article>
<hr/>
<?php endforeach; ?>