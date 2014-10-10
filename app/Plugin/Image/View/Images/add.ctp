
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
  <div class="row">
	<div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
     
      <div class="list-group panel panel-primary">
       <div id="gallery_block"> 
              <h1> <?php echo __('Ajouter une images'); ?></h1>
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
 <div class="min_height">


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



		<div class="control-group">
			<span style="color: red;"><?php echo __('Image, jpg ou png, 1.80 mo max :'); ?></span>
			<div class="controls">
			<?php echo $this->Form->input('image_file', array('type' => 'file', 'label'=>false));; ?>
			</div>
		</div>

			<?php echo $this->Form->input('title'); ?>

			Contenu
			 <?php echo $this->Form->input('galerie_content', array(  
			   'label' => array('class' => 'control-label','text'=>'')  
			   )); ?>  
			<?php echo $this->Form->input('online',array('label'=>"Envoyer a la validation ?",'type'=>'checkbox')); ?>



			<div class="form-actions">
				<input type="submit" class="btn btn-thunder2"
					value="<?php echo __('Envoyer'); ?>" />
			</div>

			<?php echo $this->Form->end(); ?>



</div>

                  </div>
                </div>
              </div>
            </div>
        </div> 
        </div> 
      </div>

		</div>
	</div>
</div>







