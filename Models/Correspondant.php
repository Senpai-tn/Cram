<?php
	class Correspondant
	{ 
		public $code,$nom,$adresse,$code_postal,$email,$telephone,$etat,$prix,$ville;




		function __construct($code,$nom,$adresse,$code_postal,$email,$telephone,$etat,$prix,$ville )
		{
			$this->code = $code;
			$this->nom = $nom;
			$this->adresse = $adresse;
			$this->code_postal = $code_postal;
			$this->email = $email;
			$this->telephone = $telephone;
			$this->etat = $etat;
			$this->prix = $prix;
			$this->ville = $ville;
		}
	}
?>

