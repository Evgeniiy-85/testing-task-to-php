{if $tabs}
	<div class="admin-tabs clearfix">
		{foreach $tabs as $_tab_id => $_tab}
		<a href="{$_tab.url}" class="tab {$_tab_id}{if $_tab.selected} selected{/if}">{$_tab.name}</a>
		{/foreach}
	</div>
{/if}