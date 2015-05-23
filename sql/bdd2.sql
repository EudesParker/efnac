DROP DATABASE IF EXISTS e_fnac;

CREATE DATABASE IF NOT EXISTS e_fnac;

USE e_fnac;

CREATE TABLE IF NOT EXISTS `adresse`(
	`id_adresse` INT(11) NOT NULL AUTO_INCREMENT,
	`designation` VARCHAR(255) DEFAULT NULL,
	`code_postal` VARCHAR(10) DEFAULT NULL,
	`ville` VARCHAR(100) DEFAULT NULL,
	`pays` VARCHAR(50) DEFAULT NULL,
	PRIMARY KEY (id_adresse));

CREATE TABLE IF NOT EXISTS `categorie`(
	`id_categorie` INT(11) NOT NULL AUTO_INCREMENT,
	`designation` VARCHAR(100) DEFAULT NULL,
	PRIMARY KEY (id_categorie));

CREATE TABLE IF NOT EXISTS `sous_categorie`(
	`id_sous_categorie` INT(11) NOT NULL AUTO_INCREMENT,
	`designation` VARCHAR(100) DEFAULT NULL,
	`id_categorie` INT(11) NOT NULL,
	`par_defaut` TINYINT(1) DEFAULT '0',
	PRIMARY KEY (id_sous_categorie),
	FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie));

CREATE TABLE IF NOT EXISTS `evenement`(
	`id_evenement` INT(11) NOT NULL AUTO_INCREMENT,
	`titre` VARCHAR(255) DEFAULT NULL,
	`date_evenement` datetime DEFAULT NULL,
	`effectif` INT(11) DEFAULT NULL,
	`prix` FLOAT DEFAULT NULL,
	PRIMARY KEY (id_evenement));

CREATE TABLE IF NOT EXISTS `droits`(
	`id_droit` INT(11) NOT NULL AUTO_INCREMENT,
	`designation` VARCHAR(100) DEFAULT NULL,
	`type` INT(11) DEFAULT NULL,
	PRIMARY KEY (id_droit));

CREATE TABLE IF NOT EXISTS `utilisateur`(
	`id_utilisateur` INT(11) NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(50) DEFAULT NULL,
	`prenom` VARCHAR(50) DEFAULT NULL,
	`civilite` TINYINT(1) DEFAULT NULL,
	`email` VARCHAR(70) DEFAULT NULL,
	`mot_de_passe` VARCHAR(100) DEFAULT NULL,
	`IP` VARCHAR(20) DEFAULT NULL,
	`dateinscription` datetime DEFAULT NULL,
	`telfixe` VARCHAR(20) DEFAULT NULL,
	`telmobile` VARCHAR(20) DEFAULT NULL,
	`nb_verif` INT(11) NOT NULL,
	`etat_verif` TINYINT(1) DEFAULT NULL,
	`id_adresse` INT(11) NOT NULL,
	`id_droit` INT(11) NOT NULL,
	PRIMARY KEY (id_utilisateur),
	FOREIGN KEY (id_adresse) REFERENCES adresse(id_adresse),
	FOREIGN KEY (id_droit) REFERENCES droits(id_droit));

CREATE TABLE IF NOT EXISTS `espace` (
	`id_espace` INT(11) NOT NULL AUTO_INCREMENT,
	`id_utilisateur` INT(11) NOT NULL,
	PRIMARY KEY (id_espace),
	FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur));

CREATE TABLE IF NOT EXISTS `objet` (
	`id_objet` INT(11) NOT NULL AUTO_INCREMENT,
	`id_sous_categorie` INT(11) NOT NULL,
	`designation` VARCHAR(150) DEFAULT NULL,
	`description` text,
	`prix_achat` FLOAT DEFAULT NULL,
	`prix_location` FLOAT NOT NULL,
	`date_lencement` datetime DEFAULT NULL,
	`activation` TINYINT(1) DEFAULT NULL,
	`photo` VARCHAR(255) DEFAULT NULL,
	`reference` VARCHAR(30) DEFAULT NULL,
	PRIMARY KEY (id_objet),
	FOREIGN KEY (id_sous_categorie) REFERENCES sous_categorie(id_sous_categorie));

CREATE TABLE IF NOT EXISTS `composer` (
	`id_espace` INT(11) NOT NULL,
	`id_objet` INT(11) NOT NULL,
	PRIMARY KEY (id_espace, id_objet),
	FOREIGN KEY (id_espace) REFERENCES espace(id_espace),
	FOREIGN KEY (id_objet) REFERENCES objet(id_objet));

CREATE TABLE IF NOT EXISTS `facture` (
	`id_facture` INT(11) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (id_facture));

CREATE TABLE IF NOT EXISTS `acheter`(
	`id_acheter` INT(11) NOT NULL AUTO_INCREMENT,
	`date_achat` datetime DEFAULT NULL,
	`quantite` INT(11) NOT NULL,
	`prix_total` FLOAT DEFAULT NULL,
	`id_utilisateur` INT(11) NOT NULL,
	`id_objet` INT(11) NOT NULL,
	`id_facture` INT(11) NOT NULL,
	PRIMARY KEY (id_acheter),
	FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
	FOREIGN KEY (id_objet) REFERENCES objet(id_objet),
	FOREIGN KEY (id_facture) REFERENCES facture(id_facture));

