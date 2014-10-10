<div class="container">
	<h2>
		<?php echo __('Video image'); ?>
	</h2>


	<div class="row-fluid show-grid">
		<div class="span12">

			<?php echo $this->Form->create('Video img', array('type' => 'file')); ?>





			<div class="control-group">
				<div class="controls">
		    <?php echo $this->Form->input('Video.photo', array('type' => 'file')); ?>
		    <?php echo $this->Form->input('Video.photo_dir', array('type' => 'hidden')); ?>

				</div>
			</div>



			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('Save Article'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="cancel_edit();" />
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

