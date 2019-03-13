{if $articles}
	<div class="articles-list">	
		{foreach $articles as $_article}
		<div class="article-list-item">
			<div class="photo"><a href="/articles/{$_article.slug}/" title="{$_article.name}">{if $_article.photo}<img src="/_upload/images/articles/{$_article.photo}" alt="{$_article.name}" />{/if}</a></div>
			<div class="info">
				<div class="name"><a href="/articles/{$_article.slug}/" title="{$_article.name}">{$_article.name}</a></div>
				<div class="description">{$_article.summary nofilter}</div>
				<div class="extras">
					<div class="date">{$_article.add_time|date_format_ru}, {$_article.add_time|date_format:'%H:%M'}</div>
				</div>
			</div>
		</div>
		{/foreach}
	</div>

	{include 'listing.tpl'}
{/if}