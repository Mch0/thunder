<div class="container">
	<h2>
		<?php echo __("Edition d'un guide"); ?>
	</h2>
	<?php echo $this->Form->create('Guide'); ?>
	<?php echo $this->Form->input('id',array('div' => false,"type" => "hidden",'label'=>false,'error'=>false)); ?>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->input('title', array("label" => "Titre du guide")); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->input('slug', array("label" => "Slug : ")); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label"><?= __('Role') ?> :</label>
		<div class="controls">
			<?php echo $this->Form->input('role_id' , array(
			'options' => $roles,
			'label' => false)) ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->input('champion_id'); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo $this->Form->input('online',array('label'=>"Publié :",'type'=>'checkbox')); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label"><?php echo __('Contenu du guide'); ?>
		</label>
		<div class="controls">
			<?php echo $this->Form->input('content',array('div' => false,'label'=>false,'error'=>false,'rows' => '15')); ?>
		</div>
	</div>
	<div class="form-actions">
		<input type="submit" class="btn btn-primary"
		       value="<?php echo __('Enregistrer le guide'); ?>" />
		<input type="button" class="btn" value="<?php echo __('Cancel'); ?>" onclick="cancel_edit();" />
	</div>
	<?php echo $this->Form->end(); ?>
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