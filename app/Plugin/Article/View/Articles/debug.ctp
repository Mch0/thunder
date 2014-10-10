
<?php $this->html->meta ('description', 'ThunderBot c\'est l\'actualité, la web TV, les guides et l\'expertise des progamers sur League of Legends.', array('inline' =>false)); ?>

  <div class="container">





<div class="row">
<!-- CONTENT SIDE-->
<div class="col-xs-12 col-sm-6 col-sm-6 col-lg-6">
<div class="list-group panel panel-primary">
    <div class="panel-body">
    <div id="recherche">
      <?php echo $this->Form->create('Article', array('action' => 'recherche','class'=>'')); ?>
            <div class="row">
              <div class="col-xs-5 col-sm-5 col-sm-5 col-lg-5">
                    <?php echo $this->Form->input('filter',array('div' => false,'label'=>false,'placeholder'=>"Chercher un article",'class'=>'form-control')); ?>
             </div>
              <div class="col-xs-7col-sm-7 col-sm-7 col-lg-7">
                   <span class="chercher"> <button class="btn btn-thunder2" type="submit"><?php echo __('Chercher'); ?></button>
              </div>
            </div>
      <?php echo $this->Form->end(); ?>
    </div>
    </div>
</div>

<?php //debug($thumbarticles); ?>
<?php foreach ($thumbarticles as $thumbarticle): ?>
  <div class="list-group panel panel-primary">
    <div class="panel-body">
      <a class="" href="<?php echo $this->Html->url($thumbarticle['Article']['link']); ?>">
  <img id="img_full" class="img-responsive" alt="<?php echo h($thumbarticle['Article']['article_title']); ?>" src="http://www.thunderbot.gg/thumb.php?src=/files/article/photo/<?php echo $thumbarticle['Article']['photo_dir'] ?>/<?php echo $thumbarticle['Article']['photo'] ?>&w=600&zc=1"></img></a>
      <strong class="strong_comment_redacteur"><em><?php echo h($thumbarticle['Category']['category_name']); ?></em></strong>
    <h2 class="title_black_thunder"><a href="<?php echo $this->Html->url($thumbarticle['Article']['link']); ?>"><?php echo h($thumbarticle['Article']['article_title']); ?></a></h2>
        <p class=" clearfix">
          <span class="comment_total2"><span class="glyphicon glyphicon-comment"></span> <?php echo h($thumbarticle['Article']['comment_count']); ?>  </span>
          &nbsp;|  <small><?php echo $this->frenchDate->french($thumbarticle['Article']['created']); ?> | </small>|  
          <a class="" href="http://www.thunderbot.gg/membre/<?php echo $thumbarticle['User']['id']; ?>">
          <strong class="strong_comment_redacteur"><em><?php echo h($thumbarticle['User']['user_name']); ?></a>
           <?php echo h($thumbarticle['Article']['redacteur']); ?></em></strong>
        </p>
      <p><?php echo $this->Text->truncate($thumbarticle['Article']['article_summary'],175,array('exact'=>false,'html'=>true)); ?></p>
    </div>
  </div>
<?php endforeach; ?>

