<div class="separate-submit">
	<span class="form-button green" onclick="location.href = '/admin/sections/?do=add';">+ Добавить раздел</span>
</div>

{if $sections}
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
		
		{foreach $sections as  $_section}
			<tr>
				<td class="left">{$_section.name}</td>
				<td class="left compact">
					<a href="{$_section.url}"  title="адрес раздела" target="_blank">{$_section.url}</a><br />
				</td>
				<td class="center controls"><a href="/admin/sections/?do=edit&amp;id={$_section.id}" title="Редактировать"><img src="/_assets/images/fugue/pencil.png" alt="" /></a></td>
				<td class="center controls"><a href="/admin/sections/?do=delete&amp;id={$_section.id}" title="Удалить" onclick="if (!confirm('Вы уверены?')) return false;"><img src="/_assets/images/fugue/cross-script.png" alt="" /></a></td>
			</tr>
		{/foreach}
	</table>
	
	{include 'listing.tpl'}
{else}
	<p>Ничего не найдено</p>
{/if}