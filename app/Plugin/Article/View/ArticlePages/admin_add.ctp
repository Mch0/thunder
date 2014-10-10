<div class="container">
	<h2>
		<?php echo __('Article (Categories) Types'); ?>
	</h2>


	<div class="row-fluid show-grid">
		<div class="span12">

			<?php echo $this->Form->create('ArticlePage', array('type' => 'file')); ?>





			<div class="control-group">
				<label class="control-label"><?php echo __('Article Title'); ?><span
					style="color: red;">*</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('article_title_page',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('slug'); ?>
				</div>
			</div>


			<div class="control-group">
				<label class="control-label"><?php echo __('rédacteur principal, pour relier plus tard a votre profil'); ?><span
					style="color: red;">*</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('article_id') ?> 
				</div>
			</div>



			<div class="control-group">
				<label class="control-label"><?php echo __('rédacteur principal, pour relier plus tard a votre profil'); ?><span
					style="color: red;">*</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('user_id') ?> 
				</div>
			</div>









			<div class="control-group">
				<label class="control-label"><?php echo __('Articel Summary'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('article_summary',array('div' => false,'label'=>false,'error'=>false,'rows' => '15')); ?>
				</div>
			</div>


			<div class="control-group">
				<label class="control-label"><?php echo __('Article Content'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('article_content',array('div' => false,'label'=>false,'error'=>false,'rows' => '15')); ?>
				</div>
			</div>













			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('Save article page'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="cancel_add();" />
			</div>




			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>





