
<?php $this->html->meta ('description', 'ThunderBot - Membre - '. $user['User']['user_name'], array('inline' =>false)); ?>
<?php $this->set('title_for_layout', $user['User']['user_name']) ?>



 <!-- Users/view.ctp -->
<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="page-header">
                <h1>
                    <i class="fa fa-user fa-2x"></i>
                    &nbsp;<?= $user['User']['user_name']; ?>
                </h1>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#presentation-user" role="tab" data-toggle="tab">
                Présentation
            </a>
        </li>
        <li role="presentation">
            <a href="#comment-user" role="tab" data-toggle="tab">
                Commentaires
            </a>
        </li>
        <?php if ($user['User']['role'] === 'redacteur' || $user['User']['role'] === 'staff' ){ ?>
        <li role="presentation">
            <a href="#article-user" role="tab" data-toggle="tab">
                Articles
            </a>
        </li>
        <li role="presentation">
            <a href="#image-user" role="tab" data-toggle="tab">
                Galeries
            </a>
        </li>
        <?php } ?>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="row tab-pane active" id="presentation-user">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row" id="presentation-user-title">
                        <div class="col-xs-8 col-sm-8 col-md-12 col-lg-8">
                            <div class="page-header">
                                <h2>Présentation : </h2>
                            </div>
                        </div>


                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" id="presentation-user-info">
                            <label>Prénom :</label><span> <?= $user['User']['name']; ?></span>
                            <br/>
                            <label>Nom :</label><span> <?= $user['User']['surname']; ?></span>
                            <br/>
                            <label>Pseudo :</label><span> <?= $user['User']['user_name']; ?></span>
                            <br/>
                            <label>Ville :</label><span> <?= $user['User']['city']; ?></span>
                            <br/>
                            <label>Anniversaire :</label><span> <?= $this->frenchDate->french($user['User']['birthday']); ?></span>
                            <br/>
                            <label>Membre depuis le :</label><span> <?= $this->frenchDate->french($user['User']['created']); ?></span>
                            <?php if($user['User']['role'] != "") { ?>
                            <br/>
                            <label>Rôle :</label><span> <?= $user['User']['role']; ?></span>
                            <?php } ?>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="presentation-user-avatar">
                            <?php

                             if ($user['User']['avatar']) {
                                    echo $this->Html->image('/files/users/thumbnails/'.($user['User']['id'].'_scale_150.jpg'), array('class' => 'thumbnail', 'width' => '100%'));
                            } else {
                            echo $this->Html->image("/design/css/img/robotthunderbot.png", array("class" => "img-responsive",));
                            }
                            ?>
                        </div>
                    </div>
            </div>
        </div>

        <?php if (count($comments) > 0)
        { ?>
        <div role="tabpanel" class="row tab-pane" id="comment-user">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row" id="comment-user-title">
                    <div class="col-xs-8 col-md-8 col-sm-8 col-lg-8">
                        <div class="page-header">
                            <h1>
                                <i class="fa fa-edit fa-2x"></i> Commentaires écrit par <?= $user['User']['user_name']; ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="row" id="comment-user-comments">
                    <?php foreach ($comments as $k => $comment): ?>
                    <div class="row">
                        <div class="article-comment">

                            <div class="col-xs-12 col-sm-2 col-md2 col-lg-2">
                                <?php
                                      if ($comment['User']['avatar']) {
                                          echo $this->Html->image('/files/users/thumbnails/'.($comment['User']['id'].'_scale_150.jpg'), array('class' =>
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
        </div>

        <?php } ?>


    <div role="tabpanel" class="row tab-pane" id="article-user">
        <?php foreach ($articles AS $key => $article): ?>
        <?php
  $title = h($article['Article']['article_title']);
  if(substr($title, 0, 2) == '§')
    $title = substr($title, 2);

?>
        <?php $link = "article/".$article['Article']['id']."-".$article['Article']['slug'] ;?>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 article">
            <article>
                <div class="picture">
                    <a href='<?= $this->Html->url("/$link",true); ?>' target="_blank">
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
                        <span class="glyphicon glyphicon-signal"></span>
                        <a class="link-facebook-small popup" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $this->Html->url($article['Article']['link'],true) ?>">
                            <?= $this->Html->image('social/mini-facebook.jpg', array('alt' => 'share')) ?>
                        </a>
                        <a class="link-tweeter-small popup" target="_blank" href="http://twitter.com/share?text=<?= $title; ?>&url=<?= $this->Html->url($article['Article']['link'],true) ?>">
                            <?= $this->Html->image('social/mini-twitter.jpg', array('alt' => 'share')) ?>
                        </a>
                    </div>
                </div>
                <div class="resume">
                    <header>
                        <h3>
                            <a href='<?= $this->Html->url("/$link",true);  ?>' target="_blank">
                                <?= $title; ?>
                            </a>
                        </h3>
                    </header>
                    <div>

                        <a href='<?= $this->Html->url("/$link",true);  ?>' target="_blank">
                            <?= $this->Text->truncate($article['Article']['article_summary'],175,array('exact'=>false,'html'=>true));?>
                        </a>

                    </div>
                </div>
            </article>
        </div>
        <?php if($key%2 == 1) {?>
        <hr class="hr-grey-3">
        <?php } ?>
        <?php endforeach; ?>
    </div>

    <div class="row tab-pane" id="image-user">
        <?php foreach ($images as $key => $image): ?>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 article">
            <?php $imageLink = $image["Image"]["image"]; ?>
            <?php $link = "/galerie/".$image['Image']['id'].'-'.$image['Image']['slug']; ?>
            <article>
                <div class="picture">
                    <a href="<?php echo $this->Html->url($link,true) ?>" target="_blank">
                        <img class="" src="<?php echo $this->Html->url($imageLink,true) ?>" alt=""/>
                    </a>
                </div>
                <div class="title-user-image">
                    <a class="" href="<?php echo $this->Html->url($link,true) ?>">
                        <h4>
                            <?php echo $image['Image']['title']; ?>
                            <span class="comment_total3">
                                <span class="glyphicon glyphicon-comment"></span> <?php echo h($image['Image']['comment_count']); ?>
                            </span>
                            &nbsp;
                        </h4>
                    </a>
                </div>
            </article>
        </div>
        <!--<a class="" href="http://www.thunderbot.gg/galerie/<?php echo $image['Image']['id']; ?>-<?php echo $image['Image']['slug']; ?>"><h4><?php echo $image['Image']['title']; ?>        <span class="comment_total3"><span class="glyphicon glyphicon-comment"></span> <?php echo h($image['Image']['comment_count']); ?>  </span>
            &nbsp;</h4></a>
        <a class="" href="http://www.thunderbot.gg/galerie/<?php echo $image['Image']['id']; ?>-<?php echo $image['Image']['slug']; ?>">
            <img class="img-responsive" src="http://www.thunderbot.gg/thumb.php?src=<?php echo $this->Html->url($image['Image']['image']); ?>&w=400&zc=1" alt="">-->
            <?php if($key%2 == 1) {?>
            <hr class="hr-grey-3">
            <?php } ?>
            <?php endforeach; ?>
    </div>

    </div>
</div>





    </div>
</div>


