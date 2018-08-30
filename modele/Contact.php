<?php
namespace Marie\CRM_LBC\Modele; // La classe sera dans ce namespace

Class Contact
{
    private $_contact_id;
    private $_nom;
    private $_prenom;
    private $_email;
    private $_user_id;
    
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
    
    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }
    
    public function contact_id() { return $this->_contact_id; }
    public function nom()        { return $this->_nom; }
    public function prenom()     { return $this->_prenom; }
    public function email()      { return $this->_email; }
    public function user_id()    { return $this->_user_id; }
    
    public function setContact_id($contact_id)
    {
        $this->_contact_id = (int) $contact_id;
    }
    
    public function setNom($nom)
    {
        if (is_string($nom) && strlen($nom) <= 50){
            $this->_nom = $nom;
        }
    }
    
    public function setPrenom($prenom)
    {
        if (is_string($prenom) && strlen($prenom) <= 50){
            $this->_prenom = $prenom;
        }
    }
    
    public function setEmail($email)
    {
        if (is_string($email) && strlen($email) <= 50){
            $this->_email = $email;
        }
    }
    
    public function setUser_id($user_id)
    {
        $this->_user_id = (int) $user_id;
    }
}
