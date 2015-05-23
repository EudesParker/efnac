<?php
	Class Objet
	{
		private $id_objet, $id_sous_categorie, $designation, $description, $prix_achat, $prix_location, $date_lencement, $activation, $photo, $reference;

		public function __construct()
		{
			$this->id_objet = $this->id_sous_categorie = $this->prix_achat = $this->prix_location = $this->activation = 0;
			$this->designation = $this->description = $this->date_lencement = $this->photo = $this->reference = "";
		}

		public function serialiser($tab)
		{
			$this->id_objet = $tab['id_objet'];
		}

		public function trouverCategorieObjet()
		{
			$requete = 'SELECT s.id_categorie FROM sous_categorie s INNER JOIN objet o ON s.id_sous_categorie = o.id_sous_categorie WHERE o.id_objet = '.$this->id_objet;

			$BDD = new Requetage();
			return $BDD->selectLibre($requete);
		}

		//GETTERS
		public function getId_objet() {
			return $this->id_objet;
		}
		public function getId_sous_categorie() {
			return $this->id_sous_categorie;
		}
		public function getDesignation() {
			return $this->designation;
		}
		public function getDescription() {
			return $this->description;
		}
		public function getPrix_achat() {
			return $this->prix_achat;
		}
		public function getPrix_location() {
			return $this->prix_location;
		}
		public function getDate_lencement() {
			return $this->date_lencement;
		}
		public function getActivation() {
			return $this->activation;
		}
		public function getPhoto() {
			return $this->photo;
		}
		public function getReference() {
			return $this->reference;
		}
		//SETTERS
		public function setId_objet($id_objet) {
			$this->id_objet = $id_objet;
		}
		public function setId_sous_categorie($id_sous_categorie) {
			$this->id_sous_categorie = $id_sous_categorie;
		}
		public function setDesignation($designation) {
			$this->designation = $designation;
		}
		public function setDescription($description) {
			$this->description = $description;
		}
		public function setPrix_achat($prix_achat) {
			$this->prix_achat = $prix_achat;
		}
		public function setPrix_location($prix_location) {
			$this->prix_location = $prix_location;
		}
		public function setDate_lencement($date_lencement) {
			$this->date_lencement = $date_lencement;
		}
		public function setActivation($activation) {
			$this->activation = $activation;
		}
		public function setPhoto($photo) {
			$this->photo = $photo;
		}
		public function setReference($reference) {
			$this->reference = $reference;
		}
	}
?>