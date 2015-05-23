<?php
	Class Sous_categorie
	{
		private $id_sous_categorie, $designation, $id_categorie;

		public function __construct()
		{
			$this->id_sous_categorie = $this->id_categorie = 0;
			$this->designation = "";
		}
		//GETTERS
		public function getId_sous_categorie() {
			return $this->id_sous_categorie;
		}
		public function getDesignation() {
			return $this->designation;
		}
		public function getId_categorie() {
			return $this->id_categorie;
		}
		//SETTERS
		public function setId_sous_categorie($id_sous_categorie) {
			$this->id_sous_categorie = $id_sous_categorie;
		}
		public function setDesignation($designation) {
			$this->designation = $designation;
		}
		public function setId_categorie($id_categorie) {
			$this->id_categorie = $id_categorie;
		}
	}
?>