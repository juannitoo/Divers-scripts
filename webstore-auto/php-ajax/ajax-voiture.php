<?php
require_once("C:\wamp\www\webstore-auto\bdd\connexion-bdd.php");

if (isset($_POST['marque'])){
	$marque = htmlspecialchars($_POST['marque']);
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

//requete modele de voiture
$requete=$bdd->query('SELECT DISTINCT modele FROM '.$table1.'');
$i=0;
while ($donnee = $requete->fetch()){
	$i++;
	echo '<option value="'.$i.'" class="modeles_recus">'.htmlentities($donnee['modele']).'</option>';
}	
$requete-> closecursor();

?>