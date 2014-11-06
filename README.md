Installation du projet 

==================================================

> app/Config 
> créer un fichier database.php si inexistant

<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'login',
		'password' => 'password',
		'database' => 'thunder_25d45f287g912h63jn41',
		'encoding' => 'utf8'
	);
}
?>
> renseigner host, login, password et database

======================================================

> app/Config/Core.php

> ligne 35 

> changer le niveau de log selon environnement (dev, int, prod)

=======================================================

> app/Webroot/index.php

> ligne 65

> modifier le chemin pour renseigner la dossier lib de cakephp

========================================================

> activer le mod rewrite url pour apache

========================================================
