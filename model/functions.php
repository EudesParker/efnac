<?php
	function formatTab($tab) {
		$tab = strtolower($tab);
		$initial = array("é", "è", "à", "ê", "ë", " ", "É", "Ê", "È", "Ë", "À","&");
		$remplacer = array("e", "e", "a", "e", "e", "_", "e", "e", "e", "e", "a","e");
		$tab = str_replace($initial, $remplacer, $tab);

		return $tab;
	}
	function smarty_modifier_formatTab($string) {
        $string = strtolower($string);
		$initial = array("é", "è", "à", "ê", "ë", " ", "É", "Ê", "È", "Ë", "À","&");
		$remplacer = array("e", "e", "a", "e", "e", "_", "e", "e", "e", "e", "a","e");
		$string = str_replace($initial, $remplacer, $string);

		return $string;
    }
    function smarty_modifier_formaterPrix($string) {
		$initial = array(".");
		$remplacer = array(",");
		$string = str_replace($initial, $remplacer, $string);

		return $string.' €';
    }
    function formaterPrix($string) {
		$initial = array(".");
		$remplacer = array(",");
		$string = str_replace($initial, $remplacer, $string);

		return $string.' €';
    }
    function smarty_modifier_couper_partie($string) {
        $string = (strlen($string) > 15) ? substr($string, 0, 15).".." : $string;
        return $string;
    }
    function smarty_modifier_couper_part($string) {
        $string = (strlen($string) > 10) ? substr($string, 0, 10).".." : $string;
        return $string;
    }
    function smarty_modifier_couper_rech($string) {
        $string = substr($string, 0, 230)." [...]";
        return $string;
    }
    function Shortciv($civilite)	//	Abréger la civilité exemple Monsieur => M.
	{
		return ($civilite == 1) ? 'Mme' : 'M.';
	}
	function Saluer($civilite, $nom)	//	On dit Bonjour, puis civilité abrégée puis nom de famille ex : Bonjour M. Duval
	{
		$formule = ((date("H"))>=18) ? 'Bonsoir' : 'Bonjour';
		return $formule.' '.$civilite.' '.$nom;
	}
	function genererRef($categ) {
		$morceau1 = $categ[0].''.$categ[1];

		$indication_number = rand(1000, 9999);

		$morceau2 = $categ[strlen($categ)-2].''.$categ[strlen($categ)-1];

		$initial = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		$remplacer = array("X", "A", "B", "N", "D", "E", "F", "G", "T", "L");
		$indication_letter = str_replace($initial, $remplacer, $indication_number);

		$indic = rand(10, 99);

		return '#'.strtoupper($morceau1).''.strtoupper($morceau2).''.$indication_letter.''.$indic;
	}
	function convertion($nombre)	// fonction de conversion de nombre en toute lettre
	{
		if($nombre < 0 || $nombre > 1000)
			return 'Le nombre entré n\'est pas correcte';
		else
		{
			if ($nombre == 0)
				return'zéro';
			else if ($nombre == 1000)
				return 'mille';
			else// nombre supérieur ou égal à cent
			{
				$unite = $nombre % 10;
				$dizaine = (($nombre % 100) - $unite) / 10;
				$centaine = (($nombre % 1000) - ($dizaine * 10) - $unite) / 100;
				switch($unite)
				{
					case 0: $l_unite = ''; break;
					case 1: $l_unite = 'un'; break;
					case 2: $l_unite = 'deux'; break;
					case 3: $l_unite = 'trois'; break;
					case 4: $l_unite = 'quatre'; break;
					case 5: $l_unite = 'cinq'; break;
					case 6: $l_unite = 'six'; break;
					case 7: $l_unite = 'sept'; break;
					case 8: $l_unite = 'huit'; break;
					case 9: $l_unite = 'neuf'; break;
					default: $l_unite = ''; break;
				}
				switch($unite)
				{
					case 1: $l_diz = 'onze'; break;
					case 2: $l_diz = 'douze'; break;
					case 3: $l_diz = 'treize'; break;
					case 4: $l_diz = 'quatorze'; break;
					case 5: $l_diz = 'quinze'; break;
					case 6: $l_diz = 'seize'; break;
					default: $l_diz = ''; break;
				}
				switch($dizaine)
				{
					case 0: $l_dizaine = ''; break;
					case 1: $l_dizaine = 'dix'; break;
					case 2: $l_dizaine = 'vingt'; break;
					case 3: $l_dizaine = 'trente'; break;
					case 4: $l_dizaine = 'quarante'; break;
					case 5: $l_dizaine = 'cinquante'; break;
					case 6: $l_dizaine = 'soixante'; break;
					case 7: $l_dizaine = 'soixante-dix'; break;
					case 8: $l_dizaine = 'quatre-vingt'; break;
					case 9: $l_dizaine = 'quatre-vingt-dix'; break;
					default: $l_dizaine = ''; break;
				}
				switch($centaine)
				{
					case 0: $l_centaine = ''; break;
					case 1: $l_centaine = 'cent'; break;
					case 2: $l_centaine = 'deux-cent'; break;
					case 3: $l_centaine = 'trois-cent'; break;
					case 4: $l_centaine = 'quatre-cent'; break;
					case 5: $l_centaine = 'cinq-cent'; break;
					case 6: $l_centaine = 'six-cent'; break;
					case 7: $l_centaine = 'sept-cent'; break;
					case 8: $l_centaine = 'huit-cent'; break;
					case 9: $l_centaine = 'neuf-cent'; break;
					default: $l_centaine = ''; break;
				}
				if(($dizaine == 1 && $unite > 0 && $unite < 7))
				{
					$tiret = '-';
						
					if( $nombre < 17)
						$tiret = '';
						
					return $l_centaine.''.$tiret.''.$l_diz;
				}
				else if(($dizaine == 7 && $unite > 0 && $unite < 7) || ($dizaine == 9 && $unite > 0 && $unite < 7))
				{
					switch($dizaine)
					{
						case 7: $l_dizaine = 'soixante'; break;
						case 9: $l_dizaine = 'quatre-vingt'; break;
						default: $l_dizaine = ''; break;
					}

					$tiretU = '-';	
					$tiret = '-';
			
					if($nombre < 100)
						$tiret = '';

					return $l_centaine.''.$tiret.''.$l_dizaine.''.$tiretU.''.$l_diz;
				}
				else
				{
					$tiret = '-';
						
					if($unite ==  0)
						$tiret = '';
					if($nombre < 100)
						$tiret = '';
						
					if($unite ==  0 OR $nombre < 17)
						$tiretU = '';
					if($unite ==  1 && $nombre > 16)
						$tiretU = '-et-';
					if($unite >  1 && $nombre > 16)
						$tiretU = '-';

					return $l_centaine.''.$tiret.''.$l_dizaine.''.$tiretU.''.$l_unite;
				}
			}
		}
	}
	function utf8_array($array) { // Encode toutes les entrées d'un tableau en utf8 sur 3 niveaux.
    	// Premier niveau
	    foreach($array as $c=>$v) {
	        // Second niveau
	        if(is_array($array[$c])) {
	            foreach($array[$c] as $c2=>$v2) {
	                // troisieme niveau
	                if(is_array($array[$c][$c2]))
	                    $array[$c][$c2] = array_map("utf8_encode", $array[$c][$c2]);
	                else
	                    $array[$c][$c2] = utf8_encode($array[$c][$c2]);
	            }
	        }
	        else
	            $array[$c] = utf8_encode($array[$c]);
	    }
	    return($array);
	}
	function formaterDate()
	{
		$date = '';

		$jour = date("D");

		switch ($jour) {
			case 'Mon': $jour = 'Lundi'; break;
			case 'Tue': $jour = 'Mardi'; break;
			case 'Wed': $jour = 'Mercredi'; break;
			case 'Thu': $jour = 'Jeudi'; break;
			case 'Fri': $jour = 'Vendredi'; break;
			case 'Sat': $jour = 'Samedi'; break;
			case 'Sun': $jour = 'Dimanche'; break;
			default: /* code...*/ break;
		}

		$mois = date('m');

		switch ($mois) {
			case '01': $mois = 'Janvier'; break;
			case '02': $mois = 'Février'; break;
			case '03': $mois = 'Mars'; break;
			case '04': $mois = 'Avril'; break;
			case '05': $mois = 'Mai'; break;
			case '06': $mois = 'Juin'; break;
			case '07': $mois = 'Juillet'; break;
			case '08': $mois = 'Août'; break;
			case '09': $mois = 'Septembre'; break;
			case '10': $mois = 'Octobre'; break;
			case '11': $mois = 'Novembre'; break;
			case '12': $mois = 'Décembre'; break;
			default: /* code...*/ break;
		}

		$date .= $jour.' '.date('d').' '.$mois.' '.date('Y');

		return $date;
	}
	function returnHeure()
	{
		return date('H:i:s');
	}
	function smarty_modifier_returnHeure()
	{
		return date('H:i:s');
	}
	function smarty_modifier_formaterDate()
	{
		$date = '';

		$jour = date("D");

		switch ($jour) {
			case 'Mon': $jour = 'Lundi'; break;
			case 'Tue': $jour = 'Mardi'; break;
			case 'Wed': $jour = 'Mercredi'; break;
			case 'Thu': $jour = 'Jeudi'; break;
			case 'Fri': $jour = 'Vendredi'; break;
			case 'Sat': $jour = 'Samedi'; break;
			case 'Sun': $jour = 'Dimanche'; break;
			default: /* code...*/ break;
		}

		$mois = date('m');

		switch ($mois) {
			case '01': $mois = 'Janvier'; break;
			case '02': $mois = 'Février'; break;
			case '03': $mois = 'Mars'; break;
			case '04': $mois = 'Avril'; break;
			case '05': $mois = 'Mai'; break;
			case '06': $mois = 'Juin'; break;
			case '07': $mois = 'Juillet'; break;
			case '08': $mois = 'Août'; break;
			case '09': $mois = 'Septembre'; break;
			case '10': $mois = 'Octobre'; break;
			case '11': $mois = 'Novembre'; break;
			case '12': $mois = 'Décembre'; break;
			default: /* code...*/ break;
		}

		$date .= $jour.' '.date('d').' '.$mois.' '.date('Y');

		return $date;
	}
	function superGlobale() {
		echo '<br/><a href="index.php?tab=destroy"><p class="destroy">session_destroy()</p></a>';
		echo '<table style="border:3px solid #818181;width:300px;margin:20px 0 0 50px;text-align:center;border-collapse:collapse;">
	    	<thead>
	    		<th style="background:#bd6fd9;color: #606060;font-size: 24px;" colspan="2">Tableau : _SESSION</th>
	    	</thead>
	    	<tbody>';
	    foreach ($_SESSION as $key => $value) {
	    	echo '
	    	<tr style="background:#f1d7f5">
	    		<td style="border:1px solid #818181;padding:2px 10px">'.$key.'</td>
	    		<td style="border:1px solid #818181;padding:2px 5px;text-align:left">';
	    		if (gettype($value) != 'array' && gettype($value) != 'object') {
	    			echo $value;
	    		}
	    		else {
	    			var_dump($value);
	    		}
	    	echo'</td>
	    	</tr>';
	    }
	   	echo '</tbody>
	    </table>';
	    echo '<table style="border:3px solid #818181;width:300px;margin:20px 0 0 50px;text-align:center;border-collapse:collapse;">
	    	<thead>
	    		<th style="background:#74daaa;color: #606060;font-size: 24px;" colspan="2">Tableau : _GET</th>
	    	</thead>
	    	<tbody>';
	    foreach ($_GET as $key => $value) {
	    	echo '
	    	<tr style="background:#d7f5ee">
	    		<td style="border:1px solid #818181;padding:2px">'.$key.'</td>
	    		<td style="border:1px solid #818181;padding:2px">'.$value.'</td>
	    	</tr>
	    	';
	    }
	   	echo '</tbody>
	    </table>';
	    echo '<table style="border:3px solid #818181;width:300px;margin:20px 0 0 50px;text-align:center;border-collapse:collapse;">
	    	<thead>
	    		<th style="background:#79b6db;color: #606060;font-size: 24px;" colspan="2">Tableau : _POST</th>
	    	</thead>
	    	<tbody>';
	    foreach ($_POST as $key => $value) {
	    	echo '
	    	<tr style="background:#d7e5f5">
	    		<td style="border:1px solid #818181;padding:2px">'.$key.'</td>
	    		<td style="border:1px solid #818181;padding:2px">'.$value.'</td>
	    	</tr>
	    	';
	    }
	   	echo '</tbody>
	    </table>';
	    echo '<table style="border:3px solid #818181;width:300px;margin:20px 0 20px 50px;text-align:center;border-collapse:collapse;">
	    	<thead>
	    		<th style="background:#daac74;color: #606060;font-size: 24px;" colspan="2">Tableau : _COOKIE</th>
	    	</thead>
	    	<tbody>';
	    foreach ($_COOKIE as $key => $value) {
	    	echo '
	    	<tr style="background:#f2eacc">
	    		<td style="border:1px solid #818181;padding:2px">'.$key.'</td>
	    		<td style="border:1px solid #818181;padding:2px">'.$value.'</td>
	    	</tr>
	    	';
	    }
	   	echo '</tbody>
	    </table>';    
	}
?>