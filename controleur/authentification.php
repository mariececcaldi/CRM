<?php
    session_start();
    extract($_POST);
    $db = new PDO('mysql:host=localhost;dbname=CRM_LBC', 'root', 'root');
    $req = $db->query("select user_id, nom, prenom, mdp from users where login='".addslashes($login)."'") ;
    $data =  $req->fetch(PDO::FETCH_ASSOC);

    if(!$data){
        header("Location: ../index.php?erreur=1");
    }
    elseif(strtoupper($data['mdp']) != strtoupper(md5($mdp))) {
        header("Location: ../index.php?erreur=2");
    }
    else {
        session_start();
        $_SESSION['user_id']    = $data['user_id'];
        $_SESSION['login']    = $login;
        $_SESSION['nom']      = $data['nom'];
        $_SESSION['prenom']    = $data['prenom'];
        header("Location: ../index.php");
    }   
    
    
    
