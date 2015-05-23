<div id="client_conteneur">
	<h2>VOTRE COMPTE</h2>
	<div id="client">
		<div id="ancien_utilisateur">
			<h3>DÉJÀ CLIENT ?</h3>
			<p>Identifiez-vous pour vous connecter.</p>
			<div style="text-align:center;">
				{if $lerreur neq null && $warning eq 4}
				<div id="error">{$lerreur}</div>
				{else}
				{/if}
			</div>
			<form METHOD="POST" ACTION="index.php?tab=mon_compte&etape=connexion">
				<table>
					<tbody>
						<tr>
							<td>Votre adresse E-mail</td>
							<td><input type="email" name="email"/></td>
						</tr>
						<tr>
							<td>Votre mot de passe</td>
							<td><input type="password" name="mot_de_passe"/></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="stay_connect" value="ok" /></td>
							<td><label for="stay_connect">Rester connecté(e)</label></td>
						</tr>
						<!--<tr id="forget">
							<td></td>
							<td><a href="#">Mot de passe oublié?</a></td>
						</tr>-->
					</tbody>
					<tfoot>
						<th colspan="2"><input type="submit" value="S'identifier"/></th>
					</tfoot>
				</table>
			</form>
		</div>
		<div id="nouvel_utilisateur">
			<h3>NOUVEAU CLIENT ?</h3>
			<p>Créer votre compte.</p>
			<div style="text-align:center;">
				{if $lerreur neq null && $warning neq 4}
				<div id="error">{$lerreur}</div>
				{else}
				{/if}
			</div>
			<form METHOD="POST" ACTION="index.php?tab=mon_compte&etape=inscription">
				<table>
					<tbody>
						<tr>
							<td>Votre adresse E-mail</td>
							<td><input type="email" name="email" required /></td>
						</tr>
					</tbody>
					<tfoot>
						<th colspan="2"><input type="submit" value="Créer son compte" /></th>
					</tfoot>
				</table>
			</form>
		</div>
	</div>
</div>