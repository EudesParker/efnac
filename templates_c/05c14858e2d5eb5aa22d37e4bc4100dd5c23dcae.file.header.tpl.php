<?php /* Smarty version Smarty-3.1.18, created on 2014-12-16 00:26:48
         compiled from "vue\commun\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23920548f329ce67a00-68485449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05c14858e2d5eb5aa22d37e4bc4100dd5c23dcae' => 
    array (
      0 => 'vue\\commun\\header.tpl',
      1 => 1418686004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23920548f329ce67a00-68485449',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_548f329cee91a1_73270723',
  'variables' => 
  array (
    'menu' => 0,
    'onglet' => 0,
    'voirpanier' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548f329cee91a1_73270723')) {function content_548f329cee91a1_73270723($_smarty_tpl) {?><div id="header_content">
	<div id="coolline"></div>
	<header>
		<a href="index.php"><img src="img/logo.png" alt="logo page d'accueil" id="logo" /></a>
		<nav>
		    <ul>
		    <!-- $menu est une variable smarty assignée dans le fichier data.php récupérant la variable php $navigation, upper transforme le texte en majuscule -->
		    <?php  $_smarty_tpl->tpl_vars['onglet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['onglet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['onglet']->key => $_smarty_tpl->tpl_vars['onglet']->value) {
$_smarty_tpl->tpl_vars['onglet']->_loop = true;
?>
		    	<?php if (isset($_GET['tab'])) {?>
			    	<?php if ($_GET['tab']==smarty_modifier_formatTab($_smarty_tpl->tpl_vars['onglet']->value)) {?>
			    	<a href="index.php?tab=<?php echo smarty_modifier_formatTab($_smarty_tpl->tpl_vars['onglet']->value);?>
"><li class="active"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['onglet']->value, 'UTF-8');?>
</li></a>
			    	<?php } else { ?>
			    	<a href="index.php?tab=<?php echo smarty_modifier_formatTab($_smarty_tpl->tpl_vars['onglet']->value);?>
"><li><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['onglet']->value, 'UTF-8');?>
</li></a>
			    	<?php }?>
		    	<?php } else { ?>
		    		<?php if ($_smarty_tpl->tpl_vars['onglet']->value=='Film') {?>
			    	<a href="index.php?tab=<?php echo smarty_modifier_formatTab($_smarty_tpl->tpl_vars['onglet']->value);?>
"><li class="active"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['onglet']->value, 'UTF-8');?>
</li></a>
			    	<?php } else { ?>
			    	<a href="index.php?tab=<?php echo smarty_modifier_formatTab($_smarty_tpl->tpl_vars['onglet']->value);?>
"><li><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['onglet']->value, 'UTF-8');?>
</li></a>
			    	<?php }?>
		    	<?php }?>
		    <?php } ?>
		    </ul>
		</nav>
		<div id="deco">
			<?php if (isset($_SESSION['id_client'])) {?>
		    	<a href="index.php?tab=mon_compte&etape=deconnexion"><li><?php echo mb_strtoupper('Déconnexion', 'UTF-8');?>
</li></a>
		    <?php } else { ?>
		    <?php }?>
		</div>
		<a href="index.php?tab=panier"><?php echo $_smarty_tpl->tpl_vars['voirpanier']->value;?>
</a>
	</header>
</div><?php }} ?>
