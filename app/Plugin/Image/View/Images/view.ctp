



<?php $this->set('title_for_layout', $image['Image']['title']) ?>
<?php $this->html->meta ('description', $image['Image']['title'] , array('inline' =>false)); ?>



 <!-- ARTICLE -->
<div class="container">
  <div class="row">


<div class="col-xs-12 col-sm-9 col-sm-9 col-lg-9">
     
      <div class="list-group panel panel-primary">
       <div id="gallery_block"> 

          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                       </div>
                 <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                     <a href="<?php echo $this->Html->url($image['Image']['link']); ?>"> <h1 class=""><?php echo $this->Text->truncate($image['Image']['title'],100,array('exact'=>false,'html'=>true)); ?> <span class="comment_total"><span class="glyphicon glyphicon-comment"></span> <?php echo h($image['Image']['comment_count']); ?> </span></h1> </a>
                     <img class="img-responsive" alt="<?php echo $this->Text->truncate($image['Image']['title'],100,array('exact'=>false,'html'=>true)); ?>" src="http://www.thunderbot.gg/<?php echo $image['Image']['image']; ?>"></img>

                      <a class="" href="http://www.thunderbot.gg/membre/<?php echo $image['User']['id']; ?>">
               <strong class="strong_comment_redacteur"><em><?php echo h($image['User']['user_name']); ?></em></strong>
                      </a>
                      <?php echo ($image['Image']['galerie_content']); ?>
                  </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                       </div>


                </div>
              </div>
            </div>
        </div> 
        </div> 
      </div>



      <!-- COMMMENT -->
      <div class="list-group panel panel-primary">
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


        <?php //debug($comments); ?>
         <?php foreach ($comments as $k => $comment): ?>

      <div class="list-group panel panel-primary">
          
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-12 col-sm-3 col-md3 col-lg-3">
          <?php
          if ($comment['User']['avatar']) {
              echo $this->Html->image('http://www.thunderbot.gg/files/users/thumbnails/'.($comment['User']['id'].'_scale_150.jpg'), array('class' => 'img-responsive'));
          } else {
                                      echo $this->Html->image("/design/css/img/robotthunderbot.png", array("class" => "img-responsive",));
          }
          ?>
          <?php if (
          $this->Session->read('Auth.User.id') == $comment['Comment']['user_id'] 
          ): ?>
          <p>
          <?php echo $this->html->link(__('Editer'), array('controller' => 'comments', 'action' => 'edit','plugin' => 'comment', $comment['Comment']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
          <?php echo $this->html->link(__('Effacer'), array('controller' => 'comments', 'action' => 'delete','plugin' => 'comment', $comment['Comment']['id']),array('class'=>'btn btn-mini btn-danger'),null,'Voulez vous vraiment supprimer cette Article ?'); ?>
          </p>
          <?php endif ?>
                  </div>
                  <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                          <p>
                      <a class="" href="http://www.thunderbot.gg/membre/<?php echo $comment['User']['id']; ?>">
                      <strong class="strong_comment_redacteur"><em> &nbsp;<i class="icon-pencil"></i><?php echo h($comment['User']['user_name']); ?></em></strong>
                      </a>
                          <?= $this->Time->timeAgoInWords($comment['Comment']['created']); ?>
                          <?php echo $this->Vothumb->vote('comment', $comment['Comment']['id']) ; ?></p>
                          <?= nl2br(h($comment['Comment']['content'])); ?>
                  </div>
                </div>
              </div>
            </div>
        </div> 
      </div>
                          <?php endforeach ?>

                  </div>
                </div>
              </div>
            </div>
        </div> 
      </div>



      <div class="list-group panel panel-primary">
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?php if ($this->Session->read('Auth.User.id')): ?>
                        <?= $this->Comment->form('Image', $image['Image']['id']); ?>
                        <?php endif ?>
                  </div>
                </div>
              </div>
            </div>
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









         
