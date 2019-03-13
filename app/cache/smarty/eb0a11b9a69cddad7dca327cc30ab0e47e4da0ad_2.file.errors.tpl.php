<?php /* Smarty version 3.1.27, created on 2019-02-15 13:41:04
         compiled from "E:\Projects\test_site\app\views\errors.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:268095c669740be1179_26113480%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb0a11b9a69cddad7dca327cc30ab0e47e4da0ad' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\errors.tpl',
      1 => 1448308689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '268095c669740be1179_26113480',
  'variables' => 
  array (
    'errors' => 0,
    '_error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c669740be8c86_70891717',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c669740be8c86_70891717')) {
function content_5c669740be8c86_70891717 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '268095c669740be1179_26113480';
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