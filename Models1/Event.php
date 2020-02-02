<?php
	class Event
	{ 
		public $nom,$groupe_mot_cle;

		function __construct($nom,$groupe_mot_cle )
		{
			$this->nom = $nom;
			$this->groupe_mot_cle = $groupe_mot_cle;
		}
	}
?>