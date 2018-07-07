const fse = require('fs-extra'),
    path = require("path");
const {app} = require('electron');    
const {ipcMain} = require('electron');
const Store = require('electron-store');
const store = new Store();

// à la reception d'une video
ipcMain.on('submitVideo', (event, formData) => {

    //je recup le store
    let storageVideos = store.get('videos');
    let pathDossier = "../../src/assets/loop_user_files/";

    // je copie le fichier
    fse.copy(formData.path, path.join(__dirname, pathDossier) + formData.name , err => {    
        if (err) return console.error(err)
    })

    // pour determiner l'id de la vidéo
    // on teste d'abord les id présents
    // et on attribue le 1er dispo 
    let itemStore = store.get('videos');
    let tableauId = [];
    let idVideo;
    for (let i = 0; i < itemStore.length; i++) {       
        tableauId.pop(itemStore[i].id);
    }
    for (let i = 0; i <= itemStore.length; i++) {
        if (tableauId.includes(i)){
            continue; 
        }else{
            idVideo = i;
        }            
    }

    let newVideo = {"source": path.join(__dirname, pathDossier) + formData.name,
                    "duree": formData.duree,
                    "nom": formData.name,
                    "id" : idVideo
                    }
    // unshift a la place de push pour mettre au début du tableau
    // comme ca la dernière videos ajoutée est jouée en dernier
    storageVideos.unshift(newVideo);
    store.set("videos", storageVideos);       
    console.log('video uploadee !');
    event.sender.send('submitVideoReply', `Votre vidéo "${newVideo.nom}" a bien été importée`);
    
    ipcMain.removeAllListeners(['submitVideoReply']);
});


