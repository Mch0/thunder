


<?php  echo $this->Html->script('/js/tinymce/tinymce.min'); ?>

<script type="text/javascript">
tinymce.init({
 selector: "textarea",
    theme: "modern",
        menubar:false,
    statusbar: false,
    width: 680,
    height: 300,
    subfolder:"",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor"
   ],
   image_advtab: true,
   toolbar: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor |"
 }); 
</script>



<div class="container">
	<h2>
		<?php echo __('Editer une images'); ?>
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
			<?php echo $this->Form->create('Image'); ?>

			<?php echo $this->Form->input('id',array('div' => false,'label'=>false,'error'=>false)); ?>

			<?php echo $this->Form->input('title'); ?>

			<?php echo $this->Form->input('galerie_content'); ?>

			<?php echo $this->Form->input('online',array('label'=>"Envoyer a la validation ?",'type'=>'checkbox')); ?>





			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('Envoyer'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Annuler'); ?>"
					onclick="cancel_edit();" />
			</div>

			<?php echo $this->Form->end(); ?>
		</div>
	</div>


</div>
