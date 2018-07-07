# Suite mon titre pro de développeur logiciel

Je me suis dit que je devais réaliser mon premier logiciel.
L'objectif est dans un premier d'être présent sur le store de microsoft, au niveau mondial
pour comprendre comment ca marche, et éventuellement si ça plait, gagner un peu d'argent.
Je n'y connais encore rien, mais je ne suis pas inquiet.
C'est un logiciel de vidéos qui répond à la demande d'un ami pour son entreprise, et pour laquelle 
je n'ai pas trouvé quelque chose de tout fait. Je me suis donc dit: "C'est pour moi ça" vu que je trouve l'idée bonne.
Je me suis lancé dans l'aventure grâce au framework JS Electron que j'ai découvert pour l'occasion.


* Electron utilise un script de 1er niveau NodeJs sur lequel on vient déclarer nos scripts NodeJs 
et le point d'entrée de notre application (index.html qu'on lie à app.js)
* il y a donc 2 process, 1 processus front (renderer), et un back (main)
* Après, on peut faire comme on le souhaite, avec ou sans framework JS, comme une appli normale du web
On a accès aux fichiers systèmes grace aux modules "fs" ou "fs-extra" mis à disposition, et on communique entre les 2 
processus front-back avec des fonctions spécifiques.
* Je l'estime très pratique si on dispose déjà de quelque chose de tout fait comme une appli Angular
ou il n'y aura plus, dans les grandes lignes, qu à modifier les services, éventuellement interagir avec 
les fichiers "système" si besoin, créer un script de build et vous aurez un programme.
* C'est justement ce script de build qui me pose le plus de problême, le .msi bloque lors de l'installation,
la seule version qui fonctionne pour l'instant, c'est la version "portable" qui arrive dans un dossier 
au milieu de 50 fichiers et dll (Ma mère ne saurait pas ou cliquer !) J'avais pu voir que Slack avait 
des problèmes aussi pendant un temps. 
* Mon éditeur "VScode" est réalisé avec Electron, et quand je vois comment j'en suis content, 
je reste enthousiaste. Il ne plante jamais (normal vous me direz), les maj se passe en douceur,
les améliorations sont constantes. De plus, avec le même code Electron, on est multi-plateforme, au détriment
de la performance "pure", temps d'éxécuion + lent, + de ram consommée. Mais c'est bon, je vais m'en accomoder :)
Surtout que je ne connais aucun langage comme le C ou autres, à part les bases du Python, que j'ai apprises récemment.


Il ne marchera pas si vous le téléchargez. Je vous mets seulement des exemples, mais qui fonctionent quand ils sont liés.

