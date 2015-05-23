<?php
	Class Adresse
	{
		private $id_adresse, $designation, $code_postal, $ville, $pays;

		public function __construct()
		{
			$this->id_adresse = 0;
			$this->designation = '';
			$this->code_postal = '';
			$this->ville = '';
			$this->pays = '';
		}

		public function renseigner($des, $cp, $city, $pays)
		{
			$this->designation = htmlspecialchars($des);
			$this->code_postal = htmlspecialchars($cp);
			$this->ville = htmlspecialchars($city);
			$this->pays = htmlspecialchars($pays);
		}

		public function attributsToSmarty()
		{
			$tableau = array();

			array_push($tableau, $this->designation, $this->code_postal, $this->ville, $this->pays);

			return $tableau;
		}

		//GETTERS
		public function getId_adresse() {
			return $this->id_adresse;
		}
		public function getDesignation() {
			return $this->designation;
		}
		public function getCode_postal() {
			return $this->code_postal;
		}
		public function getVille() {
			return $this->ville;
		}
		public function getPays() {
			return $this->pays;
		}

		//SETTERS
		public function setId_adresse($id_adresse) {
			$this->id_adresse = $id_adresse;
		}
		public function setDesignation($designation) {
			$this->designation = $designation;
		}
		public function setCode_postal($code_postal) {
			$this->code_postal = $code_postal;
		}
		public function setVille($ville) {
			$this->ville = $ville;
		}
		public function setPays($pays) {
			$this->pays = $pays;
		}
	}
?>