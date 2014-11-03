






<?php 
$this->html->meta ('description', 'ThunderBot WebTV - Admirez le skill ! ThunderBot TV c\'est les meilleurs joueurs League of Legends en live et accessibles depuis le chat', array('inline' =>false));
?>

<?php $this->set('title_for_layout', $image['Image']['title']) ?>




 <!-- Users/edit_account.ctp-->
<div class="container">
  <div class="row">

    <div class="row" id="account">
        <div class="col-xs-12 col-sm-12 col-md12 col-lg-12">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md12 col-lg-12">
                    <div class="page-header">
                        <h1><?php echo h($user['User']['user_name']); ?> / Mon compte</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php echo $this->Form->create('User', array('type' => 'file')); ?>
                    <div class="row">
                        <div class="form-group floating-label-form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="user_name">&nbsp;</label>
                            <?php echo $this->Form->input('user_name',array('class' => 'form-control', 'readonly'=>'readonly','div' => 'false')); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group floating-label-form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="user_email">&nbsp;</label>
                            <?php echo $this->Form->input('user_email',array('class' => 'form-control','label'=>false,'div' => 'false','readonly'=>'readonly')); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group floating-label-form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="user_password">&nbsp;</label>
                            <?php echo $this->Form->password('user_password',array('placeholder' => 'Mot de passe','class' => 'form-control' ,'label'=>false, 'required')); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group floating-label-form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="user_confirm_password">&nbsp;</label>
                            <?php echo $this->Form->password('user_confirm_password',array('placeholder' => 'Confirmer votre mot de passe' ,'class' => 'form-control','label'=>false,'required')); ?>
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
                        <div class="form-group floating-label-form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="birthday" style="margin-top: 10px"></label>
                            <?php echo $this->Form->input('avatar_file', array('type' => 'file', 'label'=>false));; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 10px">
                            <input type="submit" class="btn btn-thunder2 form-control" value="<?php echo __('Envoyer'); ?>" />
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
        </div> 
      </div>


</div>





    </div>
</div>









         
















