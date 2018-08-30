<?php
namespace Marie\CRM_LBC\Modele;

Class AdresseManager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=CRM_LBC;charset=utf8', 'root', 'root');
        return $db;
    }

    public function add(Adresse $adresse)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('INSERT INTO adresses (numero_et_rue, code_postal, ville, pays, contact_id) VALUES(:numero_et_rue, :code_postal, :ville, :pays, :contact_id)');
        $q->bindValue(':numero_et_rue', $adresse->numero_et_rue(), \PDO::PARAM_STR);
        $q->bindValue(':code_postal', $adresse->code_postal(), \PDO::PARAM_STR);
        $q->bindValue(':ville', $adresse->ville(), \PDO::PARAM_STR);
        $q->bindValue(':pays', $adresse->pays(), \PDO::PARAM_STR);
        $q->bindValue(':contact_id', $adresse->contact_id(), \PDO::PARAM_INT);
        $q->execute();
    }

    public function getFromId($adresse_id)
    {
        $db = $this->dbConnect();
        $q = $db->query('SELECT * FROM adresses WHERE adresse_id = '.$adresse_id);
        $donnees = $q->fetch(\PDO::FETCH_ASSOC);
        $adresse = new Adresse($donnees);
        return $adresse;
    } 

    public function getListFromContact($contact_id)
    {
        $db = $this->dbConnect();
        $adresses = [];
        $q = $db->query('SELECT * FROM adresses  WHERE contact_id = '.$contact_id.' ORDER BY code_postal');
        while ($donnees = $q->fetch(\PDO::FETCH_ASSOC))
        {
          $adresses[] = new Adresse($donnees);
        }
        return $adresses;
    }

    public function update(Adresse $adresse)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('UPDATE adresses SET numero_et_rue = :numero_et_rue, code_postal = :code_postal, ville = :ville, pays = :pays, contact_id = :contact_id WHERE adresse_id = :adresse_id');
        $q->bindValue(':numero_et_rue', $adresse->numero_et_rue(), \PDO::PARAM_STR);
        $q->bindValue(':code_postal', $adresse->code_postal(), \PDO::PARAM_STR);
        $q->bindValue(':ville', $adresse->ville(), \PDO::PARAM_STR);
        $q->bindValue(':pays', $adresse->pays(), \PDO::PARAM_STR);
        $q->bindValue(':contact_id', $adresse->contact_id(), \PDO::PARAM_INT);
        $q->bindValue(':adresse_id', $adresse->adresse_id(), \PDO::PARAM_INT);
        $q->execute();
    }
}
