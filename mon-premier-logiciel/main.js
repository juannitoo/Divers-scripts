const electron = require('electron')

// Permet de gérer les evenements système 
const app = electron.app

// Permet de gérer les fenetres 
const BrowserWindow = electron.BrowserWindow

// Gardez une référence globale de l'objet "window", 
// sinon la fenêtre se ferme automatiquement lorsque l'objet JavaScript est nettoyé. 
let mainWindow

// accés a node
const storeInit = require('./src/main/store-init-main')
const uploadVideoMain = require('./src/main/upload-video-main')
const supprVideo = require('./src/main/gestion-videos-main')
const uploadLogo = require('./src/main/upload-logo-main')

function createWindow () {
  // Création d'une fenetre en résolution 1000x750/    /  fullscreen: true, frame: false
  mainWindow = new BrowserWindow({width : 1000, height: 750})

  // active les outils de dev
  mainWindow.webContents.openDevTools()

  // La fenetre va charger notre fichier index.html 
  mainWindow.loadURL(`file://${__dirname}/src/index.html`) 

  // Cet evenement est déclenché lorsque la fenetre est fermée 
  mainWindow.on('closed', function () {
    // réinitialisation de l'objet "window" 
    mainWindow = null
  })
}

// Cet évenement est déclenché lorsque Electron a terminé son initialisation. On lance la création de la fenêtre à ce moment là 
app.on('ready', createWindow)

// Cet évenement est déclenché lorque toutes les fenêtres sont fermées (pour notre exemple nous n'avons qu'une seule fenêtre mais il est possble de gérer le multi-fentres) 
app.on('window-all-closed', function () {
  // Sur OS X, il est courant que les applications puissent rester active jusqu'à ce que l'utilisateur quitte explicitement via la commande "Cmd + Q" 
  if (process.platform !== 'darwin') {
    app.quit()
  }
})

app.on('activate', function () {
  // Sur OS X, il est courant de re-créer une fenêtre dans l'application lorsque l'icône du dock est cliqué et il n'y a pas d'autres fenêtres ouvertes. 
  if (mainWindow === null) {
    createWindow()
  }
})


