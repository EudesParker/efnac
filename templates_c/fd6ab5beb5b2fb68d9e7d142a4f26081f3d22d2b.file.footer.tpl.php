<?php /* Smarty version Smarty-3.1.18, created on 2014-12-16 12:52:29
         compiled from "vue\commun\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18798548f329cf08144-76687576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd6ab5beb5b2fb68d9e7d142a4f26081f3d22d2b' => 
    array (
      0 => 'vue\\commun\\footer.tpl',
      1 => 1418730741,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18798548f329cf08144-76687576',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_548f329cf299d0_35710642',
  'variables' => 
  array (
    'menu' => 0,
    'foo' => 0,
    'tablenb' => 0,
    'nmb' => 0,
    'nbClient' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548f329cf299d0_35710642')) {function content_548f329cf299d0_35710642($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include 'D:\\wamp\\www\\DEV 2014\\E-FNAC 11-12-2014 22h53\\E-FNAC 11-12-2014 22h53\\smarty\\plugins\\modifier.capitalize.php';
?><div id="foot">
	<footer>
		<table id="tablefoot">

		<tr>
			<td>
				<ul class="footitem">
					<p>Rubrique :</p>
				<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? count($_smarty_tpl->tpl_vars['menu']->value)-2+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['menu']->value)-2)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 0, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
     				<li><a href="index.php?tab=<?php echo smarty_modifier_formatTab($_smarty_tpl->tpl_vars['menu']->value[$_smarty_tpl->tpl_vars['foo']->value]);?>
"><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['menu']->value[$_smarty_tpl->tpl_vars['foo']->value]);?>
 <!--(<?php echo $_smarty_tpl->tpl_vars['tablenb']->value[$_smarty_tpl->tpl_vars['foo']->value]['nb'];?>
)--></a></li>
    			<?php }} ?>
					<li>
				    <?php if (isset($_smarty_tpl->tpl_vars['nmb']->value)) {?>
					    <span style="color:transparent">Nombres d'articles : <?php echo $_smarty_tpl->tpl_vars['nmb']->value;?>
</span>
					    <?php } else { ?>
					    <span style="color:transparent">.</span>
				    <?php }?>
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
				<li><span style="color:transparent">Nombre Total de Clients : <?php echo $_smarty_tpl->tpl_vars['nbClient']->value;?>
</span></li>
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
</div><?php }} ?>
