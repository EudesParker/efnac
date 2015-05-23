<?php
    require("smarty/Smarty.class.php"); //require est identique à include, inclut et exécute le fichier spécifié en argument. On inclut la classe Smarty
    include("model/functions.php"); //inclusion des fonctions php
    require("model/model.php");  // On inclut le fichier contenant les données model.php
    require("controllers/control.php");
    require("controllers/panier.php");
    require("controllers/gestionerreurs.php");
    
    $smarty->display('vue/haut.tpl'); // inclusion du fichier haut.tpl qui contient les informations qui ne change pas à savoir les balises tels <!doctype>, <html>, <head>, <body>, le header etc.
    /*************************************/
    if((isset($_GET['tab'])) AND (isset($ValidTab[$_GET['tab']])))
        include($ValidTab[$_GET['tab']]);
    else
        header('Location: index.php?tab=film');
    /*************************************/
    $smarty->display('vue/bas.tpl');// inclusion du fichier bas.tpl qui contient les informations qui ne change pas à savoir la fermeture des balises <html>, <body>, le footer etc.
    //Affiche les informations des variables superglobale
    //superGlobale();
?>