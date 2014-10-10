<div class="container">
	<h2>
		<?php echo __('Webtv Manager add'); ?>
	</h2>

	<div class="row-fluid show-grid" id="tab_user_manager">
		<div class="span12">
			<ul class="nav nav-tabs">
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
			<?php echo $this->Form->create('Webtv',array('class'=>'form-horizontal')); ?>
			<?php echo $this->Form->input('id',array('div' => false,'label'=>false,'error'=>false)); ?>
			
			<div class="control-group">
				<label class="control-label"><?php echo __('WebTV Title'); ?><span
					style="color: red;">*</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('webtv_title',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>
			
			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('slug'); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label"><?php echo __('Date'); ?>
				</label>
				<div class="controls">
		        <?php echo $this->Form->input('created',array('label'=>"Date de publication",'dateFormat' => 'DMY','timeFormat' => 24)); ?>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('Save Webtv'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="cancel_edit();" />
			</div
			<?php echo $this->Form->end(); ?>
		</div>
	</div>


</div>
