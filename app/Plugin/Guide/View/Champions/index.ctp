<div class="container" id="guide">

<div class="row">
	<input type="text" name="search-champ" id="search-champ" value="" placeholder="Recherche"/>
</div>
	<!--<div class="btn-toolbar filters">
		<div class="btn-group " data-toggle="buttons">
			<label class="btn btn-primary" >
				<input type="checkbox" onclick="alert('toto');" value="Top" > Top
			</label>
			<label class="btn btn-primary">
				<input type="checkbox" value="Mid" > Mid
			</label>
			<label class="btn btn-primary">
				<input type="checkbox" value="Jungle" > Jungle
			</label>
			<label class="btn btn-primary">
				<input type="checkbox" value="Adc" > Adc
			</label>
			<label class="btn btn-primary">
				<input type="checkbox" value="Support" > Support
			</label>
		</div>
	</div>-->
	<div class="row" id="content-champions">
			<?php

	 //On recup chaque champion pour afficher les infos nom, image, etc
				foreach($champions as $k=>$champion)
				{
					?>
			<div class="champion-bloc bloc masonry-brick mouseover <?php echo $champion['Champion']['name'];?> <?php foreach($champion['Guide'] as $guide){echo $roles[$guide['role_id']].' ';} ?>" data-id="<?php echo $k ?>">
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

			<?php } ?>

	</div>
</div>
<?php  echo $this->Html->script('/design/js/jquery-1.6.2'); ?>
<?php  echo $this->Html->script('/design/js/masonry/masonry'); ?>
<?php  echo $this->Html->script('/design/js/masonry/multipleFilterMasonry'); ?>

		<script>
			jQuery(function($){
				var portfolio = $('#content-champions');
				portfolio.multipleFilterMasonry({
					isAnimated: true,
					itemSelector:'.bloc:not(.hidden)',
					isFitWidth:true,
					columnWidth:50,
					filtersGroupSelector: '.filters'
				});

				/*portfolio.masonry({
					isAnimated: true,
					itemSelector:'.bloc:not(.hidden)',
					isFitWidth:true,
					columnWidth:50
				});*/

				var bloc = portfolio.find('.bloc:first');
				var cssi = {width:bloc.width(),height:bloc.height()};
				var cssf = null;

				portfolio.find('a.thumb').click(function(e){
					var elem = $(this);

					var fold = portfolio.find('.unfold').removeClass('unfold').css(cssi);
					var unfold = elem.parent().addClass('unfold').css(cssf);
					//portfolio.masonry('reload');
					portfolio.masonry("reloadItems");
					portfolio.masonry();
					if(cssf == null){
						cssf = {
							width : unfold.width(),
							height: unfold.height()
						};
					}
					unfold.css(cssi).animate(cssf);
					e.preventDefault();
				});

				if(location.hash != ''){
					$('a[href="'+location.hash+'"]').trigger('click');
				}

				$('#search-champ').change(function(){
					console.log($(this).val());
					var search = $(this).val();
					var champions = $('#content-champions');
					if(search == '')
					{
						champions.find('.bloc').removeClass('hidden');
						portfolio.masonry("reloadItems");
						portfolio.masonry();
					}
					var chaine = '.bloc:not(.'+search+')';
					console.log(chaine);
					champions.find(chaine).addClass('hidden');
					portfolio.masonry("reloadItems");
					portfolio.masonry();
				});

			})
		</script>