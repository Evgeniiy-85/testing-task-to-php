<?php /* Smarty version 3.1.27, created on 2019-02-15 13:28:22
         compiled from "E:\Projects\test_site\app\views\admin.products.list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:163065c6694466bfac1_85688337%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09cc0901433055d404b1dc3e6ead26a3ecae8d54' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\admin.products.list.tpl',
      1 => 1548844312,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163065c6694466bfac1_85688337',
  'variables' => 
  array (
    'filter_data' => 0,
    'products' => 0,
    '_product' => 0,
    'sections_urls' => 0,
    'key' => 0,
    '_section' => 0,
    '_section_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c669446702bd7_78204711',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c669446702bd7_78204711')) {
function content_5c669446702bd7_78204711 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format_ru')) require_once 'E:\\Projects\\test_site\\www/../lib/smarty/plugins\\modifier.date_format_ru.php';

$_smarty_tpl->properties['nocache_hash'] = '163065c6694466bfac1_85688337';
?>
<form method="get" action="/admin/products/" class="common-forms filter-form">
	<div class="element">
		<input type="text" name="filter[name]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['filter_data']->value['name'], ENT_QUOTES, 'UTF-8');?>
" placeholder="Название" autocomplete="off" />
	</div>
	<div class="element">
		<input type="submit" value="Поиск" />
	</div>
</form>

<div class="separate-submit">
	<span class="form-button green" onclick="location.href = '/admin/products/?do=add';">+ Добавить товар</span>
</div>

<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
	<table class="list">
		<col />
		<col style="width: 320px;" />
		<col style="width: 16px;" />
		<col style="width: 16px;" />
		<tr>
			<th class="left">Название</th>
			<th class="left">Адрес / дата добавления</th>
			<th class="center controls">&nbsp;</th>
			<th class="center controls">&nbsp;</th>
		</tr>
		<?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['_product'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['_product']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['_product']->value) {
$_smarty_tpl->tpl_vars['_product']->_loop = true;
$foreach__product_Sav = $_smarty_tpl->tpl_vars['_product'];
?>
			<tr>
				<td class="left"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</td>
				<td class="left compact">
					<?php
$_from = $_smarty_tpl->tpl_vars['sections_urls']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['_section'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['_section']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['_section']->value) {
$_smarty_tpl->tpl_vars['_section']->_loop = true;
$foreach__section_Sav = $_smarty_tpl->tpl_vars['_section'];
?>
						<?php if ($_smarty_tpl->tpl_vars['key']->value == $_smarty_tpl->tpl_vars['_product']->value['id']) {?>
							<?php
$_from = $_smarty_tpl->tpl_vars['_section']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['_section_url'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['_section_url']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['_section_url']->value) {
$_smarty_tpl->tpl_vars['_section_url']->_loop = true;
$foreach__section_url_Sav = $_smarty_tpl->tpl_vars['_section_url'];
?>
								<?php if ($_smarty_tpl->tpl_vars['key']->value > 0) {?>,<br /><?php }?>
								<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_section_url']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['slug'], ENT_QUOTES, 'UTF-8');?>
/" target="_blank"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_section_url']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['slug'], ENT_QUOTES, 'UTF-8');?>
/</a>
							<?php
$_smarty_tpl->tpl_vars['_section_url'] = $foreach__section_url_Sav;
}
?>
						<?php }?>
					<?php
$_smarty_tpl->tpl_vars['_section'] = $foreach__section_Sav;
}
?>
					<div style="margin-top: 3px;"><?php echo htmlspecialchars(smarty_modifier_date_format_ru($_smarty_tpl->tpl_vars['_product']->value['add_time']), ENT_QUOTES, 'UTF-8');?>
</div>
				</td>
				<td class="center controls">
					<a href="/admin/products/?do=edit&amp;id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['id'], ENT_QUOTES, 'UTF-8');?>
" title="Редактировать">
						<img src="/_assets/images/fugue/pencil.png" alt="" />
					</a>
				</td>
				<td class="center controls">
					<a href="/admin/products/?do=delete&amp;id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_product']->value['id'], ENT_QUOTES, 'UTF-8');?>
" title="Удалить" onclick="if (!confirm('Вы уверены?')) return false;">
						<img src="/_assets/images/fugue/cross-script.png" alt="" />
					</a>
				</td>
			</tr>
		<?php
$_smarty_tpl->tpl_vars['_product'] = $foreach__product_Sav;
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