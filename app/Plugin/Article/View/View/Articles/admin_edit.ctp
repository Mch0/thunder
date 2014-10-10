<div class="container">

	<h2>
		<?php echo __('Article Manager: Article (Edit)'); ?>
	</h2>
	<div class="row-fluid show-grid" id="tab_user_manager">
		<div class="span12">
			<ul class="nav nav-tabs">
				<?php if ($this->Acl->check('Categories','admin_index','Article') == true){?>
					<li><?php echo $this->Html->link(__('Category'), array('plugin' => 'article','controller' => 'categories','action' => 'admin_index')); ?></li>
				<?php } ?>
				<?php if ($this->Acl->check('Articles','admin_index','Article') == true){?>
					<li class="active"><?php echo $this->Html->link(__('Article'), array('plugin' => 'article','controller' => 'articles','action' => 'admin_index')); ?></li>
				<?php }?>
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

			<?php echo $this->Form->create('Article', array('type' => 'file')); ?>
			<?php echo $this->Form->input('id',array('div' => false,'label'=>false,'error'=>false)); ?>
			
			<div class="control-group">
				<label class="control-label"><?php echo __('Article Title'); ?><span
					style="color: red;">*</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('article_title',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
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
					<?php echo $this->Form->input('user_id') ?> 
				</div>
			</div>



			<div class="control-group">
				<label class="control-label"><?php echo __('Redacteur secondaire'); ?><span
					style="color: red;">*</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('redacteur',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>




			<div class="control-group">
				<label class="control-label"><?php echo __('Source link'); ?><span
					style="color: red;">*</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('source',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>



			<div class="control-group">
				<label class="control-label"><?php echo __('Category'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('category_id',array('div' => false,'label'=>false,'error'=>false)); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label"><?php echo __('Article type'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('article_type_id',array('div' => false,'label'=>false,'error'=>false)); ?>
				</div>
			</div>



			<div class="control-group">
				<label class="control-label"><?php echo __('Date'); ?>
				</label>
				<div class="controls">
		        <?php echo $this->Form->input('created',array('label'=>"Date de publication",'dateFormat' => 'DMY','timeFormat' => 24)); ?>
				</div>
			</div>


			<div class="control-group">
				<label class="control-label"><?php echo __('live'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('live',array('label'=>"live ?",'type'=>'checkbox')); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label"><?php echo __('Article en top'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('thumb_top',array('label'=>"Article en top ?",'type'=>'checkbox')); ?>
				</div>
			</div>


			<div class="control-group">
				<label class="control-label"><?php echo __("Article Thumb 3 "); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('thumb_three',array('label'=>"Article Thumb 3 ?",'type'=>'checkbox')); ?>
				</div>
			</div>


			<div class="control-group">
				<label class="control-label"><?php echo __('online'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('online',array('label'=>"online ?",'type'=>'checkbox')); ?>
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
					value="<?php echo __('Save Article'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="cancel_edit();" />
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>







<?php  echo $this->Html->script('/tinymce/tinymce.min'); ?>

<script type="text/javascript">

tinymce.init({
    selector: "textarea",theme: "modern",width: 1150,height: 500,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "code table contextmenu directionality emoticons textcolor responsivefilemanager"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,


	extended_valid_elements: 'poll[poll-id|defer|language|src|type]',
	custom_elements: "*[*]",
	valid_elements: "*[*]",




   external_filemanager_path:"/filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
 });
</script>




			<div class="vide"></div>
