<?php
header('Content-Type: text/html; charset=ISO-8859-15');
require('fpdf/fpdf.php');
		$nom= str_replace("¤","EUR",htmlspecialchars($_POST['nom'], ENT_IGNORE,'ISO-8859-15'));
		$adresse= str_replace("¤","EUR",htmlspecialchars($_POST['adresse'], ENT_IGNORE,'ISO-8859-15'));
		$telephone= str_replace("¤","EUR",htmlspecialchars($_POST['telephone'], ENT_IGNORE,'ISO-8859-15'));
		$e_mail= str_replace("¤","EUR",htmlspecialchars($_POST['e_mail'], ENT_IGNORE,'ISO-8859-15'));
		$nom_locataires= str_replace("¤","EUR",htmlspecialchars($_POST['nom_locataires'], ENT_IGNORE,'ISO-8859-15'));
		$adresse2= str_replace("¤","EUR",htmlspecialchars($_POST['adresse2'], ENT_IGNORE,'ISO-8859-15'));
		$telephone2= str_replace("¤","EUR",htmlspecialchars($_POST['telephone2'], ENT_IGNORE,'ISO-8859-15'));
		$e_mail2= str_replace("¤","EUR",htmlspecialchars($_POST['e_mail2'], ENT_IGNORE,'ISO-8859-15'));
		$adresse3= str_replace("¤","EUR",htmlspecialchars($_POST['adresse3'], ENT_IGNORE,'ISO-8859-15'));
		$type_location= str_replace("¤","EUR",htmlspecialchars($_POST['type_location'], ENT_IGNORE,'ISO-8859-15'));
		$superficie= str_replace("¤","EUR",htmlspecialchars($_POST['superficie'], ENT_IGNORE,'ISO-8859-15'));
		$nbre_pieces= str_replace("¤","EUR",htmlspecialchars($_POST['nbre_pieces'], ENT_IGNORE,'ISO-8859-15'));
		$nbre_pers= str_replace("¤","EUR",htmlspecialchars($_POST['nbre_pers'], ENT_IGNORE,'ISO-8859-15'));
		$fumeur= str_replace("¤","EUR",htmlspecialchars($_POST['fumeur'], ENT_IGNORE,'ISO-8859-15'));
		$animaux= str_replace("¤","EUR",htmlspecialchars($_POST['animaux'], ENT_IGNORE,'ISO-8859-15'));
		$vue= str_replace("¤","EUR",htmlspecialchars($_POST['vue'], ENT_IGNORE,'ISO-8859-15'));
		$salon= str_replace("¤","EUR",htmlspecialchars($_POST['salon'], ENT_IGNORE,'ISO-8859-15'));
		$cuisine= str_replace("¤","EUR",htmlspecialchars($_POST['cuisine'], ENT_IGNORE,'ISO-8859-15'));
		$chambres= str_replace("¤","EUR",htmlspecialchars($_POST['chambres'], ENT_IGNORE,'ISO-8859-15'));
		$sanitaires= str_replace("¤","EUR",htmlspecialchars($_POST['sanitaires'], ENT_IGNORE,'ISO-8859-15'));
		$autres= str_replace("¤","EUR",htmlspecialchars($_POST['autres'], ENT_IGNORE,'ISO-8859-15'));
		$date1= str_replace("¤","EUR",htmlspecialchars($_POST['date1'], ENT_IGNORE,'ISO-8859-15'));
		$date2= str_replace("¤","EUR",htmlspecialchars($_POST['date2'], ENT_IGNORE,'ISO-8859-15'));
		$date3= str_replace("¤","EUR",htmlspecialchars($_POST['date3'], ENT_IGNORE,'ISO-8859-15'));
		$date4= str_replace("¤","EUR",htmlspecialchars($_POST['date4'], ENT_IGNORE,'ISO-8859-15'));
		$prix= str_replace("¤","EUR",htmlspecialchars($_POST['prix'], ENT_IGNORE,'ISO-8859-15'));
		$arrhe1= str_replace("¤","EUR",htmlspecialchars($_POST['arrhe1'], ENT_IGNORE,'ISO-8859-15'));
		$arrhe2= str_replace("¤","EUR",htmlspecialchars($_POST['arrhe2'], ENT_IGNORE,'ISO-8859-15'));
		$solde= str_replace("¤","EUR",htmlspecialchars($_POST['solde'], ENT_IGNORE,'ISO-8859-15'));
		$depot1= str_replace("¤","EUR",htmlspecialchars($_POST['depot1'], ENT_IGNORE,'ISO-8859-15'));
		$depot2= str_replace("¤","EUR",htmlspecialchars($_POST['depot2'], ENT_IGNORE,'ISO-8859-15'));
		$condition_paiement= str_replace("¤","EUR",htmlspecialchars($_POST['condition_paiement'], ENT_IGNORE,'ISO-8859-15'));
		$taxe= str_replace("¤","EUR",htmlspecialchars($_POST['taxe'], ENT_IGNORE,'ISO-8859-15'));
		$gaz= str_replace("¤","EUR",htmlspecialchars($_POST['gaz'], ENT_IGNORE,'ISO-8859-15'));
		$autre_taxe= str_replace("¤","EUR",htmlspecialchars($_POST['autre_taxe'], ENT_IGNORE,'ISO-8859-15'));
		//$clef= str_replace("¤","EUR",htmlspecialchars($_POST['clef'], ENT_IGNORE,'ISO-8859-15'));
		//$menage= str_replace("¤","EUR",htmlspecialchars($_POST['menage'], ENT_IGNORE,'ISO-8859-15'));
		$ville= str_replace("¤","EUR",htmlspecialchars($_POST['ville'], ENT_IGNORE,'ISO-8859-15'));
		$conditions_gene= $_POST['conditions_gene'];
		$contrat='contrat';
		$date_en_cours= date("Y-m-d H:i:s",time());
		$taille_police1= $_POST['taille_police_1'];
		$taille_police2= $_POST['taille_police_2'];
		$taille_police3= $_POST['taille_police_3'];
		$taille_police4= $_POST['taille_police_4'];
		$taille_police5= $_POST['taille_police_5'];
		$taille_police6= $_POST['taille_police_6'];
		$taille_police7= $_POST['taille_police_7'];
		$taille_police8= $_POST['taille_police_8'];
		if(isset($_POST['sexe-inscription'])){$sexe_inscription= $_POST['sexe-inscription'];}
		$nom_inscription= strtoupper(str_replace("¤","EUR",htmlspecialchars($_POST['nom-inscription'], ENT_IGNORE,'ISO-8859-15')));//pas d'encodage pour etre comme dans le script originel
		$prenom_inscription= strtolower(str_replace("¤","EUR",htmlspecialchars($_POST['prenom-inscription'], ENT_IGNORE,'ISO-8859-15')));// et avoir une bonne sortie lors de la connexio
		if(!preg_match("#[^a-zA-Z0-9_.\-@]#", $_POST['pseudo-inscription'])){//pbme encodage membre
			if(!empty($_POST['pseudo-inscription'])){
			$pseudo_inscription= str_replace("¤","EUR",htmlspecialchars($_POST['pseudo-inscription'], ENT_IGNORE,'ISO-8859-15'));
			}
		}
		if(!preg_match("#[^a-zA-Z0-9_.\-@]#", $_POST['mdp-inscription'])){//si il y a pas d'autres caractères que cela
			if(!empty($_POST['mdp-inscription'])){
			$mdp_inscription= str_replace("¤","EUR",htmlspecialchars($_POST['mdp-inscription'], ENT_IGNORE,'ISO-8859-15'));
			}
		}
		$mdp2_inscription= str_replace("¤","EUR",htmlspecialchars($_POST['mdp2-inscription'], ENT_IGNORE,'ISO-8859-15'));
		$email_inscription= str_replace("¤","EUR",htmlspecialchars($_POST['email-inscription'], ENT_IGNORE,'ISO-8859-15'));
