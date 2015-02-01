<div class="container">
	<a target="_blank" class="btn btn-info" href="http://www.thunderbot.gg/redacteur.html">TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!</a>
	<h2>
		<?php echo __('champion Manager: Champion (Add)'); ?>
	</h2>
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
			<?php echo $this->Form->create('Champion',array('class'=>'form-horizontal','type' => 'file')); ?>
			<?php echo $this->Form->input('id',array('div' => false,'label'=>false,'error'=>false)); ?>

			<div class="control-group">
				<label class="control-label"><?php echo __('Nom du champion'); ?> : <span
						style="color: red;">*</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('name',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label"><?php echo __('Slug(Url)'); ?> :
				</label>
				<div class="controls">
					<?php echo $this->Form->input('slug',array('div' => false,'label'=>false,'error'=>false,'readonly'=>'readonly')); ?>
				</div>
			</div>
			<?php echo $this->Form->input('image', array('type' => 'file')); ?>
			<?php echo $this->Form->input('folder', array('type' => 'hidden', 'value' => 'champion')); ?>

			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
				       value="<?php echo __('Save Champion'); ?>" /> <input type="button"
				                                                         class="btn" value="<?php echo __('Cancel'); ?>"
				                                                         onclick="cancel_add();" />
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

