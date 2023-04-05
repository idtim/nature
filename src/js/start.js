// initialisation de la librairie AOS pour les animations
AOS.init();

// vérification du format de l'adresse mail dans le formulaire de connection
function FormLoginCheck() {
    let mailFormat = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    let username = document.getElementById("cus_mail").value;
    
    if (mailFormat.test(username)) {
        return true
    } else {
        alert("Votre identifiant n'est pas valide !");
        return false;
    }
}