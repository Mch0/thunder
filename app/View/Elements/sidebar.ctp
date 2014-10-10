<?php $videos = $this->requestAction(array('controller' => 'videos', 'action' => 'sidebar','plugin' => 'video','admin'=>false)); ?>


<h2 class="thunder">vidéos</h2>
<?php foreach ($videos as $video): ?>
	<a title="Regarder la vidéo" href="<?php echo $this->Html->url($video['Video']['link']); ?>">
	<div class="sidebar_video">
<img class="sidebar_video" src="http://www.thunderbot.gg/thumb.php?src=<?php echo $this->Html->url('/files/video/photo/'.($video['Video']['photo_dir'].'/'.$video['Video']['photo'])); ?>&w=150&h=100&zc=1" alt=""></img>
			<h3 class="sidebar_video"><?php echo $this->Text->truncate($video['Video']['video_title'],22,array('exact'=>false,'html'=>true)); ?><span class="sidebar_video_comment"><i class="icon-comment  icon-white"></i> <?php echo h($video['Video']['comment_count']); ?></span></h3>
			
	</a>
	</div>
<?php endforeach; ?>


