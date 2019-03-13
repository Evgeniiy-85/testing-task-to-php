<?php /* Smarty version 3.1.27, created on 2019-02-15 13:41:04
         compiled from "E:\Projects\test_site\app\views\admin.tdk-fields.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:94705c669740bf1c13_35420091%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5416189e9c4eeca8d722a1b9c2b90748b8703853' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\admin.tdk-fields.tpl',
      1 => 1448360547,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94705c669740bf1c13_35420091',
  'variables' => 
  array (
    'form_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c669740bf61b9_80079803',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c669740bf61b9_80079803')) {
function content_5c669740bf61b9_80079803 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '94705c669740bf1c13_35420091';
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