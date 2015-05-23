<?php
	Class Notation
	{
		private $id_notation, $note, $commentaire, $id_objet, $id_utilisateur;

		public function __construct()
		{
			$this->id_notation = $this->note = $this->id_objet = $this->id_utilisateur = 0;
			$this->commentaire = "";
		}
	}
?>