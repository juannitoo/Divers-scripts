function choixFormatDate() {

    const Store = require('electron-store');
    const store = new Store();  
    const objetChoixDate = {}

    // cette méthode permet d'accrocher l'article + input 
    // a n'importe quel noeud
    objetChoixDate.affiche = (noeudParent) =>{

        const ChoixDateInputFr = document.createElement('input');
        const ChoixDateInputEn = document.createElement('input');
        const ChoixDateInputCn = document.createElement('input');
        const ChoixDateInputCoree = document.createElement('input');
        const h3ChoixDate = document.createElement('h3');
        const articleChoixDate = document.createElement('article');
        const paragChoixDate = document.createElement('p');
        const parInfoChoixDate =  document.createElement('span');
        const labelFr = document.createElement('label');
        const labelEn = document.createElement('label');
        const labelCn = document.createElement('label');
        const labelCoree = document.createElement('label');
        // pour défirencier les input et avoir un bon alignement
        // je crée 2 boites dans 1, 1 a droite ac valeur verticale (45%), 
        // et 1 a gauche.

        articleChoixDate.className = "article-param-meteo";
        paragChoixDate.id = "parag-choix-date";
        h3ChoixDate.textContent = "Choisissez le format de la date";
        h3ChoixDate.id = "h3-choix-date";
        parInfoChoixDate.id = "par-info-choix-date";

        ChoixDateInputFr.type = "radio";
        ChoixDateInputFr.name ="choix-date";
        ChoixDateInputFr.id = "choix-date-fr";
        ChoixDateInputFr.value = "Fr";
        ChoixDateInputEn.type = "radio";
        ChoixDateInputEn.name ="choix-date";
        ChoixDateInputEn.id = "choix-date-en";
        ChoixDateInputEn.value = "En";
        ChoixDateInputCn.type = "radio";
        ChoixDateInputCn.name ="choix-date";
        ChoixDateInputCn.id = "choix-date-chine";
        ChoixDateInputCn.value = "Cn";
        ChoixDateInputCoree.type = "radio";
        ChoixDateInputCoree.name ="choix-date";
        ChoixDateInputCoree.id = "choix-date-coree";
        ChoixDateInputCoree.value = "Coree";

        labelFr.for = "choix-date-fr";
        labelFr.id = "labelFr";
        labelFr.textContent = '31 / 12';
        labelEn.for = "choix-date-en";
        labelEn.id = "labelEn";
        labelEn.textContent = '12 - 31';
        labelCn.for = "choix-date-chine";
        labelCn.id = "labelCn";
        labelCn.textContent = '12月31日';
        labelCoree.for = "choix-date-coree";
        labelCoree.id = "labelCoree";
        labelCoree.textContent = '12월 31일';

        const parChoixDate1 = document.createElement('p');
        const parChoixDate2 = document.createElement('p');
        const retourChariot = document.createElement('br');
        const retourChariot2 = document.createElement('br');
        parChoixDate1.id = "par-choix-date1";
        parChoixDate2.id = "par-choix-date2";

        //j'accroche les éléments
        noeudParent.appendChild(articleChoixDate).appendChild(h3ChoixDate);
        articleChoixDate.appendChild(paragChoixDate);
        parChoixDate1.appendChild(labelFr);
        parChoixDate1.appendChild(ChoixDateInputFr);
        parChoixDate1.appendChild(retourChariot);
        parChoixDate2.appendChild(ChoixDateInputEn);
        parChoixDate2.appendChild(labelEn);
        parChoixDate2.appendChild(retourChariot2);
        parChoixDate1.appendChild(labelCn);
        parChoixDate1.appendChild(ChoixDateInputCn);       
        parChoixDate2.appendChild(ChoixDateInputCoree);
        parChoixDate2.appendChild(labelCoree);
        paragChoixDate.appendChild(parChoixDate1);
        paragChoixDate.appendChild(parChoixDate2);
        articleChoixDate.appendChild(parInfoChoixDate);

        if ( store.get('format-date') == "jj/mm" ) {
            ChoixDateInputFr.checked = "checked";
        } else if ( store.get('format-date') == "mm-jj" ) {
            ChoixDateInputEn.checked = "checked";
        } else if ( store.get('format-date') == "mm月jj日" ) {
            ChoixDateInputCn.checked = "checked";
        } else {
            ChoixDateInputCoree.checked = "checked";
        }

        // japon - chine : mois se traduit par " 月 ", jour par " 日 "
        // donc format date pour 31/12 : " 12月31日 "

        // corée : mois se traduit par " 월 ", jour par " 일 "
        // donc format date pour 31/12 : " 12월 31일 "

        ChoixDateInputFr.addEventListener('click', () => {
            store.set('format-date', "jj/mm");
            parInfoChoixDate.textContent = 'France - Europe - America del sùr - Africa - Russia ...';
        })
        ChoixDateInputEn.addEventListener('click', () => {
            store.set('format-date', "mm-jj");
            parInfoChoixDate.textContent = 'USA - Canada - Saudi Arabia - Qatar - Bahrein ...';
        })
        ChoixDateInputCn.addEventListener('click', () => {
            store.set('format-date', "mm月jj日");
            parInfoChoixDate.textContent = 'China - Japan - Taiwan ...';
        })
        ChoixDateInputCoree.addEventListener('click', () => {
            store.set('format-date', "mm월 jj일");
            parInfoChoixDate.textContent = 'South Korea';
        })
    }

    return objetChoixDate;
}