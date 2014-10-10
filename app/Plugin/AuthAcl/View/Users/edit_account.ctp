






<?php 
$this->html->meta ('description', 'ThunderBot WebTV - Admirez le skill ! ThunderBot TV c\'est les meilleurs joueurs League of Legends en live et accessibles depuis le chat', array('inline' =>false));
?>

<?php $this->set('title_for_layout', $image['Image']['title']) ?>




 <!-- ARTICLE -->
<div class="container">
  <div class="row">


<div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
     
      <div class="list-group panel panel-primary">
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="min_height">

						<div id="edit_account">
						    <div class="row"> 
						      <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
										<h1>
											 <?php echo h($user['User']['user_name']); ?>
										</h1>

										<div class="row-fluid show-grid" id="tab_user_manager">
										</div>
										<div class="row-fluid show-grid">
											<div class="span4">
												<?php echo $this->Form->create('User', array('type' => 'file')); ?>

												<div class="control-group">
													<label for="inputEmail" class="control-label"><?php echo __('Nom d\'utilisateur : '); ?>
													</label>
													<div class="controls">
														<?php echo $this->Form->input('user_name',array('div' => false,'label'=>false,'error'=>false,'readonly'=>'readonly')); ?>
													</div>
												</div>

												<div class="control-group">
													<label for="inputEmail" class="control-label"><?php echo __('Adresse email :'); ?>
													</label>
													<div class="controls">
														<?php echo $this->Form->input('user_email',array('div' => false,'label'=>false,'error'=>false,'readonly'=>'readonly')); ?>
													</div>
												</div>

												<div class="control-group">
													<label for="inputEmail" class="control-label"><?php echo __('Mot de passe :'); ?>
													</label>
													<div class="controls">
														<?php echo $this->Form->password('user_password',array('div' => false,'label'=>false,'error'=>false)); ?>
													</div>
												</div>

												<div class="control-group">
													<label for="inputEmail" class="control-label"><?php echo __('Confirmation mot de passe :'); ?>
													</label>
													<div class="controls">
														<?php echo $this->Form->password('user_confirm_password',array('div' => false,'label'=>false,'error'=>false)); ?>
													</div>
												</div>

												<div class="control-group">
													<label for="inputEmail" class="control-label"><?php echo __('Nom :'); ?>
													</label>
													<div class="controls">
														<?php echo $this->Form->input('name',array('div' => false,'label'=>false,'error'=>false)); ?>
													</div>
												</div>

												<div class="control-group">
													<label for="inputEmail" class="control-label"><?php echo __('Prénom :'); ?>
													</label>
													<div class="controls">
														<?php echo $this->Form->input('surname',array('div' => false,'label'=>false,'error'=>false)); ?>
													</div>
												</div>

												<div class="control-group">
													<label for="inputEmail" class="control-label"><?php echo __('Ville :'); ?>
													</label>
													<div class="controls">
														<?php echo $this->Form->input('city',array('div' => false,'label'=>false,'error'=>false)); ?>
													</div>
												</div>

												<div class="control-group">
													<label for="inputEmail" class="control-label"><?php echo __('Date de naissance :'); ?>
													</label>
													<div class="controls">
														<?php echo $this->Form->input('birthday',array('maxYear'=>date('Y'),'minYear'=>'1940','div' => false,'label'=>false,'error'=>false)); ?>
													</div>
												</div>

												<div class="control-group">
													<span style="color: red;"> <label for="inputEmail" class="control-label"><?php echo __('Avatar ( jpg ) :'); ?></label> </span>
													<div class="controls">
														<?php echo $this->Form->input('avatar_file', array('type' => 'file', 'label'=>false));; ?>
													</div>
												</div>

												<div class="form-actions">
													<input type="submit" class="btn btn-thunder2"
														value="<?php echo __('Envoyer'); ?>" />
												</div>
												<?php echo $this->Form->end(); ?>


											</div>
										</div>
								</div>
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
								<?php $this->Thumbnail->get($user['User']['avatar'], array('size'=>'150', 'transform'=>'scale'));  ?>
								<?php echo $this->Html->image('/files/users/thumbnails/'.($user['User']['id'].'_scale_150.jpg'), array('class' => 'thumb_profil')); ?>
								</div>
							</div>
						</div>
 					</div>
                  </div>
                </div>
              </div>
            </div>
        </div> 
      </div>


</div>





    </div>
</div>









         
















