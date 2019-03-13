<?php /* Smarty version 3.1.27, created on 2019-02-22 18:17:41
         compiled from "E:\Projects\test_site\app\views\admin.articles.list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:162695c7012951a7b98_57790850%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9740b8b0d118e9c8f084d39d921d0f041cd4867b' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\admin.articles.list.tpl',
      1 => 1448624319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162695c7012951a7b98_57790850',
  'variables' => 
  array (
    'filter_data' => 0,
    'articles' => 0,
    '_article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c7012951f5bf9_54403208',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c7012951f5bf9_54403208')) {
function content_5c7012951f5bf9_54403208 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format_ru')) require_once 'E:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.date_format_ru.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '162695c7012951a7b98_57790850';
?>
<form method="get" action="/admin/articles/" class="common-forms filter-form">
	<div class="element">
		<input type="text" name="filter[name]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_data']->value['name'], ENT_QUOTES, 'UTF-8');?>
" placeholder="Название" autocomplete="off" />
	</div>
	<div class="element">
		<input type="submit" value="Поиск" />
	</div>
</form>

<div class="separate-submit">
	<span class="form-button green" onclick="location.href = '/admin/articles/?do=add';">+ Добавить статью</span>
</div>

<?php if ($_smarty_tpl->tpl_vars['articles']->value) {?>
	<table class="list">
		<col />
		<col style="width: 320px;" />
		<col style="width: 16px;" />
		<col style="width: 16px;" />
		<tr>
			<th class="left">Название</th>
			<th class="left">Адрес / дата</th>
			<th class="center controls">&nbsp;</th>
			<th class="center controls">&nbsp;</th>
		</tr>
		<?php
$_from = $_smarty_tpl->tpl_vars['articles']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['_article'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['_article']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['_article']->value) {
$_smarty_tpl->tpl_vars['_article']->_loop = true;
$foreach__article_Sav = $_smarty_tpl->tpl_vars['_article'];
?>
			<tr>
				<td class="left"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['name'], ENT_QUOTES, 'UTF-8');?>
</td>
				<td class="left compact">
					<a href="/articles/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['slug'], ENT_QUOTES, 'UTF-8');?>
/" target="_blank">/articles/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['slug'], ENT_QUOTES, 'UTF-8');?>
/</a><br />
					<div style="margin-top: 3px;"><?php echo htmlspecialchars(smarty_modifier_date_format_ru($_smarty_tpl->tpl_vars['_article']->value['add_time']), ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['_article']->value['add_time'],'%H:%M'), ENT_QUOTES, 'UTF-8');?>
</div>
				</td>
				<td class="center controls"><a href="/admin/articles/?do=edit&amp;id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['id'], ENT_QUOTES, 'UTF-8');?>
" title="Редактировать"><img src="/_assets/images/fugue/pencil.png" alt="" /></a></td>
				<td class="center controls"><a href="/admin/articles/?do=delete&amp;id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['id'], ENT_QUOTES, 'UTF-8');?>
" title="Удалить" onclick="if (!confirm('Вы уверены?')) return false;"><img src="/_assets/images/fugue/cross-script.png" alt="" /></a></td>
			</tr>
		<?php
$_smarty_tpl->tpl_vars['_article'] = $foreach__article_Sav;
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