<?php /* Smarty version 3.1.27, created on 2019-01-30 15:11:56
         compiled from "F:\Projects\test_site\app\views\admin.sections.form.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:309205c51948c2dd743_93587601%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6c496a7b93d00a1166403d1882c2c18e95ee860' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\admin.sections.form.tpl',
      1 => 1548844022,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '309205c51948c2dd743_93587601',
  'variables' => 
  array (
    'form_data' => 0,
    'sections_tree' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c51948c3075b4_16263148',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c51948c3075b4_16263148')) {
function content_5c51948c3075b4_16263148 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '309205c51948c2dd743_93587601';
?>
<form method="post" action="" class="common-forms" enctype="multipart/form-data">

	<?php echo $_smarty_tpl->getSubTemplate ('errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


	<div class="row">
		<div class="lbl"><label for="af-name">Название</label></div>
		<div class="inp"><input type="text" name="name" id="af-name" size="70" maxlength="255" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_data']->value['name'], ENT_QUOTES, 'UTF-8');?>
" /></div>
	</div>
	
	<div class="row">
		<div class="lbl"><label for="af-url">Адрес</label></div>
		<div class="inp">http://<?php echo htmlspecialchars($_SERVER['HTTP_HOST'], ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['form_data']->value['url'], ENT_QUOTES, 'UTF-8');?>
</div>
	</div>
	
	<div class="row">
		<div class="lbl"><label for="af-parent-section">Главный раздел</label></div>
		<div class="note"><?php echo $_smarty_tpl->tpl_vars['sections_tree']->value;?>
</div>
	</div>
	
	<?php echo $_smarty_tpl->getSubTemplate ('admin.tdk-fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	
	
	<div class="row submit">
		<input type="submit" value="Сохранить" />
		<div class="preloader"></div>
	</div>
	
	<input type="hidden" name="form_submit" value="1" />

</form><?php }
}
?>