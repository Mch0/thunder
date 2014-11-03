<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!--<h2><?php echo $message; ?></h2>
<p class="error">
	<strong><?php echo __d('cake', 'Error'); ?>: </strong>
	<?php echo __d('cake', 'An Internal Error Has Occurred.'); ?>
</p>
<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?>-->
<div id="error-500">
    <h1 class="alert-danger">Erreur interne</h1>
    <br/>
    <br/>
    <p>Oups, Une erreur innatendue est survenue. Veuillez contacter le webmaster pour l'informer du problème.
        <br/>
        <a href="mailto:arnaud.scote@gmail.com">Informer</a>
    </p>
    <p>
        <a href="<?php echo $this->Html->url(array('controller' => 'articles', 'action' => 'index','plugin' => 'article'), true); ?>">
            Accueil
        </a>
    </p>
</div>