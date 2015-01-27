
    <!-- POLLS-->
<!--<script>var baseURL = "http://www.thunderbot.gg/";</script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.0.5/angular.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui/0.4.0/angular-ui.min.js"></script>
<script type="text/javascript" src="http://www.thunderbot.gg/js/polls/poll/app.js"></script>
<script type="text/javascript" src="http://www.thunderbot.gg/js/polls/poll/controller.js"></script> -->
    <!--  -->
    <script type="text/javascript">
	    sas_tmstp=Math.round(Math.random()*10000000000);
	    sas_pageid='68386/520878';		// Page : Thunderbot/rg
	    var sas_formatids = '10192,1391,920,922,14930,14609';
	    sas_target='';			// Targeting
	    document.write('<scr'+'ipt  src="http://www.smartadserver.com/call2/pubjall/' + sas_pageid + '/' + sas_formatids + '/' + sas_tmstp + '/' + escape(sas_target) + '?"></scr'+'ipt>');
    </script>
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
	            <!-- PUB -->
				<?php echo $this->element('pubLargeRg'); ?>

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
	                    <!-- 788 * 390 -->
	                    <?php $srcImg = "http://".$_SERVER['SERVER_NAME']."/thumb.php?src=/files/article/photo/".$article['Article']['photo_dir']."/".$article['Article']['photo']."&w=400&h=200" ?>
                        <!--<?php echo $this->html->image('/files/article/photo/'.($article['Article']['photo_dir'].'/'.$article['Article']['photo']), array('class' => 'img-responsive', 'alt' => $title)); ?>-->
                        <img src="<?php echo $srcImg ?>" class="img-responsive" alt="$title" />
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
			<?php echo $this->element('shareArticle'); ?>
            </div>


            <!-- COMMMENT -->
        <div class="row">
            <!-- FORM COMMENT -->

			<?php echo $this->element('commentsArticle'); ?>
	        <!-- form comment -->
	        <div class="row">
			<?php echo $this->element('commentsForm'); ?>
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
			<?php echo $this->element('threeArticles'); ?>
	        <?php echo $this->element('pubPaveRg'); ?>
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







         
