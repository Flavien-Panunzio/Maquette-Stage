<?php
	$requete=('SELECT * FROM articles WHERE MisEnAvant="1"');
	$requete=requeteWHERE($requete);
	$description=$requete[0]->Description;
	$lenght=count($requete)-1;
?>

<div class="col-md-9 divcarousel" id="id<?=$lenght?>">
	<div class="une"><h2>À LA UNE</h2></div>
	<div class="ptit-truc"></div>
	<div class="carousel">
		<?php 
		$i=0; $actif="active";
		foreach ($requete as $value) :?>
			<div class="carousel-slide <?=$actif?>" id="<?=$i?>">
				<div class="image-carousel" style='background-image: url("<?= $value->Image;?>");'></div>
			</div>
		<?php $i++; $actif="cache"; endforeach;?>
		<div class="fleche"><i class="fas fa-angle-left"></i></div>
		<div class="fleche"><i class="fas fa-angle-right"></i></div>
	</div>
	<div class="descriptions-carousel"><?=$description;?></div>
</div>