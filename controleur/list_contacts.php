
<?php
use \Marie\CRM_LBC\Modele\ContactManager;

require ('list_adresses.php');

function listContacts()
{
    $manager = new ContactManager();
    $contacts = $manager->getListFromUser($_SESSION['user_id']);
    return $contacts ;
}
// Ici on veut afficher pour chaque contact toutes les adresses qui leur sont associées
$contacts = listContacts();
$mes_contacts = array();
foreach($contacts as $k=>$contact)
{
    $mes_contacts[$k]['contact'] = $contact;
    $adresse_contact = listAdresses($contact->contact_id());
    $mes_contacts[$k]['adresses'] = $adresse_contact;
}
require('vues/header.php');
require('vues/listContactsView.php');
require('vues/footer.php');
