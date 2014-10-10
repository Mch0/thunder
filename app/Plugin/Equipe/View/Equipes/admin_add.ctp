<div class="container">
	<h2>
		<?php echo __('Joueur Manager : (Edit)'); ?>
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
			<?php echo $this->Form->create('Equipe',array('class'=>'form-horizontal')); ?>

			<?php echo $this->Form->input('id',array('div' => false,'label'=>false,'error'=>false)); ?>
			




			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('name'); ?>
				</div>
			</div>
slug
			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('slug',array('div' => false,'label'=>false,'error'=>false,'readonly'=>'readonly')); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('created',array('label'=>"Date de publication",'dateFormat' => 'DMY','timeFormat' => 24)); ?>
				</div>
			</div>


content
			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('content',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>
role
			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('role',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>
facebook
			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('facebook',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>


			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('save joueur'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="cancel_edit();" />
			</div>

			<?php echo $this->Form->end(); ?>
		</div>
	</div>


</div>
