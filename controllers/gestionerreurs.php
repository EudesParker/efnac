<?php
	$unMsg = new Message();

	$lerreur = (isset($_SESSION['erreurs'])) ? $unMsg->ecrireErreur($_SESSION['erreurs']) : '';

	$smarty->assign('lerreur', $lerreur);

	if (isset($_SESSION['erreurs']))
		$smarty->assign('warning', $_SESSION['erreurs']);

	unset($_SESSION['erreurs']);
?>