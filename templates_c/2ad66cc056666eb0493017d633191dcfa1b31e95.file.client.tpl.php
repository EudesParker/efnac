<?php /* Smarty version Smarty-3.1.18, created on 2014-12-15 20:14:36
         compiled from "vue\client.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23205548f331c005008-85416284%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ad66cc056666eb0493017d633191dcfa1b31e95' => 
    array (
      0 => 'vue\\client.tpl',
      1 => 1418308051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23205548f331c005008-85416284',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lerreur' => 0,
    'warning' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_548f331c0611c5_50866961',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548f331c0611c5_50866961')) {function content_548f331c0611c5_50866961($_smarty_tpl) {?><div id="client_conteneur">
	<h2>VOTRE COMPTE</h2>
	<div id="client">
		<div id="ancien_utilisateur">
			<h3>DÉJÀ CLIENT ?</h3>
			<p>Identifiez-vous pour vous connecter.</p>
			<div style="text-align:center;">
				<?php if ($_smarty_tpl->tpl_vars['lerreur']->value!=null&&$_smarty_tpl->tpl_vars['warning']->value==4) {?>
				<div id="error"><?php echo $_smarty_tpl->tpl_vars['lerreur']->value;?>
</div>
				<?php } else { ?>
				<?php }?>
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
				<?php if ($_smarty_tpl->tpl_vars['lerreur']->value!=null&&$_smarty_tpl->tpl_vars['warning']->value!=4) {?>
				<div id="error"><?php echo $_smarty_tpl->tpl_vars['lerreur']->value;?>
</div>
				<?php } else { ?>
				<?php }?>
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
</div><?php }} ?>
