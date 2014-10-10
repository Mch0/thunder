<div class="container">
	<h2>
		<?php echo __('Event Manager: Event (index)'); ?>
	</h2>
	<div class="row-fluid show-grid" id="tab_user_manager">
		<div class="span12">
			<ul class="nav nav-tabs">

					<li><?php echo $this->Html->link(__('View Calendar'), array('plugin' => 'full_calendar','controller' => 'full_calendar','action' => 'admin_index')); ?></li>

			</ul>
		</div>
	</div>
		<?php echo $this->Html->link(__('New Event', true), array('plugin' => 'full_calendar', 'action' => 'admin_add'),array('class'=>'btn btn-mini btn-primary')); ?>



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
						<th><?php echo $this->Paginator->sort('event_type_id');?></th>
						<th style="width: 30px;"><?php echo $this->Paginator->sort('status','status'); ?></th>
						<th style="width: 30px;"><?php echo $this->Paginator->sort('start','start'); ?></th>
						<th style="width: 30px;"><?php echo $this->Paginator->sort('end','end'); ?></th>
						<th style="text-align: center; width: 130px;"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				
				<?php foreach ($events as $event): ?>
				<tr>
					<th style="width: 30px;"><?php echo $this->Html->link($event['EventType']['name'], array('controller' => 'event_types', 'action' => 'admin_view', $event['EventType']['id'])); ?></td>
					<td><?php echo $event['Event']['status']; ?>&nbsp;</td>
					<td><?php echo $event['Event']['start']; ?>&nbsp;</td>
					<td><?php echo $event['Event']['end']; ?>&nbsp;</td>

					<td style="text-align: center;">
						<?php echo $this->Acl->link(__('View'), array('action' => 'admin_view', $event['Event']['id']),array('class'=>'btn btn-mini')); ?>
						<?php echo $this->Acl->link(__('Edit'), array('action' => 'admin_edit', $event['Event']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
						<?php echo $this->Acl->link(__('delete'), array('action' => 'admin_delete', $event['Event']['id']),array('class'=>'btn btn-mini btn-danger')); ?>

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
function delArticle(article_id, name) {
    $.sModal({
        image: '<?php echo $this->webroot; ?>img/icons/error.png',
        content: '<?php echo __('Are you sure you want to delete'); ?>  <b>' + name + '</b>?',
        animate: '',
        buttons: [{
            text: ' <?php echo __('Delete'); ?> ',
            addClass: 'btn-danger',
            click: function(id, data) {
                $.post('<?php echo Router::url(array('plugin' => 'article','controller' => 'articles','action' => 'delete')); ?>/' + article_id, {}, function(o) {
	                    $('#container').load('<?php echo Router::url(array('plugin' => 'article','controller' => 'articles','action' => 'index')); ?>', function() {
                        $.sModal('close', id);
                        $('#tab_user_manager').find('a').each(function(){
                    		$(this).click(function(){
                    			removeUserSearchCookie();
                    		});
                    	});
                    });
                }, 'json');
            }
        }, {
            text: ' <?php echo __('Cancel'); ?> ',
            click: function(id, data) {
                $.sModal('close', id);
            }
        }]
        });
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
