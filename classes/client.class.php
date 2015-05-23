<?php
	class Client
	{	
		// Initialisation des attributs de la classe Client
		private $id_utilisateur, $nom, $prenom, $civilite, $email, $mot_de_passe, $IP, $dateinscription, $telfixe, $telmobile, $nb_verif, $etat_verif, $id_adresse, $id_droit;
		//Création du constructeur de la classe
		public function __construct()
		{
			$this->id_utilisateur = $this->nb_verif = $this->etat_verif = $this->id_adresse = $this->id_droit = $this->civilite = 0;
			$this->nom = $this->prenom = $this->email = $this->mot_de_passe = $this->IP = $this->dateinscription = $this->telfixe = $this->telmobile = "";
		}

		public function serialiser($tab)
		{
			$this->civilite = $tab['civilite'];
			$this->nom = $tab['nom'];
			$this->prenom = $tab['prenom'];
			$this->mot_de_passe = $tab['mot_de_passe'];
			$this->telfixe = $tab['telfixe'];
			$this->telmobile = $tab['telmobile'];
		}

		// Méthode qui vérifie le format valide d'une adresse email
		public function verifEmailValide($email)
		{
			return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
		}

		//Méthode servant à vérifier si l'addresse e-mail existe déjà dans la base de données à l'inscription.
		public function verifEmail($BDD)
		{
			//La variable adr_email 
			$adr_email = (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : $this->email;

			// Si l'email est valide
			if ($this->verifEmailValide($adr_email)) {
				$emailINbdd = $BDD->select('utilisateur', 'email', array('email' => $adr_email));

				//Si l'adresse email a déjà été utilisée
				if($emailINbdd != null) {
					$_SESSION['erreurs'] = 0;
					//Redirection vers index.php?tab=mon_compte
					header('Location: index.php?tab=mon_compte');
				}
				//Si l'adresse email n'a pas déjà été utilisée
				else {
					//L'attribut email de l'objet vaut la variable adr_mail
					$this->email = $adr_email;
					$_SESSION['objet_client'] = $this;
				}
			}
			// Si l'email n'est pas valide
			else {
				$_SESSION['erreurs'] = 1;
				//Redirection vers index.php?tab=mon_compte
				header('Location: index.php?tab=mon_compte');
			}
		}

		// Méthode qui vérifie si le mot de passe contient bien les caractères nécessaires au mot de passe
		public function mdpCorrecte($mdp)
		{
			$cpt = $cpt2 = 0;
			$chiffres = '0123456789';
			$lettres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			//long_verif vaut un si le mdp est compris entre 6 et 20 caractères
			$long_verif = (strlen($mdp) >= 6 && strlen($mdp) <= 20) ? 1 : 0;

			for ($i=0; $i < strlen($mdp); $i++)
				for ($j=0; $j < strlen($chiffres); $j++) 
					if($mdp[$i] == $chiffres[$j])
						$cpt++;

			for ($i=0; $i < strlen($mdp); $i++)
				for ($j=0; $j < strlen($lettres); $j++)
					if($mdp[$i] == $lettres[$j])
						$cpt2++;

			return ($long_verif!=0 && $cpt!=0 && $cpt2!=0) ? true : false;
		}

		//Méthode qui vérifie la concordance des deux mots de passe
		public function verifMotDePasse($mdp1, $mdp2)
		{
			return ($mdp1 == $mdp2) ? true : false;
		}

		/*********************************/
		/****       INSCRIPTION       ****/
		/*********************************/
		public function inscrireClient($BDD, $objet_adr)
		{
			//Récupération des champs des valeurs des champs du formulaire précédent et assignation dans variables
			$civilite = htmlspecialchars($_POST['civilite']);
			$nom = htmlspecialchars($_POST['nom']);
			$prenom = htmlspecialchars($_POST['prenom']);
			$mot_de_passe = htmlspecialchars($_POST['mot_de_passe']);
			$mot_de_passe2 = htmlspecialchars($_POST['mot_de_passe2']);
			$this->IP = $_SERVER['REMOTE_ADDR'];
			$telfixe = htmlspecialchars($_POST['telfixe']);
			$telmobile = htmlspecialchars($_POST['telmobile']);
			//si $civilite vaut Mme this->civilite = 1 sinon = 0
			$this->civilite = ($civilite == 'Mme') ? 1 : 0;

			// Si les mots de passe sont identiques
			if ($this->verifMotDePasse($mot_de_passe, $mot_de_passe2) && $this->mdpCorrecte($mot_de_passe)) {
				$this->nom = $nom;
				$this->prenom = $prenom;
				$this->mot_de_passe = sha1($mot_de_passe);
				$this->telfixe = $telfixe;
				$this->telmobile = $telmobile;

				$nombre = rand(100000, 999999);

				//Insertion des champs de la table adresse
				$BDD->insert('adresse', array('designation' => $objet_adr->getDesignation(), 'code_postal' => $objet_adr->getCode_postal(), 'ville' => $objet_adr->getVille(), 'pays' => $objet_adr->getPays()));

				//Récupere la valeur du dernier ID
				$id_data = $BDD->dernierID();

				//Insertion des champs dans la table droits
				$BDD->insert('droits', array('designation' => 'utilisateur', 'type' => 1));

				//Récupere la valeur du dernier ID
				$id_data2 = $BDD->dernierID();

				//Insertion des champs de la table utilisateurs
				$BDD->insert('utilisateur', array('nom' => $this->nom, 'prenom' => $this->prenom, 'civilite' => $this->civilite, 'email' => $this->email, 'mot_de_passe' => $this->mot_de_passe, 'IP' => $this->IP, 'dateinscription' => 'NOW()', 'telfixe' => $telfixe, 'telmobile' => $telmobile, 'nb_verif' => $nombre, 'etat_verif' => 1, 'id_adresse' => $id_data, 'id_droit' => $id_data2));

				$_SESSION['inscrit'] = true;
			}
			else // Si les mots de passe ne sont pas identiques
			{
				$_SESSION['erreurs'] = ($this->verifMotDePasse($mot_de_passe, $mot_de_passe2) == false) ? 2 : 3;
				//On redirige vers le formulaire d'inscription
				header('Location: index.php?tab=mon_compte&etape=inscription');
			}
		}

		/*********************************/
		/****        CONNEXION        ****/
		/*********************************/
		public function seConnecter($BDD, $objet_adr, $objet_drt)
		{
			if (isset($_COOKIE['client']))
				$result = $BDD->select('utilisateur', '*', array('id_utilisateur' => $_COOKIE['client']));
			else
			{
				$email = htmlspecialchars($_POST['email']);
				$mdp = htmlspecialchars($_POST['mot_de_passe']);
				$result = $BDD->select('utilisateur', '*', array('email' => $email, 'mot_de_passe' => sha1($mdp)));
			}

			if (!$result) {
				$_SESSION['erreurs'] = 4;
				//Redirection vers index.php?tab=mon_compte
				header('Location: index.php?tab=mon_compte');
			}
			else
			{
				$this->id_utilisateur = $result['id_utilisateur'];
				$this->nom = $result['nom'];
				$this->prenom = $result['prenom'];
				$this->civilite = $result['civilite'];
				$this->email = $result['email'];
				$this->mot_de_passe = $result['mot_de_passe'];
				$this->IP = $result['IP'];
				$this->dateinscription = $result['dateinscription'];
				$this->telfixe = $result['telfixe'];
				$this->telmobile = $result['telmobile'];
				$this->nb_verif = $result['nb_verif'];
				$this->etat_verif = $result['etat_verif'];
				$this->id_adresse = $result['id_adresse'];
				$this->id_droit = $result['id_droit'];

				$_SESSION['objet_client'] = $this;
				$_SESSION['id_client'] = $this->id_utilisateur;

				$result_adr = utf8_array($BDD->select('adresse', '*', array('id_adresse' => $this->id_adresse)));

				if (!$result_adr) {
					//Redirection vers index.php?tab=mon_compte
					header('Location: index.php?tab=mon_compte');
				}
				else
				{
					$objet_adr->setId_adresse($result_adr['id_adresse']);
					$objet_adr->setDesignation($result_adr['designation']);
					$objet_adr->setCode_postal($result_adr['code_postal']);
					$objet_adr->setVille($result_adr['ville']);
					$objet_adr->setPays($result_adr['pays']);

					$_SESSION['adresse_client'] = $objet_adr;
				}

				$result_drt = utf8_array($BDD->select('droits', '*', array('id_droit' => $this->id_droit)));

				if (!$result_drt) {
					//Redirection vers index.php?tab=mon_compte
					header('Location: index.php?tab=mon_compte');
				}
				else
				{
					$objet_drt->setId_droit($result_drt['id_droit']);
					$objet_drt->setDesignation($result_drt['designation']);
					$objet_drt->setType($result_drt['type']);


					$_SESSION['droits_client'] = $objet_drt;
				}

				if (isset($_COOKIE['client'])) {
					$ooo = 1;
				}
				if (isset($_POST['stay_connect'])) {
					setcookie('client', $result['id_utilisateur'], time() + 365*24*3600);
				}
				if (isset($ooo) != 1) {
					header('Location: index.php');
				}
				
			}
		}

		public function attributsToSmarty()
		{
			$tableau = array();

			array_push($tableau, $this->nom, $this->prenom, $this->civilite, $this->mot_de_passe, $this->telfixe, $this->telmobile, $this->email);

			return $tableau;
		}

		/*********************************/
		/****         GETTERS         ****/
		/*********************************/
		public function getId_utilisateur() {
			return $this->id_utilisateur;
		}
		public function getNom() {
			return $this->nom;
		}
		public function getPrenom() {
			return $this->prenom;
		}
		public function getCivilite() {
			return $this->civilite;
		}
		public function getEmail() {
			return $this->email;
		}
		public function getMot_de_passe() {
			return $this->mot_de_passe;
		}
		public function getIP() {
			return $this->IP;
		}
		public function getDateinscription() {
			return $this->dateinscription;
		}
		public function getTelfixe() {
			return $this->telfixe;
		}
		public function getTelmobile() {
			return $this->telmobile;
		}
		public function getNb_verif() {
			return $this->nb_verif;
		}
		public function getEtat_verif() {
			return $this->etat_verif;
		}
		public function getId_adresse() {
			return $this->id_adresse;
		}
	}
?>