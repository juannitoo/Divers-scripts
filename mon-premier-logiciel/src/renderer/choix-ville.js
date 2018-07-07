function villeMeteo(){
	// permet de choisr la ville

	// je charge le store
	const Store = require('electron-store');
	const store = new Store();  
	const objetVilleMeteo = {};

	// cette méthode permet d'accrocher l'article + input 
	// a n'importe quel noeud
	objetVilleMeteo.affiche = (noeudParent) => {
		
		const articleVille = document.createElement('article');
		const paragVille = document.createElement('p');
		const parInfoVille =  document.createElement('span');
		const carteMeteo = document.createElement('div');
		articleVille.className = "article-param-meteo art-map-meteo";
		paragVille.id = "parag-ville";
		paragVille.textContent = "Choisissez la localisation de la météo sur la carte";
		parInfoVille.id = "par-info-ville";
		carteMeteo.id = "map-meteo";

		// j'accroche l'input au noeud parent (div paramVideo)
		noeudParent.appendChild(articleVille).appendChild(paragVille);
		paragVille.appendChild(carteMeteo);
		articleVille.appendChild(parInfoVille);

		//  --------------  carte----- ---------

		// je génère la carte
		let carte = L.map('map-meteo').setView([46.3630104, 2.9846608], 2);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(carte);

		// je teste si une ville est enregistrée et je l'affiche
		villeEnregistree = store.get('ville-meteo');
		nomVilleEnregistree = store.get('ville-meteo-nom');
		let positionEnregistree;
		if( villeEnregistree.latitude != "" ){
			positionEnregistree = L.marker([villeEnregistree.latitude, villeEnregistree.longitude]).addTo(carte);
			// je gère l'affichage de la pop-up
            positionEnregistree.bindPopup('');
            let maPopup2 = positionEnregistree.getPopup();
			maPopup2.setContent(`<p>latitude : ${villeEnregistree.latitude} <br /> longitude : ${villeEnregistree.longitude}
									<br /> <h3>${nomVilleEnregistree}</h3>`);   
			positionEnregistree.openPopup();
		}
			
		// sinon, je détermine un emplacement que je redéfinirai
		let position = L.marker([46.363, 2.984]);
		
		// je gère le click pour déterminer la ville désirée
        carte.on('click', placerMarqueur);

        function placerMarqueur(e) {

			// je supprime l'ancien marker si présent
			if( villeEnregistree.latitude != "" ){
				positionEnregistree.remove();
			}

			// je place le marqueur avec latitude et longitude
			// seuleument si les valeurs sont bonnes
			if ( e.latlng.lng > -180 && e.latlng.lng < 180 && e.latlng.lat > -85 && e.latlng.lat < 85 ){
				
				position.setLatLng(e.latlng).addTo(carte);
		
				// je recup le nom de la ville via une autre api
				// et je fais la sauvegarde dans la fonction callback
				// j'ai désolidarisé l'objet ville météo parce que je fais appel à une Api
				// les données ne sont donc pas connues en avance.
				let villeNom = "";
				let villeMeteo = {};
				ajaxGet("https://nominatim.openstreetmap.org/reverse?format=json&lat="+e.latlng.lat+"&lon="+e.latlng.lng+"&zoom=18&addressdetails=1", (response) => {
					let reponse = JSON.parse(response)
					// village town city locality, faut un zoom minimum pr que ca marche
					if (reponse.address){
						if (reponse.address.city) {villeNom = reponse.address.city}
						if (reponse.address.village) {villeNom = reponse.address.village}
						if (reponse.address.town) {villeNom = reponse.address.town}
						if (reponse.address.locality) {villeNom = reponse.address.locality}
						if (villeNom == "" && reponse.address.state) { villeNom = reponse.address.state}
						if (villeNom == "" && reponse.address.country) { villeNom = reponse.address.country}
						if (villeNom == "" && reponse.address.continent) { villeNom = reponse.address.continent}

						// j'informe l'utilisateur si la ville est trouvée 
						// et je met à jour le nom ds le storage
						store.set('ville-meteo-nom', villeNom)
						parInfoVille.textContent = `Les coordonnées de "${villeNom}" ont bien été sauvegardées`;			
					}
				});
				// je gère l'affichage de la pop-up
				position.bindPopup('');
				let maPopup = position.getPopup();
				maPopup.setContent(`<p>latitude : ${e.latlng.lat} <br /> longitude : ${e.latlng.lng}`);   
				position.openPopup();
				//je sauvegarde les coordonnées geographiques
				villeMeteo.latitude = e.latlng.lat;
				villeMeteo.longitude = e.latlng.lng;
				store.set('ville-meteo', villeMeteo);
				//j'informe l'utilisateur 
				parInfoVille.textContent = `Les coordonnées géographiques ont bien été sauvegardées`;
				infoUserValidation();
				decalageHoraire();	
				//  -------------  fin carte ----------------

			} else {
				parInfoVille.textContent = `latitude : -90° à 90°, longitude: -180° à 180°.
				Votre sélection : lat ${e.latlng.lat}° et long ${e.latlng.lng}°`;
			}
		
		}
 
	}

	return objetVilleMeteo;
}


