<?php
	Class Historique
	{
		private $id_historique, $date_obtention, $quantite, $prix_total, $id_utilisateur, $id_objet, $id_facture, $type;

		public function __construct()
		{
			$this->id_historique = $this->quantite = $this->prix_total = $this->id_utilisateur = $this->id_objet = $this->id_facture = 0;
			$this->date_obtention = $this->type = "";
		}

		public function serialiser($tab)
		{
			$this->date_obtention = $tab['date_obtention'];
			$this->quantite = $tab['quantite'];
			$this->prix_total = $tab['prix_total'];
			$this->type = $tab['type'];
			$this->id_utilisateur = $tab['id_utilisateur'];
			$this->id_objet = $tab['id_objet'];
			$this->id_facture = $tab['id_facture'];
		}

		public function archiverVente()
		{
			$tableau = array('date_obtention' => $this->date_obtention,
							'quantite' => $this->quantite,
							'prix_total' => $this->prix_total,
							'type' => $this->type,
							'id_utilisateur' => $this->id_utilisateur,
							'id_objet' => $this->id_objet,
							'id_facture' => $this->id_facture);

			$BDD = new Requetage();
			$BDD->insert('historique', $tableau);
		}

		public function recupFacturesClient($id_client)
		{
			$BDD = new Requetage();
			return utf8_array($BDD->selectAll('historique', 'distinct id_facture', array('id_utilisateur' => $id_client), 'ORDER BY id_facture DESC'));
		}

		public function recupHistoClient($id_client, $id)
		{
			$tables = array('historique' => 'h',
							 'objet' => 'o');
			$champs = array('h.id_historique', 'h.date_obtention', 'h.quantite', 'h.prix_total', 'h.type', 'h.id_utilisateur', 'h.id_objet', 'h.id_facture', 'o.designation');
			$jointure = array('h.id_objet' => 'o.id_objet WHERE h.id_facture = '.$id);
			$BDD = new Requetage();
			return utf8_array($BDD->selectAllJoin($tables, $champs, $jointure));
		}
	}
?>