<div class="list-group panel panel-primary">
    <div class="panel-body">
        <div class="thunderbox">
            <div class="caption">
                <div class="row">
                      <?php //debug($threearticle) ?>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div id="block">
                        <a class="" href="<?php echo $this->Html->url($threearticle[0]['Article']['link']); ?>">
                        <img id="img_full" class="img-responsive" alt="<?php echo $this->Text->truncate($threearticle[0]['Article']['article_title'],600,array('exact'=>false,'html'=>true)); ?>" src="http://www.thunderbot.gg/thumb.php?src=/files/article/photo/<?php echo $threearticle[0]['Article']['photo_dir'] ?>/<?php echo $threearticle[0]['Article']['photo'] ?>&w=270&h=166&zc=1"></img>
                            </a>
                            <strong class="strong_comment_redacteur"><em><?php echo h($thumbarticle['Category']['category_name']); ?></em></strong>
                              <a class="" href="<?php echo $this->Html->url($threearticle[0]['Article']['link']); ?>">
                      <h2 class="title5"><span class="comment_total2"><span class="glyphicon glyphicon-comment"></span> <?php echo h($threearticle[0]['Article']['comment_count']); ?>  </span>
                                &nbsp;<?php echo $this->Text->truncate($threearticle[0]['Article']['article_title'],600,array('exact'=>false,'html'=>true)); ?> </h2>
                            </a>
                            </div>  
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div id="block">
                        <a class="" href="<?php echo $this->Html->url($threearticle[1]['Article']['link']); ?>">
                        <img id="img_full" class="img-responsive" alt="<?php echo $this->Text->truncate($threearticle[1]['Article']['article_title'],600,array('exact'=>false,'html'=>true)); ?>" src="http://www.thunderbot.gg/thumb.php?src=/files/article/photo/<?php echo $threearticle[1]['Article']['photo_dir'] ?>/<?php echo $threearticle[1]['Article']['photo'] ?>&w=270&h=166&zc=1"></img>
                            </a>
                            <strong class="strong_comment_redacteur"><em><?php echo h($thumbarticle['Category']['category_name']); ?></em></strong>
                              <a class="" href="<?php echo $this->Html->url($threearticle[1]['Article']['link']); ?>">
                      <h2 class="title5"><span class="comment_total2"><span class="glyphicon glyphicon-comment"></span> <?php echo h($threearticle[1]['Article']['comment_count']); ?>  </span>
                                &nbsp;<?php echo $this->Text->truncate($threearticle[1]['Article']['article_title'],600,array('exact'=>false,'html'=>true)); ?> </h2>
                            </a>
                            </div>  
                        </div>
                </div>



                <div class="row">

                  <?php //debug($threearticle) ?>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div id="block">
                        <a class="" href="<?php echo $this->Html->url($threearticle[2]['Article']['link']); ?>">
                        <img id="img_full" class="img-responsive" alt="<?php echo $this->Text->truncate($threearticle[2]['Article']['article_title'],600,array('exact'=>false,'html'=>true)); ?>" src="http://www.thunderbot.gg/thumb.php?src=/files/article/photo/<?php echo $threearticle[2]['Article']['photo_dir'] ?>/<?php echo $threearticle[2]['Article']['photo'] ?>&w=270&h=166&zc=1"></img>
                            </a>
                            <strong class="strong_comment_redacteur"><em><?php echo h($thumbarticle['Category']['category_name']); ?></em></strong>
                              <a class="" href="<?php echo $this->Html->url($threearticle[2]['Article']['link']); ?>">
                      <h2 class="title5"><span class="comment_total2"><span class="glyphicon glyphicon-comment"></span> <?php echo h($threearticle[2]['Article']['comment_count']); ?>  </span>
                                &nbsp;<?php echo $this->Text->truncate($threearticle[2]['Article']['article_title'],600,array('exact'=>false,'html'=>true)); ?> </h2>
                            </a>
                        </div>  
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div id="block">
                        <a class="" href="<?php echo $this->Html->url($threearticle[3]['Article']['link']); ?>">
                        <img id="img_full" class="img-responsive" alt="<?php echo $this->Text->truncate($threearticle[3]['Article']['article_title'],600,array('exact'=>false,'html'=>true)); ?>" src="http://www.thunderbot.gg/thumb.php?src=/files/article/photo/<?php echo $threearticle[3]['Article']['photo_dir'] ?>/<?php echo $threearticle[3]['Article']['photo'] ?>&w=270&h=166&zc=1"></img>
                            </a>
                            <strong class="strong_comment_redacteur"><em><?php echo h($thumbarticle['Category']['category_name']); ?></em></strong>
                              <a class="" href="<?php echo $this->Html->url($threearticle[3]['Article']['link']); ?>">
                      <h2 class="title5"><span class="comment_total2"><span class="glyphicon glyphicon-comment"></span> <?php echo h($threearticle[3]['Article']['comment_count']); ?>  </span>
                                &nbsp;<?php echo $this->Text->truncate($threearticle[3]['Article']['article_title'],600,array('exact'=>false,'html'=>true)); ?> </h2>
                            </a>
                            </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  //debug($articles) ?>

