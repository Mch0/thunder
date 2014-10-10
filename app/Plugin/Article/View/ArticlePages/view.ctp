
<?php $this->set('title_for_layout', $articlePage['ArticlePage']['article_title']) ?>
<?php 
$this->html->meta ('description', $articlePage['ArticlePage']['article_summary'] , array('inline' =>false));
?>




<div class="row-fluid">
<div class="span12">
<h1 class="thunder_article_view"><?php echo h($articlePage['ArticlePage']['article_title_page']); ?></h1>

</div>
</div>




<div class="row-fluid">
<div class="span8">



          
<div class="article">
    <a class="title_thunder" href="/article/666-lcs-na-spring-2014-promotion-qualifier">
    </a>
          <a class="title_thunder" href="/article/666-lcs-na-spring-2014-promotion-qualifier">
            <?php echo $this->html->image('/files/article/photo/'.($articlePage['ArticlePage']['photo_dir'].'/'.$articlePage['ArticlePage']['photo']), array('class' => 'thumb_blog')); ?>
        </a>
    <div class="articlecontent">
        <p class="content_view">
            <?php echo h($articlePage['ArticlePage']['article_summary']); ?>
        </p>
    </div>
    <div class="meta">
        <span class="article_index_redac">
            <i class="icon-calendar icon-white"></i>
            <?php echo $this->frenchDate->french($articlePage['ArticlePage']['created']); ?>
        </span>
        <span class="article_index_redac">
            <i class="icon-tag icon-white"></i>
           <?php echo h($articlePage['User']['user_name']); ?> <?php echo h($articlePage['ArticlePage']['redacteur']); ?>
        </span>



    </div>
    <hr class="reset_float"></hr>
</div>




<div class="article_view">
   <p class="content_view">


    <?php echo $articlePage['ArticlePage']['article_content']; ?>
  </p>
</div>






          
                    </div>
                    
                 
<div class="galerie_sidebar">
 <span class="float">  </span>
</div>    
<div class="span4">
  <div id="sidebar">


  <?php echo $this->element('aside'); //sidebar ?>

  <?php echo $this->element('sidebar_img'); //sidebar ?>
  </div>
</div>

 </div>
 <hr class="reset_float"></hr>