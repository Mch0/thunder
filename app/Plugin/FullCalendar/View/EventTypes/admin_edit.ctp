

<div class="container">
	<h2>
		<?php echo __('EventType Manager: EventType (edit)'); ?>
	</h2>
	<div class="row-fluid show-grid" id="tab_user_manager">
		<div class="span12">
			<ul class="nav nav-tabs">

					<li><?php echo $this->Html->link(__('View Calendar'), array('plugin' => 'full_calendar','controller' => 'full_calendar','action' => 'admin_index')); ?></li>

			</ul>
		</div>
	</div>
	
	<div class="row-fluid show-grid">
		<div class="span12">

<?php echo $this->Form->create('EventType', array('type' => 'file')); ?>

			<div class="control-group">
				<label class="control-label"><?php echo __('Name'); ?><span
					style="color: red;">*</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('name',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"><?php echo __('Facebook'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('facebook',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"><?php echo __('Twitter'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('twitter',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>


			<div class="control-group">
				<label class="control-label"><?php echo __(''); ?>
				</label>
				<div class="controls">
					<?php 	echo $this->Form->input('color', 
							array('options' => array(
								'Blue' => 'Blue',
								'Red' => 'Red',
								'Pink' => 'Pink',
								'Purple' => 'Purple',
								'Orange' => 'Orange',
								'Green' => 'Green',
								'Gray' => 'Gray',
								'Black' => 'Black',
								'Brown' => 'Brown'
							)));
					?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
		    <?php echo $this->Form->input('EventType.photo', array('type' => 'file')); ?>
		    <?php echo $this->Form->input('EventType.photo_dir', array('type' => 'hidden')); ?>

				</div>
			</div>


			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('Save Event type'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="cancel_add();" />
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>





