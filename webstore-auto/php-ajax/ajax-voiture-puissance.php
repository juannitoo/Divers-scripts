<?php
require_once("C:\wamp\www\webstore-auto\bdd\connexion-bdd.php");

if (isset($_POST['marque']) AND isset($_POST['modele']) AND isset($_POST['type_moteur'])){
	$marque = htmlspecialchars($_POST['marque']);
	$modele= htmlspecialchars($_POST['modele']);
	$type_moteur= htmlspecialchars($_POST['type_moteur']);
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

//requete puissance
$requete=$bdd->prepare('SELECT DISTINCT puissance FROM '.$table1.' WHERE modele = ? AND type_moteur = ? ORDER BY puissance');
$requete->execute(array($modele, $type_moteur));
while ($donnee = $requete->fetch()){
	$i++;
	echo '<option value="'.$i.'" class="puissances_recues">'.htmlentities($donnee['puissance']).'</option>';
}	
$requete-> closecursor();
?>