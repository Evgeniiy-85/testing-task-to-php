<?php /* Smarty version 3.1.27, created on 2019-02-15 13:24:47
         compiled from "E:\Projects\test_site\app\views\breadcrumbs.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:269545c66936f3b8b96_29074549%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a10d6e8cbeca0e2c9a1a727a8a9162fcfc6aa63' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\breadcrumbs.tpl',
      1 => 1547631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '269545c66936f3b8b96_29074549',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    '_bc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c66936f3d10b4_18036560',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c66936f3d10b4_18036560')) {
function content_5c66936f3d10b4_18036560 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'E:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.truncate.php';

$_smarty_tpl->properties['nocache_hash'] = '269545c66936f3b8b96_29074549';
if ($_smarty_tpl->tpl_vars['breadcrumbs']->value) {?>
	<div class="breadcrumbs">
		<a href="/">Главная</a> /
		<?php
$_from = $_smarty_tpl->tpl_vars['breadcrumbs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['_bc'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['_bc']->_loop = false;
$_smarty_tpl->tpl_vars['_bc']->total= $_smarty_tpl->_count($_from);
$_smarty_tpl->tpl_vars['_bc']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['_bc']->value) {
$_smarty_tpl->tpl_vars['_bc']->_loop = true;
$_smarty_tpl->tpl_vars['_bc']->iteration++;
$_smarty_tpl->tpl_vars['_bc']->last = $_smarty_tpl->tpl_vars['_bc']->iteration == $_smarty_tpl->tpl_vars['_bc']->total;
$foreach__bc_Sav = $_smarty_tpl->tpl_vars['_bc'];
?>
			<?php if ($_smarty_tpl->tpl_vars['_bc']->last) {
echo htmlspecialchars(smarty_modifier_truncate($_smarty_tpl->tpl_vars['_bc']->value['name'],64,"...",true), ENT_QUOTES, 'UTF-8');?>

			<?php } else { ?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_bc']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_bc']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars(smarty_modifier_truncate($_smarty_tpl->tpl_vars['_bc']->value['name'],30,"...",true), ENT_QUOTES, 'UTF-8');?>
</a> / <?php }?>
		<?php
$_smarty_tpl->tpl_vars['_bc'] = $foreach__bc_Sav;
}
?>
	</div>
<?php }
}
}
?>