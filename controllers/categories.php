<?php
	//Instanciation d'un objet de la class Requetage (Model)
	$unRQ = new Requetage();
	// Selection des catégories, on met les résultats de la sélections dans $result
	$result = $unRQ->selectAll('categorie', '*', '');
	//On parcours le tableau répertoriant les différentes catégories
	foreach ($result as $res) {
		//Si le _GET['tab'] vaut la catégorie sur laquelle on est en parcourant le tableau $result
		if ($_GET['tab'] == $equivalence[$res['designation']]) {
			//	$resultats est un tableau qui vaut les résultats de la sélection des sous-catégories où l'id_categorie des sous-catégorie vaut l'id_categorie de la catégorie sur laquelle on est (dans la boucle)
			$resultats = utf8_array($unRQ->selectAll('sous_categorie', '*', array('id_categorie' => $res['id_categorie'])));


			//Initialisations de deux tableau $lesSousCategories, $categ
			$lesSousCategories = $categ = array();
			//initialisation d'un entier nommé nb
			$nb = 0;
			$nmb = 0;
			//on parcours le tableau $resultats (sous catégorie correspondant à la catégorie voulu)
			foreach ($resultats as $unResultat) {
				//Instanciation d'un objet sous_categorie dans le tableau lesSousCategories
				$lesSousCategories[$nb] = new Sous_categorie();
				//Setters de ces objets
				$lesSousCategories[$nb]->setId_sous_categorie($resultats[$nb]['id_sous_categorie']);
				$lesSousCategories[$nb]->setDesignation($resultats[$nb]['designation']);
				$lesSousCategories[$nb]->setId_categorie($resultats[$nb]['id_categorie']);
				$categ[$nb]['designation'] = $lesSousCategories[$nb]->getDesignation();
				$nombre = $unRQ->select('objet', 'count(*) as nb', array('id_sous_categorie' => $resultats[$nb]['id_sous_categorie']));
				$categ[$nb]['nombre'] = $nombre['nb'];
				$categ_fm[$nb] = formatTab($lesSousCategories[$nb]->getDesignation());
				$categ_id[$nb] = $lesSousCategories[$nb]->getId_sous_categorie();
				$nb++;
				$nmb += $nombre['nb'];
			}

			   $smarty->assign('nmb', $nmb);

			//Définition de la catégorie affichée par défaut
			if(!isset($_GET['categ'])) {
				$resulto = utf8_array($unRQ->select('sous_categorie', '*', array('id_categorie' => $res['id_categorie'], 'par_defaut' => 1)));
				$_GET['categ'] = formatTab($resulto['designation']);
			}
			//Récupère l'id de la sous catégorie sur laquelle on est
			$id_souscateg = $categ_id[array_search($_GET['categ'], $categ_fm)];
			////////Pagination////////////
			$page = (!isset($_GET['page'])) ? 1 : intval($_GET['page']);
			$chiffre = $unRQ->select('objet', 'COUNT(*) AS total', array('id_sous_categorie' => $id_souscateg));
			//echo 'Chiffre = '.$chiffre['total'];
			$nbArticleParPage = 2;
			$nombreDePage = ceil($chiffre['total']/$nbArticleParPage);
			$premierNombre = ($page-1)*$nbArticleParPage;

			if ($page>$nombreDePage) {
				$page = $nombreDePage;
			}
			////////////////////////////

			$result_objet = $unRQ->selectAll('objet', '*', array('id_sous_categorie' => $id_souscateg)/*, '', 'LIMIT '.$premierNombre.', '.$nbArticleParPage.''*/);

			//Initialisations de deux tableau $lesObjets, $objets
			$lesObjets = $objets = array();
			//initialisation d'un entier nommé nb
			$nb = 0;

			//initialisation d'une variable, $abs qui vaut 'Désolé, il..' s'il n'y a pas d'article dans la sous catégorie, et vaut null si il y en a
			$abs = ($result_objet == null) ? "Désolé, il n'y a pas encore d'article dans cette catégorie" : '';
			$smarty->assign('abs', $abs);

			foreach ($result_objet as $unResult) {
				$lesObjets[$nb] = new Objet();
				//Setters
				$lesObjets[$nb]->setId_objet($result_objet[$nb]['id_objet']);
				$lesObjets[$nb]->setId_sous_categorie($result_objet[$nb]['id_sous_categorie']);
				$lesObjets[$nb]->setDesignation($result_objet[$nb]['designation']);
				$lesObjets[$nb]->setDescription($result_objet[$nb]['description']);
				$lesObjets[$nb]->setPrix_achat($result_objet[$nb]['prix_achat']);
				$lesObjets[$nb]->setPrix_location($result_objet[$nb]['prix_location']);
				$lesObjets[$nb]->setDate_lencement($result_objet[$nb]['date_lencement']);
				$lesObjets[$nb]->setActivation($result_objet[$nb]['activation']);
				$lesObjets[$nb]->setPhoto($result_objet[$nb]['photo']);
				$lesObjets[$nb]->setReference($result_objet[$nb]['reference']);
				//Getters
				$objets[$nb]['designation'] = utf8_encode($lesObjets[$nb]->getDesignation());
				$objets[$nb]['description'] = utf8_encode($lesObjets[$nb]->getDescription());
				$objets[$nb]['photo'] = $lesObjets[$nb]->getPhoto();
				$objets[$nb]['id'] = $lesObjets[$nb]->getId_objet();
				$objets[$nb]['prix_achat'] = $lesObjets[$nb]->getPrix_achat();
				$objets[$nb]['prix_location'] = $lesObjets[$nb]->getPrix_location();
				$nb++;
			}

			//Si est défini le _GET['id']
			if(isset($_GET['id'])){
				//On met en objet sélectionné l'objet dont l'id est sélectionné
				$requete_lobjet = $unRQ->select('objet', '*', array('id_objet' => $_GET['id']));
				$requete_lobjet['categorie'] = $res['designation'];
			}
			//Si il n'y a pas d'article dans la sous catégorie
			elseif($result_objet == null){
				//
				$requete_lobjet = array('y'=>'d');
				$_GET['id'] = null;
			}
			//Si n'est pas défini le _GET['id']
			elseif(!isset($_GET['id'])){
				$requete_lobjet = $unRQ->select('objet', '*', array('id_sous_categorie' => $id_souscateg));	
				$_GET['id'] = $requete_lobjet['id_objet'];
				$requete_lobjet['categorie'] = $equivalence[$res['designation']];
			}

			//////////// NOUVEAUX OBJETS ////////////
			$requete = 'SELECT e.id_objet, e.designation, e.photo, e.prix_location, e.prix_achat FROM objet e INNER JOIN sous_categorie s ON s.id_sous_categorie = e.id_sous_categorie WHERE s.id_categorie = '.$res['id_categorie'].' ORDER BY date_lencement DESC LIMIT 0, 2';
			$requete_new = utf8_array($unRQ->selectAllLibre($requete));

			$smarty->assign('news', $requete_new);
			//////////// /NOUVEAUX OBJETS ///////////

			////////////// BARRE RECHERCHE ////////////////
			if (isset($_POST['research'])) {
			$requete = "SELECT * FROM objet WHERE designation LIKE '%".$_POST['research']."%' ORDER BY designation";
			$requete_rech = utf8_array($unRQ->selectAllLibre($requete));

			$rq2 = "SELECT COUNT(*) AS total FROM objet WHERE designation LIKE '%".$_POST['research']."%' ";
			$count = $unRQ->selectLibre($rq2);

			if ($count['total'] <= 1) {
    			$pl = "";
	    	}
	    	else
	    	{
	    		$pl = "s";
	    	}

	    	$smarty->assign('total', $count['total']);
    		$smarty->assign('pl', $pl);

			$smarty->assign('rech', $requete_rech);
			}
			////////////// /BARRE RECHERCHE ////////////////

			$smarty->assign('lobjet', utf8_array($requete_lobjet));

			$smarty->assign('objets', $objets);
			$smarty->assign('categ', $categ);
			$smarty->display('vue/categories.tpl');

		}
	}
?>