<?php
	Class Acheter
	{
		private $id_acheter, $date_achat, $quantite, $prix_total, $id_utilisateur, $id_objet, $id_facture;

		public function __construct()
		{
			$this->id_achat = $this->quantite = $this->prix_total = $this->id_utilisateur = $this->id_objet = $this->id_facture = 0;
			$this->date_achat = "";
		}

		public function serialiser($tab)
		{
			$this->date_achat = $tab['date_achat'];
			$this->quantite = $tab['quantite'];
			$this->prix_total = $tab['prix_total'];
			$this->id_utilisateur = $tab['id_utilisateur'];
			$this->id_objet = $tab['id_objet'];
			$this->id_facture = $tab['id_facture'];
		}

		public function effectuerAchat()
		{
			$tableau = array('date_achat' => $this->date_achat,
							'quantite' => $this->quantite,
							'prix_total' => $this->prix_total,
							'id_utilisateur' => $this->id_utilisateur,
							'id_objet' => $this->id_objet,
							'id_facture' => $this->id_facture);

			$BDD = new Requetage();
			$BDD->insert('acheter', $tableau);
		}

		public function recupObjetsAchetes($id_utilisateur)
		{
			$tables = array('acheter' => 'a',
							 'objet' => 'o');
			$champs = array('a.id_acheter', 'a.id_objet', 'a.id_utilisateur', 'o.designation');
			$jointure = array('a.id_objet' => 'o.id_objet WHERE a.id_utilisateur = '.$id_utilisateur);
			$BDD = new Requetage();
			return utf8_array($BDD->selectAllJoin($tables, $champs, $jointure));
		}
	}
?>