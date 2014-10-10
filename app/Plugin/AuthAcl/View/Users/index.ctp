<?php
$this->Paginator->options(array('url' => $passArg));
?>
<div class="container">
	<h2>
		<?php echo __('User Manager: Users'); ?>
	</h2>
	<div class="row-fluid show-grid" id="tab_user_manager">
		<div class="span12">
			<ul class="nav nav-tabs">
				<?php if ($this->Acl->check('Users','index','AuthAcl') == true){?>
					<li class="active"><?php echo $this->Html->link(__('User Manager'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'index')); ?></li>
				<?php } ?>
				<?php if ($this->Acl->check('Groups','index','AuthAcl') == true){?>
					<li><?php echo $this->Html->link(__('Groups'), array('plugin' => 'auth_acl','controller' => 'groups','action' => 'index')); ?></li>
				<?php }?>
				<?php if ($this->Acl->check('Permissions','index','AuthAcl') == true){?>
					<li><?php echo $this->Html->link(__('Permissions'), array('plugin' => 'auth_acl','controller' => 'permissions','action' => 'index')); ?></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<?php echo $this->Form->create('User', array('action' => 'index','class'=>' form-signin form-horizontal')); ?>
	<div class="row-fluid show-grid">
		<div class="span12">
			<div class="input-append">
				<?php echo $this->Form->input('filter',array('div' => false,'label'=>false,'placeholder'=>"Search Users",'class'=>'input-xlarge')); ?>
				<button class="btn" type="submit">
					<?php echo __('Search'); ?>
				</button>
				<button class="btn" type="button" onclick="cancelSearch();">
					<i class="icon-remove-sign"></i>
				</button>
			</div>
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
	<div class="row-fluid show-grid">
		<div class="span12">
			<table class="table table-bordered table-hover list table-condensed table-striped">
				<thead>
					<tr>
						<th style="text-align: center; width: 30px;"><?php echo $this->Paginator->sort('id',__('ID')); ?>
						</th>
						<th style="text-align: center; width: 250px;"><?php echo $this->Paginator->sort('user_email',__('User Email')); ?>
						</th>
						<th style="text-align: center;"><?php echo $this->Paginator->sort('user_name',__('Full Name')); ?>
						</th>
						<th style="text-align: center; width: 150px;">Groups</th>
						<th style="text-align: center; width: 60px;"><?php echo $this->Paginator->sort('user_status',__('Status')); ?>
						</th>
						<th style="text-align: center; width: 150px;"><?php echo $this->Paginator->sort('created',__('Created')); ?>
						</th>
						<?php if ($this->Acl->check('Users','view','AuthAcl') == true || $this->Acl->check('Users','edit','AuthAcl') == true || $this->Acl->check('Users','delete','AuthAcl') == true){?>
						<th style="text-align: center; width: 130px;"><?php echo __('Actions'); ?>
						</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user): ?>
					<tr>
						<td style="text-align: center;"><?php echo h($user['User']['id']); ?>&nbsp;
						</td>
						<td><?php echo h($user['User']['user_email']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['user_name']); ?>&nbsp;</td>
						<td style="text-align: center;"><?php
						$groupNames = array();
						if (!empty($user['Group'])){
									foreach($user['Group'] as $group){
										$groupNames[] = $group['name'];
									}
								}
								echo implode(',',$groupNames);
							 ?>
						</td>
						<td style="text-align: center;">
							<?php if ($this->Acl->check('Users','changeStatus','AuthAcl') == true){?>
								<?php  if ($auth_user['id'] != $user['User']['id']){?> 
									<a href="#" onclick="changeStatus(this,'<?php echo h($user['User']['id']); ?>',0); return false;" id="status_allowed_<?php echo h($user['User']['id']); ?>" <?php if ($user['User']['user_status'] == 0){ ?> style="display: none;" <?php } ?>>
										<img src="<?php echo $this->webroot; ?>img/icons/allowed.png" /> 
									</a>
									<a href="#" onclick="changeStatus(this,'<?php echo h($user['User']['id']); ?>',1); return false;" id="status_denied_<?php echo h($user['User']['id']); ?>" <?php if ($user['User']['user_status'] == 1){ ?> style="display: none;" <?php } ?>>
										<img src="<?php echo $this->webroot; ?>img/icons/denied.png" />
									</a>
								<?php }else{ ?> 
									<img src="<?php echo $this->webroot; ?>img/icons/disabled.png" /> 
								<?php } ?>
							<?php }else{ ?> 
								<a id="status_allowed_<?php echo h($user['User']['id']); ?>" <?php if ($user['User']['user_status'] == 0){ ?> style="display: none;" <?php } ?>>
									<img src="<?php echo $this->webroot; ?>img/icons/disabled.png" /> 
								</a>
								<a id="status_denied_<?php echo h($user['User']['id']); ?>" <?php if ($user['User']['user_status'] == 1){ ?> style="display: none;" <?php } ?>>
									<img	src="<?php echo $this->webroot; ?>img/icons/disabled2.png" /> 
								</a>
							<?php } ?>
						</td>
						<td style="text-align: center;"><?php echo h($user['User']['created']); ?>&nbsp;
						</td>
						<?php if ($this->Acl->check('Users','view','AuthAcl') == true || $this->Acl->check('Users','edit','AuthAcl') == true || $this->Acl->check('Users','delete','AuthAcl') == true){?>
						<td style="text-align: center;">
							<?php echo $this->Acl->link(__('View'), array('action' => 'view', $user['User']['id']),array('class'=>'btn btn-mini')); ?>
							<?php echo $this->Acl->link(__('Edit'), array('action' => 'edit', $user['User']['id']),array('class'=>'btn btn-mini btn-info')); ?>
							<?php echo $this->Acl->link(__('Delete'), array('action' => 'delete', $user['User']['id']),null,'Voulez vous vraiment supprimer cette User ?'); ?>

						</td>
						<?php } ?>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<p>
				<?php

				echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>
			</p>

			<div class="pagination">
				<ul>
					<?php echo $this->Paginator->prev('&larr; ' . __('previous'),
							array('tag' => 'li','escape' => false)); echo
							$this->Paginator->numbers(array('separator' => '','tag'=>'li')); echo
					$this->Paginator->next(__('next') . ' &rarr;', array('tag' => 'li','escape' => false)); ?>
				</ul>
			</div>
		</div>
	</div>

</div>
<script>
	function cancelSearch(){
		removeUserSearchCookie();
		window.location = '<?php echo Router::url(array('plugin' => 'auth_acl','controller' => 'users','action' => 'index')); ?>';
	}
</script>
