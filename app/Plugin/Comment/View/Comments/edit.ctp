



<?php $this->set('title_for_layout',"Contacter Thunderbot"); ?>


<div class="container">
  <div class="row">
	<div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
     
      <div class="list-group panel panel-primary">
       <div id="gallery_block"> 
             <h1>Editer commentaire</h1>
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="min_height">

							<div class="container">
								<div class="row-fluid show-grid">

							<div id="comment">
								<?= $this->Form->create('Comment'); ?>
									<?= $this->Form->input('ref', array('label' => 'Votre message', 'type' => 'hidden')); ?>
									<?= $this->Form->input('ref_id', array('label' => 'Votre message', 'type' => 'hidden')); ?>
									<?= $this->Form->input('content', array('label' => 'Votre message', 'type' => 'textarea')); ?>
								<?= $this->Form->end('Editer comment'); ?>
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






















	

