<?php
namespace Marie\CRM_LBC\Modele;

Class ContactManager{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=CRM_LBC;charset=utf8', 'root', 'root');
        return $db;
    }

    public function add(Contact $contact)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('INSERT INTO contacts (nom, prenom, email, user_id) VALUES(:nom, :prenom, :email, :user_id)');
        $q->bindValue(':nom', $contact->nom(), \PDO::PARAM_STR);
        $q->bindValue(':prenom', $contact->prenom(), \PDO::PARAM_STR);
        $q->bindValue(':email', $contact->email(), \PDO::PARAM_STR);
        $q->bindValue(':user_id', $contact->user_id(), \PDO::PARAM_INT);
        $q->execute();
        $last_id = $db->lastInsertId();
        return $last_id;
    }

    public function delete(Contact $contact)
    {
        $db = $this->dbConnect();
        $db->exec('DELETE FROM contacts WHERE id = '.$contact->contact_id());
    }

    public function getFromId($contact_id)
    {
        $db = $this->dbConnect();
        $q = $db->query('SELECT * FROM contacts WHERE contact_id = '.$contact_id);
        $donnees = $q->fetch(\PDO::FETCH_ASSOC);
        $contact = new Contact($donnees);
        return $contact;
    }

    public function getListFromUser($user_id)
    {
        $db = $this->dbConnect();
        $contacts = [];
        $q = $db->query('SELECT * FROM contacts c WHERE user_id = '.$user_id.' ORDER BY nom');
        while ($donnees = $q->fetch(\PDO::FETCH_ASSOC))
        {
          $contacts[] = new Contact($donnees);
        }
        return $contacts;
    }

    public function update(Contact $contact)
    {
        $db = $this->dbConnect();
        $q = $db->prepare('UPDATE contacts SET nom = :nom, prenom = :prenom, email = :email, user_id = :user_id WHERE contact_id = :contact_id');
        $q->bindValue(':nom', $contact->nom(), \PDO::PARAM_STR);
        $q->bindValue(':prenom', $contact->prenom(), \PDO::PARAM_STR);
        $q->bindValue(':email', $contact->email(), \PDO::PARAM_STR);
        $q->bindValue(':user_id', $contact->user_id(), \PDO::PARAM_INT);
        $q->bindValue(':contact_id', $contact->contact_id(), \PDO::PARAM_INT);
        $q->execute();
    }
}