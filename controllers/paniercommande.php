<?php
	//Instanciation d'un objet de la class Requetage (Model)
	$unRQ = new Requetage();
	
	if (isset($_POST['commander'])) {
		if (!isset($_SESSION['id_client'])) {
			header('Location: index.php?tab=mon_compte');
		}
		elseif (isset($_SESSION['panier']) && !empty($_SESSION['panier']))
		{
			$uneFacture = new Facture();
			//Création d'une nouvelle entrée dans la table facture et assignation de l'attribut facture au dernier id inséré
			$id_facture = $uneFacture->creerFacture();

			$liste = $unPanier->recupPanier($unRQ);

			foreach ($liste as $key => $value) 
			{
				if ($value['type'] == 'location') 
				{
					$tableau = array('date_debut' => date("Y-m-d H:i:s"),
						'date_fin' => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")." + 2 minutes")),
						'prix' => $value['prix'],
						'id_utilisateur' => $_SESSION['id_client'],
						'id_objet' => $value['id_objet'],
						'id_facture' => $uneFacture->getId_facture());

					$uneLocation = new Louer();
					$uneLocation->serialiser($tableau);
					$uneLocation->effectuerLocation();
				}
				elseif ($value['type'] == 'achat') {

					$tableau = array('date_achat' => date("Y-m-d H:i:s"),
						'quantite' => $value['qte'],
						'prix_total' => $value['montant'],
						'id_utilisateur' => $_SESSION['id_client'],
						'id_objet' => $value['id_objet'],
						'id_facture' => $uneFacture->getId_facture());

					$unAchat = new Acheter();
					$unAchat->serialiser($tableau);
					$unAchat->effectuerAchat();
				}
				$tableau = array('date_obtention' => date("Y-m-d H:i:s"),
					'quantite' => $value['qte'],
					'prix_total' => $value['montant'],
					'type' => $value['type'],
					'id_utilisateur' => $_SESSION['id_client'],
					'id_objet' => $value['id_objet'],
					'id_facture' => $uneFacture->getId_facture());
				$unHistorique = new Historique();
				$unHistorique->serialiser($tableau);
				$unHistorique->archiverVente();
			}
			unset($_SESSION['panier']);
			echo '
				<div style="text-align:center;margin-top:50px;margin-bottom:50px;">
					<div id="correct">Votre commande a bien été effectuée. Vous pouvez accéder à vos articles dans votre espace client ainsi qu\'à l\'historique de vos commandes.</div>
				</div>
			';
		}
	}
	else
	{
		$smarty->assign('liste', $unPanier->recupPanier($unRQ));
		$smarty->assign('montant', $unPanier->getMontant());

		$smarty->display('vue/panier.tpl');
	}

	
?>