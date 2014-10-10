



<div class="container">
  <div class="row">
	<div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
     
      <div class="list-group panel panel-primary">
       <div id="gallery_block"> 
              <h1 class="thunder_article_view">Mes Images</h1>
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
 					<div class="min_height">
								<?php foreach ($images as $image): ?>

										<h2><?php echo $this->Text->truncate($image['Image']['title'],34,array('exact'=>false,'html'=>true)); ?>		<?php echo h($image['Image']['online'])=='0'?'<span class="red_validate">Non envoyé</span>':'<span class="green_validate">Validé</span>'; ?>
										<?php echo h($image['Image']['validate'])=='0'?'<span class="red_validate">Hors ligne</span>':'<span class="green_validate">En ligne</span>'; ?>&nbsp;  <span class="comment_total"> <i class="icon-comment icon-white"></i> <?php echo h($image['Image']['comment_count']); ?> </span>
								          &nbsp;</h2>


								<a class="" href="<?php echo $this->Html->url($image['Image']['link']); ?>">
								     <img class="image_index_full" src="http://www.thunderbot.gg/thumb.php?src=<?php echo $this->Html->url($image['Image']['image']); ?>&w=460&zc=1" alt="">
								  </a>

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
	</div>
</div>












