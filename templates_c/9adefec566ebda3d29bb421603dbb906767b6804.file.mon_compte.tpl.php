<?php /* Smarty version Smarty-3.1.18, created on 2014-12-16 00:28:50
         compiled from "vue\mon_compte.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3706548f334d0fb045-64891616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9adefec566ebda3d29bb421603dbb906767b6804' => 
    array (
      0 => 'vue\\mon_compte.tpl',
      1 => 1418686128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3706548f334d0fb045-64891616',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_548f334d2a71c7_14975640',
  'variables' => 
  array (
    'navClient' => 0,
    'onglet' => 0,
    'perso' => 0,
    'salutation' => 0,
    'tableauclient' => 0,
    'tableauadresse' => 0,
    'liste_pays' => 0,
    'valeur' => 0,
    'nombreFact' => 0,
    'mesfactures' => 0,
    'fact' => 0,
    'i' => 0,
    'table_factures' => 0,
    'obj_achetes' => 0,
    'value' => 0,
    'obj_loues' => 0,
    'fichier_film' => 0,
    'fichier_musique' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548f334d2a71c7_14975640')) {function content_548f334d2a71c7_14975640($_smarty_tpl) {?><div id="client_compte">
	<h2>MON COMPTE</h2>
	<div id="mon_compte">
		<ul id="list_compte">
		<?php  $_smarty_tpl->tpl_vars['onglet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['onglet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['navClient']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['onglet']->key => $_smarty_tpl->tpl_vars['onglet']->value) {
$_smarty_tpl->tpl_vars['onglet']->_loop = true;
?>
			<?php if ($_GET['onglet']==smarty_modifier_formatTab($_smarty_tpl->tpl_vars['onglet']->value)) {?>
			<a href="index.php?tab=<?php echo $_smarty_tpl->tpl_vars['perso']->value;?>
&onglet=<?php echo smarty_modifier_formatTab($_smarty_tpl->tpl_vars['onglet']->value);?>
">
				<li class="active"><?php echo $_smarty_tpl->tpl_vars['onglet']->value;?>
</li>
			</a>
			<?php } else { ?>
			<a href="index.php?tab=<?php echo $_smarty_tpl->tpl_vars['perso']->value;?>
&onglet=<?php echo smarty_modifier_formatTab($_smarty_tpl->tpl_vars['onglet']->value);?>
">
				<li><?php echo $_smarty_tpl->tpl_vars['onglet']->value;?>
</li>
			</a>
			<?php }?>
		<?php } ?>
		</ul><!--
		--><div id="second">
			<h3><?php echo $_smarty_tpl->tpl_vars['salutation']->value;?>
 <span style="float:right;margin-right:10px"><?php echo formaterDate();?>
, <span id="compteur"><?php echo returnHeure();?>
</span></span></h3>
			<?php if ($_GET['onglet']=='infos_personnelles') {?>
			<form METHOD="POST" ACTION="index.php?tab=<?php echo $_smarty_tpl->tpl_vars['perso']->value;?>
&onglet=infos_personnelles">
				<table>
					<tbody>
						<tr>
							<td>Civilite</td>
							<td>
								<input type="radio" name="civilite" value="0" <?php if ($_smarty_tpl->tpl_vars['tableauclient']->value[2]==0) {?>checked<?php }?> required /><label for="M">M.</label>
								<input type="radio" name="civilite" value="1" <?php if ($_smarty_tpl->tpl_vars['tableauclient']->value[2]==1) {?>checked<?php }?> required /><label for="Mme">Mme</label>
							</td>
						</tr>
						<tr>
							<td>Nom</td>
							<td><input type="text" name="nom" value="<?php echo $_smarty_tpl->tpl_vars['tableauclient']->value[0];?>
" required /></td>
						</tr>
						<tr>
							<td>Prénom</td>
							<td><input type="text" name="prenom" value="<?php echo $_smarty_tpl->tpl_vars['tableauclient']->value[1];?>
" required /></td>
						</tr>
						<tr>
							<td>Adresse E-mail</td>
							<td><input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['tableauclient']->value[6];?>
" required /></td>
						</tr>
						<tr>
							<td>Mot de passe</td>
							<td><input type="password" name="mot_de_passe" value="<?php echo $_smarty_tpl->tpl_vars['tableauclient']->value[3];?>
" required /></td>
						</tr>
						<tr>
							<td>Téléphone Fixe</td>
							<td><input type="text" name="telfixe" value="<?php echo $_smarty_tpl->tpl_vars['tableauclient']->value[4];?>
" required /></td>
						</tr>
						<tr>
							<td>Téléphone Mobile</td>
							<td><input type="text" name="telmobile" value="<?php echo $_smarty_tpl->tpl_vars['tableauclient']->value[5];?>
" required /></td>
						</tr>
						<tr>
							<td>Adresse</td>
							<td><input type="text" name="adresse" value="<?php echo $_smarty_tpl->tpl_vars['tableauadresse']->value[0];?>
"  required /></td>
						</tr>
						<tr>
							<td>Code postal</td>
							<td><input type="text" name="code_postal" value="<?php echo $_smarty_tpl->tpl_vars['tableauadresse']->value[1];?>
" required /></td>
						</tr>
						<tr>
							<td>Ville</td>
							<td><input type="text" name="ville" value="<?php echo $_smarty_tpl->tpl_vars['tableauadresse']->value[2];?>
" required /></td>
						</tr>
						<tr>
							<td>Pays</td>
							<td>
								<select name="pays" id="pays" required >
								<?php  $_smarty_tpl->tpl_vars['valeur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valeur']->_loop = false;
 $_smarty_tpl->tpl_vars['cle'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['liste_pays']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valeur']->key => $_smarty_tpl->tpl_vars['valeur']->value) {
$_smarty_tpl->tpl_vars['valeur']->_loop = true;
 $_smarty_tpl->tpl_vars['cle']->value = $_smarty_tpl->tpl_vars['valeur']->key;
?>
									<?php if ($_smarty_tpl->tpl_vars['valeur']->value==$_smarty_tpl->tpl_vars['tableauadresse']->value[3]) {?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['valeur']->value;?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['valeur']->value;?>
</option>
									<?php } else { ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['valeur']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['valeur']->value;?>
</option>
									<?php }?>
								<?php } ?>
								</select>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<th colspan="2"><input type="submit" value="Modifier"  /></th>
					</tfoot>
				</table>
			</form>
			<?php } elseif ($_GET['onglet']=='historique_des_commandes') {?>
			<table>
				<thead>
					<th>Historique des commandes <!--(<?php echo $_smarty_tpl->tpl_vars['nombreFact']->value;?>
)--></th>
				</thead><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['fact'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fact']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mesfactures']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fact']->key => $_smarty_tpl->tpl_vars['fact']->value) {
$_smarty_tpl->tpl_vars['fact']->_loop = true;
?>
					<table id="table_historique">
						<thead>
							<th colspan="5">N° Facture : H 00 000<?php echo $_smarty_tpl->tpl_vars['fact']->value['id_facture'];?>
</th>
							<tr>
								<td>Titre</td>
								<td>Quantité</td>
								<td>Prix total</td>
								<td>Type</td>
								<td>Date d'obtention</td>
							</tr>
						</thead>
						<tbody>
						<?php  $_smarty_tpl->tpl_vars['valeur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valeur']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table_factures']->value[$_smarty_tpl->tpl_vars['i']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valeur']->key => $_smarty_tpl->tpl_vars['valeur']->value) {
$_smarty_tpl->tpl_vars['valeur']->_loop = true;
?>
							
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['valeur']->value['designation'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['valeur']->value['quantite'];?>
</td>
								<td><?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['valeur']->value['prix_total']);?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['valeur']->value['type'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['valeur']->value['date_obtention'];?>
</td>
							</tr>
							
						<?php } ?>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
						</tbody>
					</table>
				<?php } ?>
				</table>
			<?php } elseif ($_GET['onglet']=='mes_objets_achetes') {?>
			<div id="conteneur_obj">
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['obj_achetes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
				<a href="index.php?tab=mon_compte&onglet=objet&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id_objet'];?>
"><div class="obj_esp"><?php echo $_smarty_tpl->tpl_vars['value']->value['designation'];?>
</div></a>
				<?php } ?>
			</div>
			<?php } elseif ($_GET['onglet']=='mes_objets_loues') {?>
			<div id="conteneur_obj">
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['obj_loues']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
				<a href="index.php?tab=mon_compte&onglet=objet&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id_objet'];?>
"><div class="obj_esp"><?php echo $_smarty_tpl->tpl_vars['value']->value['designation'];?>
</div></a>
				<?php } ?>
			</div>
			<?php } elseif ($_GET['onglet']=='objet') {?>
				<?php if (isset($_smarty_tpl->tpl_vars['fichier_film']->value)) {?>
					<h2><?php echo $_smarty_tpl->tpl_vars['fichier_film']->value['designation'];?>
</h2>
					<iframe src="<?php echo $_smarty_tpl->tpl_vars['fichier_film']->value['fichier'];?>
" width="607" height="360" frameborder="0"></iframe>
					<!--<video src="film/<?php echo $_smarty_tpl->tpl_vars['fichier_film']->value['fichier'];?>
" controls></video>-->
					<!--<video controls width="600">
						<source src="<?php echo $_smarty_tpl->tpl_vars['fichier_film']->value['fichier'];?>
" type="video/<?php echo $_smarty_tpl->tpl_vars['fichier_film']->value['format'];?>
" />
					</video>-->
				<?php } else { ?>
					<h2><?php echo $_smarty_tpl->tpl_vars['fichier_musique']->value['designation'];?>
</h2>
					<audio src="music/<?php echo $_smarty_tpl->tpl_vars['fichier_musique']->value['dossier'];?>
" controls style="margin: 12px 262px;"></audio>
				<?php }?>
			<?php }?>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/minuterie.js"></script><?php }} ?>
