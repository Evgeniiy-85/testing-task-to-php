<?php /* Smarty version 3.1.27, created on 2019-02-23 10:49:59
         compiled from "E:\Projects\test_site\app\views\admin.products.form.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:154425c70fb279832d1_71362248%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '431786cc9e260636ffafc430347b52071b30d397' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\admin.products.form.tpl',
      1 => 1550908182,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154425c70fb279832d1_71362248',
  'variables' => 
  array (
    'sections_tree' => 0,
    'form_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c70fb279bcba9_78893483',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c70fb279bcba9_78893483')) {
function content_5c70fb279bcba9_78893483 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '154425c70fb279832d1_71362248';
?>

<link rel="stylesheet" href="/_assets/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/_assets/css/bootstrap-multiselect.css" type="text/css"/>
<?php echo '<script'; ?>
 type="text/javascript" src="/_assets/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/_assets/js/bootstrap-multiselect.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
>
	$(document).ready(function() {
		$('#products-sections').multiselect();
	});
<?php echo '</script'; ?>
>


<form method="post" action="" class="common-forms" enctype="multipart/form-data">
	<?php echo $_smarty_tpl->getSubTemplate ('errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<div class="row">
		<div class="lbl"><label for="af-section">Раздел</label></div>
		<div class="products-sections-box">
			<?php echo $_smarty_tpl->tpl_vars['sections_tree']->value;?>

		</div>
	</div>
		
	<div class="row">
		<div class="lbl"><label for="af-name">Название</label></div>
		<div class="inp"><input type="text" name="name" id="af-name" size="70" maxlength="255" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_data']->value['name'], ENT_QUOTES, 'UTF-8');?>
" /></div>
	</div>
	
	<?php echo $_smarty_tpl->getSubTemplate ('admin.tdk-fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	
	
	<div class="row">
		<div class="lbl"><label for="af-content">Описание</label></div>
		<div class="inp">
			<textarea name="content" id="content" class="wysiwyg" rows="10" cols="80"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_data']->value['content'], ENT_QUOTES, 'UTF-8');?>
</textarea>
		</div>
		<div class="note">
			Enter — параграф. Shift + Enter — новая строка
		</div>
	</div>
	
	<div class="row">
		<div class="lbl"><label for="af-links">Ссылки</label></div>
		<div class="inp">
			<textarea name="links_content" id="links_content" class="wysiwyg" rows="10" cols="80"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['form_data']->value['links_content'], ENT_QUOTES, 'UTF-8');?>
</textarea>
		</div>
		<div class="note">
			Shift + Enter — новая ссылка
		</div>
	</div>
		
	<div class="row">
		<div class="lbl"><label for="af-photo">Фото</label></div>
		<div class="inp">
			<?php if ($_smarty_tpl->tpl_vars['form_data']->value['photo']) {?>
				<?php echo $_smarty_tpl->getSubTemplate ('admin.photo-preview.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_url'=>"/_upload/images/products/".((string)$_smarty_tpl->tpl_vars['form_data']->value['photo']),'_remove'=>'photo'), 0);
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