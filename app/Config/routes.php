<?php
Router::parseExtensions('rss');

//public articles
Router::connect('/', array('controller' => 'articles', 'action' => 'index','plugin' => 'article'));
Router::connect('/article/:id-:slug',array('controller'=>'articles','action'=>'view' ,'plugin' => 'article'),array('pass'=> array('id','slug'), 'id'=>'[0-9]+','slug' =>'[a-z0-9\-]+'));
//private articles
//Router::connect('/robot/articles', array('controller'=>'articles','action'=>'admin_index' ,'plugin' => 'article'));
//Router::connect('/robot/articles/add/*', array('controller'=>'articles','action'=>'admin_add' ,'plugin' => 'article'));
//Router::connect('/robot/articles/edit/*', array('controller'=>'articles','action'=>'admin_edit' ,'plugin' => 'article'));
//Router::connect('/robot/articles/edit_img/*', array('controller'=>'articles','action'=>'admin_edit_image' ,'plugin' => 'article'));
//Router::connect('/robot/articles/view/*', array('controller'=>'articles','action'=>'admin_view' ,'plugin' => 'article'));










Router::connect('/test', array('controller'=>'articles','action'=>'test' ,'plugin' => 'article'));
Router::connect('/equipe/league-of-legends', array('controller'=>'equipes','action'=>'index' ,'plugin' => 'equipe'));


Router::connect('/lol/guides/league-of-legends', array('controller'=>'guides','action'=>'index' ,'plugin' => 'guide'));
Router::connect('/lol/guides/league-of-legends/:id-:slug',array('controller'=>'guides','action'=>'view' ,'plugin' => 'guide'),array('pass'=> array('id','slug'), 'id'=>'[0-9]+','slug' =>'[a-z0-9\-]+'));




Router::connect('/lol/guides/league-of-legends/champions', array('controller'=>'champions','action'=>'index' ,'plugin' => 'guide'));
Router::connect('/lol/guides/league-of-legends/champions/:id-:slug',array('controller'=>'champions','action'=>'view' ,'plugin' => 'guide'),array('pass'=> array('id','slug'), 'id'=>'[0-9]+','slug' =>'[a-z0-9\-]+'));





//public Webtvs
Router::connect('/webtv2', array('controller'=>'webtvs','action'=>'index' ,'plugin' => 'webtv'));
Router::connect('/webtv', array('controller'=>'webtvs','action'=>'index2' ,'plugin' => 'webtv'));


//Router::connect('/webtv2', array('controller'=>'webtvs','action'=>'index' ,'plugin' => 'webtv'));




Router::connect('/webtv/:id-:slug',array('controller'=>'webtvs','action'=>'view' ,'plugin' => 'webtv'),array('pass'=> array('id','slug'), 'id'=>'[0-9]+','slug' =>'[a-z0-9\-]+'));
//private Webtvs
//Router::connect('/robot/webtv', array('controller'=>'webtvs','action'=>'admin_index' ,'plugin' => 'webtv'));
//Router::connect('/robot/webtv/add/*', array('controller'=>'webtvs','action'=>'admin_add' ,'plugin' => 'webtv'));
//Router::connect('/robot/webtv/edit/*', array('controller'=>'webtvs','action'=>'admin_edit' ,'plugin' => 'webtv'));
//Router::connect('/robot/webtv/edit_img/*', array('controller'=>'webtvs','action'=>'admin_edit_image' ,'plugin' => 'webtv'));
//Router::connect('/robot/webtv/edit_streamer/*', array('controller'=>'webtvs','action'=>'stream_edit' ,'plugin' => 'webtv'));
//Router::connect('/robot/webtv/view/*', array('controller'=>'webtvs','action'=>'admin_view' ,'plugin' => 'webtv'));

//public Webtvs
Router::connect('/videos', array('controller'=>'videos','action'=>'index' ,'plugin' => 'video'));
Router::connect('/videos/:id-:slug',array('controller'=>'videos','action'=>'view' ,'plugin' => 'video'),array('pass'=> array('id','slug'), 'id'=>'[0-9]+','slug' =>'[a-z0-9\-]+'));

//public Calendrier
Router::connect('/programme', array('controller'=>'FullCalendar','action'=>'index' ,'plugin' => 'full_calendar'));


//private guide
Router::connect('/guides', array('controller'=>'guides','action'=>'index' ,'plugin' => 'guide'));
Router::connect('/guides/:id-:slug',array('controller'=>'guides','action'=>'view' ,'plugin' => 'guide'),array('pass'=> array('id','slug'), 'id'=>'[0-9]+','slug' =>'[a-z0-9\-]+'));











//public users
Router::connect('/profil/*', array('controller'=>'users','action'=>'editAccount' ,'plugin' => 'auth_acl'));
Router::connect('/logout/*', array('controller'=>'users','action'=>'logout' ,'plugin' => 'auth_acl'));
Router::connect('/login/*', array('controller'=>'users','action'=>'login' ,'plugin' => 'auth_acl'));
Router::connect('/signup/*', array('controller'=>'users','action'=>'signup' ,'plugin' => 'auth_acl'));
Router::connect('/activate/*', array('controller'=>'users','action'=>'activate' ,'plugin' => 'auth_acl'));
Router::connect('/resetPassword/*', array('controller'=>'users','action'=>'resetPassword' ,'plugin' => 'auth_acl'));
Router::connect('/signupcomplete/*', array('controller'=>'users','action'=>'signupcomplete' ,'plugin' => 'auth_acl'));
Router::connect('/activecomplete/*', array('controller'=>'users','action'=>'activecomplete' ,'plugin' => 'auth_acl'));
Router::connect('/le-mur-des-supporters/*', array('controller'=>'users','action'=>'wall_sup' ,'plugin' => 'auth_acl'));
Router::connect('/league-of-legends-fr/*', array('controller'=>'users','action'=>'league_of_legends_fr' ,'plugin' => 'auth_acl'));

Router::connect('/membre/:id', array('controller'=>'users','action'=>'view' ,'plugin' => 'auth_acl'),array('pass'=> array('id'), 'id'=>'[0-9]+'));





Router::connect('/galeries', array('controller'=>'images','action'=>'index' ,'plugin' => 'image'));
Router::connect('/galerie/:id-:slug',array('controller'=>'images','action'=>'view' ,'plugin' => 'image'),array('pass'=> array('id','slug'), 'id'=>'[0-9]+','slug' =>'[a-z0-9\-]+'));



//private users


//public acces denied
Router::connect('/le/noob/il/est/perdu/bouhhhhhhhhhhhhh*', array('controller'=>'accessDenied','action'=>'index' ,'plugin' => 'auth_acl'));



/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';





