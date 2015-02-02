<div class="container">
	<h2>
		<?php echo __('WebTV Manager'); ?>
	</h2>
	

	<div class="row-fluid show-grid" id="tab_user_manager">
		<div class="span12">
			<ul class="nav nav-tabs">
				<?php if ($this->Acl->check('Categories','admin_index','Article') == true){?>
					<li><?php echo $this->Html->link(__('Progammes'), array('plugin' => 'article','controller' => 'categories','action' => 'admin_index')); ?></li>
				<?php } ?>
				<?php if ($this->Acl->check('Articles','admin_index','Article') == true){?>
					<li class="active"><?php echo $this->Html->link(__('WebTV'), array('plugin' => 'article','controller' => 'articles','action' => 'admin_index')); ?></li>
				<?php }?>
			</ul>
		</div>
	</div>




	<div class="row-fluid show-grid">
		<?php if ($this->Acl->check('Webtvs','admin_add','Webtv') == true){?>
		<div class="span12" style="text-align: right;">
			<?php echo $this->Html->link("Ajouter une WebTV",array('action'=>'admin_add'),array('class'=>'btn btn-success')); ?>
		</div>
		<?php }?>
	</div>










	<div class="row-fluid show-grid">
		<div class="span12">
		<div class="pagination">
				<ul>
					<?php
					echo $this->Paginator->prev('&larr; ' . __('previous'),array('tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag'=>'li'));
					echo $this->Paginator->next(__('next') . ' &rarr;', array('tag' => 'li','escape' => false));
					?>
				</ul>
		</div>



			<p ><h1 class="alert-danger"> hp = Home Page</h1></p>
			<table class="table table-bordered table-hover list table-condensed table-striped">
				<thead>
					<tr>
						<th style="width: 30px;"><?php echo $this->Paginator->sort('id','ID'); ?>
						</th>

						<th style="text-align: center; width:230px;"><?php echo $this->Paginator->sort('webtv_title','Webtv Title'); ?>
						</th>

						<th style="text-align: center;"><?php echo $this->Paginator->sort('category_name','Categorie'); ?>
						</th>
						
						<th style="text-align: center;"><?php echo $this->Paginator->sort('streamer','Streamer now'); ?>
						</th>

						<th style="text-align: center;"><?php echo $this->Paginator->sort('online','Online'); ?>
						</th>


						<?php if ($this->Acl->check('Webtvs','admin_moveup','Webtv') == true || $this->Acl->check('Webtvs','admin_edit','Webtv') == true || $this->Acl->check('Webtvs','admin_edit_image','Webtv') == true || $this->Acl->check('Webtvs','admin_movedown','Webtv') == true || $this->Acl->check('Webtvs','admin_edit','Webtv') == true || $this->Acl->check('Webtvs','admin_delete','Webtv') == true){?>
						<th style="text-align: center; width: 130px;"><?php echo __('Actions'); ?>
						</th>
						<?php } ?>
					</tr>
				</thead>



				<?php foreach ($webtvs as $webtv): ?>
				<tr>
					<td style="text-align: center;"><?php echo h($webtv['Webtv']['id']); ?>&nbsp;</td>
					<td style="text-align: center;"><?php echo h($webtv['Webtv']['webtv_title']); ?>&nbsp;
						<?php echo $this->Acl->link(__('Edit admin'), array('action' => 'admin_edit', $webtv['Webtv']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
						<?php echo $this->Acl->link(__('Edit img'), array('action' => 'admin_edit_image', $webtv['Webtv']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
					</td>
					<td style="text-align: center;"><?php echo h($webtv['Category']['category_name']); ?></td>
					<td style="text-align: center;"><?php echo h($webtv['EventType']['name']); ?>&nbsp;</td>
					<td><?php echo h($webtv['Webtv']['onlinehp'])=='0'?'<span class="label important">Hors ligne hp</span>':'<span class="label success">En ligne hp</span>'; ?>&nbsp;-&nbsp;<?php echo h($webtv['Webtv']['online'])=='0'?'<span class="label important">Hors ligne</span>':'<span class="label success">En ligne</span>'; ?>&nbsp;-&nbsp;
						<?php echo h($webtv['Webtv']['live'])=='0'?'<span class="label important">OFF</span>':'<span class="label success">LIVE</span>'; ?></td>

					<?php if ($this->Acl->check('Webtvs','admin_view','Webtv') == true || $this->Acl->check('Webtvs','admin_edit','Webtv') == true || $this->Acl->check('Webtvs','edit_admin','Webtv') == true || $this->Acl->check('Webtvs','admin_delete','Webtv') == true){ ?>
			

					<td style="text-align: center;">
						<?php echo $this->Acl->link(__('View'), array('action' => 'admin_view', $webtv['Webtv']['id']),array('class'=>'btn btn-mini')); ?>
						<?php echo $this->Acl->link(__('edit'), array('action' => 'stream_edit', $webtv['Webtv']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
						<?php echo $this->Acl->link("Delete",array('action'=>'admin_delete',$webtv['Webtv']['id']),null,'Voulez vous vraiment supprimer cette webtv ?'); ?>
					</td>
					<?php } ?>
				</tr>
				<?php endforeach; ?>
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
					<?php
					echo $this->Paginator->prev('&larr; ' . __('previous'),array('tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag'=>'li'));
					echo $this->Paginator->next(__('next') . ' &rarr;', array('tag' => 'li','escape' => false));
					?>
				</ul>
			</div>
		</div>
	</div>






</div>




<script type="text/javascript">
function cancelSearch(){
	removeUserSearchCookie();
	window.location = '<?php echo Router::url(array('plugin' => 'Webtv','controller' => 'Webtvs','action' => 'admin_index')); ?>';
}
function showAddArticlePage() {
	window.location = "<?php echo Router::url(array('plugin' => 'Webtv','controller' => 'Webtvs','action' => 'admin_add')); ?>";
}
</script>
