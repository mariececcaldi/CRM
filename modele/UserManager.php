<?php
namespace Marie\CRM_LBC\Modele;

Class UserManager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=CRM_LBC;charset=utf8', 'root', 'root');
        return $db;
    }
    
    public function getFromLogin($login)
    {
        $db = $this->dbConnect();
        $q = $db->query("select user_id, nom, prenom, mdp from users where login='".addslashes($login)."'");
        $user = $q->fetch(\PDO::FETCH_ASSOC);
        return $user;
    }
}
