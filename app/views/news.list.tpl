{if $news}
	<div class="articles-list">	
		{foreach $news as $_article}
		<div class="article-list-item">
			<div class="info">
				<div class="name"><a href="/news/{$_article.id}/" title="{$_article.name}">{$_article.name}</a></div>
				<div class="description">{$_article.summary nofilter}</div>
				<div class="extras">
					<div class="date">{$_article.add_date|date_format_ru}</div>
				</div>
			</div>
		</div>
		{/foreach}
	</div>

	{include 'listing.tpl'}
{/if}