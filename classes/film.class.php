<?php
	Class Film extends Objet
	{
		private $id_film, $id_objet, $format, $resolution, $sigle;

		public function __construct()
		{
			$this->id_film = 0;
		}

		public function recupFilm($id_objet)
		{
			$requete = 'SELECT f.id_film, f.fichier, o.designation, f.format FROM film f INNER JOIN objet o ON f.id_objet = o.id_objet WHERE o.id_objet = '.$id_objet;
			$BDD = new Requetage();
			return $BDD->selectLibre($requete);
		}
	}
?>