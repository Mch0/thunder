<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<span class="nb-comment">Tous les commentaires (<?= count($comments) ?>)</span>
	<?php if ($this->Session->read('Auth.User.id')): ?>
	<div class="article-comment-form">

		<br/>
		<br/>

		<?= $this->Comment->form('Article', $article['Article']['id'], array("id" => "form_thunder",)); ?>

	</div>
	<?php endif ?>
</div>