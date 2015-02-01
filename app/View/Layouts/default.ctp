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
    <link rel="icon" href="/favicon_new.ico">

    <title><?php echo 'ThunderBot - '.$title_for_layout; ?></title>

    <?php echo $scripts_for_layout;?>
	<?php  echo $this->Html->script('/design/js/jquery-1.11.2.min'); ?>
    <?php  echo $this->Html->css('/design/css/bootstrap'); ?>
    <?php  echo $this->Html->css('/design/css/main5'); ?>
    <?php  echo $this->Html->script('/design/js/videoplayer/videoplayer'); ?>
    <?php  echo $this->Html->script('/design/js/bootstrap.min'); ?>
    <?php  echo $this->Html->css('/design/css/font-awesome'); ?>
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

<nav class="navbar navbar-fixed-top navbar-inverse big-menu" role="navigation">
    <div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand navbar-brand-1"
               href="<?php echo $this->Html->url(array('controller' => 'articles', 'action' => 'index','plugin' => 'article'), true); ?>">
                <img class="header-logo hidden-xs hidden-sm" src="<?php echo $this->Html->url('/design/css/img/logo.png'); ?>" alt="Thunderbot logo"
                     style="height: 170px;" />
            </a>

            <a class="navbar-brand navbar-brand-2 hidden" style="width: 205px"
               href="<?php echo $this->Html->url(array('controller' => 'articles', 'action' => 'index','plugin' => 'article'), true); ?>">

                <img  src="<?php echo $this->Html->url('/design/css/img/logo.png'); ?>" alt="Thunderbot logo"
                     style="height: 70px" /><span style="margin-left: px">ThunderBot</span>
            </a>
            <a class="navbar-brand navbar-brand-3 visible-xs visible-sm" style="width: 200px"
               href="<?php echo $this->Html->url(array('controller' => 'articles', 'action' => 'index','plugin' => 'article'), true); ?>">

                <img  src="<?php echo $this->Html->url('/design/css/img/logo.png'); ?>" alt="Thunderbot logo"
                      style="height: 50px" /><span style="margin-left: 5px">ThunderBot</span>
            </a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav menu-dynamique">

                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'webtvs', 'action' => 'index2','plugin' => 'webtv'), true); ?>">
                       <span class="hidden-xs hidden-sm"> <i class="fa fa-desktop fa-2x"></i></span>
                        Webtv
                    </a>
                </li>git
	            <li class="divider-vertical visible-lg"></li>
	            <li>
		            <a href="<?php echo $this->Html->url(array('controller' => 'champions', 'action' => 'index' , 'plugin' => 'guide'), true);?>">
			            <span class="hidden-xs hidden-sm" id="guides-icon"><i class="fa fa-book fa-2x visible-lg"></i></span>
			            Guides
		            </a>
	            </li>
                <li class="divider-vertical visible-lg"></li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'equipes', 'action' => 'index','plugin' => 'equipe'), true); ?>">
                        <span class="hidden-xs hidden-sm" id="equipe-icon"><i class="fa fa-users fa-2x visibe-lg"></i></span>
                            Équipe
                    </a>
                </li>
                <li class="divider-vertical visible-lg"></li>
                <li>
                    <a href="#" >
                       <span class="hidden-xs hidden-sm" id="sponsors-icon"> <i class="fa fa-suitcase fa-2x visibe-lg"></i></span>
                        Sponsors
                    </a>
                </li>
                <li class="divider-vertical visible-lg "></li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'wall_sup','plugin' => 'auth_acl'), true); ?>">
                        <span class="hidden-xs hidden-sm" id="mur-icon"><i class="fa fa-file fa-2x visibe-lg"></i></span>
                        Mur
                    </a>
                </li>
                <li class="divider-vertical visible-lg"></li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'contact', 'action' => 'index','plugin' => 'contact'), true); ?>">
                        <span class="hidden-xs hidden-sm"><i class="fa fa-envelope fa-2x visibe-lg"></i></span>
                        Contact
                    </a>
                </li>
                <li class="divider-vertical visible-lg"></li>
            </ul>


            <ul class="nav pull-right navbar-nav navbar-right">
                    <li>
                        <a href="https://www.facebook.com/myThunderBot" class="social" target="_blank" style="width: 45px">
                            <?php echo $this->Html->image('facebook-white.png',array('alt'=> 'Facebook')); ?>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/MyThunderBot" class="social" target="_blank" style="width: 45px">
                            <?php echo $this->Html->image('twitter-white.png',array('alt'=> 'Twitter')); ?>
                        </a>
                    </li>
                    <li class="dropdown">

                        <?php if($this->Session->read('Auth.User.id')) { ?>
                        <a  href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout','plugin' => 'auth_acl'), true); ?>"><span class="glyphicon glyphicon-ok"></span> Se deconnecter</a>
                        <!--<a  href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'editAccount','plugin' => 'auth_acl'), true); ?>"><span class="glyphicon glyphicon-user"></span> Mon compte</a>-->
                        <a class="dropdown-toggle" data-toggle="dropdown"  href="#"><span class="glyphicon glyphicon-user"></span> Mon compte <strong class="caret"></strong></a>
                        <div class="dropdown-menu" id="account">
                            <ul>
                                <li>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'editAccount','plugin' => 'auth_acl'), true); ?>">
                                        <span class="glyphicon glyphicon-user"></span>
                                        Mon compte
                                    </a>
                                </li>
                                <?php if ($this->Acl->check('Articles','admin_index','Article') == true ){?>
                                <li><?php echo $this->Html->link(__('Admin'), array('plugin' => 'article','controller' =>
                                    'articles','action' => 'admin_index'));

                                    ?>

                                </li>
                                <?php } ?>
                            </ul>
                        </div>

                        <?php }else{ ?>
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">Se connecter <strong class="caret"></strong></a>
                        <div class="dropdown-menu" id="box-connexion" style="padding: 15px; padding-bottom: 0px;">
                            <!-- Login form here -->
                            <div >
                                    <?php echo $this->Form->create('User', array('url' => '/login','class'=>' form-signin')); ?>
                                <?php if (!empty($error)) {?>
                                <div class="alert alert-danger"><?php echo $error;?></div>
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
	                            <div class="form-group">
		                            <strong class="remember">
			                            <label for="remember_me" >
				                            <?php echo __('Rester connecté'); ?>
			                            </label>
			                            <?php echo $this->Form->input('remember_me',array('type' => 'checkbox', 'div' => false, 'label' => false, 'id' => 'remember_me')); ?>
		                            </strong>
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
                <p class="pull-right">Designed By <a style="color:white" href="mailto:arnaud.scote@gmail.com">Mcho</a></p>
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
</script>
<?php  echo $this->Html->script('/design/js/index'); ?>
</body>
</html>
