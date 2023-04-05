// module qui identifie et exécute les commandes du terminal
function CommandManager() {
    // lancement du jeu du Pendu
    if (keyBufferLine.toLocaleLowerCase().indexOf("run hangman") != -1 && keyBufferLine.length == 11) RunHangman();
    // nettoyage du terminal
    if (keyBufferLine.toLocaleLowerCase().indexOf("cls") != -1 && keyBufferLine.length == 3) ClearTerminal();
}

function RunHangman() {
    state = "hangman";
    Load();
}

function ClearTerminal() {
    keyBuffer = [];
    posCurCol = 1;
    posCurLin = 1;
}