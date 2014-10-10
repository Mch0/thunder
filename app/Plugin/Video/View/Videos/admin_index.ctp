<div class="container">
	<h2>
		<?php echo __('Video Manager'); ?>
	</h2>
	


	<div class="row-fluid show-grid">
		<?php if ($this->Acl->check('Videos','admin_add','Video') == true){?>
		<div class="span12" style="text-align: right;">
			<?php echo $this->Html->link("Ajouter une Video",array('action'=>'admin_add'),array('class'=>'btn btn-success')); ?>
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




			<table class="table table-bordered table-hover list table-condensed table-striped">
				<thead>
					<tr>
						<th style="width: 30px;"><?php echo $this->Paginator->sort('id','ID'); ?>
						</th>

						<th style="text-align: center; width:230px;"><?php echo $this->Paginator->sort('video_title','Video Title'); ?>
						</th>

						<th style="text-align: center; width:80px;"><?php echo $this->Paginator->sort('created','nb_acces'); ?>
						</th>


						<th style="text-align: center;"><?php echo $this->Paginator->sort('event_type_id','Streamer'); ?>
						</th>

						<th style="text-align: center;"><?php echo $this->Paginator->sort('category_name','Categorie'); ?>
						</th>
						
						<th style="text-align: center;"><?php echo $this->Paginator->sort('video_type_id','type'); ?>
						</th>


						<th style="text-align: center;"><?php echo $this->Paginator->sort('online','Online'); ?>
						</th>


						<?php if ($this->Acl->check('Videos','admin_moveup','Video') == true || $this->Acl->check('Videos','admin_edit','Video') == true || $this->Acl->check('Videos','admin_edit_image','Video') == true || $this->Acl->check('Videos','admin_edit_streamer','Video') == true || $this->Acl->check('Videos','admin_movedown','Video') == true || $this->Acl->check('Videos','admin_edit','Video') == true || $this->Acl->check('Videos','admin_delete','Video') == true){?>
						<th style="text-align: center; width: 130px;"><?php echo __('Actions'); ?>
						</th>
						<?php } ?>
					</tr>
				</thead>



				<?php foreach ($videos as $video): ?>
				<tr>
					<td style="text-align: center;"><?php echo h($video['Video']['id']); ?>&nbsp;<?php echo $this->Acl->link(__('img'), array('action' => 'admin_edit_image', $video['Video']['id']),array('class'=>'btn btn-mini btn-primary')); ?></td>
					<td style="text-align: center;"><?php echo h($video['Video']['video_title']); ?>&nbsp;
					</td>
					<td style="text-align: center;"><?php echo h($video['Video']['nb_acces']); ?>&nbsp;
					</td>
					<td style="text-align: center;"><?php echo h($video['EventType']['name']); ?>
						<?php echo $this->Acl->link(__('Relier Streamer'), array('action' => 'admin_edit_streamer', $video['Video']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
					</td>
					<td style="text-align: center;"><?php echo h($video['Category']['category_name']); ?></td>
					<td style="text-align: center;"><?php echo h($video['VideoType']['name']); ?>&nbsp;</td>
					<td><?php echo h($video['Video']['online'])=='0'?'<span class="label important">Hors ligne</span>':'<span class="label success">En ligne</span>'; ?></td>

					<?php if ($this->Acl->check('Videos','admin_view','Video') == true || $this->Acl->check('Videos','admin_edit','Video') == true || $this->Acl->check('Videos','admin_delete','Video') == true){ ?>
			

					<td style="text-align: center;">
						<?php echo $this->Acl->link(__('View'), array('action' => 'admin_view', $video['Video']['id']),array('class'=>'btn btn-mini')); ?>
						<?php echo $this->Acl->link(__('edit'), array('action' => 'admin_edit', $video['Video']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
						<?php echo $this->Acl->link("Delete",array('action'=>'admin_delete',$video['Video']['id']),array('class'=>'btn btn-mini btn-danger'),null,'Voulez vous vraiment supprimer cette video ?'); ?>


						<?php echo $this->Acl->link(__('<i class="icon-arrow-up"></i> Moveup'), array('action' => 'admin_movedown', $video['Video']['id']),array('escape'=>false)); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo $this->Acl->link(__('<i class="icon-arrow-down"></i> Movedown'), array('action' => 'admin_moveup', $video['Video']['id']),array('escape'=>false)); ?>
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
