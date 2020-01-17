<a href="https://www.keepizi.com"><img src="https://www.nature-isere.fr/sites/default/files/styles/natureisere_large/public/images/temoignages/principale/iceland-2111810_1920.jpg?itok=PMXb-dCB" title="monSite" alt="monSite"></a>

***  exercice de mise en ligne d'un projet AJAX via Git ***

# ajout d'articles favoris

> Des articles apparaissent pour l'utilisateur.
Au clic, l'article est ajouté aux favoris via la session.
Lors du déclik l'icon favori disparait et  l'article est enlevé de la session.

> Tech : Ajax, Javascript, PHP

** N'oubliez pas de ...**
- Si vous souhaitez lier à une Base de données, créez votre fichier d'initialisation dans le dossier inc.
-Les articles apparaissent en "dur" dans notre undex, veuillez les remplacer par les votres.

> Ajout de notre GIF [![LES FAVORIS ](https://media.giphy.com/media/GHcm2aWIczatG/giphy.gif)]()

** table des matiere **

-[Explication](#explication)
-[Remerciements](#remerciements)



---
## explication
---
> Ajout d'une portion de code dans le readme

``` PHP

// retrait des favoris en session
 if(isset($_POST["a"]))
        {
            if(in_array($id,$_SESSION["favorites"]) && $_POST["a"] == "remove")
            {
                unset($_SESSION["favorites"][$id]);
            }
        }

```
- Pour retirer les favoris de ma SESSION, je regarde bien que l'action demandé est un "remove";
- Je fais concorder les $id envoyé en POST aavec les valeurs enregistrées en SESSION


---
## remerciements 
---

A tous les etudiants !

[![Veuillez visister notre site](https://media.giphy.com/media/ERMGXqtKTDKHC/giphy.gif)](https://www.keepizi.com)