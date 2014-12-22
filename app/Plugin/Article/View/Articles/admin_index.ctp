<div class="container">
			<a target="_blank" class="btn btn-info" href="http://www.thunderbot.gg/redacteur.html">TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!TEMPLETE HTML/CSS!!</a>
	<h2>
		<?php echo __('Article Manager'); ?>
	</h2>
	<!-- nav tabs -->
	<div class="row-fluid show-grid" id="tab_user_manager">
		<div class="span12">
			<ul class="nav nav-tabs">
				<?php if ($this->Acl->check('Categories','admin_index','Article') == true){?>
					<li><?php echo $this->Html->link(__('Category'), array('plugin' => 'article','controller' => 'categories','action' => 'admin_index')); ?></li>
				<?php } ?>
				<?php if ($this->Acl->check('Articles','admin_index','Article') == true){?>
					<li class="active"><?php echo $this->Html->link(__('Article'), array('plugin' => 'article','controller' => 'articles','action' => 'admin_index')); ?></li>
				<?php }?>
			</ul>
		</div>
	</div>
	<!-- /nav tabs -->
	<!-- add article button -->
	<div class="row-fluid show-grid">
		<?php if ($this->Acl->check('Articles','admin_add','Article') == true){?>
		<div class="span12" style="text-align: right;">
			<button class="btn btn-success" type="button"
				onclick="showAddArticlePage();">
				<i class="icon-plus icon-white"></i>
				<?php echo __('Article'); ?>
			</button>
		</div>
		<?php }?>
	</div>
	<!-- /add article button -->

	<!-- filter form article -->
	<?php echo $this->Form->create('Article', array('action' => 'admin_index','class'=>' form-signin form-horizontal')); ?>
	<div class="row-fluid show-grid">
		<div class="span12">
			<div class="input-append">
				<?php echo $this->Form->input('filter',array('div' => false,'label'=>false,'placeholder'=>"Search Article title",'class'=>'input-xlarge')); ?>
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
	<!-- /filter form article -->

	<!-- comment button -->
	<?php echo $this->Html->link(__('COMMENT'), array('plugin' => 'comment','controller' => 'comments','action' => 'admin_index'),array('class'=>'btn btn-info')); ?>
	<!-- /comment button -->

	<!-- liste article -->
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
						<th style="width: 40px;"><?php echo $this->Paginator->sort('id','ID'); ?>
						</th>
						<th style="text-align: center; width:230px;"><?php echo $this->Paginator->sort('article_title','Article Title'); ?>
						</th>


						<th style="text-align: center; width:80px;"><?php echo $this->Paginator->sort('created','comment'); ?>
						</th>
	

						<th style="text-align: center; width:80px;"><?php echo $this->Paginator->sort('nb_acces','nb_acces'); ?>
						</th>


						<th style="text-align: center;"><?php echo $this->Paginator->sort('category_name','Category'); ?>
						</th>
						<th style="text-align: center; width:80px;"><?php echo $this->Paginator->sort('created','Date'); ?>
						</th>
						<th style="text-align: center;"><?php echo $this->Paginator->sort('article_summary','Article Summary'); ?>
						</th>



						<th style="text-align: center;"><?php echo $this->Paginator->sort('online','Online'); ?>
						</th>

						<?php if ($this->Acl->check('Articles','admin_moveup','Article') == true ||$this->Acl->check('Articles','admin_movedown','Article') == true || $this->Acl->check('Articles','admin_edit','Article') == true || $this->Acl->check('Articles','admin_delete','Article') == true){?>
						<th style="text-align: center; width: 130px;"><?php echo __('Actions'); ?>
						</th>
						<?php } ?>
					</tr>
				</thead>
				
	<?php foreach ($articles as $article): ?>
				<tr>
					<td><?php echo h($article['Article']['id']); ?>&nbsp;<?php echo $this->Acl->link(__('img'), array('action' => 'admin_edit_image', $article['Article']['id']),array('class'=>'btn btn-mini btn-primary')); ?></td>
					<td><?php echo h($article['Article']['article_title']); ?>
						<?php echo h($article['Article']['thumb_top'])=='1'?'<span class="label important">top</span>':''; ?>
						<?php echo h($article['Article']['thumb_three'])=='1'?'<span class="label success">en top 4</span>':''; ?>
					</td>


					<td>
					<?php echo h($article['Article']['comment_count']); ?>&nbsp;
					</td>

					<td>
					<?php echo h($article['Article']['nb_acces']); ?>&nbsp;
					</td>

					<td style="text-align: center;"><?php echo h($article['Category']['category_name']); ?></td>
					<td><?php echo h($article['Article']['created']); ?>&nbsp;</td>
					<td><?php echo $article['Article']['article_summary']; ?>&nbsp;</td>
					<?php if ($this->Acl->check('Articles','admin_view','Article') == true || $this->Acl->check('Articles','admin_edit','Article') == true || $this->Acl->check('Articles','admin_delete','Article') == true){ ?>
			

					<td>

						<?php echo h($article['Article']['online'])=='0'?'<span class="label important">Hors ligne</span>':'<span class="label success">En ligne</span>'; ?>

					</td>





					<td style="text-align: center;">
						<?php echo $this->Acl->link(__('View'), array('action' => 'admin_view', $article['Article']['id']),array('class'=>'btn btn-mini')); ?>
						<?php echo $this->Acl->link(__('Edit'), array('action' => 'admin_edit', $article['Article']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
						<?php echo $this->Acl->link(__('Delete'), array('action' => 'admin_delete', $article['Article']['id']),array('class'=>'btn btn-mini btn-danger'),null,'Voulez vous vraiment supprimer cette Article ?'); ?>
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
			<!-- paginatnion -->
			<div class="pagination">
				<ul>
					<?php
					echo $this->Paginator->prev('&larr; ' . __('previous'),array('tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag'=>'li'));
					echo $this->Paginator->next(__('next') . ' &rarr;', array('tag' => 'li','escape' => false));
					?>
				</ul>
			</div>
			<!-- /pagination -->
		</div>
	</div>
	<!-- /liste article -->

</div>
<script type="text/javascript">
function cancelSearch(){
	removeUserSearchCookie();
	window.location = '<?php echo Router::url(array('plugin' => 'article','controller' => 'articles','action' => 'index')); ?>';
}
function showAddArticlePage() {
	window.location = "<?php echo Router::url(array('plugin' => 'article','controller' => 'articles','action' => 'admin_add')); ?>";
}
</script>
<!-- TEST -->