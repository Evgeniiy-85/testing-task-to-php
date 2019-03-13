<div class="separate-submit">
	<span class="form-button green" onclick="location.href = '/admin/static-pages/?do=add';">+ Создать новую страницу</span>
</div>

{if $static_pages}
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
	{foreach $static_pages as $_page}
		<tr>
			<td class="left">{$_page.name}</td>
			<td class="left compact"><a href="/{$_page.slug}/" target="_blank">/{$_page.slug}/</a></td>
			<td class="center controls"><a href="/admin/static-pages/?do=edit&amp;id={$_page.id}" title="Редактировать страницу"><img src="/_assets/images/fugue/pencil.png" alt="" /></a></td>
			<td class="center controls"><a href="/admin/static-pages/?do=delete&amp;id={$_page.id}" title="Удалить страницу" onclick="if (!confirm('Вы уверены?')) return false;"><img src="/_assets/images/fugue/cross-script.png" alt="" /></a></td>
		</tr>
	{/foreach}
</table>
{/if}