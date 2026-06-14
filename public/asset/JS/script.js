/*Toutes les interations
- recherche de plats
-envoi d'avis utilisateur
- validation de commande admin
- valitation de commande employé
*/

//*************** */ En attente de chargement de la page HTML 
document.addEventListener("DOMContentLoaded", function(){

    initSearch(); //recherche
    initAvis();  // avis
    initAdminCommande(); //admin
    initEmployeCommande(); //employé
    loadAllPlats(); // affiche tous les plats au chargement

});
/*==========================AFFICHER PLATS==========================*/


function afficherPlats(plats){
    const resultats = document.getElementById("resultats");
    resultats.innerHTML = "";

    plats.forEach(plat => {
        const div = document.createElement("div");
        div.classList.add("card");

        div.innerHTML = `
        <h3> ${plat.titre}</h3>
        <p>${plat.description}</p>
        <p class="prix">${plat.prix} € </p>
        <button class="btn-panier">Ajouter</button>
        `;

        //Bouton panier
        const btn = div.querySelector("button");
        btn.textContent = "Ajouter au panier";

        btn.addEventListener("click", async () =>{
            await fetch("/panier/add", { 
                method: "POST",
                headers:{"Content-Type":"application/json"},
                body: JSON.stringify({id: plat.idPlat})
            });

            alert("Ajouté au panier");
        });
        div.appendChild(btn); 
        resultats.appendChild(div);

    });
};

/* ============RECHERCHE DES PLATS========================= */

function initSearch(){
    //Recuperation des elements HTML
    const input = document.getElementById("searchInput");
    const resultats = document.getElementById("resultats");

    //si la page ne contient pas ces elements la fonction sarrete
    if(!input || !resultats) return;

    //On ecoute l'evenement quand utilisateur tape dans la barre de recherche
    input.addEventListener("keyup", async function () {

        //Recupeation du texte saisi
        const keyword = input.value;

         //evite les requetes inutile 
        if(keyword.length<2){
            resultats.innerHTML = "";
            return
        }

        try{
            //Requete fetch vers platController.php
            const response = await fetch(`/search?keyword=${keyword}`);

            //la responde devient du json
            const plats = await response.json();

            afficherPlats(plats);

        }catch(error){
            console.error("Erreur recherche : ", error);
        }
        
    });

}

/*==========================ENVOI AVIS UTILISATEUR=================== */

function initAvis(){
    const form = document.querySelector("#formAvis");

    //Si le formulaire existe pas arete de la page
    if(!form)return;

    form.addEventListener("submit", async function (e) {

        //Empeche le rechargement de la page
        e.preventDefault();

        //Recuperation des données du formulaire
        const formData = new FormData(form);

        try{
            //Envoi des données au serveur
            const response = await fetch("/review",{
                method:"POST",
                body:formData
            });

            const data = await response.json();
            alert("Avis envoyé avec succès");

            form.reset();
        }catch(error){
            console.error("Erreur avis:", error);
        }
    });
}

/*=====================VALIDATION COMMANDE ADMIN========================*/

function initAdminCommande(){
    const boutons = document.querySelectorAll(".validerCommande");

    if(!boutons.length)return;

    boutons.forEach (btn=>{
        btn.addEventListener("click", async function() {
            const id = this.dataset.id;

            try{
                const response = await fetch("/admin/commandes/valider",{
                    method:"POST",
                    headers:{
                        "Content-Type":"application/json"
                    },
                    body: JSON.stringify({id:id})
                });

                const data = await response.json();
                alert("Commande validée");
                location.reload();
            }catch(error){
                console.error("Erreur validation:", error);
            }
        });
    });
}

/*===============VALIDATION COMMANDE EMPLOYER============*/

function initEmployeCommande(){
    const boutons = document.querySelectorAll(".preparerCommande");
    if(!boutons.length)return;

    boutons.forEach(btn =>{
        btn.addEventListener("click", async function(){
            const id = this.dataset.id;

            try{
                const response = await fetch("employe/commandes/preparer",{
                    method: "POST",
                    headers:{
                        "Content-Type":"application/json"
                    }, 
                    body: JSON.stringify({id:id})
                });
                const data = await response.json();

                alert("Commande en préparation");
                location.reload();
            }catch(error){
                console.error("Erreur employé:", error);
            }
        });
    });
}
//Charge tout les plats 
async function loadAllPlats(){

    const resultats = document.getElementById("resultats");
    if(!resultats) return;

    try{
        const response = await fetch("/search?keyword=");
        const plats = await response.json();

        afficherPlats(plats);

    }catch(error){
        console.error("Erreur chargement plats :", error);
    }
}