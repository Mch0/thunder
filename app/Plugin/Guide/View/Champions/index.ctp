<div class="container" id="guide">

<div class="row">
	<input type="text" name="search-champ" id="search-champ" value="" placeholder="Recherche"/>
</div>
	<div class="row">
		<div class="btn-group" role="group" aria-label="...">
			<button type="button" value="Top" class="lane-filter btn btn-default">Top</button>
			<button type="button" value="Mid" class="lane-filter btn btn-default">Mid</button>
			<button type="button" value="Jungle" class="lane-filter btn btn-default">Jungle</button>
			<button type="button" value="Adc" class="lane-filter btn btn-default">Adc</button>
			<button type="button" value="Support" class="lane-filter btn btn-default">Support</button>
			<button type="button" value="reset" class=" lane-filter btn btn-default">Reset</button>
		</div>
	</div>
	<div class="row col-lg-12" id="content-champions">
			<?php

	 //On recup chaque champion pour afficher les infos nom, image, etc
				foreach($champions as $k=>$champion)
				{
					if(count($champion['Guide']) > 0)
					{
					?>
			<div class="champion-bloc bloc  <?php echo $champion['Champion']['name'];?> <?php foreach($champion['Guide'] as $guide){echo $roles[$guide['role_id']].' ';} ?>" data-id="<?php echo $k ?>">
				<a class="thumb" href="#">
					<div class="champion-header">
						<h1><?php echo $champion['Champion']['name']; ?></h1>
					</div>

					<div class="champion-img">
						<?php
						$srcPictoChamp = '/img/champion/'.$champion['Champion']['image'];
						echo $this->Html->image("$srcPictoChamp",array("fullBase" => true));
						?>
					</div>
				</a>
					<div class=" info champion-guide-link" id="<?php echo $k ?>">
						<div class="champion-header">
							<h1><?php echo $champion['Champion']['name']; ?></h1>
						</div>
						<div class="champion-img-unfold">
							<?php
						$srcPictoChamp = '/img/champion/'.$champion['Champion']['image'];
						echo $this->Html->image("$srcPictoChamp",array("fullBase" => true));
							?>
						</div>
						<div class="link-guide">
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

			<?php }} ?>

	</div>
</div>

<?php echo $this->Html->script('/design/js/jquery-1.6.2'); ?>
<?php  echo $this->Html->script('/design/js/masonry/masonry'); ?>
<?php echo $this->Html->script('/Guide/index.js'); ?>