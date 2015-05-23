<?php
	Class Louer
	{
		private $id_location, $date_debut, $date_fin, $prix, $id_utilisateur, $id_objet, $id_facture;
		
		public function __construct()
		{
			$this->id_location = $this->prix = $this->id_utilisateur = $this->id_objet = $this->id_facture = 0;
			$this->date_debut = $this->date_fin = "";
		}

		public function serialiser($tab)
		{
			$this->date_debut = $tab['date_debut'];
			$this->date_fin = $tab['date_fin'];
			$this->prix = $tab['prix'];
			$this->id_utilisateur = $tab['id_utilisateur'];
			$this->id_objet = $tab['id_objet'];
			$this->id_facture = $tab['id_facture'];
		}

		public function effectuerLocation()
		{
			$tableau = array('date_debut' => $this->date_debut,
							'date_fin' => $this->date_fin,
							'prix' => $this->prix,
							'id_utilisateur' => $this->id_utilisateur,
							'id_objet' => $this->id_objet,
							'id_facture' => $this->id_facture);

			$BDD = new Requetage();
			$BDD->insert('louer', $tableau);
		}

		public function recupObjetsLoues($id_utilisateur)
		{
			$now = date("Y-m-d H:i:s");

			$tables = array('louer' => 'l',
							 'objet' => 'o');
			$champs = array('l.id_louer', 'l.date_fin','l.id_objet', 'l.id_utilisateur', 'o.designation');
			$jointure = array('l.id_objet' => 'o.id_objet WHERE l.id_utilisateur = '.$id_utilisateur.' AND \''.$now.'\' < l.date_fin');
			$BDD = new Requetage();
			return utf8_array($BDD->selectAllJoin($tables, $champs, $jointure));
		}
	}
?>