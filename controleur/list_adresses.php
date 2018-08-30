
<?php
use \Marie\CRM_LBC\Modele\AdresseManager;

function listAdresses($contact_id)
{
    $manager = new AdresseManager();
    $adresses_contact = $manager->getListFromContact($contact_id);
    return $adresses_contact;
}
