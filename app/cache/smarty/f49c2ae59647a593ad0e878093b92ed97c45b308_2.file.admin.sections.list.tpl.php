<?php /* Smarty version 3.1.27, created on 2019-02-15 14:00:53
         compiled from "E:\Projects\test_site\app\views\admin.sections.list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:138765c669be5205df5_93747471%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f49c2ae59647a593ad0e878093b92ed97c45b308' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\admin.sections.list.tpl',
      1 => 1548769432,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138765c669be5205df5_93747471',
  'variables' => 
  array (
    'sections' => 0,
    '_section' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c669be523b731_41575469',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c669be523b731_41575469')) {
function content_5c669be523b731_41575469 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '138765c669be5205df5_93747471';
?>
<div class="separate-submit">
	<span class="form-button green" onclick="location.href = '/admin/sections/?do=add';">+ Добавить раздел</span>
</div>

<?php if ($_smarty_tpl->tpl_vars['sections']->value) {?>
	<table class="list">
		<col />
		<col style="width: 320px;" />
		<col style="width: 16px;" />
		<col style="width: 16px;" />
		<tr>
			<th class="left">Название</th>
			<th class="left">Адрес</th>
			<th class="center controls">&nbsp;</th>
			<th class="center controls">&nbsp;</th>
		</tr>
		
		<?php
$_from = $_smarty_tpl->tpl_vars['sections']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['_section'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['_section']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['_section']->value) {
$_smarty_tpl->tpl_vars['_section']->_loop = true;
$foreach__section_Sav = $_smarty_tpl->tpl_vars['_section'];
?>
			<tr>
				<td class="left"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_section']->value['name'], ENT_QUOTES, 'UTF-8');?>
</td>
				<td class="left compact">
					<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_section']->value['url'], ENT_QUOTES, 'UTF-8');?>
"  title="адрес раздела" target="_blank"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_section']->value['url'], ENT_QUOTES, 'UTF-8');?>
</a><br />
				</td>
				<td class="center controls"><a href="/admin/sections/?do=edit&amp;id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_section']->value['id'], ENT_QUOTES, 'UTF-8');?>
" title="Редактировать"><img src="/_assets/images/fugue/pencil.png" alt="" /></a></td>
				<td class="center controls"><a href="/admin/sections/?do=delete&amp;id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_section']->value['id'], ENT_QUOTES, 'UTF-8');?>
" title="Удалить" onclick="if (!confirm('Вы уверены?')) return false;"><img src="/_assets/images/fugue/cross-script.png" alt="" /></a></td>
			</tr>
		<?php
$_smarty_tpl->tpl_vars['_section'] = $foreach__section_Sav;
}
?>
	</table>
	
	<?php echo $_smarty_tpl->getSubTemplate ('listing.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php } else { ?>
	<p>Ничего не найдено</p>
<?php }
}
}
?>