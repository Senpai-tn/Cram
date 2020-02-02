<?php
	class Commercial
	{ 
		public $nom ,$email ,$telephone ,$departement ,$poste ,$num_serie,$code;

		function __construct($code,$nom ,$email ,$telephone ,$departement ,$poste ,$num_serie )
		{
			$this->nom  = $nom ;
			$this->email  = $email ;
			$this->telephone  = $telephone ;
			$this->departement  = $departement ;
			$this->poste  = $poste ;
			$this->num_serie  = $num_serie ;
			$this->code  = $code ;

		}
	}
?>