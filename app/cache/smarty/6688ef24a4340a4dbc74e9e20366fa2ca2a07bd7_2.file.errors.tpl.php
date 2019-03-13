<?php /* Smarty version 3.1.27, created on 2019-01-30 15:11:51
         compiled from "F:\Projects\test_site\app\views\errors.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:76485c519487aac768_86796735%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6688ef24a4340a4dbc74e9e20366fa2ca2a07bd7' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\errors.tpl',
      1 => 1448308689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76485c519487aac768_86796735',
  'variables' => 
  array (
    'errors' => 0,
    '_error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c519487ab8789_55592110',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c519487ab8789_55592110')) {
function content_5c519487ab8789_55592110 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '76485c519487aac768_86796735';
if ($_smarty_tpl->tpl_vars['errors']->value) {?>
	<ul class="errors">
		<?php
$_from = $_smarty_tpl->tpl_vars['errors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['_error'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['_error']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['_error']->value) {
$_smarty_tpl->tpl_vars['_error']->_loop = true;
$foreach__error_Sav = $_smarty_tpl->tpl_vars['_error'];
?>
		<li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_error']->value, ENT_QUOTES, 'UTF-8');?>
</li>
		<?php
$_smarty_tpl->tpl_vars['_error'] = $foreach__error_Sav;
}
?>
	</ul>
<?php }
}
}
?>