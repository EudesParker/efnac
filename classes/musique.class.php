<?php
	Class Musique extends Objet
	{
		private $id_musique, $id_objet, $duree, $format, $auteur;

		public function __construct()
		{
			
		}

		public function recupMusique($id_objet)
		{
			$requete = 'SELECT m.id_musique, m.dossier, o.designation FROM musique m INNER JOIN objet o ON m.id_objet = o.id_objet WHERE o.id_objet = '.$id_objet;
			$BDD = new Requetage();
			return $BDD->selectLibre($requete);
		}
	}
?>