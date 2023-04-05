// déclarations des variables
let secretWord = "pendu";
let result = [];
let letter = "";
let nbLetterFind = 0;
let attempsMax = 13;
let attemps = attempsMax;
let hangMessage = "";
let nbPoints = "";
let posX = 10;  
let posY = 20;
let offset = 0;
let centering = 0;
let start = false;
let endGame = false;

function HangmanLoad() {
    endGame = false;
    letter = "";
    result = []
    nbLetterFind = 0;
    attemps = attempsMax;
    // gestion de la police de caractère
    let font = new FontFace("MyFont", "url(./assets/fonts/Px437_Amstrad_PC.ttf)");
    document.fonts.add(font);
    // initialisation de la variable result avec des "*"
    for (let i = 0; i < secretWord.length; i++) {
        result[i] = "*";
    }
    centering = (screenWidth / 2) - ((15 * result.length)/2) - posX;
}

function HangmanUpdate(pDt) {
    offset = 0; // RAZ du décalage pour l'affichage des étoiles
}

function HangmanDraw(pCtx) {
    pCtx.font = "normal 12px MyFont";   // active la font dans le canva
    pCtx.fillStyle = myGreen;           // active la couleur verte
    
    // affichage de bienvenue
    pCtx.fillText("Bienvenue dans le jeu du pendu !", posX, posY + 0);
    pCtx.fillText("Tu as " + attempsMax + " tentatives possibles.", posX, posY + 40);
    pCtx.fillText("Bonne chance !", posX, posY + 60);
    pCtx.fillText("Trouve le mot caché sous les étoiles :", posX, posY + 100);
    
    // affichage du mot masqué et des lettres trouvées pendant le jeu
    for (let i in result) {
        pCtx.fillText(result[i].toUpperCase(), posX + offset + centering, posY + 140);
        offset += 15;
    }
    
    pCtx.fillText("Propose une lettre :", posX, posY + 180);
    pCtx.fillText(letter, posX + 300, posY + 180);
    
    pCtx.fillText("Nombre de tentatives restantes : " + attemps, posX, posY + 220);
    pCtx.fillText(message, posX, posY + 240);
    
    // message final
    if (nbLetterFind == secretWord.length) {
        nbPoints = 10000 + (attemps * secretWord.length * 100);
        pCtx.fillText("Bravo, tu as trouvé le mot secret \"" + secretWord + "\"", posX, posY + 260);
        pCtx.fillText("Il te restait " + attemps + " tentatives.", posX, posY + 280);
        pCtx.fillText("Tu obtiens donc " + nbPoints + " points !", posX, posY + 300);
        EndGame(pCtx);
    } else if (attemps == 0) {
        pCtx.fillText("Perdu, le mot secret était : \"" + secretWord + "\"", posX, posY + 260);
        EndGame(pCtx);
    }
}

function HangmanKeyPressed(t) {
    // gestion des touches et des messages à afficher pendant le jeu
    if (start) {
        if (attemps > 0 && nbLetterFind < secretWord.length) {
            letter = t.key;
            if (result.indexOf(letter) >= 0) {
                message = "Recommence car tu as déjà trouvé cette lettre !";
            } else if (secretWord.indexOf(letter) >= 0 || secretWord.indexOf(letter.toUpperCase()) >= 0) {
                for (let i = 0; i < secretWord.length; i++) {
                    if (letter == secretWord[i] || letter.toUpperCase() == secretWord[i]) {
                        result[i] = letter;
                        nbLetterFind++;
                        message = "Bien joué, tu as trouvé une lettre du mot secret !"
                    }
                }
            } else {
                attemps--;
                message = "Dommage, cette lettre n'est pas dans le mot secret !"
            }
        }
    }
    start = true;   // permet de ne pas prendre en compte l'appuie de la touche "entrée" de la commande du terminal
    
    if (endGame && (t.key == "o" || t.key == "n")) {
        letter=t.key;
    }
}

function EndGame(pCtx) {
    endGame = true;
    pCtx.fillText("Veux-tu refaire une partie ? (o/n)", posX, posY + 320);
    if (letter == "n") {
        state = "terminal";
        Load();
    } else if (letter == "o") {
        Load();
    }
}