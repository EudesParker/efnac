<?php
	//Instanciation d'un objet de la class Requetage (Model)
	$unRQ = new Requetage();

	if(!isset($_SESSION['id_client']) && !isset($_GET['etape'])) // Si la session client n'est pas déclarée et si il n'y a pas non plus de variable 'etape' passée dans l'url:
	{
		if (isset($_SESSION['objet_client']))
			unset($_SESSION['objet_client']);
		$smarty->display('vue/client.tpl');	//afficher le template de la page de connexion / inscription
	}
	elseif (isset($_GET['etape']) && $_GET['etape'] == 'inscription')	// Si la variable 'etape'[GET] est saisie et qu'elle vaut 'inscription' :
	{
		//Création d'un objet de la classe client
		$unClient = (isset($_POST['email'])) ? new Client() : $_SESSION['objet_client'];
		//Appelle de la méthode de vérification de l'email
		$unClient->verifEmail($unRQ);
		//Création du session qui vaut notre objet (Classe client)
		$_SESSION['objet_client'] = $unClient;
		// On assigne la valeur que return getEmail de l'objet dans une variable smarty  nommée email.
		$smarty->assign('email', $unClient->getEmail());
		//afficher le template du formulaire d'inscription
		$smarty->display('vue/inscription.tpl');
		//Affiche les informations de l'objet {Utiliser temporairement pour le développement du site}
		var_dump($unClient);
	}
	elseif (isset($_GET['etape']) && $_GET['etape'] == 'enregistrement')// Si la variable 'etape'[GET] est saisie et qu'elle vaut 'enregistrement' :
	{
		//Création de d'un objet de la classe client
		$unClient = new Client();
		if(isset($_SESSION['objet_client'])) // Si la session perso existe, on restaure l'objet.
		{
			//Création d'un objet (Classe client) qui vaut notre la session 'objet_client'
			$unClient = $_SESSION['objet_client'];
		}
		//Création d'un objet de la classe Adresse
		$uneAdresse = new Adresse();
		//Appel de la méthode renseigner() de l'objet uneAdresse, elle récupère les champs envoyé du formulaire précédent
		$uneAdresse->renseigner($_POST['adresse'], $_POST['code_postal'], $_POST['ville'],$_POST['pays']);
		//Appel de la méthode inscrireClient() de l'objet unClient, on lui passe en paramètre un objet [Classe=Connectpdo] et un objet [Classe=Adresse], elle se charge de récupérer différents champs et de les insérer dans la table adresse et utilisateur
		if (!isset($_SESSION['inscrit']))
			$unClient->inscrireClient($unRQ, $uneAdresse);
		//si unClient->civilite vaut 1 $civ = Madame sinon = Monsieur
		$civ = ($unClient->getCivilite() == 1) ? 'Madame' : 'Monsieur';
		//assignation des getters
		$smarty->assign('civilite', $civ);
		$smarty->assign('nom', $unClient->getNom());
		$smarty->assign('prenom', $unClient->getPrenom());
		$smarty->assign('email', $unClient->getEmail());
		$smarty->assign('telfixe', $unClient->getTelfixe());
		$smarty->assign('telmobile', $unClient->getTelmobile());
		$smarty->assign('designation', $uneAdresse->getDesignation());
		$smarty->assign('code_postal', $uneAdresse->getCode_postal());
		$smarty->assign('ville', $uneAdresse->getVille());
		$smarty->assign('pays', $uneAdresse->getPays());
		//afficher le template du tableau qui redonne les informations entrées à l'utilisateur
		$smarty->display('vue/fin_inscription.tpl');
		////Affiche les informations de l'objet unClient
		//var_dump($unClient);
		////Affiche les informations de l'objet uneAdresse
		//var_dump($uneAdresse);
	}
	elseif (isset($_GET['etape']) && $_GET['etape'] == 'connexion') // Si la variable 'etape'[_GET] est saisie et qu'elle vaut 'connexion' :
	{
		//Création de d'un objet de la classe client
		$unClient = new Client();
		//Création d'un objet de la classe Adresse
		$uneAdresse = new Adresse();
		//Création d'un objet de la classe Droits
		$unDroit = new Droits();
		//Appel de la méthode seConnecter() qui récupère les champs dans la table utilisateur et adresse
		$unClient->seConnecter($unRQ, $uneAdresse, $unDroit);
	}
	elseif (isset($_GET['etape']) && $_GET['etape'] == 'deconnexion') {
	?>	<script>
		var nom = '<?php echo $_SESSION['objet_client']->getNom();?>';
		var prenom = '<?php echo $_SESSION['objet_client']->getPrenom();?>';
		var civilite = '<?php echo Shortciv($_SESSION['objet_client']->getCivilite());?>';
		var deco;
		var space = ' ';
		
		if('<?php echo $_SESSION['objet_client']->getCivilite();?>' == 1)
		{
			deco = 'déconnecté';
		}
		else if('<?php echo $_SESSION['objet_client']->getCivilite();?>' == 0)
		{
			deco = 'déconnectée';
		}
		
		var result = civilite + space + prenom + space + nom + ' vous avez été ' + deco + ' !';
		
		alert(result);
		</script><?php
		$_SESSION = array();
		session_destroy();

		//Si est définit le COOKIE client on le supprime (réassigne à une date dépassée)
		if (isset($_COOKIE['client']))
			setcookie('client', '', time() + -365*24*3600);

		header('Location: index.php');
	}
	else //sinon
	{
		if (isset($_POST['nom'])) {

			$changements = array(
						'civilite' => $_POST['civilite'],
						'nom' => $_POST['nom'],
						'prenom' => $_POST['prenom'],
						'mot_de_passe' => $_POST['mot_de_passe'],
						'telfixe' => $_POST['telfixe'],
						'telmobile' => $_POST['telmobile'],
				);

			$_SESSION['objet_client']->serialiser($changements);

			$unRQ->update('utilisateur', $changements, array('id_utilisateur' => $_SESSION['objet_client']->getId_utilisateur()));
		}

		if (!isset($_GET['onglet']))
		{
			$_GET['onglet'] = 'tableau_de_bord';
		}
		elseif (isset($_GET['onglet']) && $_GET['onglet'] == 'historique_des_commandes') 
		{
			$unHistorique = new Historique();
			$mesfactures = $unHistorique->recupFacturesClient($_SESSION['id_client']);

			$table_factures = array();

			$nbFact = 0;

			foreach ($mesfactures as $key => $value) {
				$table_factures[] = $unHistorique->recupHistoClient($_SESSION['id_client'], $value['id_facture']);
				$nbFact++;
			}

			$smarty->assign('nombreFact', $nbFact);
			$smarty->assign('mesfactures', $mesfactures);
			$smarty->assign('table_factures', $table_factures);
		}
		elseif (isset($_GET['onglet']) && $_GET['onglet'] == 'mes_objets_achetes') {
			$unAchat = new Acheter();
			$liste_obj = $unAchat->recupObjetsAchetes($_SESSION['id_client']);
			$smarty->assign('obj_achetes', $liste_obj);
		}
		elseif (isset($_GET['onglet']) && $_GET['onglet'] == 'mes_objets_loues') {
			$uneLocation = new Louer();
			$liste_obj = $uneLocation->recupObjetsLoues($_SESSION['id_client']);

			echo "<META HTTP-EQUIV='Refresh' CONTENT='60; URL=index.php?tab=mon_compte&onglet=mes_objets_loues' />";

			$smarty->assign('obj_loues', $liste_obj);
		}
		elseif (isset($_GET['onglet']) && $_GET['onglet'] == 'objet') 
		{
			$tableau = array('id_objet' => $_GET['id']);

			$unObjet = new Objet();
			$unObjet->serialiser($tableau);

			$categorie = $unObjet->trouverCategorieObjet();

			if ($categorie['id_categorie'] == 3) {
				$uneMusique = new Musique();
				$musique = utf8_array($uneMusique->recupMusique($_GET['id']));

				$smarty->assign('fichier_musique', $musique);

			}
			elseif ($categorie['id_categorie'] == 2) {
				$unFilm = new Film();
				$film = utf8_array($unFilm->recupFilm($_GET['id']));

				$smarty->assign('fichier_film', $film);
			}
		}

		$smarty->assign('salutation', Saluer(Shortciv($_SESSION['objet_client']->getCivilite()), $_SESSION['objet_client']->getNom()));

		$smarty->assign('tableauclient', $_SESSION['objet_client']->attributsToSmarty());
		$smarty->assign('tableauadresse', $_SESSION['adresse_client']->attributsToSmarty());

		$smarty->display('vue/mon_compte.tpl');
	}

	
?>