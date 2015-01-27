<div class="row" id="comment">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<?php foreach ($comments as $k => $comment): ?>
		<?php //debug($comment); ?>
		<div class="row">
			<div class="article-comment">

				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
					<div class="row">
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-7">
							<?php
                                  if ($comment['User']['avatar']) {
                                      echo $this->Html->image($comment['User']['avatar'], array('class' =>
							'img-responsive', "alt" => $comment['User']['user_name']));
							} else {
							echo $this->Html->image("/design/css/img/robotthunderbot.png", array("class" => "img-responsive", "alt" => 'thunderbot'));
							}
							?>
							<?php if (
                                  $this->Session->read('Auth.User.id') == $comment['Comment']['user_id']
							): ?>
							<p>
								<?php echo $this->html->link(__('Editer'), array('controller' => 'comments', 'action' => 'edit','plugin' => 'comment', $comment['Comment']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
								<?php echo $this->html->link(__('Effacer'), array('controller' => 'comments', 'action' => 'delete','plugin' => 'comment', $comment['Comment']['id']),array('class'=>'btn btn-mini btn-danger'),null,'Voulez vous vraiment supprimer cette Article ?'); ?>
							</p>
							<?php endif ?>
						</div>
						<div id="up" class="col-xs-1 col-sm-1 col-md-1 col-lg-1">

							<p class="comment-up" id="comment-nb-up-<?php echo $comment['Comment']['id'] ?>"><?= $comment['Comment']['up'] ?></p>

							<?php if ($this->Session->read('Auth.User.id')): ?>
							<button class="add1 btn btn-thunder2"  data-commentid="<?php echo $comment['Comment']['id'] ?>" class="btn btn-thunder2">+1</button>
							<?php endif ?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
					<div class="article-comment-content">
						<p>
							<a class="" href="/membre/<?php echo $comment['User']['id'] ?>">
								<strong class="strong_comment_redacteur">

									<?= h($comment['User']['user_name']); ?>

								</strong>
							</a>
							<span class="article-comment-timeago"><?= $this->Time->timeAgoInWords($comment['Comment']['created']); ?></span>
							<br>
						<p>

							<?php echo nl2br($comment['Comment']['content']); ?>
						</p>
						</p>
					</div>
				</div>
			</div>
		</div>
		<hr/>
		<?php endforeach ?>
	</div>
</div>