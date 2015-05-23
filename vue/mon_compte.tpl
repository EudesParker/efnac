<div id="client_compte">
	<h2>MON COMPTE</h2>
	<div id="mon_compte">
		<ul id="list_compte">
		{foreach from=$navClient item=onglet}
			{if $smarty.get.onglet eq $onglet|formatTab}
			<a href="index.php?tab={$perso}&onglet={$onglet|formatTab}">
				<li class="active">{$onglet}</li>
			</a>
			{else}
			<a href="index.php?tab={$perso}&onglet={$onglet|formatTab}">
				<li>{$onglet}</li>
			</a>
			{/if}
		{/foreach}
		</ul><!--
		--><div id="second">
			<h3>{$salutation} <span style="float:right;margin-right:10px">{formaterDate()}, <span id="compteur">{returnHeure()}</span></span></h3>
			{if $smarty.get.onglet eq 'infos_personnelles'}
			<form METHOD="POST" ACTION="index.php?tab={$perso}&onglet=infos_personnelles">
				<table>
					<tbody>
						<tr>
							<td>Civilite</td>
							<td>
								<input type="radio" name="civilite" value="0" {if $tableauclient.2 eq 0}checked{/if} required /><label for="M">M.</label>
								<input type="radio" name="civilite" value="1" {if $tableauclient.2 eq 1}checked{/if} required /><label for="Mme">Mme</label>
							</td>
						</tr>
						<tr>
							<td>Nom</td>
							<td><input type="text" name="nom" value="{$tableauclient.0}" required /></td>
						</tr>
						<tr>
							<td>Prénom</td>
							<td><input type="text" name="prenom" value="{$tableauclient.1}" required /></td>
						</tr>
						<tr>
							<td>Adresse E-mail</td>
							<td><input type="text" name="email" value="{$tableauclient.6}" required /></td>
						</tr>
						<tr>
							<td>Mot de passe</td>
							<td><input type="password" name="mot_de_passe" value="{$tableauclient.3}" required /></td>
						</tr>
						<tr>
							<td>Téléphone Fixe</td>
							<td><input type="text" name="telfixe" value="{$tableauclient.4}" required /></td>
						</tr>
						<tr>
							<td>Téléphone Mobile</td>
							<td><input type="text" name="telmobile" value="{$tableauclient.5}" required /></td>
						</tr>
						<tr>
							<td>Adresse</td>
							<td><input type="text" name="adresse" value="{$tableauadresse.0}"  required /></td>
						</tr>
						<tr>
							<td>Code postal</td>
							<td><input type="text" name="code_postal" value="{$tableauadresse.1}" required /></td>
						</tr>
						<tr>
							<td>Ville</td>
							<td><input type="text" name="ville" value="{$tableauadresse.2}" required /></td>
						</tr>
						<tr>
							<td>Pays</td>
							<td>
								<select name="pays" id="pays" required >
								{foreach from=$liste_pays key=cle item=valeur}
									{if $valeur eq $tableauadresse.3}
									<option value="{$valeur}" selected="selected">{$valeur}</option>
									{else}
									<option value="{$valeur}">{$valeur}</option>
									{/if}
								{/foreach}
								</select>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<th colspan="2"><input type="submit" value="Modifier"  /></th>
					</tfoot>
				</table>
			</form>
			{elseif $smarty.get.onglet eq 'historique_des_commandes'}
			<table>
				<thead>
					<th>Historique des commandes <!--({$nombreFact})--></th>
				</thead>{$i = 0}
				{foreach from=$mesfactures item=fact}
					<table id="table_historique">
						<thead>
							<th colspan="5">N° Facture : H 00 000{$fact.id_facture}</th>
							<tr>
								<td>Titre</td>
								<td>Quantité</td>
								<td>Prix total</td>
								<td>Type</td>
								<td>Date d'obtention</td>
							</tr>
						</thead>
						<tbody>
						{foreach from=$table_factures.$i item=valeur}
							
							<tr>
								<td>{$valeur.designation}</td>
								<td>{$valeur.quantite}</td>
								<td>{$valeur.prix_total|formaterPrix}</td>
								<td>{$valeur.type}</td>
								<td>{$valeur.date_obtention}</td>
							</tr>
							
						{/foreach}
						{$i = $i + 1}
						</tbody>
					</table>
				{/foreach}
				</table>
			{elseif $smarty.get.onglet eq 'mes_objets_achetes'}
			<div id="conteneur_obj">
				{foreach from=$obj_achetes item=value}
				<a href="index.php?tab=mon_compte&onglet=objet&id={$value.id_objet}"><div class="obj_esp">{$value.designation}</div></a>
				{/foreach}
			</div>
			{elseif $smarty.get.onglet eq 'mes_objets_loues'}
			<div id="conteneur_obj">
				{foreach from=$obj_loues item=value}
				<a href="index.php?tab=mon_compte&onglet=objet&id={$value.id_objet}"><div class="obj_esp">{$value.designation}</div></a>
				{/foreach}
			</div>
			{elseif $smarty.get.onglet eq 'objet'}
				{if isset($fichier_film)}
					<h2>{$fichier_film.designation}</h2>
					<iframe src="{$fichier_film.fichier}" width="607" height="360" frameborder="0"></iframe>
					<!--<video src="film/{$fichier_film.fichier}" controls></video>-->
					<!--<video controls width="600">
						<source src="{$fichier_film.fichier}" type="video/{$fichier_film.format}" />
					</video>-->
				{else}
					<h2>{$fichier_musique.designation}</h2>
					<audio src="music/{$fichier_musique.dossier}" controls style="margin: 12px 262px;"></audio>
				{/if}
			{/if}
		</div>
	</div>
</div>
<script type="text/javascript" src="js/minuterie.js"></script>