CREATE TABLE IF NOT EXISTS `louer` (
	`id_louer` INT(11) NOT NULL AUTO_INCREMENT,
	`date_debut` datetime DEFAULT NULL,
	`date_fin` datetime DEFAULT NULL,
	`prix` FLOAT DEFAULT NULL,
	`id_utilisateur` INT(11) NOT NULL,
	`id_objet` INT(11) NOT NULL,
	`id_facture` INT(11) NOT NULL,
	PRIMARY KEY (id_louer),
	FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
	FOREIGN KEY (id_objet) REFERENCES objet(id_objet),
	FOREIGN KEY (id_facture) REFERENCES facture(id_facture));

CREATE TABLE IF NOT EXISTS `ticket` (
	`id_ticket` INT(11) NOT NULL AUTO_INCREMENT,
	`id_objet` INT(11) NOT NULL,
	`nb_places_restantes` INT(11) NOT NULL,
	`id_evenement` INT(11) NOT NULL,
	PRIMARY KEY (id_ticket),
	FOREIGN KEY (id_objet) REFERENCES objet(id_objet),
	FOREIGN KEY (id_evenement) REFERENCES evenement(id_evenement));

CREATE TABLE IF NOT EXISTS `musique` (
	`id_musique` INT(11) NOT NULL AUTO_INCREMENT,
	`id_objet` INT(11) NOT NULL,
	`duree` time DEFAULT NULL,
	`format` VARCHAR(10) DEFAULT NULL,
	`dossier` VARCHAR(100) DEFAULT NULL,
	`auteur` VARCHAR(255) DEFAULT NULL,
	PRIMARY KEY(id_musique),
	FOREIGN KEY (id_objet) REFERENCES objet(id_objet));

CREATE TABLE IF NOT EXISTS `jeux` (
	`id_jeux` INT(11) NOT NULL AUTO_INCREMENT,
	`id_objet` INT(11) NOT NULL,
	`format` VARCHAR(20) DEFAULT NULL,
	`editeur` VARCHAR(50) DEFAULT NULL,
	PRIMARY KEY (id_jeux),
	FOREIGN KEY (id_objet) REFERENCES objet(id_objet));

CREATE TABLE IF NOT EXISTS `film` (
	`id_film` INT(11) NOT NULL AUTO_INCREMENT,
	`id_objet` INT(11) NOT NULL,
	`format` VARCHAR(10) DEFAULT NULL,
	`resolution` VARCHAR(20) DEFAULT NULL,
	`sigle` VARCHAR(10) DEFAULT NULL,
	`realisateur` VARCHAR(80) DEFAULT NULL,
	`fichier` VARCHAR(150) DEFAULT NULL,
	PRIMARY KEY (id_film),
	FOREIGN KEY (id_objet) REFERENCES objet(id_objet));

CREATE TABLE IF NOT EXISTS `livre` (
	`id_livre` INT(11) NOT NULL AUTO_INCREMENT,
	`id_objet` INT(11) NOT NULL,
	`format` VARCHAR(10) DEFAULT NULL,
	`auteur` VARCHAR(20) DEFAULT NULL,
	PRIMARY KEY (id_livre),
	FOREIGN KEY (id_objet) REFERENCES objet(id_objet));

CREATE TABLE IF NOT EXISTS `historique` (
	`id_historique` INT(11) NOT NULL AUTO_INCREMENT,
	`date_obtention` datetime DEFAULT NULL,
	`quantite` INT(11) NOT NULL,
	`prix_total` FLOAT DEFAULT NULL,
	`type` VARCHAR(20) DEFAULT NULL,
	`id_utilisateur` INT(11) NOT NULL,
	`id_objet` INT(11) NOT NULL,
	`id_facture` INT(11) NOT NULL,
	PRIMARY KEY (id_historique),
	FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
	FOREIGN KEY (id_objet) REFERENCES objet(id_objet),
	FOREIGN KEY (id_facture) REFERENCES facture(id_facture));


INSERT INTO `adresse` (`id_adresse`, `designation`, `code_postal`, `ville`, `pays`) VALUES
(1, '91, rue des Soeurs', '13600', 'LA CIOTAT', 'France'),
(2, '28, Chemin des Bateliers', '61000', 'ALENÇON', 'France'),
(3, '19, rue des Chaligny', '58000', 'NEVERS', 'France'),
(4, '11, rue du Superflu', '67000', 'LYON', 'France'),
(5, '22, rue de Paris', '75001', 'PARIS', 'France'),
(6, '16, rue Saint-Georges', '15000', 'Ruynes en Margeride', 'France');

