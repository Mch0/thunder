
<div class="container">
<h1 class="thunder_orange">League of legends</h1> 
</div>
<?php foreach ($equipes as $equipe): ?>

<div class="container">
	<div class="row">

      <div class="list-group panel panel-primary">
          <h1><?php echo $title; ?></h1>
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 

			<div class="col-xs-3 col-sm-3 col-sm-3 col-lg-3">
				<?php echo $this->Html->image('/files/equipe/photo/'.($equipe['Equipe']['photo_dir'].'/'.$equipe['Equipe']['photo'])); ?>
			</div> 


			<div class="col-xs-9 col-sm-9 col-sm-9 col-lg-9">
				<h2 class="player"><a target="_blank" href="<?php echo h($equipe['Equipe']['facebook']); ?>"><?php echo $this->html->image('/design/css/img/facebook.png'); ?></a> <?php echo h($equipe['Equipe']['name']); ?>     <span class="player_role"> <?php echo h($equipe['Equipe']['role']); ?></span></h2>
				<p><?php echo h($equipe['Equipe']['content']); ?></p>
			</div> 


                </div>
              </div>
            </div>
        </div> 
      </div>




	</div> 
</div> 

<?php endforeach; ?>

	</div>
</div>
</div>


