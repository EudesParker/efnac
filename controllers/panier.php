<?php
	#Page relative aux actions du panier

	//Si la session panier n'est pas définie pour la créé et on lui donne la valeur d'un tableau vide
	if (!isset($_SESSION['panier']))
		$_SESSION['panier'] = array();
	//On instancie donc un objet de la classe Panier en lui attribuant le _SESSION['panier'] dans son constructeur
	$unPanier = new Panier($_SESSION['panier']);

	//Si un produit est ajouté
	if (isset($_POST['id_produit'])) {
		//Si on a envoyé un _POST['achat'] $prix prends la valeur de _POST['achat'] sinon il prend la valeur de _POST['location']
		$prix = (isset($_POST['achat'])) ? $_POST['achat'] : $_POST['location'];
		//Appelle de la méthode servant à ajouter un produit
		$unPanier->ajouterProduit($prix, $_POST['id_produit'], $_POST['type'], $_POST[$_POST['type']], $_POST['categorie']);
		$_SESSION['panier'] = $unPanier->getPanier();
	}
	//On assigne à la variable smarty voir panier ex: [ \//| 2 articles - 21,48 € ]
	$smarty->assign('voirpanier', $unPanier->voirPanier($_SESSION['panier']));	
?>