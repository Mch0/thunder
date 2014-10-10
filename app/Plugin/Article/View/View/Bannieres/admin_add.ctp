<div class="container">
	<h2>
		<?php echo __('banniere add'); ?>
	</h2>
<span style="color: red;"> FORMAT 855x282 </span>
	<div class="row-fluid show-grid">
		<div class="span12">


			<?php echo $this->Form->create('Banniere', array('type' => 'file')); ?>


			<div class="control-group">
				<div class="controls">
		    <?php echo $this->Form->input('Banniere.photo', array('type' => 'file')); ?>
		    <?php echo $this->Form->input('Banniere.photo_dir', array('type' => 'hidden')); ?>

				</div>
			</div>


			<div class="control-group">
				<label class="control-label"><?php echo __('bannieres_title'); ?><span
					style="color: red;">*</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('bannieres_title',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label"><?php echo __('link'); ?><span
					style="color: red;">*</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('link',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>


			<div class="control-group">
				<label class="control-label"><?php echo __('online'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('online',array('label'=>"online ?",'type'=>'checkbox')); ?>
				</div>
			</div>


			<div class="control-group">
				<label class="control-label"><?php echo __('Created'); ?><span
					style="color: red;">*</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('created'); ?>
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

