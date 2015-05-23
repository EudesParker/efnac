<?php /* Smarty version Smarty-3.1.18, created on 2014-12-15 20:12:28
         compiled from "vue\haut.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32034548f329cdc39c0-02186312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a7393c57f918a56261635db06cedb87f83d6a13' => 
    array (
      0 => 'vue\\haut.tpl',
      1 => 1416823163,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32034548f329cdc39c0-02186312',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_548f329cdfdff6_09707041',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548f329cdfdff6_09707041')) {function content_548f329cdfdff6_09707041($_smarty_tpl) {?><!DOCTYPE html><!-- La balise !DOCTYPE est le premier élément censé apparaître dans le code d'une page html. c'est un indicateur qui permet au navigateur de savoir quelles règles appliquer pour la mise en page du document-->
<html> <!-- La balise <html> permet d'indiquer au navigateur web que le document auquel il accède est un document HTML. -->
    <?php echo $_smarty_tpl->getSubTemplate ("vue/commun/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <body> <!-- La balise <body> fait partie des balises structurant un document HTML. Ce tag encadre le corps du document, c'est à dire les informations qui seront visibles dans le navigateur qui affichera la page -->
    	<div id="content"><!-- Conteneur du site -->
	    	<?php echo $_smarty_tpl->getSubTemplate ("vue/commun/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
