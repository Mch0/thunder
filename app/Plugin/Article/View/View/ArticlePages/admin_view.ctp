<div id="article">
<?php 
$this->html->meta ('description', 'ThunderBot c\'est l\'actualité, la web TV, les guides et l\'expertise des progamers sur League of Legends et bien d\'autres jeux.', array('inline' =>false));
?>
<div class="row-fluid show-grid">
	<div class="span8">
		<div class="posts .span8">
			<div class="article">
<?php
	$title = h($article['Article']['article_title']);
	if(substr($title, 0, 2) == '§')
		$title = substr($title, 2);
?>
					<h1><?php echo $title; ?></h1>

				<div class="meta">
					<span class="video_meta"><i class="icon-calendar  icon-white"></i> <?php echo $this->frenchDate->french($article['Article']['created']); ?></span>
					<span class="video_meta"><i class="icon-tag  icon-white"></i> <?php echo h($article['Article']['redacteur']); ?></span>
				</div>





			<div class="articlecontent">
					<?php echo $this->Html->image('/files/article/photo/'.($article['Article']['photo_dir'].'/'.$article['Article']['photo']), array('class' => 'thumb_blog')); ?>
					<p class="content" ><?php echo h($article['Article']['article_summary']); ?><p>
			</div>
			</div>

				<div class="article">
					<div class="article_view">
						<?php echo $article['Article']['article_content']; ?>
					</div>




						<h2 class="comment">Commentaires<span class="article_index_comment"><i class="icon-comment  icon-white"></i> <?php echo h($article['Article']['comment_count']); ?></span></h2>
					 <div class="comment">
				 		<hr></hr>



 	

	<table class="table table-bordered table-hover list table-condensed table-striped">
	    <thead>
		<tr>
			<th>ID</th>
		    <th>Nom</th>
		    <th>ip</th>
		    <th>Email</th>
		    <th>Message</th>
		    <th>action</th>

		</tr>
	    </thead>
	    <tbody>



	    	<?php foreach ( $comments as $comment ): ?>
		    	<?= $this->Form->create('Comment'); ?>
		    	<tr>
		    		<td><?= $comment['Comment']['id']; ?></td>
		    		<td><?= h($comment['Comment']['username']); ?></td>
		    		<td><?= h($comment['Comment']['ip']); ?></td>
		    		<td><a href="mailto:<?= $comment['Comment']['mail']; ?>"><?= $comment['Comment']['mail']; ?></a></td>
		    		<td>
    				<?= $this->Form->input('content',array('label'=>false, 'value' => $comment['Comment']['content'])); ?>
    				<?= $this->Form->input('id'); ?>
		    		</td>
		    		<td>
					<?php echo $this->html->link(__('Edit'), array('controller'=>'comments','action'=>'admin_edit' ,'plugin' => 'comment',  $comment['Comment']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
						<?php echo $this->Form->checkbox('cid.', array('hiddenField' => false, 'value'=>$comment['Comment']['id'])); ?>
		    		</td>
		    	</tr>
		    	<?= $this->Form->end(); ?>
	    	<?php endforeach ?>

	<?php echo $this->html->link(__('Delete all'), array('controller'=>'comments','action'=>'admin_delete' ,'plugin' => 'comment', $comment['Comment']['cid']),null,'Voulez vous vraiment supprimer ce commentaire ?'); ?>


	    </tbody>
	</table>





					</div>
				</div>
			</div>





			</div>
	<div class="span4">
		<div class="sidebar .span4">
			<h2>IL est de retour</h2>
			<iframe frameborder="0" width="400" height="225" src="http://www.dailymotion.com/embed/video/x11br96?autoPlay=1&autoMute=1"></iframe>
		</div>
	</div>


	<div class="span4">
		<div class="sidebar .span4">
			<h2>Videos</h2>
			<?php echo $this->element('sidebar'); ?>
		</div>
	</div>
		</div>
	</div>