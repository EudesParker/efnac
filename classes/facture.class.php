<?php
	Class Facture
	{
		private $id_facture;

		public function __construct()
		{
			$this->id_facture = 0;
		}

		public function creerFacture()
		{
			$BDD = new Requetage();
			$BDD->insert('facture', array());

			$this->id_facture = $BDD->dernierID();
		}

		public function getId_facture()
		{
			return $this->id_facture;
		}

		public function setId_facture($id)
		{
			$this->id_facture = $id;
		}


	}
?>