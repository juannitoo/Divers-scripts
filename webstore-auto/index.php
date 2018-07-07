<?php $titre= 'Webstore-auto accueil';
	$description= 'Vente de pièces détachèes automobiles, embrayages distributions Valeo - Luk - National';
	$lien_js = 'javascript/index.js';?>

<?php ob_start(); ?>

	<h1 class="h1">Kit d'embrayage et kit de distribution à petits prix</h1>
		<p class="p-accueil">Webstore-auto vous propose une sélection de pièces détachées automobiles à prix trés concurentiels.
		</p>
				
	<article class="art-accueil" id="art-accueil-1">
		<a class="bouton-lien" id="bouton-lien1" href="kit-embrayage.php" title="Embrayages Valeo - Luk - National">Nos kits d'embrayage</a>
		<p class="p-art-accueil" id="p-art-accueil">
		<a class="bouton-lien2" id="bouton-lien2" href="kit-embrayage.php" title="Embrayages Valeo - Luk - National">
						Choisissez votre kit d'embrayage parmi notre gamme. Tout nos kits sont reconnus pour leur fiabilité. 
						Valeo, en tant que leader, est présent sur notre site. 
						Nous vous invitons également à découvrir d'autres marques moins renommées mais tout aussi efficaces,
						comme Sachs, Luk, ou National.</a>
		</p>
		<a href="kit-embrayage.php" title="Embrayages Valeo - Luk - National">
			<img class="image-accueil" src="images/kit-embrayage.jpg" alt="photo de kit d'embrayage" />
		</a>
	</article>
				
	<article class="art-accueil" id="art-accueil-2"> 
		<a class="bouton-lien" id="bouton-lien3" href="kit-distribution.php" title="kit distribution Contitech, Gates et Daycol">Nos kits de distribution</a>
		<p class="p-art-accueil" id="p-art-accueil-2">
		<a class="bouton-lien2" id="bouton-lien4" href="kit-distribution.php" title="kit distribution Contitech, Gates et Daycol">
			Découvrez notre gamme de kits de distribution parmi des marques comme
			Contitech, filiale du groupe Continental et leader dans le domaine du caoutchouc, Gates, autre groupe mondial proposant des produits de qualité, 
			ou encore Dayco.</a>
		</p>
		<a href="kit-distribution.php" title="kit distribution Contitech, Gates et Daycol">
			<img class="image-accueil" src="images/kit-distri.jpg" alt="photo de kit de distribution" />
		</a>
	</article>
	
<?php $contenu = ob_get_clean(); ?>
				
<?php require 'template.php'; ?>			