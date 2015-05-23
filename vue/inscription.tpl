<div id="client_conteneur">
	<h2>INSCRIPTION</h2>
	<div id="inscription">
		<h3>INSEREZ VOS INFORMATIONS</h3>
		<p>Votre adresse e-mail est {$email}</p>
		<div style="text-align:center;">
			{if $lerreur neq null}
			<div id="error">{$lerreur}</div>
			{else}
			{/if}
		</div>
		<form METHOD="POST" ACTION="index.php?tab=mon_compte&etape=enregistrement">
			<table>
				<tbody>
					<tr>
						<td>Civilite</td>
						<td>
							<input type="radio" name="civilite" value="M" required /><label for="M">M.</label>
							<input type="radio" name="civilite" value="Mme" required /><label for="Mme">Mme</label>
						</td>
					</tr>
					<tr>
						<td>Nom</td>
						<td><input type="text" name="nom" required /></td>
					</tr>
					<tr>
						<td>Prénom</td>
						<td><input type="text" name="prenom" required /></td>
					</tr>
					<tr>
						<td>Mot de passe</td>
						<td><input type="password" name="mot_de_passe" required /></td>
					</tr>
					<tr>
						<td>Confirmer le mot de passe</td>
						<td><input type="password" name="mot_de_passe2" required /></td>
					</tr>
					<tr>
						<td>Téléphone Fixe</td>
						<td><input type="text" name="telfixe" required /></td>
					</tr>
					<tr>
						<td>Téléphone Mobile</td>
						<td><input type="text" name="telmobile" required /></td>
					</tr>
					<tr>
						<td>Adresse</td>
						<td><input type="text" name="adresse" required /></td>
					</tr>
					<tr>
						<td>Code postal</td>
						<td><input type="text" name="code_postal" required /></td>
					</tr>
					<tr>
						<td>Ville</td>
						<td><input type="text" name="ville" required /></td>
					</tr>
					<tr>
						<td>Pays</td>
						<td>
							<select name="pays" id="pays" required >
							{foreach from=$liste_pays key=cle item=valeur}
								{if $valeur eq 'France'}
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
					<th colspan="2"><input type="submit" value="Étape suivante"  /></th>
				</tfoot>
			</table>
		</form>
	</div>
</div>