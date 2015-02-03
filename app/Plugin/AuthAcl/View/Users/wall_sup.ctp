


<?php 
$this->html->meta ('description', 'ThunderBot WebTV - Admirez le skill ! ThunderBot TV c\'est les meilleurs joueurs League of Legends en live et accessibles depuis le chat', array('inline' =>false));
?>

<?php $this->set('title_for_layout', $image['Image']['title']) ?>

 <!-- ARTICLE -->
<div id="mur">
    <div class="row" id="wall">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <div class="page-header">
                   <h1>Le mur des supporters</h1>
                </div>
                <?php echo $this->Html->image('/css/images/mur_supporter.png',array('class' => 'img-responsive')) ?>
            </div>

        <div class="col-xs-12 col-sm-3 col-sm-3 col-lg-3">

	        <div >
		        <h5><span class="col-lg-4 line-title-high-tech">&nbsp;</span><span class="col-lg-4 big-title">ARTICLES</span><span  class="col-lg-4 line-title-high-tech">&nbsp;</span></h5>
	        </div>
            <br/>

            <?php foreach ($threearticles as $threearticle): ?>
	        <?php $link = "article/".$threearticle['Article']['id']."-".$threearticle['Article']['slug'] ;?>
            <article>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <a href='<?php echo $this->Html->url("/$link",true); ?>'>
                            <img id="" class="img-responsive" alt="<?php echo $threearticle['Article']['article_title']; ?>" src="http://www.thunderbot.gg/thumb.php?src=/files/article/photo/<?php echo $threearticle['Article']['photo_dir'] ?>/<?php echo $threearticle['Article']['photo'] ?>&w=270&h=166&zc=1"></img>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <strong class="strong_comment_redacteur"><em><?php echo h($thumbarticle['Category']['category_name']); ?></em></strong>
                        <small><?php echo $this->frenchDate->french($threearticle['Article']['created']); ?> | </small>
                        <strong class="strong_comment_redacteur"><em> &nbsp;<i class="icon-pencil"></i>
                            <a class="" href="/membre/<?php echo $threearticle['User']['id']; ?>" target="_blank">
                                <strong class="strong_comment_redacteur"> <?php echo h($threearticle['User']['user_name']); ?></strong>
                            </a>
                            <?php echo h($threearticle['Article']['redacteur']); ?></em></strong>
                        <a href='<?php echo $this->Html->url("/$link",true); ?>'><h4><?php echo h($threearticle['Article']['article_title']); ?></h4></a>
                    </div>
                </div>
            </article>
            <hr/>
            <?php endforeach; ?>

        </div>
      </div>
    </div>
</div>














         
