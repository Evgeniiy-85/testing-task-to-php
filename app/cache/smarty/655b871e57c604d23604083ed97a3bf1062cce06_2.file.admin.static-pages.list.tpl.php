<?php /* Smarty version 3.1.27, created on 2019-02-15 14:00:51
         compiled from "E:\Projects\test_site\app\views\admin.static-pages.list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:324195c669be30ceda3_71488375%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '655b871e57c604d23604083ed97a3bf1062cce06' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\admin.static-pages.list.tpl',
      1 => 1448619351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '324195c669be30ceda3_71488375',
  'variables' => 
  array (
    'static_pages' => 0,
    '_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c669be3101623_64014696',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c669be3101623_64014696')) {
function content_5c669be3101623_64014696 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '324195c669be30ceda3_71488375';
?>
<div class="separate-submit">
	<span class="form-button green" onclick="location.href = '/admin/static-pages/?do=add';">+ Создать новую страницу</span>
</div>

<?php if ($_smarty_tpl->tpl_vars['static_pages']->value) {?>
<table class="list">
	<col />
	<col style="width: 250px;" />
	<col style="width: 16px;" />
	<col style="width: 16px;" />
	<tr>
		<th class="left">Название</th>
		<th class="left">Адрес</th>
		<th class="center controls">&nbsp;</th>
		<th class="center controls">&nbsp;</th>
	</tr>
	<?php
$_from = $_smarty_tpl->tpl_vars['static_pages']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['_page'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['_page']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['_page']->value) {
$_smarty_tpl->tpl_vars['_page']->_loop = true;
$foreach__page_Sav = $_smarty_tpl->tpl_vars['_page'];
?>
		<tr>
			<td class="left"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_page']->value['name'], ENT_QUOTES, 'UTF-8');?>
</td>
			<td class="left compact"><a href="/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_page']->value['slug'], ENT_QUOTES, 'UTF-8');?>
/" target="_blank">/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_page']->value['slug'], ENT_QUOTES, 'UTF-8');?>
/</a></td>
			<td class="center controls"><a href="/admin/static-pages/?do=edit&amp;id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_page']->value['id'], ENT_QUOTES, 'UTF-8');?>
" title="Редактировать страницу"><img src="/_assets/images/fugue/pencil.png" alt="" /></a></td>
			<td class="center controls"><a href="/admin/static-pages/?do=delete&amp;id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_page']->value['id'], ENT_QUOTES, 'UTF-8');?>
" title="Удалить страницу" onclick="if (!confirm('Вы уверены?')) return false;"><img src="/_assets/images/fugue/cross-script.png" alt="" /></a></td>
		</tr>
	<?php
$_smarty_tpl->tpl_vars['_page'] = $foreach__page_Sav;
}
?>
</table>
<?php }
}
}
?>