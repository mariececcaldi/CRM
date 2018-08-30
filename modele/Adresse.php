<?php
namespace Marie\CRM_LBC\Modele; // La classe sera dans ce namespace

Class Adresse
{
    private $_adresse_id;
    private $_numero_et_rue;
    private $_code_postal;
    private $_ville;
    private $_pays;
    private $_contact_id;
    
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
    
    public function adresse_id()    { return $this->_adresse_id; }
    public function numero_et_rue() { return $this->_numero_et_rue; }
    public function code_postal()   { return $this->_code_postal; }
    public function ville()         { return $this->_ville; }
    public function pays()          { return $this->_pays; }
    public function contact_id()    { return $this->_contact_id; }
    
    public function setAdresse_id($adresse_id)
    {
        $this->_adresse_id = (int) $adresse_id;
    }
    
    public function setNumero_et_rue($numero_et_rue)
    {
        if (is_string($numero_et_rue) && strlen($numero_et_rue) <= 100){
            $this->_numero_et_rue = $numero_et_rue;
        }
    }
    
    public function setCode_postal($code_postal)
    {
        if (is_string($code_postal) && strlen($code_postal) <= 10){
            $this->_code_postal = $code_postal;
        }
    }
    
    public function setVille($ville)
    {
        if (is_string($ville) && strlen($ville) <= 20){
            $this->_ville = $ville;
        }
    }
    
    public function setPays($pays)
    {
        if (is_string($pays) && strlen($pays) <= 20){
            $this->_pays = $pays;
        }
    }
    
    public function setContact_id($contact_id)
    {
        $this->_contact_id = (int) $contact_id;
    }
}
