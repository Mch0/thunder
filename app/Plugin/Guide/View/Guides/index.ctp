<?php $this->html->meta ('description', 'ThunderBot c\'est l\'actualité, la web TV, les guides et l\'expertise des progamers sur League of Legends.', array('inline' =>false)); ?>
<div class="container">
	<?php debug($champions['Guide']); ?>
				<?php foreach($guides as $guide)
				{

				debug($guide);

					echo $guide['Champion']['name'];
					$srcPictoChamp = '/img/champion/'.$guide['Champion']['image'];
					echo $this->Html->image("$srcPictoChamp",array("fullBase" => true));
					echo $this->Html->url($guide["Guide"]["link"],true);
					?>
				<br/>
						<?php

						//Pour un guide
						foreach($guide['Guide'] as $guideRole)
						{


						}

										}	?>
</div>