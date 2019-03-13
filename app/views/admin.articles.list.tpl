<form method="get" action="/admin/articles/" class="common-forms filter-form">
	<div class="element">
		<input type="text" name="filter[name]" value="{$filter_data.name}" placeholder="Название" autocomplete="off" />
	</div>
	<div class="element">
		<input type="submit" value="Поиск" />
	</div>
</form>

<div class="separate-submit">
	<span class="form-button green" onclick="location.href = '/admin/articles/?do=add';">+ Добавить статью</span>
</div>

{if $articles}
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
		{foreach $articles as $_article}
			<tr>
				<td class="left">{$_article.name}</td>
				<td class="left compact">
					<a href="/articles/{$_article.slug}/" target="_blank">/articles/{$_article.slug}/</a><br />
					<div style="margin-top: 3px;">{$_article.add_time|date_format_ru}, {$_article.add_time|date_format:'%H:%M'}</div>
				</td>
				<td class="center controls"><a href="/admin/articles/?do=edit&amp;id={$_article.id}" title="Редактировать"><img src="/_assets/images/fugue/pencil.png" alt="" /></a></td>
				<td class="center controls"><a href="/admin/articles/?do=delete&amp;id={$_article.id}" title="Удалить" onclick="if (!confirm('Вы уверены?')) return false;"><img src="/_assets/images/fugue/cross-script.png" alt="" /></a></td>
			</tr>
		{/foreach}
	</table>
	
	{include 'listing.tpl'}
{else}
	<p>Ничего не найдено</p>
{/if}