INSERT INTO `droits` (`id_droit`, `designation`, `type`) VALUES
(1, 'utilisateur', 1),
(2, 'utilisateur', 1),
(3, 'utilisateur', 1),
(4, 'utilisateur', 1),
(5, 'utilisateur', 1),
(6, 'utilisateur', 1);

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `civilite`, `email`, `mot_de_passe`, `IP`, `dateinscription`, `telfixe`, `telmobile`, `nb_verif`, `etat_verif`, `id_adresse`, `id_droit`)
VALUES (1, 'Jodoin', 'Martin', 0, 'MartinJodoin@orange.com', SHA1('Saijei2Ooph'), '23.556.332.67', '2014-01-02 14:34:35', '0534230681', '0681053423', 917832, 1, 1, 1),
(2, 'Charrette', 'RÃ©my', 0, 'RmyCharrette@teleworm.us', SHA1('Ka9poe9Eep6'), '54.456.212.45', '2014-01-03 12:03:12', '0597144482', '0714448205', 230681, 1, 2, 2),
(3, 'Grignon', 'Yvette', 1, 'YvetteGrignon@gmail.com', SHA1('zieBeik8ta2'), '32.343.224.34', '2014-01-03 14:56:02', '0377967860', '0603779678', 597144, 1, 3, 3),
(4, 'Park', 'Al', 0, 'al.park@gmail.com', SHA1('88fdsjkl77!R'), '38.314.225.43', '2014-01-04 14:57:22', '0147456824', '0614537745', 7458555, 1, 4, 4),
(5, 'Nom', 'PrÃ©nom', 0, 'p.nom@gmail.com', SHA1('azerty789*'), '21.222.124.10', '2014-01-05 14:46:12', '0147322547', '0633249825', 254774, 1, 5, 5),
(6, 'Falcon', 'Jean', 0, 'jean.falcon@live.fr', SHA1('1a2b3c'), '12.456.321.35', '2014-06-04 21:17:12', '0146896547', '0632346785', 46686, 1, 6, 6);

INSERT INTO `categorie` (`id_categorie`, `designation`) VALUES
(1, 'livre'),
(2, 'film'),
(3, 'musique'),
(4, 'jeux'),
(5, 'ticket');

INSERT INTO `sous_categorie` (`id_sous_categorie`, `designation`, `id_categorie`, `par_defaut`) VALUES
(1, 'Action et aventure', 2, NULL),
(2, 'Animation', 2, NULL),
(3, 'Classique', 2, NULL),
(4, 'Comédie', 2, NULL),
(5, 'Documentaire', 2, NULL),
(6, 'Drame', 2, NULL),
(7, 'Horreur', 2, NULL),
(8, 'Policier', 2, NULL),
(9, 'Science-fiction et fantastique', 2, 1),
(10, 'Bandes originales', 3, NULL),
(11, 'Blues', 3, NULL),
(12, 'Jazz', 3, NULL),
(13, 'Metal', 3, NULL),
(14, 'Musique Classique', 3, NULL),
(15, 'Musique du monde', 3, NULL),
(16, 'Musiques électroniques', 3, 1),
(17, 'Pop', 3, NULL),
(18, 'R&B/Soul', 3, NULL),
(19, 'Reggae', 3, NULL),
(20, 'Rock', 3, NULL),
(21, 'Variété française', 3, NULL),
(22, 'Actualité et Politique', 1, NULL),
(23, 'Arts', 1, NULL),
(24, 'Bandes dessinnées', 1, NULL),
(25, 'Cuisine', 1, NULL),
(26, 'Fantasy et Science-fiction', 1, NULL),
(27, 'Histoire', 1, NULL),
(28, 'Informatique et INTernet', 1, NULL),
(29, 'Jeunesse', 1, NULL),
(30, 'Littérature', 1, 1),
(31, 'Philosophie', 1, NULL),
(32, 'Romans Policier et Suspence', 1, NULL),
(33, 'Tourisme et Voyages', 1, NULL),
(34, 'Action et aventure', 4, 1),
(35, 'Combat', 4, NULL),
(36, 'Course', 4, NULL),
(37, 'Danse et Musique', 4, NULL),
(38, 'FPS', 4, NULL),
(39, 'Jeu de rôle', 4, NULL),
(40, 'Éducatif', 4, NULL),
(41, 'MMO', 4, NULL),
(42, 'Plate-forme', 4, NULL),
(43, 'Réflexion', 4, NULL),
(44, 'Sport', 4, NULL),
(45, 'Stratégie', 4, NULL),
(46, 'Arts / Musées', 5, NULL),
(47, 'Concerts', 5, 1),
(48, 'Salon / Foire', 5, NULL),
(49, 'Spectable', 5, NULL),
(50, 'Sports', 5, NULL),
(51, 'Théâtre', 5, NULL);

