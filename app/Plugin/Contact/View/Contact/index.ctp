<?php $this->set('title_for_layout',"Contacter Thunderbot"); ?><div class="container">  <div class="row">	<div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">           <div class="list-group panel panel-primary">       <div id="gallery_block">              <h1>Contacter Thunderbot</h1>          <div class="panel-body">            <div class="thunderbox">              <div class="caption">                <div class="row">                   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                  <div class="min_height">						<div id="form">							<div class="row-fluid show-grid">							  <div class="span12">							    <div class="user">											<?php												if(isset($_POST['data']['Contact'])) {													echo $this->element('contact_'.$this->Session->read('Message.flash.element'));												}											?>											<?php echo $this->Form->create('Contact'); ?>											<div class="control-group">												<label for="inputEmail" class="control-label"><?php echo __('Nom d\'utilisateur : '); ?>												</label>												<div class="controls">													<?php echo $this->Form->input('name',array('label'=> false ,"required")); ?>												</div>											</div>											<div class="control-group">												<label for="inputEmail" class="control-label"><?php echo __('Email: '); ?>												</label>												<div class="controls">													<?php echo $this->Form->input('email',array('label'=> false,"type"=>"email","required")); ?>												</div>											</div>											<div class="control-group">												<label for="inputEmail" class="control-label"><?php echo __('Message : '); ?>												</label>												<div class="controls">													<?php echo $this->Form->input('message',array('label'=>false,"type"=>"textarea","required")); ?>												</div>											</div>											<?php echo $this->Form->end('Envoyer'); ?>										</div>									</div>								</div>							</div>						</div>					</div>                  </div>                </div>              </div>            </div>        </div>         </div>       </div>		</div>	</div></div>