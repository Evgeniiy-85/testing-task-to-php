<?php /* Smarty version 3.1.27, created on 2019-01-30 15:11:51
         compiled from "F:\Projects\test_site\app\views\admin.tdk-fields.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:103935c519487abf9e4_19001492%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a332ffc811ac0387f90420394df2a48b1137ecd1' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\admin.tdk-fields.tpl',
      1 => 1448360547,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103935c519487abf9e4_19001492',
  'variables' => 
  array (
    'form_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c519487ac3a22_94664980',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c519487ac3a22_94664980')) {
function content_5c519487ac3a22_94664980 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '103935c519487abf9e4_19001492';
?>
<div class="row">
	<div class="lbl"><label for="tdkf-title">Заголовок (title)</label></div>
	<div class="inp"><input type="text" name="title" id="tdkf-title" class="txt" size="80" maxlength="255" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_data']->value['title'], ENT_QUOTES, 'UTF-8');?>
" /></div>
</div>
<div class="row">
	<div class="lbl"><label for="tdkf-description">Описание (description)</label></div>
	<div class="inp"><input type="text" name="description" id="tdkf-description" class="txt" size="80" maxlength="255" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_data']->value['description'], ENT_QUOTES, 'UTF-8');?>
" /></div>
</div>
<div class="row">
	<div class="lbl"><label for="tdkf-keywords">Ключевые слова (keywords)</label></div>
	<div class="inp"><input type="text" name="keywords" id="tdkf-keywords" class="txt" size="80" maxlength="255" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_data']->value['keywords'], ENT_QUOTES, 'UTF-8');?>
" /></div>
</div><?php }
}
?>