// Test CONDITION GENERALE et EMAIL  condition principale jusqu'a la fin rang1
if (isset($e_mail) AND(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['e_mail'])) AND isset($conditions_gene)){
//inscription à la volée   ...  si tous les champs de l'inscription sont remplis et que l email est bon   rang 2
if((isset($_POST['sexe-inscription']))&&(!empty($_POST['nom-inscription']))&&(!empty($_POST['prenom-inscription']))&&(isset($pseudo_inscription))&&(isset($mdp_inscription))&&(!empty($_POST['mdp2-inscription']))&&($mdp_inscription==$_POST['mdp2-inscription'])){
	if (preg_match("#^[a-z0-9.-_]+@[a-z0-9.-_]{2,}\.[a-z]{2,4}$#" , $email_inscription)){
		//on verifie et on insere le membre, sinon on sort (continue) 1 seul if suffit, mais finalement un else pour update !!!
		try{
			$bdd = new PDO('mysql:host=localhost;dbname=locati26_membres_emails','locati26','u4y7l8QkW0');}//host=localhost;dbname=test','root','');}
		catch (Exception $e){
			die('Erreur : Connection à la base de données impossible. Réessayez s\il vous plait' . $e->getMessage());}
			//requete1: vérification email deja connu
			$verification_email= $bdd->prepare('SELECT * FROM membres WHERE email = ?');
			$verification_email->execute(array($email_inscription));
			$donnee = $verification_email->fetch();
			$verification_email-> closecursor();
			// si le membre n'existe pas
			if($donnee['email'] != $email_inscription){
				//requete2: verification si pseudo libre
				$verification_pseudo= $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
				$verification_pseudo->execute(array($pseudo_inscription));
				$donnee2 = $verification_pseudo->fetch();
				$verification_pseudo-> closecursor();
				//insertion membre 
				if($donnee2['pseudo'] != $pseudo_inscription){
					$requete_insertion_membre= $bdd->prepare('INSERT INTO membres (prenom, nom, sexe, pseudo, mdp, email, cg, ins_volee, date_inscription)
																VALUES (:prenom, :nom, :sexe, :pseudo, :mdp, :email, :cg, :ins_volee, NOW())');
					$requete_insertion_membre->execute (array( 'prenom'=>$prenom_inscription,
																'nom'=>$nom_inscription,
																'sexe'=>$sexe_inscription,
																'pseudo'=>$pseudo_inscription,
																'mdp'=>SHA1($mdp_inscription),
																'email'=>$email_inscription,
																'cg'=>$conditions_gene,
																'ins_volee'=>'oui'
					));
					//on envoie le mail   verifier en ligne car port non ouvert sur wamp
					if(!$requete_insertion_membre){
						die( 'les données n\'ont pas pu etre enregistrer. erreur de requete :'.mysql_error());
					}else{
						//début de l'envoie du mail de confirmation   spf non inclus
						// on gère le saut à la ligne selon les serveurs
						if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $e_mail)){
							$passage_ligne = "\r\n";
						}else{
							$passage_ligne = "\n";
						}
						$message_text = 'Votre pseudo pour le site locationsaintjeandeluz.fr est : '.$pseudo_inscription.', votre mot de passe est : '.$mdp_inscription.'. Si vous ne pouvez pas vous connecter, ne faites pas de copiez-coller.';
						$message_html = "<html>";
						$message_html.= "<head>";						
						$message_html.="</head>";
						$message_html.="<body>";
						$message_html.="<section style=\"background-color:rgb(235,235,235);\">";
						$message_html.="<header>";
						$message_html.="<p style=\"font-size:1.5em;\"><span class=\"head1\" style=\"color:orange;\">location</span><span class=\"head2\">saint</span><span class=\"head3\" style=\"color:orange;\">jean</span><span class=\"head4\">de</span><span class=\"head5\" style=\"color:orange;\">luz</span><span class=\"head6\">.fr</span></p>";
						$message_html.="</header>";
						$message_html.="<h1 style=\"font-size:1.2em;\">Vos identifiants de connexion :</h1>";
						$message_html.="<p>Bonjour et bienvenue, <br />vous êtes à présent membre de notre site.</p>";
						$message_html.="<p>Votre pseudo pour ce site est : <b>$pseudo_inscription</b></p>";
						$message_html.="<p>Votre mot de passe pour ce site est : <b>$mdp_inscription</b></p>";
						$message_html.="<p>Utilisez l'espace membre pour modifier votre contrat dans la section \"mon contrat de location\" ou pour en créer un nouveau.<br />Si vous avez des problèmes pour vous connecter, ne faîtes pas de copier-coller.</p>";
						$message_html.="<p><a href='http://www.locationsaintjeandeluz.fr/contrat.html' title='créer mon contrat de location saisonnière meublée gratuit'>Créez votre contrat de location saisonnière gratuit en ligne.</a></p>";
						$message_html.="</section>";
						$message_html.="</body></html>";
						$sujet="Identifiants de connexion";
						$boundary = "-----=".md5(rand());
						//création du header
						$headers ='From: "info@locationsaintjeandeluz.fr"<info@locationsaintjeandeluz.fr>'.$passage_ligne;
						$headers.="X-Sender: <www.locationsaintjeandeluz.fr>".$passage_ligne;
						$headers.="X-Mailer: PHP".$passage_ligne;
						$headers.="X-auth-smpt-user: locati26@fornost.planethoster.net".$passage_ligne;
						$headers.="X-abuse-contact: webmaster@locationsaintjeandeluz.fr".$passage_ligne;
						$headers.='Reply-To: info@locationsaintjeandeluz.fr'.$passage_ligne;
						$headers.="MIME-Version: 1.0".$passage_ligne;
						$headers.='Content-Type: Multipart/alternative;'.$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
						// -----fin header et début message
						//ajout 1ère boundary (frontière)
						$message = $passage_ligne."--".$boundary.$passage_ligne;
						//=====Ajout message texte
						$message.= "Content-Type: text/plain; charset=\"ISO-8859-15\"".$passage_ligne;
						$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
						$message.= $passage_ligne.$message_text.$passage_ligne;
						//ajout 2ème boundary (frontière)
						$message.= $passage_ligne."--".$boundary.$passage_ligne;
						//=====Ajout du message au format HTML
						$message.= "Content-Type: text/html; charset=\"ISO-8859-15\"".$passage_ligne;
						$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
						$message.= $passage_ligne.$message_html.$passage_ligne;
						//fermeture boundary
						$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
						$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
						//envoi
						mail($e_mail,$sujet,$message,$headers);
						//fin du mail
					}
					$requete_insertion_membre-> closecursor();
				}//fin insertion membre
				$bdd = null;
				// on insere le contrat
				try{
					$bdd = new PDO('mysql:host=localhost;dbname=locati26_contrat_etat','locati26','u4y7l8QkW0');}//host=localhost;dbname=test','root','');}
				catch (Exception $e){
					die('Erreur : ' . $e->getMessage('Connection à la base de donnée impossible. Veuillez fermer cette page et réessayer s\il vous plait'));}
				$requete=$bdd->prepare('SELECT * FROM contrat WHERE pseudo = :pseudo');
				$requete->execute(array('pseudo' => $pseudo_inscription));
				$donnee= $requete->fetch();
				if (!isset($donnee['pseudo'])){ //si le pseudo n'est pas dans la base contrat
					$requete->closecursor();
					$requete2=$bdd->prepare('INSERT INTO contrat( pseudo, nom, adresse, telephone, e_mail, adresse3,
											type_location, superficie, nbre_pieces, nbre_pers, fumeur, animaux, vue, salon, cuisine, chambres,
											sanitaires, autres, date1, date2, date3, date4, prix, arrhe1, arrhe2, solde, depot1, depot2,
											condition_paiement, taxe, gaz, autre_taxe, ville, date_enregistrement,
											tp1, tp2, tp3, tp4, tp5, tp6, tp7, tp8)
										VALUES( :pseudo, :nom, :adresse, :telephone, :e_mail, :adresse3,
											:type_location, :superficie, :nbre_pieces, :nbre_pers, :fumeur, :animaux, :vue, :salon, :cuisine, :chambres,
											:sanitaires, :autres, :date1, :date2, :date3, :date4, :prix, :arrhe1, :arrhe2, :solde, :depot1, :depot2,
											:condition_paiement, :taxe, :gaz, :autre_taxe, :ville, Now(),
											:tp1, :tp2, :tp3, :tp4, :tp5, :tp6, :tp7, :tp8)');
					$requete2->execute(array('pseudo' => $pseudo_inscription,
						'nom' => $nom,
						'adresse' => $adresse,
						'telephone' => $telephone,
						'e_mail' => $e_mail,
						'adresse3' => $adresse3,
						'type_location'=> $type_location,
						'superficie'=> $superficie,
						'nbre_pieces'=>$nbre_pieces,
						'nbre_pers'=> $nbre_pers,
						'fumeur'=> $fumeur,
						'animaux'=> $animaux,
						'vue'=> $vue,
						'salon' => $salon,
						'cuisine' => $cuisine,
						'chambres' => $chambres,
						'sanitaires' => $sanitaires,
						'autres' => $autres,
						'date1'=> $date1,
						'date2'=> $date2,
						'date3'=> $date3,
						'date4'=> $date4,
						'prix'=> $prix,
						'arrhe1'=> $arrhe1,
						'arrhe2'=> $arrhe2,
						'solde'=> $solde,
						'depot1'=> $depot1,
						'depot2'=> $depot2,
						'condition_paiement'=> $condition_paiement,
						'taxe'=> $taxe,
						'gaz'=> $gaz,
						'autre_taxe'=> $autre_taxe,
						'ville' => $ville,
						'tp1' => $taille_police1,
						'tp2' => $taille_police2,
						'tp3' => $taille_police3,
						'tp4' => $taille_police4,
						'tp5' => $taille_police5,
						'tp6' => $taille_police6,
						'tp7' => $taille_police7,
						'tp8' => $taille_police8
							));
					$requete2->closecursor();
					$bdd = null;
				}// fin condition    si pas pseudo dans base contrat
				$requete->closecursor();
			}else{
				// UPDATE pas de echo pour les membres sinon plante mais pas d'enregistrement voir ajax sur formulaire pr verif
				try{
					$bdd = new PDO('mysql:host=localhost;dbname=locati26_contrat_etat','locati26','u4y7l8QkW0');}//host=localhost;dbname=test','root','');}
				catch (Exception $e){
					die('Erreur : ' . $e->getMessage('Connection à la base de donnée impossible. Veuillez fermer cette page et réessayer s\il vous plait'));}
				$requete3=$bdd->prepare('UPDATE contrat SET nom=:nv_nom, adresse=:nv_adresse, telephone=:nv_telephone,e_mail=:nv_e_mail, adresse3=:nv_adresse3, 
										type_location=:nv_type_location, superficie=:nv_superficie, nbre_pieces=:nv_nbre_pieces, nbre_pers=:nv_nbre_pers, 
										fumeur=:nv_fumeur, animaux=:nv_animaux, vue=:nv_vue, salon=:nv_salon, cuisine=:nv_cuisine, chambres=:nv_chambres,
										sanitaires=:nv_sanitaires, autres=:nv_autres, date1=:nv_date1, date2=:nv_date2, date3=:nv_date3, date4=:nv_date4, 
										prix=:nv_prix, arrhe1=:nv_arrhe1, arrhe2=:nv_arrhe2, solde=:nv_solde, depot1=:nv_depot1, depot2=:nv_depot2, 
										condition_paiement=:nv_condition_paiement, taxe=:nv_taxe, gaz=:nv_gaz, autre_taxe=:nv_autre_taxe, ville=:nv_ville, 
										tp1=:nv_tp1, tp2=:nv_tp2, tp3=:nv_tp3, tp4=:nv_tp4, tp5=:nv_tp5, 
										tp6=:nv_tp6, tp7=:nv_tp7, tp8=:nv_tp8 WHERE pseudo=:pseudo');
				$requete3->execute(array('nv_nom' => $nom,
						'nv_adresse' => $adresse,
						'nv_telephone' => $telephone,
						'nv_e_mail' => $e_mail,
						'nv_adresse3' => $adresse3,
						'nv_type_location'=> $type_location,
						'nv_superficie'=> $superficie,
						'nv_nbre_pieces'=>$nbre_pieces,
						'nv_nbre_pers'=> $nbre_pers,
						'nv_fumeur'=> $fumeur,
						'nv_animaux'=> $animaux,
						'nv_vue'=> $vue,
						'nv_salon' => $salon,
						'nv_cuisine' => $cuisine,
						'nv_chambres' => $chambres,
						'nv_sanitaires' => $sanitaires,
						'nv_autres' => $autres,
						'nv_date1'=> $date1,
						'nv_date2'=> $date2,
						'nv_date3'=> $date3,
						'nv_date4'=> $date4,
						'nv_prix'=> $prix,
						'nv_arrhe1'=> $arrhe1,
						'nv_arrhe2'=> $arrhe2,
						'nv_solde'=> $solde,
						'nv_depot1'=> $depot1,
						'nv_depot2'=> $depot2,
						'nv_condition_paiement'=> $condition_paiement,
						'nv_taxe'=> $taxe,
						'nv_gaz'=> $gaz,
						'nv_autre_taxe'=> $autre_taxe,
						'nv_ville' => $ville,
						'pseudo' => $pseudo_inscription,
						'nv_tp1' => $taille_police1,
						'nv_tp2' => $taille_police2,
						'nv_tp3' => $taille_police3,
						'nv_tp4' => $taille_police4,
						'nv_tp5' => $taille_police5,
						'nv_tp6' => $taille_police6,
						'nv_tp7' => $taille_police7,
						'nv_tp8' => $taille_police8
						));
				$requete3->closecursor();
				$bdd = null;
			}
	}else{echo'<br /><b>votre mail n\'a pas une forme valide. Fermez cet onglet (ou page) et recommencez.</b><br /><br />';}//fin test mail 
}
// fin de l'inscription à la volée
//test si e-mail pas présent dans bdd
		try{
			$bdd = new PDO('mysql:host=localhost;dbname=locati26_membres_emails','locati26','u4y7l8QkW0');}//host=localhost;dbname=test','root','');}
		catch (Exception $e){
			die('Erreur : Connection à la base de données impossible. Réessayez s\il vous plait' . $e->getMessage());}
$requete= $bdd->prepare('SELECT * FROM email WHERE e_mail= :e_mail');
$requete->execute(array( ':e_mail'=>$e_mail));
$donnee=$requete->fetch();
if ($donnee['e_mail'] != $e_mail){//rang 2
// requete insertion bdd
try{
	$bdd = new PDO('mysql:host=localhost;dbname=locati26_membres_emails','locati26','u4y7l8QkW0');}//host=localhost;dbname=test','root','');}
catch (Exception $e){
	die('Erreur : ' . $e->getMessage('Connection à la base de donnée impossible. Veuillez fermer cette page et réessayer s\il vous plait'));}
$requete2=$bdd->prepare('INSERT INTO email( e_mail, contrat, conditions_gene, date_redaction) VALUES (:e_mail, :contrat, :conditions_gene, Now())');
$requete2->execute(array('e_mail' => $e_mail,
						'contrat'=> $contrat,
						'conditions_gene' => $conditions_gene
						));
$requete2->closeCursor();
}else{
//test si contrat et état dans la base.
//if (($donnee['e_mail'] == $e_mail) AND ($donnee['contrat'] != $contrat)){
		try{
			$bdd3 = new PDO('mysql:host=localhost;dbname=locati26_membres_emails','locati26','u4y7l8QkW0');}//host=localhost;dbname=test','root','');}
		catch (Exception $e){
			die('Erreur : Connection à la base de données impossible. Réessayez s\il vous plait' . $e->getMessage());}
$requete3= $bdd3->prepare('UPDATE email SET contrat=:nv_contrat, date_redaction=:nv_date_redaction WHERE e_mail=:email');
$requete3->execute(array('nv_contrat'=> $contrat,
							'nv_date_redaction'=> $date_en_cours,
							'email'=> $e_mail));
$requete3->closeCursor();
//}
}
//
//début de la création du pdf
//
class PDF extends FPDF{
function header(){
	$this->SetFont('Arial','U',18);
	$this->Cell(48);  //largeur totale du doc : 195
	$this->Cell(100,7,'Contrat de location saisonnière',0,1,'C');
	$this->Ln(3);
	}
function footer(){
	$this->SetY(-12);
	$this->SetFont('Arial','',7);
	$this->Cell(60,3,'Mis à disposition gratuitement par locationsaintjeandeluz.fr',0,0,'L');
	$this->Cell(70,3,'Paraphes',0,0,'R');
	$this->Cell(60,3,'Page '.$this->PageNo().'/2',0,0,'R');
	}
//"entre"
//titre description
function entre($txt){
	$this->SetFont('Arial','B',8);
	$this->Cell(190,3,$txt,0,1,'C');
	}
//infos propriétaires
function intit_proprio($txt){	
	$this->SetXY(10,30);
	$this->SetFont('Arial','B',9);
	$this->Cell(89,4,$txt,0,1);
	}
function nom_proprio($txt){
	$this->SetXY(10,34);
	$this->SetFont('Arial','',$_POST['taille_police_1']);
	$this->MultiCell(89,3.5,$txt,0,1);		
	}
function intit_adresse($txt){
	$this->SetY(51.5);
	$this->SetFont('Arial','B',9);
	$this->Cell(89,3.5,$txt,0,1);
	}
function adresse($txt){
		$this->SetFont('Arial','',$_POST['taille_police_1']);
		$this->MultiCell(89,3.5,$txt,0,1);		
	}
function intit_telephone($txt){
	$this->SetY(72.5);
	$this->SetFont('Arial','B',9);
	$this->Cell(89,3,$txt,0,1);
	}
function telephone($txt){
	$this->SetFont('Arial','',10);
	$this->Cell(89,5,$txt,0,1);
	}
function intit_email($txt){
	$this->SetFont('Arial','B',9);
	$this->Cell(89,2.5,$txt,0,1);
	}
function email($txt){
	$this->SetFont('Arial','',10);
	$this->Cell(89,3,$txt,0,1);
	}
function info_proprio($txt1,$txt2,$txt3,$txt4){
	$this->intit_proprio('Le(s) propriétaire(s) dénommé "le propriétaire" :');
	$this->nom_proprio($txt1);
	$this->intit_adresse('Adresse :');
	$this->adresse($txt2);
	$this->intit_telephone('Téléphone :');
	$this->telephone($txt3);
	$this->intit_email('E-mail :');
	$this->Rect(10,28,90,60);
	$this->telephone($txt4);
	}
//info locataires
function intit_locataires($txt){
	$this->SetXY(110,30);
	$this->SetFont('Arial','B',9);
	$this->Cell(89,4,$txt,0,1);
	}
function nom_locataires($txt){
	$this->SetFont('Arial','',$_POST['taille_police_2']);
	$this->SetX(110);
	$this->MultiCell(89,3.5,$txt,0,1);
	}
function intit_adresse_locataires($txt){
	$this->SetXY(110,51.5);
	$this->SetFont('Arial','B',9);
	$this->Cell(89,3.5,$txt,0,1);
	}
function adresse_locataires($txt){
	$this->SetX(110);
	$this->SetFont('Arial','',$_POST['taille_police_2']);
	$this->MultiCell(89,3.5,$txt,0,1);
	}
function intit_telephone_locataires($txt){
	$this->SetXY(110,72.5);
	$this->SetFont('Arial','B',9);
	$this->Cell(89,3,$txt,0,1);
	}
function telephone_locataires($txt){
	$this->SetX(110);
	$this->SetFont('Arial','',10);
	$this->Cell(89,5,$txt,0,1);
	}
function intit_email_locataires($txt){
	$this->SetX(110);
	$this->SetFont('Arial','B',9);
	$this->Cell(89,2.5,$txt,0,1);
	}
function email_locataires($txt){
	$this->SetX(110);
	$this->SetFont('Arial','',10);
	$this->Cell(89,5,$txt,0,1);
	}
function info_locataires($txt1,$txt2,$txt3,$txt4){
	$this->intit_locataires('Le(s) locataire(s) dénommé "le locataire" :');
	$this->nom_locataires($txt1);
	$this->intit_adresse_locataires('Adresse :');
	$this->adresse_locataires($txt2);
	$this->intit_telephone_locataires('Téléphone :');
	$this->telephone_locataires($txt3);
	$this->intit_email_locataires('E-mail :');
	$this->email_locataires($txt4);
	$this->Rect(110,28,90,60);
	}
//titre description
function titre_description($txt){
	$this->SetXY(10,99);
	$this->SetFont('Arial','B',14);
	$this->Cell(190,3,$txt,0,1,'C');
	}
//adresse precise
function intit_adresse_location($txt){
	$this->SetXY(10,112);
	$this->SetFont('Arial','B',10);
	$this->Cell(30,3,$txt,0,1);
	}
function contenu_adresse_location($txt){
	$this->SetFont('Arial','',$_POST['taille_police_3']);
	$this->SetXY(10,117);
	$this->MultiCell(89,3.5,$txt,0,1);
	}
function adresse_location($txt){
	$this->intit_adresse_location('Adresse précise :');
	$this->contenu_adresse_location($txt);
	$this->Rect(10,111,90,30);
	}
// objet description location
function intit_description(){
	$this->SetXY(110,111.5);
	$this->SetFont('Arial','B',9);
	$this->Cell(40,3,'Description de la location :',0,1);
	}
	//type
function intit_type(){
	$this->SetXY(110,115.5);
	$this->SetFont('Arial','',9);
	$this->Cell(33,3,'- Type de la location :',0,0);
	}
function contenu_type($txt){
	$this->SetFont('Arial','B',9);
	$this->Cell(40,3,$txt,0,1);
	}
	//superficie
function intit_superficie(){
	$this->SetXY(110,119.15);
	$this->SetFont('Arial','',9);
	$this->Cell(26,3,'- Superficie(m²) :',0,0);
	}
function contenu_superficie($txt){
	$this->SetFont('Arial','B',9);
	$this->Cell(40,3,$txt,0,1);
	}
	//nbre pieces
function intit_nbre_pieces(){
	$this->SetXY(110,122.8);
	$this->SetFont('Arial','',9);
	$this->Cell(31,3,'- Nombre de pièces :',0,0);
	}
function contenu_nbre_pieces($txt){
	$this->SetFont('Arial','B',9);
	$this->Cell(40,3,$txt,0,1);
	}
	//nbre personnes max
function intit_nbre_pers(){
	$this->SetXY(110,126.45);
	$this->SetFont('Arial','',9);
	$this->Cell(51,3,'- Nombre de personnes maximum :',0,0);
	}
function contenu_nbre_pers($txt){
	$this->SetFont('Arial','B',9);
	$this->Cell(30,3,$txt,0,1);
	}
	//fumeur
function intit_fumeur(){
	$this->SetXY(110,130.1);
	$this->SetFont('Arial','',9);
	$this->Cell(32,3,'- Fumeurs acceptés :',0,0);
	}
function contenu_fumeur($txt){
	$this->SetFont('Arial','B',9);
	$this->Cell(30,3,$txt,0,1);
	}
	//animaux
function intit_animaux(){
	$this->SetXY(110,133.75);
	$this->SetFont('Arial','',9);
	$this->Cell(32,3,'- Animaux acceptés :',0,0);
	}
function contenu_animaux($txt){
	$this->SetFont('Arial','B',9);
	$this->Cell(30,3,$txt,0,1);
	}
	//vue
function intit_vue(){
	$this->SetXY(110,137.4);
	$this->SetFont('Arial','',9);
	$this->Cell(23,3,'- Classement :',0,0);
	}
function contenu_vue($txt){
	$this->SetFont('Arial','B',9);
	$this->Cell(40,3,$txt,0,1);
	}
	//objet description final
function description($txt1,$txt2,$txt3,$txt4,$txt5,$txt6,$txt7){
	$this->intit_description();
	$this->intit_type();
	$this->contenu_type($txt1);
	$this->intit_superficie();
	$this->contenu_superficie($txt2);
	$this->intit_nbre_pieces();
	$this->contenu_nbre_pieces($txt3);
	$this->intit_nbre_pers();
	$this->contenu_nbre_pers($txt4);
	$this->intit_fumeur();
	$this->contenu_fumeur($txt5);
	$this->intit_animaux();
	$this->contenu_animaux($txt6);
	$this->intit_vue();
	$this->contenu_vue($txt7);
	$this->Rect(110,111,90,30);
	}
//salon
function intit_salon($txt){
	$this->SetXY(12,152);
	$this->SetFont('Arial','B',9);
	$this->Cell(89,3,$txt,0,1);
	}
function contenu_salon($txt){
	$this->SetXY(12,156);
	$this->SetFont('Arial','',$_POST['taille_police_4']);
	$this->MultiCell(188,3.5,$txt,0,1);
	}
function salon($txt){
	$this->intit_salon('Salon/salle à manger :');
	$this->contenu_salon($txt);
	$this->Rect(10,150,190,35);
	}
//cuisine
function intit_cuisine($txt){
	$this->SetXY(10,196);
	$this->SetFont('Arial','B',9);
	$this->Cell(89,3,$txt,0,0);
	}
function contenu_cuisine($txt){
	$this->SetXY(10,200);
	$this->SetFont('Arial','',$_POST['taille_police_5']);
	$this->MultiCell(89,3.5,$txt,0,1);
	}
function cuisine($txt){
	$this->intit_cuisine('Cuisine :');
	$this->contenu_cuisine($txt);
	$this->Rect(10,194,90,35);
	}
//chambres
function intit_chambres($txt){
	$this->SetXY(110,196);
	$this->SetFont('Arial','B',9);
	$this->Cell(89,3,$txt,0,1);
	}
function contenu_chambres($txt){
	$this->SetXY(110,200);
	$this->SetFont('Arial','',$_POST['taille_police_6']);
	$this->MultiCell(89,3.5,$txt,0,1);
	}
function chambres($txt){
	$this->intit_chambres('Chambres :');
	$this->contenu_chambres($txt);
	$this->Rect(110,194,90,35);
	}
//sanitaires
function intit_sanitaires($txt){
	$this->SetXY(10,240);
	$this->SetFont('Arial','B',9);
	$this->Cell(89,3,$txt,0,0);
	}
function contenu_sanitaires($txt){
	$this->SetXY(10,244);
	$this->SetFont('Arial','',$_POST['taille_police_7']);
	$this->MultiCell(89,3.5,$txt,0,1);
	}
function sanitaires($txt){
	$this->intit_sanitaires('Sanitaires :');
	$this->contenu_sanitaires($txt);
	$this->Rect(10,238,90,35);
	}
//autres
function intit_autres($txt){
	$this->SetXY(110,240);
	$this->SetFont('Arial','B',9);
	$this->Cell(89,3,$txt,0,1);
	}
function contenu_autres($txt){
	$this->SetXY(110,244);
	$this->SetFont('Arial','',$_POST['taille_police_8']);
	$this->MultiCell(89,3.5,$txt,0,1);
	}
function autres($txt){
	$this->intit_autres('Autres (garage, jardin, situation géographique...) :');
	$this->contenu_autres($txt);
	$this->Rect(110,238,90,35);
	}
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ 2eme page $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//date
function suite(){
	$this->SetFont('Arial','',8);
	$this->SetY(21);
	$this->Cell(190,2,'(suite et fin)',0,1,'C');
}
function intit_date($txt){
	$this->SetFont('Arial','B',14);
	$this->Cell(190,4,$txt,0,1,'C');
	}
function contenu_date($txt1,$txt2,$txt3,$txt4){
	$this->SetFont('Arial','',11);
	$this->Cell(190,4,'Location entendue du '.$txt1.' à '.$txt2.' heures jusqu\'au '.$txt3.' à '.$txt4.' heures.',0,1,'C');
	}
function date_location($txt1,$txt2,$txt3,$txt4){
	$this->suite();
	$this->SetY(30);
	$this->intit_date('Date de la location :');
	$this->Ln();
	$this->contenu_date($txt1,$txt2,$txt3,$txt4);
	}
//prix arrhe depot guarantie
function intit_prix($txt){
	$this->SetFont('Arial','B',14);
	$this->Cell(190,4,$txt,0,1,'C');
	}
function contenu_prix($txt1,$txt2,$txt3,$txt4,$txt5,$txt6){
	$this->SetFont('Arial','',11);
	$this->MultiCell(190,4,'Le prix de cette location est de '.$txt1.'€ par semaine, non inclus les charges mentionnées plus bas.
		Les arrhes de cette location sont de '.$txt2.'% soit '.$txt3.'€ et seront versées lors de la signature du présent contrat.
		Le solde du prix, soit '.$txt4.'€ sera payé le jour de la remise des clés, en même temps que le dépôt de
		garantie de '.$txt5.'% soit '.$txt6.'€. Ce dépôt de garantie peut etre encaissé. Il sera rendu en intégralité jusqu\'à quinze jours aprés le départ du locataire, excepté en cas de dégâts.',0,'C');
	}
function prix($txt1,$txt2,$txt3,$txt4,$txt5,$txt6){
	$this->SetY(48);
	$this->intit_prix('Prix, arrhes et dépôt de garantie :');
	$this->Ln();
	$this->contenu_prix($txt1,$txt2,$txt3,$txt4,$txt5,$txt6);
	}
//condition de paiement
function intit_condition_paiement(){
	$this->SetFont('Arial','B',14);
	$this->Cell(190,4,'Conditions de paiement :',0,1,'C');
	}
function condition_paiement($txt){
	$this->SetY(82);
	$this->intit_condition_paiement();
	$this->Ln();
	$this->SetFont('Arial','',11);
	$this->MultiCell(190,4,'Le locataire paiera par tout moyen convenu avec le propriétaire et mentionné ici: '.$txt.'.',0,'C');
	}
//condition annulation 
function intit_condition_annulation(){
	$this->SetFont('Arial','B',14);
	$this->Cell(190,4,'Conditions d\'annulation :',0,1,'C');
	}
function condition_annulation(){
	$this->SetY(103);
	$this->intit_condition_annulation();
	$this->Ln();
	$this->SetFont('Arial','',11);
	$this->MultiCell(190,4,'Les deux parties ont sept jours pour se rétracter à partir de la date de signature, sans qu\'aucune
	pénalité ne leur soit infligée.',0,'C');
	$this->Cell(190,4,'Passé ce délai :',0,1,'C');
	$this->MultiCell(190,4,'- Le locataire peut se rétracter à tout moment mais perdra l\'intégralité de ses arrhes.',0,'C');
	$this->MultiCell(190,4,'- Le propriétaire peut se rétracter à tout moment mais devra remettre le double des arrhes déjà versées par le locataire.',0,'C');
	}
// charges ++
function intit_charges(){
	$this->SetFont('Arial','B',14);
	$this->Cell(190,4,'Charges supplémentaires :',0,1,'C');
	}
function charges($txt1,$txt2,$txt3){
	$this->SetY(139);
	$this->intit_charges();
	$this->Ln();
	$this->SetFont('Arial','',11);
	$this->Cell(190,4,'D\'autres charges peuvent être demandées :',0,1,'C');
	$this->Cell(190,4,'Taxe de séjour : '.$txt1.'',0,1,'C');
	$this->Cell(190,4,'Eau/éléctricité/gaz : '.$txt2.'',0,1,'C');
	$this->Cell(190,4,'Autres : '.$txt3.'',0,1,'C');
	}
//obligations
function intit_obligations(){
	$this->SetFont('Arial','B',14);
	$this->Cell(190,4,'Rappel de quelques obligations :',0,1,'C');
	}
function obligations(){
	$this->SetY(168);
	$this->intit_obligations();
	$this->Ln();
	$this->SetFont('Arial','',11);
	$this->Cell(190,4,'- Le locataire doit :',0,1,'C');
	$this->Cell(190,4,'- Assumer sa responsabilité civile.',0,1,'C');
	$this->Cell(190,4,'- Utiliser le logement "raisonnablement" et répondre des dégradations dans les plus brefs délais.',0,1,'C');
	$this->Cell(190,4,'- Respecter la capacité maximale d\'hébergement.',0,1,'C');
	$this->Cell(190,4,'- Faire le ménage si aucun forfait n\'est prévu, et rendre le bien en location dans le même état de propreté',0,1,'C');
	$this->Cell(190,4,'que lors de son entrée dans les lieux.',0,1,'C');
	}
function annexes(){
	$this->SetY(207);
	$this->SetFont('Arial','B',14);
	$this->Cell(190,4,'Annexes :',0,1,'C');
	$this->Ln();
	$this->SetFont('Arial','',11);
	$this->MultiCell(190,4,'Vous trouverez en annexe à ce contrat le dossier de diagnostic technique comprenant, si nécessaire, un 
	constat de risque d\'exposition au plomb, un état des risques naturels et technologiques, 
	ainsi qu\'un diagnostic de performances énergétiques.',0,'C');
	}
//signature
function signature($txt1){
	$this->SetY(231);
	$this->Cell(30,5,'',0,0);
	$this->Cell(40,5,'Fait en deux exemplaires à : '.$txt1.'   le' ,0,1,'L');
	$this->Ln();
	$this->Cell(190,4,'Signatures des deux parties précédées de la mention "lu et approuvé"',0,1,'C');
	$this->Cell(95,5,'Le(s) propriétaire(s)',0,0,'C');
	$this->Cell(95,5,'Le(s) locataire(s)',0,0,'C');
	}
}
// $$$$$$$$$$$$$$$$$$ début phase d'appel $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
$pdf = new PDF();
$pdf->AddPage();
//"entre"
$pdf->entre("entre");
// info du propriétaire
$pdf->info_proprio(stripslashes($nom),stripslashes($adresse),stripslashes($telephone),stripslashes($e_mail));
// info du locataire et espace entre 2 cellules
$pdf->Cell(10,52,'',0,0);
$pdf->info_locataires(stripslashes($nom_locataires),stripslashes($adresse2),stripslashes($telephone2),stripslashes($e_mail2));
//titre description
$pdf->titre_description('Adresse et description de la location');
//adresse précise
$pdf->adresse_location(stripslashes($adresse3));
// description
$pdf->description(stripslashes($type_location),stripslashes($superficie),stripslashes($nbre_pieces),stripslashes($nbre_pers),stripslashes($fumeur),stripslashes($animaux),stripslashes($vue));
//salon
$pdf->salon(stripslashes($salon));
//cuisine + espace cellules
$pdf->cuisine(stripslashes($cuisine));
$pdf->Cell(10,1,'',0,0);
//chambres
$pdf->chambres(stripslashes($chambres));
//sanitaires + espce cellules
$pdf->sanitaires(stripslashes($sanitaires));
$pdf->Cell(10,1,'',0,0);
//autres
$pdf->autres(stripslashes($autres));
//2eme page
$pdf->AddPage();
//date de la location
$pdf->date_location($date1,$date2,$date3,$date4);
//prix arrhe depot guarantie
$pdf->prix($prix,$arrhe1,$arrhe2,$solde,$depot1,$depot2);
//condition_paiement
$pdf->condition_paiement(stripslashes($condition_paiement));
//condition_annulation
$pdf->condition_annulation();
//charges
$pdf->charges(stripslashes($taxe),stripslashes($gaz),stripslashes($autre_taxe));
//obligation et annexe
$pdf->obligations();
$pdf->annexes();
//signatures
$pdf->signature(stripslashes($ville));
$pdf->output('contrat-location.pdf','I');
//
//Fin de la condition generale et EMAIL du début
}else{header('location: erreur.php');
}
