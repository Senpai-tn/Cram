<?php
	class Prestataire
	{ 
		public $num_serie,$raison_sociale,$adresse,$code_postal,$abonnement,$telephone,$departement,$etat,$commentaire,$type_facture,$code_moyen,$honoraire,$ville,$street_number;

		function __construct($num_serie,$raison_sociale,$adresse,$code_postal,$abonnement,$telephone,$etat,$commentaire,$code_moyen,$honoraire,$departement,$ville,$street_number)
		{
			$this->num_serie = $num_serie;
			$this->raison_sociale = $raison_sociale;
			$this->adresse = $adresse;
			$this->code_postal = $code_postal;
			$this->abonnement = $abonnement;
			$this->telephone = $telephone;
			$this->departement = $departement;
			$this->etat = $etat;
			$this->commentaire = $commentaire;
			//$this->type_facture = $type_facture;
			$this->code_moyen = $code_moyen;
			$this->honoraire = $honoraire;
			$this->ville = $ville;
			$this->street_number = $street_number;
		}
	}
?>