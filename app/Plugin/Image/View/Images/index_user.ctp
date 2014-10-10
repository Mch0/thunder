
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

									<?php $this->Thumbnail->get($image['Image']['image'], array('size'=>'500', 'transform'=>'scale'));  ?>
									<?php echo $this->Html->image('/files/users/thumbnails/'.($user['User']['id'].'_scale_150.jpg'), array('class' => 'thumb_profil')); ?>

									<h2><?php echo $this->Text->truncate($image['Image']['title'],34,array('exact'=>false,'html'=>true)); ?></h2>
									<?php echo $this->Acl->link(__('Editer'), array('action' => 'edit', $image['Image']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
									<?php echo $this->Acl->link("Effacer",array('action'=>'delete',$image['Image']['id']),array('class'=>'btn btn-mini btn-danger'),null,'Voulez vous vraiment supprimer cette video ?'); ?>



									<td><?php echo h($image['Image']['online'])=='0'?'<span class="red_validate">Non envoyé</span>':'<span class="green_validate">En attente de validation</span>'; ?></td>
									<td><?php echo h($image['Image']['validate'])=='0'?'<span class="red_validate">Hors ligne</span>':'<span class="green_validate">En ligne</span>'; ?></td>

									 <img class="image_index_full" src="http://www.thunderbot.gg/thumb.php?src=<?php echo $this->Html->url($image['Image']['image']); ?>&w=460&zc=1" alt="">

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

