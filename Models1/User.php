<?php
	class Commercial
	{ 
		public $id,$login,$password;

		function __construct($id,$login,$password)
		{
			$this->id  = $id ;
			$this->login  = $login ;
			$this->password  = $password ;
			
		}
	}
?>