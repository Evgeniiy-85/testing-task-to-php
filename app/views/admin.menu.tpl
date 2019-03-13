<script>
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
</script>

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
		{if $main_menu}
		{foreach $main_menu as $_item}
			<tr data-id="{$_item.id}">
				<td class="left">
					<input type="text" name="name[{$_item.id}]" value="{$_item.name}" style="width: 85%;" />
					<a href="#" onclick="admin_menu_new_row({$_item.id}); return false;" title="Добавить элемент"><img src="/_assets/images/fugue/plus-button.png" alt="" style="margin-left: 10px; vertical-align: middle;" /></a>
				</td>
				<td class="left"><input type="text" name="url[{$_item.id}]" value="{$_item.url}" style="width: 100%;" /></td>
				<td class="center"><input type="text" name="sort[{$_item.id}]" title="Сортировка" class="sort" value="{$_item.sort}" /></td>
				<td class="center"><input type="checkbox" name="blank[{$_item.id}]" title="В новом окне" value="1"{if $_item.blank} checked="checked"{/if} /></td>
				<td class="center"><input type="checkbox" name="del[{$_item.id}]" title="Удалить" value="1" /></td>
			</tr>
			{if $_item.children}
				{foreach $_item.children as $_child}
				<tr class="child" data-id="{$_child.id}" data-parent_id="{$_item.id}">
					<td class="left" style="padding-left: 30px;"><input type="text" name="name[{$_child.id}]" value="{$_child.name}" style="width: 100%;" /></td>
					<td class="left"><input type="text" name="url[{$_child.id}]" value="{$_child.url}" style="width: 100%;" /></td>
					<td class="center"><input type="text" name="sort[{$_child.id}]" title="Сортировка" class="sort" value="{$_child.sort}" /></td>
					<td class="center"><input type="checkbox" name="blank[{$_child.id}]" title="В новом окне" value="1"{if $_child.blank} checked="checked"{/if} /></td>
					<td class="center"><input type="checkbox" name="del[{$_child.id}]" title="Удалить" value="1" /></td>
				</tr>
				{/foreach}
			{/if}
		{/foreach}
		{/if}
		</tbody>
	</table>
	<div class="separate-submit">
		<input type="submit" value="Сохранить изменения" />
		<div class="preloader"></div>
	</div>
</form>