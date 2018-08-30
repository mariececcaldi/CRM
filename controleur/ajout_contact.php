<?php
use \Marie\CRM_LBC\Modele\Contact;
use \Marie\CRM_LBC\Modele\ContactManager;
use \Marie\CRM_LBC\Modele\Adresse;
use \Marie\CRM_LBC\Modele\AdresseManager;

if(!empty($_POST)){
    session_start();
    require_once('../modele/Contact.php');
    require_once('../modele/ContactManager.php');
    $donnees_contact['nom']     = $_POST['nom'];
    $donnees_contact['prenom']  = $_POST['prenom'];
    $donnees_contact['email']   = $_POST['email'];
    $donnees_contact['user_id'] = $_SESSION['user_id'];
    $nouveau_contact = new Contact($donnees_contact);
    $manager = new ContactManager();
    $last_id = $manager->add($nouveau_contact);
    if($_POST['numero_et_rue']!='' ||$_POST['code_postal']!='' ||$_POST['ville']!='' ||$_POST['pays']!='' ){
        require_once('../modele/Adresse.php');
        require_once('../modele/AdresseManager.php');
        $donnees_adresse['numero_et_rue']         = $_POST['numero_et_rue'];
        $donnees_adresse['code_postal'] = $_POST['code_postal'];
        $donnees_adresse['ville']       = $_POST['ville'];
        $donnees_adresse['pays']        = $_POST['pays'];
        $donnees_adresse['contact_id']  = $last_id;
        $nouvelle_adresse = new Adresse($donnees_adresse);
        $manager_adresse = new AdresseManager();
        $manager_adresse->add($nouvelle_adresse);
    }
    header("Location: ../index.php");
}
else{
    require('vues/header.php');
    require('vues/ajoutContactsView.php');
    require('vues/footer.php');
}
