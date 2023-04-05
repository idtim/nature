// déclaration des variables
let timer = 0;
let cursorOn = false;
let keyBuffer = [];
let keyBufferLine = "";
let posCurCol = 1;
let posCurLin = 1;
let colMax = 60;
let linMax = 25;
let scale = 1;

function TerminalLoad() {
    // gestion de la police de caractère
    let font = new FontFace("MyFont", "url(./assets/fonts/LEDCalculator.ttf)");
    document.fonts.add(font);
}

function TerminalUpdate(pDt) {
    // clignotement du curseur
    if(timer >= 1 && timer < 2){
        cursorOn = true;
    } 
    else if (timer >= 2) { 
        cursorOn = false;
        timer = 0;
    }
    
    timer = timer + pDt
}

function TerminalDraw(pCtx) {
    // position intiale du premier caractère
    let keyX = 15;
    let keyY = 15;
    
    pCtx.font = "normal 16px MyFont";   // active la font dans le canva
    pCtx.fillStyle = myGreen;           // active la couleur verte
    pCtx.fillText(">", 1, 15);          // affiche le chevron de début de ligne
    
    // gestion de l'affichage des caractères du terminal
    for (i = 0; i < keyBuffer.length; i++) {
        // décalage en horizontal
        if (keyBuffer[i].length == 1) { 
            pCtx.fillText(keyBuffer[i], keyX, keyY);
            keyX += 10;
        }
        // décalage en vertical
        if (keyBuffer[i] == "Enter") {
            keyY += 15;
            keyX = 15;
            pCtx.fillText(">", 1, keyY);
        }
    }
    
    // gestion du curseur
    if (cursorOn) {
        pCtx.fillText("_", keyX, keyY);
    }
}

function TerminalKeyPressed(t) {
    // gestion des touches de texte
    if (t.key.length == 1 && posCurCol <= colMax) {
        WriteKeyBuffer(t.key);
        keyBufferLine += t.key;
    }
    
    // gestion des touches d'option
    if (t.key != "Enter" && t.key != "Backspace" && t.key != "Control" && t.key != "Shift" && t.key != "Alt" && posCurCol <= (colMax)) posCurCol++;
    
    // gestion de la touche d'effacement
    if (t.key == "Backspace") {
        if (posCurCol == 1 && posCurLin > 1) {
            posCurLin--;
            DeleteKeyBuffer(t.key);
            let sizeLastLine = 0;
            if (keyBuffer.indexOf("Enter") != -1) {
                for (let i = keyBuffer.length - 1; keyBuffer[i] != "Enter"; i--) {
                    sizeLastLine++;
                    posCurCol = sizeLastLine + 1;
                }
            } else {
                posCurCol = keyBuffer.length + 1;
            }
        } else if (posCurCol > 1) {
            posCurCol--;
            DeleteKeyBuffer(t.key);
        }
    }
    // gestion de la touche entrée
    if (t.key == "Enter") {
        posCurCol = 1;
        posCurLin++;
        WriteKeyBuffer(t.key);
        CommandManager();
        while (posCurLin > linMax) {
            CutKeyBuffer();
        }
        keyBufferLine = "";
    }

    // affichage temp
    console.log(keyBuffer);
    console.log(keyBufferLine);
    console.log("CurCol : " + posCurCol, "CurLin : " + posCurLin);
}

// ajoute chaque caractère au buffer
function WriteKeyBuffer(pKey) {
    keyBuffer.push(pKey);
}

// supprime chaque caractère au buffer et du bufferline
function DeleteKeyBuffer(pKey) {
    keyBuffer.pop();
    keyBufferLine = keyBufferLine.slice(0, -1);
}

// nettoyage du buffer en cas de dépacement de la ligne maximum
function CutKeyBuffer() {
        while (keyBuffer[0] != "Enter") {
            keyBuffer.shift();
        } 
        posCurLin--;
        keyBuffer.shift();
}