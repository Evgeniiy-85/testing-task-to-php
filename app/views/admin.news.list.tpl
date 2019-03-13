<form method="get" action="/admin/news/" class="common-forms filter-form">
	<div class="element">
		<input type="text" name="filter[name]" value="{$filter_data.name}" placeholder="Название" autocomplete="off" />
	</div>
	<div class="element">
		<input type="text" name="filter[period_from]" class="txt datepicker" value="{$filter_data.period_from}" placeholder="Дата (от)" />
		&nbsp;&ndash;&nbsp;
		<input type="text" name="filter[period_to]" class="txt datepicker" value="{$filter_data.period_to}" placeholder="Дата (до)" />
	</div>
	<div class="element">
		<input type="submit" value="Поиск" />
	</div>
</form>

<div class="separate-submit">
	<span class="form-button green" onclick="location.href = '/admin/news/?do=add';">+ Добавить новость</span>
</div>

{if $news}
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
		{foreach $news as $_article}
			<tr>
				<td class="left"><a href="/news/{$_article.id}/" target="_blank">{$_article.name}</a></td>
				<td class="left">{$_article.add_date|date_format_ru}</td>
				<td class="center controls"><a href="/admin/news/?do=edit&amp;id={$_article.id}" title="Редактировать"><img src="/_assets/images/fugue/pencil.png" alt="" /></a></td>
				<td class="center controls"><a href="/admin/news/?do=delete&amp;id={$_article.id}" title="Удалить" onclick="if (!confirm('Вы уверены?')) return false;"><img src="/_assets/images/fugue/cross-script.png" alt="" /></a></td>
			</tr>
		{/foreach}
	</table>
	
	{include 'listing.tpl'}
{else}
	<p>Ничего не найдено</p>
{/if}