let state = "terminal";
let myGreen = "rgba(67, 176, 0, 255)";

function Load() {
    // gestion du clavier
    document.addEventListener("keydown", KeyPressed, false);
    document.addEventListener("keyup", KeyReleased, false);

    if (state == "terminal") TerminalLoad();
    if (state == "hangman") HangmanLoad();
}

function Update(pDt){
    if (state == "terminal") TerminalUpdate(pDt);
    if (state == "hangman") HangmanUpdate(pDt);
}

function Draw(pCtx){
    pCtx.save();    // sauvegarde du canva par défaut
    if (state == "terminal") TerminalDraw(pCtx);
    if (state == "hangman") HangmanDraw(pCtx);

    pCtx.restore(); // retauration du canva par défaut
}

function KeyPressed(t){
    t.preventDefault(); // évite le fonctionnement par défaut de la touche pour ne pas envoyer l'action a la page html
    
    // permet de savoir si une touche reste enfoncée
    if (t.code == "ArrowUp") keyUp = true;
    if (t.code == "ArrowRight") keyRight = true;
    if (t.code == "ArrowDown") keyDown = true;
    if (t.code == "ArrowLeft") keyLeft = true;
    if (t.code == "Space") keySpace = true;
    if (t.code == "Enter") keyEnter = true;
    
    if (state == "terminal") TerminalKeyPressed(t);
    if (state == "hangman") HangmanKeyPressed(t);
}

function KeyReleased(t){
    t.preventDefault(); // évite le fonctionnement par défaut de la touche pour ne pas envoyer l'action a la page html
    
    // permet de savoir si une touche reste enfoncée
    if (t.code == "ArrowUp") keyUp = false;
    if (t.code == "ArrowRight") keyRight = false;
    if (t.code == "ArrowDown") keyDown = false;
    if (t.code == "ArrowLeft") keyLeft = false;
    if (t.code == "Space") keySpace = false;
    if (t.code == "Enter") keyEnter = false;
}