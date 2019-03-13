{if $listing_data.listing_numbers}
<div class="page-listing">
	<div class="numbers">
		{foreach $listing_data.listing_numbers as $n}
		<div class="num{if $n.this} disabled{/if}" data-page="{$n.page_num}">{if !$n.this && $n.url}<a href="{if !$_ajax}{$n.url}{else}#{/if}" data-page="{$n.page}"{if $_ajax} class="ajax"{/if}>{$n.page nofilter}</a>{else}{$n.page}{/if}</div>
		{/foreach}
	</div>
	{if $listing_data.arrows}
	<div class="arrows">
		<div class="arrow left" data-page="{$listing_data.listing_left_page}">← {if $listing_data.listing_left_url}<a href="{$listing_data.listing_left_url}" data-page="{$listing_data.listing_left_page}"{if $_ajax} class="ajax"{/if}>Назад</a>{else}Назад{/if}</div>
		<div class="separator">|</div>
		<div class="arrow right" data-page="{$listing_data.listing_right_page}">{if $listing_data.listing_right_url}<a href="{$listing_data.listing_right_url}" data-page="{$listing_data.listing_right_page}"{if $_ajax} class="ajax"{/if}>Вперед</a> →{else}Вперед →{/if}</div>
	</div>
	{/if}
</div>
{/if}