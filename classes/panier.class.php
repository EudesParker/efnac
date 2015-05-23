<?php
	Class Panier
	{
		private $panier, $nombreArticles, $montant;

		public function __construct($panier)
		{
			$this->panier = $panier;
			$this->montant = 0;
			$this->nombreArticles = count($this->panier);
			//On parcours les différentes entrées tableau session panier 
			foreach ($this->panier as $value) {
				//On créé un tableau qui va contenir toute les id des produits ajoutés au panier
				$this->montant += $value['prix'];			
			}
		}

		//Méthode pour ajouter un produit
		public function ajouterProduit($prix, $id, $type, $newprix, $categorie)
		{
			//Si le tableau de session panier n'est pas vide
			if(!empty($this->panier))
			{
				//On parcours les différentes entrées tableau session panier 
				foreach ($this->panier as $value) {
					//On créé un tableau qui va contenir toute les id des produits ajoutés au panier
					$tableau_id[] = $value['id'];
				}
				//Si dans le tableau des id n'existe pas l'id du produit nouvellement ajouté
				if (!in_array($id, $tableau_id)) {
					//On ajoute un nouveau produit dans le panier
					$this->panier[] = array('id' => $id,
										'quantite' => 1,
										'type' => $type,
										'prix' => $prix,
										'categorie' => $categorie);
				}
				else // Sinon
				{
					//Définition d'un entier i a incrémenter
					$i = 0;
					

					//On parcours les différentes entrées tableau session panier 
					foreach ($this->panier as $value) {
						//Si l'id de l'élément en cours vaut le même id que le _POST['id_produit']
						if ($value['id'] == $id) {
							//Si le type de produit envoyé n'est pas le même que celui de l'élément enregistré, ex: location != achat
							if ($type != $value['type']) {
								//Le type de l'élément en cours change et devient celui envoyé par _POST
								$this->panier[$i]['type'] = $type;
								//Le prix de l'élément en cours change et devient celui envoyé par _POST
								$this->panier[$i]['prix'] = $newprix;
							}
						}
						//Incrémentation du nombre i
						$i++;		
					}
				}
			}
			//S'il est vide
			else
			{
				//On ajoute un nouveau produit dans le panier
				$this->panier[] = array('id' => $id,
										'quantite' => 1,
										'type' => $type,
										'prix' => $prix,
										'categorie' => $categorie);
				
				
			}
		}

		public function voirPanier($panier)
		{
			$this->montant = 0;
			$this->nombreArticles = count($this->panier);
			//On parcours les différentes entrées tableau session panier 
			foreach ($this->panier as $value) {
				//On créé un tableau qui va contenir toute les id des produits ajoutés au panier
				$this->montant += $value['prix'];			
			}

			$string = '<div id="case_panier"><img src="img/icon_caddie.png" />';
		
			$chiffre = ($this->nombreArticles == NULL) ? 0 : $this->nombreArticles;
			
			$string = $string.''.$chiffre.' article';
			
			$s = ($this->nombreArticles <= 1) ? '' : 's';
			
			$string = $string.''.$s.'<span style="padding-right:17px;"></span>';
			
			$e = ($this->nombreArticles == NULL) ? '0,00 €' : formaterPrix($this->montant);

			$string = $string.''.$e.'</div>';
			
			return $string;
		}

		//Fonction qui récupère dans la tableau les objets du panier
		public function recupPanier($BDD)
		{
			//On parcours les différentes entrées tableau session panier 
			$string = '';

			foreach ($this->panier as $value) {
				$string .= 'id_objet = '.substr($value['id'], 3).' OR ';
			}

			$string = substr($string, 0, -3);

			if ($string != null)
			{
				$tabl = $BDD->selectAll('objet', '*', $string);
				$i = 0;

				foreach ($tabl as $key => $value) {
					foreach ($this->panier as $cle => $valeur) {
						if (substr($valeur['id'], 3) == $value['id_objet']) {
							$tabl[$i]['id_objet'] = $valeur['id'];
							$tabl[$i]['prix'] = $valeur['prix'];
							$tabl[$i]['qte'] = $valeur['quantite'];
							$tabl[$i]['categorie'] = $valeur['categorie'];
							$tabl[$i]['type'] = $valeur['type'];
							$tabl[$i]['montant'] = $tabl[$i]['qte']*$tabl[$i]['prix'];
						}
					}
					$i++;
				}

				return utf8_array($tabl);
			}
			else
			{
				return null;
			}
		}

		//GETTERS
		public function getPanier() { return $this->panier; }
		public function getNombreArticles() { return $this->nombreArticles; }
		public function getMontant() { return $this->montant; }
		//SETTERS
		public function setPanier($panier) { $this->panier = $panier; }
		public function setNombreArticles($nombreArticles) { $this->nombreArticles = $nombreArticles; }
		public function setMontant($montant) { $this->montant = $montant; }
	}
?>