<?php
foreach ($articles as $article) {
  $title = h($article['Article']['article_title']);
  if (substr($title, 0, 2) == '§') {
?> 

      <div class="list-group panel panel-primary">
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-md3 col-sm-md3 col-md3 col-lg-3">
  <a class="" href="<?php echo $this->Html->url($article['Article']['link']); ?>"><img class="img-responsive" alt="<?php echo substr($this->Text->truncate($title , 35,array('exact'=>false,'html'=>true)), 2); ?>" src="http://www.thunderbot.gg/thumb.php?src=/files/article/photo/<?php echo $article['Article']['photo_dir'] ?>/<?php echo $article['Article']['photo'] ?>&w=270&h=166&zc=1"></img></a>
                  </div>
                  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <a class="" href="<?php echo $this->Html->url($article['Article']['link']); ?>">
      <strong class="strong_comment_redacteur"><em><?php echo h($article['Category']['category_name']); ?></em></strong>
                      <h2 class="title5" ><span class="comment_total2"><span class="glyphicon glyphicon-comment"></span> <?php echo h($article['Article']['comment_count']); ?>  </span>
          &nbsp;  <?php echo substr($this->Text->truncate($title , 35,array('exact'=>false,'html'=>true)), 2); ?>  </h2></a>
                      <p class=" clearfix">
                      <small><?php echo $this->frenchDate->french($article['Article']['created']); ?> | </small>
                        <a class="" href="http://www.thunderbot.gg/membre/<?php echo $article['User']['id']; ?>">
                         <strong class="strong_comment_redacteur"><em> &nbsp;<i class="icon-pencil"></i><?php echo h($article['User']['user_name']); ?></em></strong>
                        </a>
                      </p>
                  </div>
                </div>
              </div>
            </div>
        </div> 
      </div>

<?php } else { ?>

      <div class="list-group panel panel-primary">
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
  <a class="" href="<?php echo $this->Html->url($article['Article']['link']); ?>"><img class="img-responsive" alt="<?php echo $title; ?>" src="http://www.thunderbot.gg/thumb.php?src=/files/article/photo/<?php echo $article['Article']['photo_dir'] ?>/<?php echo $article['Article']['photo'] ?>&w=270&h=166&zc=1"></img></a>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <a class="" href="<?php echo $this->Html->url($article['Article']['link']); ?>">
      <strong class="strong_comment_redacteur"><em><?php echo h($article['Category']['category_name']); ?></em></strong>
                      <h2 class="title5" ><span class="comment_total2"><span class="glyphicon glyphicon-comment"></span> <?php echo h($article['Article']['comment_count']); ?>  </span>
          &nbsp;<?php echo $title; ?></h2></a>
                      <p class=" clearfix">
                      <small><?php echo $this->frenchDate->french($article['Article']['created']); ?> | </small>
                        <a class="" href="http://www.thunderbot.gg/membre/<?php echo $article['User']['id']; ?>">
                         <strong class="strong_comment_redacteur"><em> &nbsp;<i class="icon-pencil"></i><?php echo h($article['User']['user_name']); ?></em></strong>
                        </a>
                      </p>
                      <p> <?php echo $this->Text->truncate($article['Article']['article_summary'],175,array('exact'=>false,'html'=>true)); ?> </p>
                  </div>
                </div>
              </div>
            </div>
        </div> 
        <div class="panel-footer text-right">
          <a class="" href="<?php echo $this->Html->url($article['Article']['link']); ?>">Voir la news &rarr;</a>
        </div>
      </div>
<?php
  }
}
?>

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
<!-- /CONTENT SIDE-->

  <div class="col-xs-12 col-sm-6 col-sm-6 col-lg-3">

<!-- VIDEO  -->
<div class="list-group panel panel-primary">
      <div class="panel-heading text-center hidden-xs">
        <h4>VIDEOS</h4>
      </div>
   <div class="panel-body">
        <div class="tab-pane fade in active" id="home">
          <div class="row">

          <?php foreach ($videos AS $video): ?>
          <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="thumbnail" style="">
              <a class="" href="http://www.thunderbot.gg/videos/<?php echo $video['Video']['id']; ?>-<?php echo $video['Video']['slug']; ?>">
      <img class="img-responsive" alt="<?php echo $video['Video']['video_title']; ?>" src="http://www.thunderbot.gg/thumb.php?src=/files/video/photo/<?php echo $video['Video']['photo_dir']; ?>/<?php echo $video['Video']['photo']; ?>&w=150&h=100&zc=1"></img></a>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <a class="" href="http://www.thunderbot.gg/videos/<?php echo $video['Video']['id']; ?>-<?php echo $video['Video']['slug']; ?>"><h5><?php echo $video['Video']['video_title']; ?></h5></a>
              <span class="comment_total3"><span class="glyphicon glyphicon-comment"></span> <?php echo h($video['Video']['comment_count']); ?>  </span>
                &nbsp;
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        </div>
  </div>
</div>
<div class="list-group panel panel-primary"></div>
</div>
  
<div class="col-xs-12 col-sm-6 col-sm-6 col-lg-3">
  <div class="list-group panel panel-primary">
    <div class="panel-heading text-center hidden-xs">
      <h4>GALERIE</h4>
    </div>

    <div class="panel-body">
      <?php foreach ($images AS $image): ?>
        <a class="" href="http://www.thunderbot.gg/galerie/<?php echo $image['Image']['id']; ?>-<?php echo $image['Image']['slug']; ?>">
          <h4> <span class="comment_total3"><span class="glyphicon glyphicon-comment"></span> <?php echo h($image['Image']['comment_count']); ?></span>
          &nbsp;<?php echo $image['Image']['title']; ?></h4>
        </a>
        <a class="" href="http://www.thunderbot.gg/galerie/<?php echo $image['Image']['id']; ?>-<?php echo $image['Image']['slug']; ?>">
         <img class="img-responsive" src="http://www.thunderbot.gg/thumb.php?src=<?php echo $this->Html->url($image['Image']['image']); ?>&w=400&zc=1" alt="<?php echo $image['Image']['title']; ?>"></a>
        <hr>  
      <?php endforeach; ?>
    </div>

  </div>
</div>     
    </div>
</div>
</div>


