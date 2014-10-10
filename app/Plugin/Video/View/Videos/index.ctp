


<?php $this->html->meta ('description', 'ThunderBot Videos', array('inline' =>false)); ?>



 <!-- ARTICLE -->
<div class="container">

  <div class="row">


<div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
     
      <div class="list-group panel panel-primary">
          <h1></h1>
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">



                <div class="row"> 
                  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <h1>Videos</h1>
                  </div>
                  </div>
                <div class="row"> 
                    <?php foreach ($videos as $video): ?>

                      <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                          <a class="" href="<?php echo $this->Html->url($video['Video']['link']); ?>">
                      <img id="img_full" class="img-responsive" alt="<?php echo $this->Text->truncate($video['Video']['video_title'],50,array('exact'=>false,'html'=>true)); ?>" src="http://www.thunderbot.gg/thumb.php?src=/files/video/photo/<?php echo $video['Video']['photo_dir'] ?>/<?php echo $video['Video']['photo'] ?>&w=270&h=166&zc=1"></img>
                          </a>
                      <div>
                          <a class="" href="http://localhost/thunder/article/articles/view/1416/l-atlantic-lan-debarque-a-royan">
                          <strong class="strong_comment_redacteur"><em><?php echo h($video['Category']['category_name']); ?></em></strong>
                              <h2 class="title5"><?php echo $this->Text->truncate($video['Video']['video_title'],25,array('exact'=>false,'html'=>true)); ?></h2>
                          </a>
                      </div>
                      </div>
                    <?php endforeach; ?>




                </div>
              </div>
            </div>
        </div> 
      </div>



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


    </div>
</div>







