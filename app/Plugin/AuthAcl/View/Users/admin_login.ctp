<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="author" content="thunderbot.gg" />
<title><?php echo $title_for_layout.' - ThunderBot'; ?></title>
<?php echo $scripts_for_layout;?>
<?php echo $this->fetch('css'); ?>
<?php echo $this->Html->css('generic');?>
<?php echo $this->Html->css('template');?>
<?php echo $this->Html->css('animate');?>
<?php echo $this->Html->css('theme');?>
<?php echo $this->Html->css('thunder');?>
<?php echo $this->Html->css('jquery.loadmask');?>
<link href='http://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="img/favicon.png">
</head>
<body class="bd_thunder">
<!-- TEST LOGIN -->
<div class="thunder">
	<div class="navbar navbar-fixed-top" id="mnu_admin_top">
		<div class="navbar-inner">
			<div class="container">
				<button type="button" class="btn btn-navbar" data-toggle="collapse"
					data-target=".nav-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<div class="nav-collapse collapse">
					<ul class="nav pull-right">
		            <?php if ($this->Session->read('Auth.User.id')): ?>
						<li><?php echo $this->Html->link(__('<i class="icon-home"></i> Mon compte'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'editAccount'),array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link(__('<i class="icon-minus-sign"></i> Se déconnecter'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'logout'),array('escape'=>false)); ?></li>
		            <?php else: ?>
						<li><?php echo $this->Html->link(__('<i class="icon-user"></i> Se connecter'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'login'),array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link(__('<i class="icon-pencil"></i> S\'enregistrer'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'signup'),array('escape'=>false)); ?></li>
		            <?php endif ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="thunder_header">
		<div class="main clearfix">	
			<div class="header-logo">
				<div class="container">
					<div class="row-fluid">	
						<div class="logo_header">
							<a class="logo" title="logo" href="/"></a>		
							<div class="container">
								<div class="row">
									<div class="span7">
									</div>
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<div class="header-nav">
				<div class="container">
					<div class="header-nav-inner">
						<div class="row-fluid">
							<div class="span12">
								<div class="clearfix">
									<div class="thunder_menu_wrapper">

										<ul class="thunder_menu_menu ">
											<li class="thunder_menu_lv1 thunder_menu_nodrop">
												<a class="thunder_menu_head thunder_menu_nodrop " href="<?php echo $this->Html->url(array('controller' => 'articles', 'action' => 'index','plugin' => 'article'), true); ?>">
												<span class="thunder_menu_nodesc">		
													<span class="thunder_menu_title">Accueil</span>
												</span>
												</a>
											</li>

											<li class="thunder_menu_lv1 thunder_menu_nodrop">
												<a class="thunder_menu_head thunder_menu_nodrop " href="<?php echo $this->Html->url(array('controller' => 'webtvs', 'action' => 'index','plugin' => 'webtv'), true); ?>">
												<span class="thunder_menu_nodesc">		
													<span class="thunder_menu_title">WebTV</span>

												</span>
												</a>
											</li>

											<li class="thunder_menu_lv1 thunder_menu_nodrop">
												<a class="thunder_menu_head thunder_menu_nodrop " href="<?php echo $this->Html->url(array('controller' => 'FullCalendar', 'action' => 'index','plugin' => 'full_calendar'), true); ?>">
												<span class="thunder_menu_nodesc">		
												<span class="thunder_menu_title">Programme</span>

													</span>
												</a>
											</li>

											<li class="thunder_menu_lv1 thunder_menu_nodrop">
												<a class="thunder_menu_head thunder_menu_nodrop " href="<?php echo $this->Html->url(array('controller' => 'videos', 'action' => 'index','plugin' => 'video'), true); ?>">
												<span class="thunder_menu_nodesc">		
												<span class="thunder_menu_title">videos</span>

													</span>
												</a>
											</li>


											<li class="thunder_menu_lv1 thunder_menu_nodrop">
												<a class="thunder_menu_head thunder_menu_nodrop " href="<?php echo $this->Html->url(array('controller' => 'articles', 'action' => 'index','plugin' => 'article'), true); ?>">
												<span class="thunder_menu_nodesc">		
												<span class="thunder_menu_title">Contact</span>

													</span>
												</a>
											</li>

										</ul>
									</div>
										<div class="social">
											<a class="dailymotion" title="dailymotion" href="http://www.dailymotion.com/thunderbot"></a>						
											<a class="youtube" title="youtube" href="http://www.youtube.com/mythunderbot"></a>	
											<a class="twitter" title="twitter" href="https://twitter.com/MyThunderBot"></a>
											<a class="facebook" title="facebook" href="https://www.facebook.com/ThunderBotGaming"></a>
										</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>	
		</div>
	</div>
<div class="breadcrumb">
</div>
	<div class="container" id="container">
		<?php //echo $this->Session->flash(); ?>
		<?php //echo $this->Session->flash('auth'); ?>
		<?php 
			if (method_exists($this, 'fetch')){
				echo $this->fetch('content'); 
			}else{
				echo $content_for_layout;
			}	
		?>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	<div class="footer_gener">
		<div class="footer_orange"></div>
		<div id="footer">
		    <div class="container">
		        <div class="row">
		          <div class="span7">
		           Copyright 2013 © thunderbot.gg
		        </div>
		    </div>
		</div>
	</div>
</div>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42387963-1', 'thunderbot.gg');
  ga('send', 'pageview');

</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<script src="<?php echo $this->webroot; ?>bootstrap-modal/js/bootstrap.modal.js"></script>
<?php echo $this->Html->script('bootstrap.min');?>
<?php echo $this->Html->script('jquery.cookie');?>
</body>
</html>
