<?php
	Class Categorie
	{
		private $id_categorie, $designation;

		public function __construct()
		{
			$this->id_categorie = 0;
			$this->designation = "";
		}

		public function lister()
		{
			
		}

		//GETTERS
		public function getId_categorie() {
			return $this->id_categorie;
		}
		public function getDesignation() {
			return $this->designation;
		}
		//SETTERS
		public function setId_categorie($id_categorie) {
			$this->id_categorie = $id_categorie;
		}
		public function setDesignation($designation) {
			$this->designation = $designation;
		}
	}
?>