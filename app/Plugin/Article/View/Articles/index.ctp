<!-- Article/view/articles/index.ctp -->
<?php $this->html->meta ('description', 'ThunderBot c\'est l\'actualité, la web TV, les guides et l\'expertise des progamers sur League of Legends.', array('inline' =>false)); ?>
<div class="container">
<?php  echo $this->Html->css('/design/css/bxslider/jquery.bxslider'); ?>
<?php  echo $this->Html->script('/design/js/bxslider/jquery.bxslider.min'); ?>

<!-- SLIDER -->
<div class="row hidden-xs " id="caroussel">
    <div class="slider text-center" id="thunderbot">
        <div id="outer-slider">
            <div class="left_fader">&nbsp;</div>
            <div class="right_fader">&nbsp;</div>
            <div class="bx-wrapper">
                <div class="bx-viewport">
                    <div class="slider1">
                        <?php foreach ($threearticle as  $index => $thumbarticle ): ?>
                        <div class="slide">
                                <a href="<?php echo $this->Html->url($thumbarticle['Article']['link']); ?>">
                                    <?php $srcImg = "/files/article/photo/" . $thumbarticle['Article']['photo_dir'] . "/" . $thumbarticle['Article']['photo'] ;?>
                                    <?php $alt = $thumbarticle['Article']['article_title']; ?>
                                    <img src="<?php echo $srcImg ?>" alt="<?php echo $alt ?>" class="desktop_img"/>
                                    <span class="zone-txt">
                                        <h2 class="title"><?php echo $thumbarticle['Article']['article_title'] ?></h2>

                                        <span class="sous-titre">
                                            <?php echo $this->Text->truncate($thumbarticle['Article']['article_summary'],175,array('exact'=>false,'html'=>true));?>
                                        </span>
                                    </span>
                                </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var slider = $('.slider1').show().bxSlider({
            auto: true,
            pause: 5000,
            speed: 1500,
            pager: false,
            slideWidth: 1170,
            minSlides: 1,
            maxSlides: 1,
            slideMargin: 0
            /*preloadImages: 'all'*/
        });

        $('.right_fader').click(function() {
            slider.goToNextSlide();
            slider.stopAuto();
            return false;
        });

        $('.left_fader').click(function() {
            slider.goToPrevSlide();
            slider.stopAuto();
            return false;
        });
    });
</script>
<!-- /SLIDER -->
    <?php if($error != false)
    { ?>
<div class="alert error-message">
        <span class="alert alert-danger"> <?php echo $error ?> </span>
</div>
    <?php   $error = ""; unset($error);}
    ?>

<!-- WEBTV -->

<?php if(count($webtv) > 0) { ?>
<div class="hidden-xs">
    <div class="row">
	    <div class="col-lg-12">

		    <div >
			    <h4 class="line-title-high-tech"><span>WEB TV</span></h4>
		    </div>
	    </div>
    <div class="col-xs-12 col-sm-12 col-lg-12" id="controlPlayer">
        <span id="closePlayer" style="color:white"><button class="btn btn-thunder2"><span
                class="glyphicon glyphicon-remove"></span> Fermer
        </button></span>
        <span id="openPlayer" style="color:white;display:none"><button class="btn btn-thunder2"><span
                class="glyphicon glyphicon-chevron-down"></span> Ouvrir
        </button></span>
    </div>

    <div class="row" id="player">
        <div class="col-xs-8 col-sm-8 col-lg-8">
            <div class="">
                <div id="webtv" class="panel-body">
                    <?php echo $webtv[0]['Webtv'][iframe_video_thumb] ?>
                </div>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-lg-4">
            <div class="">
                <div id="webchat" class="panel-body">
                    <?php echo $webtv[0]['Webtv'][iframe_chat] ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<?php } ?>
<!-- /WEBTV -->

<!-- CONTENT SIDE-->
<div class="row">
<div class="col-lg-12">

    <div >
        <!--<h4 class="line-title-high-tech"><span>ACTUALITES</span></h4>-->
	    <h4><span class="col-lg-5 col-md-5 col-sm-5 col-xs-4 line-title-high-tech">&nbsp;</span>
		    <span class="col-lg-2 col-md-2 col-sm-2 col-xs-4 big-title">ARTICLES</span>
		    <span  class="col-lg-5 col-md-5 col-sm-5 col-xs-4 line-title-high-tech">&nbsp;</span>
	    </h4>
    </div>
</div>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
<?php  //debug($articles) ?>

