
<div id="single_video">
<?php 
$this->html->meta ('description', 'ThunderBot WebTV - Admirez le skill ! ThunderBot TV c\'est les meilleurs joueurs League of Legends, Chaîne sur laquelle vous pouvez retrouver les meilleurs joueurs français en activité sur League of Legends ainsi que John \'HyrqBot\' Velly.', array('inline' =>false));
?>
<?php $this->set('title_for_layout', $video['Video']['video_title']) ?>






<div class="row-fluid show-grid">
	<div class="span8">
		<div class="video_view .span8">
			<h1><?php echo h($video['Video']['video_title']); ?> 
			</h1>
			<span class="video_meta"><i class="icon-calendar  icon-white"></i> <?php echo $this->frenchDate->french($video['Video']['created']); ?></span>
			<span class="video_meta"><i class="icon-tag  icon-white"></i> <?php echo h($video['VideoType']['name']); ?></span>

			<div class="iframe_video">
			<?php echo $video['Video']['iframe_video']; ?>
			</div>
			<div class="video_content">
			<?php echo h($video['Video']['video_content']); ?>
			</div>
		</div>
	</div>
	<?php echo $this->element('aside'); //sidebar ?>
		
</div>

				<div class="video_comment">
					<h2 class="comment_video">Commentaires<span class="article_index_comment"><i class="icon-comment  icon-white"></i> <?php echo h($video['Video']['comment_count']); ?></span></h2>
					        <?php foreach ($comments as $k => $comment): ?>
                <?php if (
                    $this->Session->read('Auth.User.id') == $comment['Comment']['user_id'] 
                ): ?>
                    <p>
	<?php echo $this->html->link(__('Edit'), array('controller' => 'comments', 'action' => 'edit','plugin' => 'comment', $comment['Comment']['id']),array('class'=>'btn_edit')); ?>
	<?php echo $this->html->link(__('Delete'), array('controller' => 'comments', 'action' => 'delete','plugin' => 'comment', $comment['Comment']['id']),array('class'=>'btn_delete'),null,'Voulez vous vraiment supprimer cette Article ?'); ?>
                    </p>
                <?php endif ?>
	        			<div class="video_view_comment">
					        <div class="row-fluid show-grid">

					            <div class="span2">
									<?php echo $this->Html->image("/files/robotthunderbot.jpg", array(
									    "alt" => "thunderbot",
									)); ?>
					            </div>
					            <div class="span10">
					  				<div class="video_comment_content">
					                <div class="comment_username"> <?= h($comment['User']['user_name']); ?></div> 
					            	<b> <?= $this->Time->timeAgoInWords($comment['Comment']['created']); ?></b> 
									<p><?= nl2br(h($comment['Comment']['content'])); ?></p>
					 				</div>     
					            </div>
					        </div>
						</div>
					        <?php endforeach; ?>
							<?php if ($this->Session->read('Auth.User.id')): ?>
							<?= $this->Comment->form('Video', $video['Video']['id']); ?>
							<?php endif; ?>
				</div>
</div>