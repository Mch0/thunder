<div class="container">
	<h2>
		<?php echo __('Webtv Manager : (Edit)'); ?>
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
			<?php echo $this->Form->create('Webtv',array('class'=>'form-inline')); ?>
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
					<?php echo $this->Form->input('slug',array('label' => 'slug : ')); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label"><?php echo __('Date de publication '); ?>
				</label>
				<div class="controls">
		        <?php echo $this->Form->input('created',array('label' => false,'dateFormat' => 'DMY','timeFormat' => 24)); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label"><?php echo __('Category'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('category_id',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label"><?php echo __('WebTV facebook'); ?><span
					style="color: red;">*</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('facebook',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>


			<div class="control-group">
				<label class="control-label"><?php echo __('WebTV Content'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('webtv_content',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>


			<div class="control-group">
				<label class="control-label"><?php echo __('WebTV Chat'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('iframe_chat',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>




			<div class="control-group">
				<label class="control-label"><?php echo __('WebTV Video'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('iframe_video',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"><?php echo __('WebTV Video thumb'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('iframe_video_thumb',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>


			<div>
				<label>
					<?php echo __('Publié'); ?> :
				</label>
					<?php echo $this->Form->input('online',array('type'=>'checkbox', 'label' => false ,'div' => false, 'style' => 'margin-top:-2px;margin-left:5px')); ?>
			</div>

			<div>
				<label>
					<?php echo __('Publié sur la home page'); ?> :
				</label>
				<?php echo $this->Form->input('onlinehp',array('type'=>'checkbox', 'label' => false ,'div' => false, 'style' => 'margin-top:-2px;margin-left:5px')); ?>
			</div>



			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('Save webtv'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="cancel_edit();" />
			</div>

			<?php echo $this->Form->end(); ?>
		</div>
	</div>


</div>
