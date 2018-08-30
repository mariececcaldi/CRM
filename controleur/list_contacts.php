
<?php
//use \Marie\CRM_LBC\Modele\Contact;
use \Marie\CRM_LBC\Modele\ContactManager;
//require_once('modele/ContactManager.php');
//require_once('modele/Contact.php');
require ('list_adresses.php');

function listContacts()
{
    $manager = new ContactManager();
    $contacts = $manager->getListFromUser($_SESSION['user_id']);
    return $contacts ;
}

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