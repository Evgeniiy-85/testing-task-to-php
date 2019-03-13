<?php /* Smarty version 3.1.27, created on 2019-02-23 10:46:44
         compiled from "E:\Projects\test_site\app\views\admin.static-pages.form.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:30505c70fa649334a9_91651069%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e776a4a87e609280c43292a95ff0cbd8088f6a96' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\admin.static-pages.form.tpl',
      1 => 1534836454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30505c70fa649334a9_91651069',
  'variables' => 
  array (
    'form_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c70fa649632b0_23143908',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c70fa649632b0_23143908')) {
function content_5c70fa649632b0_23143908 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '30505c70fa649334a9_91651069';
?>
<form method="post" action="" class="common-forms">

	<?php echo $_smarty_tpl->getSubTemplate ('errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


	<div class="row">
		<div class="lbl"><label for="af-slug">Адрес</label></div>
		<div class="inp">http://<?php echo htmlspecialchars($_SERVER['HTTP_HOST'], ENT_QUOTES, 'UTF-8');?>
/ <input type="text" name="slug" id="af-slug" size="30" maxlength="64" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_data']->value['slug'], ENT_QUOTES, 'UTF-8');?>
" /> /</div>
	</div>
	
	<div class="row separator"></div>
	
	<div class="row">
		<div class="lbl"><label for="af-name">Название страницы</label></div>
		<div class="inp"><input type="text" name="name" id="af-name" size="50" maxlength="128" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_data']->value['name'], ENT_QUOTES, 'UTF-8');?>
" /></div>
	</div>
	
	<?php echo $_smarty_tpl->getSubTemplate ('admin.tdk-fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	
	<div class="row">
		<div class="lbl"><label for="af-content">Содержимое</label></div>
		<div class="inp"><textarea name="content" id="af-content" class="wysiwyg" rows="10" cols="80"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_data']->value['content'], ENT_QUOTES, 'UTF-8');?>
</textarea></div>
		<div class="note">Enter — параграф. Shift + Enter — новая строка</div>
	</div>
	
	<div class="row separator"></div>
	
	<div class="row submit">
		<input type="submit" value="Сохранить" />
		<div class="preloader"></div>
	</div>
	
	<input type="hidden" name="form_submit" value="1" />

</form><?php }
}
?>