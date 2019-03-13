<?php /* Smarty version 3.1.27, created on 2019-01-30 15:38:36
         compiled from "F:\Projects\test_site\app\views\admin.news.list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:34255c519acc2ad264_50607616%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9823e48fa4669142e3457f0c450186324768d966' => 
    array (
      0 => 'F:\\Projects\\test_site\\app\\views\\admin.news.list.tpl',
      1 => 1448626740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34255c519acc2ad264_50607616',
  'variables' => 
  array (
    'filter_data' => 0,
    'news' => 0,
    '_article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c519acc2e6cb1_89228628',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c519acc2e6cb1_89228628')) {
function content_5c519acc2e6cb1_89228628 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format_ru')) require_once 'F:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.date_format_ru.php';

$_smarty_tpl->properties['nocache_hash'] = '34255c519acc2ad264_50607616';
?>
<form method="get" action="/admin/news/" class="common-forms filter-form">
	<div class="element">
		<input type="text" name="filter[name]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_data']->value['name'], ENT_QUOTES, 'UTF-8');?>
" placeholder="Название" autocomplete="off" />
	</div>
	<div class="element">
		<input type="text" name="filter[period_from]" class="txt datepicker" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_data']->value['period_from'], ENT_QUOTES, 'UTF-8');?>
" placeholder="Дата (от)" />
		&nbsp;&ndash;&nbsp;
		<input type="text" name="filter[period_to]" class="txt datepicker" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_data']->value['period_to'], ENT_QUOTES, 'UTF-8');?>
" placeholder="Дата (до)" />
	</div>
	<div class="element">
		<input type="submit" value="Поиск" />
	</div>
</form>

<div class="separate-submit">
	<span class="form-button green" onclick="location.href = '/admin/news/?do=add';">+ Добавить новость</span>
</div>

<?php if ($_smarty_tpl->tpl_vars['news']->value) {?>
	<table class="list">
		<col />
		<col style="width: 220px;" />
		<col style="width: 16px;" />
		<col style="width: 16px;" />
		<tr>
			<th class="left">Название</th>
			<th class="left">Дата</th>
			<th class="center controls">&nbsp;</th>
			<th class="center controls">&nbsp;</th>
		</tr>
		<?php
$_from = $_smarty_tpl->tpl_vars['news']->value;
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
				<td class="left"><a href="/news/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['id'], ENT_QUOTES, 'UTF-8');?>
/" target="_blank"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a></td>
				<td class="left"><?php echo htmlspecialchars(smarty_modifier_date_format_ru($_smarty_tpl->tpl_vars['_article']->value['add_date']), ENT_QUOTES, 'UTF-8');?>
</td>
				<td class="center controls"><a href="/admin/news/?do=edit&amp;id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['id'], ENT_QUOTES, 'UTF-8');?>
" title="Редактировать"><img src="/_assets/images/fugue/pencil.png" alt="" /></a></td>
				<td class="center controls"><a href="/admin/news/?do=delete&amp;id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_article']->value['id'], ENT_QUOTES, 'UTF-8');?>
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