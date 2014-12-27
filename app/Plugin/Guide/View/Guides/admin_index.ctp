<div class="container">

	<a target="_blank" class="btn btn-info" href="http://www.thunderbot.gg/redacteur.html">TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!</a>
	<h2>
		<?php echo __('Guide Manager'); ?>
	</h2>

	<!-- add guide button -->
	<div class="row-fluid show-grid">
		<?php if ($this->Acl->check('Guides','admin_add','Guide') == true){?>
		<div class="span12" style="text-align: right;">
			<button class="btn btn-success" type="button"
			        onclick="showAddGuidePage();">
				<i class="icon-plus icon-white"></i>
				<?php echo __('Guide'); ?>
			</button>
		</div>
		<?php }?>
	</div>
	<!-- /add guide button -->
	<!-- liste guide -->
	<div class="row-fluid show-grid">
		<div class="span12">
			<table class="table table-bordered table-hover list table-condensed table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Titre</th>
						<th>Champion</th>
						<th>Poste</th>
						<th>Nb de vue</th>
						<th>Date de création</th>
						<th>Date de modification</th>
						<th>Publié</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($guides as $guide) { ?>
					<tr>
						<td><?= $guide['Guide']['id'] ?></td>
						<td><?= $guide['Guide']['title'] ?></td>
						<td><?= $guide['Champion']['name'] ?></td>
						<td><?= $guide['Role']['role'] ?></td>
						<td><?= $guide['Guide']['nb_acces'] ?></td>
						<td><?= $guide['Guide']['created'] ?></td>
						<td><?= $guide['Guide']['modified'] ?></td>
						<td><?= h($guide['Guide']['online'])=='0'?'<span class="label important">Hors ligne</span>':'<span class="label success">En ligne</span>'; ?></td>
						<td style="text-align: center;">
							<?php echo $this->Acl->link(__('Voir'), array('action' => 'admin_view', $guide['Guide']['id']),array('class'=>'btn btn-mini')); ?>
							<?php echo $this->Acl->link(__('Editer'), array('action' => 'admin_edit', $guide['Guide']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
							<?php echo $this->Acl->link(__('Supprimer'), array('action' => 'admin_delete', $guide['Guide']['id']),array('class'=>'btn btn-mini btn-danger'),null,'Voulez vous vraiment supprimer cette Article ?'); ?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /liste guide -->
</div>
		<script>
			function showAddGuidePage() {
				window.location = "<?php echo Router::url(array('plugin' => 'guide','controller' => 'guides','action' => 'admin_add')); ?>";
			}
		</script>