<?php $titre= 'Embrayages Webstore-auto';
	$description= 'Vente d\'embrayages automobiles des marques Valeo et SPI à prix réduits';
	$lien_js = 'javascript/embrayage.js';?>
<?php ob_start();?>	

	<h1 class="h1">Embrayages de marques Valeo et SPI à prix discount</h1>
	
	<form method="post" action="embrayage/requete-embrayage.php" id="form-embrayage">
	
		<div id="marque-voiture" class="choix_voiture">
			<p>Indiquez votre marque</p>
			<select id="marque" name="marque">
				<option class="choix_marque" value='0'> marque </option>
				<option class="choix_marque" value="RENAULT">RENAULT</option>
				<option class="choix_marque" value="PEUGEOT">PEUGEOT</option>
				<option class="choix_marque" value="CITROEN">CITROEN</option>
				<option class="choix_marque" value="VOLKSWAGEN">VOLKSWAGEN</option>
				<option class="choix_marque" value="AUDI">AUDI</option>
				<option class="choix_marque" value="FORD">FORD</option>
						
			</select>				
		</div>
				
		<div id="modele-voiture" class="choix_voiture">
			<p>Indiquez votre modèle</p>
			<select id="modele" name="modele">
			<option value='0'> modèle </option>			
			</select>				
		</div>
		
		<div id="moteur-voiture" class="choix_voiture">
			<p>Indiquez votre moteur</p>
			<select id="type_moteur" name="type_moteur">
			<option value='0'> moteur </option>			
			</select>				
		</div>
		
		<div id="puissance-voiture" class="choix_voiture">
			<p>Indiquez sa puissance</p>
			<select id="puissance" name="puissance">
			<option value='0'> puissance </option>			
			</select>				
		</div>
		<br />
		<!--<input type="button" id="soumission" value="Voir mes pièces"> 
		<input type="submit" id="soumission2" value="php">-->
		<div id="soumission">
			<p id="soumission-p">Voir mes pièces</p>
		</div>
	</form>
		
		<div id="piece">
		</div>
		
<?php $contenu = ob_get_clean(); ?>
				
<?php require 'template.php'; ?>		
			


	<!--  timer reponse base de donnée
						<option a="False" b="False" value="230">VOLKSWAGEN</option>
						<option a="False" b="False" value="21">AUDI</option>
						<option a="False" b="False" value="192">SEAT</option>
						<option a="False" b="False" value="158">NISSAN</option>	
						<option a="False" b="False" value="158">SKODA</option>	
						<option a="False" b="False" value="158">NISSAN</option>	
						<option a="False" b="False" value="158">DACIA</option>	
	
