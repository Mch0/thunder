

<div class="container">
  <div class="row">
	<div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
     
      <div class="list-group panel panel-primary">
       <div id="gallery_block"> 
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="min_height">

						<div id="login_account">
						<div class="row-fluid show-grid">


						
							<div class="span12">
								<div class="user .span12">
									<article>
										<?php echo $this->Form->create('User', array('action' => 'login','class'=>' form-signin')); ?>
							            <?php if (!empty($error)) {?>
											<div class="alert alert-error"><?php echo $error;?></div>
										<?php } ?>
										<div class="control-group">
							              <strong class="login"><label class="control-label"><?php echo __('Email :'); ?> </label></strong>
							              <div class="controls">
							                <?php echo $this->Form->input('user_email',array('div' => false,'label'=>false,'placeholder'=>__('Adresse Email'),'class'=>'span4')); ?>
							              </div>
							            </div>
							            <div class="control-group">
							              <strong class="login"><label class="control-label"><?php echo __('Email :'); ?> </label></strong>
							              <div class="controls">
							                <?php echo $this->Form->password('user_password',array('div' => false,'label'=>false,'placeholder'=>__('Mot de passe'),'class'=>'span4')); ?>
							              </div>
							            </div>
										<div class="control-group">
											<br>
									<div class="form-actions">
										<input type="submit" class="btn btn-thunder2" value="<?php echo __('Envoyer'); ?>" />
									</div>
										<br>
										<div>
											<?php if (isset($general['Setting']) && (int)$general['Setting']['disable_reset_password'] == 0){?>
												<a href="#" onclick='resetPassword(); return false;'><?php echo __('Mot de passe perdu ?'); ?></a>
											<?php }?>
										</div>
										<div>
											<?php if (isset($general['Setting']) && (int)$general['Setting']['disable_registration'] == 0){?>
												<?php echo $this->Html->link(__('Créer un nouvel account'), array('plugin' => 'auth_acl','controller' => 'users','action' => 'signup')); ?>
											<?php }?>
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
</div>






<script>
<?php if (isset($general['Setting']) && (int)$general['Setting']['disable_reset_password'] == 0){?>
function resetPassword() {
	var step = 1;
    var mId = $.sModal({
    	header:'<?php echo __('Nouveau mot de passe'); ?>',
    	width:450,
        form:[
			{label:'<?php echo __('Address Email'); ?>',type:'text',name:'user_email',attr:{'placeholder':'Address Email ',style:'width:300px;'}}
              ],
        animate: '',
        buttons: [{
            text: ' <?php echo __('Envoyer'); ?> ',
            addClass: 'btn',
            click: function(id, data) {
            	if (step == 1){
	            	var btnSubmit = $('#'+id).children('.modal-footer').children('a');
	            	btnSubmit.attr({disabled:'disabled'});
	            	btnSubmit.text('<?php echo __('Loading...'); ?>');
	            	$.post('<?php echo Router::url(array('plugin' => 'auth_acl','controller' => 'users','action' => 'resetPassword')); ?>',{data:{User:{user_email:$('#'+id).find('#user_email').val()}}},function(o){
	            		if (o.send_link == 1){
		            		btnSubmit.attr({disabled:false});
		                	btnSubmit.text('<?php echo __('email envoyé'); ?>');
		                	$('#'+id).children('.modal-body').children('div').html('<div class="alert alert-success" style="padding:8px;"><?php echo __('Nous vous avons envoyé un mail.'); ?></div>');
		                	step =2;
	            		}else{
	            			btnSubmit.attr({disabled:false});
		                	btnSubmit.text(' <?php echo __('Envoyer'); ?> ');
	            			step =1;
	            			$('#'+id).find('.alert-error').remove();
	            			$('#'+id).children('.modal-body').children('div').prepend('<div class="alert alert-error" style="padding:8px;"><?php echo __('<strong>Error</strong> !, Email non valide.'); ?></div>');
	            		}
	            	},'json');
            	}else if (step == 2){
            		$.sModal('close', id);
            	}
            }
        }]
        });
    $('#'+mId).find('input[type="text"]').each(function(){
		$(this).keypress(function(event){
			 if ( event.which == 13 ) {
			 	event.preventDefault();
			 }
		});
	});
}
<?php } ?>
$(document).ready(function(){
	$('#authMessage').each(function(){
		var errors = $('<div class="alert alert-error" style="margin-bottom:0px;"></div>').html($(this).html());
		$('#container').children('.container').prepend(errors);
	});

	$('#flashMessage').each(function(){
		var errors = $('<div class="alert alert-success" style="margin-bottom:0px;"></div>').html($(this).html());
		$('#container').children('.container').prepend(errors);
	});
});
</script>
