<?php 
$strAction = $this->plugin.$this->name.$this->action;
$menus = array();
$menus['AuthAclAuthAclindex'] = 1;
$menus['AuthAclUsersindex'] = 2; // User menu
$menus['AuthAclUsersadd'] = 2;
$menus['AuthAclUsersview'] = 2;
$menus['AuthAclGroupsindex'] = 2;
$menus['AuthAclPermissionsindex'] = 2;
$menus['AuthAclPermissionsuser'] = 2;
$menus['AuthAclPermissionsuserPermission'] = 2;
$menus['ArticleArticlesindex'] = 3;
$menus['ArticleCategoriesindex'] = 3;
$menus['AuthAclSettingsindex'] = 4;
$menus['AuthAclSettingsemail'] = 4;
$menus['AuthAclUserseditAccount'] = 5;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta charset="utf-8">
<title><?php echo $title_for_layout.' | ThunderBot'; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<link href="<?php echo $this->webroot; ?>admin/admincalendar.css" rel="stylesheet">
<link href="<?php echo $this->webroot; ?>admin/jquery.loadmask.css" rel="stylesheet">



    <!--    <script src="http://www.stratageo.fr/loltooltip/LolTooltipFull.js"></script>   
<link href="http://www.stratageo.fr/Lolitem/css/thunderbot/jquery-ui-1.10.3.custom.css" rel="stylesheet">
<link href="http://www.stratageo.fr/loltooltip/LolTooltipFull.css" rel="stylesheet">
     -->






<?php echo $this->Html->script('jquery');?>

<?php echo $scripts_for_layout;?>

<?php echo $this->Html->css('/admin/template');?>
<?php echo $this->Html->css('/admin/animate');?>
<?php echo $this->Html->css('/admin/theme');?>
<?php echo $this->Html->css('/admin/thunder');?>

<link href='http://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
<script src="<?php echo $this->webroot; ?>admin/jquery-1.8.2.min.js"></script>
<script src="<?php echo $this->webroot; ?>admin/jquery-ui-1.10.3.custom.min.js"></script>


