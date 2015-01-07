<div class="container" id="guide">


	<div class="row">
			<?php

	 //On recup chaque champion pour afficher les infos nom, image, etc
				foreach($champions as $k=>$champion)
				{
					?>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 champion-bloc mouseover" data-id="<?php echo $k ?>">
				<div class="champion-header col-lg-12">
					<h1><?php echo $champion['Champion']['name']; ?></h1>
				</div>
				<div class="champion col-lg-12">
					<div class="col-lg-6 champion-img">
						<?php
						$srcPictoChamp = '/img/champion/'.$champion['Champion']['image'];
						echo $this->Html->image("$srcPictoChamp",array("fullBase" => true));
						?>
					</div>
					<div class="col-lg-6 champion-guide-link hidden" id="<?php echo $k ?>">
						<?php
						foreach($champion['Guide'] as $guide)
						{

						if(!empty($guide['link']) || $guide['online'] == 1)
						{
						?>

						<a class="btn btn-primary <?php echo $roles[$guide['role_id']] ?>" href="<?php echo $this->Html->url($guide['link'],true); ?>">
						<?php echo $roles[$guide['role_id']] ?>
						</a>
						<?php
						}
						}
						?>
					</div>
				</div>
			</div>
				</a>
			<?php } ?>

	</div>
</div>
		<script>
			$('.mouseover').mouseover(function(){
				console.log('in');
				var indexTabChamp = $(this).data('id');
				$('#'+indexTabChamp).fadeIn('slow').removeClass('hidden');

			}).mouseleave(function () {
				console.log('out');
				var indexTabChamp = $(this).data('id');
				$('#'+indexTabChamp).addClass('hidden');
			})
		</script>