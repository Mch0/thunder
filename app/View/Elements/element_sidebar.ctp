







<?php $bannieres = $this->requestAction(array('controller' => 'bannieres', 'action' => 'element_sidebar','plugin' => 'article','admin'=>false)); ?>



    <?php foreach($bannieres as $k=>$v): $v = current($v); ?>
            <a href="<?php echo $v['link']; ?>">
                <img src="<?php echo $this->html->url('/files/banniere/photo/'.($v['photo_dir'].'/'.$v['photo'])); ?>" />

            </a>
    <?php endforeach; ?>
