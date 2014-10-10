


<div class="container">
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
     
      <div class="list-group panel panel-primary">
       <div id="gallery_block"> 
              <h1><?php echo __('Créer un nouveau compte'); ?></h1>
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="min_height">

                        <div id="signup">
                        <div class="row-fluid show-grid">
                          <div class="span12">
                            <div class="user .span12">
                              <article>
                                
                              <?php if (!empty($errors)){ ?>
                                    <div class="alert alert-error">
                                        <?php foreach($errors as $error){  ?>
                                          <div>
                                    <strong><?php echo __('Error!'); ?> </strong>
                                    <?php echo h(implode('<br />', $error)); ?>
                                  </div>
                                        <?php } ?>
                                    </div>   
                                    <?php } ?>
                              <?php echo $this->Form->create('User', array('action' => 'signup','class'=>' form-signin')); ?>
                                   <div class="control-group">
                                      <label  class="control-label"><?php echo __('Pseudo : '); ?></label>
                                      <div class="controls">
                                        <?php echo $this->Form->input('user_name',array('div' => false,'label'=>false,'placeholder'=>__('Pseudo'),'error'=>false,'class' => 'span4')); ?>
                                      </div>
                                   </div>
                                    <div class="control-group">
                                      <label  class="control-label"><?php echo __('Adresse email :'); ?> </label>
                                      <div class="controls">
                                        <?php echo $this->Form->input('user_email',array('div' => false,'label'=>false,'placeholder'=>__('Adresse email'),'error'=>false,'class' => 'span4')); ?>
                                      </div>
                                    </div>
                                    <div class="control-group">
                                      <label  class="control-label"><?php echo __('Mot de passe :'); ?></label>
                                      <div class="controls">
                                        <?php echo $this->Form->password('user_password',array('div' => false,'label'=>false,'placeholder'=>__('Mot de passe'),'error'=>false,'class' => 'span4')); ?>
                                      </div>
                                    </div>
                                    <div class="control-group">
                                      <label  class="control-label"><?php echo __('Confirmation mot de passe :'); ?></label>
                                      <div class="controls">
                                        <?php echo $this->Form->password('user_confirm_password',array('div' => false,'label'=>false,'placeholder'=>__('Confirmation mot de passe'),'error'=>false,'class' => 'span4')); ?>
                                      </div>
                                    </div>
                          
                                    <?php if (isset($general['Setting']) && (int)$general['Setting']['enable_recaptcha'] == 1){?>
                                    <div class="control-group">
                                      <label  class="control-label">ReCaptcha</label>
                                      <div class="controls">
                                      <?php echo $this->Form->hidden('recaptcha',array('value'=>'1')); ?>
                                        <script type="text/javascript">
                                  var RecaptchaOptions = {
                                    theme : 'white'
                                  };
                                </script> 
                                        <?php 
                                $publickey = $general['Setting']['recaptcha_public_key'];
                                  echo recaptcha_get_html($publickey, null); ?>
                                      </div>
                                    </div>
                              <?php }?>

                                    <div class="form-actions">
                                      <input type="submit" class="btn btn-thunder2" value="<?php echo __('Envoyer'); ?>" />
                                    </div>
                                    <br>
                              <div style="margin-left:10px;"> 
                              <div class="control-group">
                                <label>
                                  <?php echo $this->Html->link(__('Vous avez un compte? Se connecter!'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'login')); ?>
                                </label>
                              </div></div>
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
</div>





















