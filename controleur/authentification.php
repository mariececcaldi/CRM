<?php
use \Marie\CRM_LBC\Modele\UserManager;

require_once('../modele/UserManager.php');
session_start();
extract($_POST);
$manager = new UserManager();
$user = $manager->getFromLogin($login);

// Ici on différencie si l'utilisateur se trompe de login ou de mot de passe (peut etre non recommandé si l'appli devait etre ouverte au public)
if(!$user){
    // On redirige sur l'accueil avec un message d'erreur
    header("Location: ../index.php?erreur=1");
}
elseif(strtoupper($user['mdp']) != strtoupper(md5($mdp))) {
    // On redirige sur l'accueil avec un message d'erreur
    header("Location: ../index.php?erreur=2");
}
else {
    session_start();
    $_SESSION['user_id']    = $user['user_id'];
    $_SESSION['login']    = $login;
    $_SESSION['nom']      = $user['nom'];
    $_SESSION['prenom']    = $user['prenom'];
    header("Location: ../index.php");
}
