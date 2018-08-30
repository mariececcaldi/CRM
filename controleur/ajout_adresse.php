<?php
use \Marie\CRM_LBC\Modele\Adresse;
use \Marie\CRM_LBC\Modele\AdresseManager;

if(!empty($_POST)){
    require_once('../modele/Adresse.php');
    require_once('../modele/AdresseManager.php');
    $donnees = $_POST;
    $nouvelle_adresse = new Adresse($donnees);
    $manager = new AdresseManager();
    $manager->add($nouvelle_adresse);
    header("Location: ../index.php");
}
else{
    require('vues/header.php');
    require('vues/ajoutAdresseView.php');
    require('vues/footer.php');
}
