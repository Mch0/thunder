<?php $this->set('title_for_layout',"Contacter Thunderbot"); ?><div id="contact">    <div class="row">        <div class="page-header">            <h1><i class="fa fa-envelope fa-2x visibe-lg"></i> Nous contacter </h1>        </div>    </div>  <div class="row">        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">            <?php echo $this->Form->create('Contact'); ?>            <div class="row">                <div class="form-group col-xs-12 floating-label-form-group">                    <label for="ContactName">Pseudo</label>                    <?php echo $this->Form->input('name',array('placeholder' => 'Pseudo','class' => 'form-control','label'=> false ,"required")); ?>                </div>            </div>            <div class="row">                <div class="form-group col-xs-12 floating-label-form-group">                    <label for="ContactEmail">Email</label>                    <?php echo $this->Form->input('email',array('placeholder' => 'Email','class' => 'form-control','label'=> false,"type"=>"email","required")); ?>                </div>            </div>            <div class="row">                <div class="form-group col-xs-12 floating-label-form-group">                    <label for="ContactMessage">Message</label>                    <?php echo $this->Form->input('message',array('placeholder' => 'Message','class' => 'form-control','label'=>false,"type"=>"textarea","required")); ?>                </div>            </div>            <div class="row">                <?php echo $this->Form->end(array('label' => 'Envoyer', 'class' => 'btn', 'div' => array( 'style' => 'margin-top:20px;margin-bottom:20px'))); ?>            </div>		</div>	</div></div></div>