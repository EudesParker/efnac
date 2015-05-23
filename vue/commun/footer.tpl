<div id="foot">
	<footer>
		<table id="tablefoot">

		<tr>
			<td>
				<ul class="footitem">
					<p>Rubrique :</p>
				{for $foo=0 to $menu|@count-2}
     				<li><a href="index.php?tab={$menu.$foo|formatTab}">{$menu.$foo|capitalize} <!--({$tablenb.$foo.nb})--></a></li>
    			{/for}
					<li>
				    {if isset($nmb)}
					    <span style="color:transparent">Nombres d'articles : {$nmb}</span>
					    {else}
					    <span style="color:transparent">.</span>
				    {/if}
					</li>
				</ul>
			</td>
			
			<td><ul class="footitem">
				<p>Le site :</p>
				<!--<li>L'ergonomie</li>
				<li>Le design</li>
				<li>Les fonctionnalités</li>-->
				<li><a href="img/part_fnac.png" target="_blank">Nos partenaires</a></li>
				<li><a href="img/arbo.png" target="_blank">Plan du site</a></li>
				<li><a href="img/contact_fnac.png" target="_blank">Nous contacter</a></li>
				<li><span style="color:transparent">Nombre Total de Clients : {$nbClient}</span></li>
				<li><span style="color:transparent">.</span></li>
				<li><span style="color:transparent">.</span></li>
			</ul></td>
			
			<td><ul class="footitem">
				<p>A propos de E-FNAC :</p>
				<li><a href="img/acti_princip_fnac.png" target="_blank">Activité principale</a></li>
				<li><a href="img/strat_fnac_2015.png" target="_blank">Stratégie du groupe</a></li>
				<li><a href="img/strat_concurr_fnac.png" target="_blank">Stratégie concurrentiel</a></li>
				<li><a href="img/organi_fnac.png" target="_blank">Organigramme</a></li>
				<li><a href="img/ca_fnac.png" target="_blank">Chiffre d'affaires</a></li>
				<li><a href="img/statut_fnac.png" target="_blank">Statut de l'entreprise</li>
			
			</ul></td>
			</tr>
			<tr>
			<!--<td><ul class="footitem">
				<p>XXXXXXXXX :</p>
				<li>XXXXXXXXX XXXX XXXXXX</li>
				<li>XXXXXXXXX XXXX XXXXXX</li>
				<li>XXXXXXXXX XXXX XXXXXX</li>
				<li>XXXXXXXXX XXXX XXXXXX</li>
				<li>XXXXXXXXX XXXX XXXXXX</li>

			</ul></td>
			
			<td><ul class="footitem">
				<p>Nous contacter :</p>
				<li>Sur le site</li>
				<li>Par e-mail</li>
				<li>Par téléphone</li>
				<li>Adresse postales</li>
				<li>Forum de discussions</li>
			
			</ul></td>--></tr>
		</table>
		<div id="finblock">
			<img src="img/logo.png" alt="logo officiel jakod" />
			<ul id="presentement">
				
				<li>Copyright © 2014 E-FNAC Corporation. Tous droits réservés.</li>
				<li>MENTIONS LÉGALES</li>
				<li>POLITIQUE DE CONFIDENTIALITÉ</li>
				<li>INFORMATIONS SUR LA SOCIÉTÉ</li>
				
			</ul>
		</div>
	</footer>
</div>