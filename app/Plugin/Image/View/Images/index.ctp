

<?php $this->html->meta ('description', 'ThunderBot Galeries', array('inline' =>false)); ?>




 <!-- Content -->
<div class="container">
  <div class="row">

<div class="col-xs-12 col-sm-9 col-sm-9 col-lg-9">
     
      <div class="list-group panel panel-primary">




          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <h1>Galerie<h1>
                        <?php //debug($images); ?>
                        <?php foreach ($images as $image): ?>
                      <div id="gallery_block"> 
                        <div class="row"> 
						<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                       </div>
                          <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                      <a class="<?php echo $image['Image']['title']; ?>" href="http://www.thunderbot.gg/membre/<?php echo $image['User']['id']; ?>">
               <strong class="strong_comment_redacteur"><em><?php echo h($image['User']['user_name']); ?></em></strong>
                      </a>
                             <a href="<?php echo $this->Html->url($image['Image']['link']); ?>"> <h2 class=""><?php echo $this->Text->truncate($image['Image']['title'],100,array('exact'=>false,'html'=>true)); ?> <span class="comment_total"><span class="glyphicon glyphicon-comment"></span> <?php echo h($image['Image']['comment_count']); ?> </span></h2> </a>
                              <a href="<?php echo $this->Html->url($image['Image']['link']); ?>">

                               <img id="img_gallery" class="img-responsive" alt="" src="http://www.thunderbot.gg//thumb.php?src=<?php echo $image['Image']['image']; ?>&w=600&zc=1"></img> 

                             </a>
                          </div>
                       
						<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                       </div>
                        </div>
                          </div>
                        <?php endforeach; ?>

            </div>
        </div> 
      </div>



      <div class="pagination pagination-large">
          <ul class="pagination">
                  <?php
                      echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                      echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                      echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                  ?>
              </ul>
      </div>
</div>




</div>



<!-- SIDEBAR -->
<div class="col-xs-12 col-sm-3 col-sm-3 col-lg3">
    <?php echo $this->Html->link("Ajouter",array('action'=>'add'),array('class'=>'btn btn-success btn-xs')); ?>
    <?php echo $this->Html->link("Mes images",array('action'=>'index_user'),array('class'=>'btn btn-primary btn-xs')); ?>
    <?php echo $this->Html->link("Images validées",array('action'=>'index_user_validate'),array('class'=>'btn btn-info btn-xs')); ?>

    <div class="list-group panel panel-primary">
          <div class="panel-heading text-center hidden-xs">
            <h4>VIDEOS</h4>
            </div>
          <div class="panel-body">
                <div class="tab-pane fade in active" id="home">
                <div class="row">
                <?php foreach ($videos AS $video): ?>
                        <div class="col-xs-6 col-sm-12 col-lg-12">
                          <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                          <div class="thumbnail" style="">
                          <a class="" href="http://www.thunderbot.gg/videos/<?php echo $video['Video']['id']; ?>-<?php echo $video['Video']['slug']; ?>">
                          <img class="img-responsive" alt="" src="http://www.thunderbot.gg/thumb.php?src=/files/video/photo/<?php echo $video['Video']['photo_dir']; ?>/<?php echo $video['Video']['photo']; ?>&w=150&h=100&zc=1"></img></a>
                          </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                          <a class="" href="http://www.thunderbot.gg/videos/<?php echo $video['Video']['id']; ?>-<?php echo $video['Video']['slug']; ?>"><h5><?php echo $video['Video']['video_title']; ?></h5></a>
                          </div>
                          </div>
                        </div>
                <?php endforeach; ?>

                </div>
                </div>
          </div>
    </div>
</div>



</div>

</div>








