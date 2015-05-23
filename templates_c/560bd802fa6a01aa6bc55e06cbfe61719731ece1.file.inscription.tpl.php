<?php /* Smarty version Smarty-3.1.18, created on 2015-01-03 17:56:27
         compiled from "vue\inscription.tpl" */ ?>
<?php /*%%SmartyHeaderCode:610254a81f3b6d3917-67173974%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '560bd802fa6a01aa6bc55e06cbfe61719731ece1' => 
    array (
      0 => 'vue\\inscription.tpl',
      1 => 1417601552,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '610254a81f3b6d3917-67173974',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'email' => 0,
    'lerreur' => 0,
    'liste_pays' => 0,
    'valeur' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54a81f3b880da5_69282201',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a81f3b880da5_69282201')) {function content_54a81f3b880da5_69282201($_smarty_tpl) {?><div id="client_conteneur">
	<h2>INSCRIPTION</h2>
	<div id="inscription">
		<h3>INSEREZ VOS INFORMATIONS</h3>
		<p>Votre adresse e-mail est <?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</p>
		<div style="text-align:center;">
			<?php if ($_smarty_tpl->tpl_vars['lerreur']->value!=null) {?>
			<div id="error"><?php echo $_smarty_tpl->tpl_vars['lerreur']->value;?>
</div>
			<?php } else { ?>
			<?php }?>
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
							<?php  $_smarty_tpl->tpl_vars['valeur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valeur']->_loop = false;
 $_smarty_tpl->tpl_vars['cle'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['liste_pays']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valeur']->key => $_smarty_tpl->tpl_vars['valeur']->value) {
$_smarty_tpl->tpl_vars['valeur']->_loop = true;
 $_smarty_tpl->tpl_vars['cle']->value = $_smarty_tpl->tpl_vars['valeur']->key;
?>
								<?php if ($_smarty_tpl->tpl_vars['valeur']->value=='France') {?>
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
					<th colspan="2"><input type="submit" value="Étape suivante"  /></th>
				</tfoot>
			</table>
		</form>
	</div>
</div><?php }} ?>
