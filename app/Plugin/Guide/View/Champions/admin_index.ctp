<div class="container">

	<a target="_blank" class="btn btn-info" href="http://www.thunderbot.gg/redacteur.html">TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!</a>
	<h2>
		<?php echo __('Champions Manager'); ?>
	</h2>

	<!-- add guide button -->
	<div class="row-fluid show-grid">
		<?php if ($this->Acl->check('Champions','admin_add','Guide') == true){?>
		<div class="span12" style="text-align: right;">
			<button class="btn btn-success" type="button"
			        onclick="showAddChampionPage();">
				<i class="icon-plus icon-white"></i>
				<?php echo __('Champion'); ?>
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
					<th>Champion</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach($champions as $champion) { ?>
				<tr>
					<td><?= $champion['Champion']['id'] ?></td>
					<td><?= $champion['Champion']['name'] ?></td>
					<td style="text-align: center;">
						<?php echo $this->Acl->link(__('Voir'), array('controller' => 'champions' ,'action' => 'admin_view', $champion['Champion']['id']),array('class'=>'btn btn-mini')); ?>
						<?php echo $this->Acl->link(__('Editer'), array('controller' => 'champions' ,'action' => 'admin_edit', $champion['Champion']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
						<?php echo $this->Acl->link(__('Supprimer'), array('controller' => 'champions' ,'action' => 'admin_delete', $champion['Champion']['id']),array('class'=>'btn btn-mini btn-danger'),null,'Voulez vous vraiment supprimer cette Article ?'); ?>
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
	function showAddChampionPage() {
		window.location = "<?php echo Router::url(array('plugin' => 'guide','controller' => 'champions','action' => 'admin_add')); ?>";
	}
</script>