<?php
namespace Marie\CRM_LBC\Model;

Class UserManager{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=CRM_LBC;charset=utf8', 'root', 'root');
        return $db;
    }

  public function getFromLogin($login)
  {
    $db = $this->dbConnect();
    $contacts = [];
    $q = $db->query("select user_id, nom, prenom, mdp from users where login='".addslashes($login)."'");

    $donnees = $q->fetch(\PDO::FETCH_ASSOC);

  }

}