<?php
foreach ($articles as $key => $article) {
  $title = h($article['Article']['article_title']);
  if (substr($title, 0, 2) == '§') {
?>

<div class="">
    <div class="panel-body">
        <div class="thunderbox">
            <div class="caption">
                <div class="row">
                    <div class="col-xs-md6 col-sm-md6 col-md6 col-lg-6" >
                        <a class="" href="<?php echo $this->Html->url($article['Article']['link']); ?>"><img
                                class="img-responsive"
                                alt="<?php echo substr($this->Text->truncate($title , 35,array('exact'=>false,'html'=>true)), 2); ?>"
                                src="http://www.thunderbot.gg/thumb.php?src=/files/article/photo/<?php echo $article['Article']['photo_dir'] ?>/<?php echo $article['Article']['photo'] ?>&w=270&h=166&zc=1"></img></a>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <a class="" href="<?php echo $this->Html->url($article['Article']['link']); ?>">
                            <strong class="strong_comment_redacteur"><em><?php echo h($article['Category']['category_name']); ?></em></strong>

                            <h2 class="title5"><span class="comment_total2"><span
                                    class="glyphicon glyphicon-comment"></span> <?php echo h($article['Article']['comment_count']); ?>  </span>
                                &nbsp;  <?php echo substr($this->Text->truncate($title ,
                                35,array('exact'=>false,'html'=>true)), 2); ?> </h2></a>

                        <p class=" clearfix">
                            <small><?php echo $this->frenchDate->french($article['Article']['created']); ?> |
                            </small>
                            <a class=""
                               href="/membre/<?php echo $article['User']['id']; ?>">
                                <strong class="strong_comment_redacteur"><em> &nbsp;<i
                                        class="icon-pencil"></i><?php echo h($article['User']['user_name']); ?>
                                </em></strong>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } else { ?>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 article">
    <article>
        <div class="picture">
            <a href="<?= $this->Html->url($article['Article']['link']); ?>">
                <img alt="<?= $title; ?>"
                     src="/files/article/photo/<?= $article['Article']['photo_dir'] ?>/<?= $article['Article']['photo'] ?>" />
            </a>
        </div>
        <div class="entete">
            <div class="date">
                <small>
                    <?= $this->frenchDate->french($article['Article']['created']); ?> |
                </small>
                <a href="/membre/<?php echo $article['User']['id']; ?>" target="_blank">
                    <strong class="strong_comment_redacteur">
                        <em> &nbsp;
                            <i class="icon-pencil"></i><?= h($article['User']['user_name']); ?>
                    </em>
                    </strong>
                </a>
            </div>
            <div class="partage">
                <!--https://www.facebook.com/sharer/sharer.php?u=-->
                <span class="glyphicon glyphicon-comment"></span><span class="comment-count"> <?= $article['Article']['comment_count'] ?></span>
                <a class="link-facebook-small popup" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $this->Html->url($article['Article']['link'],true) ?>">
                    <?= $this->Html->image('social/mini-facebook.jpg', array('alt' => 'share')) ?>
                </a>
                <!--http://twitter.com/share?text=-->
                <a class="link-tweeter-small popup" target="_blank" href="http://twitter.com/share?text=<?= $title; ?>&url=<?= $this->Html->url($article['Article']['link'],true) ?>">
                    <?= $this->Html->image('social/mini-twitter.jpg', array('alt' => 'share')) ?>
                </a>
            </div>
        </div>
        <div class="resume">
            <header>
                <h3>
                    <a href="<?= $this->Html->url($article['Article']['link']); ?>">
                        <?= $title; ?>
                    </a>
                </h3>
            </header>
            <div>

                    <a href="<?= $this->Html->url($article['Article']['link']); ?>">
                        <?= $this->Text->truncate($article['Article']['article_summary'],175,array('exact'=>false,'html'=>true));?>
                    </a>

            </div>
        </div>
    </article>
</div>
        <?php if($key%2 == 1) {?>
            <hr class="hr-grey-3">
        <?php } ?>
<?php
  }
}
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6-offset-3 col-lg-6 col-lg-offset-3">
<div class="pagination pagination-large">
    <ul class="pagination">
        <?php
                echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' =>
        'disabled','disabledTag' => 'a'));
        echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag'
        => 'li','first' => 1));
        echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag'
        => 'li','class' => 'disabled','disabledTag' => 'a'));
        ?>
    </ul>
</div>
        </div>
</div>
</div>
<!-- /CONTENT SIDE-->

<!-- RIGHT SIDE BAR -->
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div id="ee">

		        <div >
			        <h5><span class="col-lg-3 col-sm-5 col-md-3 col-xs-5 line-title-high-tech">&nbsp;</span>
				        <span class="col-lg-6 col-sm-2 col-md-6 col-xs-2 big-title">RIOT NEWS</span>
				        <span  class="col-lg-3 col-sm-5 col-md-3 col-xs-5 line-title-high-tech">&nbsp;</span>
			        </h5>
<!--			        <h5 class="line-title-high-tech"><span>RIOT NEWS</span></h5>-->
		        </div>
            <br/>

                <?php foreach($riotLinks as $link) { ?>
            <div class="row">
                    <div class="col-sm-1 col-xs-1 col-md-1 col-lg-1">
                       <?php echo $this->Html->Image('logo_news_riot.png') ?>
                    </div>
                    <div class="col-sm-10 col-xs-10 col-md-10 col-lg-10">
                       <?= $link ?>
                    </div>
            </div>
            <hr/>
                <?php } ?>
        </div>
        <div id="twit">
	        <div>
		        <h5>
			        <span class="col-lg-3 col-md-3 col-sm-5 col-xs-5 line-title-high-tech">&nbsp;</span>
			        <span class="col-lg-6 col-md-6 col-sm-2 col-xs-2 big-title">DERNIERS TWEETS</span>
			        <span class="col-lg-3 col-md-3 col-sm-5 col-xs-5 line-title-high-tech">&nbsp;</span>
		        </h5>
	        </div>
            <br/>
            <a class="twitter-timeline"  href="https://twitter.com/MyThunderBot"  data-widget-id="363309093869477888">Tweets de @MyThunderBot</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
    </div>

<!-- /RIGHT SIDE BAR -->
</div>
</div>
</div>


