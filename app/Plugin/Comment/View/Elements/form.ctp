
 <?php echo $this->Form->create('Comment' , array('id' => 'commentForm', 'url' => array('controller' => 'comments', 'action' => 'add', 'plugin' => 'comment')), array(  
   'class' => 'form-horizontal',  
   'inputDefaults' => array(  
     'format' => array('before', 'label', 'between', 'input', 'error', 'after'),  
     'div' => array('class' => 'control-group'),  
     'label' => array('class' => 'control-label'),  
     'between' => '<div class="controls">',  
     'after' => '</div>',  
     'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),  
   )));?>  
 <fieldset>  
	<?= $this->Session->flash('commentForm'); ?>
	<?php if (!$this->Session->read('Auth.'.Configure::read('Plugin.Comment.user.model').'.id')): ?>
		<?= $this->Form->input('username',array('label'=>__('Pseudo'))); ?>
		<?= $this->Form->input('mail',array('label'=>__('Email'),'placeholder' => 'user@domain.com', 'div' => array('class' => 'input text mail'))); ?>
	<?php endif ?>
	<?= $this->Form->input('ref',array('type' => 'hidden', 'value' => $ref)); ?>
	<?= $this->Form->input('ref_id',array('type' => 'hidden', 'value' => $ref_id)); ?>
	<?= $this->Form->unlockField('Comment.parent_id'); ?>
	<?= $this->Form->input('parent_id',array('type' => 'hidden', 'default' => 0)); ?>

 <?php echo $this->Form->input('content', array(  
   'label' => array('class' => 'control-label','text'=>''),'placeholder' => '  Partage tes pensés !','rows' => '3'
   )); ?>
 </fieldset>   
<?php echo $this->Form->end(array(
    'label' => 'Envoyer',
    'class' => 'btn btn-thunder2',
    'div' => array(
        'class' => 'control-group',
        ),
    'before' => '<div class="controls">',
    'after' => '</div>'
));?>






