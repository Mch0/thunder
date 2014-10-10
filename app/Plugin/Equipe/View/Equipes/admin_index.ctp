<div class="container">
	<h2>
		<?php echo __('Equipe Manager'); ?>
	</h2>
	


	<div class="row-fluid show-grid">
		<?php if ($this->Acl->check('Equipes','admin_add','Equipe') == true){?>
		<div class="span12" style="text-align: right;">

		</div>
		<?php }?>
	</div>
			<?php echo $this->Html->link("Voir l'equipe",array('action'=>'index'),array('class'=>'btn btn-danger')); ?>
			<?php echo $this->Html->link("Ajouter une Equipe",array('action'=>'admin_add'),array('class'=>'btn btn-success')); ?>
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




			<table class="table table-bordered table-hover list table-condensed table-striped">
				<thead>
					<tr>
						<th style="width: 30px;"><?php echo $this->Paginator->sort('id','ID'); ?>
						</th>

						<th style="text-align: center; width:230px;"><?php echo $this->Paginator->sort('name','Joueur name'); ?>
						</th>

						


						<th style="text-align: center; width: 130px;"><?php echo __('Actions'); ?>
						</th>
					</tr>
				</thead>

				<?php foreach ($equipes as $equipe): ?>
				<tr>
					<td style="text-align: center;"><?php echo h($equipe['Equipe']['id']); ?>&nbsp;<?php echo $this->Acl->link(__('img'), array('action' => 'admin_edit_image', $equipe['Equipe']['id']),array('class'=>'btn btn-mini btn-primary')); ?></td>


					<td style="text-align: center;"><?php echo h($equipe['Equipe']['name']); ?>&nbsp;</td>

		
					<td style="text-align: center;">
						<?php echo $this->Acl->link(__('edit'), array('action' => 'admin_edit', $equipe['Equipe']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
						<?php echo $this->Acl->link("Delete",array('action'=>'admin_delete',$equipe['Equipe']['id']),array('class'=>'btn btn-mini btn-danger'),null,'Voulez vous vraiment supprimer cette equipe ?'); ?>
					</td>
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
