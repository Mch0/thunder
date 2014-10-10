

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


<div class="row-fluid">
<div class="span12">
<h1 class="thunder_article_view"><?php echo $title; ?></h1>


</div>
</div>


<div class="row-fluid">
<div class="span8">
          
<div class="article">
            <?php echo $this->html->image('/files/article/photo/'.($article['Article']['photo_dir'].'/'.$article['Article']['photo']), array('class' => 'thumb_blog')); ?>
    <div class="articlecontent">
        <p class="content_view">
            <?php echo $article['Article']['article_summary']; ?>
        </p>
    </div>
    <div class="meta">
        <span class="article_index_redac">
            <i class="icon-calendar icon-white"></i>
            <?php echo $this->frenchDate->french($article['Article']['created']); ?>
        </span>
        <span class="article_index_redac">
            <i class="icon-tag icon-white"></i>
           <?php echo h($article['User']['user_name']); ?> <?php echo h($article['Article']['redacteur']); ?>
        </span>
    </div>

    <hr class="reset_float"></hr>
</div>

<div class="article_view">
   <p class="content_view">
    <?php echo $article['Article']['article_content']; ?>
  </p>
</div>


<div class="content_view_comment">
<h2 class="thunder_article_view">Commentaires <span class="comment_total"> <i class="icon-comment icon-white"></i> <?php echo h($article['Article']['comment_count']); ?> </span> </h2> 

 <?php foreach ($comments as $k => $comment): //COMMENT  ?>

<div class="comment">
    <div class="row-fluid">

    <div class="span4">
      <div class="meta_comment">
          <?php
          if ($comment['User']['avatar']) {
              echo $this->Html->image('/files/users/thumbnails/'.($comment['User']['id'].'_scale_150.jpg'), array('id' => 'comment_img'));
          } else {
              echo $this->Html->image("/css/images/robotthunderbot.jpg", array("id" => "comment_img",));
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
    </div>

    <div class="span8">
      <strong class="strong_comment"><i class="icon-comment icon"> </i><?= h($comment['User']['user_name']); ?></strong>
      <em><i class="icon-calendar icon"></i> <?= $this->Time->timeAgoInWords($comment['Comment']['created']); ?></em>
      <?php echo $this->Vothumb->vote('comment', $comment['Comment']['id']) ; ?>
       <p><?= nl2br(h($comment['Comment']['content'])); ?></p>
    </div>
    </div>
</div>


<?php endforeach ?>

</div>


<?php if ($this->Session->read('Auth.User.id')): ?>
<?= $this->Comment->form('Article', $article['Article']['id']); ?>
<?php endif ?>



 </div>
                    
                 
<div class="galerie_sidebar">
 <span class="float">  </span>
</div>   

  <div class="span4">
    <div id="sidebar">
    <?php echo $this->element('social'); //video ?>
      <?php echo $this->element('sidebar'); //video ?>
      <?php echo $this->element('sidebar_img'); //sidebar ?>
    </div>
  </div>

 </div>
 <hr class="reset_float"></hr>