<?php
	class Information
	{ 
		public 
				$date_facture,
				$code,
				$id_event,
				
				$adresse,
				$code_postal,
				$ville,
				$commentaire,
				$n_sequence;

		function __construct($date_facture,
				$code,
				$id_event,
				$adresse,
				$code_postal,
				$ville,
				$commentaire,
				//$valid,
				$n_sequence)
		{
				$this->date_facture=$date_facture;
				$this->code=$code;
				$this->id_event=$id_event;
				$this->adresse=$adresse;
				$this->code_postal=$code_postal;
				$this->ville=$ville;
				$this->commentaire=$commentaire;
				//$this->valid=$valid;
				$this->n_sequence=$n_sequence;

		}
	}
?>