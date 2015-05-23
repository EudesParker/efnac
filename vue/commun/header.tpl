<div id="header_content">
	<div id="coolline"></div>
	<header>
		<a href="index.php"><img src="img/logo.png" alt="logo page d'accueil" id="logo" /></a>
		<nav>
		    <ul>
		    <!-- $menu est une variable smarty assignée dans le fichier data.php récupérant la variable php $navigation, upper transforme le texte en majuscule -->
		    {foreach from = $menu item = onglet}
		    	{if isset($smarty.get.tab)}
			    	{if $smarty.get.tab eq $onglet|formatTab}
			    	<a href="index.php?tab={$onglet|formatTab}"><li class="active">{$onglet|upper}</li></a>
			    	{else}
			    	<a href="index.php?tab={$onglet|formatTab}"><li>{$onglet|upper}</li></a>
			    	{/if}
		    	{else}
		    		{if $onglet eq 'Film'}
			    	<a href="index.php?tab={$onglet|formatTab}"><li class="active">{$onglet|upper}</li></a>
			    	{else}
			    	<a href="index.php?tab={$onglet|formatTab}"><li>{$onglet|upper}</li></a>
			    	{/if}
		    	{/if}
		    {/foreach}
		    </ul>
		</nav>
		<div id="deco">
			{if isset($smarty.session.id_client)}
		    	<a href="index.php?tab=mon_compte&etape=deconnexion"><li>{'Déconnexion'|upper}</li></a>
		    {else}
		    {/if}
		</div>
		<a href="index.php?tab=panier">{$voirpanier}</a>
	</header>
</div>