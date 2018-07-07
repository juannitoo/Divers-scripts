const fse = require('fs-extra'),
    path = require("path");
const {app} = require('electron');    
const {ipcMain} = require('electron');
let pathVideo;

ipcMain.on('supprVideo', (event, infoVideo) => {

    pathVideo = "../../src/assets/videos/"+infoVideo.nom;

    console.log(path.join(__dirname, pathVideo))
    fse.remove(path.join(__dirname, pathVideo), err => {
        if (err) return console.error(err)    
        console.log('video supprimee')
    })
});