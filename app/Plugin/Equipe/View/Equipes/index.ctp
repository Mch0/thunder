<div class="container" id="equipe">
    <div class="row">
        <div class="col-lg-10" id="portfolio">
            <?php foreach ($equipes as $equipe): ?>
            <div class="bloc  masonry-brick" id="<?php echo h($equipe['Equipe']['role']); ?>">
	            <div class="thumb-title">
		            <h2><?php echo h($equipe['Equipe']['role']);  ?></h2>
		            <span><?php echo h($equipe['Equipe']['name']); ?></span>
	            </div>



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
                        <ul id="content-social">
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

</div>
</div>
<?php  echo $this->Html->script('/design/js/jquery-1.6.2'); ?>
<?php  echo $this->Html->script('/design/js/masonry/masonry'); ?>
<?php  echo $this->Html->script('/design/js/masonry/main'); ?>



