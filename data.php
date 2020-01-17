<?php


session_start();

if(!isset($_SESSION["favorites"])){$_SESSION["favorites"]=[];}

// Vérification de la requete AJAX coté serveur
function isAjaxRequest()
{
    return isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] == "XMLHttpRequest";

}

// Si le serveur ne recoit pas d'AJAX, alors nous quittons le script
if(!isAjaxRequest()){exit;}

/*
 ***Traitement des favoris
*/

if($_POST)
{
    // print_r($_POST);
    $id =isset($_POST["id"]) ? $_POST["id"] : "";
    // echo $id;
    // Nous passons la donnée dans un filtre ( REGEX) acceptant un ou plusieurs nombres et qui conservera cette valeur
    if(preg_match("/post-(\d+)/",$id,$filter))
    {
        // print_r($filter);
        $id =$filter[1];

        if(!in_array($id,$_SESSION["favorites"]))
        {
            $_SESSION["favorites"][] = $id ;
        }
        // traitement du retrait des favoris
        if(isset($_POST["a"]))
        {
            if(in_array($id,$_SESSION["favorites"]) && $_POST["a"] == "remove")
            {
                unset($_SESSION["favorites"][$id]);
            }
        }


        print "true";

    }else
    {
        print "false";
    }


}

/*
 ***Traitement de la deconnection
*/
if($_GET)
{
    // print_r($_GET);
    if(isset($_GET["a"]) && $_GET["a"] =="deconnect")
    {
        session_destroy();
        print "true";
    }
}






?>