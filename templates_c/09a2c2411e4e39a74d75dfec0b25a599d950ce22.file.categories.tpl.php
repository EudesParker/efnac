<?php /* Smarty version Smarty-3.1.18, created on 2014-12-16 17:06:09
         compiled from "vue\categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30735548f329d0bb644-77977457%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09a2c2411e4e39a74d75dfec0b25a599d950ce22' => 
    array (
      0 => 'vue\\categories.tpl',
      1 => 1418745963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30735548f329d0bb644-77977457',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_548f329d330980_06058343',
  'variables' => 
  array (
    'categ' => 0,
    'valeur' => 0,
    'pl' => 0,
    'total' => 0,
    'rech' => 0,
    'element' => 0,
    'objets' => 0,
    'abs' => 0,
    'lobjet' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548f329d330980_06058343')) {function content_548f329d330980_06058343($_smarty_tpl) {?><div id="produit_conteneur">
	<div id="left">
		<p id="title_genre">Genre</p>
		
			<?php  $_smarty_tpl->tpl_vars['valeur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valeur']->_loop = false;
 $_smarty_tpl->tpl_vars['cle'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categ']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valeur']->key => $_smarty_tpl->tpl_vars['valeur']->value) {
$_smarty_tpl->tpl_vars['valeur']->_loop = true;
 $_smarty_tpl->tpl_vars['cle']->value = $_smarty_tpl->tpl_vars['valeur']->key;
?>
				<?php if (smarty_modifier_formatTab($_smarty_tpl->tpl_vars['valeur']->value['designation'])==$_GET['categ']) {?>
			<a href="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo smarty_modifier_formatTab($_smarty_tpl->tpl_vars['valeur']->value['designation']);?>
"><p class="descateg active"><?php echo $_smarty_tpl->tpl_vars['valeur']->value['designation'];?>
<span style="font-size:13px">(<?php echo $_smarty_tpl->tpl_vars['valeur']->value['nombre'];?>
)</span></p></a>
				<?php } else { ?>
			<a href="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo smarty_modifier_formatTab($_smarty_tpl->tpl_vars['valeur']->value['designation']);?>
"><p class="descateg"><?php echo $_smarty_tpl->tpl_vars['valeur']->value['designation'];?>
 <span style="font-size:13px">(<?php echo $_smarty_tpl->tpl_vars['valeur']->value['nombre'];?>
)</span></p></a>
				<?php }?>
			<?php } ?>
	</div><!--
	--><div id="center">
		<form method="POST" action="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo $_GET['categ'];?>
">
			<input type="text" name="research" id="research_barre" placeholder="Rechercher" /><!--
			--><input type="submit" value="" id="research_bouton" />
		</form>
		<?php if (isset($_POST['research'])) {?>
		<h2 class="recherche_h2">Résultat<?php echo $_smarty_tpl->tpl_vars['pl']->value;?>
 de la recherche pour « <?php echo $_POST['research'];?>
 » : <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 résultat<?php echo $_smarty_tpl->tpl_vars['pl']->value;?>
.</h2>
		<div id="recherche">
			<?php if ($_smarty_tpl->tpl_vars['total']->value==0) {?>
			<p style="font-size:19px;font-style:italic;">Désolé, il n'y a aucun résultat associé à votre recherche.</p>
			<?php } else { ?>
				<?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_smarty_tpl->tpl_vars['cle'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rech']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value) {
$_smarty_tpl->tpl_vars['element']->_loop = true;
 $_smarty_tpl->tpl_vars['cle']->value = $_smarty_tpl->tpl_vars['element']->key;
?>
				<a href="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo $_GET['categ'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['element']->value['id_objet'];?>
" title="Voir l'annonce."><h3><?php echo $_smarty_tpl->tpl_vars['element']->value['designation'];?>
</h3>
					<p><?php echo smarty_modifier_couper_rech($_smarty_tpl->tpl_vars['element']->value['description']);?>
</p>
				</a>
				<?php } ?>
			<?php }?>
		</div>
		<?php } else { ?>
		<div id="product_contain"><!--
		<?php  $_smarty_tpl->tpl_vars['valeur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valeur']->_loop = false;
 $_smarty_tpl->tpl_vars['cle'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['objets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valeur']->key => $_smarty_tpl->tpl_vars['valeur']->value) {
$_smarty_tpl->tpl_vars['valeur']->_loop = true;
 $_smarty_tpl->tpl_vars['cle']->value = $_smarty_tpl->tpl_vars['valeur']->key;
?>
		
		<?php if ($_smarty_tpl->tpl_vars['valeur']->value['id']==$_GET['id']) {?>
		--><div class="obj select">
			<a href="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo $_GET['categ'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['valeur']->value['id'];?>
">
			<?php if ($_GET['tab']=='film') {?>
				<img src="img/<?php echo $_smarty_tpl->tpl_vars['valeur']->value['photo'];?>
" width="150px" height="210px;" />
			<?php } elseif ($_GET['tab']=='musique') {?>
				<img src="img/<?php echo $_smarty_tpl->tpl_vars['valeur']->value['photo'];?>
" width="150px" height="150px;" />
			<?php }?>
			</a>
			<p class="title"><?php echo smarty_modifier_couper_partie($_smarty_tpl->tpl_vars['valeur']->value['designation']);?>
</p>
			<p class="price"><?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['valeur']->value['prix_achat']);?>
 / <?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['valeur']->value['prix_location']);?>
</p>
		</div><!--
		--><?php } else { ?><!--
		--><div class="obj">
			<a href="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo $_GET['categ'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['valeur']->value['id'];?>
">
			<?php if ($_GET['tab']=='film') {?>
				<img src="img/<?php echo $_smarty_tpl->tpl_vars['valeur']->value['photo'];?>
" width="150px" height="210px;" />
			<?php } elseif ($_GET['tab']=='musique') {?>
				<img src="img/<?php echo $_smarty_tpl->tpl_vars['valeur']->value['photo'];?>
" width="150px" height="150px;" />
			<?php }?>
			</a>
			<p class="title"><?php echo smarty_modifier_couper_partie($_smarty_tpl->tpl_vars['valeur']->value['designation']);?>
</p>
			<p class="price"><?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['valeur']->value['prix_achat']);?>
 / <?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['valeur']->value['prix_location']);?>
</p>
		</div><!--
		--><?php }?><!--
		<?php } ?>-->
		<?php if ($_smarty_tpl->tpl_vars['abs']->value!=null) {?>
		<p class="abs"><?php echo $_smarty_tpl->tpl_vars['abs']->value;?>
</p>
		<?php } else { ?>
		<ul id="pagination">
				<li style="color:grey;">Début</li><!--
				--><li style="color:grey;">«</li><!--
				--><li>1</li><!--
				--><!--<li>2</li>--><!--
				--><!--<li>3</li>--><!--
				--><!--<li>4</li>--><!--
				--><!--<li>5</li>--><!--
				--><!--<li>6</li>--><!--
				--><!--<li>7</li>--><!--
				--><!--<li>8</li>--><!--
				--><li style="color:grey;">»</li><!--
				--><li style="border-right:1px solid lightgrey;color:grey;">Fin</li>
			</ul>
		<?php }?>
	</div>
	<?php }?>
	</div><!--
	--><div id="right">
		<div id="top">
		<?php if ($_smarty_tpl->tpl_vars['abs']->value!=null||$_smarty_tpl->tpl_vars['lobjet']->value==null) {?>
			<img src="img/pro.png" class="proch">
		<?php } else { ?>
			<?php if ($_GET['tab']=='film') {?>
			<img src="img/<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['photo'];?>
" width="70" height="100" />
			<?php } elseif ($_GET['tab']=='musique') {?>
			<img src="img/<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['photo'];?>
" width="70" height="70" />
			<?php }?>
			<h4><?php echo $_smarty_tpl->tpl_vars['lobjet']->value['designation'];?>
</h4>
			<p><?php echo $_smarty_tpl->tpl_vars['lobjet']->value['description'];?>
</p>
			<form method="POST" action="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo $_GET['categ'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['id_objet'];?>
">
				<input type="hidden" name="achat" value="<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['prix_achat'];?>
" />
				<input type="hidden" name="id_produit" value="id=<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['id_objet'];?>
" />
				<input type="hidden" name="type" value="achat" />
				<input type="hidden" name="categorie" value="<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['categorie'];?>
" />
				<input type="submit" value="Acheter <?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['lobjet']->value['prix_achat']);?>
" id="button_achat" />
			</form>
			<form method="POST" action="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo $_GET['categ'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['id_objet'];?>
">
				<input type="hidden" name="location" value="<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['prix_location'];?>
" />
				<input type="hidden" name="id_produit" value="id=<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['id_objet'];?>
" />
				<input type="hidden" name="type" value="location" />
				<input type="hidden" name="categorie" value="<?php echo $_smarty_tpl->tpl_vars['lobjet']->value['categorie'];?>
" />
				<input type="submit" value="Location <?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['lobjet']->value['prix_location']);?>
" id="button_location" />
			</form>
		<?php }?>
		</div>
		<div id="bottom">
			<h3>Nouveautés</h3>
		<?php  $_smarty_tpl->tpl_vars['valeur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valeur']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valeur']->key => $_smarty_tpl->tpl_vars['valeur']->value) {
$_smarty_tpl->tpl_vars['valeur']->_loop = true;
?>
			<div class="obj select">
				<a href="index.php?tab=<?php echo $_GET['tab'];?>
&categ=<?php echo $_GET['categ'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['valeur']->value['id_objet'];?>
">
				<?php if ($_GET['tab']=='film') {?>
					<img src="img/<?php echo $_smarty_tpl->tpl_vars['valeur']->value['photo'];?>
" width="130px" height="190px;" />
				<?php } elseif ($_GET['tab']=='musique') {?>
					<img src="img/<?php echo $_smarty_tpl->tpl_vars['valeur']->value['photo'];?>
" width="130px" height="130px;" />
				<?php }?>
				</a>
				<p class="title"><?php echo smarty_modifier_couper_part($_smarty_tpl->tpl_vars['valeur']->value['designation']);?>
</p>
				<p class="price"><?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['valeur']->value['prix_achat']);?>
 / <?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['valeur']->value['prix_location']);?>
</p>
			</div>
		<?php } ?>
		</div>
	</div>
</div><?php }} ?>
