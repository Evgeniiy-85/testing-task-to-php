<?php /* Smarty version 3.1.27, created on 2019-01-30 15:11:24
         compiled from "F:\Projects\test_site\app\views\menu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:36815c51946ce0c3c9_17676190%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fabaecabae5d37d0784289ecef746cdc3c99c7d' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\menu.tpl',
      1 => 1547803790,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36815c51946ce0c3c9_17676190',
  'variables' => 
  array (
    'main_menu' => 0,
    '_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c51946ce162d5_23815643',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c51946ce162d5_23815643')) {
function content_5c51946ce162d5_23815643 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '36815c51946ce0c3c9_17676190';
if ($_smarty_tpl->tpl_vars['main_menu']->value) {?>
<div class="main-menu">
	<div class="container">
		<?php
$_from = $_smarty_tpl->tpl_vars['main_menu']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['_item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->_loop = true;
$foreach__item_Sav = $_smarty_tpl->tpl_vars['_item'];
?>
		<div class="menu-item<?php if ($_SERVER['REQUEST_URI'] == $_smarty_tpl->tpl_vars['_item']->value['url']) {?> selected<?php }?>"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['url'], ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['_item']->value['blank']) {?> target="_blank"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a></div>
		<?php
$_smarty_tpl->tpl_vars['_item'] = $foreach__item_Sav;
}
?>
	</div>
</div>
<?php }
}
}
?>