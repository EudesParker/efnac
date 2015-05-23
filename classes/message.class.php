<?php
	/**
	* Class qui gèrera la gestion de messages d'erreurs ou de confirmation
	*/
	class Message
	{
		private $erreurs, $corrects;

		public function __construct()
		{
			$this->erreurs = array('Cette adresse e-mail à déjà été utilisée.', 
				'Le format de l\'adresse e-mail n\'est pas valide.',
				'Les mots de passe ne sont pas identiques.',
				'Votre mot de passe n\'est pas au format valide, il dois contenir des chiffres et des lettres, et comporter entre 6 et 20 caractères.',
				'L\'adresse e-mail et le mot de passe ne correspondent pas.');

			$this->corrects = array('Vos informations ont déjà été enregistrées.');
		}

		public function ecrireErreur($error)
		{
			return $this->erreurs[$error];
		}
	}
?>