<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Thunderbot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo $scripts_for_layout;?>
    <?php  echo $this->Html->css('main'); ?>
    <?php  echo $this->Html->css('bootstrap'); ?>
    <?php echo $this->fetch('css'); ?>
    <?php  echo $this->Html->script('/js/boostrap/jquery'); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> 
    <link href="http://www.stratageo.fr/Lolitem/css/thunderbot/jquery-ui-1.10.3.custom.css" rel="stylesheet">
    <link href="http://www.stratageo.fr/loltooltip/LolTooltipFull.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>

    <style type="text/css">
      html,
      body {
        height: 100%;
        background: url("/css/images/1.jpg") no-repeat fixed center top rgb(1, 1, 1);
      }
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
      }
      #push,
      #footer {
        height: 25px;
    background: url("/css/images/pattern_menu.png") repeat scroll 0% 0% rgb(50, 50, 50);
      color : white;
      padding-bottom: 10px;
      }
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }
      .container {
        width: auto;
        max-width: 1024px;
      }
      .container .credit {
        margin: 20px 0;
      }
    </style>
    <?php  echo $this->Html->css('bootstrap-responsive'); ?>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>







  <body>

    <div id="wrap">






<div id="header">

      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner3">          
          <div class="container">

          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <div class="nav-collapse collapse">
              <ul class="nav">


                <li><a href="<?php echo $this->Html->url(array('controller' => 'articles', 'action' => 'index','plugin' => 'article'), true); ?>">Accueil</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'webtvs', 'action' => 'index','plugin' => 'webtv'), true); ?>">WebTV</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'videos', 'action' => 'index','plugin' => 'video'), true); ?>">Vidéos</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'images', 'action' => 'index','plugin' => 'image'), true); ?>">Galerie</a></li>  
                <li><a href="<?php echo $this->Html->url(array('controller' => 'equipes', 'action' => 'index','plugin' => 'equipe'), true); ?>">Equipe</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'wall_sup','plugin' => 'auth_acl'), true); ?>">Mur</a></li>
                <li><a href="/contact">Contact</a></li>
                <?php if ($this->Acl->check('Articles','admin_index','Article') == true ){?>
                  <li><?php echo $this->Html->link(__('ADMIN'), array('plugin' => 'article','controller' => 'articles','action' => 'admin_index')); ?></li>
                <?php } ?>
              </ul>
              <ul class="nav pull-right">


          <ul class="nav pull-right">
            <?php if($this->Session->read('Auth.User.id')) { ?>
            <li
              class="dropdown<?php if (isset($menus[$strAction]) && (int)$menus[$strAction] == 5){?> active <?php }?>"><a
              data-toggle="dropdown" class="dropdown-toggle" href="#"> <i
                class="icon icon-user icon-white"></i>
                <b class="caret"></b>
            </a>
              <ul class="dropdown-menu">
                <li><?php echo $this->Html->link(__('<i class="icon-pencil"></i>Mon compte'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'editAccount'),array('escape'=>false)); ?></li>
                <li class="divider"></li>
                <li><?php echo $this->Html->link(__('<i class="icon-minus-sign"></i>Se deconnecter'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'logout'),array('escape'=>false)); ?></li>
              </ul></li>
            <?php }else{ ?>
            <li><?php echo $this->Html->link(__('Se connecter'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'login')); ?></li>
            <li><?php echo $this->Html->link(__('S\'enregistrer'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'signup')); ?></li>
            </a></li>
            <?php } ?>
          </ul>




          </div>
        </div>
          </div>
        </div>
 </div>






<div class="container">
  <div class="box-center">

          <div class="row-fluid">
      <div class="span6">


       <a href="<?php echo $this->Html->url(array('controller' => 'articles', 'action' => 'index','plugin' => 'article'), true); ?>">
      <div id="header_logo">
            <img class="ThunderBot" alt="" src="/css/images/thunder_logo.png"></img>
      </div>
      </a>



      </div>

    </div>






  <div id="page">

    <?php
    if (method_exists($this, 'fetch')){
    echo $this->fetch('content'); 
    }else{
    echo $content_for_layout;
    } 
    ?>
  </div>

</div>
</div>






<div id="footer">
  <footer>
  </footer>
 </div>

 </div>


  <?php  echo $this->Html->script('/js/boostrap/bootstrap-transition'); ?>
  <?php  echo $this->Html->script('/js/boostrap/bootstrap-alert'); ?>

  <?php  echo $this->Html->script('/js/boostrap/bootstrap-modal'); ?>
  <?php  echo $this->Html->script('/js/boostrap/bootstrap-dropdown'); ?>

  <?php  echo $this->Html->script('/js/boostrap/bootstrap-scrollspy'); ?>
  <?php  echo $this->Html->script('/js/boostrap/bootstrap-tab'); ?>

  <?php  echo $this->Html->script('/js/boostrap/bootstrap-tooltip'); ?>
  <?php  echo $this->Html->script('/js/boostrap/bootstrap-popover'); ?>

  <?php  echo $this->Html->script('/js/boostrap/bootstrap-button'); ?>
  <?php  echo $this->Html->script('/js/boostrap/bootstrap-collapse'); ?>

  <?php  echo $this->Html->script('/js/boostrap/bootstrap-carousel'); ?>
  <?php  echo $this->Html->script('/js/boostrap/bootstrap-typeahead'); ?>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-42387963-1', 'thunderbot.gg');
    ga('send', 'pageview');
  </script>
    
  </body>
</html>