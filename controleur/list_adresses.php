
<?php
//use \Marie\CRM_LBC\Modele\Adresse;
use \Marie\CRM_LBC\Modele\AdresseManager;
//require_once('modele/AdresseManager.php');
//require_once('modele/Adresse.php');

function listAdresses($contact_id)
{
    $manager = new AdresseManager();
    $adresses_contact = $manager->getListFromContact($contact_id);
    return $adresses_contact;
}
