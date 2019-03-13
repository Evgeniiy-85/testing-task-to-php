<?php /* Smarty version 3.1.27, created on 2019-02-23 10:46:38
         compiled from "E:\Projects\test_site\app\views\admin.menu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:145575c70fa5e784d55_20695566%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '955f5c609d3988632fe9cc45363c4d0abb39a348' => 
    array (
      0 => 'E:\\Projects\\test_site\\app\\views\\admin.menu.tpl',
      1 => 1448811929,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145575c70fa5e784d55_20695566',
  'variables' => 
  array (
    'main_menu' => 0,
    '_item' => 0,
    '_child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5c70fa5e7cb088_76852634',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5c70fa5e7cb088_76852634')) {
function content_5c70fa5e7cb088_76852634 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '145575c70fa5e784d55_20695566';
?>
<?php echo '<script'; ?>
>
function admin_menu_new_row(item_id) {
	
	var table = $('table.menu-items');
	var item_row = false;
	var html = '';
	var parent_data_html = '';
	var parent_padding_html = '';
	
	if (item_id) {
		item_row = $(table).find('tr[data-id=' + item_id + ']');
		parent_data_html = ' class="child" data-parent_id="' + item_id + '"';
		parent_padding_html = ' style="padding-left: 30px;"';
	} else {
		item_id = 0;
	}
	
	html += '<tr' + parent_data_html + '>';
		html += '<td class="left"' + parent_padding_html + '><input type="text" name="new_name[]" value="" style="width: 100%;" /></td>';
		html += '<td class="left"><input type="text" name="new_url[]" value="" style="width: 100%;" /></td>';
		html += '<td class="center"><input type="text" name="new_sort[]" class="sort" value="" /></td>';
		html += '<td class="center"><input type="checkbox" name="new_blank_switch[]" title="В новом окне" value="1" onchange="admin_menu_new_blank_change($(this));" /><input type="hidden" name="new_blank[]" class="new_blank_value" value="0" /></td>';
		html += '<td class="center"><input type="hidden" name="new_parent_id[]" value="' + item_id + '" /><a href="#" onclick="$(this).parents(\'tr\').remove(); return false;"><img src="/_assets/images/fugue/cross-script.png" title="Удалить" alt="" /></a></td>';
	html += '</tr>';
	
	if (item_row) {
		if ($(table).find('tr[data-parent_id=' + item_id + ']').length) {
			$(table).find('tr[data-parent_id=' + item_id + ']:last').after(html);
		} else {
			$(item_row).after(html);
		}
	} else {
		$(table).find('tbody').append(html);
	}
	
}

function admin_menu_new_blank_change(ob) {
	
	var is_checked = $(ob).is(':checked');
	
	if (!is_checked) {
		$(ob).parents('td').find('input.new_blank_value').val(0);
	} else {
		$(ob).parents('td').find('input.new_blank_value').val(1);
	}
	
	return true;
	
}
<?php echo '</script'; ?>
>

<form method="post" action="" class="common-forms">
	<table class="list menu-items">
		<col />
		<col style="width: 320px;" />
		<col style="width: 70px;" />
		<col style="width: 16px;" />
		<col style="width: 16px;" />
		<thead>
			<tr>
				<th class="left">Название</th>
				<th class="left">URL</th>
				<th class="center">Сорт-ка</th>
				<th class="center controls"><img src="/_assets/images/fugue/applications.png" title="В новом окне" alt="" /></th>
				<th class="center controls"><img src="/_assets/images/fugue/cross-script.png" title="Удалить" alt="" /></th>
			</tr>
		</thead>
		<tfoot>
			<td class="left" colspan="5"><img src="/_assets/images/fugue/plus-button.png" alt="" style="vertical-align: middle;" /> <a href="#" class="ajax" onclick="admin_menu_new_row(0); return false;">Добавить корневой элемент</a></td>
		</tfoot>
		<tbody>
		<?php if ($_smarty_tpl->tpl_vars['main_menu']->value) {?>
		<?php
$_from = $_smarty_tpl->tpl_vars['main_menu']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['_item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->_loop = true;
$foreach__item_Sav = $_smarty_tpl->tpl_vars['_item'];
?>
			<tr data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['id'], ENT_QUOTES, 'UTF-8');?>
">
				<td class="left">
					<input type="text" name="name[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['id'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['name'], ENT_QUOTES, 'UTF-8');?>
" style="width: 85%;" />
					<a href="#" onclick="admin_menu_new_row(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['id'], ENT_QUOTES, 'UTF-8');?>
); return false;" title="Добавить элемент"><img src="/_assets/images/fugue/plus-button.png" alt="" style="margin-left: 10px; vertical-align: middle;" /></a>
				</td>
				<td class="left"><input type="text" name="url[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['id'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['url'], ENT_QUOTES, 'UTF-8');?>
" style="width: 100%;" /></td>
				<td class="center"><input type="text" name="sort[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['id'], ENT_QUOTES, 'UTF-8');?>
]" title="Сортировка" class="sort" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['sort'], ENT_QUOTES, 'UTF-8');?>
" /></td>
				<td class="center"><input type="checkbox" name="blank[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['id'], ENT_QUOTES, 'UTF-8');?>
]" title="В новом окне" value="1"<?php if ($_smarty_tpl->tpl_vars['_item']->value['blank']) {?> checked="checked"<?php }?> /></td>
				<td class="center"><input type="checkbox" name="del[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['id'], ENT_QUOTES, 'UTF-8');?>
]" title="Удалить" value="1" /></td>
			</tr>
			<?php if ($_smarty_tpl->tpl_vars['_item']->value['children']) {?>
				<?php
$_from = $_smarty_tpl->tpl_vars['_item']->value['children'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['_child'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['_child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['_child']->value) {
$_smarty_tpl->tpl_vars['_child']->_loop = true;
$foreach__child_Sav = $_smarty_tpl->tpl_vars['_child'];
?>
				<tr class="child" data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_child']->value['id'], ENT_QUOTES, 'UTF-8');?>
" data-parent_id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['id'], ENT_QUOTES, 'UTF-8');?>
">
					<td class="left" style="padding-left: 30px;"><input type="text" name="name[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_child']->value['id'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_child']->value['name'], ENT_QUOTES, 'UTF-8');?>
" style="width: 100%;" /></td>
					<td class="left"><input type="text" name="url[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_child']->value['id'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_child']->value['url'], ENT_QUOTES, 'UTF-8');?>
" style="width: 100%;" /></td>
					<td class="center"><input type="text" name="sort[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_child']->value['id'], ENT_QUOTES, 'UTF-8');?>
]" title="Сортировка" class="sort" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_child']->value['sort'], ENT_QUOTES, 'UTF-8');?>
" /></td>
					<td class="center"><input type="checkbox" name="blank[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_child']->value['id'], ENT_QUOTES, 'UTF-8');?>
]" title="В новом окне" value="1"<?php if ($_smarty_tpl->tpl_vars['_child']->value['blank']) {?> checked="checked"<?php }?> /></td>
					<td class="center"><input type="checkbox" name="del[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_child']->value['id'], ENT_QUOTES, 'UTF-8');?>
]" title="Удалить" value="1" /></td>
				</tr>
				<?php
$_smarty_tpl->tpl_vars['_child'] = $foreach__child_Sav;
}
?>
			<?php }?>
		<?php
$_smarty_tpl->tpl_vars['_item'] = $foreach__item_Sav;
}
?>
		<?php }?>
		</tbody>
	</table>
	<div class="separate-submit">
		<input type="submit" value="Сохранить изменения" />
		<div class="preloader"></div>
	</div>
</form><?php }
}
?>