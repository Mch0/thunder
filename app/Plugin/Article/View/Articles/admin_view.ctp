
    <!-- POLLS-->
<script>var baseURL = "http://www.thunderbot.gg/";</script> 
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.0.5/angular.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui/0.4.0/angular-ui.min.js"></script>
<script type="text/javascript" src="http://www.thunderbot.gg/js/polls/poll/app.js"></script>
<script type="text/javascript" src="http://www.thunderbot.gg/js/polls/poll/controller.js"></script> 
    <!--  -->

<?php $this->set('title_for_layout', $article['Article']['article_title']) ?>
<?php 
$this->html->meta ('description', $article['Article']['article_summary'] , array('inline' =>false));
?>


<?php
  $title = h($article['Article']['article_title']);
  if(substr($title, 0, 2) == '§')
    $title = substr($title, 2);
?>

 <!-- ARTICLE -->
<div class="container">
  <div class="row">


<div class="col-xs-12 col-sm-9 col-sm9 col-lg-9">
     
      <div class="list-group panel panel-primary">
          
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <?php echo $this->html->image('http://www.thunderbot.gg/files/article/photo/'.($article['Article']['photo_dir'].'/'.$article['Article']['photo']), array('class' => 'img-responsive')); ?>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
    <h1 class=""><?php echo $title; ?></h1>
                         <strong class="strong_comment_redacteur"><em><?php echo h($article['Category']['category_name']); ?></em></strong>
                      <p class=" clearfix">
                      <small><?php echo $this->frenchDate->french($article['Article']['created']); ?> | </small>
                       <strong class="strong_comment_redacteur"><em> &nbsp;<i class="icon-pencil"></i><?php echo h($article['User']['user_name']); ?> <?php echo h($article['Article']['redacteur']); ?></em></strong>
                      </p>



        <?php foreach ($tags as $tag): ?>
        <span class="label label-primary"><?php echo $tag['Tag']['name'] ?></span>
        <?php endforeach; ?>






                      <p><?php echo $article['Article']['article_summary']; ?></p>

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
                      <?php echo $article['Article']['article_content']; ?>
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
              echo $this->Html->image('http://www.thunderbot.gg//files/users/thumbnails/'.($comment['User']['id'].'_scale_150.jpg'), array('class' => 'img-responsive'));
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
                         <strong class="strong_comment_redacteur"><em><?= h($comment['User']['user_name']); ?></em></strong>
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
                        <?= $this->Comment->form('Article', $article['Article']['id'], array("id" => "form_thunder",)); ?>
                        <?php endif ?>
                  </div>
                </div>
              </div>
            </div>
        </div> 
      </div>

</div>



 <!-- SIDEBAR -->
  <div class="col-xs-12 col-sm-3 col-sm-3 col-lg-3">

        <div class="list-group panel panel-primary">
          <div class="panel-heading text-center hidden-xs">
            <h4>ARTICLES</h4>
          </div>

<?php foreach ($threearticles as $threearticle): ?>

          <div class="panel-body">
            <div class="thumbnail">
      <a class="" href="<?php echo $this->Html->url($threearticle['Article']['link']); ?>">
  <img id="img_full" class="img-responsive" alt="" src="http://www.thunderbot.gg/thumb.php?src=/files/article/photo/<?php echo $threearticle['Article']['photo_dir'] ?>/<?php echo $threearticle['Article']['photo'] ?>&w=270&h=166&zc=1"></img>
      </a>
              <div class="caption">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <strong class="strong_comment_redacteur"><em><?php echo h($thumbarticle['Category']['category_name']); ?></em></strong>
                    <p><small>10 sep. 2013</small> | Category: <a href="" title="">News</a></p>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a class="" href="<?php echo $this->Html->url($threearticle['Article']['link']); ?>"><h4><?php echo h($threearticle['Article']['article_title']); ?></h4></a>
                  </div>
                </div>
              </div>
            </div>
        </div>  

<?php endforeach; ?>



        </div>



  </div>



    </div>
</div>









         
