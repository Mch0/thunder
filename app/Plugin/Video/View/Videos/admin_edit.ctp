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

FORMAT width="625" height="352" FORMAT DE LA VIDEO


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
			<?php echo $this->Form->create('Video',array('class'=>'form-horizontal')); ?>

			<?php echo $this->Form->input('id',array('div' => false,'label'=>false,'error'=>false)); ?>
			




			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('video_title'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('slug'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('created',array('label'=>"Date de publication",'dateFormat' => 'DMY','timeFormat' => 24)); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('category_id',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>


			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('video_type_id',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>

video_content
			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('video_content',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>
iframe_video
			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('iframe_video',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>

iframe_video Video du jour
			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('iframe_video22'); ?>
				</div>
			</div>


			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('online',array('label'=>"online ?",'type'=>'checkbox')); ?>
				</div>
			</div>





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
