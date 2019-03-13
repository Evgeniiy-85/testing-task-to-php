<form method="get" action="/admin/products/" class="common-forms filter-form">
	<div class="element">
		<input type="text" name="filter[name]" value="{$filter_data.name}" placeholder="Название" autocomplete="off" />
	</div>
	<div class="element">
		<input type="submit" value="Поиск" />
	</div>
</form>

<div class="separate-submit">
	<span class="form-button green" onclick="location.href = '/admin/products/?do=add';">+ Добавить товар</span>
</div>

{if $products}
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
		{foreach $products as $_product}
			<tr>
				<td class="left">{$_product.name}</td>
				<td class="left compact">
					{foreach from=$sections_urls key = key item=_section}
						{if $key eq $_product.id}
							{foreach from=$_section key=key item=_section_url}
								{if $key > 0},<br />{/if}
								<a href="{$_section_url}{$_product.slug}/" target="_blank">{$_section_url}{$_product.slug}/</a>
							{/foreach}
						{/if}
					{/foreach}
					<div style="margin-top: 3px;">{$_product.add_time|date_format_ru}</div>
				</td>
				<td class="center controls">
					<a href="/admin/products/?do=edit&amp;id={$_product.id}" title="Редактировать">
						<img src="/_assets/images/fugue/pencil.png" alt="" />
					</a>
				</td>
				<td class="center controls">
					<a href="/admin/products/?do=delete&amp;id={$_product.id}" title="Удалить" onclick="if (!confirm('Вы уверены?')) return false;">
						<img src="/_assets/images/fugue/cross-script.png" alt="" />
					</a>
				</td>
			</tr>
		{/foreach}
	</table>
	
	{include 'listing.tpl'}
{else}
	<p>Ничего не найдено</p>
{/if}