// gestion du Canva de la page index.html
let canvas = document.getElementById("canvas");
let ctx = canvas.getContext("2d");
let screenWidth = canvas.width;
let screenHeight = canvas.height;

let lastUpdate = 0;                                 // variable pour la gestion du DeltaTime
let fps = 0;                                        // variable pour l'affichage des FPS

Load();
requestAnimationFrame(Run);                         // fonction qui améliore la fluidité des animations

// gameLoop
function Run(time){
    requestAnimationFrame(Run);
    
    // gestion du DeltaTime et des FPS
    let dt = (time - lastUpdate) / 1000;
    if (dt < (1 / 100) - 0.001) {                   // 100 = 100 fps ou moins (en fonction du taux de rafraichissement de l'écran)
        return;
    }
    lastUpdate = time;
    fps = 1 / dt;
    
    Update(dt);
    ctx.clearRect(0,0,canvas.width, canvas.height)  // effacement de l'écran
    Draw(ctx);
}