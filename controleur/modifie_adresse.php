<?php
use \Marie\CRM_LBC\Modele\Adresse;
use \Marie\CRM_LBC\Modele\AdresseManager;

if(!empty($_POST)){
    require_once('../modele/Adresse.php');
    require_once('../modele/AdresseManager.php');
    $donnees = $_POST;
    $adresse_modifie = new Adresse($donnees);
    $manager = new AdresseManager();
    $manager->update($adresse_modifie);
    header("Location: ../index.php");
}
else{
    $manager = new AdresseManager();
    $adresse_a_modifier = $manager->getFromId($_GET['adresse_id']);
    require('vues/header.php');
    require('vues/modificationAdresseView.php');
    require('vues/footer.php');
}
