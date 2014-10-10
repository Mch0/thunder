<?php
$this->Paginator->options(array('url' => $passArg));
?>
<div class="container">
	<h2>
		<?php echo __('Article Manager: Categories'); ?>
	</h2>
	<div class="row-fluid show-grid" id="tab_user_manager">
		<div class="span12">
			<ul class="nav nav-tabs">
				<?php if ($this->Acl->check('Categories','admin_index','Article') == true){?>
					<li class="active"><?php echo $this->Html->link(__('Category'), array('plugin' => 'article','controller' => 'categories','action' => 'admin_index')); ?></li>
				<?php } ?>
				<?php if ($this->Acl->check('Articles','admin_index','Article') == true){?>
					<li><?php echo $this->Html->link(__('Article'), array('plugin' => 'article','controller' => 'articles','action' => 'admin_index')); ?></li>
				<?php }?>
			</ul>
		</div>
	</div>
	<div class="row-fluid show-grid">
		<?php if ($this->Acl->check('Categories','admin_add','Article') == true){?>
		<div class="span12" style="text-align: right;">
			<button class="btn btn-success" type="button"
				onclick="showAddCategoryPage();">
				<i class="icon-plus icon-white"></i>
				<?php echo __('Category'); ?>
			</button>
		</div>
		<?php }?>
	</div>
	<?php echo $this->Form->create('Category', array('action' => 'index','class'=>' form-signin form-horizontal')); ?>
	<div class="row-fluid show-grid">
		<div class="span12">
			<div class="input-append">
				<?php echo $this->Form->input('filter',array('div' => false,'label'=>false,'placeholder'=>"Search Category",'class'=>'input-xlarge')); ?>
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
						<th style="text-align: center; width: 30px;"><?php echo $this->Paginator->sort('id'); ?>
						</th>
						<th style="text-align: center;"><?php echo $this->Paginator->sort('category_name'); ?>
						</th>
						<th style="text-align: center; width: 150px;"><?php echo $this->Paginator->sort('created'); ?>
						</th>
						<?php if ($this->Acl->check('Categories','admin_view','Article') == true || $this->Acl->check('Categories','admin_edit','Article') == true || $this->Acl->check('Categories','admin_delete','Article') == true){?>
						<th style="text-align: center; width: 150px;"><?php echo __('Actions'); ?>
						</th>
						<?php } ?>
					</tr>
				</thead>
				<?php
	foreach ($categories as $category): ?>
				<tr>
					<td style="text-align: center;"><?php echo h($category['Category']['id']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['category_name']); ?>&nbsp;<?php echo $this->Acl->link(__('edit img'), array('action' => 'admin_edit_image', $category['Category']['id']),array('class'=>'btn btn-mini btn-primary')); ?></td>
					<td style="text-align: center;"><?php echo h($category['Category']['created']); ?>&nbsp;</td>
					<?php if ($this->Acl->check('Categories','admin_view','Article') == true || $this->Acl->check('Categories','admin_edit','Article') == true || $this->Acl->check('Categories','admin_delete','Article') == true){?>
					<td style="text-align: center;">
						<?php echo $this->Acl->link(__('View'), array('action' => 'admin_view', $category['Category']['id']),array('class'=>'btn btn-mini')); ?>
						<?php echo $this->Acl->link(__('Edit'), array('action' => 'admin_edit', $category['Category']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
						<?php echo $this->Acl->link("Delete",array('action'=>'admin_delete',$category['Category']['id']),null,'Voulez vous vraiment supprimer cette category ?'); ?>
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
	window.location = '<?php echo Router::url(array('plugin' => 'article','controller' => 'categories','action' => 'admin_index')); ?>';
}

function showAddCategoryPage() {
	window.location = "<?php echo Router::url(array('plugin' => 'article','controller' => 'categories','action' => 'admin_add')); ?>";
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
