
<?php $this->html->meta ('description', 'ThunderBot - Membre - '. $user['User']['user_name'], array('inline' =>false)); ?>
<?php $this->set('title_for_layout', $user['User']['user_name']) ?>



 <!-- ARTICLE -->
<div class="container">
  <div class="row">


<div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
     
      <div class="list-group panel panel-primary">
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                
                      <div class="min_height">



                        <div class="row">
                  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                     <h2><?php echo $user['User']['user_name']; ?></h2>

          <?php

          if ($user['User']['avatar']) {
              echo $this->Html->image('http://www.thunderbot.gg/files/users/thumbnails/'.($user['User']['id'].'_scale_150.jpg'), array('class' => 'img-responsive'));
          } else {
              echo $this->Html->image("/design/css/img/robotthunderbot.png", array("class" => "img-responsive",));
          }
          ?>





                  </div>

                  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

                  </div>


                  </div>


                     <?php if ($user['User']['role'] === 'redacteur' ): ?> 
                                <hr>
                                <br>

                                <div class="row"> 
                                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <h2>Articles</h2>
                                  </div>
                                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <h2>Blog</h2>
                                  </div>
                                  </div>

                                <div class="row"> 
                                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<?php foreach ($articles AS $article): ?>
<?php
  $title = h($article['Article']['article_title']);
  if(substr($title, 0, 2) == '§')
    $title = substr($title, 2);
?>
      <div class="list-group panel panel-primary">
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
  <a class="" href="http://www.thunderbot.gg/article/<?php echo $article['Article']['id']; ?>-<?php echo $article['Article']['slug']; ?>"><img class="img-responsive" alt="" src="http://www.thunderbot.gg/thumb.php?src=/files/article/photo/<?php echo $article['Article']['photo_dir'] ?>/<?php echo $article['Article']['photo'] ?>&w=270&h=166&zc=1"></img></a>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <a class="" href="http://www.thunderbot.gg/article/<?php echo $article['Article']['id']; ?>-<?php echo $article['Article']['slug']; ?>">
      <strong class="strong_comment_redacteur"><em><?php echo h($article['Category']['category_name']); ?></em></strong>
                      <h2 class="title5" ><span class="comment_total2"><span class="glyphicon glyphicon-comment"></span> <?php echo h($article['Article']['comment_count']); ?>  </span>
          &nbsp;<?php echo $title; ?></h2></a>
                      <p class=" clearfix">
                      <small><?php echo $this->frenchDate->french($article['Article']['created']); ?> | </small>
                      <strong class="strong_comment_redacteur"><em> &nbsp;<i class="icon-pencil"></i><?php echo $user['User']['user_name']; ?></em></strong>
                      </p>
                      <p> <?php echo $this->Text->truncate($article['Article']['article_summary'],175,array('exact'=>false,'html'=>true)); ?> </p>
                  </div>
                </div>
              </div>
            </div>
        </div> 
        <div class="panel-footer text-right">
          <a class="" href="http://www.thunderbot.gg/article/<?php echo $article['Article']['id']; ?>-<?php echo $article['Article']['slug']; ?>">Voir la news &rarr;</a>
        </div>
      </div>
                 <?php endforeach; ?>
                                    


                                  </div>

                                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                  </div>


                                  </div>

                     <?php else: ?> 
                    <?php endif; ?>






                <hr>
                <br>

                <div class="row"> 


                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <h2>Commentaires</h2>


         <?php foreach ($comments as $k => $comment): ?>

      <div class="list-group panel panel-primary">
          
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-3 col-sm-3 col-md3 col-lg-3">
          <?php

          if ($user['User']['avatar']) {
              echo $this->Html->image('http://www.thunderbot.gg//files/users/thumbnails/'.($user['User']['id'].'_scale_150.jpg'), array('class' => 'img-responsive'));
          } else {
              echo $this->Html->image("/design/css/img/robotthunderbot.png", array("class" => "img-responsive",));
          }
          ?>
                  </div>
                  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                          <p>
                         <strong class="strong_comment_redacteur"><em><?= h($comment['User']['user_name']); ?></em></strong>
                          <?= $this->Time->timeAgoInWords($comment['Comment']['created']); ?>
                         </p>
                          <?= nl2br(h($comment['Comment']['content'])); ?>
                  </div>
                </div>
              </div>
            </div>
        </div> 
      </div>
             <?php endforeach ?>



                        
                  </div>

                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <h2>Galeries</h2>

    <div class="panel-body">
      <?php foreach ($images AS $image): ?>
        <a class="" href="http://www.thunderbot.gg/galerie/<?php echo $image['Image']['id']; ?>-<?php echo $image['Image']['slug']; ?>"><h4><?php echo $image['Image']['title']; ?>        <span class="comment_total3"><span class="glyphicon glyphicon-comment"></span> <?php echo h($image['Image']['comment_count']); ?>  </span>
          &nbsp;</h4></a>
        <a class="" href="http://www.thunderbot.gg/galerie/<?php echo $image['Image']['id']; ?>-<?php echo $image['Image']['slug']; ?>">
         <img class="img-responsive" src="http://www.thunderbot.gg/thumb.php?src=<?php echo $this->Html->url($image['Image']['image']); ?>&w=400&zc=1" alt="">
        <hr>  
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
</div>


