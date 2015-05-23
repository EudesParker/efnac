<?php
	Class Monnaie
	{
		private $id_monnaie, $solde, $id_utilisateur;

		public function __construct()
		{
			$this->id_monnaie = $this->solde = $this->id_utilisateur = 0;
		}

		public function getSolde()
		{
			return $this->solde;
		}
	}
?>