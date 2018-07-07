<?php
require_once("C:\wamp\www\webstore-auto\bdd\connexion-bdd.php");

if (isset($_POST['marque']) AND isset($_POST['modele'])){
	$marque = htmlspecialchars($_POST['marque']);
	$modele= htmlspecialchars($_POST['modele']);
	$i=0;
}

//sécurisation de la variable table manuellement
switch($marque){
	case 'RENAULT' : 
	$table1 = 'embrayage_'.strtolower($marque);
	break;
	case 'PEUGEOT' : 
	$table1 = 'embrayage_'.strtolower($marque);
	break;
	case 'CITROEN' : 
	$table1 = 'embrayage_'.strtolower($marque);
	break;
	case 'VOLKSWAGEN' : 
	$table1 = 'embrayage_'.strtolower($marque);
	break;
	case 'AUDI' : 
	$table1 = 'embrayage_'.strtolower($marque);
	break;
	case 'FORD' : 
	$table1 = 'embrayage_'.strtolower($marque);
	$table2 = 'embrayage_'.strtolower($marque).'_ref';
	break;
	default : return;
}

//requete type_moteur
$requete=$bdd->prepare('SELECT DISTINCT type_moteur FROM '.$table1.' WHERE modele = ? ORDER BY type_moteur');
$requete->execute(array($modele));
while ($donnee = $requete->fetch()){
	$i++;
	echo '<option value="'.$i.'" class="types_recus">'.htmlentities($donnee['type_moteur']).'</option>';
}	
$requete-> closecursor();
?>