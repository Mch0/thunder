





<div class="container">
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
     
      <div class="list-group panel panel-primary">
       <div id="gallery_block"> 
            <h2><?php echo __('Nouveau mot de passe'); ?></h2>
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="min_height">

							<div class="row-fluid show-grid">
								<div class="span8">
									<div class="posts .span8">
										<article>
										<?php if (count($errors) > 0){ ?>
										<div class="alert alert-error">
											<?php foreach($errors as $error){ ?>
											<?php foreach($error as $er){ ?>
											<strong><?php echo __('Error!'); ?> </strong>
											<?php echo h($er); ?>
											<br />
											<?php } ?>
											<?php } ?>
										</div>
										<?php } ?> 
										<?php echo $this->Form->create('User', array('action' => 'resetPassword/'.$code)); ?>
											<input type="hidden" name="data[User][code]" value="<?php echo h($code); ?>" />
											<div class="control-group">
												<label for="inputEmail" class="control-label"><?php echo __('Nouveau mot de passe'); ?></label>
												<div class="controls">
													<?php echo $this->Form->password('user_password',array('div' => false,'label'=>false,'placeholder'=>__('Mot de passe'),'class' => 'span4')); ?>
												</div>
											</div>
											<div class="control-group">
												<label for="inputPassword" class="control-label"><?php echo __('Confirm Password'); ?></label>
												<div class="controls">
													<?php echo $this->Form->password('user_confirm_password',array('div' => false,'label'=>false,'placeholder'=>__('Confirmation mot de passe'),'class' => 'span4')); ?>
												</div>
											</div>
							        <div class="control-group">
							          <?php echo $this->Form->end('Envoyer'); ?>
							        </div>
										<?php echo $this->Form->end(); ?>
										</article>
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
</div>











