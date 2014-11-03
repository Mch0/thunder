


<div class="container">
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
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
      <div class="row" id="signup">
          <div class="col-xs-12 col-sm-12 col-md12 col-lg-12">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md12 col-lg-12">
                    <div class="page-header">
                        <h1><?php echo __('Créer un nouveau compte'); ?></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md12 col-lg-12">
                    <?php echo $this->Form->create('User', array('action' => 'signup','class'=>' form-signin')); ?>
                        <div class="row">
                            <div class="form-group floating-label-form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="user_name">&nbsp;</label>
                                <?php echo $this->Form->input('user_name',array('class' => 'form-control', 'placeholder' => 'Pseudo', 'required' )); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group floating-label-form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="user_email">&nbsp;</label>
                                <?php echo $this->Form->input('user_email',array('placeholder'=>__('Email'),'class' => 'form-control', 'required')); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group floating-label-form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="user_password">&nbsp;</label>
                                <?php echo $this->Form->password('user_password',array('placeholder'=>__('Mot de passe'),'class' => 'form-control','required')); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group floating-label-form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="user_confirm_password">&nbsp;</label>
                                <?php echo $this->Form->password('user_confirm_password',array('placeholder'=>__('Confirmation mot de passe'),'class' => 'form-control','required')); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group floating-label-form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="name">&nbsp;</label>
                                <?php echo $this->Form->input('name',array('label'=>false, 'class' => 'form-control', 'placeholder' => 'Nom', 'required')); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group floating-label-form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="surname">&nbsp;</label>
                                <?php echo $this->Form->input('surname',array('label'=>false, 'class' => 'form-control', 'placeholder' => 'Prenom', 'required')); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group floating-label-form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="city">&nbsp;</label>
                                <?php echo $this->Form->input('city',array('label'=>false, 'class' => 'form-control', 'placeholder' => 'Ville', 'required')); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group floating-label-form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="birthday" style="margin-top: 10px"></label>
                                <?php echo $this->Form->input('birthday',array('maxYear'=>date('Y'),'minYear'=>'1940','label'=>false,'class' => 'form-control')); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 10px">
                                <input type="submit" class="btn btn-thunder2 form-control" value="<?php echo __('Envoyer'); ?>" />
                            </div>
                        </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
          </div>
      </div>
     
      <!--<div class="list-group panel panel-primary">
       <div id="gallery_block"> 
              <h1><?php echo __('Créer un nouveau compte'); ?></h1>
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="min_height">

                        <div id="">
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
      </div>-->

    </div>
  </div>
</div>





















