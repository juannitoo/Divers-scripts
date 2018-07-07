<script src="jquery-1.9.1.min.js"></script>
<script>
	$(function(){
		//fond menu actif
		$('#embrayages').css('backgroundColor','rgb(50,150,255)').css('color','white');
	
		//obtention du modele				
		$('#marque').on('change', function(){
			$('#modele').children('.modeles_recus').remove(); //suppr des elements enfants
			$('#type_moteur').children('.types_recus').remove();
			$('#puissance').children('.puissances_recues').remove();
			if($('#marque option:selected').val()!=0){ //1 marque a été choisie
				$.ajax({
					url : 'ajax/ajax-voiture.php',
					type : 'POST',
					data : 'marque=' + $('#marque option:selected').text(),
					datatype : 'html',
					success : function(retour, statut){
					$('#modele').append(retour);
					}
				});	
			}
		});
		
		//obtention du type_moteur
		$('#modele').on('change', function(){
			$('#type_moteur').children('.types_recus').remove(); //suppr des elements enfants
			$('#puissance').children('.puissances_recues').remove();
			if($('#modele option:selected').val()!=0){ //1 modele a été choisie
				$.ajax({
					url : 'ajax/ajax-voiture-type-moteur.php',
					type : 'POST',
					data : 'marque=' + $('#marque option:selected').text() 
						+'&modele=' + $('#modele option:selected').text(),
					datatype : 'html',
					success : function(retour, statut){
					$('#type_moteur').append(retour);
					}
				});	
			}
		});
		
		//obtention de la puissance
		$('#type_moteur').on('change', function(){
			$('#puissance').children('.puissances_recues').remove(); //suppr des elements enfants
			if($('#type_moteur option:selected').val()!=0){ //1 type_moteur a été choisie
				$.ajax({
					url : 'ajax/ajax-voiture-puissance.php',
					type : 'POST',
					data : 'marque=' + $('#marque option:selected').text() 
						+'&modele=' + $('#modele option:selected').text() 
						+'&type_moteur=' + $('#type_moteur option:selected').text(),
					datatype : 'html',
					success : function(retour, statut){
					$('#puissance').append(retour);
					}
				});	
			}
		});
		
		//obtention des pieces
		$('#soumission').on('click', function(){
			$('#piece').children().hide('fast'); //suppression enfants
			if($('#marque option:selected').val()!=0){ //1 marque a été choisie
				if($('#modele option:selected').val()!=0){ //1 modele a été choisie
					if($('#type_moteur option:selected').val()!=0){ //1 modele a été choisie
						if($('#puissance option:selected').val()!=0){ //1 type_moteur a été choisie
							$.ajax({
								url : 'embrayage/embrayages-requete-ref-ajax.php',
								type : 'POST',
								data : 'marque=' + $('#marque option:selected').text() 
									+'&modele=' + $('#modele option:selected').text() 
									+'&type_moteur=' + $('#type_moteur option:selected').text()
									+'&puissance=' + $('#puissance option:selected').text(),
								datatype : 'html',
								success : function(retour, statut){
								$('#piece').append(retour);
								}
							});	
						}
					}
				}
			}
		});
		
	});
</script>
