{if $main_menu}
<div class="main-menu">
	<div class="container">
		{foreach $main_menu as $_item}
		<div class="menu-item{if $smarty.server.REQUEST_URI == $_item.url} selected{/if}"><a href="{$_item.url}"{if $_item.blank} target="_blank"{/if}>{$_item.name}</a></div>
		{/foreach}
	</div>
</div>
{/if}