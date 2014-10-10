<div class="container">
	<h2>
		<?php echo __('Image validate et online'); ?>
	</h2>
	
<div class="galerie_sidebar">
<span class="float"> <?php echo $this->Html->link("Img validé",array('action'=>'admin_index'),array('class'=>'btn btn-small btn-primary')); ?> </span>
</div>

	<div class="row-fluid show-grid">
		<div class="span12">




			<table class="table table-bordered table-hover list table-condensed table-striped">
				<thead>
					<tr>
						<th style="width: 30px;">ID
						</th>

						<th style="text-align: center; width:230px;">name
						</th>

						<th style="text-align: center; width:230px;">slug
						</th>

						<th style="text-align: center; width:230px;">user
						</th>


						<th style="text-align: center; width:230px;">Img
						</th>


						<th style="text-align: center;">Online
						</th>

						<th style="text-align: center;">Validate
						</th>

						<th style="text-align: center;">Action
						</th>

					</tr>
				</thead>


				  <?php foreach ($images as $image): ?>
				<tr>
					<td style="text-align: center;"><?php echo h($image['Image']['id']); ?>
					</td>

					<td style="text-align: center;"><?php echo h($image['Image']['title']); ?>&nbsp;
					</td>

					<td style="text-align: center;"><?php echo $image['Image']['slug']; ?>&nbsp;
					</td>

					<td style="text-align: center;"><?php echo $image['User']['user_name']; ?>&nbsp;
					</td>

					<td style="text-align: center;"> <img class="image_index_full" src="http://www.thunderbot.gg/thumb.php?src=<?php echo $this->Html->url($image['Image']['image']); ?>&w=460&zc=1" alt="">
					</td>

					<td><?php echo h($image['Image']['online'])=='0'?'<span class="label important">Hors ligne</span>':'<span class="label success">En ligne</span>'; ?></td>
					<td><?php echo h($image['Image']['validate'])=='0'?'<span class="label important">Hors ligne</span>':'<span class="label success">En ligne</span>'; ?></td>



					<?php if ($this->Acl->check('Videos','admin_view','Video') == true || $this->Acl->check('Videos','admin_edit','Video') == true || $this->Acl->check('Videos','admin_delete','Video') == true){ ?>
					<td style="text-align: center;">
						<?php echo $this->Acl->link(__('Voir'), array('action' => 'admin_view', $image['Image']['id']),array('class'=>'btn btn-mini')); ?>
						<?php echo $this->Acl->link(__('editer'), array('action' => 'admin_edit', $image['Image']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
						<?php echo $this->Acl->link("Effacer",array('action'=>'admin_delete',$image['Image']['id']),array('class'=>'btn btn-mini btn-danger'),null,'Voulez vous vraiment supprimer cette video ?'); ?>
					</td>
					<?php } ?>

				</tr>
				<?php endforeach; ?>
			</table>
			


		</div>
	</div>






</div>







