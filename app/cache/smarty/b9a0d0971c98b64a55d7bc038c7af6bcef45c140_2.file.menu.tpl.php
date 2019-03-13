<?php /* Smarty version 3.1.27, created on 2019-02-21 16:04:59
         compiled from "E:\Projects\test_site\app\views\menu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:159155c6ea1fb5c01c6_78012783%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9a0d0971c98b64a55d7bc038c7af6bcef45c140' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\menu.tpl',
      1 => 1550754296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159155c6ea1fb5c01c6_78012783',
  'variables' => 
  array (
    'main_menu' => 0,
    '_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c6ea1fb5f2de9_56232174',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c6ea1fb5f2de9_56232174')) {
function content_5c6ea1fb5f2de9_56232174 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '159155c6ea1fb5c01c6_78012783';
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