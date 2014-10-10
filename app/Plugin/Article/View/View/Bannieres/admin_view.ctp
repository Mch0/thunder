admin_<style>
<!--
.form-horizontal .control-label {
	padding-top: 0px;
}
-->
</style>
<div class="container">
	<h2>
		<?php echo __('Article Manager: Article (view)'); ?>
	</h2>
	<div class="row-fluid show-grid" id="tab_user_manager">
		<div class="span12">
			<ul class="nav nav-tabs">
				<?php if ($this->Acl->check('Categories','index','Article') == true){?>
					<li><?php echo $this->Html->link(__('Category'), array('plugin' => 'article','controller' => 'categories','action' => 'admin_index')); ?></li>
				<?php } ?>
				<?php if ($this->Acl->check('Articles','index','Article') == true){?>
					<li class="active"><?php echo $this->Html->link(__('Article'), array('plugin' => 'article','controller' => 'articles','action' => 'admin_index')); ?></li>
				<?php }?>
			</ul>
		</div>
	</div>
	<div class="row-fluid show-grid">
		<div class="span12">
			<form class="form-horizontal">
				<div class="control-group">
					<label class="control-label"><?php echo __('Id'); ?>
					</label>
					<div class="controls">
						<?php echo h($article['Article']['id']); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Article Title'); ?>
					</label>
					<div class="controls">
						<?php echo h($article['Article']['article_title']); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Category'); ?>
					</label>
					<div class="controls">
						<?php echo $article['Category']['category_name']; ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Article Date'); ?>
					</label>
					<div class="controls">
						<?php echo h($article['Article']['article_date']); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?php echo __('Article Summary'); ?>
					</label>
					<div class="controls">
						<?php echo h($article['Article']['article_summary']); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?php echo __('Article Content'); ?>
					</label>
					<div class="controls">
						<?php echo $article['Article']['article_content']; ?>
					</div>
				</div>
				<div class="form-actions">
					<?php echo $this->Acl->link(__('Edit'), array('action' => 'admin_edit', $article['Article']['id']),array('class'=>'btn  btn-primary')); ?>
					<a class="btn " onclick="cancel_add();"><?php echo __('Cancel'); ?>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	function cancel_add() {
		window.location = '<?php echo Router::url(array('plugin' => 'article','controller' => 'articles','action' => 'admin_index')); ?>';
	}
</script>
