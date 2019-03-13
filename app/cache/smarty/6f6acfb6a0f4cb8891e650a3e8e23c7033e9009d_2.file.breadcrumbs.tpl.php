<?php /* Smarty version 3.1.27, created on 2019-01-30 15:11:24
         compiled from "F:\Projects\test_site\app\views\breadcrumbs.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:220875c51946ce29ba8_53269631%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f6acfb6a0f4cb8891e650a3e8e23c7033e9009d' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\breadcrumbs.tpl',
      1 => 1547631928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '220875c51946ce29ba8_53269631',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    '_bc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c51946ce3bff0_50127475',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c51946ce3bff0_50127475')) {
function content_5c51946ce3bff0_50127475 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'F:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.truncate.php';

$_smarty_tpl->properties['nocache_hash'] = '220875c51946ce29ba8_53269631';
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