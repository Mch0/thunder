<div class="container">
	<h2>
		<?php echo __('Article (Categories) Types'); ?>
	</h2>


	<div class="row-fluid show-grid">
		<div class="span12">

			<?php echo $this->Form->create('ArticleType', array('type' => 'file')); ?>

			<div class="control-group">
				<label class="control-label"><?php echo __('Name'); ?><span
					style="color: red;">*</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('name',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>



			<div class="control-group">
				<label class="control-label"><?php echo __('Content'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('Content',array('div' => false,'label'=>false,'error'=>false,'rows' => '15')); ?>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('Save article type'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="cancel_add();" />
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>





