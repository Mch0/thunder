<div class="container">
	<h2>
		<?php echo __('Article (Categories)Types(index)'); ?>
	</h2>

	<div class="row-fluid show-grid">
		<div class="span12" style="text-align: right;">
			<?php echo $this->Html->link("Ajouter un Types Article",array('action'=>'admin_add'),array('class'=>'btn btn-success')); ?>
		</div>
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
						<th style="width: 30px;"><?php echo $this->Paginator->sort('name','Name'); ?>
						</th>
						<th style="text-align: center; width: 130px;"><?php echo __('Actions'); ?>
						</th>
					</tr>
				</thead>

				<?php foreach ($articleTypes as $articleType): ?>
				<tr>
					<td><?php echo $articleType['ArticleType']['name']; ?>&nbsp;</td>
					<td>
						<?php echo $this->html->link(__('View'), array('action' => 'admin_view', $articleType['ArticleType']['id']),array('class'=>'btn btn-mini')); ?>
						<?php echo $this->html->link(__('Edit'), array('action' => 'admin_edit', $articleType['ArticleType']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
						<?php echo $this->html->link(__('delete'), array('action' => 'admin_delete', $articleType['ArticleType']['id']),array('class'=>'btn btn-mini btn-danger')); ?>
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
	window.location = '<?php echo Router::url(array('plugin' => 'article','controller' => 'articles','action' => 'index')); ?>';
}
function showAddArticlePage() {
	window.location = "<?php echo Router::url(array('plugin' => 'article','controller' => 'articles','action' => 'add')); ?>";
}
$(document).ready(function() {
	$('.pagination > ul > li').each(function() {
		if ($(this).children('a').length <= 0) {
			var tmp = $(this).html();
			if ($(this).hasClass('prev')) {
				$(this).addClass('disabled');
			} else if ($(this).hasClass('next')) {
				$(this).addClass('disabled');
			} else {
				$(this).addClass('active');
			}
			$(this).html($('<a></a>').append(tmp));
		}
	});
});
</script>
