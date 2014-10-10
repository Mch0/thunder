<div class="container">
			<a target="_blank" class="btn btn-info" href="http://www.thunderbot.gg/redacteur.html">TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!</a>
	<h2>
		<?php echo __('Article Manager: Article (Add)'); ?>
	</h2>
	<div class="row-fluid show-grid" id="tab_user_manager">
		<div class="span12">
			<ul class="nav nav-tabs">
				<?php if ($this->Acl->check('Categories','admin_index','Article') == true){?>
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
			<?php if (count($errors) > 0){ ?>
			<div class="alert alert-error">
				<button data-dismiss="alert" class="close" type="button">×</button>
				<?php foreach($errors as $error){ ?>
				<?php foreach($error as $er){ ?>
				<strong><?php echo __('Error!'); ?> </strong>
				<?php echo h($er); ?>
				<br />
				<?php } ?>
				<?php } ?>
			</div>
			<?php } ?>
			<?php echo $this->Form->create('Article',array('class'=>'form-horizontal')); ?>
			<?php echo $this->Form->input('id',array('div' => false,'label'=>false,'error'=>false)); ?>
			
			<div class="control-group">
				<label class="control-label"><?php echo __('Articel Title'); ?><span
					style="color: red;">*</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('article_title',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label"><?php echo __('Slu(Url)'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('slug',array('div' => false,'label'=>false,'error'=>false,'readonly'=>'readonly')); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
		        <?php echo $this->Form->input('created',array('label'=>"Date de publication",'dateFormat' => 'DMY','timeFormat' => 24)); ?>
				</div>
			</div>



			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('Save Article'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="cancel_add();" />
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

