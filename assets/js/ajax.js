//*** Traitement des favoris */


function addFavorite ()
{
    // Je souhaite trouver l'id du post liké
    // Je cible l'élément parent qui contient un id unique par post
    let parent = this.parentElement;
    // console.log(parent);

    let xhr =new XMLHttpRequest();

    xhr.open("POST", "data.php", true);


    // Quand on transmet en POST il faut preciser le content type pour s'assurer d'un traitement correct
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");

    // Nous transmettons un nouvel argument afin de transmettre notre demande AJAX au serveur dans les meilleures conditions poissibles
    xhr.setRequestHeader("X-Requested-With","XMLHttpRequest");

    xhr.onreadystatechange = ()=>{
        if(xhr.readyState ==4 && xhr.status==200)
        {
            let result =xhr.responseText;
            console.log("Result: " + result);
            // si l'opération est un succes ( retour en true), alors on inject une nouvelle classe
            if(result == "true")
            {
                parent.classList.add("favorite");
            }
        }
    }
      

    xhr.send("id="+ parent.id);


}

let favButtons = document.getElementsByClassName("btn-favorite");
// console.log(favButtons);

// Je créé une boucle pour cibler tous mes éléments
for(let i = 0; i < favButtons.length; i++)
{
    favButtons.item(i).addEventListener("click",addFavorite);
}

//*** Traitement de la déconnexion */
function deconnectSession()
{
    let xhr = new XMLHttpRequest();

    let url = "data.php?a=deconnect";

    xhr.open("GET",url, true);

    xhr.setRequestHeader("X-Requested-With","XMLHttpRequest");

    xhr.onreadystatechange = () => {
        if(xhr.readyState ==4 && xhr.status==200)
        {
            let result = xhr.responseText;
            // console.log(result);
            if(result == "true")
            {
                let objBtnAsFav = document.getElementsByClassName("favorite");
                let btnAsFav = Object.values(objBtnAsFav);
                // console.log(btnAsFav);
                btnAsFav.forEach((item,index) => {
                    item.classList.remove("favorite");
                    
                });
            }

        }
    }

    xhr.send();


}

let btnDeconnect = document.getElementById("btn-deconnect");
btnDeconnect.addEventListener("click",deconnectSession)

//***** Traitement des remove favorite */

function removeFavorite()
{   
    // je souhaite retrouver l'id 
    let parent = this.parentElement.parentElement;
    // console.log(parent);

    let xhr = new XMLHttpRequest();

    xhr.open("POST","data.php",true);

    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");

    xhr.setRequestHeader("X-Requested-With","XMLHttpRequest");


    xhr.onreadystatechange = ()=>{
        if(xhr.readyState ==4 && xhr.status==200)
        {
            let result =xhr.responseText;

            // console.log("Result: " + result);

            if(result == "true")
            {
                parent.classList.remove("favorite");
            }
        }
    }



    xhr.send("id="+parent.id +"&remove");

}

let unfavButtons = document.getElementsByClassName("marker");
//  console.log(unfavButtons);

 for(i=0;i<unfavButtons.length;i++)
 {
    unfavButtons.item(i).addEventListener("click",removeFavorite);

 }
 