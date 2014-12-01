
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


<div class="container" id="article">
    <div class="row">
        <!-- ARTICLE -->
        <div class="col-xs-12 col-sm-9 col-sm9 col-lg-9">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!-- HEADER ARTICLE -->
                    <div class="page-header">
                        <h1><?php echo $title; ?></h1>
                        <p class="clearfix">
                            <strong class="strong_comment_redacteur">
                                <em>
                                    <?php echo h($article['Category']['category_name']); ?>
                                </em>
                            </strong>
                            <small>
                                <?php echo $this->frenchDate->french($article['Article']['created']); ?> |
                            </small>
                            <strong class="strong_comment_redacteur">
                                <em> &nbsp;<i class="icon-pencil"></i>
                                    <a class="" href="/membre/<?php echo $article['User']['id']; ?>">
                                        <strong class="strong_comment_redacteur"> <?php echo h($article['User']['user_name']); ?></strong>
                                    </a>
                                    <?php echo h($article['Article']['redacteur']); ?>
                                </em>
                            </strong>
                        </p>
                    </div>
                    <p>
                        <?php echo $article['Article']['article_summary']; ?>
                    </p>
                    <?php foreach ($tags as $tag): ?>
                        <span class="label label-primary"><?php echo $tag['Tag']['name'] ?></span>
                    <?php endforeach; ?>
                </div>

                <!-- IMAGE ARTICLE -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="img-article">
                        <?php echo $this->html->image('/files/article/photo/'.($article['Article']['photo_dir'].'/'.$article['Article']['photo']), array('class' => 'img-responsive', 'alt' => $title)); ?>
                    </div>
                </div>
            </div>

            <!-- CONTENT ARTICLE -->
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <?php echo $article['Article']['article_content']; ?>
              </div>
            </div>

            <!-- SHARE ARTICLE -->
            <hr class="rouge"/>
            <div class="row" id="social-article">
                <!-- PREVIOUS ARTICLE -->
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <?php if(count($articlePrev) > 0)
                    {   ?>
                    <a class="nav-article" href="<?php echo $this->Html->url($articlePrev['Article']['link']); ?>">
                        <span class="prev-article pull-left">Article précédent</span>
                        <br/>
                        <span class="glyphicon glyphicon-chevron-left pull-left"></span> &nbsp;
                        <span class="pull-left"><?=  $this->Text->truncate($articlePrev['Article']['article_title'],45,array('exact'=>false,'html'=>true)); ?></span>

                    </a>
                    <?php   }   ?>

                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <ul class="center">
                        <li>
                            <a class="link-facebook-small popup" onclick="" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $this->Html->url($article['Article']['link'],true) ?>">
                                <?= $this->Html->image('social/icon_facebook.png',array('height' => '64', 'width' => '64')) ?>
                            </a>
                        </li>
                        <li>
                            <a class="link-tweeter-small popup" onclick="" target="_blank" href="http://twitter.com/share?text=<?= $title; ?>&url=<?= $this->Html->url($article['Article']['link'],true) ?>">
                                <?= $this->Html->image('social/icon_twitter.png', array('height' => '64', 'width' => '64')) ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- NEXT ARTICLE -->
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <?php if(count($articleNext) > 0)
                    {   ?>
                    <a class="nav-article" href="<?php echo $this->Html->url($articleNext['Article']['link']); ?>">
                        <span class="next-article pull-right">Article suivant</span>
                        <br/>
                        <span class="glyphicon glyphicon-chevron-right pull-right"></span> &nbsp;
                        <span class="pull-right"><?=  $this->Text->truncate($articleNext['Article']['article_title'],45,array('exact'=>false,'html'=>true)); ?></span>

                    </a>
                    <?php   }   ?>



                </div>
            </div>


            <!-- COMMMENT -->
        <div class="row">
            <!-- FORM COMMENT -->

            <div class="row" id="comment">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <?php foreach ($comments as $k => $comment): ?>
	                <?php //debug($comment); ?>
                    <div class="row">
                        <div class="article-comment">

                            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
	                            <div class="row">
	                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-7">
                                  <?php
                                  if ($comment['User']['avatar']) {
                                      echo $this->Html->image($comment['User']['avatar'], array('class' =>
                                        'img-responsive', "alt" => $comment['User']['user_name']));
                                  } else {
                                      echo $this->Html->image("/design/css/img/robotthunderbot.png", array("class" => "img-responsive", "alt" => 'thunderbot'));
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
	                            <div id="up" class="col-xs-1 col-sm-1 col-md-1 col-lg-1">

									<p class="comment-up" id="comment-nb-up-<?php echo $comment['Comment']['id'] ?>"><?= $comment['Comment']['up'] ?></p>

		                            <?php if ($this->Session->read('Auth.User.id')): ?>
		                            <button class="add1 btn btn-thunder2"  data-commentid="<?php echo $comment['Comment']['id'] ?>" class="btn btn-thunder2">+1</button>
		                            <?php endif ?>
	                            </div>
		                            </div>
                            </div>
                            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                                <div class="article-comment-content">
                                    <p>
                                        <a class="" href="/membre/<?php echo $comment['User']['id'] ?>">
                                            <strong class="strong_comment_redacteur">

                                                    <?= h($comment['User']['user_name']); ?>

                                            </strong>
                                        </a>
                                            <span class="article-comment-timeago"><?= $this->Time->timeAgoInWords($comment['Comment']['created']); ?></span>
                                        <br>
                                        <p>
                                            <?= nl2br(h($comment['Comment']['content'])); ?>
                                        </p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                        <?php endforeach ?>
                </div>
            </div>
	        <div class="row">
		        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			        <span class="nb-comment">Tous les commentaires (<?= count($comments) ?>)</span>
			        <?php if ($this->Session->read('Auth.User.id')): ?>
			        <div class="article-comment-form">

				        <br/>
				        <br/>

				        <?= $this->Comment->form('Article', $article['Article']['id'], array("id" => "form_thunder",)); ?>

			        </div>
			        <?php endif ?>
		        </div>
	        </div>
        </div>
    </div>

        <!-- SIDEBAR -->
        <div class="col-xs-12 col-sm-3 col-sm-3 col-lg-3">

	        <div >
		        <h5>

			        <span class="col-lg-4 col-md-3 col-sm-3 col-xs-4 line-title-high-tech">&nbsp;</span>
				        <span class="col-lg-4 col-md-6 col-sm-6 col-xs-4 big-title">ARTICLES</span>
				        <span  class="col-lg-4 col-md-3 col-sm-3 col-xs-4 line-title-high-tech">&nbsp;</span>

		        </h5>
	        </div>
            <br/>

<?php foreach ($threearticles as $threearticle): ?>
            <article>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a class="" href="<?php echo $this->Html->url($threearticle['Article']['link']); ?>">
                    <img id="" class="img-responsive" alt="<?php echo $threearticle['Article']['article_title']; ?>" src="http://www.thunderbot.gg/thumb.php?src=/files/article/photo/<?php echo $threearticle['Article']['photo_dir'] ?>/<?php echo $threearticle['Article']['photo'] ?>&w=270&h=166&zc=1"></img>
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

  </div>

    </div>

</div>
</div>


    </div>
</div>

<script>
	$('document').ready(function(){
		$('.add1').on('click',function(){
			var commentid = $(this).data('commentid');
			$.post("<?php echo $this->Html->url(array('plugin'=>'comment','controller'=>'comments','action'=>'addOne'),true) ?>", {comment : commentid})
					.done(function(response){
					if(response == 1)
					{
						var nb = parseInt($("#comment-nb-up-"+commentid)[0].innerHTML) + 1 ;
						$("#comment-nb-up-"+commentid)[0].innerHTML = "";
						$("#comment-nb-up-"+commentid)[0].innerHTML = nb ;
					}
			});
		});
	});
</script>







         
