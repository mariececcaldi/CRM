<?php
use \Marie\CRM_LBC\Modele\UserManager;

require_once('../modele/UserManager.php');
session_start();
extract($_POST);
$manager = new UserManager();
$user = $manager->getFromLogin($login);

if(!$user){
    header("Location: ../index.php?erreur=1");
}
elseif(strtoupper($user['mdp']) != strtoupper(md5($mdp))) {
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
