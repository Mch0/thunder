<style>
<!--
.form-horizontal .control-label {
	padding-top: 0px;
}
-->
</style>
<div class="container">
	<h2>
		<?php echo __('Webtv Manager : (view)'); ?>
	</h2>
	
	
	

	<div class="row-fluid show-grid" id="tab_user_manager">
		<div class="span12">
			<ul class="nav nav-tabs">
				<?php if ($this->Acl->check('Categories','index','Webtv') == true){?>
					<li><?php echo $this->Html->link(__('Progammes'), array('plugin' => 'webtv','controller' => 'categories','action' => 'index')); ?></li>
				<?php } ?>
				<?php if ($this->Acl->check('Articles','index','Webtv') == true){?>
					<li class="active"><?php echo $this->Html->link(__('WebTV'), array('plugin' => 'webtv','controller' => 'articles','action' => 'index')); ?></li>
				<?php }?>
			</ul>
		</div>
	</div>

	


	<div class="row-fluid show-grid">
		<div class="span12">
			<form class="form-horizontal">
				

				<div class="control-group">
					<label class="control-label"><?php echo __('WebTV Title'); ?>
					</label>
					<div class="controls">
						<?php echo h($webtv['Webtv']['webtv_title']); ?>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label"><?php echo __('WebTV Content'); ?>
					</label>
					<div class="controls">
						<?php echo $webtv['Webtv']['webtv_content']; ?>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label"><?php echo __('WebTV Video'); ?>
					</label>
					<div class="controls">
						<?php echo $webtv['Webtv']['iframe_video']; ?>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label"><?php echo __('WebTV chat'); ?>
					</label>
					<div class="controls">
						<?php echo $webtv['Webtv']['iframe_chat']; ?>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label"><?php echo __('banniere'); ?>
					</label>
					<div class="controls">
						<?php echo $webtv['Event_type']['name']; ?>
					</div>
				</div>



				<div class="form-actions">
					<?php echo $this->Acl->link(__('Edit'), array('action' => 'admin_edit', $webtv['Webtv']['id']),array('class'=>'btn  btn-primary')); ?>
					<a class="btn " onclick="cancel_add();"><?php echo __('Cancel'); ?>
					</a>
				</div>
			</form>
		</div>
	</div>




</div>
<script>
	function cancel_add() {
		window.location = '<?php echo Router::url(array('plugin' => 'webtv','controller' => 'webtvs','action' => 'index')); ?>';
	}
</script>
