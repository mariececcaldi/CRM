<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
    
// Chargement du modele
require_once('modele/ContactManager.php');
require_once('modele/Contact.php');
require_once('modele/AdresseManager.php');
require_once('modele/Adresse.php');
require_once('modele/UserManager.php');

$action = '';
if(isset($_GET['action'])){
    $action = $_GET['action'];
}
    
// Si on a deja un utilisateur connecté on choisit le controleur en fonction des actions (par defaut l'affichage de ses contacts)
// S'il n'y a pas de user dans la variable de session alors on propose le formulaire d'authentification
if (isset($_SESSION['user_id'])){
    if($action == 'ajouter_contact'){
        include('controleur/ajout_contact.php');
    }
    elseif($action == 'modifier_contact'){
        require('controleur/modifie_contact.php');
    }
    elseif($action == 'ajouter_adresse'){
        include('controleur/ajout_adresse.php');
    }
    elseif($action == 'modifier_adresse'){
        require('controleur/modifie_adresse.php');
    }
    elseif($action == 'deconnexion'){
        require('controleur/deconnexion.php');
    }
    else{
        require('controleur/list_contacts.php');
    }
}
elseif(!isset($_SESSION['user_id'])){
    if(isset($_GET['erreur']))
    {
        if($_GET['erreur']== 1)
            echo "Cet identifiant n'existe pas.";
        if($_GET['erreur']== 2)
            echo "Ce mot de passe est erroné.";            
    }
    include('vues/authentificationView.php');
} 

