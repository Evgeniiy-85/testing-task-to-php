<?php /* Smarty version 3.1.27, created on 2019-01-30 15:11:49
         compiled from "F:\Projects\test_site\app\views\admin-tabs.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:183565c519485de66b1_77064125%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d50067cf2f02fdbc4d66aa4cac09ba4724b2698' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\admin-tabs.tpl',
      1 => 1448361490,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183565c519485de66b1_77064125',
  'variables' => 
  array (
    'tabs' => 0,
    '_tab' => 0,
    '_tab_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c519485dec821_40839434',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c519485dec821_40839434')) {
function content_5c519485dec821_40839434 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '183565c519485de66b1_77064125';
if ($_smarty_tpl->tpl_vars['tabs']->value) {?>
	<div class="admin-tabs clearfix">
		<?php
$_from = $_smarty_tpl->tpl_vars['tabs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['_tab'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['_tab']->_loop = false;
$_smarty_tpl->tpl_vars['_tab_id'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['_tab_id']->value => $_smarty_tpl->tpl_vars['_tab']->value) {
$_smarty_tpl->tpl_vars['_tab']->_loop = true;
$foreach__tab_Sav = $_smarty_tpl->tpl_vars['_tab'];
?>
		<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_tab']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="tab <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_tab_id']->value, ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['_tab']->value['selected']) {?> selected<?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_tab']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
		<?php
$_smarty_tpl->tpl_vars['_tab'] = $foreach__tab_Sav;
}
?>
	</div>
<?php }
}
}
?>