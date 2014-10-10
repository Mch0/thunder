<div class="container">
	<h2>
		<?php echo __('Video Manager : (Edit)'); ?>
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
			<?php echo $this->Form->create('Image', array('type' => 'file')); ?>

			<?php echo $this->Form->input('id',array('div' => false,'label'=>false,'error'=>false)); ?>

			<?php echo $this->Form->input('image_file', array('type' => 'file', 'label'=>false));; ?>

			<?php echo $this->Form->input('title'); ?>


			<?php echo $this->Form->input('slug'); ?>



			<?php echo $this->Form->input('online',array('label'=>"online ?",'type'=>'checkbox')); ?>
			<?php echo $this->Form->input('validate',array('label'=>"validate ?",'type'=>'checkbox')); ?>




			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('Save video'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="cancel_edit();" />
			</div>

			<?php echo $this->Form->end(); ?>
		</div>
	</div>


</div>
