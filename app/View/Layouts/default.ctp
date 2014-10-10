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

  </head>

  <body>

<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container"> 
      <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'articles', 'action' => 'index','plugin' => 'article'), true); ?>"><img class="" src="<?php echo $this->Html->url('/design/css/img/logo.png'); ?>" alt="Thunderbot logo" style="height: 30px;"></img> Accueil</a>
      </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="<?php echo $this->Html->url(array('controller' => 'webtvs', 'action' => 'index2','plugin' => 'webtv'), true); ?>">Webtv</a></li>
      <li><a href="<?php echo $this->Html->url(array('controller' => 'videos', 'action' => 'index','plugin' => 'video'), true); ?>">Vidéos</a></li>
      <li><a href="<?php echo $this->Html->url(array('controller' => 'images', 'action' => 'index','plugin' => 'image'), true); ?>">Galerie</a></li>  
      <li><a href="<?php echo $this->Html->url(array('controller' => 'equipes', 'action' => 'index','plugin' => 'equipe'), true); ?>">Equipe</a></li>
      <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">ThunderBot <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'wall_sup','plugin' => 'auth_acl'), true); ?>">Mur</a></li>
      <li><a href="<?php echo $this->Html->url(array('controller' => 'contact', 'action' => 'index','plugin' => 'contact'), true); ?>">Contact</a></li>
        <?php if ($this->Acl->check('Articles','admin_index','Article') == true ){?>
          <li><?php echo $this->Html->link(__('ADMIN'), array('plugin' => 'article','controller' => 'articles','action' => 'admin_index')); ?></li>
        <?php } ?>
      </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <div class="navbar-right">
            <ul class="nav pull-right">
            <?php if($this->Session->read('Auth.User.id')) { ?>
                <a class="btn btn-primary navbar-btn btn-xs" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout','plugin' => 'auth_acl'), true); ?>"><span class="glyphicon glyphicon-ok"></span> Se deconnecter</a>
                <a class="btn btn-thunder2 navbar-btn btn-xs" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'editAccount','plugin' => 'auth_acl'), true); ?>"><span class="glyphicon glyphicon-user"></span> Mon compte</a>
            <?php }else{ ?>
            <a class="btn btn-primary navbar-btn btn-xs" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login','plugin' => 'auth_acl'), true); ?>"><span class="glyphicon glyphicon-ok"></span> Se connecter </a>
            <a class="btn btn-thunder2 navbar-btn btn-xs" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'signup','plugin' => 'auth_acl'), true); ?>"><span class="glyphicon glyphicon-user"></span> S'enregistrer</a>
            </a></li>
            <?php } ?>
          </ul>
    </div>
    </ul>
  </div>
  </div>
</nav>

<div class="container">
  <div class="row">
      <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">

              <div id="header_logo">
                  <a href="<?php echo $this->Html->url(array('controller' => 'articles', 'action' => 'index','plugin' => 'article'), true); ?>">
                  <img class="ThunderBot" src="http://www.thunderbot.gg/thumb.php?src=/css/images/thunder_logo.png&w=300&zc=1" alt=""></img>
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
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-42387963-1', 'thunderbot.gg');
    ga('send', 'pageview');
  </script>

    <?php  echo $this->Html->script('/design/js/bootstrap.min'); ?>
  </body>
</html>
