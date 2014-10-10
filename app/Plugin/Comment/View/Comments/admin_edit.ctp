<div class="container">
	<div class="row-fluid show-grid">

<div id="comment">
	<?= $this->Form->create('Comment'); ?>
		<?= $this->Form->input('id', array('label' => 'Votre message', 'type' => 'hidden')); ?>
		<?= $this->Form->input('ref', array('label' => 'Votre message', 'type' => 'hidden')); ?>
		<?= $this->Form->input('ref_id', array('label' => 'Votre message', 'type' => 'hidden')); ?>
		<?= $this->Form->input('user_id', array('label' => 'Votre message', 'type' => 'hidden')); ?>
		<?= $this->Form->input('parent_id', array('label' => 'Votre message', 'type' => 'hidden')); ?>
		<?= $this->Form->input('rght', array('label' => 'Votre message', 'type' => 'hidden')); ?>
		<?= $this->Form->input('lft', array('label' => 'Votre message', 'type' => 'hidden')); ?>
		<?= $this->Form->input('spam', array('label' => 'Votre message', 'type' => 'hidden')); ?>
		<?= $this->Form->input('deleted_time', array('label' => 'Votre message', 'type' => 'hidden')); ?>
		<?= $this->Form->input('mail', array('label' => 'Votre message', 'type' => 'hidden')); ?>
		<?= $this->Form->input('created', array('label' => 'Votre message', 'type' => 'hidden')); ?>
		<?= $this->Form->input('username', array('label' => 'username', 'type' => 'hidden')); ?>
		<?= $this->Form->input('content', array('label' => 'Votre message', 'type' => 'textarea')); ?>
	<?= $this->Form->end('Editer comment'); ?>
</div>
</div>
</div>

	

