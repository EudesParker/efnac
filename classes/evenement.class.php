<?php
	Class Evenement
	{
		private $id_evenement, $title, $date_evenement, $effectif, $prix;

		public function __construct()
		{
			$this->id_evenement = $this->effectif = $this->prix = 0;
			$this->title = $this->date_evenement = "";
		}
	}
?>