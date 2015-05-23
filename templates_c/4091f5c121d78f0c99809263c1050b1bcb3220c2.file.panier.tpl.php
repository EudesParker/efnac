<?php /* Smarty version Smarty-3.1.18, created on 2014-12-16 17:34:42
         compiled from "vue\panier.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24732548f3310bd1278-68194139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4091f5c121d78f0c99809263c1050b1bcb3220c2' => 
    array (
      0 => 'vue\\panier.tpl',
      1 => 1418747677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24732548f3310bd1278-68194139',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_548f3310c6b7e8_37775977',
  'variables' => 
  array (
    'liste' => 0,
    'valeur' => 0,
    'montant' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548f3310c6b7e8_37775977')) {function content_548f3310c6b7e8_37775977($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include 'D:\\wamp\\www\\DEV 2014\\E-FNAC 11-12-2014 22h53\\E-FNAC 11-12-2014 22h53\\smarty\\plugins\\modifier.capitalize.php';
?><div id="conteneur_panier">
	<form method="POST" action="index.php?tab=panier">
		<table cellspacing="0" cellpadding="0" border="1">
			<?php if ($_smarty_tpl->tpl_vars['liste']->value==null) {?>
				<tr>
					<td colspan="5" style="height:200px">Votre panier est vide</td>
				</tr>
			<?php } else { ?>
			<thead>
				<tr>
					<td>Article</td>
					<!--<td width="150"><Catégorie</td>-->
					<td width="150">Type</td>
					<td width="150">Quantité</td>
					<!--<td width="150">Montant</td>-->
					<td width="150">Prix</td>
					<td width="150">Supprimer</td>

				</tr>
			</thead>
			<tbody>
			
				<?php  $_smarty_tpl->tpl_vars['valeur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valeur']->_loop = false;
 $_smarty_tpl->tpl_vars['cle'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['liste']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valeur']->key => $_smarty_tpl->tpl_vars['valeur']->value) {
$_smarty_tpl->tpl_vars['valeur']->_loop = true;
 $_smarty_tpl->tpl_vars['cle']->value = $_smarty_tpl->tpl_vars['valeur']->key;
?>
				<tr>
					<td style="text-align:left;">
						<div class="cadreout">
							<div class="cadre2">
								<a id="modifier" href="article.php?id_mod=3">
									<img src="img/<?php echo $_smarty_tpl->tpl_vars['valeur']->value['photo'];?>
">
								</a>
							</div>
						</div>
						<p><?php echo $_smarty_tpl->tpl_vars['valeur']->value['designation'];?>
</p>
					</td>
					<!--<td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['valeur']->value['categorie']);?>
</td>-->
					<td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['valeur']->value['type']);?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['valeur']->value['qte'];?>
</td>
					<!--<td><?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['valeur']->value['montant']);?>
</td>-->
					<td><?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['valeur']->value['prix']);?>
</td>
					<td><input type="submit" value="Supprimer" name="supp" /></td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="2"></td>
					<td>TOTAL:</td>
					<td><?php echo smarty_modifier_formaterPrix($_smarty_tpl->tpl_vars['montant']->value);?>
</td>
				</tr>
			</tfoot>
			<?php }?>
		</table>
		<?php if ($_smarty_tpl->tpl_vars['liste']->value!=null) {?>
		<input type="submit" value="Passer la commande" name="commander" style="margin: 10px 0;"/>
		<?php } else { ?>
		<span style="margin:5px;"></span>
		<?php }?>
	</form>
</div><?php }} ?>