<script src="<?php echo $this->webroot; ?>admin//jquery.loadmask.js"></script>
<script src="<?php echo $this->webroot; ?>admin/jquery.cookie.js"></script>
<script src="<?php echo $this->webroot; ?>admin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $this->webroot; ?>admin/bootstrap-modal/js/bootstrap.modal.js"></script>
<script src="<?php echo $this->webroot; ?>admin/bootstrap-modal/js/jquery.easing.1.3.js"></script>
<link rel="icon" href="/favicon_new.ico">
<?php echo $this->Html->meta('favicon');?>
</head>
<body>

	<div class="navbar navbar-fixed-top" id="mnu_admin_top">
		<div class="navbar-inner">
			<div class="container">
				<button type="button" class="btn btn-navbar" data-toggle="collapse"
					data-target=".nav-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<?php if ($this->Acl->check('Settings','index','AuthAcl') == true || $this->Acl->check('Settings','email','AuthAcl') == true ){?>
						<li
							class="dropdown<?php if (isset($menus[$strAction]) && (int)$menus[$strAction] == 4){?> active <?php }?>"><a
							data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Settings'); ?>
								<b class="caret"></b> </a>
							<ul class="dropdown-menu">
								<?php if ($this->Acl->check('Settings','index','AuthAcl') == true){?>
									<li><?php echo $this->Html->link(__('General'), array('plugin' => 'auth_acl','controller' => 'settings','action' => 'index')); ?></li>
								<?php }?>
								<?php if ($this->Acl->check('Settings','email','AuthAcl') == true){?>
									<li class="nav-header"><?php echo __('Email templates'); ?></li>
									<li><?php echo $this->Html->link(__('New User'), array('plugin' => 'auth_acl','controller' => 'settings','action' => 'email/new_user')); ?></li>
									<li><?php echo $this->Html->link(__('Reset Password'), array('plugin' => 'auth_acl','controller' => 'settings','action' => 'email/reset_password')); ?></li>
								<?php } ?>
							</ul>
						</li>
						<?php }?>
						<?php if ($this->Acl->check('Users','index','AuthAcl') == true || $this->Acl->check('Groups','index','AuthAcl') == true || $this->Acl->check('Permissions','index','AuthAcl') == true){?>
						<li
							class="dropdown <?php if (isset($menus[$strAction]) && (int)$menus[$strAction] == 2){?> active <?php }?>"><a
							data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Users'); ?>
								<b class="caret"></b> </a>
							<ul class="dropdown-menu">
								<?php if ($this->Acl->check('Users','index','AuthAcl') == true){?>
									<li><?php echo $this->Html->link(__('User Manager'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'index')); ?></li>
								<?php } ?>
								<?php if ($this->Acl->check('Groups','index','AuthAcl') == true){?>
									<li><?php echo $this->Html->link(__('Groups'), array('plugin' => 'auth_acl','controller' => 'groups','action' => 'index')); ?></li>
								<?php }?>
								<?php if ($this->Acl->check('Permissions','index','AuthAcl') == true){?>
									<li><?php echo $this->Html->link(__('Permissions'), array('plugin' => 'auth_acl','controller' => 'permissions','action' => 'index')); ?></li>
								<?php } ?>
							</ul>
						</li>
						<?php } ?>




						<?php if ($this->Acl->check('Equipes','admin_index','Equipe') == true){?>
						<li
							class="dropdown <?php if (isset($menus[$strAction]) && (int)$menus[$strAction] == 2){?> active <?php }?>"><a
							data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Thunderbot'); ?>
								<b class="caret"></b> </a>

							<ul class="dropdown-menu">
								<li class="nav-header"><?php echo __('WebTV Manager'); ?></li>

									<li><?php echo $this->Html->link(__('Equipe'), array('plugin' => 'equipe','controller' => 'equipes','action' => 'admin_index')); ?></li>

							</ul>
						</li>
						<?php } ?>









						<li id="mnu_plugins"
							class="dropdown <?php if (isset($menus[$strAction]) && (int)$menus[$strAction] == 3){?> active <?php }?>"><a
							data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Articles'); ?>
								<b class="caret"></b> </a> <?php if ($this->Acl->check('Articles','admin_index','Article') == true || $this->Acl->check('Categories','admin_index','Article') == true){?>
							<ul class="dropdown-menu">
								<li class="nav-header"><?php echo __('Article Manager'); ?></li>
								<?php if ($this->Acl->check('Categories','admin_index','Article') == true){?>
									<li><?php echo $this->Html->link(__('Categories'), array('plugin' => 'article','controller' => 'categories','action' => 'admin_index')); ?></li>
								<?php } ?>
								<?php if ($this->Acl->check('Categories','admin_index','Article') == true){?>
									<li><?php echo $this->Html->link(__('Type Article'), array('plugin' => 'article','controller' => 'articleTypes','action' => 'admin_index')); ?></li>
								<?php } ?>
								<?php if ($this->Acl->check('Articles','admin_index','Article') == true ){?>
									<li><?php echo $this->Html->link(__('Articles'), array('plugin' => 'article','controller' => 'articles','action' => 'admin_index')); ?></li>
								<?php } ?>
								<?php if ($this->Acl->check('Polls','admin_index','Polls') == true ){?>
									<li><?php echo $this->Html->link(__('Polls'), array('plugin' => 'polls','controller' => 'polls','action' => 'admin_index')); ?></li>
								<?php } ?>
								<?php if ($this->Acl->check('Bannieres','admin_index','Article') == true ){?>
									<li><?php echo $this->Html->link(__('Bannieres'), array('plugin' => 'article','controller' => 'bannieres','action' => 'admin_index')); ?></li>
								<?php } ?>
								
							</ul>
						</li>
						 <?php } ?>
						<?php if ($this->Acl->check('Webtvs','admin_index','Webtv') == true){?>
						<li
							class="dropdown <?php if (isset($menus[$strAction]) && (int)$menus[$strAction] == 2){?> active <?php }?>"><a
							data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('WebTV'); ?>
								<b class="caret"></b> </a>
							<ul class="dropdown-menu">
								<li class="nav-header"><?php echo __('WebTV Manager'); ?></li>
									<li><?php echo $this->Html->link(__('New Event'), array('plugin' => 'full_calendar','controller' => 'events','action' => 'admin_add')); ?></li>
								<?php if ($this->Acl->check('Webtvs','admin_index','Webtv') == true){?>
									<li><?php echo $this->Html->link(__('WebTV'), array('plugin' => 'webtv','controller' => 'webtvs','action' => 'admin_index')); ?></li>
								<?php } ?>
									<li><?php echo $this->Html->link(__('Manage Events'), array('plugin' => 'full_calendar','controller' => 'events','action' => 'admin_index')); ?></li>

									<li><?php echo $this->Html->link(__('Manage Streamer'), array('plugin' => 'full_calendar','controller' => 'event_types','action' => 'admin_index')); ?></li>
									<li><?php echo $this->Html->link(__('Calandar'), array('plugin' => 'full_calendar','controller' => 'FullCalendar','action' => 'admin_index')); ?></li>
							</ul>
						</li>
						<?php } ?>


						<?php if ($this->Acl->check('Videos','admin_index','Video') == true){?>
						<li
							class="dropdown <?php if (isset($menus[$strAction]) && (int)$menus[$strAction] == 8){?> active <?php }?>"><a
							data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('VOD'); ?>
								<b class="caret"></b> </a>
							<ul class="dropdown-menu">
								<li class="nav-header"><?php echo __('VOD Manager'); ?></li>
					<?php if ($this->Acl->check('Videos','admin_index','Video') == true){?>
						<li><?php echo $this->Html->link(__('VOD'), array('plugin' => 'video','controller' => 'videos','action' => 'admin_index')); ?></li>
					<?php } ?>
						<li><?php echo $this->Html->link(__('Type'), array('plugin' => 'video','controller' => 'videoTypes','action' => 'admin_index')); ?></li>
							</ul>
						</li>
						<?php } ?>


						<?php if ($this->Acl->check('Images','admin_validate','Image') == true){?>
						<li
							class="dropdown <?php if (isset($menus[$strAction]) && (int)$menus[$strAction] == 8){?> active <?php }?>"><a
							data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Galeries'); ?>
								<b class="caret"></b> </a>
							<ul class="dropdown-menu">
								<li class="nav-header"><?php echo __('Galeries Manager'); ?></li>
								<?php if ($this->Acl->check('Images','admin_validate','Image') == true){?>
									<li><?php echo $this->Html->link(__('Galeries'), array('plugin' => 'image','controller' => 'images','action' => 'admin_validate')); ?></li>
								<?php } ?>
							</ul>
						</li>
						<?php } ?>

						<?php if($this->Acl->check('Guides','admin_index','Guide') == true)
						{
						?>
						<li
							class="dropdown <?php if(isset($menu[$strAction]) && (int)$menu[$strAction] == 8){?> active <?php }?>">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Guides'); ?>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li class="nav-header"><?php echo __('Guides Manager'); ?></li>
								<?php if ($this->Acl->check('Guides','admin_index','Guide') == true){?>
								<li><?php echo $this->Html->link(__('Guides'), array('plugin' => 'guide','controller' => 'guides','action' => 'admin_index')); ?></li>
								<?php } ?>
							</ul>
						</li>
						<?php } ?>







					</ul>
					<ul class="nav pull-right">
						<?php if (!empty($login_user)){ ?>
						<li
							class="dropdown<?php if (isset($menus[$strAction]) && (int)$menus[$strAction] == 5){?> active <?php }?>"><a
							data-toggle="dropdown" class="dropdown-toggle" href="#"> <i
								class="icon icon-user"></i> <?php echo h($login_user['user_name']); ?>
								<b class="caret"></b>
						</a>
							<ul class="dropdown-menu">
								<li><?php echo $this->Html->link(__('<i class="icon-pencil"></i> Mon Compte'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'editAccount'),array('escape'=>false)); ?></li>
								<li class="divider"></li>
								<li><?php echo $this->Html->link(__('<i class="icon-minus-sign"></i> Se déconnecter'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'logout'),array('escape'=>false)); ?></li>
							</ul></li>
						<?php }else{ ?>
						<li><?php echo $this->Html->link(__('Sign in'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'login')); ?></li>
						</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="thunder_header">
		<div class="main clearfix">	
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
												<a class="thunder_menu_head thunder_menu_nodrop " href="<?php echo $this->Html->url(array('controller' => 'videos', 'action' => 'index','plugin' => 'video'), true); ?>">
												<span class="thunder_menu_nodesc">		
												<span class="thunder_menu_title">videos</span>
												</span>
												</a>
											</li>



										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>	
		</div>
	</div>

		<?php 
			if (method_exists($this, 'fetch')){
				echo $this->fetch('content'); 
			}else{
				echo $content_for_layout;
			}	
		?>

	<?php echo $this->element('sql_dump'); ?>
	<script>
		$(document).ready(function() {
			// remove user search cookie
			$('#mnu_admin_top').find('a').each(function() {
				$(this).click(function() {
					removeUserSearchCookie();
				});
			});
			$('#tab_user_manager').find('a').each(function() {
				$(this).click(function() {
					removeUserSearchCookie();
				});
			});

			if ($('#mnu_plugins').children('ul').find('li').length <= 1){
	           $('#mnu_plugins').hide();
			}else{
	           $('#mnu_plugins').show();
	       	} 
		});

		function removeUserSearchCookie() {
			$.cookie.raw = true;
			$.removeCookie('CakeCookie[srcPassArg]', {
				path : '/'
			});
		}
	</script>

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