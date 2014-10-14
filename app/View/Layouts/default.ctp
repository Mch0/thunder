<!--
 (^)(^)
  (^^)
  ()()
-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">

    <title><?php echo 'ThunderBot - '.$title_for_layout; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php echo $scripts_for_layout;?>
    <?php echo $this->fetch('css'); ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <?php  echo $this->Html->css('/design/css/bootstrap'); ?>
    <?php  echo $this->Html->css('/design/css/main5'); ?>
    <?php  echo $this->Html->css('/design/css/style'); ?>
    <?php  echo $this->Html->script('/design/js/videoplayer/videoplayer'); ?>
    <?php  echo $this->Html->script('/design/js/bootstrap.min'); ?>
</head>

<body>

<!-- MODAL  -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Nouveau mot de passe</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>Adresse Email : </strong></label>
                    <input class="form-control" id="user_email" type="text" name="user_email" placeholder="Adresse Email" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="sendResetPassword" onclick="ResetPwd()" class="btn btn-thunder"><span class="glyphicon glyphicon-envelope"></span> Envoyer</button>
                <button type="button" class="btn btn-thunder" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Fermer </button>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"
               href="<?php echo $this->Html->url(array('controller' => 'articles', 'action' => 'index','plugin' => 'article'), true); ?>">
                <img class="" src="<?php echo $this->Html->url('/design/css/img/logo.png'); ?>" alt="Thunderbot logo"
                     style="height: 30px;"/></a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'webtvs', 'action' => 'index2','plugin' => 'webtv'), true); ?>">Webtv</a>
                </li>
                <!--<li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'videos', 'action' => 'index','plugin' => 'video'), true); ?>">Vidéos</a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'images', 'action' => 'index','plugin' => 'image'), true); ?>">Galerie</a>
                </li>-->

                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'equipes', 'action' => 'index','plugin' => 'equipe'), true); ?>">Equipe</a>
                </li>
                <li> <a href="#" >Sponsors</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">ThunderBot <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'wall_sup','plugin' => 'auth_acl'), true); ?>">Mur</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller' => 'contact', 'action' => 'index','plugin' => 'contact'), true); ?>">Contact</a>
                        </li>
                        <?php if ($this->Acl->check('Articles','admin_index','Article') == true ){?>
                        <li><?php echo $this->Html->link(__('ADMIN'), array('plugin' => 'article','controller' =>
                            'articles','action' => 'admin_index')); ?>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
            <ul class="nav pull-right navbar-nav navbar-right">
                <li class="divider-vertical"></li>
                    <li>
                        <div id="recherche" class="right">

                            <?php echo $this->Form->create('Article', array('action' => 'recherche','class'=>'form-search')); ?>
                                <div class="input-group">
                                    <?php echo $this->Form->input('filter',array('div' => false,'label'=>false,'placeholder'=>"Rechercher",'class'=>'form-control')); ?>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </span>
                                </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </li>
                    <li class="divider-vertical"></li>
                    <li>
                        <a href="https://www.facebook.com/myThunderBot" class="social" target="_blank">
                            <?php echo $this->Html->image('facebook-white.png',array('alt'=> 'Facebook')); ?>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/MyThunderBot" class="social" target="_blank">
                            <?php echo $this->Html->image('twitter-white.png',array('alt'=> 'Twitter')); ?>
                        </a>
                    </li>
                    <li class="divider-vertical"></li>
                    <li class="dropdown">

                        <?php if($this->Session->read('Auth.User.id')) { ?>
                        <a  href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout','plugin' => 'auth_acl'), true); ?>"><span class="glyphicon glyphicon-ok"></span> Se deconnecter</a>
                        <a  href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'editAccount','plugin' => 'auth_acl'), true); ?>"><span class="glyphicon glyphicon-user"></span> Mon compte</a>
                        <?php }else{ ?>
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">Se connecter <strong class="caret"></strong></a>
                        <div class="dropdown-menu" id="box-connexion" style="padding: 15px; padding-bottom: 0px;">
                            <!-- Login form here -->
                            <div >
                                    <?php echo $this->Form->create('User', array('url' => '/login','class'=>' form-signin')); ?>
                                <?php if (!empty($error)) {?>
                                <div class="alert alert-error"><?php echo $error;?></div>
                                <?php } ?>
                                <div class="form-group">
                                    <strong>
                                        <label for="email">
                                            <?php echo __('Email :'); ?>
                                        </label>
                                    </strong>
                                        <?php echo $this->Form->input('user_email',array('div' => false,'label'=>false,'id' => 'email','type' => 'email','placeholder'=>__('Adresse Email'),'class'=>'form-control')); ?>
                                </div>
                                <div class="form-group">
                                    <strong class="login">
                                        <label for="password">
                                            <?php echo __('Mot de passe :'); ?>
                                        </label>
                                    </strong>
                                        <?php echo $this->Form->password('user_password',array('div' => false,'label'=>false,'id' => 'password','placeholder'=>__('Mot de passe'),'class'=>'form-control')); ?>
                                </div>
                                <div class="control-group">
                                    <br>
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-thunder2" value="<?php echo __('Envoyer'); ?>" />
                                    </div>
                                    <br>
                                   <?php echo $this->Form->end() ?>
                                    <div id="link-helper">
                                        <p><a href="#" id="link-resetpassword" data-toggle="modal" data-target="#myModal"><?php echo __('Mot de passe perdu ?'); ?></a></p>

                                        <p><?php echo $this->Html->link(__('Créer un compte'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'signup'),array('id' => 'link-createaccount')); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
        <?php } ?>
                    </li>
                </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">

            <div id="header_logo">
                <a href="<?php echo $this->Html->url(array('controller' => 'articles', 'action' => 'index','plugin' => 'article'), true); ?>">
                    <img class="ThunderBot"
                         src="http://www.thunderbot.gg/thumb.php?src=/css/images/thunder_logo.png&w=300&zc=1"
                         alt=""></img>
                </a>
            </div>
        </div>
    </div>


    <div class="thunderbot">
        <?php
              if (method_exists($this, 'fetch')){
              echo $this->fetch('content');
        }else{
        echo $content_for_layout;
        }
        ?>
    </div>
</div>

<footer class="well">

    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            </div>

        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <p>© thunderbot.gg</p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <ul class="list-inline pull-right">
                    <li><a href="#" title=""><i class="icon-twitter"></i></a></li>
                    <li><a href="#" title=""><i class="icon-facebook"></i></a></li>
                    <li><a href="#" title=""><i class="icon-google-plus"></i></a></li>
                    <li><a href="#" title=""><i class="icon-youtube"></i></a></li>
                    <li><a href="#" title=""><i class="icon-dribbble"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

</footer>
<script>

    function ResetPwd()
    {
        $.post('<?php echo Router::url(array('plugin' => 'auth_acl','controller' => 'users','action' => 'resetPassword')); ?>',{data:{User:{user_email:$('#user_email').val()}}},function(o){
        if (o.send_link == 1){
            $('#myModal').find('.alert-error').remove()
            $('.modal-body').prepend('<div class="alert alert-success" style="padding:8px;"><?php echo __('Nous vous avons envoyé un mail.'); ?></div>');
            step =2;
        }else{
            alert('Erreur');
            step =1;
            $('#myModal').find('.alert-error').remove();

            $('.modal-body').prepend('<div class="alert alert-error alert-danger" style="padding:8px;"><?php echo __('<strong>Erreur</strong> !, Email non valide.'); ?></div>');
        }
    },'json');
    }

    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-42387963-1', 'thunderbot.gg');
    ga('send', 'pageview');
</script>
</body>
</html>
