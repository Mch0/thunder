<div class="container">
	<h2>
		<?php echo __('Webtv Image'); ?>
	</h2>


	<div class="row-fluid show-grid">
		<div class="span12">
			<?php echo $this->Form->create('Webtv', array('type' => 'file')); ?>
			<?php echo $this->Form->input('id',array('div' => false,'label'=>false,'error'=>false)); ?>

			<div class="control-group">
				<div class="controls">
		    <?php echo $this->Form->input('Webtv.photo', array('type' => 'file')); ?>
		    <?php echo $this->Form->input('Webtv.photo_dir', array('type' => 'hidden')); ?>

				</div>
			</div>



			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('Save Webtv'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="cancel_edit();" />
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

