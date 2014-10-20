<div class="container">
    <div class="row">
        <div class="col-lg-12">
<h1 class="thunder_orange">League of legends</h1>
    </div>
    </div>


    <div class="row">
        <div class="col-lg-10 col-lg-offset-1" id="portfolio">
            <?php foreach ($equipes as $equipe): ?>
            <div class="bloc dev masonry-brick" id="<?php echo h($equipe['Equipe']['role']); ?>">
               <h2 class="thumb-title"> <?php echo h($equipe['Equipe']['role']); ?></h2>
                <a class="thumb" href="">

                    <?php echo $this->Html->image('/files/equipe/photo/'.($equipe['Equipe']['photo_dir'].'/'.$equipe['Equipe']['photo']),array('height' => '300px')); ?>
                </a>
                <div class="info">
                    <div class="thumb-info">
                        <?php echo $this->Html->image('/files/equipe/photo/'.($equipe['Equipe']['photo_dir'].'/'.$equipe['Equipe']['photo']),array('height' => '300px')); ?>
                    </div>
                    <div class="content-info">
                        <h2><?php echo h($equipe['Equipe']['name']); ?></h2>
                        <p><?php echo h($equipe['Equipe']['content']); ?></p>
                        <ul>
                            <li>
                                <a target="_blank" href="<?php echo h($equipe['Equipe']['facebook']); ?>">
                                    <?php echo $this->html->image('/img/social/icon_facebook.png',array('height'=>'64px','width'=>'64px','class'=>'social')); ?>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="<?php echo h($equipe['Equipe']['twitter']); ?>">
                                    <?php echo $this->html->image('/img/social/icon_twitter.png', array('height' => '64px' , 'width' => '64px' , 'class' => 'social')); ?>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="<?php echo h($equipe['Equipe']['youtube']); ?>">
                                    <?php echo $this->html->image('/img/social/icon_youtube.png', array('height' => '64px' , 'width' => '64px' , 'class' => 'social')); ?>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>

            <?php endforeach ?>
        </div>
    </div>
    <?php  echo $this->Html->script('/design/js/jquery-1.6.2'); ?>
    <?php  echo $this->Html->script('/design/js/masonry/masonry'); ?>
    <?php  echo $this->Html->script('/design/js/masonry/main'); ?>
</div>
</div>

<!--<?php foreach ($equipes as $equipe): ?>


<div clas="col-lg-3">
      <div class="list-group panel panel-primary">

          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row">

			<div class="col-xs-3 col-sm-3 col-sm-3 col-lg-3">
				<?php echo $this->Html->image('/files/equipe/photo/'.($equipe['Equipe']['photo_dir'].'/'.$equipe['Equipe']['photo'])); ?>
			</div>


			<div class="col-xs-3 col-sm-3 col-sm-3 col-lg-3">
				<h2 class="player"><a target="_blank" href="<?php echo h($equipe['Equipe']['facebook']); ?>">
				<?php echo $this->html->image('/design/css/img/facebook.png'); ?></a> <?php echo h($equipe['Equipe']['name']); ?>
				 <span class="player_role">
				 <?php echo h($equipe['Equipe']['role']); ?>
				 </span></h2>
				<p><?php echo h($equipe['Equipe']['content']); ?></p>
			</div>


                </div>
              </div>
            </div>
        </div>
      </div>

</div>
<?php endforeach; ?>-->

