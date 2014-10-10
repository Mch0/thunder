<div class="container">
	<div class="row-fluid show-grid">
		<div class="span12">
<h1> <?php echo $this->Html->image('/CoreAdmin/img/comment.png'); ?> Commentaires</h1>



			<div class="pagination">
				<ul>
					<?php
					echo $this->Paginator->prev('&larr; ' . __('previous'),array('tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag'=>'li'));
					echo $this->Paginator->next(__('next') . ' &rarr;', array('tag' => 'li','escape' => false));
					?>
				</ul>
			</div>



<div class="bloc">
    <div class="content">

	<table class="table table-bordered table-hover list table-condensed table-striped">
	    <thead>
		<tr>
			<th>ID</th>
		    <th>Nom</th>
		    <th>Email</th>
		    <th>Message</th>
		</tr>
	    </thead>
	    <tbody>
	    	<?php foreach ( $comments as $comment ): ?>

		    	<tr>
		    		<td><?= $comment['Comment']['id']; ?>			<?php echo $this->Html->link("delete",array('controller'=>'comments','action'=>'admin_delete' ,'plugin' => 'comment',  $comment['Comment']['id']),array('class'=>'btn btn-mini btn-danger'),null,'Voulez vous vraiment supprimer cette page ?'); ?></td>
		    		<td><?= h($comment['Comment']['username']); ?></td>
		    		<td><a href="mailto:<?= $comment['Comment']['mail']; ?>"><?= $comment['Comment']['mail']; ?></a></td>
		    		<td>
		    				<?= h($comment['Comment']['content']); ?>
		    		</td>
		    		<td>

					<?php echo $this->html->link(__('Edit'), array('controller'=>'comments','action'=>'admin_edit' ,'plugin' => 'comment',  $comment['Comment']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
		    		
		    		</td>

		    	</tr>
		    	<?= $this->Form->end(); ?>
	    	<?php endforeach ?>
	    </tbody>
	</table>

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
</div>
</div>

