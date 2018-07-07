function gestionVideos(){

    // cette fonction permet de gérer l'ordre des vidéos
    // et de les supprimer
    const Store = require('electron-store');
    const store = new Store();

    // je crée l'article
    const articleVideoStore = document.createElement('article');
    const buttonVideoStore = document.createElement('div');
    const paragVideoStore = document.createElement('p');
    const parInfoVideoStore =  document.createElement('span');
    const overlay = document.createElement('div');
    let storeVideoCourtes = store.get('videos');
    let storeVideoLongues = store.get('videosLongues');
    articleVideoStore.className = "article-param";
    articleVideoStore.id = "article-video-store";
    buttonVideoStore.id = "button-video-store";
    buttonVideoStore.textContent = "Afficher la liste des vidéos"
    paragVideoStore.className = "parag-param";
    paragVideoStore.id = "parag-videos-store";
    paragVideoStore.textContent = "Gérer vos vidéos : ";
    parInfoVideoStore.className = "parag-param";
    parInfoVideoStore.id = "par-info-video-store";
    overlay.id = "overlay";


    //j'accroche au body l'article et le bouton
    document.body.appendChild(articleVideoStore).appendChild(paragVideoStore)
    .appendChild(buttonVideoStore);
    document.body.appendChild(overlay);

    
    // Affichage de la liste des videos selon le store
    document.getElementById('button-video-store').addEventListener('click', () => {
        
        // this marche plus de la même facon avec la notation fléchée des fonctions !!
        let btn = document.getElementById('button-video-store');

        if (btn.textContent == "Afficher la liste des vidéos"){

            // pour supprimer l'ancien affichage si présent
            const divAenlever1 = document.getElementById('div-videos-courtes');
            if (divAenlever1 != null ) {
                if (divAenlever1) articleVideoStore.removeChild(divAenlever1)
                btn.textContent = "Afficher la liste des vidéos";

            } 

            // ici commence l'affichage traitement

            // apparition de l'overlay et recentrage liste videos
            overlay.classList.add('overlay');
            articleVideoStore.classList.add('article-video-store-overlay');

            // je renomme le bouton
            btn.textContent = "Masquer la liste des vidéos";

            let storeVideoCourtes = store.get('videos');


            // on informe l'utilisateur si il n'y a aucune video
            if (storeVideoCourtes.length == 0 ) {
                parInfoVideoStore.textContent = "Aucune vidéo. Importez-en !";
            }   

            
            // je crée les différents éléments correspondant aux videos
            // avec des id bien choisi pour pouvoir supprimer tout ça
            let divVideoCourte = document.createElement('div');
            divVideoCourte.id = "div-videos-courtes";
            for ( let i = storeVideoCourtes.length ; i > 0 ; i-- ){
                const imgClose = document.createElement('img');
                const pVideoCourtes = document.createElement('p');
                imgClose.src = "assets/images/croix-rouge.png";
                imgClose.title = "supprimer la vidéo";
                imgClose.className = "img-suppr-video";
                imgClose.id = 'imgV'+storeVideoCourtes[i-1].id;
                imgClose.onclick = suppression;           
                pVideoCourtes.className = "p-videos-courtes";
                pVideoCourtes.textContent = storeVideoCourtes[i-1].nom;
                pVideoCourtes.id = "par-suppr-V"+storeVideoCourtes[i-1].id;
                pVideoCourtes.appendChild(imgClose);
                divVideoCourte.appendChild(pVideoCourtes);
            }

        
            // j'accroche la liste
            articleVideoStore.appendChild(divVideoCourte);
            articleVideoStore.appendChild(parInfoVideoStore);

            // je lance le drag n drop et la sauvegarde au relacher
            // je passe tout les éléments du store en revue 
            // je dois récupérer les infos qui correspondent au idDom
            // et je crée un nouveau tableau que j'envoie au store. 
            // J'annonce, c'est compliqué, je laisse les console.log
            const Sortable = require('sortablejs');
            let sortable = Sortable.create(divVideoCourte, {
                onEnd: () => {
                    let tableauOrdreVideos = new Array();
                    let tableauAenvoyer = new Array();
                    let tableauIdStore = new Array ();

                    // je recupère l'ordre des divs dans un tableau
                    for (let i = 0; i < sortable.el.childNodes.length; i++ ){
                        let idDomNumber = parseInt(sortable.el.childNodes[i].id.substring(11,14));
                        // unshift pour respecter l'ordre et pas push()
                        tableauOrdreVideos.unshift(idDomNumber);                       
                    }
                    // console.log(tableauOrdreVideos);

                    // je recupère les id des videos dans le store dans 
                    for (let i = 0; i < storeVideoCourtes.length; i++){                       
                        tableauIdStore.push(storeVideoCourtes[i].id);
                    }
                    // console.log(tableauIdStore)

                    // j'associe les deux valeurs. Pour ça j'énumere le tableauOrdreVideos
                    // je récupère l'index correspondant à l'id dans le store qui correspondont 
                    // lui a la valeur de tableauOrdreVideos. Ouf !
                    tableauOrdreVideos.forEach(function(element) {
                        // console.log(element);
                        let indexVideoStore = tableauIdStore.indexOf(element)
                        // console.log('tableauIdStore : ' + element + ' indexVideoStore : ' + indexVideoStore);
                        let objetVideo = {};
                        objetVideo.source = storeVideoCourtes[indexVideoStore].source;
                        objetVideo.duree = storeVideoCourtes[indexVideoStore].duree;
                        objetVideo.nom = storeVideoCourtes[indexVideoStore].nom;
                        objetVideo.id = storeVideoCourtes[indexVideoStore].id;
                        // console.log(objetVideo);
                        tableauAenvoyer.push(objetVideo);
                    });
                    // console.log(tableauAenvoyer);
                    store.set('videos', tableauAenvoyer);
                }
            });
            // console.log(storeVideoCourtes)
            
        } else{

            // j'éfface l'affichage l'overlay et des div de l'article
            overlay.classList.remove('overlay');
            document.getElementById('article-video-store').classList.remove('article-video-store-overlay');
            document.getElementById('button-video-store').textContent = "Afficher la liste des vidéos";
            
            let divVideoCourte = document.getElementById("div-videos-courtes");
            divVideoCourte.parentNode.removeChild(divVideoCourte);

        }

    });


    // on supprime l'overlay et la liste au click sur l'overlay
    overlay.addEventListener('click', () => {
        overlay.classList.remove('overlay');
        document.getElementById('article-video-store').classList.remove('article-video-store-overlay');
        document.getElementById('button-video-store').textContent = "Afficher la liste des vidéos";
        
        let divVideoCourte = document.getElementById("div-videos-courtes");
        divVideoCourte.parentNode.removeChild(divVideoCourte);
    });



    // pour supprimer, je renvoie un json modifié
    // et je lance le script de suppresion node
    function suppression() {

        //je recup l'id de l'image crois cliqué
        const eltId = this.id;
        // je détermine le store   
        let quelStore = "videos";

        // je recup la valeur VL ou VC contenu dans l'id de img
        // pour savoir quel storage on utilise
        // if ( eltId.substring(3,5) == 'VL'){
        //     quelStore = "videosLongues"
        // } else {
        //     quelStore = "videos"
        // }

        // let listeVideos = store.get(quelStore);
        let listeVideos = store.get("videos");

        let nvelleListe = [];

        for (let i = 0; i < listeVideos.length; i++) {
            // je compare l'id du stockage à l'id de l'élément cliqué
            // jusqu'a 999 videos (5,8)
            if ( parseInt(listeVideos[i].id) != parseInt(eltId.substring(4,7)) ){
                // je réinitialise l'id de la video dans le json
                // listeVideos[i].id = i;
                // on push  
                nvelleListe.push(listeVideos[i]);

            } else {
                // on push pas et on supprime donc du json
                // reste le dom 
                // on renvoie l'id "VC0" ou "VL2" (videoCourte0) et on remove
                var eltAsupprimer = document.getElementById("par-suppr-"+eltId.substring(3,8));
                eltAsupprimer.remove();

                // on envoie la requete de suppression de fichier a node
                let ipcRenderer = require('electron').ipcRenderer;

                // store ne sert plus depuis la maj a 1 boucle
                infoVideo = { "nom" : eltAsupprimer.textContent,
                                "store" : quelStore
                            }

                ipcRenderer.send('supprVideo', infoVideo);
            }
            
        }

        store.set(quelStore, nvelleListe);
       
    }
}