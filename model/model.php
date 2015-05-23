<?php
	class Requetage
	{
		private $unPDO, $base, $dns, $user, $mdp;

		public function __construct()
		{
			$this->unPDO = NULL;
			$this->base = 'e_fnac';
			$this->dns = 'mysql:host=localhost;dbname='.$this->base;
			$this->user = 'root';
			$this->mdp = '';
			try 
			{
				$this->unPDO = new PDO($this->dns, $this->user, $this->mdp);
			}
			catch (Exception $exp)
			{
				return 'Erreur de connexion à la base :'.$this->dns;
			}
		}

		public function selectAll($table, $champ, $critere, $order='', $limit='')
		{
			$resultats = NULL;

			if (gettype($champ) == 'string')  // Si le champ à récupérer est de type chaine
				$requete = 'SELECT '.$champ.' FROM '.$table;
			elseif (gettype($champ) == 'array') // Si le champ à récupérer est de type tableau
			{
				$ch = '';
				foreach ($champ as $value)
					$ch = $ch.' '.$value.',';
				$champ = substr($ch, 0, -1);
				$requete = 'SELECT '.$champ.' FROM '.$table;
			}
			if ($critere != NULL)  // S'il y a des critères de sélection
			{
				if (gettype($critere) == 'array')
				{
					$cr = '';
					foreach ($critere as $key => $value) {
						if (gettype($value) == 'string')
							$value = $this->unPDO->quote($value);
						$cr = $cr.' '.$key.' = '.$value. ' AND';
					}
					$critere = substr($cr, 0, -3);
				}
					
				$requete = $requete.' WHERE '.$critere.' '.$order.' '.$limit;
			}
			$selection = $this->unPDO->prepare($requete);
			$selection->execute();
			$resultats = $selection->fetchAll();

			return $resultats;
		}

		public function selectAllLibre($requete)
		{
			$selection = $this->unPDO->prepare($requete);
			$selection->execute();
			$resultats = $selection->fetchAll();

			return $resultats;
		}

		public function selectLibre($requete)
		{
			$selection = $this->unPDO->prepare($requete);
			$selection->execute();
			$resultats = $selection->fetch();

			return $resultats;
		}

		public function select($table, $champ, $critere, $order='', $limit='')
		{
			$resultats = NULL;

			if (gettype($champ) == 'string')  // Si le champ à récupérer est de type chaine
				$requete = 'SELECT '.$champ.' FROM '.$table;
			elseif (gettype($champ) == 'array') // Si le champ à récupérer est de type tableau
			{
				$ch = '';
				foreach ($champ as $value)
					$ch = $ch.' '.$value.',';
				$champ = substr($ch, 0, -1);
				$requete = 'SELECT '.$champ.' FROM '.$table;
			}
			if ($critere != NULL) // S'il y a des critères de sélection
			{
				$cr = '';
				foreach ($critere as $key => $value) {
					if (gettype($value) == 'string')
						$value = $this->unPDO->quote($value);
					$cr = $cr.' '.$key.' = '.$value. ' AND';
				}
				$critere = substr($cr, 0, -3);
				$requete = $requete.' WHERE '.$critere;
			}
			
			$selection = $this->unPDO->prepare($requete);
			$selection->execute();
			$resultat = $selection->fetch();

			return $resultat;
		}

		// SELECT FETCHALL JOINTURE
		public function selectAllJoin($tables, $champs, $jointure)
		{
			//PARCOURIR LISTE DES TABLES
			$chaine_table = '';
			$i = 0;
			foreach ($tables as $key => $value) 
			{
				$sc = ($i==0) ? 'FROM' : 'INNER JOIN';
				$chaine_table .= $sc.' '.$key.' '.$value.' ';

				$i++;
				
			}
			//PARCOURIR LES CHAMPS
			$chaine_champs = '';
			foreach ($champs as $key => $value) {
				$chaine_champs .=' '.$value.',';
			}
			$chaine_champs = substr($chaine_champs, 0, -1);

			$chaine_jointure = '';
			foreach ($jointure as $key => $value) {
				$chaine_jointure .= 'ON '.$key.' = '.$value;
			}

			$requete = 'SELECT '.$chaine_champs.' '.$chaine_table.' '.$chaine_jointure.';';
			$selection = $this->unPDO->prepare($requete);
			$selection->execute();
			$resultats = $selection->fetchAll();

			return $resultats;
		}

		// Fonction pour les insertions dans la base de données. Elle prend en parametre la table sur laquelle on effectue la requete et un tableau qui va contenir les champs comme clés, et les valeurs comme valeurs
		public function insert($table, $tableau) 
		{
			//initialisation des variables champs et valeurs à null
			$champs = '';
			$valeurs = '';

			//Si le tableau est vide
			if (empty($tableau)) {
				$champs = '';
				$valeurs = '';
			}
			else
			{
				//On parcours le tableau en récupérant ses clés et ses valeurs
				foreach ($tableau as $key => $value) {
					//On incrémente notre variable champs pour chaque clé, en ajoutant une virgule après chaque champ
					$champs .= $key.',';
					//Si la valeur est une chaine de caractère (ex: pas int), et pas la fonction NOW()
					if (gettype($value) == 'string' && $value != 'NOW()')
						$value = $this->unPDO->quote($value); //On ajoute des quotes à la valeur
					//On incrémente la variable valeurs pour chaque valeur, en ajoutant une virgule après chaque valeur
					$valeurs .= $value.',';
				}
				//On enlève le dernier caractère à la variable champs pour supprimer la dderniere virgule
				$champs = substr($champs, 0, -1);
				//On enlève le dernier caractère à la variable champs pour supprimer la dderniere virgule
				$valeurs = substr($valeurs, 0, -1);
			}
			//On créer la requete d'insertion en lui ajoutant les champs valeurs et table en paramètre
			$requete = 'INSERT INTO '.$table.'('.$champs.') VALUES('.$valeurs.')';
			//On prépare la requête à l'exécution et retourne un objet
			$insertion = $this->unPDO->prepare($requete);
			//On exécute la requête préparée
			$insertion->execute();
			//On ferme le curseur, permettant à la requête d'être de nouveau exécutée
			$insertion->closeCursor();
		}

		//Méthode permettant la modification
		public function update($table, $champs, $critere)
		{
			$ch = '';
			foreach ($champs as $key => $value) {
				if (gettype($value) == 'string')
					$value = $this->unPDO->quote($value);
				$ch = $ch.' '.$key.' = '.$value. ', ';
			}
			$champs = substr($ch, 0, -2);

			$cr = '';
			foreach ($critere as $key => $value) {
				if (gettype($value) == 'string')
					$value = $this->unPDO->quote($value);
				$cr = $cr.' '.$key.' = '.$value. ' AND';
			}
			$critere = substr($cr, 0, -3);

			$requete = 'UPDATE '.$table.' SET '.$champs.' WHERE '.$critere;
			$modification = $this->unPDO->prepare($requete);
			$modification->execute();
			$modification->closeCursor();
		}

		//Méthode permettant la suppression d'une entrée (requete DELETE), elle prend en parametre la table sur laquelle s'effectue la suppression et la clause déterminant l'entrée à supprimer.
		public function delete($table, $clause)
		{
			$cr = '';
			foreach ($clause as $key => $value) {
				if (gettype($value) == 'string')
					$value = $this->unPDO->quote($value);
				$cr = $cr.' '.$key.' = '.$value. ' AND';
			}
			$critere = substr($cr, 0, -3);

			$requete = 'DELETE FROM '.$table.' WHERE '.$critere;

			$suppression = $this->unPDO->prepare($requete);
			$suppression->execute();
			$suppression->closeCursor();
		
		}

		public function dernierID()
		{
			return $this->unPDO->lastInsertId();
		}
	}
?>
