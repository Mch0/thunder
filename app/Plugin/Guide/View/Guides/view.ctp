<div class="container" id="guides-detail">
	<div class="row">
		<div class="page-header">
			<h1><?=  $guide['Guide']['title'] ?></h1>
			<span><?= $this->frenchDate->french($guide['Guide']['created']); ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="role-poste">
			<span>Champion : <?= $guide['Champion']['name'] ?></span>
			<br/>
			<span>Poste : <?= $guide['Role']['role'] ?> </span>
		</div>
	</div>
	<div class="row">
		<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?= $guide['Guide']['content'] ?>
		</div>
	</div>
</div>