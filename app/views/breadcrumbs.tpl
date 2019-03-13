{if $breadcrumbs}
	<div class="breadcrumbs">
		<a href="/">Главная</a> /
		{foreach $breadcrumbs as $_bc}
			{if $_bc@last}{$_bc.name|truncate:64:"...":true}
			{else}<a href="{$_bc.url}" title="{$_bc.name}">{$_bc.name|truncate:30:"...":true}</a> / {/if}
		{/foreach}
	</div>
{/if}