<optgroup label="Toutes les marques :"><option a="False" b="False" value="303">ABARTH</option>
<option a="False" b="False" value="12">ALFA ROMEO</option>
<option a="False" b="False" value="272">ALPINA</option>
<option a="False" b="False" value="271">ALPINE</option>
<option a="False" b="False" value="277">ARO</option>
<option a="False" b="False" value="278">ASIA</option>
<option a="False" b="False" value="273">ASTON MARTIN</option>
<option a="False" b="False" value="21">AUDI</option>
<option a="False" b="False" value="260">AUSTIN</option>
<option a="False" b="False" value="23">AUTOBIANCHI</option>
<option a="False" b="False" value="25">BEDFORD</option>
<option a="False" b="False" value="280">BENTLEY</option>
<option a="False" b="False" value="304">BERTONE</option>
<option a="False" b="False" value="33">BMW</option>
<option a="False" b="False" value="283">BUICK</option>
<option a="False" b="False" value="257">CADILLAC</option>
<option a="False" b="False" value="284">CATERHAM</option>
<option a="False" b="False" value="46">CHEVROLET</option>
<option a="False" b="False" value="47">CHRYSLER</option>
<option a="False" b="False" value="49">CITRO&#203;N</option>
<option a="False" b="False" value="54">DACIA</option>
<option a="False" b="False" value="55">DAEWOO</option>
<option a="False" b="False" value="56">DAF</option>
<option a="False" b="False" value="57">DAIHATSU</option>
<option a="False" b="False" value="261">DAIMLER</option>
<option a="False" b="False" value="256">DODGE</option>
<option a="False" b="False" value="285">EBRO</option>
<option a="False" b="False" value="286">F.S.O. / POLSKI</option>
<option a="False" b="False" value="264">FERRARI</option>
<option a="False" b="False" value="76">FIAT</option>
<option a="False" b="False" value="77">FORD</option>
<option a="False" b="False" value="269">FORD USA</option>
<option a="False" b="False" value="92">G.M.E.</option>
<option a="False" b="False" value="84">GALLOPER</option>
<option a="False" b="False" value="98">HONDA</option>
<option a="False" b="False" value="100">HYUNDAI</option>
<option a="False" b="False" value="302">INFINITI</option>
<option a="False" b="False" value="103">INNOCENTI</option>
<option a="False" b="False" value="105">ISUZU</option>
<option a="False" b="False" value="107">IVECO</option>
<option a="False" b="False" value="108">JAGUAR</option>
<option a="False" b="False" value="109">JEEP</option>
<option a="False" b="False" value="114">KIA</option>
<option a="False" b="False" value="119">LADA</option>
<option a="False" b="False" value="265">LAMBORGHINI</option>
<option a="False" b="False" value="120">LANCIA</option>
<option a="False" b="False" value="121">LAND ROVER</option>
<option a="False" b="False" value="123">LDV</option>
<option a="False" b="False" value="124">LEXUS</option>
<option a="False" b="False" value="125">LEYLAND</option>
<option a="False" b="False" value="274">LIGIER</option>
<option a="False" b="False" value="270">LOTUS</option>
<option a="False" b="False" value="287">LTI</option>
<option a="False" b="False" value="288">MAHINDRA</option>
<option a="False" b="False" value="136">MARUTI</option>
<option a="False" b="False" value="267">MASERATI</option>
<option a="False" b="False" value="255">MAYBACH</option>
<option a="False" b="False" value="137">MAZDA</option>
<option a="False" b="False" value="140">MERCEDES-BENZ</option>
<option a="False" b="False" value="259">MG</option>
<option a="False" b="False" value="141">MINI</option>
<option a="False" b="False" value="142">MITSUBISHI</option>
<option a="False" b="False" value="289">MORGAN</option>
<option a="False" b="False" value="262">MORRIS</option>
<option a="False" b="False" value="158">NISSAN</option>
<option a="False" b="False" value="163">OPEL</option>
<option a="False" b="False" value="168">PEUGEOT</option>
<option a="False" b="False" value="292">PIAGGIO</option>
<option a="False" b="False" value="268">PONTIAC</option>
<option a="False" b="False" value="170">PORSCHE</option>
<option a="False" b="False" value="172">PROTON</option>
<option a="False" b="False" value="180">R.V.I.</option>
<option a="False" b="False" value="293">RELIANT</option>
<option a="False" b="False" value="178">RENAULT</option>
<option a="False" b="False" value="266">ROLLS-ROYCE</option>
<option a="False" b="False" value="179">ROVER</option>
<option a="False" b="False" value="181">SAAB</option>
<option a="False" b="False" value="187">SANTANA</option>
<option a="False" b="False" value="192">SEAT</option>
<option a="False" b="False" value="200">SKODA</option>
<option a="False" b="False" value="138">SMART</option>
<option a="False" b="False" value="204">SSANGYONG</option>
<option a="False" b="False" value="206">SUBARU</option>
<option a="False" b="False" value="208">SUZUKI</option>
<option a="False" b="False" value="210">TALBOT</option>
<option a="False" b="False" value="294">TATA</option>
<option a="False" b="False" value="307">TESLA</option>
<option a="False" b="False" value="220">TOYOTA</option>
<option a="False" b="False" value="263">TRIUMPH</option>
<option a="False" b="False" value="297">TVR</option>
<option a="False" b="False" value="298">U.M.M.</option>
<option a="False" b="False" value="226">VAUXHALL</option>
<option a="False" b="False" value="230">VOLKSWAGEN</option>
<option a="False" b="False" value="231">VOLVO</option>
<option a="False" b="False" value="299">WARTBURG</option>
<option a="False" b="False" value="300">YUGO/ZASTAVA</option>
<option a="False" b="False" value="301">ZAZ TAVRIA</option>
</optgroup> -->
