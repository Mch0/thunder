
<?php $images = $this->requestAction(array('controller' => 'images', 'action' => 'sidebar_img','plugin' => 'image','admin'=>false)); ?>


<br>
<h2 class="thunder">Galerie</h2>
		<?php foreach ($images as $image): ?>
			<div class="img_sidebar">
			<h3 class="h3_title_galerie_sidebar"><span class="comment_total"> <i class="icon-comment icon-white"></i> <?php echo h($image['Image']['comment_count']); ?> </span> &nbsp;<?php echo $this->Text->truncate($image['Image']['title'],29,array('exact'=>false,'html'=>true)); ?>  </h3>
			<a title="Regarder la vidéo" href="<?php echo $this->Html->url($image['Image']['link']); ?>">
           <img class="image_index_full" src="http://www.thunderbot.gg/thumb.php?src=<?php echo $this->Html->url($image['Image']['image']); ?>&w=250&zc=1" alt="">

			</a>
			</div>
		<?php endforeach; ?>
