
<?php 
$this->html->meta ('description', 'ThunderBot c\'est l\'actualité, la web TV, les guides et l\'expertise des progamers sur League of Legends.', array('inline' =>false));
?>
  <div class="row-fluid">
          <div class="row-fluid">
              <div class="span8">



<div class="row-fluid">
  <div class="span12">
<h2 class="thunder">Actus Récentes</h2>



<div id="recherche">
  <?php echo $this->Form->create('Article', array('action' => 'recherche','class'=>' form-signin form-horizontal')); ?>
  <div class="row-fluid show-grid">
    <div class="span12">
      <div class="input-append">
        <?php echo $this->Form->input('filter',array('div' => false,'label'=>false,'placeholder'=>"Chercher un article",'class'=>'input-xlarge')); ?>
        <button class="btn" type="submit">
          <?php echo __('Chercher'); ?>
        </button>
      </div>
    </div>
  </div>
  <?php echo $this->Form->end(); ?>
</div>



<?php
foreach ($articles as $article) {
  $title = h($article['Article']['article_title']);
  if(substr($title, 0, 2) == '§') {
?>        
<div class="brev">
    <a class="title_thunder" href="<?php echo $this->Html->url($article['Article']['link']); ?>">
        <h2>
           <?php echo substr($title, 2); ?>
        </h2>
    </a>

    <a class="title_thunder" href="<?php echo $this->Html->url($article['Article']['link']); ?>">

<img class="thumb_blog" src="http://www.thunderbot.gg/thumb.php?src=<?php echo $this->Html->url('/files/article/photo/'.($article['Article']['photo_dir'].'/'.$article['Article']['photo'])); ?>&w=150&h=93&zc=1" alt=""></img>
        </a>

    <div class="meta">

        <span class="comment_total">
            <i class="icon-comment icon-white"></i>
           <?php echo h($article['Article']['comment_count']); ?>
        </span>

          <strong class="strong_comment_redacteur"> <em>&nbsp;<i class="icon-pencil"></i><?php echo h($article['User']['user_name']); ?> <?php echo h($article['Article']['redacteur']); ?></em></strong>
    </div>
</div>
<?php } else { ?>
<div class="article">
    <a class="title_thunder" href="<?php echo $this->Html->url($article['Article']['link']); ?>">
        <h2>
        <?php echo h($article['Article']['live'])=='0'?' ':'<span class="green_validate">live</span>'; ?>
                 <?php echo h($article['Article']['article_title']); ?> 
        </h2>
    </a>
    <a class="title_thunder" href="<?php echo $this->Html->url($article['Article']['link']); ?>">
<img class="thumb_blog" src="http://www.thunderbot.gg/thumb.php?src=<?php echo $this->Html->url('/files/article/photo/'.($article['Article']['photo_dir'].'/'.$article['Article']['photo'])); ?>&w=300&h=185&zc=1" alt=""></img>
        </a>
    <div class="meta">

    <span class="comment_total">
      <i class="icon-comment icon-white"></i>
      <?php echo h($article['Article']['comment_count']); ?>
    </span>
          <strong class="strong_comment_redacteur"><em> &nbsp;<i class="icon-pencil"></i><?php echo h($article['User']['user_name']); ?> <?php echo h($article['Article']['redacteur']); ?></em></strong>
    </div>
    <div class="articlecontent">
      <p class="content">
        <?php echo $this->Text->truncate($article['Article']['article_summary'],365,array('exact'=>false,'html'=>true)); ?>
      </p>
    </div>

</div>

<?php
  }
}
?>

    <div class="cb"></div>
      <div class="paging">
        <?php echo $this->Paginator->prev('< ' . __('page précédente'), array(), null, array('class' => 'prev disabled'));  ?>
        <?php echo $this->Paginator->numbers(array('separator' => '')); ?>
        <?php echo $this->Paginator->next(__('page suivante') . ' >', array(), null, array('class' => 'next disabled'));  ?>
      </div>

                    </div>
                    
                  </div>
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
</div>
</div>
</div>
</div>
</div>
</div>
</div>
