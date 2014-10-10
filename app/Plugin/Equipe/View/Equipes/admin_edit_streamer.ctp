<div class="container">
	<h2>
		<?php echo __('cat Streamer'); ?>
	</h2>


	<div class="row-fluid show-grid">
		<div class="span12">
			<?php echo $this->Form->create('Equipe',array('class'=>'form-horizontal')); ?>

			<?php echo $this->Form->input('id',array('div' => false,'label'=>false,'error'=>false)); ?>
			
			<div class="control-group">
				<label class="control-label"><?php echo __('streamer'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('event_type_id',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>



			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('Save cat Streamer'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="cancel_edit();" />
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

