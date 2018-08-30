<?php
use \Marie\CRM_LBC\Modele\Contact;
use \Marie\CRM_LBC\Modele\ContactManager;

if(!empty($_POST)){
    require_once('../modele/Contact.php');
    require_once('../modele/ContactManager.php');
    $donnees = $_POST;
    $contact_modifie = new Contact($donnees);
    $manager = new ContactManager();
    $manager->update($contact_modifie);
    // redirection sur l'accueil pour observer la modification
    header("Location: ../index.php");
}
else{
    require ('list_adresses.php');
    $manager = new ContactManager();
    $contact_a_modifier = $manager->getFromId($_GET['contact_id']);
    $adresses_contact_a_modifier = listAdresses($contact_a_modifier->contact_id());
    require('vues/header.php');
    require('vues/modificationContactsView.php');
    require('vues/footer.php');
}