INSERT INTO `objet` (`id_objet`, `id_sous_categorie`, `designation`, `description`, `prix_achat`, `prix_location`, `date_lencement`, `activation`, `photo`, `reference`) VALUES
(1, 2, 'Albator, Corsaire de l''Espace', '2977. Albator, capitaine du vaisseau Arcadia, est un corsaire de l''espace. Il est condamné à mort, mais reste insaisissable.  Le jeune Yama, envoyé pour l''assassiner, s''infiltre dans l''Arcadia, alors qu''Albator décide d''entrer en guerre contre la Coalition Gaia afin de défendre sa planète d''origine, la Terre.', 13.99, 3.99, '2013-12-25 18:22:29', 1, 'albator.png', '#ANONETFF50'),
(2, 2, 'Minuscule', 'Dans une paisible forêt, les reliefs d''un pique-nique déclenchent une guerre sans merci entre deux bandes rivales de fourmis convoitant le même butin: une boîte de sucres! C''est dans cette tourmente qu''une jeune coccinelle va se lier d''amitié avec une fourmi noire et l''aider à sauver son peuple des terribles fourmis rouges...', 9.99, 2.99, '2014-01-29 08:36:30', 1, 'minuscule.jpg', '#ANONGGXE33'),
(3, 1, 'Insaisissables', '« Les Quatre Cavaliers », un groupe de brillants magiciens et illusionnistes, viennent de donner deux spectacles de magie époustouflants : le premier en braquant une banque sur un autre continent, le deuxième en transférant la fortune d''un banquier véreux sur les comptes en banque du public. Deux agents spéciaux du FBI et d''Interpol sont déterminés à les arrêter avant qu''ils ne mettent à exécution leur promesse de réaliser des braquages encore plus audacieux. Ils font appel à Thaddeus, spécialiste reconnu pour expliquer les tours de magie les plus sophistiqués. Alors que la pression s''intensifie, et que le monde entier attend le spectaculaire tour final des Cavaliers, la course contre la montre commence.', 11.99, 4.99, '2013-07-31 08:47:28', 1, 'insaisissables.jpg', '#INESLKHR56'),
(4, 1, 'Drive', 'Un jeune homme solitaire, "The Driver", conduit le jour à Hollywood pour le cinéma en tant que cascadeur et la nuit pour des truands. Ultra professionnel et peu bavard, il a son propre code de conduite. Jamais il n''a pris part aux crimes de ses employeurs autrement qu''en conduisant - et au volant, il est le meilleur !\r\nShannon, le manager qui lui décroche tous ses contrats, propose à Bernie Rose, un malfrat notoire, d''investir dans un véhicule pour que son poulain puisse affronter les circuits de stock-car professionnels. Celui-ci accepte mais impose son associé, Nino, dans le projet. \r\nC''est alors que la route du pilote croise celle d''Irene et de son jeune fils. Pour la première fois de sa vie, il n''est plus seul.\r\nLorsque le mari d''Irene sort de prison et se retrouve enrôlé de force dans un braquage pour s''acquitter d''une dette, il décide pourtant de lui venir en aide. L''expédition tourne mal…\r\nDoublé par ses commanditaires, et obsédé par les risques qui pèsent sur Irene, il n''a dès lors pas d''autre alternative que de les traquer un à un…', 7.99, 2.99, '2011-10-05 05:18:23', 1, 'drive.jpg', '#ACREAGXD40'),
(5, 9, 'Harry Potter et les reliques de la mort 1ère partie', 'Le pouvoir de Voldemort s''étend. Celui-ci contrôle maintenant le Ministère de la Magie et Poudlard. Harry, Ron et Hermione décident de terminer le travail commencé par Dumbledore, et de retrouver les derniers Horcruxes pour vaincre le Seigneur des Ténèbres. Mais il reste bien peu d''espoir aux trois sorciers, qui doivent réussir à tout prix.', 11.99, 4.99, '2010-11-24 08:36:30', 1, 'hprp1.jpg', '#SCUEETGA52'),
(6, 9, 'Harry Potter et les reliques de la mort 2ème partie', 'Dans la 2e Partie de cet épisode final, le combat entre les puissances du bien et du mal de l''univers des sorciers se transforme en guerre sans merci. Les enjeux n''ont jamais été si considérables et personne n''est en sécurité. Mais c''est Harry Potter qui peut être appelé pour l''ultime sacrifice alors que se rapproche l''ultime épreuve de force avec Voldemort.', 11.99, 4.99, '2011-07-13 08:36:30', 1, 'hprp2.jpg', '#SCUEFEXG33'),
(7, 2, 'FrankenWeenie', 'Après la mort soudaine de Sparky, son chien adoré, le jeune Victor fait appel au pouvoir de la science afin de ramener à la vie celui qui était aussi son meilleur ami. Il lui apporte au passage quelques modifications de son cru… Victor va tenter de cacher la créature qu''il a fabriquée mais lorsque Sparky s''échappe, ses copains de classe, ses professeurs et la ville tout entière vont apprendre que vouloir mettre la vie en laisse peut avoir quelques monstrueuses conséquences…', 9.99, 3.99, '2012-10-31 08:36:30', 1, 'frankenweenie.jpg', '#ANONEDBE50'),
(8, 2, 'Moi moche et méchant', 'Dans un charmant quartier résidentiel délimité par des clôtures de bois blanc et orné de rosiers fleurissants se dresse une bâtisse noire entourée d''une pelouse en friche. Cette façade sinistre cache un secret : Gru, un méchant vilain, entouré d''une myriade de sous-fifres et armé jusqu''aux dents, qui, à l''insu du voisinage, complote le plus gros casse de tous les temps : voler la lune (Oui, la lune !)...\r\nGru affectionne toutes sortes de sales joujoux. Il possède une multitude de véhicules de combat aérien et terrestre et un arsenal de rayons immobilisants et rétrécissants avec lesquels il anéantit tous ceux qui osent lui barrer la route... jusqu''au jour où il tombe nez à nez avec trois petites orphelines qui voient en lui quelqu''un de tout à fait différent : un papa.\r\nLe plus grand vilain de tous les temps se retrouve confronté à sa plus dure épreuve : trois fillettes prénommées Margo, Edith et Agnes.', 13.99, 4.99, '2010-10-06 08:36:30', 1, 'moi_moche.jpg', '#ANONTLTT26'),
(9, 17, 'Listen (David Guetta)', 'Listen est le sixième album studio du DJ et producteur musical français David Guetta, sortie le 24 novembre 2014 en France. Publié en deux éditions distinctes, l''opus standard comprend un unique disque incluant des collaborations avec des artistes issus de milieux influencés par la musique pop et le hip-hop tels que Sam Martin, Emeli Sandé, Elliphant (en), Ms. Dynamite, The Script, Nico & Vinz, John Legend, Sia, Bebe Rexha (en), Nicki Minaj, MAGIC!, Sonny Wilson, Ryan Tedder, Jaymes Young (en), Birdy, Vassy et Skylar Grey. Des producteurs comme Showtek, Avicii et Afrojack seront aussi présents.', 9.49, 3.49, '2014-12-06 08:36:30', 1, 'david_guetta_listen.jpg', '#POOPBEEF60'),
(10, 17, 'Prayer in C', 'Listen est le sixième album studio du DJ et producteur musical français David Guetta, sortPrayer In C est une chanson du groupe de folk formé par la chanteuse franco israélienne Nili Hadida et le francais Benjamin Cotto: Lilly Wood and the Prick 1.Elle figure sur leur premier album Invincible Friends sorti en 2010. En 2014 le DJ allemand Robin Schulz remixe la chanson qui sort en single et rencontre un important succès, se classant en tête des charts dans plusieurs pays européens.', 1.29, 0.99, '2014-12-06 12:45:23', 1, 'lilly_wood.jpg', '#POOPBALF72'),
(11, 1, 'Indiana Jones et le Royaume du Crâne de Cristal', 'La nouvelle aventure d''Indiana Jones débute dans un désert du sud-ouest des Etats-Unis. Nous sommes en 1957, en pleine Guerre Froide. Indy et son copain Mac viennent tout juste d''échapper à une bande d''agents soviétiques à la recherche d''une mystérieuse relique surgie du fond des temps. De retour au Marshall College, le Professeur Jones apprend une très mauvaise nouvelle : ses récentes activités l''ont rendu suspect aux yeux du gouvernement américain. Le doyen Stanforth, qui est aussi un proche ami, se voit contraint de le licencier. A la sortie de la ville, Indiana fait la connaissance d''un jeune motard rebelle, Mutt, qui lui fait une proposition inattendue. En échange de son aide, il le mettra sur la piste du Crâne de Cristal d''Akator, relique mystérieuse qui suscite depuis des siècles autant de fascination que de craintes. Ce serait à coup sûr la plus belle trouvaille de l''histoire de l''archéologie. Indy et Mutt font route vers le Pérou, terre de mystères et de superstitions, où tant d''explorateurs ont trouvé la mort ou sombré dans la folie, à la recherche d''hypothétiques et insaisissables trésors. Mais ils réalisent très vite qu''ils ne sont pas seuls dans leur quête : les agents soviétiques sont eux aussi à la recherche du Crâne de Cristal, car il est dit que celui qui possède le Crâne et en déchiffre les énigmes s''assure du même coup le contrôle absolu de l''univers. Le chef de cette bande est la cruelle et somptueuse Irina Spalko. Indy n''aura jamais d''ennemie plus implacable... Indy et Mutt réuissiront-ils à semer leurs poursuivants, à déjouer les pièges de leurs faux amis et surtout à éviter que le Crâne de Cristal ne tombe entre les mains avides d''Irina et ses sinistres sbires ?', 10.99, 3.99, '2008-05-21 09:24:55', 1, 'ij_le_crane_de_cristal.jpg', '#IDALLKFR58'),
(12, 1, 'Indiana Jones et la Derniere Croisade', 'L''archéologue aventurier Indiana Jones se retrouve aux prises avec un maléfique milliardaire. Aux côtés de la cupide Elsa et de son père, il part à la recherche du Graal.', 10.99, 3.99, '1989-10-18 09:24:55', 1, 'ij_et_la_derniere_croisade.jpg', '#IDDEHFGN87'),
(13, 1, 'Indiana Jones et le Temple Maudit', 'L''archéologue aventurier Indiana Jones est de retour. Il poursuit une terrible secte qui a dérobé un joyau sacré doté de pouvoirs fabuleux. Une chanteuse de cabaret et un époustouflant gamin l''aideront a affronter les dangers les plus insensés.', 9.99, 2.99, '1984-09-12 09:37:38', 1, 'ij_et_le_temple_maudit.jpg', '#IDITQZMB21'),
(14, 1, 'Indiana Jones, Les Aventuriers de l''Arche Perdue', '1936. Parti à la recherche d''une idole sacrée en pleine jungle péruvienne, l''aventurier Indiana Jones échappe de justesse à une embuscade tendue par son plus coriace adversaire : le Français René Belloq.
Revenu à la vie civile à son poste de professeur universitaire d''archéologie, il est mandaté par les services secrets et par son ami Marcus Brody, conservateur du National Museum de Washington, pour mettre la main sur le Médaillon de Râ, en possession de son ancienne amante Marion Ravenwood, désormais tenancière d''un bar au Tibet.
Cet artefact égyptien serait en effet un premier pas sur le chemin de l''Arche d''Alliance, celle-là même où Moïse conserva les Dix Commandements. Une pièce historique aux pouvoirs inimaginables dont Hitler cherche à s''emparer...', 9.99, 2.99, '1981-09-16 08:36:30', 1, 'ij_les_aventuriers_de_l_arche_perdue.jpg', '#IDUEHDYU48'),
(15, 17, 'Asteroids Galaxy Tour - Navigator', 'The Asteroids Galaxy Tour est un groupe de Pop danois créé en 2006 par Lars Iversen et Mette Lindberg. Le groupe, composé de 6 musiciens, fit parler de lui grâce aux titres Around the Bend, qui fut utilisé dans un spot publicitaire pour l''Apple iPod Touch de septembre 2008 et The Golden Age qui fut utilisé dans un spot publicitaire pour Nesfluid. Désormais, ce titre fait la une du générique de Comment ça va bien !, émission quotidienne de la chaîne France 2 présentée par Stéphane Bern. Le groupe a fait la première partie de Katy Perry à l''Olympia (Paris) le 16 juin 2009 et le 17 juin au Transbordeur (Lyon) ainsi qu''une prestation remarquée au festival Rock en Seine en août 2009.', 1.29, 0.79, '2014-09-16 08:36:30', 1, 'asteroids_galaxy_tour_navigator.jpg', '#ASORBSSJ26'),
(16, 16, 'Boys Noize - XTC Chemical Brothers Remix', 'Boys Noize, de son vrai nom Alexander Ridha1, est un producteur et DJ allemand de musique électronique. Depuis 2004, Boys Noize a fait paraître des EP sur les labels Kitsuné Music, Turbo et sur le label DJ Hell''s International DeeJay Gigolo Records. Il est également à la tête de son propre label Boysnoize Records fondé en 2005, regroupant des DJ comme D.I.M., Les Petits Pilous, Lady B ou encore Puzique (qui s''avère être un pseudonyme de Boys Noize lui-même et de son confrère D.I.M.).', 1.29, 0.79, '2012-06-19 08:36:30', 1, 'boys_noize_cover.jpg', '#BOTCLMZF61'),
(17, 17, 'Capital Cities - In a Tidal Wave of Mystery', 'Capital Cities est un duo indie pop américain de Los Angeles.', 1.29, 0.79, '2014-03-08 08:15:55', 1, 'capital_cities_in_a_tidal_wave_of_mystery.jpg', '#CARYKVLE97'),
(18, 16, 'Disclosure - You and Me (Flume Rmx).jpg', 'Disclosure est un groupe britannique de musique électronique, originaire de Reigate dans le comté de Surrey situé au sud de Londres. Actif depuis 2010, il est composé des frères Guy et Howard Lawrence.

En 2013, leur single White Noise se classe 2nd des charts britanniques. Settle, le premier album du duo, atteint la première place des ventes au Royaume-Uni lors de sa sortie. Il est nommé au Mercury Music Prize.

Ils collaboreront notamment avec le légendaire Nile Rodgers sur le morceau Together, fin 2013, aux côtés de Sam Smith et Jimmy Napes.

En 2014, le tube "You&me" feat Elisa Doolittle remixé par Flume fait un carton.', 1.29, 0.79, '2013-04-08 09:55:25', 1, 'disclosure_you_and_me_flume_rmx.jpg', '#DIMEKJGZ15'),
(19, 17, 'If The Kids - On The Run', '"If the kids are united then we''ll never be divided", voilà la ligne de base de Brice Montessuit, fondateur et compositeur du groupe. Lorsque, adolescent, Brice entend ce morceau de Sham 69, il décode une formule magicale. A partir de là, il connaîtra le succès avec un groupe de rock. Il aiguisera ensuite sa vision en tant que DJ et voit alors ses prods électro s''imposer dans le milieu (Yuksek remixera un de ses maxis). Sa dernière invention, c’est IF THE KIDS.', 1.29, 0.79, '2014-08-11 09:42:19', 1, 'if_the_kids_on_the_run.jpg', '#IFUNKSOS55'),
(20, 15, 'Jazzanova - Bohemian Sunset', 'Jazzanova est un collectif allemand de DJs basé à Berlin, composé d''Alexander Barck, Claas Brieler, Jürgen von Knoblauch, Roskow Kretschmann, Stefan Leisering, et Axel Reinemer. Le groupe évolue dans des styles nu-jazz, chill-out et jazz house, et est associé à des labels tels que Compost Records et Sonar Kollektiv. Ils se sont aussi essayés au latin jazz, que l''on peut écouter sur leur morceau Très bien.', 1.29, 0.79, '2005-02-23 09:53:12', 1, 'jazzanova_bohemian_sunset.jpg', '#JAETKSGE52'),
(21, 16, 'SebastiAn - Arabest', 'SebastiAn, de son vrai nom Sébastian Akchoté est un musicien français de musique électronique, évoluant sur le label Ed Banger Records.', 1.29, 0.79, '2009-01-15 10:10:48', 1, 'sebastian_arabest.jpg', '#SESTLSEZ26'),
(22, 16, 'SebastiAn - Motor', 'SebastiAn, de son vrai nom Sébastian Akchoté est un musicien français de musique électronique, évoluant sur le label Ed Banger Records.', 1.29, 0.79, '2009-01-15 10:11:48', 1, 'sebastian_motor.jpg', '#SEORSSNT79'),
(23, 16, 'SebastiAn - Ross Ross Ross', 'SebastiAn, de son vrai nom Sébastian Akchoté est un musicien français de musique électronique, évoluant sur le label Ed Banger Records.', 1.29, 0.79, '2009-01-15 10:12:48', 1, 'sebastian_ross_ross_ross.jpg', '#SESSZKST24'),
(24, 9, 'Star Wars : Episode IV', 'Il y a bien longtemps, dans une galaxie très lointaine... La guerre civile fait rage entre l''Empire galactique et l''Alliance rebelle. Capturée par les troupes de choc de l''Empereur menées par le sombre et impitoyable Dark Vador, la princesse Leia Organa dissimule les plans de l''Etoile Noire, une station spatiale invulnérable, à son droïde R2-D2 avec pour mission de les remettre au Jedi Obi-Wan Kenobi. Accompagné de son fidèle compagnon, le droïde de protocole C-3PO, R2-D2 s''échoue sur la planète Tatooine et termine sa quête chez le jeune Luke Skywalker. Rêvant de devenir pilote mais confiné aux travaux de la ferme, ce dernier se lance à la recherche de ce mystérieux Obi-Wan Kenobi, devenu ermite au coeur des montagnes désertiques de Tatooine...', 10.99, 2.99, '1977-10-19 21:00:00', 1, 'starwars.jpg', '#SCUEGBFE73'),
(25, 9, 'Le 5ème élément', 'Au XXIII siècle, dans un univers étrange et coloré, où tout espoir de survie est impossible sans la découverte du cinquième élément, un héros affronte le mal pour sauver l''humanité.', 10.99, 3.99, '1977-05-07 15:20', 1, '5e.jpg', '#SCUEFFXG35'),
(26, 9, 'Star Wars : Episode V', 'Malgré la destruction de l''Etoile Noire, l''Empire maintient son emprise sur la galaxie, et poursuit sans relâche sa lutte contre l''Alliance rebelle. Basés sur la planète glacée de Hoth, les rebelles essuient un assaut des troupes impériales. Parvenus à s''échapper, la princesse Leia, Han Solo, Chewbacca et C-3P0 se dirigent vers Bespin, la cité des nuages gouvernée par Lando Calrissian, ancien compagnon de Han. Suivant les instructions d''Obi-Wan Kenobi, Luke Skywalker se rend quant à lui vers le système de Dagobah, planète marécageuse où il doit recevoir l''enseignement du dernier maître Jedi, Yoda. Apprenant l''arrestation de ses compagnons par les stormtroopers de Dark Vador après la trahison de Lando, Luke décide d''interrompre son entraînement pour porter secours à ses amis et affronter le sombre seigneur Sith...', 10.96, 3.97, '1997-04-09 20:30', 1, 'starwarsv.jpg', '#SCUEFNFX17'),
(27, 9, 'Star Wars : Episode VI', 'L''Empire galactique est plus puissant que jamais : la construction de la nouvelle arme, l''Etoile de la Mort, menace l''univers tout entier... Arrêté après la trahison de Lando Calrissian, Han Solo est remis à l''ignoble contrebandier Jabba Le Hutt par le chasseur de primes Boba Fett. Après l''échec d''une première tentative d''évasion menée par la princesse Leia, également arrêtée par Jabba, Luke Skywalker et Lando parviennent à libérer leurs amis.
Han, Leia, Chewbacca, C-3PO et Luke, devenu un Jedi, s''envolent dès lors pour une mission d''extrême importance sur la lune forestière d''Endor, afin de détruire le générateur du bouclier de l''Etoile de la Mort et permettre une attaque des pilotes de l''Alliance rebelle. Conscient d''être un danger pour ses compagnons, Luke préfère se rendre aux mains de Dark Vador, son père et ancien Jedi passé du côté obscur de la Force.', 10.99, 4.37, '1997-04-23 20:30', 1, 'starwarsvi.jpg', '##SCUENTXG26');

INSERT INTO `film` (`id_film`, `id_objet`, `format`, `resolution`, `sigle`, `realisateur`, `fichier`) VALUES (1, 1, 'avi', '1280*720', 'FullHD', 'Shinji Aramaki', 'http://www.wat.tv/embedframe/207706chuPP3r11094327'),
(2, 2, 'mp4', '1280*720', 'FullHD', 'Thomas Szabo, Hélène Giraud', 'http://hqq.tv/player/embed_player.php?vid=9RA895R393XA&amp;autoplay'),
(3, 3, 'avi', '1280*720', 'FullHD', 'Louis Leterrier', 'http://www.kvid.org/embed-54779fba7a9f5'),
(4, 4, 'mkv', '1280*720', 'FullHD', 'Nicolas Winding Refn', 'http://youwatch.org/embed-kpfsppgr2c4m-640x360.html'),
(5, 5, 'mkv', '1280*720', 'FullHD', 'David Yates', 'http://hqq.tv/player/embed_player.php?vid=A15871R7HXNH&autoplay=no'),
(6, 6, 'mkv', '1280*720', 'FullHD', 'David Yates', 'http://exhttp://exashare.com/embed-zvru6zet0xhttp://exashare.com/embed-zvru6zet0xp9-660x340.html#p9-660x340.html#ahttp://exashare.com/embed-zvru6zet0xp9-660x340.html#share.com/embed-zvru6zet0xp9-660x340.html'),
(7, 7, 'mkv', '1280*720', 'FullHD', 'Tim Burton', 'http://speedvideo.net/embed-gu37w3kskh3s-600x360.html'),
(8, 8, 'avi', '1280*720', 'FullHD', 'Chris Renaud, Pierre Coffin', 'http://hqq.tv/player/embed_player.php?vid=WMXWH4663DN9&autoplay=no'),
(9, 11, 'avi', '1280*720', 'FullHD', 'Steven Spielberg', 'http://youwatch.org/embed-y4r1zratst0q-580x360.html'),
(10, 12, 'avi', '1280*720', 'FullHD', 'Steven Spielberg', 'http://www.exashare.com/embed-fbn0rvcz2ci1-640x380.html'),
(11, 13, 'avi', '1280*720', 'FullHD', 'Steven Spielberg', '//www.youtube.com/embed/cnT84KFearg'),
(12, 14, 'avi', '1280*720', 'FullHD', 'Steven Spielberg', 'http://youwatch.org/embed-8swfasan99hu-580x360.html'),
(13, 24, 'osf', '1280*720', 'FullHD', 'George Lucas', 'http://vk.com/video_ext.php?oid=202130367&id=165212721&hash=32dbd6e2301c8d2b'),
(14, 25, 'osf', '1280*720', 'FullHD', 'Luc Besson', 'http://vk.com/video_ext.php?oid=179334051&id=163287293&hash=4fa61141a01f243d'),
(15, 26, 'osf', '1280*720', 'FullHD', 'Irvin Kershner', 'http://vk.com/video_ext.php?oid=202130367&id=165212722&hash=85ae8898423d78eb'),
(16, 27, 'osf', '1280*720', 'FullHD', 'Richard Marquand', 'http://vk.com/video_ext.php?oid=202130367&id=165212724&hash=19f8fc1ae3bda3e3');


INSERT INTO `musique` (`id_musique`, `id_objet`, `duree`, `format`, `dossier`, `auteur`) VALUES (1, 9, 'none', 'mp3', 'listen/david.mp3', 'David Guetta'),
(2, 10, 'none', 'mp3', 'prayer', 'Nili Hadida'),
(3, 15, 'none', 'mp3', 'pop/the_asteroids_galaxy_tour_navigator.mp3', 'Asteroids Galaxy Tour'),
(4, 16, 'none', 'mp3', 'electro/boys_noize_xtc_chemical_brothers_remix.mp3', 'Boys Noize - Chemical Brothers Remix'),
(5, 17, 'none', 'mp3', 'pop/capital_cities_in_a_tidal_wave_of_mystery.mp3', 'Capital Cities'),
(6, 18, 'none', 'mp3', 'electro/disclosure_you_and_me_ft_eliza_doolittle_flume_remix.mp3', 'Disclosure'),
(7, 19, 'none', 'mp3', 'pop/if_the_kids_on_the_run.mp3', 'If The Kids'),
(8, 20, 'none', 'mp3', 'monde/jazzanova_bohemian_sunset.mp3', 'Jazzanova'),
(9, 21, 'none', 'mp3', 'electro/sebatian_arabest.mp3', 'SebastiAn'),
(10, 22, 'none', 'mp3', 'electro/sebatian_motor.mp3', 'SebastiAn'),
(11, 23, 'none', 'mp3', 'electro/sebatian_ross_ross_ross.mp3', 'SebastiAn');
