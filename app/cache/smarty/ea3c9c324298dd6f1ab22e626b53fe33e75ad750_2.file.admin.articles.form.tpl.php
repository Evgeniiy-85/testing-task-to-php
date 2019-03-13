<?php /* Smarty version 3.1.27, created on 2019-02-22 19:12:20
         compiled from "E:\Projects\test_site\app\views\admin.articles.form.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:136345c701f64414964_69820730%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea3c9c324298dd6f1ab22e626b53fe33e75ad750' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\admin.articles.form.tpl',
      1 => 1534836454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136345c701f64414964_69820730',
  'variables' => 
  array (
    'form_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c701f6444fe17_09059992',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c701f6444fe17_09059992')) {
function content_5c701f6444fe17_09059992 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '136345c701f64414964_69820730';
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
		<div class="lbl"><label for="af-slug">Адрес</label></div>
		<div class="inp">http://<?php echo htmlspecialchars($_SERVER['HTTP_HOST'], ENT_QUOTES, 'UTF-8');?>
/articles/ <input type="text" name="slug" id="af-slug" size="50" maxlength="128" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_data']->value['slug'], ENT_QUOTES, 'UTF-8');?>
" /> /</div>
	</div>
	
	<?php echo $_smarty_tpl->getSubTemplate ('admin.tdk-fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	
	<div class="row">
		<div class="lbl"><label for="af-content">Содержимое страницы</label></div>
		<div class="inp"><textarea name="content" id="af-content" class="wysiwyg" rows="10" cols="80"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_data']->value['content'], ENT_QUOTES, 'UTF-8');?>
</textarea></div>
		<div class="note">
			Enter — параграф. Shift + Enter — новая строка
		</div>
	</div>
	
	<div class="row">
		<div class="lbl"><label for="af-summary">Вводный текст</label></div>
		<div class="inp"><textarea name="summary" id="af-summary" class="wysiwyg" rows="10" cols="80"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_data']->value['summary'], ENT_QUOTES, 'UTF-8');?>
</textarea></div>
		<div class="note">
			Enter — параграф. Shift + Enter — новая строка
		</div>
	</div>
	
	<div class="row">
		<div class="lbl"><label for="af-photo">Фотография</label></div>
		<div class="inp">
			<?php if ($_smarty_tpl->tpl_vars['form_data']->value['photo']) {?>
				<?php echo $_smarty_tpl->getSubTemplate ('admin.photo-preview.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_url'=>"/_upload/images/articles/".((string)$_smarty_tpl->tpl_vars['form_data']->value['photo']),'_remove'=>'photo'), 0);
?>

			<?php }?>
			<input type="file" name="photo" id="af-photo" />
		</div>
		<div class="note">Размер будет уменьшен до 200 x 200 px</div>
	</div>
	
	<div class="row submit">
		<input type="submit" value="Сохранить" />
		<div class="preloader"></div>
	</div>
	
	<input type="hidden" name="form_submit" value="1" />

</form><?php }
}
?>